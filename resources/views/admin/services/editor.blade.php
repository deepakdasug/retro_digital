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
    <form id="save-page-form" action="{{ route('admin.webpages.save', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="seo-editor-content seo-save-page-form">
            <span class="seo-save-page-copy"><strong>Page changes</strong><small>Edits, section order, and removals stay as drafts until saved.</small></span>
            <span data-save-status role="status" aria-live="polite"></span>
            <button class="seo-editor-save" type="submit"><i class="fa-solid fa-floppy-disk" aria-hidden="true"></i> Save page</button>
        </div>

        <div class="seo-editor-content seo-schema-panel">
            <details class="seo-schema-accordion" id="schema-accordion">
                <summary class="seo-schema-summary">
                    <div class="seo-schema-title">
                        <i class="fa-solid fa-code" aria-hidden="true"></i>
                        <div>
                            <strong>Page Schema Markup (JSON-LD)</strong>
                            <small>Structured data for Google Rich Results, Service Schema &amp; FAQ Page</small>
                        </div>
                    </div>
                    <div class="seo-schema-meta">
                        <span id="schemaStatusBadge" class="seo-schema-badge {{ $service->schema_markup ? 'configured' : 'auto' }}">
                            <i class="fa-solid {{ $service->schema_markup ? 'fa-check' : 'fa-wand-magic-sparkles' }}"></i>
                            <span>{{ $service->schema_markup ? 'Custom Schema Active' : 'Auto-Generated Active' }}</span>
                        </span>
                        <i class="fa-solid fa-chevron-down seo-schema-chevron" aria-hidden="true"></i>
                    </div>
                </summary>

                <div class="seo-schema-body">
                    <div class="seo-schema-toolbar">
                        <div class="seo-schema-toolbar-left">
                            <button type="button" class="seo-schema-btn" id="generateSchemaBtn">
                                <i class="fa-solid fa-wand-magic-sparkles"></i> Auto-Generate from Page
                            </button>
                            <button type="button" class="seo-schema-btn" id="validateSchemaBtn">
                                <i class="fa-solid fa-circle-check"></i> Validate JSON
                            </button>
                            <button type="button" class="seo-schema-btn danger" id="resetSchemaBtn">
                                <i class="fa-solid fa-rotate-left"></i> Reset to Default
                            </button>
                        </div>
                        <div id="schemaValidationMsg" class="seo-schema-val-msg"></div>
                    </div>

                    <div class="seo-schema-editor-wrap">
                        <label for="schema_markup_input">JSON-LD Script Content <small>(paste valid JSON or &lt;script type="application/ld+json"&gt; tag)</small></label>
                        <textarea id="schema_markup_input" name="schema_markup" class="seo-schema-textarea" rows="12" placeholder='{&#10;  "@context": "https://schema.org",&#10;  "@type": "Service",&#10;  "name": "{{ $service->title }}"&#10;}'>{{ old('schema_markup', $service->schema_markup) }}</textarea>
                    </div>

                    <p class="seo-schema-hint">
                        <i class="fa-solid fa-circle-info"></i>
                        Agar aap ise empty rakhenge, toh live page par automatically Google-compliant <strong>Service</strong> schema aur page ke active <strong>FAQs</strong> ka <strong>FAQPage</strong> schema generate hoga. Custom schema dalne par wahi live page par inject hoga.
                    </p>
                </div>
            </details>
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
                        @include($template['view'], ['data' => $data, 'section' => $section, 'sectionType' => $section->section_type])
                    </div>

                    <details class="seo-editor-edit">
                        <summary><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i> Edit this section</summary>
                            <div class="seo-editor-fields">
                                <div class="seo-field seo-field-full">
                                    <label><input type="checkbox" name="sections[{{ $section->id }}][is_active]" value="1" @checked(old('sections.' . $section->id . '.is_active', $section->is_active))> Show this section to visitors</label>
                                    <small>Checked: visible on the live page. Unchecked: hidden from visitors after you save the page.</small>
                                </div>
                                <div class="seo-field">
                                    <label for="section-order-{{ $section->id }}">Display order</label>
                                    <input id="section-order-{{ $section->id }}" type="number" value="{{ old('sections.' . $section->id . '.sort_order', $index + 1) }}" min="1" max="{{ $service->sections->count() }}" data-section-order data-section-id="{{ $section->id }}">
                                    <small>Position 1–{{ $service->sections->count() }}. Other sections shift to make room.</small>
                                </div>
                                @foreach($template['fields'] as $key => $field)
                                    @php($value = old('sections.' . $section->id . '.content.' . $key, data_get($data, $key, '')))
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
                            </div>
                    </details>
                    </div>
                </section>
            @empty
                <div class="seo-editor-content"><p>No sections yet. Add one below to build the page.</p></div>
            @endforelse
        </div>
    </div>
    </form>

    <div class="seo-editor-content">
        <section class="seo-add-section">
            <div class="seo-add-section-heading"><span class="seo-add-section-icon"><i class="fa-solid fa-plus" aria-hidden="true"></i></span><div><h2>Add a section</h2><p>Choose a layout, fill in its fields, preview it, then add it to the page.</p></div></div>
            <form id="add-section-form" action="{{ route('admin.webpages.sections.store', $service) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="seo-add-section-layout">
                <label for="add-section-type">Section layout</label>
                <select id="add-section-type" name="section_type" required>
                    <option value="" selected disabled>Choose a reusable section layout</option>
                    @foreach($templates as $type => $template)
                        <option value="{{ $type }}">{{ str_replace(['SEO — ', 'SEO - '], '', $template['name']) }}</option>
                    @endforeach
                </select>
                </div>
                @php($newSectionPosition = $service->sections->count() + 1)
                <div class="seo-add-section-order">
                    <label for="new-section-order">Insert at position</label>
                    <input id="new-section-order" type="number" name="sort_order" min="1" max="{{ $newSectionPosition }}" value="{{ old('sort_order', $newSectionPosition) }}" required>
                    <small>Choose 1–{{ $newSectionPosition }}. Existing sections shift down.</small>
                </div>
                <div class="seo-add-section-fields" data-add-section-fields hidden aria-live="polite"></div>
                <div class="seo-add-section-actions">
                <button class="seo-section-preview-button" type="button" data-preview-section data-preview-url="{{ route('admin.webpages.sections.preview', ['service' => $service, 'type' => '__template__']) }}" disabled>Preview layout</button>
                <button class="seo-editor-save" type="submit" disabled data-add-section-submit>Add section</button>
                </div>
            </form>
        </section>
    </div>
</main>
<div class="seo-section-preview-modal" data-section-preview-modal hidden>
    <div class="seo-section-preview-backdrop" data-close-section-preview></div>
    <section class="seo-section-preview-dialog" role="dialog" aria-modal="true" aria-labelledby="section-preview-title">
        <header><div><span>Reusable layout preview</span><h2 id="section-preview-title" data-preview-title>Section preview</h2></div><button type="button" data-close-section-preview aria-label="Close preview"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button></header>
        <p class="seo-section-preview-note">Sample values are editable in the form. The preview uses your current entries.</p>
        <div class="seo-section-preview-content" data-preview-content></div>
    </section>
</div>
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
const hasExistingFaq = @json((bool) $service->sections->contains(fn($s) => in_array($s->section_type, ['faq', 'seo_faq'])));
const sectionPreviewButton = document.querySelector('[data-preview-section]');
const sectionPreviewModal = document.querySelector('[data-section-preview-modal]');
const sectionPreviewContent = sectionPreviewModal?.querySelector('[data-preview-content]');
const sectionPreviewTitle = sectionPreviewModal?.querySelector('[data-preview-title]');
let lastPreviewTrigger = null;
let sectionFieldId = 0;

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
        renderSectionFields(result.fields, result.defaults);
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
    if (!selectedType || !sectionPreviewModal || !sectionPreviewContent) return;

    lastPreviewTrigger = sectionPreviewButton;
    sectionPreviewModal.hidden = false;
    document.body.classList.add('seo-preview-modal-open');
    sectionPreviewTitle.textContent = sectionTypeSelect.selectedOptions[0].textContent;
    sectionPreviewContent.textContent = 'Loading preview…';
    sectionPreviewModal.querySelector('[data-close-section-preview]')?.focus();

    try {
        const url = sectionPreviewButton.dataset.previewUrl.replace('__template__', encodeURIComponent(selectedType));
        const response = await fetch(url, {
            method: 'POST',
            body: new FormData(addSectionForm),
            headers: { Accept: 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
        });
        if (!response.ok) throw new Error('Preview could not be loaded.');
        const result = await response.json();
        sectionPreviewTitle.textContent = result.name;
        sectionPreviewContent.innerHTML = result.html;
    } catch (error) {
        sectionPreviewContent.textContent = 'Preview could not be loaded. Please try again.';
    }
});

const closeSectionPreview = () => {
    if (!sectionPreviewModal) return;
    sectionPreviewModal.hidden = true;
    document.body.classList.remove('seo-preview-modal-open');
    lastPreviewTrigger?.focus();
};
sectionPreviewModal?.querySelectorAll('[data-close-section-preview]').forEach((button) => {
    button.addEventListener('click', closeSectionPreview);
});
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && sectionPreviewModal && !sectionPreviewModal.hidden) closeSectionPreview();
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
        const sections = Array.from(container?.querySelectorAll(':scope > .seo-editor-section') || []);
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
    document.querySelectorAll('.seo-editor-edit').forEach((editor) => {
        editor.removeAttribute('open');
        editor.open = false;
    });
    const saveStatus = savePageForm.querySelector('[data-save-status]');
    if (saveStatus) saveStatus.textContent = 'Saving your page…';

    savePageForm.querySelectorAll('[name="removed_sections[]"]').forEach((input) => input.remove());
    savePageForm.querySelectorAll('[name="ordered_sections[]"]').forEach((input) => input.remove());
    document.querySelectorAll('.seo-editor-stage .seo-service-page > .seo-editor-section').forEach((section) => {
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

// Touchpad & Wheel Scroll Normalization to prevent hyperfast flinging / jumping
(function() {
    let scrollYTarget = window.scrollY;
    let isScrollingAnim = false;

    window.addEventListener('wheel', (e) => {
        // Allow native scroll inside modals, dropdowns, code blocks, or textareas
        if (e.target.closest('.seo-section-preview-modal, .seo-section-preview-dialog, .seo-section-preview-content, textarea, .webpage-table-wrap, select')) {
            return;
        }

        // Prevent number inputs from changing on scroll which accidentally triggers section reordering
        if (document.activeElement && document.activeElement.type === 'number') {
            document.activeElement.blur();
        }

        let delta = e.deltaY;
        if (e.deltaMode === 1) delta *= 36;
        else if (e.deltaMode === 2) delta *= window.innerHeight;

        // Dampen extreme touchpad momentum acceleration flings
        if (Math.abs(delta) > 100) {
            delta = Math.sign(delta) * (100 + Math.pow(Math.abs(delta) - 100, 0.62));
        }

        const maxScroll = Math.max(0, document.documentElement.scrollHeight - window.innerHeight);
        if (!isScrollingAnim) {
            scrollYTarget = window.scrollY;
        }
        scrollYTarget = Math.max(0, Math.min(maxScroll, scrollYTarget + delta));

        e.preventDefault();

        if (!isScrollingAnim) {
            isScrollingAnim = true;
            const animateScroll = () => {
                const current = window.scrollY;
                const diff = scrollYTarget - current;
                if (Math.abs(diff) < 1.5) {
                    window.scrollTo(0, scrollYTarget);
                    isScrollingAnim = false;
                } else {
                    window.scrollTo(0, current + diff * 0.24);
                    requestAnimationFrame(animateScroll);
                }
            };
            requestAnimationFrame(animateScroll);
        }
    }, { passive: false });
})();

// Schema Markup Auto-Generator, Validator & Reset
(function() {
    const generateBtn = document.getElementById('generateSchemaBtn');
    const validateBtn = document.getElementById('validateSchemaBtn');
    const resetBtn = document.getElementById('resetSchemaBtn');
    const textarea = document.getElementById('schema_markup_input');
    const badge = document.getElementById('schemaStatusBadge');
    const msg = document.getElementById('schemaValidationMsg');

    generateBtn?.addEventListener('click', () => {
        const pageUrl = window.location.origin + '/{{ $service->page_section }}/{{ $service->slug }}';
        const pageTitle = @json($service->title);
        const metaDesc = @json($service->meta_description ?: ($service->short_description ?: $service->title));
        const imageUrl = @json($service->og_image ? (str_starts_with($service->og_image, 'http') ? $service->og_image : asset($service->og_image)) : asset('assets/images/retrotech-mark.png'));

        // Extract FAQs from active page sections in preview
        const faqItems = [];
        document.querySelectorAll('.seo-editor-section:not(.is-pending-removal)').forEach(sec => {
            const questions = sec.querySelectorAll('.seo-lp-faq-list details, .seo-faq-item');
            questions.forEach(q => {
                const titleEl = q.querySelector('summary span, summary');
                const descEl = q.querySelector('p, .seo-faq-answer');
                if (titleEl && descEl) {
                    const titleText = titleEl.textContent.trim().replace(/\s*\+\s*$/, '');
                    const descText = descEl.textContent.trim();
                    if (titleText && descText) {
                        faqItems.push({
                            "@type": "Question",
                            "name": titleText,
                            "acceptedAnswer": {
                                "@type": "Answer",
                                "text": descText
                            }
                        });
                    }
                }
            });
        });

        const schemaGraph = [
            {
                "@type": "Organization",
                "@id": window.location.origin + "/#organization",
                "name": "Retrotech Digital",
                "url": window.location.origin,
                "logo": window.location.origin + "/assets/images/logo.png"
            },
            {
                "@type": "WebPage",
                "@id": pageUrl + "/#webpage",
                "url": pageUrl,
                "name": pageTitle,
                "description": metaDesc,
                "isPartOf": { "@id": window.location.origin + "/#website" }
            },
            {
                "@type": "Service",
                "@id": pageUrl + "/#service",
                "name": pageTitle,
                "description": metaDesc,
                "url": pageUrl,
                "provider": { "@id": window.location.origin + "/#organization" },
                "image": imageUrl
            }
        ];

        if (faqItems.length > 0) {
            schemaGraph.push({
                "@type": "FAQPage",
                "@id": pageUrl + "/#faq",
                "mainEntity": faqItems
            });
        }

        const fullSchema = {
            "@context": "https://schema.org",
            "@graph": schemaGraph
        };

        textarea.value = JSON.stringify(fullSchema, null, 2);
        if (badge) {
            badge.className = 'seo-schema-badge configured';
            badge.innerHTML = '<i class="fa-solid fa-check"></i> <span>Custom Schema Configured</span>';
        }
        if (msg) {
            msg.className = 'seo-schema-val-msg valid';
            msg.textContent = `Generated rich schema with ${schemaGraph.length} linked types (${faqItems.length} FAQs included)! Click "Save page" to apply.`;
        }
    });

    validateBtn?.addEventListener('click', () => {
        let val = textarea.value.trim();
        if (!val) {
            if (msg) {
                msg.className = 'seo-schema-val-msg valid';
                msg.textContent = 'Empty (Default automatic schema will be used).';
            }
            return;
        }
        if (val.startsWith('<script') && val.endsWith('</script>')) {
            val = val.replace(/<script[^>]*>/, '').replace(/<\/script>$/, '').trim();
        }
        try {
            const parsed = JSON.parse(val);
            textarea.value = JSON.stringify(parsed, null, 2);
            if (msg) {
                msg.className = 'seo-schema-val-msg valid';
                msg.textContent = 'Valid JSON-LD schema formatted successfully!';
            }
        } catch (err) {
            if (msg) {
                msg.className = 'seo-schema-val-msg invalid';
                msg.textContent = 'Invalid JSON: ' + err.message;
            }
        }
    });

    resetBtn?.addEventListener('click', () => {
        if (confirm('Clear custom schema? The page will use default auto-generated Service schema.')) {
            textarea.value = '';
            if (badge) {
                badge.className = 'seo-schema-badge auto';
                badge.innerHTML = '<i class="fa-solid fa-wand-magic-sparkles"></i> <span>Auto-Generated Active</span>';
            }
            if (msg) {
                msg.className = 'seo-schema-val-msg valid';
                msg.textContent = 'Custom schema cleared. Default schema will be used upon save.';
            }
        }
    });
})();
</script>
@endpush

