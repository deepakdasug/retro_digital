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
        'insights' => 'Insights',
    ];

    public function index()
    {
        $pages = Service::withCount('sections')->orderBy('page_section')->orderBy('title')->get();
        $sectionLabels = self::PAGE_SECTIONS;

        return view('admin.services.service-index', compact('pages', 'sectionLabels'));
    }

    public function create()
    {
        $service = new Service(['page_section' => 'services']);
        $sectionOptions = self::PAGE_SECTIONS;
        $isCreate = true;

        return view('admin.services.service-settings', compact('service', 'sectionOptions', 'isCreate'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'slug' => 'required|string|max:120|regex:/^[a-z0-9-]+$/|unique:services,slug',
            'page_section' => 'required|string|in:' . implode(',', array_keys(self::PAGE_SECTIONS)),
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:1000',
            'og_image' => 'nullable|string|max:500',
            'og_image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
            'schema_markup' => 'nullable|string',
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

        return view('admin.services.service-settings', compact('service', 'sectionOptions', 'isCreate'));
    }

    public function updateSettings(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'slug' => 'required|string|max:120|regex:/^[a-z0-9-]+$/|unique:services,slug,' . $service->id,
            'page_section' => 'required|string|in:' . implode(',', array_keys(self::PAGE_SECTIONS)),
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:1000',
            'og_image' => 'nullable|string|max:500',
            'og_image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
            'schema_markup' => 'nullable|string',
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

        $layout = config('page_layouts.' . $service->page_section . '.editor', 'admin.services.service-editor');

        return view($layout, compact('service', 'templates', 'sectionLabels'));
    }

    public function storeSection(Request $request, Service $service)
    {
        $validated = $request->validate([
            'section_type' => 'required|string|in:' . implode(',', array_keys(config('section_templates'))),
            'sort_order' => 'required|integer|min:1|max:' . ($service->sections()->count() + 1),
            'content' => 'nullable|array',
        ]);

        if ($validated['section_type'] === 'custom') {
            $content = $this->customSectionContent($request, 'content');

            DB::transaction(function () use ($service, $validated, $content): void {
                $orderedSections = $service->sections()->orderBy('sort_order')->orderBy('id')->get()->all();
                $newSection = $service->sections()->create([
                    'section_type' => 'custom',
                    'content' => $content,
                    'sort_order' => count($orderedSections) + 1,
                    'is_active' => true,
                ]);

                array_splice($orderedSections, $validated['sort_order'] - 1, 0, [$newSection]);
                foreach ($orderedSections as $index => $section) {
                    $section->update(['sort_order' => $index + 1]);
                }
            });

            return redirect()->route('admin.webpages.editor', $service)->with('success', 'Custom section added.');
        }

        $template = config('section_templates.' . $validated['section_type']);
        $fieldRules = [];
        foreach ($template['fields'] as $key => $field) {
            $type = $field['type'] ?? 'text';
            if ($type === 'repeater') {
                $fieldRules["content.{$key}"] = $field['rules'] ?? 'nullable|array';
                foreach ($field['fields'] ?? [] as $childKey => $childField) {
                    $fieldRules["content.{$key}.*.{$childKey}"] = $childField['rules'] ?? 'nullable|string';
                }
            } elseif ($type === 'image') {
                $fieldRules["content.{$key}"] = 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120';
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

        // If an FAQ section already exists, append new FAQ questions to it instead of creating a duplicate section
        if (in_array($validated['section_type'], ['faq', 'seo_faq'], true)) {
            $existingFaqSection = $service->sections()
                ->whereIn('section_type', ['faq', 'seo_faq'])
                ->first();

            if ($existingFaqSection) {
                $existingContent = is_array($existingFaqSection->content) ? $existingFaqSection->content : [];
                $existingItems = is_array($existingContent['items'] ?? null) ? $existingContent['items'] : [];

                $rawNewItems = is_array($content['items'] ?? null) ? $content['items'] : [];
                $validNewItems = [];

                foreach ($rawNewItems as $rawItem) {
                    if (!is_array($rawItem)) continue;

                    $question = trim((string) ($rawItem['question'] ?? $rawItem['title'] ?? ''));
                    $answer = trim((string) ($rawItem['answer'] ?? $rawItem['description'] ?? ''));

                    if ($question === '' && $answer === '') continue;

                    if ($existingFaqSection->section_type === 'seo_faq') {
                        $validNewItems[] = [
                            'title' => $question,
                            'description' => $answer,
                        ];
                    } else {
                        $validNewItems[] = [
                            'question' => $question,
                            'answer' => $answer,
                        ];
                    }
                }

                if (!empty($validNewItems)) {
                    $existingContent['items'] = array_merge($existingItems, $validNewItems);
                }

                if (!empty($content['heading']) && empty($existingContent['heading'])) {
                    $existingContent['heading'] = $content['heading'];
                }
                if (!empty($content['eyebrow']) && empty($existingContent['eyebrow'])) {
                    $existingContent['eyebrow'] = $content['eyebrow'];
                }
                if (!empty($content['subheading']) && empty($existingContent['subheading'])) {
                    $existingContent['subheading'] = $content['subheading'];
                }

                $existingFaqSection->update([
                    'content' => $existingContent,
                    'is_active' => true,
                ]);
                $service->touch();

                return redirect()->route('admin.webpages.editor', $service)
                    ->with('success', 'New FAQ question(s) successfully added to the existing FAQ section.');
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

        if ($type === 'custom') {
            $response = [
                'name' => $template['name'],
                'customBuilder' => true,
            ];

            if ($request->isMethod('get')) {
                $response['defaults'] = [
                    'html' => $this->defaultCustomSectionHtml(),
                    'css' => $this->defaultCustomSectionCss(),
                    'js' => $this->defaultCustomSectionJs(),
                    'schema' => [],
                    'values' => [],
                ];
            }

            if ($request->isMethod('post')) {
                $content = $this->customSectionContent($request, 'content', false);
                $section = new ServiceSection(['content' => $content]);
                $response['html'] = view('services.sections.service-custom-section', [
                    'data' => $content,
                    'section' => $section,
                    'sectionType' => 'custom',
                ])->render();
            }

            return response()->json($response);
        }

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
            $previewView = $service->page_section === 'services'
                ? 'services.sections.service-section'
                : $template['view'];
            $response['html'] = view($previewView, [
                'data' => $data,
                'service' => $service,
                'section' => null,
                'sectionType' => $type,
            ])->render();
        }

        return response()->json($response);
    }

    private function customSectionContent(Request $request, string $prefix, bool $storeUploads = true): array
    {
        $path = fn (string $field): string => $prefix === '' ? $field : $prefix.'.'.$field;
        $rules = [
            $path('schema') => ['nullable', 'array', 'max:30'],
            $path('schema.*.key') => ['required', 'string', 'max:40', 'distinct', 'regex:/^[A-Za-z][A-Za-z0-9_]{0,39}$/'],
            $path('schema.*.label') => ['required', 'string', 'max:100'],
            $path('schema.*.type') => ['required', 'in:heading,paragraph,text,image,video,link'],
            $path('values') => ['nullable', 'array'],
            $path('html') => ['nullable', 'string', 'max:500000'],
            $path('css') => ['nullable', 'string', 'max:500000'],
            $path('js') => ['nullable', 'string', 'max:500000'],
        ];

        foreach ($request->input($path('schema'), []) as $field) {
            if (
                ! is_array($field)
                || empty($field['key'])
                || ! preg_match('/^[A-Za-z][A-Za-z0-9_]{0,39}$/', (string) $field['key'])
            ) {
                continue;
            }

            $key = (string) $field['key'];
            if (in_array($field['type'] ?? '', ['image', 'video'], true)) {
                $existingPath = $path('existing_values.'.$key);
                $valuePath = $path('values.'.$key);
                if ($request->hasFile($valuePath)) {
                    $rules[$valuePath] = ($field['type'] === 'image')
                        ? ['file', 'mimes:jpg,jpeg,png,webp,gif,svg', 'max:15360']
                        : ['file', 'mimetypes:video/mp4,video/webm,video/ogg', 'max:51200'];
                } else {
                    $rules[$valuePath] = ['nullable', 'string', 'max:1000'];
                }
                $rules[$existingPath] = ['nullable', 'string', 'max:1000'];
            } elseif (($field['type'] ?? '') === 'link') {
                $rules[$path('values.'.$key)] = ['nullable', 'string', 'max:2000'];
            } else {
                $rules[$path('values.'.$key)] = ['nullable', 'string', 'max:50000'];
            }
        }

        $request->validate($rules);
        $schema = array_values($request->input($path('schema'), []));
        $values = [];

        foreach ($schema as $field) {
            $key = $field['key'];
            if (in_array($field['type'], ['image', 'video'], true)) {
                $file = $request->file($path('values.'.$key));
                $existing = $request->input($path('existing_values.'.$key), '');
                $textValue = $request->input($path('values.'.$key), '');
                if ($file && $storeUploads) {
                    $values[$key] = $file->store('services/sections', 'public');
                } elseif ($file && ! $storeUploads && $field['type'] === 'image') {
                    $values[$key] = 'data:'.$file->getMimeType().';base64,'.base64_encode(file_get_contents($file->getRealPath()));
                } elseif (!empty($existing)) {
                    $values[$key] = (string) $existing;
                } else {
                    $values[$key] = is_string($textValue) ? $textValue : '';
                }
            } else {
                $values[$key] = (string) $request->input($path('values.'.$key), '');
            }
        }

        return [
            'schema' => $schema,
            'values' => $values,
            'html' => (string) $request->input($path('html'), ''),
            'css' => (string) $request->input($path('css'), ''),
            'js' => (string) $request->input($path('js'), ''),
        ];
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

            if (array_key_exists('default', $field)) {
                $defaults[$key] = $field['default'];
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
            'schema_markup' => 'nullable|string',
        ];

        $sections = $service->sections()->get();
        foreach ($sections as $section) {
            $template = config('section_templates.' . $section->section_type);
            if (! $template) {
                continue;
            }

            if ($section->section_type === 'custom') {
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

                if ($section->section_type === 'custom') {
                    $section->update([
                        'content' => $this->customSectionContent(
                            $request,
                            "sections.{$section->id}.content"
                        ),
                        'is_active' => $request->boolean("sections.{$section->id}.is_active"),
                    ]);
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
            if ($request->has('schema_markup')) {
                $service->schema_markup = $request->input('schema_markup');
                $service->save();
            } else {
                $service->touch();
            }
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

        if ($section->section_type === 'custom') {
            $section->update([
                'content' => $this->customSectionContent($request, 'content'),
                'is_active' => $request->boolean('is_active'),
            ]);

            return redirect()->route('admin.webpages.editor', $service)->with('success', 'Custom section saved.');
        }

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

    public function uploadMedia(Request $request)
    {
        $request->validate([
            'image' => ['nullable', 'file', 'max:20480', 'mimes:jpeg,png,jpg,gif,webp,svg'],
            'upload' => ['nullable', 'file', 'max:20480', 'mimes:jpeg,png,jpg,gif,webp,svg'],
        ]);

        $file = $request->file('image') ?? $request->file('upload');
        if (!$file || !$file->isValid()) {
            return response()->json(['error' => 'Please select a valid image file (PNG, JPG, WEBP, GIF, SVG up to 20MB).'], 422);
        }

        $path = $file->store('services/sections', 'public');
        $url = asset('storage/' . $path);

        return response()->json([
            'success' => true,
            'url' => $url,
            'path' => $path,
            'filename' => $file->getClientOriginalName(),
        ]);
    }

    private function defaultCustomSectionHtml(): string
    {
        return <<<'HTML'
<section class="custom-hero-banner">
  <div class="custom-hero-container">
    <div class="custom-hero-content">
      <span class="custom-badge">CUSTOM DESIGN ENGINE</span>
      <h2 class="custom-title">Build Anything With Raw HTML & CSS</h2>
      <p class="custom-description">Create bespoke sections with full design freedom. Upload images, write custom styles, and build high-converting layouts.</p>
      <div class="custom-actions">
        <a href="/contact#contact" class="custom-btn">Get Started Today <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
    <div class="custom-hero-media">
      <div class="custom-image-card">
        <img src="/assets/images/retrotech-mark.png" alt="Section Banner" class="custom-banner-img">
        <div class="custom-floating-tag">
          <i class="fa-solid fa-bolt"></i> 100% Fully Customizable
        </div>
      </div>
    </div>
  </div>
</section>
HTML;
    }

    private function defaultCustomSectionCss(): string
    {
        return <<<'CSS'
.custom-hero-banner {
  padding: clamp(3rem, 6vw, 5rem) 1.5rem;
  background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 50%, #f4fbf7 100%);
  border-radius: 24px;
  margin: 1.5rem auto;
  max-width: 1240px;
  box-shadow: 0 10px 30px -10px rgba(22, 101, 52, 0.08);
  font-family: 'Inter', sans-serif;
  color: #1e293b;
}

.custom-hero-container {
  display: grid;
  grid-template-columns: 1.15fr 0.85fr;
  align-items: center;
  gap: 3rem;
}

.custom-badge {
  display: inline-block;
  padding: 6px 14px;
  border-radius: 100px;
  background: #dcfce7;
  color: #15803d;
  font-size: 0.82rem;
  font-weight: 700;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  margin-bottom: 1.25rem;
}

.custom-title {
  font-size: clamp(2rem, 3.8vw, 3.2rem);
  font-weight: 800;
  line-height: 1.2;
  color: #0f172a;
  margin-bottom: 1.25rem;
  letter-spacing: -0.02em;
}

.custom-description {
  font-size: 1.1rem;
  line-height: 1.7;
  color: #475569;
  margin-bottom: 2rem;
}

.custom-btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 14px 28px;
  background: #166534;
  color: #ffffff;
  border-radius: 12px;
  font-weight: 600;
  font-size: 1rem;
  text-decoration: none;
  transition: all 0.25s ease;
  box-shadow: 0 4px 14px rgba(22, 101, 52, 0.25);
}

.custom-btn:hover {
  background: #14532d;
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(22, 101, 52, 0.35);
}

.custom-hero-media {
  display: flex;
  justify-content: center;
  position: relative;
}

.custom-image-card {
  position: relative;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.12);
  background: #ffffff;
  border: 1px solid #e2e8f0;
}

.custom-banner-img {
  width: 100%;
  height: auto;
  display: block;
  object-fit: cover;
}

.custom-floating-tag {
  position: absolute;
  bottom: 16px;
  left: 16px;
  background: rgba(15, 23, 42, 0.85);
  backdrop-filter: blur(8px);
  color: #ffffff;
  padding: 8px 14px;
  border-radius: 30px;
  font-size: 0.85rem;
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 8px;
}

.custom-floating-tag i {
  color: #4ade80;
}

@media (max-width: 900px) {
  .custom-hero-container {
    grid-template-columns: 1fr;
    gap: 2.5rem;
    text-align: center;
  }
  .custom-hero-media {
    order: -1;
  }
  .custom-btn {
    margin: 0 auto;
  }
}
CSS;
    }

    private function defaultCustomSectionJs(): string
    {
        return <<<'JS'
// Custom JavaScript:
// Access all dynamic schema fields via window.sectionData
console.log('Custom section loaded with data:', window.sectionData);
JS;
    }
}
