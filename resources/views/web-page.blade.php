@extends('layouts.app')

@section('title', $webPage->meta_title ?: ($webPage->title . ' - Retrotech Digital'))
@section('description', $webPage->meta_description ?: $webPage->short_description)

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/tech-development.css') }}">
@endpush

@section('content')
<main id="td-page">
    {{-- =========================================================================
         1. MAIN HERO (Hardcoded page header)
         ========================================================================= --}}
    <section class="td-hero-section">
        <div class="td-hero-mesh" aria-hidden="true"></div>

        <div class="td-container"> 
            <div class="td-hero-grid">
                <div>
                    <span class="td-hero-badge">
                        <span class="td-kicker-dot"></span>
                        Web Services / {{ str_pad((string) $webPage->id, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    <p class="td-hero-category">{{ $webPage->title }}</p>

                    <h1 class="td-hero-title">
                        {{ $webPage->title }}
                    </h1>

                    <p class="td-hero-desc">
                        {{ $webPage->short_description }}
                    </p>

                    <div class="td-hero-actions">
                        <a href="#td-contact" class="td-btn-primary">
                            Discuss Your Project <span class="td-arrow" aria-hidden="true">↗</span>
                        </a>
                        <a href="#td-capabilities" class="td-btn-secondary">
                            Explore Capabilities <span aria-hidden="true">↓</span>
                        </a>
                    </div>
                </div>

                <div>
                    <div class="td-cockpit-wrap">
                        <div class="td-cockpit-glow" aria-hidden="true"></div>
                        <div class="td-cockpit-card">
                            <div class="td-cockpit-header">
                                <div class="td-cockpit-dots" aria-hidden="true">
                                    <span class="td-cockpit-dot td-dot-red"></span>
                                    <span class="td-cockpit-dot td-dot-amber"></span>
                                    <span class="td-cockpit-dot td-dot-green"></span>
                                </div>
                                <span class="td-cockpit-title">retrotech://{{ $webPage->slug }}</span>
                                <span class="td-cockpit-status">Active</span>
                            </div>

                            @if (!empty($webPage->hero_image))
                                <div class="td-cockpit-media">
                                    <img src="{{ Str::startsWith($webPage->hero_image, 'http') ? $webPage->hero_image : asset($webPage->hero_image) }}" 
                                         alt="{{ $webPage->title }} Showcase" 
                                         class="td-cockpit-img" 
                                         loading="eager">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         2. DYNAMIC SECTIONS (Rendered from the DB)
         ========================================================================= --}}
    @foreach ($webPage->sections as $section)

        {{-- SECTION: HERO (If you want to add a secondary hero) --}}
        @if ($section->section_type === 'hero')
            <section class="td-diff-section">
                <div class="td-container">
                    <div class="td-diff-grid">
                        <div>
                            <span class="td-kicker"><span class="td-kicker-dot"></span>Custom Hero Section</span>
                            <h2 class="td-section-title">{{ $section->content['badge'] ?? 'Hero Section' }}</h2>
                            <p class="td-section-desc">{{ $section->content['subtitle'] ?? '' }}</p>
                        </div>
                        <div>
                            <div class="td-diff-card">
                                <div class="td-diff-icon" aria-hidden="true"><i class="fa-solid fa-quote-left"></i></div>
                                <p class="td-diff-text">We build scalable solutions tailored to your unique business requirements.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- SECTION: CTA --}}
        @if ($section->section_type === 'cta')
            <section id="td-contact" class="td-cta-section">
                <div class="td-container">
                    <div class="td-cta-panel">
                        <div class="td-cta-grid">
                            <div class="td-cta-left">
                                <span class="td-cta-kicker">Let's Build Something Great</span>
                                <h2 class="td-cta-heading">{{ $section->content['heading'] ?? 'Ready to get started?' }}</h2>
                                @if (!empty($section->content['description']))
                                    <p class="td-cta-desc">{{ $section->content['description'] }}</p>
                                @endif
                                <div class="td-cta-actions">
                                    <a href="{{ $section->content['button_link'] ?? '#' }}" class="td-btn-cta">
                                        {{ $section->content['button_text'] ?? 'Contact Us' }} <span aria-hidden="true">↗</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- SECTION: CAPABILITIES (Only shows if you added this in the admin) --}}
        @if ($section->section_type === 'capabilities')
            <section id="td-capabilities" class="td-cap-section">
                <div class="td-container">
                    <div class="td-cap-header">
                        <span class="td-kicker"><span class="td-kicker-dot"></span>What We Build</span>
                        <h2 class="td-section-title">{{ $section->title }}</h2>
                        @if($section->description) <p class="td-section-desc">{{ $section->description }}</p> @endif
                    </div>

                    <div class="td-cap-grid">
                        @foreach (($section->content['items'] ?? []) as $index => $item)
                            <article class="td-cap-card">
                                <div>
                                    <div class="td-cap-top">
                                        <span class="td-cap-num">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                    <h3 class="td-cap-title">{{ $item['title'] ?? '' }}</h3>
                                    <p class="td-cap-desc">{{ $item['description'] ?? '' }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- SECTION: FAQ --}}
        @if ($section->section_type === 'faq')
            <section class="td-faq-section">
                <div class="td-container">
                    <div class="td-faq-grid">
                        <div class="td-sticky-col">
                            <span class="td-kicker"><span class="td-kicker-dot"></span>Good To Know</span>
                            <h2 class="td-section-title">{{ $section->title }}</h2>
                        </div>
                        <div>
                            <div class="td-faq-list">
                                @foreach (($section->content['items'] ?? []) as $index => $item)
                                    <details class="td-faq-item" {{ $index === 0 ? 'open' : '' }}>
                                        <summary class="td-faq-summary">
                                            <div class="td-faq-question-wrap">
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