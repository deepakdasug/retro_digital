<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebPage;
use App\Models\WebPageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class WebPageController extends Controller
{
    public function index()
    {
        $pages = WebPage::orderBy('sort_order')->latest()->get();
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
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:web_pages,slug',
            'short_description' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'hero_image' => 'nullable|string',
            'hero_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'sections' => 'nullable|array',
        ]);

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
                $path = $request->file('hero_image_file')->store('hero-images', 'public');
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
                foreach ($request->sections as $index => $sectionData) {
                    $content = [];
                    $sectionConfig = config('web_sections.types.' . $sectionData['type']);

                    if (isset($sectionConfig['fields'])) {
                        foreach ($sectionConfig['fields'] as $field) {
                            // FIX: Look inside the 'fields' array
                            $val = $sectionData['fields'][$field['name']] ?? null;
                            
                            if ($field['name'] === 'topics' || $field['name'] === 'slugs') {
                                $content[$field['name']] = array_map('trim', explode(',', $val ?? ''));
                            } else {
                                $content[$field['name']] = $val;
                            }
                        }
                    }

                    if (isset($sectionConfig['repeater']) && isset($sectionData['items'])) {
                        $content['items'] = array_values($sectionData['items']);
                    }

                    WebPageSection::create([
                        'web_page_id' => $page->id,
                        'section_type' => $sectionData['type'],
                        'title' => $sectionData['fields']['title'] ?? null, 
                        'description' => $sectionData['fields']['description'] ?? null,
                        'content' => $content,
                        'sort_order' => $index,
                        'is_visible' => true,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('admin.web-pages.index')->with('success', 'Web page created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            // Kept for debugging
            dd('ERROR CAUGHT: ' . $e->getMessage(), $e->getTraceAsString());
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
        return back()->with('info', 'Update functionality coming in the next step.');
    }

    public function destroy(WebPage $webPage)
    {
        $webPage->delete();
        return redirect()->route('admin.web-pages.index')->with('success', 'Web page deleted.');
    }
}