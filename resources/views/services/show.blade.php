@extends('layouts.app')

@section('title', $service->meta_title ?: ($service->title . ' | Retrotech Digital'))
@section('description', $service->meta_description ?: $service->short_description)
@section('keywords', $service->meta_keywords)
@section('canonical', route('webpages.show', ['section' => $service->page_section, 'slug' => $service->slug]))
@section('og_image', $service->og_image ? (str_starts_with($service->og_image, 'http') ? $service->og_image : (str_starts_with($service->og_image, 'assets/') || str_starts_with($service->og_image, 'storage/') ? asset($service->og_image) : asset('storage/' . $service->og_image))) : asset('assets/images/enterprise.webp'))

@push('head')
@if(!empty($service->schema_markup))
    @php
        $rawSchema = trim($service->schema_markup);
    @endphp
    @if(str_contains($rawSchema, '<script'))
        {!! $rawSchema !!}
    @else
        <script type="application/ld+json">{!! $rawSchema !!}</script>
    @endif
@else
    @php
        $pageUrl = route('webpages.show', ['section' => $service->page_section, 'slug' => $service->slug]);
        $imageUrl = $service->og_image ? (str_starts_with($service->og_image, 'http') ? $service->og_image : (str_starts_with($service->og_image, 'assets/') || str_starts_with($service->og_image, 'storage/') ? asset($service->og_image) : asset('storage/' . $service->og_image))) : asset('assets/images/retrotech-mark.png');
        
        $serviceSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            '@id' => $pageUrl . '#service',
            'name' => $service->title,
            'description' => $service->meta_description ?: $service->short_description ?: $service->title,
            'url' => $pageUrl,
            'provider' => [
                '@type' => 'Organization',
                'name' => 'Retrotech Digital',
                'url' => url('/'),
            ],
            'image' => $imageUrl,
        ];

        $faqItems = [];
        foreach ($service->sections as $sec) {
            if (in_array($sec->section_type, ['seo_faq', 'faq']) && !empty($sec->content['items'])) {
                foreach ($sec->content['items'] as $item) {
                    if (!empty($item['title']) && !empty($item['description'])) {
                        $faqItems[] = [
                            '@type' => 'Question',
                            'name' => $item['title'],
                            'acceptedAnswer' => [
                                '@type' => 'Answer',
                                'text' => strip_tags($item['description']),
                            ],
                        ];
                    }
                }
            }
        }
        $faqSchema = null;
        if (count($faqItems) > 0) {
            $faqSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => $faqItems,
            ];
        }
    @endphp
    <script type="application/ld+json">@json($serviceSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)</script>
    @if($faqSchema)
    <script type="application/ld+json">@json($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)</script>
    @endif
@endif
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/seo-service.css') }}?v={{ filemtime(public_path('css/seo-service.css')) }}">
<link rel="stylesheet" href="{{ asset('css/seo-landing.css') }}?v={{ filemtime(public_path('css/seo-landing.css')) }}">
@endpush

@section('content')
<main class="seo-service-page">
    @include('sections._render', ['sections' => $service->sections->where('is_active', true)])
</main>
@endsection
