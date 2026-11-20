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
            'sort_order' => 'required|integer|min:1|max:' . ($service->sections()->count() + 1),
            'content' => 'nullable|array',
        ]);
        $template = config('section_templates.' . $validated['section_type']);
        $fieldRules = [];
        foreach ($template['fields'] as $key => $field) {
            $type = $field['type'] ?? 'text';
            if ($type === 'repeater') {
                $fieldRules["content.{$key}"] = $field['rules'] ?? 'nullable|array';
                foreach ($field['fields'] ?? [] as $childKey => $childField) {
                    $fieldRules["content.{$key}.*.{$childKey}"] = $childField['rules'] ?? 'nullable|string';
                }
            } else {
                $fieldRules["content.{$key}"] = $field['rules'] ?? 'nullable|string';
            }
        }
        $request->validate($fieldRules);

        $defaults = $this->sectionPreviewDefaults($template['fields']);
        $content = [];
        foreach ($template['fields'] as $key => $field) {
            if (($field['type'] ?? '') === 'image') {
                $content[$key] = $request->file("content.{$key}")
                    ? $request->file("content.{$key}")->store('services/sections', 'public')
                    : '';
            } elseif (($field['type'] ?? '') === 'repeater') {
                $content[$key] = $this->storeRepeaterImages(
                    $request,
                    "content.{$key}",
                    "existing_images.{$key}",
                    $request->input("content.{$key}", []),
                    $field['fields'] ?? []
                );
            } else {
                $content[$key] = $request->input("content.{$key}", $defaults[$key] ?? '');
            }
        }

        DB::transaction(function () use ($service, $validated, $content): void {
            $orderedSections = $service->sections()->orderBy('sort_order')->orderBy('id')->get()->all();
            $newSection = $service->sections()->create([
                'section_type' => $validated['section_type'],
                'content' => $content,
                'sort_order' => count($orderedSections) + 1,
                'is_active' => true,
            ]);

            array_splice($orderedSections, $validated['sort_order'] - 1, 0, [$newSection]);
            foreach ($orderedSections as $index => $section) {
                $section->update(['sort_order' => $index + 1]);
            }
        });

        return redirect()->route('admin.webpages.editor', $service)->with('success', 'Section added at position ' . $validated['sort_order'] . '.');
    }

    public function previewSection(Request $request, Service $service, string $type)
    {
        $template = config("section_templates.{$type}");
        abort_unless($template, 404);

        $defaults = $this->sectionPreviewDefaults($template['fields']);
        $data = $request->isMethod('post')
            ? $this->mergeSectionPreviewData($template['fields'], $defaults, $request->input('content', []))
            : $defaults;

        $response = [
            'name' => $template['name'],
            'fields' => $template['fields'],
            'defaults' => $defaults,
        ];

        if ($request->isMethod('post')) {
            $response['html'] = view($template['view'], [
                'data' => $data,
                'section' => null,
                'sectionType' => $type,
            ])->render();
        }

        return response()->json($response);
    }

    private function mergeSectionPreviewData(array $fields, array $defaults, array $submitted): array
    {
        foreach ($fields as $key => $field) {
            if (!array_key_exists($key, $submitted)) continue;
            if (($field['type'] ?? '') === 'repeater' && is_array($submitted[$key])) {
                foreach ($submitted[$key] as $index => $item) {
                    if (is_array($item)) {
                        $defaults[$key][$index] ??= $this->sectionPreviewDefaults($field['fields'] ?? []);
                        $defaults[$key][$index] = $this->mergeSectionPreviewData($field['fields'] ?? [], $defaults[$key][$index], $item);
                    }
                }
            } elseif (($field['type'] ?? '') !== 'image' && is_scalar($submitted[$key])) {
                $defaults[$key] = (string) $submitted[$key];
            }
        }

        return $defaults;
    }

    private function sectionPreviewDefaults(array $fields): array
    {
        $defaults = [];

        foreach ($fields as $key => $field) {
            $type = $field['type'] ?? 'text';

            if ($type === 'repeater') {
                $defaults[$key] = [];
                for ($index = 0; $index < 3; $index++) {
                    $defaults[$key][] = $this->sectionPreviewDefaults($field['fields'] ?? []);
                }
                continue;
            }

            if ($type === 'image') {
                $defaults[$key] = '';
                continue;
            }

            if ($type === 'select') {
                $defaults[$key] = array_key_first($field['options'] ?? []) ?? '';
                continue;
            }

            $defaults[$key] = $this->sectionSampleValue((string) $key, $field);
        }

        return $defaults;
    }

    private function sectionSampleValue(string $key, array $field): string
    {
        $key = strtolower($key);
        $label = strtolower($field['label'] ?? $key);

        if (str_contains($key, 'eyebrow')) return 'A better way forward';
        if (str_contains($key, 'heading') || ($key === 'title' && !str_contains($label, 'item'))) {
            return 'A clear solution for your business';
        }
        if ($key === 'title') return 'A valuable benefit';
        if (str_contains($key, 'question')) return 'What should I expect?';
        if (str_contains($key, 'answer')) return 'We will guide you through every step with a clear plan tailored to your needs.';
        if (str_contains($key, 'icon')) return 'fa-solid fa-star';
        if (str_contains($key, 'button') && str_contains($key, 'text') || str_contains($key, 'cta_text')) return 'Get started';
        if (str_contains($key, 'link')) return '#contact';
        if ($key === 'value' || str_contains($key, 'metric')) return '01';
        if ($key === 'label') return 'A result that matters';
        if (in_array($key, ['body', 'description', 'subtitle', 'subheading', 'intro', 'supporting_copy'], true)) {
            return 'Use this space to explain your offer, share its value, and help visitors understand what to do next.';
        }

        if (str_contains($label, 'description') || str_contains($label, 'support')) {
            return 'Add a short explanation of this benefit and how it helps your customers.';
        }

        return 'Add ' . ($field['label'] ?? str_replace('_', ' ', $key));
    }

    private function storeRepeaterImages(Request $request, string $inputPrefix, string $existingPrefix, array $items, array $childFields, array $fallbackItems = []): array
    {
        foreach ($items as $index => &$item) {
            if (! is_array($item)) continue;

            foreach ($childFields as $childKey => $childField) {
                if (($childField['type'] ?? '') !== 'image') continue;

                $file = $request->file("{$inputPrefix}.{$index}.{$childKey}");
                $existing = $request->input(
                    "{$existingPrefix}.{$index}.{$childKey}",
                    data_get($fallbackItems, "{$index}.{$childKey}", $item[$childKey] ?? '')
                );
                $item[$childKey] = $file ? $file->store('services/sections', 'public') : $existing;
            }
        }
        unset($item);

        return $items;
    }

    public function savePage(Request $request, Service $service)
    {
        $rules = [
            'sections' => 'nullable|array',
            'removed_sections' => 'nullable|array',
            'removed_sections.*' => 'required|integer|distinct',
            'ordered_sections' => 'nullable|array',
            'ordered_sections.*' => 'required|integer|distinct',
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
                        if (($childField['type'] ?? '') === 'image') {
                            $rules[$prefix . '.existing_images.' . $key . '.*.' . $childKey] = 'nullable|string|max:1000';
                        }
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
        $orderedIds = array_map('intval', $validated['ordered_sections'] ?? []);
        $ownedOrderedIds = $service->sections()->whereIn('id', $orderedIds)->pluck('id')->map(fn ($id) => (int) $id)->all();
        abort_unless(count($ownedOrderedIds) === count($orderedIds), 404);

        DB::transaction(function () use ($request, $service, $sections, $ownedIds, $removedLookup, $orderedIds): void {
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
                        $items = $request->input("sections.{$section->id}.content.{$key}", []);
                        $content[$key] = $this->storeRepeaterImages(
                            $request,
                            "sections.{$section->id}.content.{$key}",
                            "sections.{$section->id}.existing_images.{$key}",
                            $items,
                            $field['fields'] ?? [],
                            data_get($section->content, $key, [])
                        );
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

            $remainingSections = $service->sections()->get()->all();
            $orderLookup = array_flip($orderedIds);
            usort($remainingSections, function (ServiceSection $left, ServiceSection $right) use ($orderLookup): int {
                $leftPosition = $orderLookup[$left->id] ?? PHP_INT_MAX;
                $rightPosition = $orderLookup[$right->id] ?? PHP_INT_MAX;

                return ($leftPosition <=> $rightPosition)
                    ?: ($left->sort_order <=> $right->sort_order)
                    ?: ($left->id <=> $right->id);
            });
            foreach ($remainingSections as $index => $item) {
                $item->update(['sort_order' => $index + 1]);
            }
            $service->touch();
        });

        return redirect()->route('admin.webpages.editor', $service)
            ->with('success', 'Your page was saved successfully. All changes are now live.')
            ->with('page_saved', true);
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
                    if (($childField['type'] ?? '') === 'image') {
                        $rules["existing_images.$key.*.$childKey"] = 'nullable|string|max:1000';
                    }
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
            if (($field['type'] ?? '') === 'repeater') {
                $content[$key] = $this->storeRepeaterImages(
                    $request,
                    "content.$key",
                    "existing_images.$key",
                    $request->input("content.$key", []),
                    $field['fields'] ?? [],
                    data_get($section->content, $key, [])
                );
                continue;
            }
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
            ->each(fn (ServiceSection $item, int $index) => $item->update(['sort_order' => $index + 1]));

        return redirect()->route('admin.webpages.editor', $service)->with('success', 'Section removed.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.dashboard', ['tab' => 'webpage'])->with('success', 'Webpage deleted.');
    }
}
