@extends('layouts.app')

@php
    $ogImage = $techDevelopment->hero_image ?? null;
    if ($ogImage && ! \Illuminate\Support\Str::startsWith($ogImage, ['http://', 'https://'])) {
        $ogImage = asset($ogImage);
    }
    $ogImage = $ogImage ?: asset('assets/images/logo.png');
@endphp

@section('title', ($techDevelopment->meta_title ?: $techDevelopment->name) . ' | Retrotech Digital')
@section('description', $techDevelopment->meta_description ?: ($techDevelopment->short_description ?: 'High-performance tech development services by Retrotech Digital.'))
@section('canonical', route('services.show', $techDevelopment->slug))
@section('og_image', $ogImage)

@push('styles')
    <link rel="stylesheet"
        href="{{ asset('css/tech-development.css') }}?v={{ file_exists(public_path('css/tech-development.css')) ? filemtime(public_path('css/tech-development.css')) : '1.0' }}">
@endpush

@section('content')
    <main id="td-page">
        <section class="td-hero-section">
            <div class="td-hero-mesh" aria-hidden="true"></div>

            <div class="td-container">
                <div class="td-hero-grid">
                    {{-- Left: Service Title, Description, and CTAs --}}
                    <div>
                        <p class="td-hero-category">{{ $techDevelopment->name }}</p>

                        <h1 class="td-hero-title">
                            {{ $techDevelopment->hero_title ?: $techDevelopment->name }}
                        </h1>

                        <p class="td-hero-desc">
                            {{ $techDevelopment->hero_description ?: $techDevelopment->short_description }}
                        </p>

                        <div class="td-hero-actions">
                            <a href="#contact" class="td-btn-primary">
                                Discuss Your Project <span class="td-arrow" aria-hidden="true">↗</span>
                            </a>
                            <a href="#td-process" class="td-btn-secondary">
                                How We Work <span aria-hidden="true">↓</span>
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
                                            alt="{{ $techDevelopment->name }}" class="td-cockpit-img"
                                            loading="eager">
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
                            <div class="td-diff-info">
                                <span class="td-kicker">
                                    <span class="td-kicker-dot"></span>
                                    The Difference
                                </span>
                                <h2 class="td-section-title">{{ $section->title }}</h2>
                                <p class="td-section-desc">
                                    Thoughtfully engineered solutions that blend modern technical standards with long-term business
                                    velocity.
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
            SECTION 03: PROCESS (HOW WE WORK)
            --------------------------------------------------------------------- --}}
            @if ($section->section_type === 'process')
                <section id="td-process" class="td-process-section">
                    <div class="td-process-glows" aria-hidden="true">
                        <div class="td-process-glow-1"></div>
                        <div class="td-process-glow-2"></div>
                    </div>

                    <div class="td-container">
                        <div class="td-process-grid">
                            <div class="td-sticky-col">
                                <span class="td-process-badge">
                                    <!-- <span class="td-kicker-dot"></span> -->
                                    How We Work
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
                                <div class="td-timeline-stream">
                                    @foreach (($section->content['items'] ?? []) as $index => $item)
                                        @php
                                            $stepNum = str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT);
                                            $isLast = ($index + 1) === count($section->content['items'] ?? []);
                                        @endphp
                                        <div class="td-step-block {{ $isLast ? 'is-last' : '' }}">
                                            <article class="td-step-card">
                                                {{-- Attached Left Timeline Node --}}
                                                <div class="td-step-rail">
                                                    <div class="td-step-node">
                                                        <span>{{ $stepNum }}</span>
                                                    </div>
                                                </div>

                                                {{-- Card Content --}}
                                                <div class="td-step-body-wrap">
                                                    <div class="td-step-header">
                                                        <span class="td-step-badge">Phase {{ $index + 1 }}</span>
                                                        <span class="td-step-dot" aria-hidden="true"></span>
                                                    </div>

                                                    <h3 class="td-step-title">{{ $item['title'] ?? '' }}</h3>
                                                    <p class="td-step-desc">{{ $item['description'] ?? '' }}</p>
                                                </div>
                                            </article>

                                            @unless ($isLast)
                                                <div class="td-step-connector" aria-hidden="true"></div>
                                            @endunless
                                        </div>
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
                                    Why RetroTech
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
                                            <span
                                                class="td-reason-num">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
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
            SECTION 06: FAQ
            --------------------------------------------------------------------- --}}
            @if ($section->section_type === 'faq')
                <section class="td-faq-section">
                    <div class="td-container">
                        <div class="td-faq-grid">
                            <div class="td-sticky-col">
                                <span class="td-kicker">
                                    <span class="td-kicker-dot"></span>
                                    Good To Know
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
                                                    <span
                                                        class="td-faq-num">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
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



        @endforeach
    </main>
@endsection