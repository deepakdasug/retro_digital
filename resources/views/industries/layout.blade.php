@extends('layouts.app')

@php
    use App\Support\ImageUrl;

    $pageTitle = $industry->meta_title ?: ($industry->name . ' Solutions | Retrotech Digital');
    $pageDescription = $industry->meta_description ?: ($industry->short_description ?: $industry->hero_description);
    $canonicalUrl = $industry->canonical_url ?: route('industries.show', ['slug' => $industry->slug]);
    $ogImage = ImageUrl::resolve($industry->og_image ?: $industry->hero_image, 'assets/images/enterprise.webp');

    $heroImage = ImageUrl::resolve($industry->hero_image);
    $introImage = ImageUrl::resolve($industry->intro_image);
    $spotlightImage = ImageUrl::resolve($industry->spotlight_image);

    $features = collect($industry->features ?? [])->filter(fn ($item) => is_array($item) && (!empty($item['title']) || !empty($item['description'])))->values();
    $reasons = collect($industry->reasons ?? [])->filter(fn ($item) => is_array($item) && (!empty($item['title']) || !empty($item['description'])))->values();
    $faqs = collect($industry->faqs ?? [])->filter(fn ($item) => is_array($item) && !empty($item['question']) && !empty($item['answer']))->values();
@endphp

@section('title', $pageTitle)
@section('description', $pageDescription)
@if(!empty($industry->meta_keywords))
    @section('keywords', $industry->meta_keywords)
@endif
@section('canonical', $canonicalUrl)
@section('og_image', $ogImage)

@push('head')
    @if(!empty($industry->schema_markup))
        @php
            $rawSchema = trim($industry->schema_markup);
        @endphp
        @if(str_contains($rawSchema, '<script'))
            {!! $rawSchema !!}
        @else
            <script type="application/ld+json">{!! $rawSchema !!}</script>
        @endif
    @else
        @php
            $industrySchema = [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                '@id' => $canonicalUrl . '#industry-service',
                'name' => $industry->hero_title ?: $industry->name,
                'serviceType' => $industry->name . ' Technology & Digital Solutions',
                'description' => $pageDescription ?: $industry->name,
                'url' => $canonicalUrl,
                'provider' => [
                    '@type' => 'Organization',
                    'name' => 'Retrotech Digital',
                    'url' => url('/'),
                ],
                'image' => $ogImage,
            ];

            $faqSchema = null;
            if ($faqs->isNotEmpty()) {
                $faqSchema = [
                    '@context' => 'https://schema.org',
                    '@type' => 'FAQPage',
                    'mainEntity' => $faqs->map(fn (array $item) => [
                        '@type' => 'Question',
                        'name' => $item['question'],
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => strip_tags($item['answer']),
                        ],
                    ])->all(),
                ];
            }
        @endphp
        <script type="application/ld+json">@json($industrySchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)</script>
        @if($faqSchema)
            <script type="application/ld+json">@json($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)</script>
        @endif
    @endif
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/industries.css') }}?v={{ filemtime(public_path('css/industries.css')) }}">
@endpush

@section('content')
<main class="ind-layout" data-industry-slug="{{ $industry->slug }}">
    @foreach(['hero', 'intro', 'features', 'reasons', 'spotlight', 'faq', 'cta'] as $sectionKey)
        @include('industries._section', [
            'industry' => $industry,
            'sectionKey' => $sectionKey,
            'heroImage' => $heroImage,
            'introImage' => $introImage,
            'spotlightImage' => $spotlightImage,
            'features' => $features,
            'reasons' => $reasons,
            'faqs' => $faqs,
            'isPreview' => false,
        ])
    @endforeach
</main>
@endsection
