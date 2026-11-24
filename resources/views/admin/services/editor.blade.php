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

const wireThemeGuide = (root) => {
    const html = `<section class="brand-card">
  <p class="brand-card__eyebrow">@{{ eyebrow }}</p>
  <h2>@{{ heading }}</h2>
  <p>@{{ paragraph }}</p>
</section>`;
    const css = `.brand-card {
  padding: clamp(2rem, 6vw, 4rem);
  border: 1px solid #dfe8e1;
  border-radius: 20px;
  background: #f5f8f5;
  color: #26332b;
  font-family: Inter, Arial, sans-serif;
}

.brand-card__eyebrow {
  color: #397b4e;
  font-weight: 700;
  letter-spacing: .12em;
  text-transform: uppercase;
}`;

    const themePanel = root.querySelector('[data-theme-panel]');
    const toggle = root.querySelector('[data-theme-toggle]');
    const htmlCode = root.querySelector('[data-theme-html]');
    const cssCode = root.querySelector('[data-theme-css]');
    if (htmlCode) htmlCode.textContent = html;
    if (cssCode) cssCode.textContent = css;
    toggle?.addEventListener('click', () => {
        const isHidden = themePanel.hidden;
        themePanel.hidden = !isHidden;
        toggle.setAttribute('aria-expanded', String(isHidden));
    });
};

const createCustomFieldControl = (row, prefix, key, type, value = '') => {
    const container = row.querySelector('[data-custom-value]');
    const prior = container.querySelector('[data-existing-value]')?.value ?? '';
    container.replaceChildren();
    const fieldName = `${prefix}[values][${key}]`;
    if (type === 'paragraph') {
        const input = document.createElement('textarea');
        input.name = fieldName;
        input.rows = 3;
        input.value = value;
        input.placeholder = 'Enter paragraph text';
        container.appendChild(input);
    } else if (type === 'image' || type === 'video') {
        const existing = document.createElement('input');
        existing.type = 'hidden';
        existing.name = `${prefix}[existing_values][${key}]`;
        existing.value = prior || value;
        existing.dataset.existingValue = '';
        container.appendChild(existing);
        if (existing.value) {
            const current = document.createElement('small');
            current.textContent = `Current file: ${existing.value}`;
            container.appendChild(current);
        }
        const input = document.createElement('input');
        input.type = 'file';
        input.name = fieldName;
        input.accept = type === 'image' ? 'image/jpeg,image/png,image/webp,image/gif' : 'video/mp4,video/webm,video/ogg';
        input.required = !existing.value;
        container.appendChild(input);
    } else {
        const input = document.createElement('input');
        input.type = 'text';
        input.name = fieldName;
        input.value = value;
        input.placeholder = type === 'link' ? 'https://example.com' : `Enter ${customFieldTypes[type].toLowerCase()}`;
        if (type === 'link') input.type = 'url';
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
    const variables = root.querySelector('[data-custom-variables]');

    const updateVariables = () => {
        const keys = [...list.querySelectorAll('[data-field-key]')].map((input) => input.value.trim()).filter(Boolean);
        variables.textContent = keys.length
            ? `Available HTML variables: ${keys.map((key) => `@{{ ${key} }}`).join(', ')}`
            : 'Add fields to make variables available in your HTML.';
    };

    const addRow = (field = {}, position = list.children.length) => {
        const row = document.createElement('div');
        row.className = 'seo-repeater-item custom-content-field-row';
        row.dataset.customFieldRow = '';
        const keyWrap = document.createElement('div');
        keyWrap.className = 'seo-field';
        const keyLabel = document.createElement('label');
        keyLabel.textContent = 'Variable name';
        const keyInput = document.createElement('input');
        keyInput.required = true;
        keyInput.pattern = '[A-Za-z][A-Za-z0-9_]{0,39}';
        keyInput.placeholder = 'hero_heading';
        keyInput.value = field.key || `field_${position + 1}`;
        keyInput.name = `${prefix}[schema][${position}][key]`;
        keyInput.dataset.fieldKey = '';
        keyWrap.append(keyLabel, keyInput);

        const labelWrap = document.createElement('div');
        labelWrap.className = 'seo-field';
        const labelLabel = document.createElement('label');
        labelLabel.textContent = 'Input label';
        const labelInput = document.createElement('input');
        labelInput.required = true;
        labelInput.maxLength = 100;
        labelInput.placeholder = 'Hero heading';
        labelInput.value = field.label || '';
        labelInput.name = `${prefix}[schema][${position}][label]`;
        labelWrap.append(labelLabel, labelInput);

        const typeWrap = document.createElement('div');
        typeWrap.className = 'seo-field';
        const typeLabel = document.createElement('label');
        typeLabel.textContent = 'Input type';
        const typeSelect = document.createElement('select');
        typeSelect.name = `${prefix}[schema][${position}][type]`;
        Object.entries(customFieldTypes).forEach(([type, title]) => {
            const option = document.createElement('option');
            option.value = type;
            option.textContent = title;
            option.selected = (field.type || 'heading') === type;
            typeSelect.appendChild(option);
        });
        typeWrap.append(typeLabel, typeSelect);

        const valueWrap = document.createElement('div');
        valueWrap.className = 'seo-field custom-content-value';
        valueWrap.dataset.customValue = '';
        const remove = document.createElement('button');
        remove.type = 'button';
        remove.className = 'seo-add-repeater-remove';
        remove.textContent = 'Remove field';
        remove.addEventListener('click', () => {
            row.remove();
            [...list.children].forEach((item, index) => {
                item.querySelectorAll('[name]').forEach((control) => {
                    control.name = control.name.replace(/\[schema\]\[\d+\]/, `[schema][${index}]`);
                });
            });
            updateVariables();
        });
        row.append(keyWrap, labelWrap, typeWrap, valueWrap, remove);
        list.appendChild(row);
        createCustomFieldControl(row, prefix, keyInput.value, typeSelect.value, values[keyInput.value] || '');
        keyInput.addEventListener('input', () => {
            const value = row.querySelector('[data-custom-value] input:not([type="hidden"]), [data-custom-value] textarea');
            const hidden = row.querySelector('[data-existing-value]');
            if (value) value.name = `${prefix}[values][${keyInput.value}]`;
            if (hidden) hidden.name = `${prefix}[existing_values][${keyInput.value}]`;
            updateVariables();
        });
        typeSelect.addEventListener('change', () => {
            const existing = row.querySelector('[data-existing-value]');
            if (existing) existing.value = '';
            createCustomFieldControl(row, prefix, keyInput.value, typeSelect.value);
        });
        updateVariables();
    };

    schema.forEach((field, index) => addRow(field, index));
    root.querySelector('[data-add-custom-field]')?.addEventListener('click', () => addRow());
    wireThemeGuide(root);
};

const renderCustomBuilder = () => {
    sectionFieldsContainer.replaceChildren();
    const root = document.createElement('div');
    root.className = 'seo-field-full custom-section-builder';
    root.dataset.customBuilder = '';
    root.dataset.prefix = 'content';
    root.dataset.schema = '[]';
    root.dataset.values = '{}';
    root.innerHTML = '<h3>Section content fields</h3><p>Choose inputs for this section. Use <code>@{{ heading }}</code> in HTML or read values in JavaScript from <code>window.sectionData.heading</code>. HTML values are escaped; image and video values become uploaded URLs. Files go to public storage; the database stores their paths and section content.</p><div data-custom-fields></div><button type="button" class="seo-section-preview-button" data-add-custom-field>Add content field</button><button type="button" class="seo-section-preview-button" data-theme-toggle aria-expanded="false">Theme</button><div class="custom-theme-panel" data-theme-panel hidden><p>Starter example using the website’s forest green, leaf green, and soft background palette. Define matching fields named eyebrow, heading, and paragraph to use these variables.</p><h4>HTML</h4><pre><code data-theme-html></code></pre><h4>CSS</h4><pre><code data-theme-css></code></pre></div><div class="custom-section-code"><label>HTML layout</label><textarea name="content[html]" rows="10" required></textarea><label>CSS</label><textarea name="content[css]" rows="7"></textarea><label>JavaScript</label><textarea name="content[js]" rows="7"></textarea></div><p data-custom-variables class="custom-section-variables"></p>';
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
        if (result.customBuilder) renderCustomBuilder();
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
    document.querySelectorAll('.seo-editor-edit').forEach((editor) => {
        editor.removeAttribute('open');
        editor.open = false;
    });
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
