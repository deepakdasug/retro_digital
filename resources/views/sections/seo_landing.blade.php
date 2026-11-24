@php
    $layout = $sectionType ?? ($section->section_type ?? '');
    $bannerImage = $data['banner_image'] ?? '';
    $bannerImageUrl = !$bannerImage ? '' : (str_starts_with($bannerImage, 'http') ? $bannerImage : (str_starts_with($bannerImage, 'assets/') || str_starts_with($bannerImage, 'storage/') ? asset($bannerImage) : asset('storage/' . $bannerImage)));
@endphp

@if($layout === 'seo_hero')
@php
    $heroImage = $data['hero_image'] ?? '';
    $heroImageUrl = !$heroImage ? '' : (str_starts_with($heroImage, 'http') ? $heroImage : (str_starts_with($heroImage, 'assets/') || str_starts_with($heroImage, 'storage/') ? asset($heroImage) : asset('storage/' . $heroImage)));
@endphp
<section class="seo-lp seo-lp-hero">
    <div class="seo-lp-container seo-lp-hero-grid">
        <div class="seo-lp-hero-copy seo-motion-in">
            <span class="seo-lp-kicker"><i></i>{{ $data['eyebrow'] ?? 'Organic growth, built with intent' }}</span>
            <h1>{{ $data['heading'] ?? '' }}</h1>
            <p>{{ $data['body'] ?? '' }}</p>
            <a class="seo-lp-button seo-lp-button-lime" href="{{ $data['button_link'] ?? '/contact#contact' }}">{{ $data['button_text'] ?? 'Plan your SEO growth' }} <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
            <div class="seo-lp-hero-note"><i class="fa-solid fa-circle-check"></i> Clear priorities. Useful work. Progress you can understand.</div>
        </div>
        <div class="seo-lp-search-visual seo-motion-float">
            @if($heroImageUrl)
                <img class="seo-lp-hero-photo" src="{{ $heroImageUrl }}" alt="{{ $data['hero_image_alt'] ?? ($data['heading'] ?? 'Page hero image') }}" loading="eager">
            @else
            <div class="seo-lp-search-window"><div class="seo-lp-window-top"><span></span><span></span><span></span><small>organic visibility</small></div><div class="seo-lp-searchbar"><i class="fa-brands fa-google"></i> your next customer is searching <i class="fa-solid fa-magnifying-glass"></i></div><div class="seo-lp-serp-result"><small>YOUR BRAND · YOUR DOMAIN</small><strong>Be the clear answer they find</strong><span>Useful pages, strong foundations, and a search strategy shaped around your business.</span></div><div class="seo-lp-serp-lines"><i></i><i></i><i></i></div></div>
            <div class="seo-lp-orbit seo-lp-orbit-one"></div><div class="seo-lp-orbit seo-lp-orbit-two"></div><span class="seo-lp-float-chip seo-lp-chip-one"><i class="fa-solid fa-arrow-trend-up"></i> Grow with intent</span><span class="seo-lp-float-chip seo-lp-chip-two"><i class="fa-solid fa-magnifying-glass-chart"></i> Search strategy</span>
            @endif
        </div>
    </div>
    <div class="seo-lp-hero-stats seo-lp-container">
        @foreach(($data['items'] ?? []) as $item)<div><strong>{{ $item['value'] ?? '' }}</strong><span>{{ $item['label'] ?? '' }}</span></div>@endforeach
    </div>
</section>
@elseif($layout === 'seo_proof')
<section class="seo-lp seo-lp-proof"><div class="seo-lp-container seo-lp-proof-inner"><p>{{ $data['heading'] ?? '' }}</p><div class="seo-lp-proof-points">@foreach(($data['items'] ?? []) as $item)<div class="seo-lp-proof-point"><span class="seo-lp-proof-icon"><i class="fa-solid fa-check"></i></span><span><strong>{{ $item['value'] ?? '' }}</strong><small>{{ $item['label'] ?? '' }}</small></span></div>@endforeach</div></div></section>
@elseif($layout === 'seo_audit')
<section class="seo-lp seo-lp-audit"><div class="seo-lp-container seo-lp-audit-grid"><div class="seo-lp-audit-copy"><span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span><h2>{{ $data['heading'] ?? '' }}</h2><p>{{ $data['body'] ?? '' }}</p><div class="seo-lp-audit-stamp"><i class="fa-solid fa-compass-drafting"></i><span>Find the right next move<br><strong>before you add more noise</strong></span></div></div><div class="seo-lp-audit-list">@foreach(($data['items'] ?? []) as $index => $item)<article><span class="seo-lp-audit-index">0{{ $index + 1 }}</span><div><h3>{{ $item['title'] ?? '' }}</h3><p>{{ $item['description'] ?? '' }}</p></div><i class="fa-solid fa-arrow-right"></i></article>@endforeach</div></div></section>
@elseif($layout === 'seo_services')
<section class="seo-lp seo-lp-services"><div class="seo-lp-container"><div class="seo-lp-heading seo-motion-in"><span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span><h2>{{ $data['heading'] ?? '' }}</h2><p>{{ $data['body'] ?? '' }}</p></div><div class="seo-lp-service-grid">@foreach(($data['items'] ?? []) as $index => $item)@php($serviceImage=$item['image'] ?? '')@php($serviceImageUrl=!$serviceImage ? '' : (str_starts_with($serviceImage, 'http') ? $serviceImage : (str_starts_with($serviceImage, 'assets/') || str_starts_with($serviceImage, 'storage/') ? asset($serviceImage) : asset('storage/' . $serviceImage))))<article class="seo-lp-service-card {{ $serviceImageUrl ? 'has-image' : '' }}">@if($serviceImageUrl)<img class="seo-lp-service-image" src="{{ $serviceImageUrl }}" alt="{{ $item['title'] ?? 'Service image' }}" loading="lazy">@else<span class="seo-lp-service-icon"><i class="{{ $item['icon'] ?? 'fa-solid fa-arrow-trend-up' }}"></i></span>@endif<span class="seo-lp-service-number">0{{ $index + 1 }}</span><h3>{{ $item['title'] ?? '' }}</h3><p>{{ $item['description'] ?? '' }}</p><span class="seo-lp-card-arrow"><i class="fa-solid fa-arrow-up-right-from-square"></i></span></article>@endforeach</div></div></section>
@elseif($layout === 'seo_process')
<section class="seo-lp seo-lp-process"><div class="seo-lp-container"><div class="seo-lp-heading seo-lp-heading-left"><span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span><h2>{{ $data['heading'] ?? '' }}</h2><p>{{ $data['body'] ?? '' }}</p></div><div class="seo-lp-timeline">@foreach(($data['items'] ?? []) as $index => $item)<article><div class="seo-lp-timeline-node"><span>0{{ $index + 1 }}</span></div><div class="seo-lp-timeline-card"><small>STEP 0{{ $index + 1 }}</small><h3>{{ $item['title'] ?? '' }}</h3><p>{{ $item['description'] ?? '' }}</p></div></article>@endforeach</div></div></section>
@elseif($layout === 'seo_intent')
<section class="seo-lp seo-lp-intent"><div class="seo-lp-container seo-lp-intent-layout"><div class="seo-lp-intent-copy"><span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span><h2>{{ $data['heading'] ?? '' }}</h2><p>{{ $data['body'] ?? '' }}</p><div class="seo-lp-intent-decoration"><i class="fa-solid fa-bullseye"></i><span>Right query<br>Right moment</span></div></div><div class="seo-lp-intent-cards">@foreach(($data['items'] ?? []) as $index => $item)<article><span class="seo-lp-intent-count">0{{ $index + 1 }}</span><div><small>SEARCH INTENT</small><h3>{{ $item['title'] ?? '' }}</h3><p>{{ $item['description'] ?? '' }}</p></div><i class="fa-solid fa-arrow-up-right-from-square"></i></article>@endforeach</div></div></section>
@elseif($layout === 'seo_technical')
<section class="seo-lp seo-lp-technical"><div class="seo-lp-container"><div class="seo-lp-heading"><span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span><h2>{{ $data['heading'] ?? '' }}</h2><p>{{ $data['body'] ?? '' }}</p></div><div class="seo-lp-tech-grid">@foreach(($data['items'] ?? []) as $index => $item)<article class="seo-lp-tech-card seo-lp-tech-{{ $index + 1 }}"><span class="seo-lp-tech-symbol">@if($index === 0)<i class="fa-solid fa-gauge-high"></i>@elseif($index === 1)<i class="fa-solid fa-diagram-project"></i>@elseif($index === 2)<i class="fa-solid fa-code"></i>@else<i class="fa-solid fa-shield-halved"></i>@endif</span><small>FOUNDATION 0{{ $index + 1 }}</small><h3>{{ $item['title'] ?? '' }}</h3><p>{{ $item['description'] ?? '' }}</p></article>@endforeach<div class="seo-lp-tech-aside"><span>Good SEO starts with a site that works for people.</span><i class="fa-solid fa-arrow-down-right-dots"></i></div></div></div></section>
@elseif($layout === 'seo_local')
<section class="seo-lp seo-lp-local"><div class="seo-lp-container seo-lp-local-grid"><div class="seo-lp-map" aria-hidden="true"><div class="seo-lp-map-grid"></div><svg viewBox="0 0 500 400" role="presentation"><path d="M42 310 C110 260 130 280 182 202 S270 190 290 122 S377 77 455 46"/><path d="M20 90 C100 120 155 88 205 145 S310 255 480 220"/><path d="M104 370 C150 295 235 310 270 245 S382 172 480 180"/></svg><span class="seo-lp-map-pin pin-a"><i class="fa-solid fa-location-dot"></i></span><span class="seo-lp-map-pin pin-b"><i class="fa-solid fa-location-dot"></i></span><span class="seo-lp-map-pin pin-c"><i class="fa-solid fa-location-dot"></i></span><div class="seo-lp-map-label"><i class="fa-solid fa-location-crosshairs"></i> Your local market</div></div><div class="seo-lp-local-copy"><span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span><h2>{{ $data['heading'] ?? '' }}</h2><p>{{ $data['body'] ?? '' }}</p><div class="seo-lp-local-list">@foreach(($data['items'] ?? []) as $item)<article><i class="fa-solid fa-check"></i><div><strong>{{ $item['title'] ?? '' }}</strong><span>{{ $item['description'] ?? '' }}</span></div></article>@endforeach</div></div></div></section>
@elseif($layout === 'seo_content')
<section class="seo-lp seo-lp-content">
    <div class="seo-lp-container">
        <div class="seo-lp-content-head">
            <span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span>
            <h2>{{ $data['heading'] ?? '' }}</h2>
            @if(!empty($data['intro']))
                <p class="seo-lp-content-intro">{{ $data['intro'] }}</p>
            @endif
        </div>
        <div class="seo-lp-content-board">
            <div class="seo-lp-content-feature">
                <div class="seo-lp-content-art">
                    @if($bannerImageUrl)
                        <img class="seo-lp-content-art-image" src="{{ $bannerImageUrl }}" alt="{{ $data['banner_image_alt'] ?? 'Content principle banner' }}" loading="lazy">
                    @else
                        <i class="fa-solid fa-quote-left"></i>
                        <span>{!! nl2br(e($data['banner_text'] ?? 'Make every page earn its place.')) !!}</span>
                        <i class="fa-solid fa-asterisk"></i>
                    @endif
                </div>
                <div>
                    <h3>{{ $data['principle_heading'] ?? 'Make every page earn its place.' }}</h3>
                    <p>{{ $data['principle_description'] ?? 'Answer a real question with clarity, depth, and a next step that feels natural.' }}</p>
                    @if(!empty($data['demo_button_text']) && !empty($data['demo_button_link']))
                        <a class="seo-lp-content-demo-link" href="{{ $data['demo_button_link'] }}">
                            {{ $data['demo_button_text'] }} <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="seo-lp-content-list-panel" data-content-list-panel>
                <div class="seo-lp-content-list-window" data-content-list-window data-lenis-prevent tabindex="0" role="region" aria-label="Content practices">
                    <div class="seo-lp-content-list">
                        @foreach(($data['items'] ?? []) as $item)
                            <article>
                                <h3>{{ $item['title'] ?? '' }}</h3>
                                <p>{{ $item['description'] ?? '' }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>
                @if(count($data['items'] ?? []) > 3)
                    <button class="seo-lp-content-more" type="button" data-content-list-more>Show more</button>
                @endif
            </div>
        </div>
    </div>
</section>
@elseif($layout === 'seo_results')
<section class="seo-lp seo-lp-results"><div class="seo-lp-container seo-lp-results-panel"><div class="seo-lp-results-copy"><span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span><h2>{{ $data['heading'] ?? '' }}</h2><p>{{ $data['body'] ?? '' }}</p><span class="seo-lp-results-note"><i class="fa-solid fa-circle-info"></i> We set targets from your baseline and report actual results transparently.</span></div><div class="seo-lp-results-metrics">@foreach(($data['items'] ?? []) as $index => $item)<article><span class="seo-lp-result-icon"><i class="{{ ['fa-solid fa-eye', 'fa-solid fa-users', 'fa-solid fa-bullseye', 'fa-solid fa-heart-pulse'][$index % 4] }}"></i></span><strong>{{ $item['value'] ?? '' }}</strong><small>{{ $item['label'] ?? '' }}</small></article>@endforeach</div><div class="seo-lp-results-glow"></div></div></section>
@elseif($layout === 'seo_faq')
<section class="seo-lp seo-lp-faq"><div class="seo-lp-container"><header class="seo-lp-faq-heading"><span class="seo-lp-overline">{{ $data['eyebrow'] ?? 'Got questions?' }}</span><h2>{{ $data['heading'] ?? 'Frequently Asked Questions' }}</h2><p>{{ $data['body'] ?? 'Get answers to common questions about our services.' }}</p></header><div class="seo-lp-faq-list">@foreach(($data['items'] ?? []) as $item)<details><summary><span>{{ $item['title'] ?? '' }}</span><i class="fa-solid fa-plus" aria-hidden="true"></i></summary><p>{{ $item['description'] ?? '' }}</p></details>@endforeach</div></div></section>
@elseif($layout === 'seo_cta')
<section class="seo-lp seo-lp-cta"><div class="seo-lp-container"><div class="seo-lp-cta-card"><div class="seo-lp-cta-orbit" aria-hidden="true"></div><span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span><h2>{{ $data['heading'] ?? '' }}</h2><p>{{ $data['body'] ?? '' }}</p><a class="seo-lp-button seo-lp-button-lime" href="{{ $data['button_link'] ?? '/contact#contact' }}">{{ $data['button_text'] ?? '' }} <i class="fa-solid fa-arrow-right"></i></a><span class="seo-lp-cta-sparkle" aria-hidden="true"><i class="fa-solid fa-star"></i></span></div></div></section>
@endif
