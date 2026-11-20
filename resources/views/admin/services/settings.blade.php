@extends('layouts.service-editor')

@section('title', $isCreate ? 'Create Webpage' : 'Webpage Settings')

@section('content')
<header class="seo-editor-topbar">
    <a class="seo-editor-brand" href="{{ route('admin.dashboard', ['tab' => 'webpage']) }}">
        <img src="{{ asset('assets/images/retrotech-mark.png') }}" alt="">
        <span>Retrotech Digital · Admin</span>
    </a>
    <div class="seo-editor-actions">
        <a href="{{ route('admin.webpages.index') }}">All webpages</a>
        @unless($isCreate)
            <a href="{{ route('admin.webpages.editor', $service) }}">Visual editor</a>
            <a href="{{ route('webpages.show', ['section' => $service->page_section, 'slug' => $service->slug]) }}" target="_blank" rel="noopener">View live page</a>
        @endunless
    </div>
</header>

<main class="seo-settings-page">
    @if(session('success'))<div class="seo-editor-flash">{{ session('success') }}</div>@endif
    <form class="seo-settings-card" action="{{ $isCreate ? route('admin.webpages.store') : route('admin.webpages.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @unless($isCreate)@method('PUT')@endunless
        <span class="seo-eyebrow">Page 1 of 2 · Page details and search settings</span>
        <h1>{{ $isCreate ? 'Create a webpage' : 'Webpage settings' }}</h1>
        <p>Choose a site section and address, then continue to the visual editor to build the page from reusable sections.</p>

        @if($errors->any())
            <div class="seo-editor-flash" style="border-color:#e5b9b9;background:#fff3f3;color:#8f2727">Please check the highlighted form values and try again.</div>
        @endif

        <div class="seo-settings-fields">
            <div class="seo-settings-field full">
                <label for="title">Page title</label>
                <input id="title" name="title" value="{{ old('title', $service->title) }}" required maxlength="200">
                @error('title')<small>{{ $message }}</small>@enderror
            </div>
            <div class="seo-settings-field">
                <label for="page_section">Website section</label>
                <select id="page_section" name="page_section" required>
                    @foreach($sectionOptions as $key => $label)
                        <option value="{{ $key }}" @selected(old('page_section', $service->page_section ?: 'services') === $key)>{{ $label }}</option>
                    @endforeach
                </select>
                @error('page_section')<small>{{ $message }}</small>@enderror
            </div>
            <div class="seo-settings-field">
                <label for="slug">URL name</label>
                <input id="slug" name="slug" value="{{ old('slug', $service->slug) }}" required maxlength="120" pattern="[a-z0-9-]+">
                @error('slug')<small>{{ $message }}</small>@enderror
            </div>
            <div class="seo-settings-field full seo-url-preview">
                <label>Public URL</label>
                <code id="pageUrlPreview">/{{ old('page_section', $service->page_section ?: 'services') }}/{{ old('slug', $service->slug ?: 'your-page') }}</code>
            </div>
            <div class="seo-settings-field full">
                <label for="short_description">Short description</label>
                <textarea id="short_description" name="short_description" maxlength="500">{{ old('short_description', $service->short_description) }}</textarea>
            </div>
            <div class="seo-settings-field full">
                <label for="description">Page description</label>
                <textarea id="description" name="description" maxlength="10000">{{ old('description', $service->description) }}</textarea>
            </div>
            <div class="seo-settings-field full">
                <label for="meta_title">Meta title</label>
                <input id="meta_title" name="meta_title" value="{{ old('meta_title', $service->meta_title) }}" maxlength="255">
            </div>
            <div class="seo-settings-field full">
                <label for="meta_description">Meta description</label>
                <textarea id="meta_description" name="meta_description" maxlength="1000">{{ old('meta_description', $service->meta_description) }}</textarea>
            </div>
            <div class="seo-settings-field full">
                <label for="meta_keywords">Meta keywords</label>
                <input id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $service->meta_keywords) }}" maxlength="1000">
            </div>
            <div class="seo-settings-field full">
                <label for="og_image">Social preview image URL or path</label>
                <input id="og_image" name="og_image" value="{{ old('og_image', $service->og_image) }}" maxlength="500">
                @if($service->og_image)<img class="seo-existing-image" src="{{ str_starts_with($service->og_image, 'http') ? $service->og_image : (str_starts_with($service->og_image, 'assets/') || str_starts_with($service->og_image, 'storage/') ? asset($service->og_image) : asset('storage/' . $service->og_image)) }}" alt="Current social preview image">@endif
                <label for="og_image_file">Or upload a replacement image</label>
                <input id="og_image_file" type="file" name="og_image_file" accept="image/jpeg,image/png,image/webp,image/gif">
            </div>
        </div>

        <div class="seo-settings-footer">
            <a href="{{ route('admin.webpages.index') }}">Back to webpages</a>
            <button type="submit">{{ $isCreate ? 'Create and continue to editor' : 'Save settings and continue' }}</button>
        </div>
    </form>
</main>
@endsection

@push('scripts')
<script>
const sectionInput = document.getElementById('page_section');
const slugInput = document.getElementById('slug');
const urlPreview = document.getElementById('pageUrlPreview');
function updatePageUrlPreview() {
    if (urlPreview && sectionInput && slugInput) urlPreview.textContent = `/${sectionInput.value}/${slugInput.value || 'your-page'}`;
}
sectionInput?.addEventListener('change', updatePageUrlPreview);
slugInput?.addEventListener('input', updatePageUrlPreview);
</script>
@endpush
