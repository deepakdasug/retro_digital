@extends('layouts.admin')

@section('title', ($isCreate ? 'Create Industry' : 'Industry Settings') . ' - Retrotech Admin')
@section('page_heading', $isCreate ? 'Create Industry' : 'Industry Settings')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/seo-service.css') }}?v={{ filemtime(public_path('css/seo-service.css')) }}">
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
        <a href="{{ route('admin.industries.index') }}" class="webpages-sub-link">
            <i class="fa-solid fa-arrow-left"></i> All Industries
        </a>
        <div style="display: flex; gap: 0.65rem; flex-wrap: wrap;">
            @unless($isCreate)
                <a href="{{ route('admin.industries.editor', $industry) }}" class="webpages-sub-link primary">
                    <i class="fa-solid fa-cubes"></i> Visual Sections Editor
                </a>
                @if($industry->is_published)
                    <a href="{{ route('industries.show', ['slug' => $industry->slug]) }}" target="_blank" rel="noopener" class="webpages-sub-link">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Page
                    </a>
                @endif
            @endunless
        </div>
    </div>

    <form class="webpages-admin-card" action="{{ $isCreate ? route('admin.industries.store') : route('admin.industries.update', $industry) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @unless($isCreate)@method('PUT')@endunless

        <div class="webpages-form-intro">
            <span class="seo-eyebrow">STEP 1 · INDUSTRY DETAILS &amp; SEARCH ENGINE SETTINGS</span>
            <h2>{{ $isCreate ? 'Create a New Industry Page' : 'Industry Page Settings' }}</h2>
            <p>Configure identity, URL slug, and SEO metadata, then edit every visual block of <code>industries.layout</code> in the Visual Sections Editor.</p>
        </div>

        @if($errors->any())
            <div class="seo-editor-flash" style="border-color:#e5b9b9;background:#fff3f3;color:#8f2727; margin-bottom: 1.5rem;">
                <i class="fa-solid fa-circle-exclamation" style="margin-right: 6px;"></i> Please check the highlighted form values below and try again.
            </div>
        @endif

        <div class="seo-settings-fields">
            <div class="seo-settings-field">
                <label for="name">Industry Name *</label>
                <input id="name" name="name" value="{{ old('name', $industry->name) }}" required maxlength="200" placeholder="e.g. Ecommerce & Multivendor">
                @error('name')<small style="color: #c53030;">{{ $message }}</small>@enderror
            </div>

            <div class="seo-settings-field">
                <label for="slug">URL Slug *</label>
                <input id="slug" name="slug" value="{{ old('slug', $industry->slug) }}" required maxlength="140" pattern="[a-z0-9-]+" placeholder="e.g. ecommerce-multivendor">
                @error('slug')<small style="color: #c53030;">{{ $message }}</small>@enderror
            </div>

            <div class="seo-settings-field">
                <label for="icon">Font Awesome Icon Class</label>
                <input id="icon" name="icon" value="{{ old('icon', $industry->icon) }}" maxlength="100" placeholder="e.g. fa-solid fa-cart-shopping">
            </div>

            <div class="seo-settings-field">
                <label for="sort_order">Sort Order</label>
                <input id="sort_order" type="number" min="0" name="sort_order" value="{{ old('sort_order', $industry->sort_order ?? 0) }}">
            </div>

            <div class="seo-settings-field full">
                <label style="display:inline-flex; align-items:center; gap:0.55rem; cursor:pointer;">
                    <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $industry->is_published))>
                    <span>Published (live at <code>/who-we-serve/{{ old('slug', $industry->slug ?: 'slug') }}</code>)</span>
                </label>
            </div>

            <div class="seo-settings-field full seo-url-preview">
                <label>Live URL Preview</label>
                <code id="industryUrlPreview" style="font-size: 0.92rem; padding: 0.75rem 1rem;">/who-we-serve/{{ old('slug', $industry->slug ?: 'your-industry') }}</code>
            </div>

            <div class="seo-settings-field full">
                <label for="short_description">Short Summary</label>
                <input id="short_description" name="short_description" value="{{ old('short_description', $industry->short_description) }}" maxlength="255" placeholder="Brief summary shown in industry listings and fallbacks">
            </div>

            <div class="seo-settings-field">
                <label for="meta_title">SEO Meta Title</label>
                <input id="meta_title" name="meta_title" value="{{ old('meta_title', $industry->meta_title) }}" maxlength="255" placeholder="e.g. Ecommerce Software & Digital Solutions | Retrotech Digital">
            </div>

            <div class="seo-settings-field">
                <label for="canonical_url">Canonical URL Override (optional)</label>
                <input id="canonical_url" name="canonical_url" value="{{ old('canonical_url', $industry->canonical_url) }}" maxlength="2048" placeholder="Leave blank to use /who-we-serve/{slug}">
            </div>

            <div class="seo-settings-field full">
                <label for="meta_description">SEO Meta Description</label>
                <textarea id="meta_description" name="meta_description" maxlength="1000" placeholder="Meta description for search engines (150-160 characters recommended)...">{{ old('meta_description', $industry->meta_description) }}</textarea>
            </div>

            <div class="seo-settings-field full">
                <label for="meta_keywords">Meta Keywords (Comma separated)</label>
                <input id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $industry->meta_keywords) }}" maxlength="1000" placeholder="ecommerce software, multivendor marketplace, custom web apps">
            </div>

            <div class="seo-settings-field full">
                <label for="og_image">Social Preview Image URL or Path</label>
                <input id="og_image" name="og_image" value="{{ old('og_image', $industry->og_image) }}" maxlength="500" placeholder="https://example.com/image.jpg or assets/images/...">
                @if($industry->og_image)
                    <div style="margin-top: 8px;">
                        <img class="seo-existing-image" src="{{ \App\Support\ImageUrl::resolve($industry->og_image) }}" alt="Current social preview image">
                    </div>
                @endif
                <label for="og_image_file" style="margin-top: 10px;">Or Upload a Replacement Image</label>
                <input id="og_image_file" type="file" name="og_image_file" accept="image/jpeg,image/png,image/webp,image/gif">
            </div>

            <div class="seo-settings-field full">
                <label for="schema_markup">Custom Schema Markup (JSON-LD)</label>
                <textarea id="schema_markup" name="schema_markup" rows="6" style="font-family: Consolas, Monaco, monospace; font-size: 0.88rem; line-height: 1.55;" placeholder="Leave empty to auto-generate Service & FAQPage JSON-LD schema...">{{ old('schema_markup', $industry->schema_markup) }}</textarea>
            </div>
        </div>

        <div class="seo-settings-footer" style="padding-top: 1.5rem; border-top: 1px solid #e7efe9; margin-top: 2rem;">
            <a href="{{ route('admin.industries.index') }}" style="color: #617268; font-weight: 600;">
                <i class="fa-solid fa-arrow-left"></i> Cancel and Return
            </a>
            <button type="submit" style="background: #27623c; padding: 0.85rem 1.75rem; border-radius: 10px; font-weight: 700;">
                <i class="fa-solid fa-floppy-disk" style="margin-right: 6px;"></i> {{ $isCreate ? 'Create and Continue to Visual Editor' : 'Save Settings and Open Visual Editor' }}
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
const nameInput = document.getElementById('name');
const slugInput = document.getElementById('slug');
const urlPreview = document.getElementById('industryUrlPreview');
let slugEditedManually = Boolean(slugInput?.value);

function slugify(text) {
    return String(text || '')
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '');
}

function updateIndustryUrlPreview() {
    if (urlPreview && slugInput) {
        urlPreview.textContent = `/who-we-serve/${slugInput.value || 'your-industry'}`;
    }
}

nameInput?.addEventListener('input', () => {
    if (!slugEditedManually && slugInput) {
        slugInput.value = slugify(nameInput.value);
        updateIndustryUrlPreview();
    }
});

slugInput?.addEventListener('input', () => {
    slugEditedManually = slugInput.value.trim() !== '';
    updateIndustryUrlPreview();
});
</script>
@endpush
