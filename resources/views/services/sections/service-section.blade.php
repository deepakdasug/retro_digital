@php
    $sectionType = $sectionType ?? ($section->section_type ?? '');
    $data = is_array($data ?? null) ? $data : (is_array($section->content ?? null) ? $section->content : []);
    $isSocialSection = $sectionType === 'custom' && ($service->slug ?? null) === 'social-media-marketing';
@endphp

@if($isSocialSection && str_contains($data['html'] ?? '', 'class="smm-hero"'))
    @include('services.sections.service-social-hero', ['values' => $data['values'] ?? []])
@elseif($sectionType === 'hero' && ($service->page_section ?? null) === 'services')
    @include('services.sections.service-landing-hero', [
        'data' => [
            'heading' => $data['title'] ?? '',
            'body' => $data['subtitle'] ?? '',
            'hero_image' => $data['background_image'] ?? '',
        ],
    ])
@else
    @php($template = config("section_templates.{$sectionType}"))
    @if($template && !empty($template['view']))
        @include($template['view'], [
            'section' => $section,
            'sectionType' => $sectionType,
            'data' => $data,
            'anchorId' => $isSocialSection && str_contains($data['html'] ?? '', 'id="proven-results"') ? 'proven-results' : null,
        ])
    @endif
@endif
