@php
    $layout = $sectionType ?? ($section->section_type ?? '');
@endphp

@if($layout === 'seo_hero')
@include('services.sections.service-landing-hero')
@elseif($layout === 'seo_proof')
@php
    $proofHeading = trim($data['heading'] ?? '');
    $proofItems = array_filter($data['items'] ?? [], fn ($item) => filled($item['value'] ?? null) || filled($item['label'] ?? null));
@endphp
@if($proofHeading !== '' || $proofItems)
<section class="seo-lp seo-lp-proof">
    <div class="seo-lp-container">
        <div class="seo-lp-proof-grid">
            @if($proofHeading !== '')
            <p class="seo-lp-proof-label">{{ $proofHeading }}</p>
            @endif
            @if($proofItems)
            <div class="seo-lp-proof-points">
                @foreach($proofItems as $item)
                <div class="seo-lp-proof-point seo-lift">
                    <span class="seo-lp-proof-icon"><i class="fa-solid fa-check"></i></span>
                    <div>
                        <strong>{{ $item['value'] ?? '' }}</strong>
                        <small>{{ $item['label'] ?? '' }}</small>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>
@endif
@elseif($layout === 'seo_audit')
<section class="seo-lp seo-lp-audit seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container">
        <div class="seo-lp-audit-grid seo-stagger">
            <div class="seo-lp-audit-copy seo-delay-1">
                <span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span>
                <h2 class="seo-delay-2">{{ $data['heading'] ?? '' }}</h2>
                <p class="seo-delay-3">{{ $data['body'] ?? '' }}</p>
                <div class="seo-lp-audit-stamp seo-delay-4"><i class="fa-solid fa-compass-drafting"></i><span>Find the right next move<br><strong>before you add more noise</strong></span></div>
            </div>
            <div class="seo-lp-audit-list seo-delay-5">
                @foreach(($data['items'] ?? []) as $index => $item)
                <article class="seo-lp-audit-item seo-lift has-image">
                    <span class="seo-lp-audit-thumb"><x-service-card-photo :image="$item['image'] ?? null" :service="$service ?? null" :index="$loop->index" sizes="76px" /></span>
                    <span class="seo-lp-audit-index">0{{ $index + 1 }}</span>
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
            <article class="seo-lp-service-card has-image seo-lift">
                <x-service-card-photo :image="$item['image'] ?? null" :service="$service ?? null" :index="$loop->index" class="seo-lp-service-image" />
                <div class="seo-lp-service-card-copy">
                    <h3>{{ $item['title'] ?? '' }}</h3>
                    <p>{{ $item['description'] ?? '' }}</p>
                </div>
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
                <div class="seo-lp-timeline-node"><span>0{{ $index + 1 }}</span></div>
                <div class="seo-lp-timeline-card">
                    <x-service-card-photo :image="$item['image'] ?? null" :service="$service ?? null" :index="$loop->index" sizes="112px" class="service-card-photo--step" />
                    <div><h3>{{ $item['title'] ?? '' }}</h3><p>{{ $item['description'] ?? '' }}</p></div>
                </div>
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
                <div class="seo-lp-intent-decoration seo-delay-4"><i class="fa-solid fa-bullseye"></i><span>Right query<br>Right moment</span></div>
            </div>
            <div class="seo-lp-intent-cards seo-delay-5">
                @foreach(($data['items'] ?? []) as $index => $item)
                <article class="seo-lift">
                    <x-service-card-photo :image="$item['image'] ?? null" :service="$service ?? null" :index="$loop->index" class="service-card-photo--thumb" />
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
                <x-service-card-photo :image="$item['image'] ?? null" :service="$service ?? null" :index="$loop->index" class="service-card-photo--foundation" />
                <div class="seo-lp-tech-copy">
                    <h3>{{ $item['title'] ?? '' }}</h3>
                    <p>{{ $item['description'] ?? '' }}</p>
                </div>
            </article>
            @endforeach
            <div class="seo-lp-tech-aside"><span>Good SEO starts with a site that works for people.</span><i class="fa-solid fa-arrow-down-right-dots"></i></div>
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
                <div class="seo-lp-map-label"><i class="fa-solid fa-location-crosshairs"></i> Your local market</div>
            </div>
            <div class="seo-lp-local-copy seo-delay-2">
                <span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span>
                <h2 class="seo-gradient-text">{{ $data['heading'] ?? '' }}</h2>
                <p>{{ $data['body'] ?? '' }}</p>
                <div class="seo-lp-local-list seo-stagger">
                    @foreach(($data['items'] ?? []) as $item)
                    <article class="seo-lift"><x-service-card-photo :image="$item['image'] ?? null" :service="$service ?? null" :index="$loop->index" class="service-card-photo--thumb" /><div><strong>{{ $item['title'] ?? '' }}</strong><span>{{ $item['description'] ?? '' }}</span></div></article>
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
                <div class="seo-lp-content-art">
                    <x-service-card-photo :image="$data['banner_image'] ?? null" :service="$service ?? null" :index="0" class="seo-lp-content-art-image" />
                    @if(empty($data['banner_image']))
                        <span class="service-card-photo-caption">{{ $data['banner_text'] ?? 'Make every page earn its place.' }}</span>
                    @endif
                </div>
                <div>
                    <h3>{{ $data['principle_heading'] ?? 'Make every page earn its place.' }}</h3>
                    <p>{{ $data['principle_description'] ?? 'Answer a real question with clarity, depth, and a next step that feels natural.' }}</p>
                    @if(!empty($data['demo_button_text']) && !empty($data['demo_button_link']))
                        <a class="seo-lp-content-demo-link seo-lp-button seo-lp-button-lime" href="{{ $data['demo_button_link'] }}">
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
                            <x-service-card-photo :image="$item['image'] ?? null" :service="$service ?? null" :index="$loop->index" class="service-card-photo--thumb" />
                            <h3>{{ $item['title'] ?? '' }}</h3>
                            <p>{{ $item['description'] ?? '' }}</p>
                        </article>
                        @endforeach
                    </div>
                </div>
                @if(count($data['items'] ?? []) > 3)
                    <button class="seo-lp-content-more seo-lp-button seo-lp-button-lime" type="button" data-content-list-more>Show more</button>
                @endif
            </div>
        </div>
    </div>
</section>
@elseif($layout === 'seo_results')
<section class="seo-lp seo-lp-results seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container">
        <div class="seo-lp-results-panel seo-stagger">
            <div class="seo-lp-results-copy seo-delay-1">
                <span class="seo-lp-overline">{{ $data['eyebrow'] ?? '' }}</span>
                <h2 class="seo-gradient-text seo-delay-2">{{ $data['heading'] ?? '' }}</h2>
                <p class="seo-delay-3">{{ $data['body'] ?? '' }}</p>
                <span class="seo-lp-results-note seo-delay-4"><i class="fa-solid fa-circle-info"></i> We set targets from your baseline and report actual results transparently.</span>
            </div>
            <div class="seo-lp-results-metrics seo-stagger seo-delay-5">
                @foreach(($data['items'] ?? []) as $index => $item)
                <article class="seo-lift">
                    <x-service-card-photo :image="$item['image'] ?? null" :service="$service ?? null" :index="$loop->index" sizes="56px" class="service-card-photo--thumb" />
                    <div><strong>{{ $item['value'] ?? '' }}</strong><small>{{ $item['label'] ?? '' }}</small></div>
                </article>
                @endforeach
            </div>
            <div class="seo-lp-results-glow"></div>
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
                <summary><span>{{ $item['title'] ?? '' }}</span><i class="fa-solid fa-plus" aria-hidden="true"></i></summary>
                <p>{{ $item['description'] ?? '' }}</p>
            </details>
            @endforeach
        </div>
    </div>
</section>
@elseif($layout === 'seo_cta')
<section class="seo-lp seo-lp-cta seo-reveal-up" data-reveal="up">
    <div class="seo-lp-container">
        <div class="seo-lp-cta-card">
            <h2>{{ $data['heading'] ?? '' }}</h2>
            @if(filled($data['button_text'] ?? null))
                <a class="seo-lp-button" href="{{ ($data['button_link'] ?? '') ?: '/contact#contact' }}">{{ $data['button_text'] }}</a>
            @endif
        </div>
    </div>
</section>
@endif
