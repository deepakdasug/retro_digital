@php
    $heading = trim($values['heading'] ?? '');
    $accent = trim($values['heading_accent'] ?? '');
    if ($accent !== '' && !str_ends_with($heading, $accent)) {
        $heading = trim($heading . ' ' . $accent);
    }
@endphp

@include('services.sections.service-landing-hero', [
    'data' => [
        'heading' => $heading,
        'body' => $values['body'] ?? '',
        'hero_image' => $values['hero_image'] ?? '',
    ],
])
