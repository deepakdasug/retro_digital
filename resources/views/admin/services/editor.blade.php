@extends('layouts.service-editor')

@section('title', $service->title . ' Visual Editor')

@section('content')
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

<main>
    <div class="seo-editor-intro">
        <span class="seo-eyebrow">Page 2 of 2 · {{ $sectionLabels[$service->page_section] ?? 'Webpage' }} visual editor</span>
        <h1>{{ $service->title }}</h1>
        <p>Preview <code>/{{ $service->page_section }}/{{ $service->slug }}</code> below, edit each section in place, or add one of the reusable templates.</p>
    </div>
    @if(session('success'))<div class="seo-editor-flash seo-editor-content">{{ session('success') }}</div>@endif
    @if($errors->any())<div class="seo-editor-flash seo-editor-content" style="border-color:#e5b9b9;background:#fff3f3;color:#8f2727">Some section values need attention. Review the fields and save again.</div>@endif
    <form id="save-page-form" action="{{ route('admin.webpages.save', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="seo-editor-content seo-save-page-form">
            <span>Edits and section removals stay as drafts until you save the page.</span>
            <button class="seo-editor-save" type="submit">Save page</button>
        </div>

    <div class="seo-editor-stage">
        <div class="seo-service-page">
            @forelse($service->sections as $index => $section)
                @php
                    $template = $templates[$section->section_type] ?? null;
                    $data = is_array($section->content) ? $section->content : [];
                @endphp
                @continue(!$template)
                <section class="seo-editor-section {{ $section->is_active ? '' : 'is-hidden' }}" id="section-{{ $section->id }}">
                    <div class="seo-editor-section-bar">
                        <span><i class="fa-solid fa-grip-lines" aria-hidden="true"></i> Section {{ $index + 1 }} · {{ $template['name'] }}{{ $section->is_active ? '' : ' · Hidden from visitors' }} <em data-pending-label hidden>· Marked for removal; not live until saved</em></span>
                        <button class="seo-editor-remove" type="button" data-remove-section="{{ $section->id }}" aria-pressed="false"><i class="fa-regular fa-trash-can" aria-hidden="true"></i> Remove</button>
                    </div>

                    <div class="seo-editor-preview">
                        @include($template['view'], ['data' => $data, 'section' => $section, 'sectionType' => $section->section_type])
                    </div>

                    <details class="seo-editor-edit">
                        <summary><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i> Edit this section</summary>
                            <div class="seo-editor-fields">
                                <div class="seo-field seo-field-full">
                                    <label><input type="checkbox" name="sections[{{ $section->id }}][is_active]" value="1" @checked(old('sections.' . $section->id . '.is_active', $section->is_active))> Show this section to visitors</label>
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
                                                                @if(($childField['type'] ?? 'text') === 'textarea')
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
                                                            @if(($childField['type'] ?? 'text') === 'textarea')
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
                </section>
            @empty
                <div class="seo-editor-content"><p>No sections yet. Add one below to build the page.</p></div>
            @endforelse
        </div>
    </div>
    </form>

    <div class="seo-editor-content">
        <section class="seo-add-section">
            <h2>Add a section</h2>
            <p>Choose a reusable layout, then fill in its content.</p>
            <form action="{{ route('admin.webpages.sections.store', $service) }}" method="POST">
                @csrf
                <select name="section_type" required aria-label="Section template">
                    @foreach($templates as $type => $template)<option value="{{ $type }}">{{ $template['name'] }}</option>@endforeach
                </select>
                <button class="seo-editor-save" type="submit">Add section</button>
            </form>
        </section>
    </div>
</main>
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

const savePageForm = document.getElementById('save-page-form');
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
    savePageForm.querySelectorAll('[name="removed_sections[]"]').forEach((input) => input.remove());
    pendingSectionRemovals.forEach((sectionId) => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'removed_sections[]';
        input.value = sectionId;
        savePageForm.appendChild(input);
    });
});
</script>
@endpush

