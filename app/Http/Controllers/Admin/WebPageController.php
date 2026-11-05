<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebPage;
use App\Models\WebPageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class WebPageController extends Controller
{
    public function index()
    {
        $pages = WebPage::withCount('sections')->orderBy('sort_order')->latest()->get();
        return view('admin.web-pages.index', compact('pages'));
    }

    public function create()
    {
        $sectionTypes = config('web_sections.types');
        return view('admin.web-pages.create', compact('sectionTypes'));
    }

    public function store(Request $request)
    {
        // 1. Validation
        $request->validate(array_merge([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:web_pages,slug',
            'category' => 'nullable|string|max:100',
            'short_description' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'hero_image' => 'nullable|string',
            'hero_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,gif|max:10240',
        ], $this->sectionValidationRules($request)));

        try {
            DB::beginTransaction();

            // 2. Generate unique slug
            $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;
            while (WebPage::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            // 3. Handle Hero Image Upload
            $heroImagePath = $request->hero_image; 
            
            if ($request->hasFile('hero_image_file')) {
                $path = $request->file('hero_image_file')->store('web-pages/hero', 'public');
                $heroImagePath = 'storage/' . $path;
            }

            // 4. Create WebPage
            $page = WebPage::create([
                'title' => $request->title,
                'slug' => $slug,
                'category' => $request->input('category', 'marketing'),
                'short_description' => $request->short_description,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'hero_image' => $heroImagePath,
                'is_published' => $request->has('is_published'),
            ]);

            // 5. Save Sections
            if ($request->has('sections') && is_array($request->sections)) {
                $this->syncSections($page, $request->sections, $request);
            }

            DB::commit();

            return redirect()->route('admin.web-pages.index')->with('success', 'Web page created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Error creating page: ' . $e->getMessage());
        }
    }

    public function edit(WebPage $webPage)
    {
        $webPage->load('sections');
        $sectionTypes = config('web_sections.types');
        return view('admin.web-pages.edit', compact('webPage', 'sectionTypes'));
    }

    public function update(Request $request, WebPage $webPage)
    {
        $request->validate(array_merge([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:web_pages,slug,' . $webPage->id,
            'category' => 'nullable|string|max:100',
            'short_description' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'hero_image' => 'nullable|string',
            'hero_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,gif|max:10240',
        ], $this->sectionValidationRules($request)));

        try {
            DB::beginTransaction();

            $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;
            while (WebPage::where('slug', $slug)->where('id', '!=', $webPage->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $heroImagePath = $request->hero_image ?: $webPage->hero_image;
            if ($request->hasFile('hero_image_file')) {
                $path = $request->file('hero_image_file')->store('web-pages/hero', 'public');
                $heroImagePath = 'storage/' . $path;
            }

            $webPage->update([
                'title' => $request->title,
                'slug' => $slug,
                'category' => $request->input('category', 'marketing'),
                'short_description' => $request->short_description,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'hero_image' => $heroImagePath,
                'is_published' => $request->has('is_published'),
            ]);

            // Delete old sections and re-sync
            $webPage->sections()->delete();
            if ($request->has('sections') && is_array($request->sections)) {
                $this->syncSections($webPage, $request->sections, $request);
            }

            DB::commit();

            if ($request->header('referer') && Str::contains($request->header('referer'), 'admin/web-pages') && !Str::contains($request->header('referer'), 'admin/dashboard')) {
                return redirect()->route('admin.web-pages.index')->with('success', 'Web page updated successfully.');
            }

            return redirect()->route('admin.dashboard', ['tab' => 'webpage'])->with('success', 'Web page updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Error updating page: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request, WebPage $webPage)
    {
        $title = $webPage->title;
        $webPage->sections()->delete();
        $webPage->delete();

        if ($request->header('referer') && Str::contains($request->header('referer'), 'admin/web-pages') && !Str::contains($request->header('referer'), 'admin/dashboard')) {
            return redirect()->route('admin.web-pages.index')->with('success', "Web page '{$title}' deleted successfully.");
        }

        return redirect()->route('admin.dashboard', ['tab' => 'webpage'])->with('success', "Web page '{$title}' deleted successfully.");
    }

    public function destroyService(Request $request, $service)
    {
        $serviceModel = is_numeric($service) ? \App\Models\Service::findOrFail($service) : ($service instanceof \App\Models\Service ? $service : \App\Models\Service::where('slug', $service)->firstOrFail());
        $title = $serviceModel->title;
        $serviceModel->delete();

        return redirect()->route('admin.dashboard', ['tab' => 'webpage'])->with('success', "Service '{$title}' deleted successfully.");
    }

    public function destroyTechDevelopment(Request $request, $techDevelopment)
    {
        $techModel = is_numeric($techDevelopment) ? \App\Models\TechDevelopment::findOrFail($techDevelopment) : ($techDevelopment instanceof \App\Models\TechDevelopment ? $techDevelopment : \App\Models\TechDevelopment::where('slug', $techDevelopment)->firstOrFail());
        $title = $techModel->name ?: $techModel->hero_title;
        if (method_exists($techModel, 'sections')) {
            $techModel->sections()->delete();
        }
        $techModel->delete();

        return redirect()->route('admin.dashboard', ['tab' => 'webpage'])->with('success', "Tech development '{$title}' deleted successfully.");
    }

    public function editTechDevelopment($techDevelopment)
    {
        $techModel = is_numeric($techDevelopment)
            ? \App\Models\TechDevelopment::with('sections')->findOrFail($techDevelopment)
            : ($techDevelopment instanceof \App\Models\TechDevelopment
                ? $techDevelopment->load('sections')
                : \App\Models\TechDevelopment::with('sections')->where('slug', $techDevelopment)->firstOrFail());

        return view('admin.tech-developments.edit', ['techDevelopment' => $techModel]);
    }

    public function updateTechDevelopment(Request $request, $techDevelopment)
    {
        $techModel = is_numeric($techDevelopment)
            ? \App\Models\TechDevelopment::findOrFail($techDevelopment)
            : ($techDevelopment instanceof \App\Models\TechDevelopment
                ? $techDevelopment
                : \App\Models\TechDevelopment::where('slug', $techDevelopment)->firstOrFail());

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:tech_developments,slug,' . $techModel->id,
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string|max:2000',
            'short_description' => 'nullable|string|max:2000',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|string|max:1000',
            'hero_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,gif|max:10240',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:2000',
            'is_published' => 'nullable',
            'sections' => 'nullable|array',
        ]);

        try {
            DB::beginTransaction();

            $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);
            $originalSlug = $slug;
            $count = 1;
            while (\App\Models\TechDevelopment::where('slug', $slug)->where('id', '!=', $techModel->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $heroImagePath = $request->hero_image ?: $techModel->hero_image;
            if ($request->hasFile('hero_image_file')) {
                $path = $request->file('hero_image_file')->store('tech-development/hero', 'public');
                $heroImagePath = 'storage/' . $path;
            }

            $techModel->update([
                'name' => $request->name,
                'slug' => $slug,
                'hero_title' => $request->hero_title ?: $request->name,
                'hero_description' => $request->hero_description ?: $request->short_description,
                'short_description' => $request->short_description,
                'description' => $request->description ?: $request->short_description,
                'hero_image' => $heroImagePath,
                'meta_title' => $request->meta_title ?: ($request->name . ' - Retrotech Digital'),
                'meta_description' => $request->meta_description ?: $request->short_description,
                'is_published' => $request->has('is_published') ? (bool) $request->is_published : true,
            ]);

            // Update Sections
            if ($request->has('sections') && is_array($request->sections)) {
                foreach ($request->sections as $secKey => $secData) {
                    $sec = null;
                    if (is_numeric($secKey)) {
                        $sec = \App\Models\TechDevelopmentSection::where('tech_development_id', $techModel->id)->where('id', $secKey)->first();
                    }
                    if (!$sec && !empty($secData['section_type'])) {
                        $sec = \App\Models\TechDevelopmentSection::where('tech_development_id', $techModel->id)->where('section_type', $secData['section_type'])->first();
                    }

                    if ($sec) {
                        if (isset($secData['title'])) {
                            $sec->title = $secData['title'];
                        }
                        if (isset($secData['description'])) {
                            $sec->description = $secData['description'];
                        }
                        if (isset($secData['is_visible'])) {
                            $sec->is_visible = (bool) $secData['is_visible'];
                        }

                        $content = $sec->content ?: [];
                        if (isset($secData['content']) && is_array($secData['content'])) {
                            $incomingContent = $secData['content'];

                            // Filter empty items from repeaters if present
                            if (isset($incomingContent['items']) && is_array($incomingContent['items'])) {
                                $incomingContent['items'] = array_values(array_filter($incomingContent['items'], function ($item) {
                                    if (!is_array($item)) return false;
                                    return !empty(trim($item['title'] ?? '')) || !empty(trim($item['question'] ?? '')) || !empty(trim($item['value'] ?? ''));
                                }));
                            }

                            $content = array_merge($content, $incomingContent);
                        }

                        $sec->content = $content;
                        $sec->save();
                    }
                }
            }

            DB::commit();

            return redirect()->route('admin.dashboard', ['tab' => 'webpage'])->with('success', "Tech development '{$techModel->name}' updated successfully.");
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Error updating tech development: ' . $e->getMessage());
        }
    }

    public function editService($service)
    {
        $serviceModel = is_numeric($service) ? \App\Models\Service::findOrFail($service) : ($service instanceof \App\Models\Service ? $service : \App\Models\Service::where('slug', $service)->firstOrFail());
        
        $sections = collect();
        if (is_array($serviceModel->content)) {
            $sort = 0;
            foreach ($serviceModel->content as $type => $data) {
                $formattedData = $data;
                if ($type === 'topics' && is_array($data)) {
                    $formattedData = ['topics' => implode(', ', $data)];
                } elseif ($type === 'hero' && is_array($data)) {
                    $formattedData = [
                        'badge' => $data['badge'] ?? '',
                        'heading' => $serviceModel->title,
                        'subtitle' => $data['subtitle'] ?? '',
                        'cta_text' => $data['cta'] ?? '',
                        'cta_link' => '#contact',
                        'image' => $serviceModel->hero_image ?? '',
                    ];
                } elseif ($type === 'about' && is_array($data)) {
                    $features = [];
                    if (isset($data['features']) && is_array($data['features'])) {
                        foreach ($data['features'] as $f) {
                            if (is_array($f)) {
                                $features[] = [
                                    'icon' => $f[0] ?? 'fa-solid fa-check',
                                    'title' => $f[1] ?? '',
                                    'description' => $f[2] ?? '',
                                    'bullet' => $f[3] ?? '',
                                ];
                            }
                        }
                    }
                    $formattedData = [
                        'heading' => $data['heading'] ?? '',
                        'paragraph' => $data['paragraph'] ?? '',
                        'items' => $features,
                    ];
                } elseif ($type === 'faqs' && is_array($data)) {
                    $faqItems = [];
                    foreach ($data as $faq) {
                        if (is_array($faq)) {
                            $faqItems[] = [
                                'question' => $faq[0] ?? '',
                                'answer' => $faq[1] ?? '',
                            ];
                        }
                    }
                    $formattedData = ['items' => $faqItems];
                } elseif ($type === 'workflow' && is_array($data)) {
                    $steps = [];
                    foreach ($data as $step) {
                        if (is_array($step)) {
                            $steps[] = [
                                'step_number' => count($steps) + 1,
                                'title' => $step[1] ?? ($step['title'] ?? ''),
                                'description' => $step[2] ?? ($step['description'] ?? ''),
                            ];
                        }
                    }
                    $formattedData = ['items' => $steps];
                } elseif ($type === 'rows' && is_array($data)) {
                    $rowItems = [];
                    foreach ($data as $r) {
                        if (is_array($r)) {
                            $rowItems[] = [
                                'title' => $r[1] ?? '',
                                'description' => $r[2] ?? '',
                                'tag' => $r[3] ?? '',
                            ];
                        }
                    }
                    $formattedData = ['items' => $rowItems];
                } elseif ($type === 'projects' && is_array($data)) {
                    $projItems = [];
                    foreach ($data as $p) {
                        if (is_array($p)) {
                            $projItems[] = [
                                'category' => $p[0] ?? '',
                                'title' => $p[1] ?? '',
                                'stat_number' => is_array($p[2] ?? null) ? ($p[2][2] ?? '') : '',
                            ];
                        }
                    }
                    $formattedData = ['items' => $projItems];
                } elseif ($type === 'cta' && is_array($data)) {
                    $formattedData = [
                        'heading' => $data['heading'] ?? 'Ready to Scale?',
                        'subtitle' => $data['subtitle'] ?? '',
                        'cta_text' => $data['button_text'] ?? 'Get Started Today',
                        'cta_link' => '#contact',
                    ];
                } elseif ($type === 'related' && is_array($data)) {
                    $formattedData = [
                        'related_slugs' => is_array($data) ? implode(', ', $data) : (string)$data,
                    ];
                }

                $sections->push((object) [
                    'id' => 'svc_' . $type,
                    'section_type' => $type,
                    'sort_order' => $sort++,
                    'data' => $formattedData,
                ]);
            }
        }

        $webPage = (object) [
            'id' => $serviceModel->id,
            'title' => $serviceModel->title,
            'slug' => $serviceModel->slug,
            'category' => 'Marketing Service',
            'short_description' => $serviceModel->short_description,
            'meta_title' => $serviceModel->title,
            'meta_description' => $serviceModel->meta_description,
            'hero_image' => $serviceModel->hero_image,
            'is_published' => true,
            'sections' => $sections,
        ];

        $sectionTypes = config('web_sections.types');
        $isService = true;

        return view('admin.web-pages.edit', compact('webPage', 'sectionTypes', 'isService'));
    }

    public function updateService(Request $request, $service)
    {
        $serviceModel = is_numeric($service) ? \App\Models\Service::findOrFail($service) : ($service instanceof \App\Models\Service ? $service : \App\Models\Service::where('slug', $service)->firstOrFail());

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,' . $serviceModel->id,
            'short_description' => 'nullable|string|max:500',
            'meta_description' => 'nullable|string|max:500',
            'hero_image' => 'nullable|string',
            'hero_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,gif|max:10240',
            'sections' => 'nullable|array',
        ]);

        try {
            DB::beginTransaction();

            $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;
            while (\App\Models\Service::where('slug', $slug)->where('id', '!=', $serviceModel->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $heroImagePath = $request->hero_image ?: $serviceModel->hero_image;
            if ($request->hasFile('hero_image_file')) {
                $path = $request->file('hero_image_file')->store('services/hero', 'public');
                $heroImagePath = 'storage/' . $path;
            }

            $content = $serviceModel->content ?: [];
            if ($request->has('sections') && is_array($request->sections)) {
                $content = [];
                foreach ($request->sections as $secIndex => $secData) {
                    $type = $secData['type'] ?? '';
                    if (!$type) continue;
                    $data = $secData['data'] ?? [];

                    // Handle file uploads in repeater or fields
                    if ($request->hasFile("sections.{$secIndex}.data")) {
                        foreach ($request->file("sections.{$secIndex}.data") as $fieldName => $uploadedFile) {
                            if (is_array($uploadedFile)) {
                                foreach ($uploadedFile as $repIndex => $repFile) {
                                    if ($repFile && $repFile->isValid()) {
                                        $fPath = $repFile->store('services/sections', 'public');
                                        $data['items'][$repIndex][$fieldName] = 'storage/' . $fPath;
                                    }
                                }
                            } elseif ($uploadedFile && $uploadedFile->isValid()) {
                                $fPath = $uploadedFile->store('services/sections', 'public');
                                $data[$fieldName] = 'storage/' . $fPath;
                            }
                        }
                    }

                    if ($type === 'topics' && isset($data['topics'])) {
                        $content[$type] = array_map('trim', explode(',', $data['topics']));
                    } elseif ($type === 'hero') {
                        $content[$type] = [
                            'badge' => $data['badge'] ?? '',
                            'subtitle' => $data['subtitle'] ?? '',
                            'cta' => $data['cta_text'] ?? 'Connect With Our Experts',
                        ];
                    } elseif ($type === 'about') {
                        $rawItems = $data['items'] ?? [];
                        $features = [];
                        foreach ($rawItems as $item) {
                            $features[] = [
                                $item['icon'] ?? 'check',
                                $item['title'] ?? '',
                                $item['description'] ?? '',
                                $item['bullet'] ?? '',
                            ];
                        }
                        $content[$type] = [
                            'heading' => $data['heading'] ?? '',
                            'paragraph' => $data['paragraph'] ?? '',
                            'features' => $features,
                        ];
                    } elseif ($type === 'faqs') {
                        $rawItems = $data['items'] ?? [];
                        $faqs = [];
                        foreach ($rawItems as $item) {
                            $faqs[] = [
                                $item['question'] ?? '',
                                $item['answer'] ?? '',
                            ];
                        }
                        $content[$type] = $faqs;
                    } elseif ($type === 'workflow') {
                        $rawItems = $data['items'] ?? [];
                        $workflow = [];
                        foreach ($rawItems as $item) {
                            $workflow[] = [
                                'check',
                                $item['title'] ?? '',
                                $item['description'] ?? '',
                            ];
                        }
                        $content[$type] = $workflow;
                    } elseif ($type === 'rows') {
                        $rawItems = $data['items'] ?? [];
                        $rows = [];
                        foreach ($rawItems as $item) {
                            $rows[] = [
                                'list',
                                $item['title'] ?? '',
                                $item['description'] ?? '',
                                $item['tag'] ?? 'service',
                            ];
                        }
                        $content[$type] = $rows;
                    } elseif ($type === 'projects') {
                        $rawItems = $data['items'] ?? [];
                        $projects = [];
                        foreach ($rawItems as $item) {
                            $projects[] = [
                                $item['category'] ?? 'Service',
                                $item['title'] ?? '',
                                [500, 750, $item['stat_number'] ?? '250%'],
                                [2000, 3000, $item['stat_number'] ?? '250%'],
                                'proj-' . Str::slug($item['title'] ?? 'sample'),
                            ];
                        }
                        $content[$type] = $projects;
                    } elseif ($type === 'cta') {
                        $content[$type] = [
                            'heading' => $data['heading'] ?? 'Ready to Scale?',
                            'subtitle' => $data['subtitle'] ?? '',
                            'button_text' => $data['cta_text'] ?? 'Get Started Today',
                            'button_link' => $data['cta_link'] ?? '#contact',
                        ];
                    } elseif ($type === 'related') {
                        $related = isset($data['related_slugs']) ? array_map('trim', explode(',', $data['related_slugs'])) : [];
                        $content[$type] = $related;
                    } else {
                        $content[$type] = $data;
                    }
                }
            }

            $serviceModel->update([
                'title' => $request->title,
                'slug' => $slug,
                'short_description' => $request->short_description,
                'meta_description' => $request->meta_description,
                'hero_image' => $heroImagePath,
                'content' => $content,
            ]);

            DB::commit();

            return redirect()->route('admin.dashboard', ['tab' => 'webpage'])->with('success', "Service '{$serviceModel->title}' updated successfully.");

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Error updating service: ' . $e->getMessage());
        }
    }

    protected function sectionValidationRules(Request $request): array
    {
        $sectionTypes = config('web_sections.types', []);
        $rules = [
            'sections' => ['nullable', 'array'],
            'sections.*' => ['array'],
            'sections.*.type' => ['required', 'string', Rule::in(array_keys($sectionTypes))],
            'sections.*.fields' => ['nullable', 'array'],
            'sections.*.files' => ['nullable', 'array'],
            'sections.*.items' => ['nullable', 'array'],
            'sections.*.items.*' => ['array'],
            'sections.*.item_files' => ['nullable', 'array'],
        ];

        $submittedSections = $request->input('sections', []);
        foreach (is_array($submittedSections) ? $submittedSections : [] as $index => $sectionData) {
            if (!is_array($sectionData)) {
                continue;
            }

            $sectionConfig = $sectionTypes[$sectionData['type'] ?? ''] ?? null;
            if (!$sectionConfig) {
                continue;
            }

            foreach ($sectionConfig['fields'] ?? [] as $field) {
                $fieldName = $field['name'];
                $fieldPath = "sections.{$index}.fields.{$fieldName}";

                if (($field['type'] ?? '') === 'image') {
                    $filePath = "sections.{$index}.files.{$fieldName}";
                    $rules[$fieldPath] = !empty($field['required'])
                        ? ["required_without:{$filePath}", 'string']
                        : ['nullable', 'string'];
                    $rules[$filePath] = ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg,gif', 'max:10240'];
                    continue;
                }

                $rules[$fieldPath] = !empty($field['required'])
                    ? ['required', 'string']
                    : ['nullable', 'string'];
            }

            foreach ($sectionConfig['repeater']['fields'] ?? [] as $field) {
                $fieldName = $field['name'];
                $fieldPath = "sections.{$index}.items.*.{$fieldName}";

                if (($field['type'] ?? '') === 'image') {
                    $rules[$fieldPath] = ['nullable', 'string'];
                    $rules["sections.{$index}.item_files.*.{$fieldName}"] = [
                        'nullable',
                        'image',
                        'mimes:jpeg,png,jpg,webp,svg,gif',
                        'max:10240',
                    ];
                    continue;
                }

                $rules[$fieldPath] = !empty($field['required'])
                    ? ['required', 'string']
                    : ['nullable', 'string'];
            }
        }

        return $rules;
    }

    /**
     * Helper to parse and store sections including file uploads
     */
    protected function syncSections(WebPage $page, array $sections, Request $request)
    {
        foreach ($sections as $index => $sectionData) {
            $type = $sectionData['type'] ?? '';
            $sectionConfig = config('web_sections.types.' . $type);
            if (!$sectionConfig) {
                continue;
            }

            $content = [];

            // 1. Process top-level fields
            if (isset($sectionConfig['fields'])) {
                foreach ($sectionConfig['fields'] as $field) {
                    $fieldName = $field['name'];
                    $val = $sectionData['fields'][$fieldName] ?? null;
                    
                    // Handle file upload for image field
                    if (($field['type'] ?? '') === 'image') {
                        if ($request->hasFile("sections.{$index}.files.{$fieldName}")) {
                            $file = $request->file("sections.{$index}.files.{$fieldName}");
                            $path = $file->store('web-pages/sections', 'public');
                            $val = 'storage/' . $path;
                        }
                    }

                    if ($fieldName === 'topics' || $fieldName === 'slugs') {
                        $content[$fieldName] = is_array($val) 
                            ? $val 
                            : array_values(array_filter(array_map('trim', explode(',', $val ?? ''))));
                    } else {
                        $content[$fieldName] = $val;
                    }
                }
            }

            // 2. Process repeater items
            if (isset($sectionConfig['repeater']) && isset($sectionData['items']) && is_array($sectionData['items'])) {
                $items = [];
                foreach ($sectionData['items'] as $itemIndex => $itemData) {
                    $item = $itemData;
                    if (isset($sectionConfig['repeater']['fields'])) {
                        foreach ($sectionConfig['repeater']['fields'] as $rf) {
                            $rfName = $rf['name'];
                            if (($rf['type'] ?? '') === 'image') {
                                if ($request->hasFile("sections.{$index}.item_files.{$itemIndex}.{$rfName}")) {
                                    $file = $request->file("sections.{$index}.item_files.{$itemIndex}.{$rfName}");
                                    $path = $file->store('web-pages/sections', 'public');
                                    $item[$rfName] = 'storage/' . $path;
                                } else {
                                    $item[$rfName] = $itemData[$rfName] ?? null;
                                }
                            }
                        }
                    }
                    $items[] = $item;
                }
                $content['items'] = $items;
            }

            WebPageSection::create([
                'web_page_id' => $page->id,
                'section_type' => $type,
                'title' => $sectionData['fields']['heading'] ?? $sectionData['fields']['title'] ?? ($sectionConfig['label'] ?? null), 
                'description' => $sectionData['fields']['subtitle'] ?? $sectionData['fields']['description'] ?? $sectionData['fields']['paragraph'] ?? null,
                'content' => $content,
                'sort_order' => $index,
                'is_visible' => true,
            ]);
        }
    }
}
