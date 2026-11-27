@extends('layouts.app')

@section('title', $service->meta_title ?: ($service->title . ' | Retrotech Digital'))
@section('description', $service->meta_description ?: $service->short_description)
@section('keywords', $service->meta_keywords)
@section('canonical', route('webpages.show', ['section' => $service->page_section, 'slug' => $service->slug]))
@section('og_image', $service->og_image ? (str_starts_with($service->og_image, 'http') ? $service->og_image : (str_starts_with($service->og_image, 'assets/') || str_starts_with($service->og_image, 'storage/') ? asset($service->og_image) : asset('storage/' . $service->og_image))) : asset('assets/images/enterprise.webp'))

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
    @foreach($service->sections->where('is_active', true) as $section)
        @include('services.sections.service-section', ['section' => $section, 'data' => $section->content])
    @endforeach
</main>
@endsection

@push('scripts')
<script defer src="{{ asset('js/service-cinematic.js') }}?v={{ filemtime(public_path('js/service-cinematic.js')) }}"></script>
@endpush
