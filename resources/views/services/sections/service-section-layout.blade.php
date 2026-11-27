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
<section class="seo-lp seo-lp-hero seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container seo-entrance">
        <div class="seo-lp-hero-grid">
            <div class="seo-lp-hero-copy seo-stagger">
                <span class="seo-lp-kicker seo-delay-1"><i></i>{{ $data['eyebrow'] ?? 'Organic growth, built with intent' }}</span>
                <h1 class="seo-gradient-text seo-delay-2">{{ $data['heading'] ?? '' }}</h1>
                <p class="seo-delay-3">{{ $data['body'] ?? '' }}</p>
                <div class="seo-lp-hero-actions seo-delay-4">
                    <a class="seo-lp-button seo-lp-button-lime seo-pulse" href="{{ $data['button_link'] ?? '/contact#contact' }}">{{ $data['button_text'] ?? 'Plan your SEO growth' }} <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
                </div>
                <div class="seo-lp-hero-note seo-delay-5"><i class="fa-solid fa-circle-check"></i> Clear priorities. Useful work. Progress you can understand.</div>
            </div>
            <div class="seo-lp-hero-visual seo-float-slow">
                @if($heroImageUrl)
                    <img class="seo-lp-hero-image seo-shimmer" src="{{ $heroImageUrl }}" alt="{{ $data['hero_image_alt'] ?? ($data['heading'] ?? 'Page hero image') }}" loading="eager">
                @else
                    <div class="seo-lp-hero-placeholder seo-shimmer">
                        <div class="seo-lp-search-window"><div class="seo-lp-window-top"><span></span><span></span><span></span><small>organic visibility</small></div><div class="seo-lp-searchbar"><i class="fa-brands fa-google"></i> your next customer is searching <i class="fa-solid fa-magnifying-glass"></i></div><div class="seo-lp-serp-result"><small>YOUR BRAND · YOUR DOMAIN</small><strong>Be the clear answer they find</strong><span>Useful pages, strong foundations, and a search strategy shaped around your business.</span></div><div class="seo-lp-serp-lines"><i></i><i></i><i></i></div></div>
                    </div>
                @endif
                <div class="seo-lp-orbit seo-lp-orbit-one seo-spin"></div>
                <div class="seo-lp-orbit seo-lp-orbit-two seo-spin"></div>
                <span class="seo-lp-float-chip seo-lp-chip-one seo-float"><i class="fa-solid fa-arrow-trend-up"></i> Grow with intent</span>
                <span class="seo-lp-float-chip seo-lp-chip-two seo-float-slow"><i class="fa-solid fa-magnifying-glass-chart"></i> Search strategy</span>
            </div>
        </div>
        @if(!empty($data['items']))
        <div class="seo-lp-hero-stats">
            <div class="seo-lp-stats-track">
                @foreach(($data['items'] ?? []) as $item)
                <div class="seo-lp-stat-pill">
                    <span class="seo-lp-stat-value" data-target="{{ $item['value'] ?? '' }}">0</span>
                    <span class="seo-lp-stat-label">{{ $item['label'] ?? '' }}</span>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@elseif($layout === 'seo_proof')
<section class="seo-lp seo-lp-proof seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container">
        <div class="seo-lp-proof-grid seo-stagger">
            <p class="seo-lp-proof-label seo-delay-1">{{ $data['heading'] ?? '' }}</p>
            <div class="seo-lp-proof-points seo-delay-2">
                @foreach(($data['items'] ?? []) as $item)
                <div class="seo-lp-proof-point seo-lift">
                    <span class="seo-lp-proof-icon seo-pulse"><i class="fa-solid fa-check"></i></span>
                    <div>
                        <strong>{{ $item['value'] ?? '' }}</strong>
                        <small>{{ $item['label'] ?? '' }}</small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@elseif($layout === 'seo_audit')
<section class="seo-lp seo-lp-audit seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container">
        <div class="seo-lp-audit-grid seo-stagger">
            <div class="seo-lp-audit-copy seo-delay-1">
                <span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span>
                <h2 class="seo-delay-2">{{ $data['heading'] ?? '' }}</h2>
                <p class="seo-delay-3">{{ $data['body'] ?? '' }}</p>
                <div class="seo-lp-audit-stamp seo-delay-4 seo-pulse"><i class="fa-solid fa-compass-drafting"></i><span>Find the right next move<br><strong>before you add more noise</strong></span></div>
            </div>
            <div class="seo-lp-audit-list seo-delay-5">
                @foreach(($data['items'] ?? []) as $index => $item)
                @php($auditImage=$item['image'] ?? '')@php($auditImageUrl=!$auditImage ? '' : (str_starts_with($auditImage, 'http') ? $auditImage : (str_starts_with($auditImage, 'assets/') || str_starts_with($auditImage, 'storage/') ? asset($auditImage) : asset('storage/' . $auditImage))))
                <article class="seo-lp-audit-item {{ $auditImageUrl ? 'has-image' : '' }} seo-lift">
                    @if($auditImageUrl)
                    <span class="seo-lp-audit-thumb seo-shimmer"><img src="{{ $auditImageUrl }}" alt="{{ $item['title'] ?? 'Audit focus' }}" loading="lazy"></span>
                    @endif
                    <span class="seo-lp-audit-index seo-pulse">0{{ $index + 1 }}</span>
                    <div>
                        <h3>{{ $item['title'] ?? '' }}</h3>
                        <p>{{ $item['description'] ?? '' }}</p>
                    </div>
                    <i class="fa-solid fa-arrow-right"></i>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
@elseif($layout === 'seo_services')
<section class="seo-lp seo-lp-services seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container">
        <div class="seo-lp-services-header seo-stagger">
            <div class="seo-lp-heading seo-delay-1">
                <span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span>
                <h2 class="seo-gradient-text seo-delay-2">{{ $data['heading'] ?? '' }}</h2>
                <p class="seo-delay-3">{{ $data['body'] ?? '' }}</p>
            </div>
        </div>
        <div class="seo-lp-service-grid seo-stagger seo-delay-4">
            @foreach(($data['items'] ?? []) as $index => $item)
            @php($serviceImage=$item['image'] ?? '')@php($serviceImageUrl=!$serviceImage ? '' : (str_starts_with($serviceImage, 'http') ? $serviceImage : (str_starts_with($serviceImage, 'assets/') || str_starts_with($serviceImage, 'storage/') ? asset($serviceImage) : asset('storage/' . $serviceImage))))
            <article class="seo-lp-service-card {{ $serviceImageUrl ? 'has-image' : '' }} seo-lift">
                @if($serviceImageUrl)
                <img class="seo-lp-service-image seo-shimmer" src="{{ $serviceImageUrl }}" alt="{{ $item['title'] ?? 'Service image' }}" loading="lazy">
                @else
                <span class="seo-lp-service-icon seo-pulse"><i class="{{ $item['icon'] ?? 'fa-solid fa-arrow-trend-up' }}"></i></span>
                @endif
                <span class="seo-lp-service-number">0{{ $index + 1 }}</span>
                <h3>{{ $item['title'] ?? '' }}</h3>
                <p>{{ $item['description'] ?? '' }}</p>
                <span class="seo-lp-card-arrow"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
            </article>
            @endforeach
        </div>
    </div>
</section>
@elseif($layout === 'seo_process')
<section class="seo-lp seo-lp-process seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container">
        <div class="seo-lp-heading seo-lp-heading-left seo-stagger">
            <span class="seo-lp-overline seo-delay-1">{{ $data['eyebrow'] ?? '' }}</span>
            <h2 class="seo-gradient-text seo-delay-2">{{ $data['heading'] ?? '' }}</h2>
            <p class="seo-delay-3">{{ $data['body'] ?? '' }}</p>
        </div>
        <div class="seo-lp-timeline seo-stagger seo-delay-4">
            @foreach(($data['items'] ?? []) as $index => $item)
            <article class="seo-lift">
                <div class="seo-lp-timeline-node seo-pulse"><span>0{{ $index + 1 }}</span></div>
                <div class="seo-lp-timeline-card"><small>STEP 0{{ $index + 1 }}</small><h3>{{ $item['title'] ?? '' }}</h3><p>{{ $item['description'] ?? '' }}</p></div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@elseif($layout === 'seo_intent')
<section class="seo-lp seo-lp-intent seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container">
        <div class="seo-lp-intent-layout seo-stagger">
            <div class="seo-lp-intent-copy seo-delay-1">
                <span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span>
                <h2 class="seo-gradient-text seo-delay-2">{{ $data['heading'] ?? '' }}</h2>
                <p class="seo-delay-3">{{ $data['body'] ?? '' }}</p>
                <div class="seo-lp-intent-decoration seo-delay-4 seo-pulse"><i class="fa-solid fa-bullseye"></i><span>Right query<br>Right moment</span></div>
            </div>
            <div class="seo-lp-intent-cards seo-delay-5">
                @foreach(($data['items'] ?? []) as $index => $item)
                <article class="seo-lift">
                    <span class="seo-lp-intent-count seo-pulse">0{{ $index + 1 }}</span>
                    <div><small>SEARCH INTENT</small><h3>{{ $item['title'] ?? '' }}</h3><p>{{ $item['description'] ?? '' }}</p></div>
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
@elseif($layout === 'seo_technical')
<section class="seo-lp seo-lp-technical seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container">
        <div class="seo-lp-heading seo-stagger">
            <span class="seo-lp-overline seo-delay-1">{{ $data['eyebrow'] ?? '' }}</span>
            <h2 class="seo-gradient-text seo-delay-2">{{ $data['heading'] ?? '' }}</h2>
            <p class="seo-delay-3">{{ $data['body'] ?? '' }}</p>
        </div>
        <div class="seo-lp-tech-grid seo-stagger seo-delay-4">
            @foreach(($data['items'] ?? []) as $index => $item)
            <article class="seo-lp-tech-card seo-lp-tech-{{ $index + 1 }} seo-lift">
                <span class="seo-lp-tech-symbol seo-pulse">@if($index === 0)<i class="fa-solid fa-gauge-high"></i>@elseif($index === 1)<i class="fa-solid fa-diagram-project"></i>@elseif($index === 2)<i class="fa-solid fa-code"></i>@else<i class="fa-solid fa-shield-halved"></i>@endif</span>
                <small>FOUNDATION 0{{ $index + 1 }}</small>
                <h3>{{ $item['title'] ?? '' }}</h3>
                <p>{{ $item['description'] ?? '' }}</p>
            </article>
            @endforeach
            <div class="seo-lp-tech-aside seo-pulse"><span>Good SEO starts with a site that works for people.</span><i class="fa-solid fa-arrow-down-right-dots"></i></div>
        </div>
    </div>
</section>
@elseif($layout === 'seo_local')
<section class="seo-lp seo-lp-local seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container">
        <div class="seo-lp-local-grid seo-stagger">
            <div class="seo-lp-map" aria-hidden="true">
                <div class="seo-lp-map-grid"></div>
                <svg viewBox="0 0 500 400" role="presentation"><path d="M42 310 C110 260 130 280 182 202 S270 190 290 122 S377 77 455 46"/><path d="M20 90 C100 120 155 88 205 145 S310 255 480 220"/><path d="M104 370 C150 295 235 310 270 245 S382 172 480 180"/></svg>
                <span class="seo-lp-map-pin pin-a seo-float"><i class="fa-solid fa-location-dot"></i></span>
                <span class="seo-lp-map-pin pin-b seo-float-slow"><i class="fa-solid fa-location-dot"></i></span>
                <span class="seo-lp-map-pin pin-c seo-float"><i class="fa-solid fa-location-dot"></i></span>
                <div class="seo-lp-map-label seo-pulse"><i class="fa-solid fa-location-crosshairs"></i> Your local market</div>
            </div>
            <div class="seo-lp-local-copy seo-delay-2">
                <span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span>
                <h2 class="seo-gradient-text">{{ $data['heading'] ?? '' }}</h2>
                <p>{{ $data['body'] ?? '' }}</p>
                <div class="seo-lp-local-list seo-stagger">
                    @foreach(($data['items'] ?? []) as $item)
                    <article class="seo-lift"><i class="fa-solid fa-check seo-pulse"></i><div><strong>{{ $item['title'] ?? '' }}</strong><span>{{ $item['description'] ?? '' }}</span></div></article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@elseif($layout === 'seo_content')
<section class="seo-lp seo-lp-content seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container">
        <div class="seo-lp-content-head seo-stagger">
            <span class="seo-lp-overline seo-delay-1">{{ $data['eyebrow'] ?? '' }}</span>
            <h2 class="seo-gradient-text seo-delay-2">{{ $data['heading'] ?? '' }}</h2>
            @if(!empty($data['intro']))
                <p class="seo-lp-content-intro seo-delay-3">{{ $data['intro'] }}</p>
            @endif
        </div>
        <div class="seo-lp-content-board seo-delay-4">
            <div class="seo-lp-content-feature seo-lift">
                <div class="seo-lp-content-art seo-shimmer seo-pulse">
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
                        <a class="seo-lp-content-demo-link seo-lp-button seo-lp-button-lime seo-pulse" href="{{ $data['demo_button_link'] }}">
                            {{ $data['demo_button_text'] }} <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="seo-lp-content-list-panel seo-lift" data-content-list-panel>
                <div class="seo-lp-content-list-window" data-content-list-window data-lenis-prevent tabindex="0" role="region" aria-label="Content practices">
                    <div class="seo-lp-content-list seo-stagger">
                        @foreach(($data['items'] ?? []) as $item)
                        <article>
                            <h3>{{ $item['title'] ?? '' }}</h3>
                            <p>{{ $item['description'] ?? '' }}</p>
                        </article>
                        @endforeach
                    </div>
                </div>
                @if(count($data['items'] ?? []) > 3)
                    <button class="seo-lp-content-more seo-lp-button seo-lp-button-lime seo-pulse" type="button" data-content-list-more>Show more</button>
                @endif
            </div>
        </div>
    </div>
</section>
@elseif($layout === 'seo_results')
<section class="seo-lp seo-lp-results seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container">
        <div class="seo-lp-results-panel seo-stagger seo-shimmer">
            <div class="seo-lp-results-copy seo-delay-1">
                <span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span>
                <h2 class="seo-gradient-text seo-delay-2">{{ $data['heading'] ?? '' }}</h2>
                <p class="seo-delay-3">{{ $data['body'] ?? '' }}</p>
                <span class="seo-lp-results-note seo-delay-4 seo-pulse"><i class="fa-solid fa-circle-info"></i> We set targets from your baseline and report actual results transparently.</span>
            </div>
            <div class="seo-lp-results-metrics seo-stagger seo-delay-5">
                @foreach(($data['items'] ?? []) as $index => $item)
                <article class="seo-lift">
                    <span class="seo-lp-result-icon seo-pulse"><i class="{{ ['fa-solid fa-eye', 'fa-solid fa-users', 'fa-solid fa-bullseye', 'fa-solid fa-heart-pulse'][$index % 4] }}"></i></span>
                    <strong>{{ $item['value'] ?? '' }}</strong>
                    <small>{{ $item['label'] ?? '' }}</small>
                </article>
                @endforeach
            </div>
            <div class="seo-lp-results-glow seo-pulse"></div>
        </div>
    </div>
</section>
@elseif($layout === 'seo_faq')
<section class="seo-lp seo-lp-faq seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container">
        <header class="seo-lp-faq-heading seo-stagger">
            <span class="seo-lp-overline seo-delay-1">{{ $data['eyebrow'] ?? 'Got questions?' }}</span>
            <h2 class="seo-gradient-text seo-delay-2">{{ $data['heading'] ?? 'Frequently Asked Questions' }}</h2>
            <p class="seo-delay-3">{{ $data['body'] ?? 'Get answers to common questions about our services.' }}</p>
        </header>
        <div class="seo-lp-faq-list seo-stagger seo-delay-4">
            @foreach(($data['items'] ?? []) as $item)
            <details class="seo-lift">
                <summary><span>{{ $item['title'] ?? '' }}</span><i class="fa-solid fa-plus seo-pulse" aria-hidden="true"></i></summary>
                <p>{{ $item['description'] ?? '' }}</p>
            </details>
            @endforeach
        </div>
    </div>
</section>
@elseif($layout === 'seo_cta')
<section class="seo-lp seo-lp-cta seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container seo-stagger">
        <div class="seo-lp-cta-card seo-lift seo-shimmer">
            <div class="seo-lp-cta-orbit seo-spin" aria-hidden="true"></div>
            <span class="seo-lp-overline seo-delay-1 seo-pulse">{{ $data['eyebrow'] ?? '' }}</span>
            <h2 class="seo-gradient-text seo-delay-2">{{ $data['heading'] ?? '' }}</h2>
            <p class="seo-delay-3">{{ $data['body'] ?? '' }}</p>
            <a class="seo-lp-button seo-lp-button-lime seo-pulse seo-delay-4" href="{{ $data['button_link'] ?? '/contact#contact' }}">{{ $data['button_text'] ?? '' }} <i class="fa-solid fa-arrow-right"></i></a>
            <span class="seo-lp-cta-sparkle seo-float" aria-hidden="true"><i class="fa-solid fa-star"></i></span>
        </div>
    </div>
</section>
@endif
