@extends('layouts.admin')

@section('title', ($isCreate ? 'Create Webpage' : 'Webpage Settings') . ' - Retrotech Admin')
@section('page_heading', $isCreate ? 'Create Webpage' : 'Webpage Settings')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/seo-service.css') }}?v={{ filemtime(public_path('css/seo-service.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/seo-landing.css') }}?v={{ filemtime(public_path('css/seo-landing.css')) }}">
    <style>
        .webpages-admin-card {
            background: #ffffff;
            border: 1px solid #d8e6db;
            border-radius: 16px;
            padding: 2rem 2.25rem;
            box-shadow: 0 4px 20px rgba(20, 40, 26, 0.04);
            margin-bottom: 2rem;
        }
        .webpages-nav-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }
        .webpages-sub-link {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.6rem 1.1rem;
            border: 1px solid #cfdad1;
            border-radius: 9px;
            background: #ffffff;
            color: #24412e;
            font-weight: 650;
            font-size: 0.88rem;
            text-decoration: none;
            transition: all 0.2s;
        }
        .webpages-sub-link:hover {
            background: #f0f6f1;
            border-color: #27623c;
            color: #173622;
        }
        .webpages-sub-link.primary {
            background: #27623c;
            border-color: #27623c;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(39, 98, 60, 0.18);
        }
        .webpages-sub-link.primary:hover {
            background: #1c472c;
        }
        .webpages-form-intro {
            border-bottom: 1px solid #e7efe9;
            padding-bottom: 1.25rem;
            margin-bottom: 1.75rem;
        }
        .webpages-form-intro h2 {
            font-size: 1.4rem;
            font-weight: 800;
            color: #173622;
            margin: 0.25rem 0 0.4rem;
            letter-spacing: -0.02em;
        }
        .webpages-form-intro p {
            color: #617268;
            font-size: 0.95rem;
            margin: 0;
            line-height: 1.55;
        }
    </style>
@endpush

@section('admin-content')
<div style="max-width: 1000px; margin: 0 auto;">

    <div class="webpages-nav-actions">
        <a href="{{ route('admin.webpages.index') }}" class="webpages-sub-link">
            <i class="fa-solid fa-arrow-left"></i> All Webpages
        </a>
        <div style="display: flex; gap: 0.65rem; flex-wrap: wrap;">
            @unless($isCreate)
                <a href="{{ route('admin.webpages.editor', $service) }}" class="webpages-sub-link primary">
                    <i class="fa-solid fa-cubes"></i> Visual Sections Editor
                </a>
                <a href="{{ route('webpages.show', ['section' => $service->page_section, 'slug' => $service->slug]) }}" target="_blank" rel="noopener" class="webpages-sub-link">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Page
                </a>
            @endunless
        </div>
    </div>

    <form class="webpages-admin-card" action="{{ $isCreate ? route('admin.webpages.store') : route('admin.webpages.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @unless($isCreate)@method('PUT')@endunless

        <div class="webpages-form-intro">
            <span class="seo-eyebrow">STEP 1 · PAGE DETAILS &amp; SEARCH ENGINE SETTINGS</span>
            <h2>{{ $isCreate ? 'Create a New Webpage' : 'Webpage Settings' }}</h2>
            <p>Configure page identity, website section, and URL slug, then build and rearrange content components in the visual sections editor.</p>
        </div>

        @if($errors->any())
            <div class="seo-editor-flash" style="border-color:#e5b9b9;background:#fff3f3;color:#8f2727; margin-bottom: 1.5rem;">
                <i class="fa-solid fa-circle-exclamation" style="margin-right: 6px;"></i> Please check the highlighted form values below and try again.
            </div>
        @endif

        <div class="seo-settings-fields">
            <div class="seo-settings-field full">
                <label for="title">Page Title *</label>
                <input id="title" name="title" value="{{ old('title', $service->title) }}" required maxlength="200" placeholder="e.g. Search Engine Optimization">
                @error('title')<small style="color: #c53030;">{{ $message }}</small>@enderror
            </div>
            
            <div class="seo-settings-field">
                <label for="page_section">Website Section *</label>
                <select id="page_section" name="page_section" required>
                    @foreach($sectionOptions as $key => $label)
                        <option value="{{ $key }}" @selected(old('page_section', $service->page_section ?: 'services') === $key)>{{ $label }}</option>
                    @endforeach
                </select>
                @error('page_section')<small style="color: #c53030;">{{ $message }}</small>@enderror
            </div>

            <div class="seo-settings-field">
                <label for="slug">URL Slug *</label>
                <input id="slug" name="slug" value="{{ old('slug', $service->slug) }}" required maxlength="120" pattern="[a-z0-9-]+" placeholder="e.g. search-engine-optimization">
                @error('slug')<small style="color: #c53030;">{{ $message }}</small>@enderror
            </div>

            <div class="seo-settings-field full seo-url-preview">
                <label>Live URL Preview</label>
                <code id="pageUrlPreview" style="font-size: 0.92rem; padding: 0.75rem 1rem;">/{{ old('page_section', $service->page_section ?: 'services') }}/{{ old('slug', $service->slug ?: 'your-page') }}</code>
            </div>

            <div class="seo-settings-field full">
                <label for="short_description">Short Description (Summary)</label>
                <textarea id="short_description" name="short_description" maxlength="500" placeholder="Brief summary of this service or page...">{{ old('short_description', $service->short_description) }}</textarea>
            </div>

            <div class="seo-settings-field full">
                <label for="description">Full Page Description</label>
                <textarea id="description" name="description" maxlength="10000" placeholder="Detailed description of the page...">{{ old('description', $service->description) }}</textarea>
            </div>

            <div class="seo-settings-field full">
                <label for="meta_title">SEO Meta Title</label>
                <input id="meta_title" name="meta_title" value="{{ old('meta_title', $service->meta_title) }}" maxlength="255" placeholder="e.g. Best SEO Services Company | Retrotech Digital">
            </div>

            <div class="seo-settings-field full">
                <label for="meta_description">SEO Meta Description</label>
                <textarea id="meta_description" name="meta_description" maxlength="1000" placeholder="Meta description for search engine ranking (150-160 characters recommended)...">{{ old('meta_description', $service->meta_description) }}</textarea>
            </div>

            <div class="seo-settings-field full">
                <label for="meta_keywords">Meta Keywords (Comma separated)</label>
                <input id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $service->meta_keywords) }}" maxlength="1000" placeholder="seo services, technical seo, local seo, google ranking">
            </div>

            <div class="seo-settings-field full">
                <label for="og_image">Social Preview Image URL or Path</label>
                <input id="og_image" name="og_image" value="{{ old('og_image', $service->og_image) }}" maxlength="500" placeholder="https://example.com/image.jpg or assets/images/...">
                @if($service->og_image)
                    <div style="margin-top: 8px;">
                        <img class="seo-existing-image" src="{{ str_starts_with($service->og_image, 'http') ? $service->og_image : (str_starts_with($service->og_image, 'assets/') || str_starts_with($service->og_image, 'storage/') ? asset($service->og_image) : asset('storage/' . $service->og_image)) }}" alt="Current social preview image">
                    </div>
                @endif
                <label for="og_image_file" style="margin-top: 10px;">Or Upload a Replacement Image</label>
                <input id="og_image_file" type="file" name="og_image_file" accept="image/jpeg,image/png,image/webp,image/gif">
            </div>

            <div class="seo-settings-field full">
                <label for="schema_markup">Custom Schema Markup (JSON-LD)</label>
                <textarea id="schema_markup" name="schema_markup" rows="8" style="font-family: Consolas, Monaco, monospace; font-size: 0.88rem; line-height: 1.55;" placeholder='Paste custom JSON-LD schema or leave empty for auto-generated Service schema...'>{{ old('schema_markup', $service->schema_markup) }}</textarea>
                <small style="color: #617867;">Leave empty to automatically generate Google Service &amp; FAQPage schemas from page content.</small>
            </div>
        </div>

        <div class="seo-settings-footer" style="padding-top: 1.5rem; border-top: 1px solid #e7efe9; margin-top: 2rem;">
            <a href="{{ route('admin.webpages.index') }}" style="color: #617268; font-weight: 600;">
                <i class="fa-solid fa-arrow-left"></i> Cancel and Return
            </a>
            <button type="submit" style="background: #27623c; padding: 0.85rem 1.75rem; border-radius: 10px; font-weight: 700;">
                <i class="fa-solid fa-floppy-disk" style="margin-right: 6px;"></i> {{ $isCreate ? 'Create and Continue to Visual Editor' : 'Save Settings and Continue' }}
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
const sectionInput = document.getElementById('page_section');
const slugInput = document.getElementById('slug');
const urlPreview = document.getElementById('pageUrlPreview');
function updatePageUrlPreview() {
    if (urlPreview && sectionInput && slugInput) {
        urlPreview.textContent = `/${sectionInput.value}/${slugInput.value || 'your-page'}`;
    }
}
sectionInput?.addEventListener('change', updatePageUrlPreview);
slugInput?.addEventListener('input', updatePageUrlPreview);
</script>
@endpush
