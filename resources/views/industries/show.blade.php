@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/industry.css') }}">
@endpush

@section('content')
    <main class="industry-page">

        {{-- HERO --}}
        <section class="industry-hero">
            <div class="industry-hero__image" style="background-image: url('{{ $industry->hero_image ?: $industry->intro_image }}')"></div>
            <div class="industry-hero__overlay"></div>

            <div class="industry-container industry-hero__content">
                <span class="industry-eyebrow">Industries We Serve</span>

                <h1>
                    {{ $industry->hero_title ?: $industry->name }}
                </h1>

                <p>
                    {{ $industry->hero_description ?: $industry->short_description }}
                </p>

                <div class="industry-hero__actions">
                    <a href="#industry-solutions" class="industry-btn industry-btn--light">
                        Explore Our Solutions <span aria-hidden="true">↘</span>
                    </a>
                    <a href="#industry-contact" class="industry-text-link">
                        Discuss Your Project <span aria-hidden="true">→</span>
                    </a>
                </div>

                <div class="industry-hero__index">
                    <span>RETROTECH DIGITAL</span>
                    <span>INDUSTRY / {{ strtoupper($industry->slug) }}</span>
                </div>
            </div>
        </section>

        {{-- INTRODUCTION --}}
        <section class="industry-intro section-space" id="industry-solutions">
            <div class="industry-container industry-intro__grid">
                <div class="industry-intro__copy">
                    <span class="industry-kicker">Built Around Your Industry</span>

                    <h2>
                        {{ $industry->intro_heading ?: 'Technology That Moves Your Business Forward' }}
                    </h2>

                    <div class="industry-rich-text">
                        {{ $industry->intro_description ?: $industry->description }}
                    </div>

                    <a href="#industry-features" class="industry-inline-link">
                        Discover our capabilities <span aria-hidden="true">↗</span>
                    </a>
                </div>

                <div class="industry-intro__visual">
                    @if ($industry->intro_image)
                        <img src="{{ $industry->intro_image }}" alt="{{ $industry->name }} digital solutions" loading="lazy">
                    @elseif ($industry->hero_image)
                        <img src="{{ $industry->hero_image }}" alt="{{ $industry->name }} solutions" loading="lazy">
                    @else
                        <div class="industry-image-placeholder">
                            <span>Industry-focused</span>
                            <strong>Digital Solutions</strong>
                        </div>
                    @endif

                    <div class="industry-intro__note">
                        <span class="industry-intro__note-icon">✳</span>
                        <div>
                            <strong>Strategy meets technology</strong>
                            <span>Solutions shaped around your goals</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- FEATURE CARDS --}}
        @php
            $features = $industry->contents
                ->where('content_type', 'feature')
                ->where('is_visible', true)
                ->sortBy('sort_order');
        @endphp

        @if ($features->isNotEmpty())
            <section class="industry-features section-space" id="industry-features">
                <div class="industry-container">
                    <div class="industry-section-heading">
                        <div>
                            <span class="industry-kicker">What We Deliver</span>
                            <h2>Solutions Designed for Real-World Impact</h2>
                        </div>
                        <p>
                            Practical digital capabilities designed to help
                            {{ $industry->name }} businesses operate, grow, and adapt.
                        </p>
                    </div>

                    <div class="industry-feature-grid">
                        @foreach ($features as $index => $feature)
                            <article class="industry-feature-card">
                                <div class="industry-feature-card__top">
                                    <span class="industry-feature-card__number">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </span>

                                    @if ($feature->icon && (str_starts_with($feature->icon, 'http://') || str_starts_with($feature->icon, 'https://') || str_starts_with($feature->icon, '/')))
                                        <img class="industry-feature-card__icon" src="{{ $feature->icon }}" alt="" loading="lazy">
                                    @elseif ($feature->icon)
                                        <i class="{{ $feature->icon }} industry-feature-card__icon" aria-hidden="true"></i>
                                    @else
                                        <span class="industry-feature-card__symbol">↗</span>
                                    @endif
                                </div>

                                <h3>{{ $feature->title }}</h3>
                                <p>{{ $feature->description }}</p>

                                <span class="industry-feature-card__line"></span>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- WHY CHOOSE US --}}
        @php
            $reasons = $industry->contents
                ->where('content_type', 'reason')
                ->where('is_visible', true)
                ->sortBy('sort_order');
        @endphp

        @if ($reasons->isNotEmpty())
            <section class="industry-reasons section-space">
                <div class="industry-container">
                    <div class="industry-reasons__heading">
                        <span class="industry-kicker industry-kicker--light">
                            The Retrotech Difference
                        </span>
                        <h2>Why Businesses Choose Us</h2>
                        <p>
                            Technology decisions should create lasting value.
                            We focus on solutions aligned with your business needs.
                        </p>
                    </div>

                    <div class="industry-reason-grid">
                        @foreach ($reasons as $index => $reason)
                            <article class="industry-reason">
                                <span class="industry-reason__number">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>
                                <div>
                                    <h3>{{ $reason->title }}</h3>
                                    <p>{{ $reason->description }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- CERTIFICATION --}}
        @php
            $certification = $industry->contents
                ->firstWhere('content_type', 'certification');
            $certificationImage = $certification?->image ?: 'https://www.retrotechdigital.com/frontend/img/certificate.png';
        @endphp
        <section class="industry-certification section-space">
            <div class="industry-container industry-certification__panel">
                <div class="industry-certification__copy">
                    <span class="industry-kicker">Trust & Responsibility</span>
                    <h2>{{ $certification?->title ?: 'Our Certification' }}</h2>
                    <p>
                        {{ $certification?->description ?: 'As a swiftly advancing leader in comprehensive ITAD and managed solutions for reverse logistics, B2B Exports is R2V3 Certified.' }}
                    </p>
                </div>

                <div class="industry-certification__image">
                    <img src="{{ $certificationImage }}" alt="{{ $certification?->title ?: 'R2V3 certification' }}" loading="lazy">
                </div>
            </div>
        </section>

        {{-- FAQ --}}
        @php
            $faqs = $industry->contents
                ->where('content_type', 'faq')
                ->where('is_visible', true)
                ->sortBy('sort_order');
        @endphp

        @if ($faqs->isNotEmpty())
            <section class="industry-faq section-space">
                <div class="industry-container industry-faq__grid">
                    <div class="industry-faq__heading">
                        <span class="industry-kicker">Helpful Answers</span>
                        <h2>Frequently Asked Questions</h2>
                        <p>
                            Find answers to common questions about our
                            {{ $industry->name }} solutions.
                        </p>
                    </div>

                    <div class="industry-faq__list">
                        @foreach ($faqs as $index => $faq)
                            <details class="industry-faq__item" {{ $index === 0 ? 'open' : '' }}>
                                <summary>
                                    <span>{{ $faq->title }}</span>
                                    <span class="industry-faq__toggle" aria-hidden="true"></span>
                                </summary>
                                <div class="industry-faq__answer">
                                    <p>{{ $faq->description }}</p>
                                </div>
                            </details>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- FINAL CALL TO ACTION --}}
        <section class="industry-cta" id="industry-contact">
            <div class="industry-container industry-cta__inner">
                <div>
                    <span class="industry-kicker industry-kicker--light">
                        Let's Build What's Next
                    </span>
                    <h2>Ready to move your business forward?</h2>
                    <p>
                        Let's discuss the right digital solutions for your
                        {{ $industry->name }} business.
                    </p>
                </div>

                <a href="{{ url('/contact') }}" class="industry-btn industry-btn--dark">
                    Talk to Our Team <span aria-hidden="true">↗</span>
                </a>
            </div>
        </section>

    </main>
@endsection
