@extends('layouts.service-editor')

@section('title', $service->title . ' Visual Editor')

@section('content')
@if(session('page_saved'))
<main class="seo-save-complete" role="status" aria-live="polite">
    <div class="seo-save-complete-card">
        <p>{{ session('success') }}</p>
        <nav class="seo-save-complete-actions" aria-label="After saving">
            <a href="{{ route('admin.dashboard', ['tab' => 'webpage']) }}">Go to admin dashboard</a>
            <a href="{{ route('webpages.show', ['section' => $service->page_section, 'slug' => $service->slug]) }}" target="_blank" rel="noopener">View page <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
        </nav>
    </div>
</main>
@else
<header class="seo-editor-topbar">
    <a class="seo-editor-brand" href="{{ route('admin.dashboard', ['tab' => 'webpage']) }}">
        <img src="{{ asset('assets/images/retrotech-mark.png') }}" alt="">
        <span>Retrotech Digital · Admin</span>
    </a>
    <div class="seo-editor-actions">
        <a href="{{ route('admin.webpages.edit', $service) }}">Page settings</a>
        <a href="{{ route('webpages.show', ['section' => $service->page_section, 'slug' => $service->slug]) }}" target="_blank" rel="noopener">View live page <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
    </div>
</header>

<main class="seo-editor-main">
    <div class="seo-editor-intro">
        <div class="seo-editor-intro-heading">
            <div>
                <span class="seo-eyebrow">Page 2 of 2 · {{ $sectionLabels[$service->page_section] ?? 'Webpage' }} visual editor</span>
                <h1>{{ $service->title }}</h1>
            </div>
            <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">
                <button id="toggle-all-sections" type="button" class="seo-toggle-all-btn"><i class="fa-solid fa-compress" aria-hidden="true"></i> <span>Collapse all</span></button>
                <span class="seo-editor-section-count"><i class="fa-solid fa-layer-group" aria-hidden="true"></i> {{ $service->sections->count() }} sections</span>
            </div>
        </div>
        <p>Edit the page sections below, change their order, or add another reusable layout.</p>
        <div class="seo-editor-url"><span>Page URL</span><code>/{{ $service->page_section }}/{{ $service->slug }}</code></div>
    </div>
    @if(session('success'))<div class="seo-editor-flash seo-editor-content" role="status" aria-live="polite">{{ session('success') }}</div>@endif
    @if($errors->any())<div class="seo-editor-flash seo-editor-content" style="border-color:#e5b9b9;background:#fff3f3;color:#8f2727">Some section values need attention. Review the fields and save again.</div>@endif
    <form id="save-page-form" action="{{ route('admin.webpages.save', $service) }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="seo-editor-content seo-save-page-form">
            <span class="seo-save-page-copy"><strong>Page changes</strong><small>Edits, section order, and removals stay as drafts until saved.</small></span>
            <span data-save-status role="status" aria-live="polite"></span>
            <button class="seo-editor-save" type="submit"><i class="fa-solid fa-floppy-disk" aria-hidden="true"></i> Save page</button>
        </div>



    <div class="seo-editor-stage">
        <div class="seo-service-page">
            @forelse($service->sections as $index => $section)
                @php
                    $template = $templates[$section->section_type] ?? null;
                    $data = is_array($section->content) ? $section->content : [];
                @endphp
                @continue(!$template)
                <section class="seo-editor-section {{ $section->is_active ? '' : 'is-hidden' }} {{ session('page_saved') ? 'is-collapsed' : '' }}" id="section-{{ $section->id }}">
                    <div class="seo-editor-section-bar">
                        <span><i class="fa-solid fa-grip-lines" aria-hidden="true"></i> <span data-section-position>Section {{ $index + 1 }}</span> · {{ $template['name'] }}{{ $section->is_active ? '' : ' · Hidden from visitors' }} <em data-pending-label hidden>· Marked for removal; not live until saved</em></span>
                        <div class="seo-editor-section-actions">
                            <button class="seo-editor-collapse" type="button" data-toggle-section aria-expanded="{{ session('page_saved') ? 'false' : 'true' }}" aria-controls="section-content-{{ $section->id }}"><i class="fa-solid fa-chevron-up" aria-hidden="true"></i> <span>{{ session('page_saved') ? 'Expand' : 'Collapse' }}</span></button>
                            <button class="seo-editor-remove" type="button" data-remove-section="{{ $section->id }}" aria-pressed="false"><i class="fa-regular fa-trash-can" aria-hidden="true"></i> Remove</button>
                        </div>
                    </div>

                    <div class="seo-editor-section-content" id="section-content-{{ $section->id }}">
                    <div class="seo-editor-preview">
                        @include('sections._service_section', ['data' => $data, 'section' => $section])
                    </div>

                    <details class="seo-editor-edit">
                        <summary><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i> Edit this section</summary>
                            <div class="seo-editor-fields">
                                <div class="seo-field seo-field-full seo-visibility-field">
                                    <label class="seo-visibility-toggle"><input type="checkbox" name="sections[{{ $section->id }}][is_active]" value="1" @checked(old('sections.' . $section->id . '.is_active', $section->is_active))><span>Show this section to visitors</span></label>
                                    <small class="seo-visibility-hint">When enabled, this section appears on the live page after you save.</small>
                                </div>
                                <div class="seo-field">
                                    <label for="section-order-{{ $section->id }}">Display order</label>
                                    <input id="section-order-{{ $section->id }}" type="number" value="{{ old('sections.' . $section->id . '.sort_order', $index + 1) }}" min="1" max="{{ $service->sections->count() }}" data-section-order data-section-id="{{ $section->id }}">
                                    <small>Position 1–{{ $service->sections->count() }}. Other sections shift to make room.</small>
                                </div>
                                @if($section->section_type === 'custom')
                                    @include('admin.services._custom_section_fields', ['section' => $section, 'data' => $data])
                                @else
                                @foreach($template['fields'] as $key => $field)
                                    @php($value = old('sections.' . $section->id . '.content.' . $key, data_get($data, $key, $field['default'] ?? '')))
                                    @if(($field['type'] ?? '') === 'repeater')
                                        @php($items = old('sections.' . $section->id . '.content.' . $key, data_get($data, $key, [])))
                                        <div class="seo-field seo-field-full" data-repeater="{{ $section->id }}-{{ $key }}">
                                            <label>{{ $field['label'] }}</label>
                                            <div class="seo-repeater-items">
                                                @foreach($items as $rowIndex => $item)
                                                    <div class="seo-repeater-item">
                                                        @foreach($field['fields'] ?? [] as $childKey => $childField)
                                                            <div class="seo-field">
                                                                <label>{{ $childField['label'] ?? \Illuminate\Support\Str::headline($childKey) }}</label>
                                                                @if(($childField['type'] ?? 'text') === 'image')
                                                                    @php($childImage = data_get($item, $childKey, ''))
                                                                    @if($childImage)
                                                                        @php($childImageSrc = str_starts_with($childImage, 'http') ? $childImage : (str_starts_with($childImage, 'assets/') || str_starts_with($childImage, 'storage/') ? asset($childImage) : asset('storage/' . $childImage)))
                                                                        <img class="seo-existing-image" src="{{ $childImageSrc }}" alt="Current {{ strtolower($childField['label'] ?? 'item') }}">
                                                                    @endif
                                                                    <input type="hidden" name="sections[{{ $section->id }}][existing_images][{{ $key }}][{{ $rowIndex }}][{{ $childKey }}]" value="{{ $childImage }}">
                                                                    <input type="file" name="sections[{{ $section->id }}][content][{{ $key }}][{{ $rowIndex }}][{{ $childKey }}]" accept="image/jpeg,image/png,image/webp,image/gif">
                                                                @elseif(($childField['type'] ?? 'text') === 'textarea')
                                                                    <textarea name="sections[{{ $section->id }}][content][{{ $key }}][{{ $rowIndex }}][{{ $childKey }}]">{{ data_get($item, $childKey) }}</textarea>
                                                                @else
                                                                    <input name="sections[{{ $section->id }}][content][{{ $key }}][{{ $rowIndex }}][{{ $childKey }}]" value="{{ data_get($item, $childKey) }}">
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                        <button type="button" data-remove-item aria-label="Remove item"><i class="fa-solid fa-xmark"></i></button>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="seo-editor-save" type="button" data-add-item>Add item</button>
                                            <template data-repeater-template>
                                                <div class="seo-repeater-item">
                                                    @foreach($field['fields'] ?? [] as $childKey => $childField)
                                                        <div class="seo-field">
                                                            <label>{{ $childField['label'] ?? \Illuminate\Support\Str::headline($childKey) }}</label>
                                                            @if(($childField['type'] ?? 'text') === 'image')
                                                                <input type="hidden" name="sections[{{ $section->id }}][existing_images][{{ $key }}][__INDEX__][{{ $childKey }}]" value="">
                                                                <input type="file" name="sections[{{ $section->id }}][content][{{ $key }}][__INDEX__][{{ $childKey }}]" accept="image/jpeg,image/png,image/webp,image/gif">
                                                            @elseif(($childField['type'] ?? 'text') === 'textarea')
                                                                <textarea name="sections[{{ $section->id }}][content][{{ $key }}][__INDEX__][{{ $childKey }}]"></textarea>
                                                            @else
                                                                <input name="sections[{{ $section->id }}][content][{{ $key }}][__INDEX__][{{ $childKey }}]">
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    <button type="button" data-remove-item aria-label="Remove item"><i class="fa-solid fa-xmark"></i></button>
                                                </div>
                                            </template>
                                        </div>
                                    @else
                                        <div class="seo-field {{ in_array($field['type'] ?? '', ['textarea', 'richtext', 'image']) ? 'seo-field-full' : '' }}">
                                            <label for="field-{{ $section->id }}-{{ $key }}">{{ $field['label'] }}</label>
                                            @if(($field['type'] ?? '') === 'image')
                                                @if($value)
                                                    @php($imageSrc = str_starts_with($value, 'http') ? $value : (str_starts_with($value, 'assets/') || str_starts_with($value, 'storage/') ? asset($value) : asset('storage/' . $value)))
                                                    <img class="seo-existing-image" src="{{ $imageSrc }}" alt="Current section image">
                                                @endif
                                                <input type="hidden" name="sections[{{ $section->id }}][existing_images][{{ $key }}]" value="{{ $value }}">
                                                <input id="field-{{ $section->id }}-{{ $key }}" type="file" name="sections[{{ $section->id }}][content][{{ $key }}]" accept="image/jpeg,image/png,image/webp,image/gif">
                                            @elseif(($field['type'] ?? '') === 'select')
                                                <select id="field-{{ $section->id }}-{{ $key }}" name="sections[{{ $section->id }}][content][{{ $key }}]">
                                                    @foreach($field['options'] ?? [] as $option => $label)<option value="{{ $option }}" @selected($value === $option)>{{ $label }}</option>@endforeach
                                                </select>
                                            @elseif(in_array($field['type'] ?? '', ['textarea', 'richtext']))
                                                <textarea id="field-{{ $section->id }}-{{ $key }}" name="sections[{{ $section->id }}][content][{{ $key }}]">{{ $value }}</textarea>
                                            @else
                                                <input id="field-{{ $section->id }}-{{ $key }}" name="sections[{{ $section->id }}][content][{{ $key }}]" value="{{ $value }}">
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                                @endif
                            </div>
                    </details>
                    </div>
                </section>
            @empty
                <div class="seo-editor-content" data-no-sections><p>No sections yet. Add one below to build the page.</p></div>
            @endforelse
            <section class="seo-editor-section seo-editor-insertion-preview" data-insertion-preview hidden>
                <div class="seo-editor-section-bar">
                    <span><i class="fa-solid fa-arrow-down-wide-short" aria-hidden="true"></i> New section preview · Position <strong data-insertion-position></strong></span>
                </div>
                <div class="seo-editor-preview" data-insertion-content>
                    <p class="seo-editor-insertion-empty">Choose a layout, then select Preview layout to see it here.</p>
                </div>
            </section>
        </div>
    </div>
    </form>

    <div class="seo-editor-content">
        <section class="seo-add-section">
            <div class="seo-add-section-heading"><span class="seo-add-section-icon"><i class="fa-solid fa-plus" aria-hidden="true"></i></span><div><h2>Add a section</h2><p>Choose a layout, fill in its fields, preview it, then add it to the page.</p></div></div>
            <form id="add-section-form" action="{{ route('admin.webpages.sections.store', $service) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="seo-add-section-control-row seo-add-section-top-row">
                <div class="seo-add-section-layout">
                <label for="add-section-type">Section layout</label>
                <select id="add-section-type" name="section_type" required>
                    <option value="" selected disabled>Choose a reusable section layout</option>
                    @foreach($templates as $type => $template)
                        <option value="{{ $type }}">{{ str_replace(['SEO — ', 'SEO - '], '', $template['name']) }}</option>
                    @endforeach
                </select>
                </div>
                <button class="seo-section-preview-button seo-add-section-preview-button" type="button" data-preview-section data-preview-url="{{ route('admin.webpages.sections.preview', ['service' => $service, 'type' => '__template__']) }}" disabled>Preview layout</button>
                </div>
                @php($newSectionPosition = $service->sections->count() + 1)
                <div class="seo-add-section-fields" data-add-section-fields hidden aria-live="polite"></div>
                <div class="seo-add-section-control-row seo-add-section-bottom-row">
                <div class="seo-add-section-order">
                    <label for="new-section-order">Insert at position</label>
                    <input id="new-section-order" type="number" name="sort_order" min="1" max="{{ $newSectionPosition }}" value="{{ old('sort_order', $newSectionPosition) }}" required>
                    <small>Choose 1–{{ $newSectionPosition }}. Existing sections shift down.</small>
                </div>
                <div class="seo-add-section-actions">
                <button class="seo-editor-save" type="submit" disabled data-add-section-submit>Add section</button>
                </div>
                </div>
            </form>
        </section>
    </div>
</main>
@endif
@endsection

@push('scripts')
<script>
document.querySelectorAll('[data-repeater]').forEach((group) => {
    const list = group.querySelector('.seo-repeater-items');
    const template = group.querySelector('[data-repeater-template]');
    group.querySelector('[data-add-item]')?.addEventListener('click', () => {
        const index = list.querySelectorAll('.seo-repeater-item').length;
        list.insertAdjacentHTML('beforeend', template.innerHTML.replaceAll('__INDEX__', index));
    });
    group.addEventListener('click', (event) => {
        if (event.target.closest('[data-remove-item]')) event.target.closest('.seo-repeater-item')?.remove();
    });
});

const addSectionForm = document.getElementById('add-section-form');
const sectionTypeSelect = addSectionForm?.querySelector('select[name="section_type"]');
const sectionFieldsContainer = addSectionForm?.querySelector('[data-add-section-fields]');
const addSectionSubmit = addSectionForm?.querySelector('[data-add-section-submit]');
const sectionOrderContainer = addSectionForm?.querySelector('.seo-add-section-order');
const sectionPositionInput = addSectionForm?.querySelector('[name="sort_order"]');
const hasExistingFaq = @json((bool) $service->sections->contains(fn($s) => in_array($s->section_type, ['faq', 'seo_faq'])));
const sectionPreviewButton = document.querySelector('[data-preview-section]');
const insertionPreview = document.querySelector('[data-insertion-preview]');
const insertionPreviewContent = insertionPreview?.querySelector('[data-insertion-content]');
let sectionFieldId = 0;

const customFieldTypes = {
    heading: 'Heading',
    paragraph: 'Paragraph',
    text: 'Short text',
    image: 'Image upload',
    video: 'Video clip upload',
    link: 'Link URL',
};

const customPresets = {
    hero: {
        schema: [],
        values: {},
        html: `<section class="custom-hero-banner">
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
</section>`,
        css: `.custom-hero-banner {
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
}`,
        js: `console.log('Hero loaded');`
    },
    cards: {
        schema: [],
        values: {},
        html: `<section class="custom-cards-section">
  <div class="custom-cards-container">
    <div class="custom-cards-header">
      <span class="custom-cards-badge">WHY CHOOSE US</span>
      <h2 class="custom-cards-title">Engineered For Peak Performance</h2>
      <p class="custom-cards-subtitle">Every solution is built with high-velocity architecture, security, and measurable ROI.</p>
    </div>
    <div class="custom-cards-grid">
      <div class="custom-feature-card">
        <div class="custom-card-icon"><i class="fa-solid fa-gauge-high"></i></div>
        <h3>Ultra-Fast Performance</h3>
        <p>Sub-second response times and optimized core web vitals for maximum user retention.</p>
      </div>
      <div class="custom-feature-card is-featured">
        <div class="custom-card-icon"><i class="fa-solid fa-shield-halved"></i></div>
        <h3>Enterprise Security</h3>
        <p>Zero-trust architecture, automated threat scanning, and robust end-to-end data encryption.</p>
      </div>
      <div class="custom-feature-card">
        <div class="custom-card-icon"><i class="fa-solid fa-robot"></i></div>
        <h3>24/7 Intelligent Automation</h3>
        <p>Seamless automated workflows and conversational bots that generate and qualify leads around the clock.</p>
      </div>
    </div>
  </div>
</section>`,
        css: `.custom-cards-section {
  padding: clamp(3rem, 6vw, 5rem) 1.5rem;
  background: #f8fafc;
  border-radius: 24px;
  margin: 1.5rem auto;
  max-width: 1240px;
  font-family: 'Inter', sans-serif;
  color: #1e293b;
}
.custom-cards-container {
  max-width: 1140px;
  margin: 0 auto;
}
.custom-cards-header {
  text-align: center;
  max-width: 680px;
  margin: 0 auto 3rem;
}
.custom-cards-badge {
  display: inline-block;
  padding: 6px 14px;
  border-radius: 100px;
  background: #e0f2fe;
  color: #0284c7;
  font-size: 0.82rem;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  margin-bottom: 1rem;
}
.custom-cards-title {
  font-size: clamp(2rem, 3.5vw, 2.75rem);
  font-weight: 800;
  color: #0f172a;
  line-height: 1.25;
  margin-bottom: 1rem;
  letter-spacing: -0.02em;
}
.custom-cards-subtitle {
  font-size: 1.05rem;
  color: #64748b;
  line-height: 1.6;
}
.custom-cards-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 1.75rem;
}
.custom-feature-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 18px;
  padding: 2.25rem 1.75rem;
  transition: all 0.3s ease;
  position: relative;
}
.custom-feature-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 16px 32px -10px rgba(0, 0, 0, 0.08);
  border-color: #cbd5e1;
}
.custom-feature-card.is-featured {
  border-color: #86efac;
  background: linear-gradient(180deg, #f0fdf4 0%, #ffffff 100%);
  box-shadow: 0 12px 28px -10px rgba(22, 101, 52, 0.12);
}
.custom-card-icon {
  width: 54px;
  height: 54px;
  border-radius: 14px;
  background: #166534;
  color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.35rem;
  margin-bottom: 1.5rem;
}
.custom-feature-card.is-featured .custom-card-icon {
  background: #15803d;
}
.custom-feature-card h3 {
  font-size: 1.3rem;
  font-weight: 700;
  color: #0f172a;
  margin-bottom: 0.75rem;
}
.custom-feature-card p {
  font-size: 0.98rem;
  line-height: 1.65;
  color: #64748b;
}`,
        js: `console.log('Cards grid loaded');`
    },
    cta: {
        schema: [],
        values: {},
        html: `<section class="custom-cta-section">
  <div class="custom-cta-container">
    <div class="custom-cta-content">
      <h2 class="custom-cta-title">Ready To Accelerate Your Growth?</h2>
      <p class="custom-cta-text">Join 500+ fast-growing enterprises scaling with our engineering and growth stack.</p>
      <div class="custom-cta-action">
        <a href="/contact#contact" class="custom-cta-button">Schedule Free Strategy Call <i class="fa-solid fa-arrow-right"></i></a>
      </div>
      <p class="custom-cta-highlight"><i class="fa-solid fa-circle-check"></i> 100% Free Consultation • No Commitment</p>
    </div>
  </div>
</section>`,
        css: `.custom-cta-section {
  padding: clamp(3.5rem, 7vw, 5.5rem) 1.5rem;
  background: linear-gradient(135deg, #0f291e 0%, #174c31 60%, #15803d 100%);
  border-radius: 24px;
  margin: 1.5rem auto;
  max-width: 1240px;
  text-align: center;
  color: #ffffff;
  font-family: 'Inter', sans-serif;
  box-shadow: 0 20px 40px -15px rgba(15, 41, 30, 0.4);
}
.custom-cta-container {
  max-width: 780px;
  margin: 0 auto;
}
.custom-cta-title {
  font-size: clamp(2.2rem, 4.2vw, 3.4rem);
  font-weight: 800;
  line-height: 1.2;
  letter-spacing: -0.02em;
  margin-bottom: 1.25rem;
}
.custom-cta-text {
  font-size: 1.15rem;
  line-height: 1.7;
  color: #d1fae5;
  margin-bottom: 2.25rem;
}
.custom-cta-button {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  padding: 16px 36px;
  background: #ffffff;
  color: #14532d;
  font-size: 1.05rem;
  font-weight: 700;
  border-radius: 14px;
  text-decoration: none;
  transition: all 0.25s ease;
  box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.25);
}
.custom-cta-button:hover {
  background: #f0fdf4;
  transform: translateY(-2px);
  box-shadow: 0 14px 30px -5px rgba(0, 0, 0, 0.35);
}
.custom-cta-highlight {
  margin-top: 1.5rem;
  font-size: 0.9rem;
  color: #a7f3d0;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
}`,
        js: `console.log('CTA banner loaded');`
    },
    blank: {
        schema: [],
        values: {},
        html: `<section class="custom-blank-section">
  <div class="custom-blank-container">
    <h2>Custom Section Heading</h2>
    <p>Design your custom layout with raw HTML, CSS and JavaScript.</p>
  </div>
</section>`,
        css: `.custom-blank-section {
  padding: 60px 20px;
  text-align: center;
  background: #ffffff;
  border: 1px dashed #cbd5e1;
  border-radius: 16px;
  margin: 20px auto;
  max-width: 1200px;
  font-family: 'Inter', sans-serif;
}
.custom-blank-section h2 {
  font-size: 2rem;
  font-weight: 700;
  color: #0f172a;
  margin-bottom: 12px;
}
.custom-blank-section p {
  color: #64748b;
  font-size: 1.05rem;
}`,
        js: `// Custom JavaScript\n`
    }
};

const insertIntoHtml = (root, snippet) => {
    if (!root) return;
    const htmlTextarea = root.querySelector('textarea[name$="[html]"]');
    if (!htmlTextarea) return;
    const start = htmlTextarea.selectionStart ?? htmlTextarea.value.length;
    const end = htmlTextarea.selectionEnd ?? htmlTextarea.value.length;
    const text = htmlTextarea.value;
    htmlTextarea.value = text.substring(0, start) + snippet + text.substring(end);
    htmlTextarea.focus();
    htmlTextarea.selectionStart = htmlTextarea.selectionEnd = start + snippet.length;
    htmlTextarea.dispatchEvent(new Event('input', { bubbles: true }));
};

const createCustomFieldControl = (row, prefix, key, type, value = '', root = null) => {
    const container = row.querySelector('[data-custom-value]');
    if (!container) return;
    const prior = container.querySelector('[data-existing-value]')?.value ?? '';
    container.replaceChildren();
    const fieldName = `${prefix}[values][${key}]`;

    if (type === 'paragraph') {
        const input = document.createElement('textarea');
        input.name = fieldName;
        input.rows = 2;
        input.value = value;
        input.placeholder = 'Enter text';
        container.appendChild(input);
    } else if (type === 'image' || type === 'video') {
        const existing = document.createElement('input');
        existing.type = 'hidden';
        existing.name = `${prefix}[existing_values][${key}]`;
        existing.value = prior || value;
        existing.dataset.existingValue = '';
        container.appendChild(existing);

        const input = document.createElement('input');
        input.type = 'file';
        input.name = fieldName;
        input.accept = type === 'image' ? 'image/jpeg,image/png,image/webp,image/gif,image/svg+xml' : 'video/mp4,video/webm,video/ogg';
        input.required = !(prior || value);
        container.appendChild(input);
    } else {
        const input = document.createElement('input');
        input.type = type === 'link' ? 'url' : 'text';
        input.name = fieldName;
        input.value = value;
        input.placeholder = type === 'link' ? 'https://example.com' : 'Enter value';
        container.appendChild(input);
    }
};

const mountCustomBuilder = (root) => {
    if (!root || root.dataset.mounted === 'true') return;
    root.dataset.mounted = 'true';
    const prefix = root.dataset.prefix || 'content';
    let schema = [];
    let values = {};
    try {
        schema = JSON.parse(root.dataset.schema || '[]');
        values = JSON.parse(root.dataset.values || '{}');
    } catch (error) {
        schema = [];
    }
    const list = root.querySelector('[data-custom-fields]');
    const fileInput = root.querySelector('.csb-upload-file-input');
    const mediaStatus = root.querySelector('[data-media-status]');
    const mediaGallery = root.querySelector('[data-media-gallery]');

    // Tab switching
    root.querySelectorAll('.csb-tab-btn').forEach((btn) => {
        btn.addEventListener('click', () => {
            const targetTab = btn.dataset.tab;
            root.querySelectorAll('.csb-tab-btn').forEach(b => b.classList.toggle('is-active', b === btn));
            root.querySelectorAll('.csb-pane').forEach(pane => {
                const isMatch = pane.dataset.pane === targetTab;
                pane.hidden = !isMatch;
                pane.classList.toggle('is-active', isMatch);
            });
        });
    });

    // Helper: Add media card to gallery
    const addMediaCard = (url, filename) => {
        if (!mediaGallery) return;
        if (mediaGallery.querySelector(`[data-url="${url}"]`)) return;

        const card = document.createElement('div');
        card.className = 'csb-media-card';
        card.dataset.url = url;
        card.innerHTML = `
            <img src="${url}" alt="${filename}" class="csb-media-thumb">
            <div class="csb-media-details">
                <span class="csb-media-name" title="${filename}">${filename}</span>
                <span class="csb-media-url">${url}</span>
            </div>
            <div class="csb-media-actions">
                <button type="button" class="csb-insert-img-btn" title="Insert image tag into HTML editor">
                    <i class="fa-solid fa-plus"></i> Insert into HTML
                </button>
                <button type="button" class="csb-copy-url-btn" title="Copy image URL">
                    <i class="fa-regular fa-copy"></i> Copy URL
                </button>
            </div>
        `;
        card.querySelector('.csb-insert-img-btn').addEventListener('click', () => {
            insertIntoHtml(root, `<img src="${url}" alt="${filename}" class="custom-img" />\n`);
            // Switch to HTML tab
            const htmlTabBtn = root.querySelector('.csb-tab-btn[data-tab="html"]');
            htmlTabBtn?.click();
        });
        card.querySelector('.csb-copy-url-btn').addEventListener('click', (e) => {
            navigator.clipboard?.writeText(url);
            const btn = e.currentTarget;
            btn.innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
            setTimeout(() => { btn.innerHTML = '<i class="fa-regular fa-copy"></i> Copy URL'; }, 1500);
        });
        mediaGallery.prepend(card);
    };

    // Pre-populate demo / existing images in gallery
    Object.entries(values).forEach(([k, val]) => {
        if (typeof val === 'string' && val.match(/\.(jpg|jpeg|png|webp|gif|svg)/i)) {
            const url = val.startsWith('http') || val.startsWith('/') ? val : (val.startsWith('assets/') ? `/${val}` : `/storage/${val}`);
            addMediaCard(url, val.split('/').pop());
        }
    });
    addMediaCard('/assets/images/retrotech-mark.png', 'retrotech-mark.png');

    // AJAX image upload
    fileInput?.addEventListener('change', async () => {
        const file = fileInput.files?.[0];
        if (!file) return;
        if (mediaStatus) {
            mediaStatus.hidden = false;
            mediaStatus.textContent = `Uploading ${file.name}…`;
            mediaStatus.className = 'csb-media-status is-uploading';
        }

        const formData = new FormData();
        formData.append('image', file);
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content
            || addSectionForm?.querySelector('input[name="_token"]')?.value
            || '';
        formData.append('_token', csrfToken);

        try {
            const uploadUrl = '{{ route("admin.webpages.upload_media") }}';
            const res = await fetch(uploadUrl, {
                method: 'POST',
                body: formData,
                headers: { 'Accept': 'application/json' }
            });
            const json = await res.json();
            if (!res.ok || !json.success) throw new Error(json.error || 'Upload failed');
            if (mediaStatus) {
                mediaStatus.hidden = false;
                mediaStatus.textContent = `✓ Uploaded ${json.filename} successfully!`;
                mediaStatus.className = 'csb-media-status is-success';
                setTimeout(() => { mediaStatus.hidden = true; }, 3000);
            }
            addMediaCard(json.url, json.filename);
            fileInput.value = '';
        } catch (err) {
            if (mediaStatus) {
                mediaStatus.hidden = false;
                mediaStatus.textContent = err.message || 'Image upload failed. Please try again.';
                mediaStatus.className = 'csb-media-status is-error';
            }
        }
    });

    // Preset buttons
    root.querySelectorAll('[data-preset]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const presetKey = btn.dataset.preset;
            const preset = customPresets[presetKey];
            if (!preset) return;
            const htmlArea = root.querySelector('textarea[name$="[html]"]');
            const cssArea = root.querySelector('textarea[name$="[css]"]');
            const jsArea = root.querySelector('textarea[name$="[js]"]');
            if (htmlArea) htmlArea.value = preset.html;
            if (cssArea) cssArea.value = preset.css;
            if (jsArea) jsArea.value = preset.js;
            // Switch to HTML tab
            root.querySelector('.csb-tab-btn[data-tab="html"]')?.click();
        });
    });

    // Tab indentation
    root.querySelectorAll('textarea').forEach((textarea) => {
        if (textarea.dataset.tabIndented) return;
        textarea.dataset.tabIndented = 'true';
        textarea.addEventListener('keydown', (e) => {
            if (e.key === 'Tab') {
                e.preventDefault();
                const start = textarea.selectionStart;
                const end = textarea.selectionEnd;
                textarea.value = textarea.value.substring(0, start) + '  ' + textarea.value.substring(end);
                textarea.selectionStart = textarea.selectionEnd = start + 2;
            }
        });
    });

    // Dynamic fields (optional tab)
    const addRow = (field = {}, position = list?.children.length || 0) => {
        if (!list) return;
        const row = document.createElement('div');
        row.className = 'csb-field-row';
        row.innerHTML = `
            <div class="csb-field-col">
                <label>Tag name</label>
                <input name="${prefix}[schema][${position}][key]" value="${field.key || 'tag_' + (position + 1)}" placeholder="heading" required>
            </div>
            <div class="csb-field-col">
                <label>Label</label>
                <input name="${prefix}[schema][${position}][label]" value="${field.label || ''}" placeholder="Main Heading" required>
            </div>
            <div class="csb-field-col">
                <label>Type</label>
                <select name="${prefix}[schema][${position}][type]">
                    <option value="heading" ${field.type === 'heading' ? 'selected' : ''}>Heading</option>
                    <option value="paragraph" ${field.type === 'paragraph' ? 'selected' : ''}>Paragraph</option>
                    <option value="text" ${field.type === 'text' ? 'selected' : ''}>Short text</option>
                    <option value="image" ${field.type === 'image' ? 'selected' : ''}>Image upload</option>
                    <option value="link" ${field.type === 'link' ? 'selected' : ''}>Link</option>
                </select>
            </div>
            <div class="csb-field-col csb-field-col-val" data-custom-value></div>
            <button type="button" class="csb-remove-btn" title="Remove field"><i class="fa-solid fa-xmark"></i></button>
        `;
        row.querySelector('.csb-remove-btn').addEventListener('click', () => row.remove());
        list.appendChild(row);
        createCustomFieldControl(row, prefix, field.key || 'tag_' + (position + 1), field.type || 'heading', values[field.key] || '', root);
    };

    schema.forEach((field, index) => addRow(field, index));
    root.querySelector('[data-add-custom-field]')?.addEventListener('click', () => addRow());
};

const renderCustomBuilder = (defaults = null) => {
    sectionFieldsContainer.replaceChildren();
    const root = document.createElement('div');
    root.className = 'seo-field-full custom-section-builder';
    root.dataset.customBuilder = '';
    root.dataset.prefix = 'content';

    const initialSchema = defaults?.schema || [];
    const initialValues = defaults?.values || {};
    const initialHtml = defaults?.html ?? customPresets.hero.html;
    const initialCss = defaults?.css ?? customPresets.hero.css;
    const initialJs = defaults?.js ?? customPresets.hero.js;

    root.dataset.schema = JSON.stringify(initialSchema);
    root.dataset.values = JSON.stringify(initialValues);

    root.innerHTML = `
        <div class="csb-toolbar">
            <div class="csb-toolbar-info">
                <span class="csb-badge"><i class="fa-solid fa-code"></i> Custom Section Builder</span>
                <span class="csb-hint">Write raw HTML & CSS below, or click a template to start:</span>
            </div>
            <div class="csb-presets">
                <button type="button" class="csb-preset-btn" data-preset="hero" title="Load Hero Banner"><i class="fa-solid fa-star"></i> Hero Banner</button>
                <button type="button" class="csb-preset-btn" data-preset="cards" title="Load 3-Card Grid"><i class="fa-solid fa-grip"></i> 3-Card Grid</button>
                <button type="button" class="csb-preset-btn" data-preset="cta" title="Load Gradient CTA"><i class="fa-solid fa-bullhorn"></i> Gradient CTA</button>
                <button type="button" class="csb-preset-btn" data-preset="blank" title="Start with clean blank canvas"><i class="fa-regular fa-file"></i> Blank Canvas</button>
            </div>
        </div>

        <div class="csb-tabs">
            <button type="button" class="csb-tab-btn is-active" data-tab="html">
                <i class="fa-brands fa-html5" style="color: #ea580c;"></i> HTML Layout
            </button>
            <button type="button" class="csb-tab-btn" data-tab="css">
                <i class="fa-brands fa-css3-alt" style="color: #2563eb;"></i> Custom CSS
            </button>
            <button type="button" class="csb-tab-btn" data-tab="js">
                <i class="fa-brands fa-js" style="color: #ca8a04;"></i> JavaScript
            </button>
            <button type="button" class="csb-tab-btn" data-tab="media">
                <i class="fa-solid fa-photo-film" style="color: #166534;"></i> Upload Images & Media
            </button>
            <button type="button" class="csb-tab-btn" data-tab="vars">
                <i class="fa-solid fa-sliders" style="color: #64748b;"></i> Dynamic Fields (Optional)
            </button>
        </div>

        <!-- Tab 1: HTML Layout -->
        <div class="csb-pane is-active" data-pane="html">
            <div class="csb-pane-header">
                <label><i class="fa-brands fa-html5" style="color: #ea580c;"></i> HTML Code</label>
                <span class="csb-pane-tip">Press <strong>[Tab]</strong> to indent. Real content can be written directly inside HTML tags.</span>
            </div>
            <textarea name="content[html]" class="csb-code-textarea" rows="12" spellcheck="false" placeholder="<!-- Write your raw HTML here -->" required></textarea>
        </div>

        <!-- Tab 2: Custom CSS -->
        <div class="csb-pane" data-pane="css" hidden>
            <div class="csb-pane-header">
                <label><i class="fa-brands fa-css3-alt" style="color: #2563eb;"></i> CSS Styles</label>
                <span class="csb-pane-tip">Styles written here are automatically scoped to this section.</span>
            </div>
            <textarea name="content[css]" class="csb-code-textarea" rows="12" spellcheck="false" placeholder="/* Write custom CSS rules here */"></textarea>
        </div>

        <!-- Tab 3: Custom JS -->
        <div class="csb-pane" data-pane="js" hidden>
            <div class="csb-pane-header">
                <label><i class="fa-brands fa-js" style="color: #ca8a04;"></i> JavaScript Code (Optional)</label>
                <span class="csb-pane-tip">Runs automatically when the section loads. Access dynamic data at <code>window.sectionData</code>.</span>
            </div>
            <textarea name="content[js]" class="csb-code-textarea" rows="8" spellcheck="false" placeholder="// Optional JavaScript"></textarea>
        </div>

        <!-- Tab 4: Upload Images & Media -->
        <div class="csb-pane" data-pane="media" hidden>
            <div class="csb-media-uploader">
                <div class="csb-upload-dropzone">
                    <i class="fa-solid fa-cloud-arrow-up csb-upload-icon"></i>
                    <div class="csb-upload-prompt">
                        <strong>Choose an image to upload from your computer</strong>
                        <span>Supports JPG, PNG, WEBP, GIF, SVG (up to 20MB)</span>
                    </div>
                    <input type="file" class="csb-upload-file-input" accept="image/jpeg,image/png,image/webp,image/gif,image/svg+xml">
                </div>
                <div class="csb-media-status" data-media-status hidden></div>
                <div class="csb-media-gallery" data-media-gallery>
                    <!-- Uploaded images appear here with [Insert <img> into HTML] button -->
                </div>
            </div>
        </div>

        <!-- Tab 5: Dynamic Fields (Optional) -->
        <div class="csb-pane" data-pane="vars" hidden>
            <div class="csb-fields-panel">
                <div class="csb-fields-header">
                    <p>Define dynamic variables (e.g. <code>@{{ heading }}</code>) to bind inputs. If not needed, you can simply write text directly in the HTML tab.</p>
                    <button type="button" class="seo-section-preview-button csb-add-field-btn" data-add-custom-field>
                        <i class="fa-solid fa-plus"></i> Add field
                    </button>
                </div>
                <div data-custom-fields class="csb-fields-list"></div>
            </div>
        </div>
    `;

    const htmlArea = root.querySelector('textarea[name="content[html]"]');
    const cssArea = root.querySelector('textarea[name="content[css]"]');
    const jsArea = root.querySelector('textarea[name="content[js]"]');
    if (htmlArea) htmlArea.value = initialHtml;
    if (cssArea) cssArea.value = initialCss;
    if (jsArea) jsArea.value = initialJs;

    sectionFieldsContainer.appendChild(root);
    mountCustomBuilder(root);
};

document.querySelectorAll('[data-custom-builder]').forEach(mountCustomBuilder);

const placeInsertionPreview = () => {
    const container = document.querySelector('.seo-editor-stage .seo-service-page');
    if (!container || !insertionPreview || !sectionPositionInput || insertionPreview.hidden) return;
    const sections = Array.from(container.querySelectorAll(':scope > .seo-editor-section:not(.seo-editor-insertion-preview)'));
    const position = Math.max(1, Math.min(sections.length + 1, Number(sectionPositionInput.value || sections.length + 1)));
    sectionPositionInput.value = position;
    sectionPositionInput.max = sections.length + 1;
    const hint = sectionPositionInput.parentElement.querySelector('small');
    if (hint) hint.textContent = `Choose 1–${sections.length + 1}. Existing sections shift down.`;
    insertionPreview.querySelector('[data-insertion-position]').textContent = position;
    container.insertBefore(insertionPreview, sections[position - 1] || null);
    document.querySelector('[data-no-sections]')?.setAttribute('hidden', 'hidden');
};

sectionPositionInput?.addEventListener('input', placeInsertionPreview);
sectionPositionInput?.addEventListener('change', placeInsertionPreview);

const makeSectionField = (key, field, name, value = '') => {
    const wrapper = document.createElement('div');
    wrapper.className = 'seo-field';
    if (['textarea', 'richtext', 'image'].includes(field.type)) wrapper.classList.add('seo-field-full');
    const label = document.createElement('label');
    label.textContent = field.label || key.replaceAll('_', ' ');
    const fieldId = `add-section-field-${++sectionFieldId}`;
    label.htmlFor = fieldId;
    wrapper.appendChild(label);
    let control;
    if (field.type === 'textarea' || field.type === 'richtext') {
        control = document.createElement('textarea');
        control.value = value ?? '';
    } else if (field.type === 'select') {
        control = document.createElement('select');
        Object.entries(field.options || {}).forEach(([optionValue, optionLabel]) => {
            const option = document.createElement('option');
            option.value = optionValue;
            option.textContent = optionLabel;
            option.selected = String(value) === String(optionValue);
            control.appendChild(option);
        });
    } else {
        control = document.createElement('input');
        control.type = field.type === 'image' ? 'file' : 'text';
        if (field.type === 'image') control.accept = 'image/jpeg,image/png,image/webp,image/gif';
        else control.value = value ?? '';
    }
    control.name = name;
    control.id = fieldId;
    wrapper.appendChild(control);
    return wrapper;
};

const renderSectionFields = (fields, defaults) => {
    sectionFieldsContainer.replaceChildren();
    Object.entries(fields || {}).forEach(([key, field]) => {
        if (field.type !== 'repeater') {
            sectionFieldsContainer.appendChild(makeSectionField(key, field, `content[${key}]`, defaults?.[key] ?? ''));
            return;
        }
        const group = document.createElement('div');
        group.className = 'seo-field seo-field-full seo-add-repeater';
        const groupLabel = document.createElement('label');
        groupLabel.textContent = field.label || key.replaceAll('_', ' ');
        group.appendChild(groupLabel);
        const rows = document.createElement('div');
        rows.className = 'seo-repeater-items';
        const appendRow = (rowData = {}) => {
            const row = document.createElement('div');
            row.className = 'seo-repeater-item';
            Object.entries(field.fields || {}).forEach(([childKey, childField]) => {
                row.appendChild(makeSectionField(childKey, childField, `content[${key}][${rows.children.length}][${childKey}]`, rowData?.[childKey] ?? ''));
            });
            const remove = document.createElement('button');
            remove.type = 'button';
            remove.className = 'seo-add-repeater-remove';
            remove.setAttribute('aria-label', 'Remove item');
            remove.innerHTML = '<i class="fa-solid fa-xmark" aria-hidden="true"></i>';
            remove.addEventListener('click', () => {
                row.remove();
                Array.from(rows.children).forEach((item, index) => item.querySelectorAll('[name]').forEach((input) => {
                    input.name = input.name.replace(new RegExp(`(content|existing_images)\\[${key}\\]\\[\\d+\\]`), (_, prefix) => `${prefix}[${key}][${index}]`);
                }));
            });
            row.appendChild(remove);
            rows.appendChild(row);
        };
        (defaults?.[key] || []).forEach(appendRow);
        const add = document.createElement('button');
        add.type = 'button';
        add.className = 'seo-section-preview-button seo-add-repeater-button';
        add.textContent = 'Add item';
        add.addEventListener('click', () => appendRow());
        group.append(rows, add);
        sectionFieldsContainer.appendChild(group);
    });
    sectionFieldsContainer.hidden = false;
};

sectionTypeSelect?.addEventListener('change', async () => {
    const type = sectionTypeSelect.value;
    sectionFieldsContainer.replaceChildren();
    sectionFieldsContainer.hidden = !type;
    sectionFieldsContainer.textContent = type ? 'Loading fields…' : '';
    if (sectionPreviewButton) sectionPreviewButton.disabled = true;
    if (addSectionSubmit) addSectionSubmit.disabled = true;
    if (!type) return;
    try {
        const url = sectionPreviewButton.dataset.previewUrl.replace('__template__', encodeURIComponent(type));
        const response = await fetch(url, { headers: { Accept: 'application/json' } });
        if (!response.ok) throw new Error('Template fields could not be loaded.');
        const result = await response.json();
        if (sectionTypeSelect.value !== type) return;
        if (result.customBuilder) renderCustomBuilder(result.defaults);
        else renderSectionFields(result.fields, result.defaults);
        if (insertionPreview) {
            insertionPreview.hidden = false;
            insertionPreviewContent.innerHTML = '<p class="seo-editor-insertion-empty">Fill in the fields, then select Preview layout to see it here.</p>';
            placeInsertionPreview();
        }
        if (hasExistingFaq && ['faq', 'seo_faq'].includes(type)) {
            const infoBanner = document.createElement('div');
            infoBanner.style.cssText = 'padding: 10px 14px; background: #f0fdf4; border: 1px solid #86efac; border-radius: 8px; color: #166534; font-size: 0.85rem; margin-bottom: 1rem;';
            infoBanner.innerHTML = '<i class="fa-solid fa-circle-info"></i> <strong>Existing FAQ section found:</strong> Questions added here will be appended directly to the existing FAQ list on this page.';
            sectionFieldsContainer.prepend(infoBanner);
            if (addSectionSubmit) addSectionSubmit.textContent = 'Add to existing FAQ';
            if (sectionOrderContainer) sectionOrderContainer.style.display = 'none';
        } else {
            if (addSectionSubmit) addSectionSubmit.textContent = 'Add section';
            if (sectionOrderContainer) sectionOrderContainer.style.display = '';
        }
        if (sectionPreviewButton) sectionPreviewButton.disabled = false;
        if (addSectionSubmit) addSectionSubmit.disabled = false;
    } catch (error) {
        sectionFieldsContainer.textContent = 'The fields for this layout could not be loaded. Please choose it again.';
    }
});

sectionPreviewButton?.addEventListener('click', async () => {
    const selectedType = sectionTypeSelect?.value;
    if (!selectedType || !insertionPreview || !insertionPreviewContent) return;

    insertionPreview.hidden = false;
    insertionPreviewContent.textContent = 'Loading preview…';
    placeInsertionPreview();

    try {
        const url = sectionPreviewButton.dataset.previewUrl.replace('__template__', encodeURIComponent(selectedType));
        const response = await fetch(url, {
            method: 'POST',
            body: new FormData(addSectionForm),
            headers: { Accept: 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
        });
        if (!response.ok) throw new Error('Preview could not be loaded.');
        const result = await response.json();
        insertionPreview.querySelector('[data-insertion-position]').textContent = sectionPositionInput?.value || '1';
        insertionPreviewContent.innerHTML = result.html;
        insertionPreview.scrollIntoView({ behavior: 'smooth', block: 'center' });
    } catch (error) {
        insertionPreviewContent.textContent = 'Preview could not be loaded. Please try again.';
    }
});

const savePageForm = document.getElementById('save-page-form');
@if(session('page_saved'))
document.querySelectorAll('.seo-editor-edit').forEach((editor) => { editor.open = false; });
@endif
document.querySelectorAll('[data-toggle-section]').forEach((button) => {
    button.addEventListener('click', () => {
        const section = button.closest('.seo-editor-section');
        const collapsed = section?.classList.toggle('is-collapsed');
        button.setAttribute('aria-expanded', String(!collapsed));
        button.querySelector('span').textContent = collapsed ? 'Expand' : 'Collapse';
        button.querySelector('i').className = collapsed ? 'fa-solid fa-chevron-down' : 'fa-solid fa-chevron-up';
    });
});
document.querySelectorAll('[data-section-order]').forEach((input) => {
    const applySectionOrder = () => {
        const container = document.querySelector('.seo-editor-stage .seo-service-page');
        const sections = Array.from(container?.querySelectorAll(':scope > .seo-editor-section:not(.seo-editor-insertion-preview)') || []);
        const section = input.closest('.seo-editor-section');
        if (!container || !section || !sections.length) return;

        const currentIndex = sections.indexOf(section);
        const requestedIndex = Math.max(0, Math.min(sections.length - 1, Number(input.value || 1) - 1));
        sections.splice(currentIndex, 1);
        sections.splice(requestedIndex, 0, section);
        sections.forEach((item, index) => {
            container.appendChild(item);
            const position = index + 1;
            const orderInput = item.querySelector('[data-section-order]');
            if (orderInput) {
                orderInput.value = position;
                orderInput.max = sections.length;
                const hint = orderInput.parentElement.querySelector('small');
                if (hint) hint.textContent = `Position 1–${sections.length}. Other sections shift to make room.`;
            }
            const label = item.querySelector('[data-section-position]');
            if (label) label.textContent = `Section ${position}`;
        });
        placeInsertionPreview();
    };
    input.addEventListener('change', applySectionOrder);
    input.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            event.preventDefault();
            applySectionOrder();
            input.blur();
        }
    });
});
const pendingSectionRemovals = new Set();
document.querySelectorAll('[data-remove-section]').forEach((button) => {
    button.addEventListener('click', () => {
        const section = button.closest('.seo-editor-section');
        const sectionId = button.dataset.removeSection;
        const isPending = pendingSectionRemovals.has(sectionId);
        if (isPending) pendingSectionRemovals.delete(sectionId);
        else pendingSectionRemovals.add(sectionId);

        section?.classList.toggle('is-pending-removal', !isPending);
        button.setAttribute('aria-pressed', String(!isPending));
        button.innerHTML = isPending
            ? '<i class="fa-regular fa-trash-can" aria-hidden="true"></i> Remove'
            : '<i class="fa-solid fa-rotate-left" aria-hidden="true"></i> Undo remove';
        const pendingLabel = section?.querySelector('[data-pending-label]');
        if (pendingLabel) pendingLabel.hidden = isPending;
    });
});

savePageForm?.addEventListener('submit', () => {
    const saveStatus = savePageForm.querySelector('[data-save-status]');
    if (saveStatus) saveStatus.textContent = 'Saving your page…';

    savePageForm.querySelectorAll('[name="removed_sections[]"]').forEach((input) => input.remove());
    savePageForm.querySelectorAll('[name="ordered_sections[]"]').forEach((input) => input.remove());
    document.querySelectorAll('.seo-editor-stage .seo-service-page > .seo-editor-section:not(.seo-editor-insertion-preview)').forEach((section) => {
        const orderInput = document.createElement('input');
        orderInput.type = 'hidden';
        orderInput.name = 'ordered_sections[]';
        orderInput.value = section.id.replace('section-', '');
        savePageForm.appendChild(orderInput);
    });
    pendingSectionRemovals.forEach((sectionId) => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'removed_sections[]';
        input.value = sectionId;
        savePageForm.appendChild(input);
    });
});

// Toggle all sections expand / collapse
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
</script>
@endpush
