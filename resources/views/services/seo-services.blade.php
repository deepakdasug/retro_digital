@extends('layouts.app')

@section('title', $service->meta_title ?: ($service->title . ' | Retrotech Digital'))
@section('description', $service->meta_description ?: $service->short_description)
@section('keywords', $service->meta_keywords)
@section('canonical', route('webpages.show', ['section' => $service->page_section, 'slug' => $service->slug]))
@section('og_image', $service->og_image ? (str_starts_with($service->og_image, 'http') ? $service->og_image : (str_starts_with($service->og_image, 'assets/') || str_starts_with($service->og_image, 'storage/') ? asset($service->og_image) : asset('storage/' . $service->og_image))) : asset('assets/images/enterprise.webp'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/seo-service.css') }}?v={{ filemtime(public_path('css/seo-service.css')) }}">
<link rel="stylesheet" href="{{ asset('css/seo-landing.css') }}?v={{ filemtime(public_path('css/seo-landing.css')) }}">
@endpush

@section('content')
<main class="seo-service-page{{ $service->slug === 'social-media-marketing' ? ' seo-service-page--smm' : '' }}">
    @foreach($service->sections->where('is_active', true) as $section)
        @include('sections._service_section', ['section' => $section, 'data' => $section->content])
    @endforeach
</main>
@endsection
