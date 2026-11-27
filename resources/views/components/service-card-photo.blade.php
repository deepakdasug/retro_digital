@props(['image' => null, 'service' => null, 'index' => 0, 'sizes' => '(max-width: 640px) 90vw, (max-width: 1050px) 45vw, 440px'])
@php
    [$localImage, $servicePhoto] = config('service_hero_images')[$service?->slug ?? '']
        ?? ['tech-development/business-growth.webp', null];
    $photos = [
        $servicePhoto ?: '1460925895917-afdab827c52f',
        '1522071820081-009f0129c71c',
        '1552664730-d307ca884978',
        '1555066931-4365d14bab8c',
    ];
    $localPhotos = [$localImage, 'tech-development/custom-application.webp', 'tech-development/business-growth.webp', 'tech-development/api-development.webp'];
    $slot = (int) $index % count($photos);
    $fallback = asset('assets/images/' . $localPhotos[$slot]);
    $selectedImage = \App\Support\ImageUrl::resolve($image);
    $photoUrl = 'https://images.unsplash.com/photo-' . $photos[$slot] . '?auto=format&fit=max&q=80&w=';
@endphp
<img src="{{ $selectedImage ?? $photoUrl . '640' }}" alt="" loading="lazy" decoding="async"
     @unless($selectedImage)
         srcset="{{ $photoUrl }}160 160w, {{ $photoUrl }}480 480w, {{ $photoUrl }}800 800w, {{ $photoUrl }}1280 1280w" sizes="{{ $sizes }}"
     @endunless
     data-fallback="{{ $fallback }}" onerror="this.onerror = null; this.removeAttribute('srcset'); this.src = this.dataset.fallback"
     {{ $attributes->class('service-card-photo') }}>
