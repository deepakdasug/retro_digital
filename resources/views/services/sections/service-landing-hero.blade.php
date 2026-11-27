@php
    ['url' => $imageUrl, 'fallback' => $fallbackUrl] = \App\Support\ServiceImage::sources($service ?? null, $data['hero_image'] ?? null);
    $hasCustomImage = $imageUrl !== $fallbackUrl;
    $heading = ($data['heading'] ?? '') ?: ($service->title ?? '');
    $body = $data['body'] ?? '';
@endphp

<section class="service-landing-hero">
    <img class="service-landing-hero-image" src="{{ $fallbackUrl }}" alt="" fetchpriority="{{ $hasCustomImage ? 'auto' : 'high' }}">
    @if($hasCustomImage)
        <img class="service-landing-hero-image" src="{{ $imageUrl }}" alt="" fetchpriority="high" onerror="this.hidden = true">
    @endif
    <div class="service-landing-hero-copy">
        <h1>{{ $heading }}</h1>
        @if($body !== '')
            <p>{{ $body }}</p>
        @endif
    </div>
</section>
