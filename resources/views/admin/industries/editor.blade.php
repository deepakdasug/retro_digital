@extends('services.layouts.service-editor-layout')

@section('title', $industry->name . ' Visual Editor')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/industries.css') }}?v={{ filemtime(public_path('css/industries.css')) }}">
    <style>
        /* Keep hero preview compact inside admin editor without extra fixed-header clearance */
        .seo-editor-preview .ind-hero {
            padding-top: 44px;
        }
        .seo-editor-preview .ind-faq-aside {
            position: static;
        }
        .seo-editor-preview .ind-layout {
            overflow-x: clip;
        }
        .ind-editor-repeater-2col {
            grid-template-columns: 1fr 2fr auto;
        }
        .ind-editor-repeater-3col {
            grid-template-columns: 0.9fr 1.1fr 2fr auto;
        }
        @media (max-width: 800px) {
            .ind-editor-repeater-2col,
            .ind-editor-repeater-3col {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
@if(session('page_saved'))
<main class="seo-save-complete" role="status" aria-live="polite">
    <div class="seo-save-complete-card">
        <p>{{ session('success') }}</p>
        <nav class="seo-save-complete-actions" aria-label="After saving">
            <a href="{{ route('admin.dashboard', ['tab' => 'industries']) }}">Go to admin dashboard</a>
            <a href="{{ route('admin.industries.editor', $industry) }}" style="background:#fff;color:#2f6f46;">Back to visual editor</a>
            @if($industry->is_published)
                <a href="{{ route('industries.show', ['slug' => $industry->slug]) }}" target="_blank" rel="noopener">View page <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
            @endif
        </nav>
    </div>
</main>
@else
@php
    $heroImage = \App\Support\ImageUrl::resolve($industry->hero_image);
    $introImage = \App\Support\ImageUrl::resolve($industry->intro_image);
    $spotlightImage = \App\Support\ImageUrl::resolve($industry->spotlight_image);

    $features = collect(old('features', $industry->features ?? []))->filter(fn ($item) => is_array($item))->values();
    $reasons = collect(old('reasons', $industry->reasons ?? []))->filter(fn ($item) => is_array($item))->values();
    $faqs = collect(old('faqs', $industry->faqs ?? []))->filter(fn ($item) => is_array($item))->values();
@endphp

<header class="seo-editor-topbar">
    <a class="seo-editor-brand" href="{{ route('admin.dashboard', ['tab' => 'industries']) }}">
        <img src="{{ asset('assets/images/retrotech-mark.png') }}" alt="">
        <span>Retrotech Digital · Admin</span>
    </a>
    <div class="seo-editor-actions">
        <a href="{{ route('admin.industries.edit', $industry) }}">Page settings</a>
        @if($industry->is_published)
            <a href="{{ route('industries.show', ['slug' => $industry->slug]) }}" target="_blank" rel="noopener">View live page <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
        @endif
    </div>
</header>

<main class="seo-editor-main">
    <div class="seo-editor-intro">
        <div class="seo-editor-intro-heading">
            <div>
                <span class="seo-eyebrow">Page 2 of 2 · Industry visual editor</span>
                <h1>{{ $industry->name }}</h1>
            </div>
            <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">
                <button id="toggle-all-sections" type="button" class="seo-toggle-all-btn"><i class="fa-solid fa-compress" aria-hidden="true"></i> <span>Collapse all</span></button>
                <span class="seo-editor-section-count"><i class="fa-solid fa-layer-group" aria-hidden="true"></i> {{ count($sectionsMeta) }} sections</span>
            </div>
        </div>
        <p>Preview and edit every section of the shared <code>industries.layout</code> template below, then click Save page to publish changes to the database.</p>
        <div class="seo-editor-url">
            <span>Page URL</span>
            <code>/who-we-serve/{{ $industry->slug }}</code>
            @unless($industry->is_published)
                <span style="padding:3px 9px;border-radius:999px;background:#fff4e5;color:#9a5b00;font-weight:700;font-size:.75rem;">Draft (not visible publicly)</span>
            @endunless
        </div>
    </div>

    @if(session('success'))
        <div class="seo-editor-flash seo-editor-content" role="status" aria-live="polite">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="seo-editor-flash seo-editor-content" style="border-color:#e5b9b9;background:#fff3f3;color:#8f2727">
            Some section values need attention. Review the fields below and save again.
        </div>
    @endif

    <form id="save-page-form" action="{{ route('admin.industries.save', $industry) }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="seo-editor-content seo-save-page-form">
            <span class="seo-save-page-copy"><strong>Page changes</strong><small>Edits remain unsaved drafts until you click Save page.</small></span>
            <span data-save-status role="status" aria-live="polite"></span>
            <button class="seo-editor-save" type="submit"><i class="fa-solid fa-floppy-disk" aria-hidden="true"></i> Save page</button>
        </div>

        <div class="seo-editor-stage">
            <div class="ind-layout">
                @foreach($sectionsMeta as $sectionKey => $sectionTitle)
                    <section class="seo-editor-section" id="section-{{ $sectionKey }}">
                        <div class="seo-editor-section-bar">
                            <span><i class="fa-solid fa-layer-group" aria-hidden="true"></i> <span>Section {{ $loop->iteration }}</span> · {{ $sectionTitle }}</span>
                            <div class="seo-editor-section-actions">
                                <button class="seo-editor-collapse" type="button" data-toggle-section aria-expanded="true" aria-controls="section-content-{{ $sectionKey }}">
                                    <i class="fa-solid fa-chevron-up" aria-hidden="true"></i> <span>Collapse</span>
                                </button>
                            </div>
                        </div>

                        <div class="seo-editor-section-content" id="section-content-{{ $sectionKey }}">
                            <div class="seo-editor-preview">
                                @include('industries._section', [
                                    'industry' => $industry,
                                    'sectionKey' => $sectionKey,
                                    'heroImage' => $heroImage,
                                    'introImage' => $introImage,
                                    'spotlightImage' => $spotlightImage,
                                    'features' => $features,
                                    'reasons' => $reasons,
                                    'faqs' => $faqs,
                                    'isPreview' => true,
                                ])
                            </div>

                            <details class="seo-editor-edit">
                                <summary><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i> Edit this section</summary>
                                <div class="seo-editor-fields">
                                    @switch($sectionKey)
                                        @case('hero')
                                            <div class="seo-field">
                                                <label for="hero_eyebrow">Eyebrow badge</label>
                                                <input id="hero_eyebrow" name="hero_eyebrow" value="{{ old('hero_eyebrow', $industry->hero_eyebrow) }}" placeholder="{{ strtoupper($industry->name) }} SOLUTIONS">
                                            </div>
                                            <div class="seo-field">
                                                <label for="hero_index_label">Bottom bar label</label>
                                                <input id="hero_index_label" name="hero_index_label" value="{{ old('hero_index_label', $industry->hero_index_label) }}" placeholder="{{ strtoupper($industry->name) }} · RETROTECH DIGITAL">
                                            </div>
                                            <div class="seo-field seo-field-full">
                                                <label for="hero_title">Main heading (H1)</label>
                                                <input id="hero_title" name="hero_title" value="{{ old('hero_title', $industry->hero_title) }}">
                                            </div>
                                            <div class="seo-field seo-field-full">
                                                <label for="hero_description">Supporting copy</label>
                                                <textarea id="hero_description" name="hero_description">{{ old('hero_description', $industry->hero_description) }}</textarea>
                                            </div>
                                            <div class="seo-field">
                                                <label for="hero_cta_text">Primary button text</label>
                                                <input id="hero_cta_text" name="hero_cta_text" value="{{ old('hero_cta_text', $industry->hero_cta_text) }}" placeholder="Book a Consultation">
                                            </div>
                                            <div class="seo-field">
                                                <label for="hero_cta_link">Primary button link</label>
                                                <input id="hero_cta_link" name="hero_cta_link" value="{{ old('hero_cta_link', $industry->hero_cta_link) }}" placeholder="/contact#contact">
                                            </div>
                                            <div class="seo-field">
                                                <label for="hero_secondary_text">Secondary button text</label>
                                                <input id="hero_secondary_text" name="hero_secondary_text" value="{{ old('hero_secondary_text', $industry->hero_secondary_text) }}" placeholder="Explore Capabilities">
                                            </div>
                                            <div class="seo-field">
                                                <label for="hero_secondary_link">Secondary button target</label>
                                                <input id="hero_secondary_link" name="hero_secondary_link" value="{{ old('hero_secondary_link', $industry->hero_secondary_link) }}" placeholder="#industry-features">
                                            </div>
                                            <div class="seo-field">
                                                <label for="hero_image">Hero image path or URL</label>
                                                <input id="hero_image" name="hero_image" value="{{ old('hero_image', $industry->hero_image) }}" placeholder="assets/images/...">
                                            </div>
                                            <div class="seo-field">
                                                <label for="hero_image_file">Or upload hero image</label>
                                                @if($heroImage)
                                                    <img class="seo-existing-image" src="{{ $heroImage }}" alt="Current hero image">
                                                @endif
                                                <input id="hero_image_file" type="file" name="hero_image_file" accept="image/jpeg,image/png,image/webp,image/gif">
                                            </div>
                                            @break

                                        @case('intro')
                                            <div class="seo-field">
                                                <label for="intro_eyebrow">Eyebrow</label>
                                                <input id="intro_eyebrow" name="intro_eyebrow" value="{{ old('intro_eyebrow', $industry->intro_eyebrow) }}" placeholder="Sector Overview">
                                            </div>
                                            <div class="seo-field">
                                                <label for="intro_heading">Overview heading</label>
                                                <input id="intro_heading" name="intro_heading" value="{{ old('intro_heading', $industry->intro_heading) }}">
                                            </div>
                                            <div class="seo-field seo-field-full">
                                                <label for="intro_description">Body copy (separate paragraphs with a blank line)</label>
                                                <textarea id="intro_description" name="intro_description" rows="5">{{ old('intro_description', $industry->intro_description) }}</textarea>
                                            </div>
                                            <div class="seo-field">
                                                <label for="intro_link_text">CTA link text</label>
                                                <input id="intro_link_text" name="intro_link_text" value="{{ old('intro_link_text', $industry->intro_link_text) }}">
                                            </div>
                                            <div class="seo-field">
                                                <label for="intro_link_url">CTA link URL</label>
                                                <input id="intro_link_url" name="intro_link_url" value="{{ old('intro_link_url', $industry->intro_link_url) }}" placeholder="/contact#contact">
                                            </div>
                                            <div class="seo-field">
                                                <label for="intro_note_title">Floating badge title</label>
                                                <input id="intro_note_title" name="intro_note_title" value="{{ old('intro_note_title', $industry->intro_note_title) }}">
                                            </div>
                                            <div class="seo-field">
                                                <label for="intro_note_text">Floating badge subtitle</label>
                                                <input id="intro_note_text" name="intro_note_text" value="{{ old('intro_note_text', $industry->intro_note_text) }}">
                                            </div>
                                            <div class="seo-field">
                                                <label for="intro_image">Intro image path or URL</label>
                                                <input id="intro_image" name="intro_image" value="{{ old('intro_image', $industry->intro_image) }}" placeholder="assets/images/...">
                                            </div>
                                            <div class="seo-field">
                                                <label for="intro_image_file">Or upload intro image</label>
                                                @if($introImage)
                                                    <img class="seo-existing-image" src="{{ $introImage }}" alt="Current intro image">
                                                @endif
                                                <input id="intro_image_file" type="file" name="intro_image_file" accept="image/jpeg,image/png,image/webp,image/gif">
                                            </div>
                                            @break

                                        @case('features')
                                            <div class="seo-field">
                                                <label for="features_eyebrow">Eyebrow</label>
                                                <input id="features_eyebrow" name="features_eyebrow" value="{{ old('features_eyebrow', $industry->features_eyebrow) }}" placeholder="Core Capabilities">
                                            </div>
                                            <div class="seo-field">
                                                <label for="features_heading">Section heading</label>
                                                <input id="features_heading" name="features_heading" value="{{ old('features_heading', $industry->features_heading) }}">
                                            </div>
                                            <div class="seo-field seo-field-full">
                                                <label for="features_description">Section intro</label>
                                                <textarea id="features_description" name="features_description">{{ old('features_description', $industry->features_description) }}</textarea>
                                            </div>
                                            <div class="seo-field seo-field-full" data-repeater="features">
                                                <label>Capability Cards</label>
                                                <div class="seo-repeater-items">
                                                    @foreach($features as $rowIndex => $item)
                                                        <div class="seo-repeater-item ind-editor-repeater-3col">
                                                            <div class="seo-field">
                                                                <label>Icon Class</label>
                                                                <input name="features[{{ $rowIndex }}][icon]" value="{{ data_get($item, 'icon', 'fa-solid fa-cubes') }}" placeholder="fa-solid fa-cubes">
                                                            </div>
                                                            <div class="seo-field">
                                                                <label>Title</label>
                                                                <input name="features[{{ $rowIndex }}][title]" value="{{ data_get($item, 'title') }}" placeholder="Capability title">
                                                            </div>
                                                            <div class="seo-field">
                                                                <label>Description</label>
                                                                <textarea name="features[{{ $rowIndex }}][description]">{{ data_get($item, 'description') }}</textarea>
                                                            </div>
                                                            <button type="button" data-remove-item aria-label="Remove capability"><i class="fa-solid fa-xmark"></i></button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button class="seo-editor-save" type="button" data-add-item>Add item</button>
                                                <template data-repeater-template>
                                                    <div class="seo-repeater-item ind-editor-repeater-3col">
                                                        <div class="seo-field">
                                                            <label>Icon Class</label>
                                                            <input name="features[__INDEX__][icon]" value="fa-solid fa-cubes" placeholder="fa-solid fa-cubes">
                                                        </div>
                                                        <div class="seo-field">
                                                            <label>Title</label>
                                                            <input name="features[__INDEX__][title]" placeholder="Capability title">
                                                        </div>
                                                        <div class="seo-field">
                                                            <label>Description</label>
                                                            <textarea name="features[__INDEX__][description]"></textarea>
                                                        </div>
                                                        <button type="button" data-remove-item aria-label="Remove capability"><i class="fa-solid fa-xmark"></i></button>
                                                    </div>
                                                </template>
                                            </div>
                                            @break

                                        @case('reasons')
                                            <div class="seo-field">
                                                <label for="reasons_eyebrow">Eyebrow</label>
                                                <input id="reasons_eyebrow" name="reasons_eyebrow" value="{{ old('reasons_eyebrow', $industry->reasons_eyebrow) }}" placeholder="Why Retrotech Digital">
                                            </div>
                                            <div class="seo-field">
                                                <label for="reasons_heading">Section heading</label>
                                                <input id="reasons_heading" name="reasons_heading" value="{{ old('reasons_heading', $industry->reasons_heading) }}">
                                            </div>
                                            <div class="seo-field seo-field-full">
                                                <label for="reasons_description">Section intro</label>
                                                <textarea id="reasons_description" name="reasons_description">{{ old('reasons_description', $industry->reasons_description) }}</textarea>
                                            </div>
                                            <div class="seo-field seo-field-full" data-repeater="reasons">
                                                <label>Solution Pillars</label>
                                                <div class="seo-repeater-items">
                                                    @foreach($reasons as $rowIndex => $item)
                                                        <div class="seo-repeater-item ind-editor-repeater-2col">
                                                            <div class="seo-field">
                                                                <label>Title</label>
                                                                <input name="reasons[{{ $rowIndex }}][title]" value="{{ data_get($item, 'title') }}" placeholder="Solution pillar title">
                                                            </div>
                                                            <div class="seo-field">
                                                                <label>Description</label>
                                                                <textarea name="reasons[{{ $rowIndex }}][description]">{{ data_get($item, 'description') }}</textarea>
                                                            </div>
                                                            <button type="button" data-remove-item aria-label="Remove pillar"><i class="fa-solid fa-xmark"></i></button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button class="seo-editor-save" type="button" data-add-item>Add item</button>
                                                <template data-repeater-template>
                                                    <div class="seo-repeater-item ind-editor-repeater-2col">
                                                        <div class="seo-field">
                                                            <label>Title</label>
                                                            <input name="reasons[__INDEX__][title]" placeholder="Solution pillar title">
                                                        </div>
                                                        <div class="seo-field">
                                                            <label>Description</label>
                                                            <textarea name="reasons[__INDEX__][description]"></textarea>
                                                        </div>
                                                        <button type="button" data-remove-item aria-label="Remove pillar"><i class="fa-solid fa-xmark"></i></button>
                                                    </div>
                                                </template>
                                            </div>
                                            @break

                                        @case('spotlight')
                                            <div class="seo-field">
                                                <label for="spotlight_eyebrow">Eyebrow</label>
                                                <input id="spotlight_eyebrow" name="spotlight_eyebrow" value="{{ old('spotlight_eyebrow', $industry->spotlight_eyebrow) }}" placeholder="Security & Architecture">
                                            </div>
                                            <div class="seo-field">
                                                <label for="spotlight_heading">Spotlight heading</label>
                                                <input id="spotlight_heading" name="spotlight_heading" value="{{ old('spotlight_heading', $industry->spotlight_heading) }}">
                                            </div>
                                            <div class="seo-field seo-field-full">
                                                <label for="spotlight_description">Spotlight description</label>
                                                <textarea id="spotlight_description" name="spotlight_description">{{ old('spotlight_description', $industry->spotlight_description) }}</textarea>
                                            </div>
                                            <div class="seo-field">
                                                <label for="spotlight_image">Spotlight image path or URL</label>
                                                <input id="spotlight_image" name="spotlight_image" value="{{ old('spotlight_image', $industry->spotlight_image) }}" placeholder="assets/images/certificate.png">
                                            </div>
                                            <div class="seo-field">
                                                <label for="spotlight_image_file">Or upload spotlight image</label>
                                                @if($spotlightImage)
                                                    <img class="seo-existing-image" src="{{ $spotlightImage }}" alt="Current spotlight image">
                                                @endif
                                                <input id="spotlight_image_file" type="file" name="spotlight_image_file" accept="image/jpeg,image/png,image/webp,image/gif">
                                            </div>
                                            @break

                                        @case('faq')
                                            <div class="seo-field">
                                                <label for="faq_eyebrow">Eyebrow</label>
                                                <input id="faq_eyebrow" name="faq_eyebrow" value="{{ old('faq_eyebrow', $industry->faq_eyebrow) }}" placeholder="Common Questions">
                                            </div>
                                            <div class="seo-field">
                                                <label for="faq_heading">FAQ heading</label>
                                                <input id="faq_heading" name="faq_heading" value="{{ old('faq_heading', $industry->faq_heading) }}">
                                            </div>
                                            <div class="seo-field seo-field-full">
                                                <label for="faq_description">FAQ intro</label>
                                                <textarea id="faq_description" name="faq_description">{{ old('faq_description', $industry->faq_description) }}</textarea>
                                            </div>
                                            <div class="seo-field seo-field-full" data-repeater="faqs">
                                                <label>Questions &amp; Answers</label>
                                                <div class="seo-repeater-items">
                                                    @foreach($faqs as $rowIndex => $item)
                                                        <div class="seo-repeater-item ind-editor-repeater-2col">
                                                            <div class="seo-field">
                                                                <label>Question</label>
                                                                <input name="faqs[{{ $rowIndex }}][question]" value="{{ data_get($item, 'question') }}" placeholder="Question">
                                                            </div>
                                                            <div class="seo-field">
                                                                <label>Answer</label>
                                                                <textarea name="faqs[{{ $rowIndex }}][answer]">{{ data_get($item, 'answer') }}</textarea>
                                                            </div>
                                                            <button type="button" data-remove-item aria-label="Remove FAQ"><i class="fa-solid fa-xmark"></i></button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button class="seo-editor-save" type="button" data-add-item>Add item</button>
                                                <template data-repeater-template>
                                                    <div class="seo-repeater-item ind-editor-repeater-2col">
                                                        <div class="seo-field">
                                                            <label>Question</label>
                                                            <input name="faqs[__INDEX__][question]" placeholder="Question">
                                                        </div>
                                                        <div class="seo-field">
                                                            <label>Answer</label>
                                                            <textarea name="faqs[__INDEX__][answer]"></textarea>
                                                        </div>
                                                        <button type="button" data-remove-item aria-label="Remove FAQ"><i class="fa-solid fa-xmark"></i></button>
                                                    </div>
                                                </template>
                                            </div>
                                            @break

                                        @case('cta')
                                            <div class="seo-field">
                                                <label for="cta_eyebrow">Eyebrow</label>
                                                <input id="cta_eyebrow" name="cta_eyebrow" value="{{ old('cta_eyebrow', $industry->cta_eyebrow) }}" placeholder="Start a Conversation">
                                            </div>
                                            <div class="seo-field">
                                                <label for="cta_heading">CTA heading</label>
                                                <input id="cta_heading" name="cta_heading" value="{{ old('cta_heading', $industry->cta_heading) }}">
                                            </div>
                                            <div class="seo-field seo-field-full">
                                                <label for="cta_description">CTA description</label>
                                                <textarea id="cta_description" name="cta_description">{{ old('cta_description', $industry->cta_description) }}</textarea>
                                            </div>
                                            <div class="seo-field">
                                                <label for="cta_primary_text">Primary button text</label>
                                                <input id="cta_primary_text" name="cta_primary_text" value="{{ old('cta_primary_text', $industry->cta_primary_text) }}" placeholder="Schedule Discovery Call">
                                            </div>
                                            <div class="seo-field">
                                                <label for="cta_primary_link">Primary button link</label>
                                                <input id="cta_primary_link" name="cta_primary_link" value="{{ old('cta_primary_link', $industry->cta_primary_link) }}" placeholder="/contact#contact">
                                            </div>
                                            <div class="seo-field">
                                                <label for="cta_whatsapp_text">WhatsApp button text</label>
                                                <input id="cta_whatsapp_text" name="cta_whatsapp_text" value="{{ old('cta_whatsapp_text', $industry->cta_whatsapp_text) }}" placeholder="Chat on WhatsApp">
                                            </div>
                                            <div class="seo-field">
                                                <label for="cta_whatsapp_link">WhatsApp link</label>
                                                <input id="cta_whatsapp_link" name="cta_whatsapp_link" value="{{ old('cta_whatsapp_link', $industry->cta_whatsapp_link) }}" placeholder="https://wa.me/919910836538">
                                            </div>
                                            @break
                                    @endswitch
                                </div>
                            </details>
                        </div>
                    </section>
                @endforeach
            </div>
        </div>
    </form>
</main>
@endif
@endsection

@push('scripts')
<script>
document.querySelectorAll('[data-repeater]').forEach((group) => {
    const list = group.querySelector('.seo-repeater-items');
    const template = group.querySelector('[data-repeater-template]');
    let nextIndex = list?.querySelectorAll('.seo-repeater-item').length || 0;

    group.querySelector('[data-add-item]')?.addEventListener('click', () => {
        if (!list || !template) return;
        list.insertAdjacentHTML('beforeend', template.innerHTML.replaceAll('__INDEX__', nextIndex++));
    });

    group.addEventListener('click', (event) => {
        if (event.target.closest('[data-remove-item]')) {
            event.target.closest('.seo-repeater-item')?.remove();
        }
    });
});

document.querySelectorAll('[data-toggle-section]').forEach((button) => {
    button.addEventListener('click', () => {
        const section = button.closest('.seo-editor-section');
        const collapsed = section?.classList.toggle('is-collapsed');
        button.setAttribute('aria-expanded', String(!collapsed));
        button.querySelector('span').textContent = collapsed ? 'Expand' : 'Collapse';
        button.querySelector('i').className = collapsed ? 'fa-solid fa-chevron-down' : 'fa-solid fa-chevron-up';
    });
});

const toggleAllBtn = document.getElementById('toggle-all-sections');
if (toggleAllBtn) {
    let allCollapsed = false;
    toggleAllBtn.addEventListener('click', () => {
        allCollapsed = !allCollapsed;
        document.querySelectorAll('.seo-editor-section').forEach((sec) => {
            sec.classList.toggle('is-collapsed', allCollapsed);
            const btn = sec.querySelector('[data-toggle-section]');
            if (btn) {
                btn.setAttribute('aria-expanded', String(!allCollapsed));
                const span = btn.querySelector('span');
                if (span) span.textContent = allCollapsed ? 'Expand' : 'Collapse';
                const icon = btn.querySelector('i');
                if (icon) icon.className = allCollapsed ? 'fa-solid fa-chevron-down' : 'fa-solid fa-chevron-up';
            }
        });
        toggleAllBtn.innerHTML = allCollapsed
            ? '<i class="fa-solid fa-expand" aria-hidden="true"></i> <span>Expand all</span>'
            : '<i class="fa-solid fa-compress" aria-hidden="true"></i> <span>Collapse all</span>';
    });
}

const savePageForm = document.getElementById('save-page-form');
savePageForm?.addEventListener('submit', () => {
    const saveStatus = savePageForm.querySelector('[data-save-status]');
    if (saveStatus) saveStatus.textContent = 'Saving your page…';
});
</script>
@endpush
