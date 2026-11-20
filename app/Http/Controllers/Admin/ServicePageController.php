<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicePageController extends Controller
{
    private const PAGE_SECTIONS = [
        'services' => 'Services',
        'industries' => 'Industries',
        'insights' => 'Insights',
    ];

    public function index()
    {
        $pages = Service::withCount('sections')->orderBy('page_section')->orderBy('title')->get();
        $sectionLabels = self::PAGE_SECTIONS;

        return view('admin.services.index', compact('pages', 'sectionLabels'));
    }

    public function create()
    {
        $service = new Service(['page_section' => 'services']);
        $sectionOptions = self::PAGE_SECTIONS;
        $isCreate = true;

        return view('admin.services.settings', compact('service', 'sectionOptions', 'isCreate'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'slug' => 'required|string|max:120|regex:/^[a-z0-9-]+$/|unique:services,slug',
            'page_section' => 'required|string|in:' . implode(',', array_keys(self::PAGE_SECTIONS)),
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string|max:10000',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:1000',
            'og_image' => 'nullable|string|max:500',
            'og_image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        if ($request->hasFile('og_image_file')) {
            $validated['og_image'] = $request->file('og_image_file')->store('services/seo', 'public');
        }
        unset($validated['og_image_file']);

        $service = Service::create($validated);

        return redirect()->route('admin.webpages.editor', $service)->with('success', 'Webpage created. Add its sections in the visual editor.');
    }

    public function edit(Service $service)
    {
        $sectionOptions = self::PAGE_SECTIONS;
        $isCreate = false;

        return view('admin.services.settings', compact('service', 'sectionOptions', 'isCreate'));
    }

    public function updateSettings(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'slug' => 'required|string|max:120|regex:/^[a-z0-9-]+$/|unique:services,slug,' . $service->id,
            'page_section' => 'required|string|in:' . implode(',', array_keys(self::PAGE_SECTIONS)),
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string|max:10000',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:1000',
            'og_image' => 'nullable|string|max:500',
            'og_image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        if ($request->hasFile('og_image_file')) {
            $validated['og_image'] = $request->file('og_image_file')->store('services/seo', 'public');
        }
        unset($validated['og_image_file']);

        $service->update($validated);

        return redirect()->route('admin.webpages.editor', $service)->with('success', 'Webpage settings saved.');
    }

    public function editor(Service $service)
    {
        $service->load(['sections' => fn ($query) => $query->orderBy('sort_order')->orderBy('id')]);
        $templates = config('section_templates');
        $sectionLabels = self::PAGE_SECTIONS;

        return view('admin.services.editor', compact('service', 'templates', 'sectionLabels'));
    }

    public function storeSection(Request $request, Service $service)
    {
        $validated = $request->validate([
            'section_type' => 'required|string|in:' . implode(',', array_keys(config('section_templates'))),
        ]);
        $template = config('section_templates.' . $validated['section_type']);
        $content = [];

        foreach ($template['fields'] as $key => $field) {
            $content[$key] = ($field['type'] ?? '') === 'repeater' ? [] : '';
        }

        $service->sections()->create([
            'section_type' => $validated['section_type'],
            'content' => $content,
            'sort_order' => (int) $service->sections()->max('sort_order') + 1,
            'is_active' => true,
        ]);

        return redirect()->route('admin.webpages.editor', $service)->with('success', 'Section added.');
    }

    public function savePage(Request $request, Service $service)
    {
        $rules = [
            'sections' => 'nullable|array',
            'removed_sections' => 'nullable|array',
            'removed_sections.*' => 'required|integer|distinct',
        ];

        $sections = $service->sections()->get();
        foreach ($sections as $section) {
            $template = config('section_templates.' . $section->section_type);
            if (! $template) {
                continue;
            }

            $prefix = 'sections.' . $section->id;
            $rules[$prefix] = 'nullable|array';
            $rules[$prefix . '.is_active'] = 'nullable|boolean';
            foreach ($template['fields'] as $key => $field) {
                $fieldPath = $prefix . '.content.' . $key;
                if (($field['type'] ?? '') === 'repeater') {
                    $rules[$fieldPath] = 'nullable|array|max:12';
                    foreach ($field['fields'] ?? [] as $childKey => $childField) {
                        $rules[$fieldPath . '.*.' . $childKey] = $childField['rules'] ?? 'nullable|string|max:1000';
                    }
                } elseif (($field['type'] ?? '') === 'image') {
                    $rules[$fieldPath] = 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120';
                    $rules[$prefix . '.existing_images.' . $key] = 'nullable|string|max:1000';
                } else {
                    $rules[$fieldPath] = $field['rules'] ?? 'nullable|string|max:10000';
                }
            }
        }

        $validated = $request->validate($rules);

        $removedIds = $validated['removed_sections'] ?? [];
        $ownedIds = $service->sections()->whereIn('id', $removedIds)->pluck('id')->all();
        abort_unless(count($ownedIds) === count($removedIds), 404);
        $removedLookup = array_fill_keys(array_map('intval', $ownedIds), true);

        DB::transaction(function () use ($request, $service, $sections, $ownedIds, $removedLookup): void {
            foreach ($sections as $section) {
                if (isset($removedLookup[(int) $section->id])) {
                    continue;
                }

                $template = config('section_templates.' . $section->section_type);
                if (! $template) {
                    continue;
                }

                $content = [];
                foreach ($template['fields'] as $key => $field) {
                    if (($field['type'] ?? '') === 'repeater') {
                        $content[$key] = $request->input("sections.{$section->id}.content.{$key}", []);
                    } elseif (($field['type'] ?? '') === 'image') {
                        $file = $request->file("sections.{$section->id}.content.{$key}");
                        $content[$key] = $file
                            ? $file->store('services/seo', 'public')
                            : $request->input("sections.{$section->id}.existing_images.{$key}", data_get($section->content, $key, ''));
                    } else {
                        $content[$key] = $request->input("sections.{$section->id}.content.{$key}", '');
                    }
                }

                $section->update([
                    'content' => $content,
                    'is_active' => $request->boolean("sections.{$section->id}.is_active"),
                ]);
            }

            if ($ownedIds) {
                $service->sections()->whereIn('id', $ownedIds)->delete();
            }

            $service->sections()->orderBy('sort_order')->orderBy('id')->get()
                ->each(fn (ServiceSection $item, int $index) => $item->update(['sort_order' => $index]));
            $service->touch();
        });

        return redirect()->route('admin.webpages.editor', $service)->with('success', 'Page saved. All edits and section removals are now live.');
    }

    public function updateSection(Request $request, Service $service, ServiceSection $section)
    {
        abort_unless((int) $section->service_id === (int) $service->id, 404);
        $template = config('section_templates.' . $section->section_type);
        abort_unless($template, 404);

        $rules = ['is_active' => 'nullable|boolean'];
        foreach ($template['fields'] as $key => $field) {
            if (($field['type'] ?? '') === 'repeater') {
                $rules["content.$key"] = 'nullable|array|max:12';
                foreach ($field['fields'] ?? [] as $childKey => $childField) {
                    $rules["content.$key.*.$childKey"] = $childField['rules'] ?? 'nullable|string|max:1000';
                }
            } elseif (($field['type'] ?? '') === 'image') {
                $rules["content.$key"] = 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120';
            } else {
                $rules["content.$key"] = $field['rules'] ?? 'nullable|string|max:10000';
            }
        }
        $request->validate($rules);

        $content = $request->input('content', []);
        foreach ($template['fields'] as $key => $field) {
            if (($field['type'] ?? '') !== 'image') {
                continue;
            }

            if ($request->hasFile("content.$key")) {
                $content[$key] = $request->file("content.$key")->store('services/seo', 'public');
            } else {
                $content[$key] = $request->input("existing_images.$key", $section->content[$key] ?? '');
            }
        }

        $section->update([
            'content' => $content,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.webpages.editor', $service)->with('success', 'Section saved.');
    }

    public function destroySection(Service $service, ServiceSection $section)
    {
        abort_unless((int) $section->service_id === (int) $service->id, 404);
        $section->delete();
        $service->sections()->orderBy('sort_order')->orderBy('id')->get()
            ->each(fn (ServiceSection $item, int $index) => $item->update(['sort_order' => $index]));

        return redirect()->route('admin.webpages.editor', $service)->with('success', 'Section removed.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.dashboard', ['tab' => 'webpage'])->with('success', 'Webpage deleted.');
    }
}
