<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class IndustryController extends Controller
{
    private const SECTION_IMAGE_FIELDS = ['hero_image', 'intro_image', 'spotlight_image'];

    public function index()
    {
        $industries = Industry::ordered()->paginate(20);

        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        $industry = new Industry([
            'is_published' => true,
            'sort_order' => (Industry::max('sort_order') ?? 0) + 1,
        ]);

        return view('admin.industries.settings', [
            'industry' => $industry,
            'isCreate' => true,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedSettings($request);
        $industry = Industry::create($data);

        return redirect()
            ->route('admin.industries.editor', $industry)
            ->with('success', 'Industry created. Edit its sections in the visual editor.');
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.settings', [
            'industry' => $industry,
            'isCreate' => false,
        ]);
    }

    public function update(Request $request, Industry $industry)
    {
        $data = $this->validatedSettings($request, $industry);
        $industry->update($data);

        return redirect()
            ->route('admin.industries.editor', $industry)
            ->with('success', 'Industry settings saved.');
    }

    public function editor(Industry $industry)
    {
        $sectionsMeta = [
            'hero' => 'Hero Banner',
            'intro' => 'Overview / Intro',
            'features' => 'Core Capabilities Grid',
            'reasons' => 'Solutions & Value Pillars',
            'spotlight' => 'Security & Governance Spotlight',
            'faq' => 'Industry FAQs',
            'cta' => 'Closing Call to Action',
        ];

        return view('admin.industries.editor', compact('industry', 'sectionsMeta'));
    }

    public function savePage(Request $request, Industry $industry)
    {
        $rules = [
            // 1. Hero
            'hero_eyebrow' => ['nullable', 'string', 'max:120'],
            'hero_title' => ['nullable', 'string', 'max:255'],
            'hero_description' => ['nullable', 'string'],
            'hero_cta_text' => ['nullable', 'string', 'max:80'],
            'hero_cta_link' => ['nullable', 'string', 'max:500'],
            'hero_secondary_text' => ['nullable', 'string', 'max:80'],
            'hero_secondary_link' => ['nullable', 'string', 'max:500'],
            'hero_index_label' => ['nullable', 'string', 'max:120'],

            // 2. Intro
            'intro_eyebrow' => ['nullable', 'string', 'max:120'],
            'intro_heading' => ['nullable', 'string', 'max:255'],
            'intro_description' => ['nullable', 'string'],
            'intro_link_text' => ['nullable', 'string', 'max:100'],
            'intro_link_url' => ['nullable', 'string', 'max:500'],
            'intro_note_title' => ['nullable', 'string', 'max:150'],
            'intro_note_text' => ['nullable', 'string', 'max:300'],

            // 3. Features
            'features_eyebrow' => ['nullable', 'string', 'max:120'],
            'features_heading' => ['nullable', 'string', 'max:255'],
            'features_description' => ['nullable', 'string'],
            'features' => ['nullable', 'array', 'max:12'],
            'features.*.icon' => ['nullable', 'string', 'max:100'],
            'features.*.title' => ['nullable', 'string', 'max:160'],
            'features.*.description' => ['nullable', 'string', 'max:1000'],

            // 4. Reasons
            'reasons_eyebrow' => ['nullable', 'string', 'max:120'],
            'reasons_heading' => ['nullable', 'string', 'max:255'],
            'reasons_description' => ['nullable', 'string'],
            'reasons' => ['nullable', 'array', 'max:12'],
            'reasons.*.title' => ['nullable', 'string', 'max:160'],
            'reasons.*.description' => ['nullable', 'string', 'max:1000'],

            // 5. Spotlight
            'spotlight_eyebrow' => ['nullable', 'string', 'max:120'],
            'spotlight_heading' => ['nullable', 'string', 'max:255'],
            'spotlight_description' => ['nullable', 'string'],

            // 6. FAQs
            'faq_eyebrow' => ['nullable', 'string', 'max:120'],
            'faq_heading' => ['nullable', 'string', 'max:255'],
            'faq_description' => ['nullable', 'string'],
            'faqs' => ['nullable', 'array', 'max:15'],
            'faqs.*.question' => ['nullable', 'string', 'max:300'],
            'faqs.*.answer' => ['nullable', 'string', 'max:3000'],

            // 7. CTA
            'cta_eyebrow' => ['nullable', 'string', 'max:120'],
            'cta_heading' => ['nullable', 'string', 'max:255'],
            'cta_description' => ['nullable', 'string'],
            'cta_primary_text' => ['nullable', 'string', 'max:80'],
            'cta_primary_link' => ['nullable', 'string', 'max:500'],
            'cta_whatsapp_text' => ['nullable', 'string', 'max:80'],
            'cta_whatsapp_link' => ['nullable', 'string', 'max:500'],
        ];

        foreach (self::SECTION_IMAGE_FIELDS as $field) {
            $rules[$field] = ['nullable', 'string', 'max:500'];
            $rules[$field . '_file'] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'];
        }

        $validated = $request->validate($rules);

        foreach (self::SECTION_IMAGE_FIELDS as $field) {
            if ($request->hasFile($field . '_file')) {
                $validated[$field] = $request->file($field . '_file')->store('industries', 'public');
            }
            unset($validated[$field . '_file']);
        }

        $validated['features'] = collect($validated['features'] ?? [])
            ->filter(fn ($item) => is_array($item) && (filled($item['title'] ?? null) || filled($item['description'] ?? null)))
            ->values()
            ->all();

        $validated['reasons'] = collect($validated['reasons'] ?? [])
            ->filter(fn ($item) => is_array($item) && (filled($item['title'] ?? null) || filled($item['description'] ?? null)))
            ->values()
            ->all();

        $validated['faqs'] = collect($validated['faqs'] ?? [])
            ->filter(fn ($item) => is_array($item) && filled($item['question'] ?? null) && filled($item['answer'] ?? null))
            ->values()
            ->all();

        $industry->update($validated);

        return redirect()
            ->route('admin.industries.editor', $industry)
            ->with('success', 'Your industry page was saved successfully. All changes are now live.')
            ->with('page_saved', true);
    }

    public function destroy(Industry $industry)
    {
        $name = $industry->name;
        $industry->delete();

        return redirect()
            ->route('admin.industries.index')
            ->with('success', "Industry \"{$name}\" deleted.");
    }

    private function validatedSettings(Request $request, ?Industry $industry = null): array
    {
        $slugInput = $request->input('slug') ?: $request->input('name', '');
        $request->merge(['slug' => Str::slug((string) $slugInput)]);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'slug' => [
                'required',
                'string',
                'max:140',
                'regex:/^[a-z0-9-]+$/',
                Rule::unique('industries', 'slug')->ignore($industry?->id),
            ],
            'icon' => ['nullable', 'string', 'max:100'],
            'short_description' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'meta_keywords' => ['nullable', 'string', 'max:1000'],
            'canonical_url' => ['nullable', 'string', 'max:2048'],
            'og_image' => ['nullable', 'string', 'max:500'],
            'og_image_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
            'schema_markup' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('og_image_file')) {
            $validated['og_image'] = $request->file('og_image_file')->store('industries/seo', 'public');
        }
        unset($validated['og_image_file']);

        $validated['is_published'] = $request->boolean('is_published');
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        return $validated;
    }
}
