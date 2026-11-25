@php
    $sectionType = $sectionType ?? ($section->section_type ?? '');
    $data = is_array($data ?? null) ? $data : (is_array($section->content ?? null) ? $section->content : []);
@endphp

@if($sectionType === 'seo_hero')
    @include('sections.seo_landing', [
        'section' => $section,
        'sectionType' => 'seo_hero',
        'data' => $data,
    ])
@else
    @php($template = config("section_templates.{$sectionType}"))
    @if($template && !empty($template['view']))
        @include($template['view'], ['section' => $section, 'sectionType' => $sectionType, 'data' => $data])
    @endif
@endif
