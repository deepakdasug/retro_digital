@php
    $heroImage = $heroImage ?? \App\Support\ImageUrl::resolve($industry->hero_image);
    $introImage = $introImage ?? \App\Support\ImageUrl::resolve($industry->intro_image);
    $spotlightImage = $spotlightImage ?? \App\Support\ImageUrl::resolve($industry->spotlight_image);

    $features = $features ?? collect($industry->features ?? [])->filter(fn ($item) => is_array($item) && (!empty($item['title']) || !empty($item['description'])))->values();
    $reasons = $reasons ?? collect($industry->reasons ?? [])->filter(fn ($item) => is_array($item) && (!empty($item['title']) || !empty($item['description'])))->values();
    $faqs = $faqs ?? collect($industry->faqs ?? [])->filter(fn ($item) => is_array($item) && !empty($item['question']) && !empty($item['answer']))->values();
    $isPreview = $isPreview ?? false;
@endphp

@switch($sectionKey)
    @case('hero')
        <section class="ind-hero">
            <div class="ind-hero-grid-pattern" aria-hidden="true"></div>
            <div class="ind-hero-glow" aria-hidden="true"></div>

            <div class="ind-container">
                <div class="ind-hero-grid">
                    <div class="ind-hero-copy">
                        <nav class="ind-breadcrumb" aria-label="Breadcrumb">
                            <a href="{{ route('home') }}">Home</a>
                            <span aria-hidden="true">/</span>
                            <span>Industries</span>
                            <span aria-hidden="true">/</span>
                            <span class="is-current">{{ $industry->name }}</span>
                        </nav>

                        <span class="ind-kicker ind-kicker--hero">
                            <i class="ind-kicker-dot" aria-hidden="true"></i>
                            {{ $industry->hero_eyebrow ?: ($industry->name . ' Solutions') }}
                        </span>

                        <h1>{{ $industry->hero_title ?: $industry->name }}</h1>

                        @if($industry->hero_description ?: $industry->short_description)
                            <p class="ind-hero-lead">{{ $industry->hero_description ?: $industry->short_description }}</p>
                        @endif

                        <div class="ind-hero-actions">
                            <a href="{{ $industry->hero_cta_link ?: route('contact.page') . '#contact' }}" class="ind-btn ind-btn--primary">
                                <span>{{ $industry->hero_cta_text ?: 'Book a Strategy Call' }}</span>
                                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                            </a>

                            @if($features->isNotEmpty() || !empty($industry->hero_secondary_link))
                                <a href="{{ $industry->hero_secondary_link ?: '#industry-features' }}" class="ind-btn ind-btn--glass">
                                    <span>{{ $industry->hero_secondary_text ?: 'Explore Capabilities' }}</span>
                                    <i class="fa-solid fa-arrow-down" aria-hidden="true"></i>
                                </a>
                            @endif
                        </div>

                        <div class="ind-hero-trust">
                            <span><i class="fa-solid fa-circle-check" aria-hidden="true"></i> 100% Source IP Ownership</span>
                            <span><i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Enterprise Security</span>
                            <span><i class="fa-solid fa-bolt" aria-hidden="true"></i> Dedicated Delivery Team</span>
                        </div>
                    </div>

                    <div class="ind-hero-visual">
                        <div class="ind-hero-orbit ind-hero-orbit--outer" aria-hidden="true"></div>
                        <div class="ind-hero-orbit ind-hero-orbit--inner" aria-hidden="true"></div>

                        <div class="ind-hero-frame">
                            <div class="ind-hero-frame-bar">
                                <div class="ind-window-dots" aria-hidden="true">
                                    <span></span><span></span><span></span>
                                </div>
                                <span class="ind-frame-tag">
                                    <i class="{{ $industry->icon ?: 'fa-solid fa-layer-group' }}" aria-hidden="true"></i>
                                    {{ $industry->name }}
                                </span>
                            </div>

                            <div class="ind-hero-media">
                                @if($heroImage)
                                    <img src="{{ $heroImage }}" alt="{{ $industry->hero_title ?: $industry->name }}" loading="eager">
                                @else
                                    <div class="ind-hero-media-fallback">
                                        <i class="{{ $industry->icon ?: 'fa-solid fa-layer-group' }}" aria-hidden="true"></i>
                                        <strong>{{ $industry->name }}</strong>
                                    </div>
                                @endif
                                <div class="ind-hero-media-shade" aria-hidden="true"></div>
                            </div>

                            <div class="ind-hero-frame-footer">
                                <div>
                                    <small>SECTOR ARCHITECTURE</small>
                                    <strong>{{ $industry->intro_note_title ?: ($industry->name . ' Stack') }}</strong>
                                </div>
                                <span class="ind-status-pill">
                                    <span class="ind-status-dot" aria-hidden="true"></span>
                                    Production Ready
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ind-hero-strip">
                    <div class="ind-hero-strip-label">
                        {{ $industry->hero_index_label ?: strtoupper($industry->name) . ' · RETROTECH DIGITAL' }}
                    </div>
                    <nav class="ind-hero-anchor-nav" aria-label="On this page">
                        @if(!empty($industry->intro_heading) || !empty($industry->intro_description))
                            <a href="#industry-overview">Overview</a>
                        @endif
                        @if($features->isNotEmpty())
                            <a href="#industry-features">Capabilities ({{ $features->count() }})</a>
                        @endif
                        @if($reasons->isNotEmpty())
                            <a href="#industry-solutions">Why Retrotech</a>
                        @endif
                        @if(!empty($industry->spotlight_heading) || !empty($industry->spotlight_description))
                            <a href="#industry-standards">Governance</a>
                        @endif
                        @if($faqs->isNotEmpty())
                            <a href="#industry-faq">FAQs</a>
                        @endif
                    </nav>
                </div>
            </div>
        </section>
        @break

    @case('intro')
        @if($isPreview || !empty($industry->intro_heading) || !empty($industry->intro_description))
            <section class="ind-section ind-intro" id="industry-overview">
                <div class="ind-container ind-intro-grid">
                    <div class="ind-intro-visual">
                        <div class="ind-intro-card">
                            @if($introImage)
                                <img src="{{ $introImage }}" alt="{{ $industry->intro_heading ?: $industry->name }}" loading="lazy">
                            @else
                                <div class="ind-intro-placeholder">
                                    <i class="{{ $industry->icon ?: 'fa-solid fa-layer-group' }}" aria-hidden="true"></i>
                                    <span>INDUSTRY FOCUS</span>
                                    <strong>{{ $industry->name }}</strong>
                                </div>
                            @endif
                        </div>

                        @if(!empty($industry->intro_note_title) || !empty($industry->intro_note_text))
                            <div class="ind-floating-note">
                                <span class="ind-floating-note-icon" aria-hidden="true">
                                    <i class="{{ $industry->icon ?: 'fa-solid fa-layer-group' }}"></i>
                                </span>
                                <div>
                                    @if(!empty($industry->intro_note_title))
                                        <strong>{{ $industry->intro_note_title }}</strong>
                                    @endif
                                    @if(!empty($industry->intro_note_text))
                                        <span>{{ $industry->intro_note_text }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="ind-intro-copy">
                        <span class="ind-kicker">{{ $industry->intro_eyebrow ?: 'Sector Overview' }}</span>
                        <h2>{{ $industry->intro_heading ?: ('Built for ' . $industry->name) }}</h2>

                        @if(!empty($industry->intro_description))
                            <div class="ind-rich-text">
                                @if(strip_tags($industry->intro_description) !== $industry->intro_description)
                                    {!! $industry->intro_description !!}
                                @else
                                    @foreach(preg_split('/\R{2,}/', trim($industry->intro_description)) as $paragraph)
                                        <p>{!! nl2br(e(trim($paragraph))) !!}</p>
                                    @endforeach
                                @endif
                            </div>
                        @endif

                        @if(!empty($industry->intro_link_text))
                            <a href="{{ $industry->intro_link_url ?: route('contact.page') . '#contact' }}" class="ind-inline-cta">
                                <span>{{ $industry->intro_link_text }}</span>
                                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </section>
        @endif
        @break

    @case('features')
        @if($isPreview || $features->isNotEmpty())
            <section class="ind-section ind-features" id="industry-features">
                <div class="ind-container">
                    <div class="ind-section-head">
                        <div>
                            <span class="ind-kicker">{{ $industry->features_eyebrow ?: 'Core Capabilities' }}</span>
                            <h2>{{ $industry->features_heading ?: ('What We Deliver for ' . $industry->name) }}</h2>
                        </div>
                        @if(!empty($industry->features_description))
                            <p>{{ $industry->features_description }}</p>
                        @endif
                    </div>

                    <div class="ind-feature-grid">
                        @forelse($features as $index => $feature)
                            <article class="ind-feature-card">
                                <div class="ind-feature-card-top">
                                    <span class="ind-feature-icon" aria-hidden="true">
                                        <i class="{{ !empty($feature['icon']) ? $feature['icon'] : 'fa-solid fa-cubes' }}"></i>
                                    </span>
                                    <span class="ind-feature-num">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                <h3>{{ $feature['title'] ?? '' }}</h3>
                                <p>{{ $feature['description'] ?? '' }}</p>
                                <div class="ind-feature-foot">
                                    <span>Included in {{ $industry->name }} stack</span>
                                    <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                                </div>
                            </article>
                        @empty
                            <p>No feature cards configured yet. Expand "Edit this section" below to add cards.</p>
                        @endforelse
                    </div>
                </div>
            </section>
        @endif
        @break

    @case('reasons')
        @if($isPreview || $reasons->isNotEmpty())
            <section class="ind-section ind-reasons" id="industry-solutions">
                <div class="ind-reasons-glow" aria-hidden="true"></div>
                <div class="ind-container ind-reasons-wrap">
                    <div class="ind-reasons-head">
                        <span class="ind-kicker ind-kicker--light">{{ $industry->reasons_eyebrow ?: 'Why Retrotech Digital' }}</span>
                        <h2>{{ $industry->reasons_heading ?: ('Engineered for ' . $industry->name . ' Teams') }}</h2>
                        @if(!empty($industry->reasons_description))
                            <p>{{ $industry->reasons_description }}</p>
                        @endif
                    </div>

                    <div class="ind-reason-grid">
                        @forelse($reasons as $index => $reason)
                            <article class="ind-reason-card">
                                <div class="ind-reason-badge">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</div>
                                <div class="ind-reason-body">
                                    <h3>{{ $reason['title'] ?? '' }}</h3>
                                    <p>{{ $reason['description'] ?? '' }}</p>
                                </div>
                            </article>
                        @empty
                            <p>No solution pillars configured yet. Expand "Edit this section" below to add items.</p>
                        @endforelse
                    </div>
                </div>
            </section>
        @endif
        @break

    @case('spotlight')
        @if($isPreview || !empty($industry->spotlight_heading) || !empty($industry->spotlight_description))
            <section class="ind-section ind-spotlight" id="industry-standards">
                <div class="ind-container">
                    <div class="ind-spotlight-panel">
                        <div class="ind-spotlight-copy">
                            <span class="ind-kicker">{{ $industry->spotlight_eyebrow ?: 'Security & Architecture' }}</span>
                            <h2>{{ $industry->spotlight_heading ?: 'Enterprise Governance & Delivery Standards' }}</h2>
                            @if(!empty($industry->spotlight_description))
                                <p>{{ $industry->spotlight_description }}</p>
                            @endif
                            <div class="ind-spotlight-chips">
                                <span><i class="fa-solid fa-lock" aria-hidden="true"></i> Role-Based Access</span>
                                <span><i class="fa-solid fa-code-branch" aria-hidden="true"></i> Clean API Architecture</span>
                                <span><i class="fa-solid fa-gauge-high" aria-hidden="true"></i> Core Web Vitals Tuned</span>
                            </div>
                        </div>

                        <div class="ind-spotlight-media">
                            @if($spotlightImage)
                                <img src="{{ $spotlightImage }}" alt="{{ $industry->spotlight_heading ?: ($industry->name . ' standards') }}" loading="lazy">
                            @else
                                <img src="{{ asset('assets/images/certificate.png') }}" alt="{{ $industry->spotlight_heading ?: 'Retrotech Digital delivery standards' }}" loading="lazy">
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @break

    @case('faq')
        @if($isPreview || $faqs->isNotEmpty())
            <section class="ind-section ind-faq" id="industry-faq">
                <div class="ind-container ind-faq-grid">
                    <div class="ind-faq-aside">
                        <span class="ind-kicker">{{ $industry->faq_eyebrow ?: 'Common Questions' }}</span>
                        <h2>{{ $industry->faq_heading ?: ($industry->name . ' FAQs') }}</h2>
                        @if(!empty($industry->faq_description))
                            <p>{{ $industry->faq_description }}</p>
                        @endif
                        <div class="ind-faq-help-card">
                            <span class="ind-faq-help-icon" aria-hidden="true"><i class="fa-regular fa-comments"></i></span>
                            <div>
                                <strong>Have a specific workflow question?</strong>
                                <a href="{{ route('contact.page') }}#contact">Ask our solution architects <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="ind-faq-list">
                        @forelse($faqs as $index => $faq)
                            <details class="ind-faq-item" {{ $index === 0 ? 'open' : '' }}>
                                <summary>
                                    <span>{{ $faq['question'] }}</span>
                                    <span class="ind-faq-toggle" aria-hidden="true">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                </summary>
                                <div class="ind-faq-answer">
                                    <p>{{ $faq['answer'] }}</p>
                                </div>
                            </details>
                        @empty
                            <p>No FAQs configured yet. Expand "Edit this section" below to add questions.</p>
                        @endforelse
                    </div>
                </div>
            </section>
        @endif
        @break

    @case('cta')
        <section class="ind-cta-wrap">
            <div class="ind-container">
                <div class="ind-cta-card">
                    <div class="ind-cta-orbit" aria-hidden="true"></div>
                    <div class="ind-cta-copy">
                        <span class="ind-kicker ind-kicker--light">{{ $industry->cta_eyebrow ?: 'Start a Conversation' }}</span>
                        <h2>{{ $industry->cta_heading ?: ('Ready to modernize your ' . strtolower($industry->name) . ' stack?') }}</h2>
                        <p>{{ $industry->cta_description ?: 'Speak with our product, engineering, and digital growth specialists to map out a solution tailored to your workflows.' }}</p>
                    </div>

                    <div class="ind-cta-actions">
                        <a href="{{ $industry->cta_primary_link ?: route('contact.page') . '#contact' }}" class="ind-btn ind-btn--primary">
                            <span>{{ $industry->cta_primary_text ?: 'Schedule Discovery Call' }}</span>
                            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </a>

                        @if(!empty($industry->cta_whatsapp_text) || !empty($industry->cta_whatsapp_link))
                            <a href="{{ $industry->cta_whatsapp_link ?: 'https://wa.me/919910836538' }}" target="_blank" rel="noopener" class="ind-btn ind-btn--whatsapp">
                                <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                                <span>{{ $industry->cta_whatsapp_text ?: 'Chat on WhatsApp' }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        @break
@endswitch
