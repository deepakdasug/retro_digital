@php
    $sectionType = $sectionType ?? ($section->section_type ?? '');
    $data = is_array($data ?? null) ? $data : (is_array($section->content ?? null) ? $section->content : []);
@endphp

@if($sectionType === 'hero')
    @include('sections.seo_landing', [
        'section' => $section,
        'sectionType' => 'seo_hero',
        'data' => [
            'eyebrow' => $data['eyebrow'] ?? '',
            'heading' => $data['title'] ?? '',
            'body' => $data['subtitle'] ?? '',
            'hero_image' => $data['background_image'] ?? '',
            'hero_image_alt' => $data['title'] ?? 'Service page hero',
            'button_text' => $data['cta_text'] ?? '',
            'button_link' => $data['cta_link'] ?? '',
            'items' => [],
        ],
    ])
@else
    @php($template = config("section_templates.{$sectionType}"))
    @if($template && !empty($template['view']))
        @include($template['view'], ['section' => $section, 'sectionType' => $sectionType, 'data' => $data])
    @endif
@endif
