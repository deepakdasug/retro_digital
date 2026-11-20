@php
    $background = $data['background_image'] ?? '';
    $backgroundUrl = !$background ? '' : (str_starts_with($background, 'http') ? $background : (str_starts_with($background, 'assets/') ? asset($background) : asset('storage/' . $background)));
@endphp
<section class="seo-hero" @if($backgroundUrl) style="--seo-hero-image: url('{{ $backgroundUrl }}')" @endif>
    <div class="seo-container seo-hero-inner">
        <div class="seo-hero-copy">
            <span class="seo-eyebrow"><i class="fa-solid fa-sparkles" aria-hidden="true"></i> {{ $data['eyebrow'] ?? 'A better way forward' }}</span>
            <h1>{{ $data['title'] ?? '' }}</h1>
            <p>{{ $data['subtitle'] ?? '' }}</p>
            @if(!empty($data['cta_text']) && !empty($data['cta_link']))
                <a class="seo-button seo-button-light" href="{{ $data['cta_link'] }}">{{ $data['cta_text'] }} <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            @endif
        </div>
        <div class="seo-hero-mark" aria-hidden="true"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
    </div>
</section>
