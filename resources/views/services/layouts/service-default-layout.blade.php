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
<link rel="stylesheet" href="{{ asset('css/service-page-vibrant.css') }}?v={{ filemtime(public_path('css/service-page-vibrant.css')) }}">
<link rel="stylesheet" href="{{ asset('css/service-page-cinematic-v2.css') }}?v={{ filemtime(public_path('css/service-page-cinematic-v2.css')) }}">
@endpush

@section('content')
@php
    $pageModifiers = [
        'social-media-marketing' => 'smm',
        'seo-services' => 'seo',
        'video-marketing' => 'video',
        'paid-marketing' => 'paid',
        'email-marketing' => 'email',
        'content-marketing' => 'content',
        'orm-services' => 'orm',
        'web-development' => 'web',
        'mobile-app-development' => 'mobile-app',
        'custom-application' => 'custom-app',
        'salesforce-erpnext-services' => 'salesforce',
        'saas-application' => 'saas',
        'api-development' => 'api',
        'software-development' => 'software',
        'whatsapp-integration' => 'whatsapp',
    ];
    $pageModifier = $pageModifiers[$service->slug] ?? '';
@endphp
<main class="seo-service-page{{ $pageModifier ? ' seo-service-page--' . $pageModifier : '' }}">
    @include('services.sections.service-sections', ['sections' => $service->sections->where('is_active', true)])
</main>
@endsection

@push('scripts')
<script defer src="{{ asset('js/service-cinematic.js') }}?v={{ filemtime(public_path('js/service-cinematic.js')) }}"></script>
@endpush
