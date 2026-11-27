@php
    [$localImage, $stockImage] = config('service_hero_images')[$service->slug ?? '']
        ?? ['tech-development/business-growth.webp', null];
    $fallbackUrl = asset('assets/images/' . $localImage);
    $image = trim(($data['hero_image'] ?? '') ?: ($service->image ?? '') ?: ($service->og_image ?? ''));
    $isOriginalStock = $stockImage
        && parse_url($image, PHP_URL_HOST) === 'images.unsplash.com'
        && parse_url($image, PHP_URL_PATH) === '/' . $stockImage;
    $imageUrl = $isOriginalStock ? null : \App\Support\ImageUrl::resolve($image);
    $hasCustomImage = $imageUrl && $imageUrl !== $fallbackUrl;
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
