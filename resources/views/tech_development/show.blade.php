@extends('layouts.app')

@section('title', $techDevelopment->meta_title ?: ($techDevelopment->name . ' - Retrotech Digital'))
@section('description', $techDevelopment->meta_description ?: ($techDevelopment->short_description ?: 'High-performance tech development services by Retrotech Digital.'))

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/tech-development.css') }}">
@endpush

@section('content')
<main id="td-page">
    <section class="td-hero-section">
        <div class="td-hero-mesh" aria-hidden="true"></div>

        <div class="td-container">
            <div class="td-hero-grid">
                {{-- Left: Service Title, Description, and CTAs --}}
                <div>
                    <span class="td-hero-badge">
                        <span class="td-kicker-dot"></span>
                        Tech Development / {{ str_pad((string) $techDevelopment->id, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    <p class="td-hero-category">{{ $techDevelopment->name }}</p>

                    <h1 class="td-hero-title">
                        {{ $techDevelopment->hero_title ?: $techDevelopment->name }}
                    </h1>

                    <p class="td-hero-desc">
                        {{ $techDevelopment->hero_description ?: $techDevelopment->short_description }}
                    </p>

                    <div class="td-hero-actions">
                        <a href="#td-contact" class="td-btn-primary">
                            Discuss Your Project <span class="td-arrow" aria-hidden="true">↗</span>
                        </a>
                        <a href="#td-capabilities" class="td-btn-secondary">
                            Explore Capabilities <span aria-hidden="true">↓</span>
                        </a>
                    </div>

                    <div class="td-hero-trust">
                        <span class="td-hero-trust-item">
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i> Architecture-First
                        </span>
                        <span class="td-hero-trust-item">
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i> Modern Scalable Stack
                        </span>
                        <span class="td-hero-trust-item">
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i> Enterprise Security
                        </span>
                    </div>
                </div>

                {{-- Right: System Architecture & Engineering Cockpit --}}
                <div>
                    <div class="td-cockpit-wrap">
                        <div class="td-cockpit-glow" aria-hidden="true"></div>

                        {{-- Floating pill top right --}}
                        <div class="td-float-badge td-fb-top">
                            <i class="fa-solid fa-bolt" style="color: #3ea05f;"></i>
                            <span>Built to Scale</span>
                        </div>

                        {{-- Main Glass Cockpit Card --}}
                        <div class="td-cockpit-card">
                            <div class="td-cockpit-header">
                                <div class="td-cockpit-dots" aria-hidden="true">
                                    <span class="td-cockpit-dot td-dot-red"></span>
                                    <span class="td-cockpit-dot td-dot-amber"></span>
                                    <span class="td-cockpit-dot td-dot-green"></span>
                                </div>
                                <span class="td-cockpit-title">retrotech://{{ $techDevelopment->slug }}</span>
                                <span class="td-cockpit-status">Active</span>
                            </div>

                            {{-- Real-World Hero Image Presentation --}}
                            @if (!empty($techDevelopment->hero_image))
                                <div class="td-cockpit-media">
                                    <img src="{{ asset($techDevelopment->hero_image) }}" 
                                         alt="{{ $techDevelopment->name }} Engineering Showcase" 
                                         class="td-cockpit-img" 
                                         loading="eager">
                                    <div class="td-cockpit-media-overlay" aria-hidden="true"></div>
                                    <div class="td-cockpit-media-caption">
                                        <div class="td-caption-left">
                                            <span class="td-caption-dot" aria-hidden="true"></span>
                                            <span class="td-caption-name">{{ $techDevelopment->name }}</span>
                                        </div>
                                        <span class="td-caption-tag">Production Ready</span>
                                    </div>
                                </div>
                            @else
                                {{-- Architecture Layers Fallback --}}
                                <div class="td-cockpit-layers">
                                <div class="td-layer-item">
                                    <div class="td-layer-left">
                                        <div class="td-layer-icon">
                                            <i class="fa-solid fa-cubes"></i>
                                        </div>
                                        <div>
                                            <p class="td-layer-name">Experience &amp; Frontend Layer</p>
                                            <p class="td-layer-sub">Responsive, Accessible, Sub-second TTFB</p>
                                        </div>
                                    </div>
                                    <span class="td-layer-tag">UI/UX</span>
                                </div>

                                <div class="td-layer-item">
                                    <div class="td-layer-left">
                                        <div class="td-layer-icon">
                                            <i class="fa-solid fa-server"></i>
                                        </div>
                                        <div>
                                            <p class="td-layer-name">Core Engine &amp; API Pipeline</p>
                                            <p class="td-layer-sub">High-Throughput, Modular Microservices</p>
                                        </div>
                                    </div>
                                    <span class="td-layer-tag">Backend</span>
                                </div>

                                <div class="td-layer-item">
                                    <div class="td-layer-left">
                                        <div class="td-layer-icon">
                                            <i class="fa-solid fa-shield-halved"></i>
                                        </div>
                                        <div>
                                            <p class="td-layer-name">Security &amp; Cloud Reliability</p>
                                            <p class="td-layer-sub">Zero-Trust Auth, Automated CI/CD, SSL</p>
                                        </div>
                                    </div>
                                    <span class="td-layer-tag">SecOps</span>
                                </div>
                                </div>
                            @endif

                            <div class="td-cockpit-metrics">
                                <div>
                                    <div class="td-cm-val">99.9%</div>
                                    <div class="td-cm-lbl">Uptime SLA</div>
                                </div>
                                <div>
                                    <div class="td-cm-val">&lt; 150ms</div>
                                    <div class="td-cm-lbl">Avg Latency</div>
                                </div>
                                <div>
                                    <div class="td-cm-val">Grade A</div>
                                    <div class="td-cm-lbl">Performance</div>
                                </div>
                            </div>
                        </div>

                        {{-- Floating pill bottom left --}}
                        <div class="td-float-badge td-fb-bottom">
                            <i class="fa-solid fa-code-commit" style="color: #2f6f46;"></i>
                            <span>Clean Architecture</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         DYNAMIC SECTIONS LOOP: Renders all database sections without alteration
         ========================================================================= --}}
    @foreach ($techDevelopment->sections as $section)

        {{-- ---------------------------------------------------------------------
             SECTION 01: DIFFERENTIATOR
             --------------------------------------------------------------------- --}}
        @if ($section->section_type === 'differentiator')
            <section class="td-diff-section">
                <div class="td-container">
                    <div class="td-diff-grid">
                        <div>
                            <span class="td-kicker">
                                <span class="td-kicker-dot"></span>
                                01 / The Difference
                            </span>
                            <h2 class="td-section-title">{{ $section->title }}</h2>
                            <p class="td-section-desc">
                                Thoughtfully engineered solutions that blend modern technical standards with long-term business velocity.
                            </p>
                        </div>

                        <div>
                            <div class="td-diff-card">
                                <div class="td-diff-icon" aria-hidden="true">
                                    <i class="fa-solid fa-quote-left"></i>
                                </div>
                                <p class="td-diff-text">{{ $section->description }}</p>
                                <div class="td-diff-footer">
                                    <span class="td-kicker-dot"></span>
                                    <span>Built with Purpose · Zero Technical Compromises</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- ---------------------------------------------------------------------
             SECTION 02: CAPABILITIES
             --------------------------------------------------------------------- --}}
        @if ($section->section_type === 'capabilities')
            <section id="td-capabilities" class="td-cap-section">
                <div class="td-container">
                    <div class="td-cap-header">
                        <span class="td-kicker">
                            <span class="td-kicker-dot"></span>
                            02 / What We Build
                        </span>
                        <h2 class="td-section-title">{{ $section->title }}</h2>
                        @if (!empty($section->description))
                            <p class="td-section-desc">{{ $section->description }}</p>
                        @endif
                    </div>

                    <div class="td-cap-grid">
                        @foreach (($section->content['items'] ?? []) as $index => $item)
                            <article class="td-cap-card">
                                <div>
                                    <div class="td-cap-top">
                                        <span class="td-cap-num">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                                        <span class="td-cap-arrow" aria-hidden="true">↗</span>
                                    </div>
                                    <h3 class="td-cap-title">{{ $item['title'] ?? '' }}</h3>
                                    <p class="td-cap-desc">{{ $item['description'] ?? '' }}</p>
                                </div>

                                @if (!empty($item['impact']))
                                    <div class="td-cap-impact">
                                        <div class="td-impact-lbl">Strategic Value &amp; Impact</div>
                                        <p class="td-impact-val">{{ $item['impact'] }}</p>
                                    </div>
                                @endif
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- ---------------------------------------------------------------------
             SECTION 03: PROCESS (DARK ROADMAP)
             --------------------------------------------------------------------- --}}
        @if ($section->section_type === 'process')
            <section class="td-process-section">
                <div class="td-process-glow-1" aria-hidden="true"></div>
                <div class="td-process-glow-2" aria-hidden="true"></div>

                <div class="td-container">
                    <div class="td-process-grid">
                        <div class="td-sticky-col">
                            <span class="td-process-badge">
                                <span class="td-kicker-dot"></span>
                                03 / How We Work
                            </span>
                            <h2 class="td-section-title td-process-title">{{ $section->title }}</h2>
                            @if (!empty($section->description))
                                <p class="td-process-desc">{{ $section->description }}</p>
                            @endif

                            <div class="td-process-card-info">
                                <i class="fa-solid fa-code-branch" aria-hidden="true"></i>
                                <span>Agile sprints, transparent demos, and continuous delivery milestones.</span>
                            </div>
                        </div>

                        <div>
                            <div class="td-timeline">
                                @foreach (($section->content['items'] ?? []) as $index => $item)
                                    <article class="td-step-item">
                                        <div class="td-step-bubble" aria-hidden="true">
                                            {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}
                                        </div>
                                        <div class="td-step-content">
                                            <div class="td-step-meta">Phase {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }} of {{ str_pad((string) count($section->content['items'] ?? []), 2, '0', STR_PAD_LEFT) }}</div>
                                            <h3 class="td-step-heading">{{ $item['title'] ?? '' }}</h3>
                                            <p class="td-step-body">{{ $item['description'] ?? '' }}</p>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- ---------------------------------------------------------------------
             SECTION 04: REASONS (WHY RETROTECH)
             --------------------------------------------------------------------- --}}
        @if ($section->section_type === 'reasons')
            <section class="td-reasons-section">
                <div class="td-container">
                    <div class="td-reasons-grid">
                        <div class="td-sticky-col">
                            <span class="td-kicker">
                                <span class="td-kicker-dot"></span>
                                04 / Why RetroTech
                            </span>
                            <h2 class="td-section-title">{{ $section->title }}</h2>
                            @if (!empty($section->description))
                                <p class="td-section-desc">{{ $section->description }}</p>
                            @endif

                            <div class="td-reasons-partner">
                                <span class="td-rp-logo">R</span>
                                <span class="td-rp-text">Dedicated<br>Technology Partner</span>
                            </div>
                        </div>

                        <div>
                            <div class="td-reasons-list">
                                @foreach (($section->content['items'] ?? []) as $index => $item)
                                    <article class="td-reason-row">
                                        <span class="td-reason-num">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                                        <div>
                                            <h3 class="td-reason-title">{{ $item['title'] ?? '' }}</h3>
                                            <p class="td-reason-desc">{{ $item['description'] ?? '' }}</p>
                                        </div>
                                        <span class="td-reason-arrow" aria-hidden="true">↗</span>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- ---------------------------------------------------------------------
             SECTION 05: METRICS
             --------------------------------------------------------------------- --}}
        @if ($section->section_type === 'metrics')
            <section class="td-metrics-section">
                <div class="td-container">
                    <div class="td-metrics-header">
                        <span class="td-kicker">
                            <span class="td-kicker-dot"></span>
                            05 / At A Glance
                        </span>
                        <h2 class="td-section-title">{{ $section->title }}</h2>
                        @if (!empty($section->description))
                            <p class="td-section-desc">{{ $section->description }}</p>
                        @endif
                    </div>

                    <div class="td-metrics-grid">
                        @foreach (($section->content['items'] ?? []) as $index => $item)
                            <div class="td-metric-card">
                                <div class="td-metric-accent-bar" aria-hidden="true"></div>
                                <span class="td-metric-tag">0{{ $index + 1 }} / Impact Proof</span>
                                <div class="td-metric-val">{{ $item['value'] ?? '' }}</div>
                                <p class="td-metric-lbl">{{ $item['label'] ?? '' }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- ---------------------------------------------------------------------
             SECTION 06: FAQ
             --------------------------------------------------------------------- --}}
        @if ($section->section_type === 'faq')
            <section class="td-faq-section">
                <div class="td-container">
                    <div class="td-faq-grid">
                        <div class="td-sticky-col">
                            <span class="td-kicker">
                                <span class="td-kicker-dot"></span>
                                06 / Good To Know
                            </span>
                            <h2 class="td-section-title">{{ $section->title }}</h2>
                            @if (!empty($section->description))
                                <p class="td-section-desc">{{ $section->description }}</p>
                            @endif
                        </div>

                        <div>
                            <div class="td-faq-list">
                                @foreach (($section->content['items'] ?? []) as $index => $item)
                                    <details class="td-faq-item" {{ $index === 0 ? 'open' : '' }}>
                                        <summary class="td-faq-summary">
                                            <div class="td-faq-question-wrap">
                                                <span class="td-faq-num">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                                                <h3 class="td-faq-question">{{ $item['question'] ?? '' }}</h3>
                                            </div>
                                            <span class="td-faq-icon" aria-hidden="true">+</span>
                                        </summary>
                                        <p class="td-faq-answer">{{ $item['answer'] ?? '' }}</p>
                                    </details>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- ---------------------------------------------------------------------
             SECTION 07: CTA CONVERSION PANEL
             --------------------------------------------------------------------- --}}
        @if ($section->section_type === 'cta')
            <section id="td-contact" class="td-cta-section">
                <div class="td-container">
                    <div class="td-cta-panel">
                        <div class="td-cta-glow" aria-hidden="true"></div>

                        <div class="td-cta-grid">
                            {{-- Left Action Block --}}
                            <div class="td-cta-left">
                                <span class="td-cta-kicker">
                                    <span class="td-kicker-dot" style="background: var(--td-green-accent);"></span>
                                    07 / Let's Build Something Great
                                </span>

                                <h2 class="td-cta-heading">{{ $section->title }}</h2>

                                @if (!empty($section->description))
                                    <p class="td-cta-desc">{{ $section->description }}</p>
                                @endif

                                <div class="td-cta-actions">
                                    <a href="#contact" class="td-btn-cta">
                                        Start a Conversation <span aria-hidden="true">↗</span>
                                    </a>
                                </div>
                            </div>

                            {{-- Right Channels Block --}}
                            <div class="td-cta-right">
                                @if (!empty($section->content['phone']))
                                    <div class="td-channel-item">
                                        <div class="td-channel-icon" aria-hidden="true">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                        <div>
                                            <div class="td-channel-meta">Call Us Directly</div>
                                            <a class="td-channel-val" href="tel:{{ preg_replace('/[^0-9+]/', '', $section->content['phone']) }}">
                                                {{ $section->content['phone'] }}
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($section->content['email']))
                                    <div class="td-channel-item">
                                        <div class="td-channel-icon" aria-hidden="true">
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <div>
                                            <div class="td-channel-meta">Email Inquiries</div>
                                            <a class="td-channel-val" href="mailto:{{ $section->content['email'] }}">
                                                {{ $section->content['email'] }}
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($section->content['office']))
                                    <div class="td-channel-item">
                                        <div class="td-channel-icon" aria-hidden="true">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <div>
                                            <div class="td-channel-meta">Engineering Center</div>
                                            <p class="td-channel-val" style="margin: 0;">{{ $section->content['office'] }}</p>
                                        </div>
                                    </div>
                                @endif

                                <div class="td-channel-pledge">
                                    <i class="fa-solid fa-clock"></i>
                                    <span>Typical project response time under 2 business hours.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endforeach
</main>
@endsection
