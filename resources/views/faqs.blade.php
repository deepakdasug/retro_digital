@extends('layouts.app')

@section('title', 'Frequently Asked Questions (FAQs) - Retrotech Digital')
@section('description', 'Clear answers to common questions about Retrotech Digital\'s custom software engineering, web development, mobile apps, project timelines, and post-launch SLAs.')
@section('canonical', route('faqs'))

@push('head')
<meta name="keywords" content="IT services FAQs, web development questions, mobile apps, custom software engineering, Retrotech Digital help center">

@if(isset($faqs) && $faqs->isNotEmpty())
@php
$faqSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => $faqs->map(function($f) {
        return [
            '@type' => 'Question',
            'name' => $f->question,
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => strip_tags($f->answer),
            ],
        ];
    })->values()->all(),
];
@endphp
<script type="application/ld+json">
{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endif
@endpush

@push('styles')
<style>
  /* ==========================================================================
     RETROTECH FAQ REDESIGN & RELAYOUT
     Theme: Modern Enterprise Editorial (Mint, Deep Forest, Clean Slate)
     ========================================================================== */
  :root {
    --faq-forest-deep: #13251a;
    --faq-forest-dark: #1b3524;
    --faq-forest-mid: #254a33;
    --faq-green-brand: #2f6f46;
    --faq-green-hover: #235837;
    --faq-green-bright: #3ea05f;
    --faq-emerald: #25d366;
    --faq-mint-soft: #eaf4eb;
    --faq-mint-bg: #f4f9f5;
    --faq-page-bg: #f8faf8;
    --faq-ink-primary: #15271d;
    --faq-ink-secondary: #314436;
    --faq-ink-muted: #5d7063;
    --faq-border-light: rgba(47, 111, 70, 0.14);
    --faq-border-hover: rgba(47, 111, 70, 0.32);
    --faq-card-bg: #ffffff;
    --faq-shadow-sm: 0 2px 8px rgba(19, 37, 26, 0.04);
    --faq-shadow-md: 0 10px 28px rgba(19, 37, 26, 0.06);
    --faq-radius-lg: 20px;
    --faq-radius-md: 14px;
    --faq-radius-sm: 8px;
  }

  /* Ensure sticky positioning works smoothly with Lenis and document scroll */
  body.inner-page {
    overflow-x: clip !important;
  }

  .faq-redesign-wrap {
    background-color: var(--faq-page-bg);
    color: var(--faq-ink-primary);
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Inter", "Helvetica Neue", Arial, sans-serif;
    padding-bottom: 5rem;
    overflow-x: clip;
    overflow-y: visible;
  }

  /* --------------------------------------------------------------------------
     0. TOP TICKER RIBBON
     -------------------------------------------------------------------------- */
  .faq-top-ribbon {
    background: var(--faq-mint-soft);
    color: var(--faq-forest-deep);
    padding: 10px 0;
    border-bottom: 1px solid rgba(47, 111, 70, 0.14);
    overflow: hidden;
    white-space: nowrap;
  }

  .faq-top-ribbon .ribbon-track {
    display: inline-flex;
    align-items: center;
    gap: 32px;
    animation: ribbonScroll 28s linear infinite;
  }

  .faq-top-ribbon span {
    font-size: 11.5px;
    font-weight: 750;
    letter-spacing: 2px;
    text-transform: uppercase;
  }

  .faq-top-ribbon .divider {
    color: var(--faq-green-brand);
    font-size: 11px;
  }

  @keyframes ribbonScroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }

  /* --------------------------------------------------------------------------
     1. HERO SECTION (EDITORIAL & SEARCH LAUNCHER)
     -------------------------------------------------------------------------- */
  .faq-hero-section {
    position: relative;
    padding: 4.5rem 1.5rem 3.5rem;
    background: radial-gradient(circle at 50% 0%, rgba(47, 111, 70, 0.08) 0%, transparent 70%),
                linear-gradient(180deg, #f4f9f5 0%, #f8faf8 100%);
    border-bottom: 1px solid var(--faq-border-light);
    text-align: center;
  }

  .faq-hero-inner {
    max-width: 860px;
    margin: 0 auto;
  }

  .faq-hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 14px;
    border-radius: 9999px;
    background: #ffffff;
    border: 1px solid var(--faq-border-light);
    color: var(--faq-green-brand);
    font-size: 11.5px;
    font-weight: 750;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    box-shadow: var(--faq-shadow-sm);
    margin-bottom: 1.25rem;
  }

  .faq-hero-eyebrow i {
    color: var(--faq-emerald);
  }

  .faq-hero-title {
    font-size: clamp(2.2rem, 4.5vw, 3.4rem);
    font-weight: 850;
    color: var(--faq-forest-deep);
    line-height: 1.15;
    letter-spacing: -0.03em;
    margin: 0 0 1rem;
  }

  .faq-hero-title .title-accent {
    color: var(--faq-green-brand);
    position: relative;
    display: inline-block;
  }

  .faq-hero-sub {
    font-size: 1.05rem;
    line-height: 1.6;
    color: var(--faq-ink-muted);
    max-width: 680px;
    margin: 0 auto 2rem;
  }

  /* Integrated Hero Search Terminal */
  .faq-hero-search-box {
    position: relative;
    max-width: 620px;
    margin: 0 auto 1.75rem;
    background: #ffffff;
    border: 2px solid rgba(47, 111, 70, 0.22);
    border-radius: 9999px;
    box-shadow: 0 8px 24px rgba(19, 37, 26, 0.08);
    display: flex;
    align-items: center;
    padding: 6px 8px 6px 20px;
    transition: all 0.25s ease;
  }

  .faq-hero-search-box:focus-within {
    border-color: var(--faq-green-brand);
    box-shadow: 0 10px 30px rgba(47, 111, 70, 0.16);
    transform: translateY(-2px);
  }

  .faq-hero-search-box .search-icon {
    color: var(--faq-green-brand);
    font-size: 1.1rem;
    margin-right: 12px;
    flex-shrink: 0;
  }

  .faq-hero-search-input {
    width: 100%;
    border: none;
    outline: none;
    font-size: 0.98rem;
    color: var(--faq-forest-deep);
    background: transparent;
    font-family: inherit;
    font-weight: 500;
  }

  .faq-hero-search-input::placeholder {
    color: #8da092;
  }

  .faq-search-clear-btn {
    border: none;
    background: #f1f5f2;
    color: #647568;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: none;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    margin-right: 8px;
    transition: all 0.15s ease;
    font-size: 0.8rem;
  }

  .faq-search-clear-btn:hover {
    background: #e2ece4;
    color: #13251a;
  }

  .faq-search-counter-badge {
    padding: 5px 12px;
    border-radius: 9999px;
    background: var(--faq-mint-soft);
    color: var(--faq-green-brand);
    font-size: 0.78rem;
    font-weight: 700;
    white-space: nowrap;
    border: 1px solid rgba(47, 111, 70, 0.16);
    flex-shrink: 0;
  }

  /* Quick Badges Strip */
  .faq-hero-badges {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 12px;
  }

  .faq-mini-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.8rem;
    font-weight: 650;
    color: var(--faq-ink-secondary);
    background: rgba(255, 255, 255, 0.8);
    border: 1px solid var(--faq-border-light);
    padding: 5px 12px;
    border-radius: 9999px;
  }

  .faq-mini-pill i {
    color: var(--faq-green-brand);
    font-size: 0.8rem;
  }

  /* --------------------------------------------------------------------------
     2. MASTER RELAYOUT: TWO-COLUMN ENTERPRISE SUITE
     -------------------------------------------------------------------------- */
  .faq-master-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 3.5rem 1.5rem 2rem;
    position: relative;
    overflow: visible;
  }

  .faq-relayout-grid {
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 2.5rem;
    align-items: start;
    position: relative;
    overflow: visible;
  }

  /* --------------------------------------------------------------------------
     LEFT COLUMN: STICKY BROWSE TOPICS NAVIGATOR
     -------------------------------------------------------------------------- */
  .faq-sidebar-sticky {
    position: -webkit-sticky;
    position: sticky;
    top: 96px;
    align-self: start;
    display: flex;
    flex-direction: column;
    z-index: 25;
  }

  /* Category Navigator Panel */
  .faq-nav-card {
    background: var(--faq-card-bg);
    border: 1px solid var(--faq-border-light);
    border-radius: var(--faq-radius-lg);
    box-shadow: var(--faq-shadow-sm);
    padding: 1.5rem;
    overflow: hidden;
  }

  .faq-nav-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid rgba(47, 111, 70, 0.1);
  }

  .faq-nav-header h3 {
    font-size: 0.95rem;
    font-weight: 800;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    color: var(--faq-forest-deep);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 7px;
  }

  .faq-nav-header h3 i {
    color: var(--faq-green-brand);
  }

  .faq-nav-count-total {
    font-size: 0.75rem;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 9999px;
    background: var(--faq-mint-soft);
    color: var(--faq-green-brand);
  }

  .faq-nav-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 6px;
  }

  .faq-category-btn {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 14px;
    border-radius: var(--faq-radius-md);
    background: transparent;
    border: 1px solid transparent;
    color: var(--faq-ink-secondary);
    font-size: 0.88rem;
    font-weight: 650;
    cursor: pointer;
    transition: all 0.2s ease;
    text-align: left;
    font-family: inherit;
  }

  .faq-category-btn .cat-label {
    display: inline-flex;
    align-items: center;
    gap: 10px;
  }

  .faq-category-btn .cat-icon {
    width: 26px;
    height: 26px;
    border-radius: 6px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: var(--faq-mint-bg);
    color: var(--faq-green-brand);
    font-size: 0.75rem;
    transition: all 0.2s ease;
  }

  .faq-category-btn .cat-badge {
    font-size: 0.72rem;
    font-weight: 700;
    padding: 2px 7px;
    border-radius: 9999px;
    background: #f1f5f2;
    color: #5d7063;
    transition: all 0.2s ease;
  }

  .faq-category-btn:hover {
    background: var(--faq-mint-bg);
    color: var(--faq-green-brand);
    border-color: rgba(47, 111, 70, 0.16);
    transform: translateX(3px);
  }

  .faq-category-btn:hover .cat-icon {
    background: var(--faq-green-brand);
    color: #ffffff;
  }

  .faq-category-btn.active {
    background: var(--faq-forest-deep);
    color: #ffffff;
    border-color: var(--faq-forest-deep);
    box-shadow: 0 4px 14px rgba(19, 37, 26, 0.16);
  }

  .faq-category-btn.active .cat-icon {
    background: rgba(37, 211, 102, 0.2);
    color: var(--faq-emerald);
  }

  .faq-category-btn.active .cat-badge {
    background: rgba(255, 255, 255, 0.18);
    color: #ffffff;
  }

  /* --------------------------------------------------------------------------
     RIGHT COLUMN: DYNAMIC ACCORDION DECK
     -------------------------------------------------------------------------- */
  .faq-deck-wrapper {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
  }

  /* Top Control Strip */
  .faq-deck-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.75rem 1.25rem;
    background: #ffffff;
    border: 1px solid var(--faq-border-light);
    border-radius: var(--faq-radius-md);
    box-shadow: var(--faq-shadow-sm);
  }

  .faq-active-topic-info {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.88rem;
    font-weight: 750;
    color: var(--faq-forest-deep);
  }

  .faq-active-topic-info .topic-indicator {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--faq-emerald);
    box-shadow: 0 0 8px rgba(37, 211, 102, 0.6);
  }

  .btn-toggle-all {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--faq-mint-bg);
    border: 1px solid rgba(47, 111, 70, 0.16);
    color: var(--faq-green-brand);
    font-size: 0.78rem;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 9999px;
    cursor: pointer;
    transition: all 0.2s ease;
    font-family: inherit;
  }

  .btn-toggle-all:hover {
    background: var(--faq-mint-soft);
    color: var(--faq-green-hover);
  }

  /* Accordion Item Card */
  .faq-accordion-item {
    background: var(--faq-card-bg);
    border: 1px solid var(--faq-border-light);
    border-radius: var(--faq-radius-lg);
    box-shadow: var(--faq-shadow-sm);
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    overflow: hidden;
  }

  .faq-accordion-item:hover {
    border-color: var(--faq-border-hover);
    box-shadow: var(--faq-shadow-md);
  }

  .faq-accordion-item.is-open {
    border-color: rgba(47, 111, 70, 0.35);
    box-shadow: 0 10px 24px rgba(47, 111, 70, 0.08);
  }

  /* Question Trigger Button */
  .faq-accordion-trigger {
    width: 100%;
    padding: 1.35rem 1.6rem;
    background: transparent;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.25rem;
    text-align: left;
    font-family: inherit;
    transition: background 0.2s ease;
  }

  .faq-accordion-trigger:hover {
    background: rgba(244, 249, 245, 0.5);
  }

  .faq-trigger-content {
    flex: 1;
  }

  .faq-question-title {
    font-size: 1.1rem;
    font-weight: 750;
    color: var(--faq-forest-deep);
    line-height: 1.35;
    margin: 0;
    transition: color 0.2s ease;
  }

  .faq-accordion-item.is-open .faq-question-title {
    color: var(--faq-green-brand);
  }

  /* Circular Expand Icon */
  .faq-expand-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: var(--faq-mint-bg);
    border: 1px solid var(--faq-border-light);
    color: var(--faq-green-brand);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    flex-shrink: 0;
    margin-top: 2px;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
  }

  .faq-accordion-item:hover .faq-expand-icon {
    background: var(--faq-green-brand);
    color: #ffffff;
    border-color: var(--faq-green-brand);
  }

  .faq-accordion-item.is-open .faq-expand-icon {
    background: var(--faq-forest-deep);
    color: #ffffff;
    border-color: var(--faq-forest-deep);
    transform: rotate(180deg);
  }

  /* Expandable Answer Body */
  .faq-accordion-body {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease;
    opacity: 0;
    border-top: 1px solid transparent;
  }

  .faq-accordion-item.is-open .faq-accordion-body {
    max-height: 500px;
    opacity: 1;
    border-top-color: rgba(47, 111, 70, 0.1);
  }

  .faq-answer-inner {
    padding: 1.25rem 1.6rem 1.5rem;
    background: #fdfefd;
  }

  .faq-answer-text {
    font-size: 0.95rem;
    line-height: 1.65;
    color: var(--faq-ink-secondary);
    margin: 0 0 1.25rem;
  }

  /* Micro Feedback & Quick Action Strip */
  .faq-answer-actions {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding-top: 1rem;
    border-top: 1px dashed rgba(47, 111, 70, 0.14);
  }

  .faq-feedback-cluster {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.78rem;
    color: #647568;
  }

  .faq-feedback-btn {
    border: 1px solid var(--faq-border-light);
    background: #ffffff;
    color: var(--faq-ink-secondary);
    padding: 3px 9px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.15s ease;
  }

  .faq-feedback-btn:hover {
    background: var(--faq-mint-bg);
    color: var(--faq-green-brand);
    border-color: var(--faq-green-brand);
  }

  .faq-ask-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--faq-green-brand);
    text-decoration: none;
    transition: all 0.2s ease;
  }

  .faq-ask-link:hover {
    color: var(--faq-green-hover);
    text-decoration: underline;
  }

  /* Empty Search State */
  .faq-empty-state {
    text-align: center;
    padding: 3.5rem 1.5rem;
    background: #ffffff;
    border: 2px dashed rgba(47, 111, 70, 0.22);
    border-radius: var(--faq-radius-lg);
    display: none;
  }

  .faq-empty-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: var(--faq-mint-soft);
    color: var(--faq-green-brand);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 1rem;
  }

  .faq-empty-title {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--faq-forest-deep);
    margin: 0 0 0.5rem;
  }

  .faq-empty-sub {
    font-size: 0.92rem;
    color: var(--faq-ink-muted);
    max-width: 440px;
    margin: 0 auto 1.5rem;
    line-height: 1.5;
  }

  .btn-reset-search {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--faq-green-brand);
    color: #ffffff;
    font-size: 0.85rem;
    font-weight: 700;
    padding: 10px 18px;
    border-radius: var(--faq-radius-sm);
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .btn-reset-search:hover {
    background: var(--faq-green-hover);
  }

  /* --------------------------------------------------------------------------
     RESPONSIVE BREAKPOINTS
     -------------------------------------------------------------------------- */
  @media (max-width: 992px) {
    .faq-relayout-grid {
      grid-template-columns: 1fr;
      gap: 2rem;
    }

    .faq-sidebar-sticky {
      position: static;
    }

    .faq-nav-card {
      padding: 1.25rem;
    }

    .faq-nav-list {
      flex-direction: row;
      flex-wrap: wrap;
      gap: 6px;
    }

    .faq-category-btn {
      width: auto;
      padding: 7px 12px;
      font-size: 0.82rem;
    }
  }

  @media (max-width: 640px) {
    .faq-hero-section {
      padding: 3.5rem 1rem 2.5rem;
    }

    .faq-hero-search-box {
      padding: 4px 6px 4px 16px;
    }

    .faq-accordion-trigger {
      padding: 1.15rem 1.25rem;
    }

    .faq-question-title {
      font-size: 1rem;
    }

    .faq-answer-inner {
      padding: 1rem 1.25rem 1.25rem;
    }
  }
</style>
@endpush

@section('content')
<main class="faq-redesign-wrap">

  {{-- =========================================================================
       0. TOP TICKER RIBBON
       ========================================================================= --}}
  <div class="faq-top-ribbon" aria-hidden="true">
    <div class="ribbon-track">
      <span>KNOWLEDGE BASE</span><span class="divider">✦</span>
      <span>CERTIFIED ITAD</span><span class="divider">✦</span>
      <span>NIST 800-88 SANITIZATION</span><span class="divider">✦</span>
      <span>DATA SECURITY</span><span class="divider">✦</span>
      <span>HARDWARE REMARKETING</span><span class="divider">✦</span>
      <span>ZERO-LANDFILL RECYCLING</span><span class="divider">✦</span>
      <span>DATA CENTER DECOMMISSIONING</span><span class="divider">✦</span>
      <span>R2V3 &amp; ISO CERTIFIED</span><span class="divider">✦</span>
      <span>KNOWLEDGE BASE</span><span class="divider">✦</span>
      <span>CERTIFIED ITAD</span><span class="divider">✦</span>
      <span>NIST 800-88 SANITIZATION</span><span class="divider">✦</span>
      <span>DATA SECURITY</span><span class="divider">✦</span>
      <span>HARDWARE REMARKETING</span><span class="divider">✦</span>
      <span>ZERO-LANDFILL RECYCLING</span><span class="divider">✦</span>
      <span>DATA CENTER DECOMMISSIONING</span><span class="divider">✦</span>
      <span>R2V3 &amp; ISO CERTIFIED</span><span class="divider">✦</span>
    </div>
  </div>

  {{-- =========================================================================
       1. HERO SECTION: EDITORIAL INTRODUCTION & LIVE SEARCH
       ========================================================================= --}}
  <header class="faq-hero-section">
    <div class="faq-hero-inner">
      <div class="faq-hero-eyebrow">
        <i class="fa-solid fa-circle-question" aria-hidden="true"></i>
        <span>Help Center &amp; Knowledge Base</span>
      </div>

      <h1 class="faq-hero-title">
        Frequently Asked <span class="title-accent">Questions</span>
      </h1>

      <p class="faq-hero-sub">
        Clear, verified guidance on enterprise IT asset disposition (ITAD), certified NIST 800-88 data destruction, secondary market hardware remarketing, and global environmental standards.
      </p>

      {{-- Integrated Live Search Input --}}
      <div class="faq-hero-search-box">
        <i class="fa-solid fa-magnifying-glass search-icon" aria-hidden="true"></i>
        <input type="text" 
               id="faqHeroSearch" 
               class="faq-hero-search-input" 
               placeholder="Search FAQs (e.g. data destruction, remarketing, audit, data centers)..." 
               aria-label="Search FAQs">
        <button type="button" id="faqClearSearch" class="faq-search-clear-btn" aria-label="Clear search">
          <i class="fa-solid fa-xmark"></i>
        </button>
        <span class="faq-search-counter-badge" id="faqCounterBadge">
          {{ $faqs->count() }} Answers
        </span>
      </div>

      {{-- Trust Badges --}}
      <div class="faq-hero-badges">
        <span class="faq-mini-pill">
          <i class="fa-solid fa-shield-halved" aria-hidden="true"></i> NIST 800-88 Rev 1 Compliant
        </span>
        <span class="faq-mini-pill">
          <i class="fa-solid fa-certificate" aria-hidden="true"></i> R2V3 &amp; ISO Certified
        </span>
        <span class="faq-mini-pill">
          <i class="fa-solid fa-bolt" aria-hidden="true"></i> 24-Hour Response Guarantee
        </span>
      </div>
    </div>
  </header>

  {{-- =========================================================================
       2. MASTER TWO-COLUMN RELAYOUT (STICKY NAV & ACCORDION DECK)
       ========================================================================= --}}
  <div class="faq-master-container">
    <div class="faq-relayout-grid">

      {{-- LEFT COLUMN: STICKY TOPIC NAVIGATOR & CONSULTATION HUB --}}
      <aside class="faq-sidebar-sticky">

        {{-- Browse by Category Card --}}
        <div class="faq-nav-card">
          <div class="faq-nav-header">
            <h3><i class="fa-solid fa-layer-group"></i> Browse Topics</h3>
            <span class="faq-nav-count-total">{{ $faqs->count() }}</span>
          </div>

          <ul class="faq-nav-list" role="tablist">
            <li>
              <button type="button" class="faq-category-btn active" data-category="all">
                <span class="cat-label">
                  <span class="cat-icon"><i class="fa-solid fa-globe"></i></span>
                  <span>All Questions</span>
                </span>
                <span class="cat-badge">{{ $faqs->count() }}</span>
              </button>
            </li>

            @foreach($categories as $category)
              @php
                $catSlug = Str::slug($category);
                $catCount = $faqs->where('category', $category)->count();
                $iconClass = match($category) {
                  'General IT & Services' => 'fa-solid fa-laptop-code',
                  'Digital Marketing & SEO' => 'fa-solid fa-magnifying-glass-chart',
                  'Web & App Development' => 'fa-solid fa-code',
                  'Custom CRM & SaaS Architecture' => 'fa-solid fa-cloud',
                  'Enterprise ITAD & Lifecycle' => 'fa-solid fa-server',
                  'Data Security & Sanitization' => 'fa-solid fa-shield-halved',
                  'Data Centers & Infrastructure' => 'fa-solid fa-network-wired',
                  'Compliance, ESG & Sustainability' => 'fa-solid fa-leaf',
                  default => 'fa-solid fa-tag'
                };
              @endphp
              <li>
                <button type="button" class="faq-category-btn" data-category="{{ $catSlug }}">
                  <span class="cat-label">
                    <span class="cat-icon"><i class="{{ $iconClass }}"></i></span>
                    <span>{{ $category }}</span>
                  </span>
                  <span class="cat-badge">{{ $catCount }}</span>
                </button>
              </li>
            @endforeach
          </ul>
        </div>

      </aside>

      {{-- RIGHT COLUMN: INTERACTIVE ACCORDION DECK --}}
      <section class="faq-deck-wrapper" id="faqDeck">

        {{-- Toolbar Strip --}}
        <div class="faq-deck-toolbar">
          <div class="faq-active-topic-info">
            <span class="topic-indicator"></span>
            <span id="faqActiveTopicLabel">All Questions ({{ $faqs->count() }})</span>
          </div>
          <button type="button" id="btnToggleAllFaqs" class="btn-toggle-all">
            <span id="btnToggleAllText">Expand All</span>
            <i class="fa-solid fa-chevron-down" id="btnToggleAllIcon"></i>
          </button>
        </div>

        {{-- Dynamic Accordion Items --}}
        @forelse($faqs as $index => $faq)
          @php
            $catSlug = Str::slug($faq->category ?? 'general');
            $searchBlob = strtolower($faq->question . ' ' . $faq->answer . ' ' . ($faq->category ?? '') . ' ' . ($faq->subcategory ?? ''));
            // Open the first item by default for immediate visual feedback
            $isOpenDefault = $index === 0;
          @endphp
          <article class="faq-accordion-item {{ $isOpenDefault ? 'is-open' : '' }}" 
                   data-category="{{ $catSlug }}" 
                   data-search="{{ $searchBlob }}">

            <button type="button" class="faq-accordion-trigger" aria-expanded="{{ $isOpenDefault ? 'true' : 'false' }}">
              <div class="faq-trigger-content">
                <h3 class="faq-question-title">{{ $faq->question }}</h3>
              </div>

              <span class="faq-expand-icon" aria-hidden="true">
                <i class="fa-solid fa-chevron-down"></i>
              </span>
            </button>

            <div class="faq-accordion-body" style="{{ $isOpenDefault ? 'max-height: 500px; opacity: 1;' : '' }}">
              <div class="faq-answer-inner">
                <p class="faq-answer-text">{!! nl2br(e($faq->answer)) !!}</p>

                <div class="faq-answer-actions">
                  <div class="faq-feedback-cluster">
                    <span>Was this answer helpful?</span>
                    <button type="button" class="faq-feedback-btn" onclick="this.innerHTML='✓ Thank you!'; this.style.borderColor='var(--faq-green-brand)';">
                      <i class="fa-regular fa-thumbs-up"></i> Yes
                    </button>
                    <button type="button" class="faq-feedback-btn" onclick="this.innerHTML='Noted';">
                      <i class="fa-regular fa-thumbs-down"></i> No
                    </button>
                  </div>

                  <a href="{{ route('contact.page') }}#contact" class="faq-ask-link contact-page-link">
                    <span>Discuss this topic with our team</span>
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>

          </article>
        @empty
          <div class="faq-empty-state" style="display: block;">
            <div class="faq-empty-icon"><i class="fa-regular fa-circle-question"></i></div>
            <h3 class="faq-empty-title">No FAQs Available Right Now</h3>
            <p class="faq-empty-sub">Our team is updating the knowledge base. Have a specific enterprise question?</p>
            <a href="{{ route('contact.page') }}#contact" class="btn-faq-ask contact-page-link" style="display: inline-flex;">
              Contact Support
            </a>
          </div>
        @endforelse

        {{-- No Search Results Fallback --}}
        <div class="faq-empty-state" id="faqNoResultsState">
          <div class="faq-empty-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
          <h3 class="faq-empty-title">No Matching Answers Found</h3>
          <p class="faq-empty-sub" id="faqNoResultsText">
            We couldn't find an answer matching your search. Try different terms or speak directly with our team.
          </p>
          <button type="button" id="btnResetSearch" class="btn-reset-search">
            <i class="fa-solid fa-rotate-left"></i>
            <span>Reset Search &amp; Show All</span>
          </button>
        </div>

      </section>

    </div>
  </div>

</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const categoryBtns = document.querySelectorAll('.faq-category-btn');
  const accordionItems = document.querySelectorAll('.faq-accordion-item');
  const searchInput = document.getElementById('faqHeroSearch');
  const clearSearchBtn = document.getElementById('faqClearSearch');
  const counterBadge = document.getElementById('faqCounterBadge');
  const activeTopicLabel = document.getElementById('faqActiveTopicLabel');
  const noResultsState = document.getElementById('faqNoResultsState');
  const noResultsText = document.getElementById('faqNoResultsText');
  const btnResetSearch = document.getElementById('btnResetSearch');
  const btnToggleAll = document.getElementById('btnToggleAllFaqs');
  const btnToggleAllText = document.getElementById('btnToggleAllText');
  const btnToggleAllIcon = document.getElementById('btnToggleAllIcon');

  let currentCategory = 'all';
  let allExpanded = false;

  // 1. Accordion Click Toggle
  accordionItems.forEach(item => {
    const trigger = item.querySelector('.faq-accordion-trigger');
    const body = item.querySelector('.faq-accordion-body');

    if (trigger && body) {
      trigger.addEventListener('click', function(e) {
        e.preventDefault();
        const isOpen = item.classList.contains('is-open');

        if (isOpen) {
          item.classList.remove('is-open');
          trigger.setAttribute('aria-expanded', 'false');
          body.style.maxHeight = '0px';
          body.style.opacity = '0';
        } else {
          item.classList.add('is-open');
          trigger.setAttribute('aria-expanded', 'true');
          body.style.maxHeight = body.scrollHeight + 'px';
          body.style.opacity = '1';
        }
      });
    }
  });

  // 2. Filter & Search Combined Logic
  function applyFilterAndSearch() {
    const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
    let visibleCount = 0;

    if (clearSearchBtn) {
      clearSearchBtn.style.display = query.length > 0 ? 'inline-flex' : 'none';
    }

    accordionItems.forEach(item => {
      const itemCat = item.getAttribute('data-category');
      const searchBlob = item.getAttribute('data-search') || '';

      const matchesCat = (currentCategory === 'all') || (itemCat === currentCategory);
      const matchesSearch = query === '' || searchBlob.includes(query);

      if (matchesCat && matchesSearch) {
        item.style.display = 'block';
        visibleCount++;
      } else {
        item.style.display = 'none';
      }
    });

    // Update Counter Badge
    if (counterBadge) {
      counterBadge.textContent = `${visibleCount} ${visibleCount === 1 ? 'Answer' : 'Answers'}`;
    }

    // Update Toolbar Active Topic Label
    if (activeTopicLabel) {
      if (query !== '') {
        activeTopicLabel.textContent = `Search results for "${query}" (${visibleCount})`;
      } else if (currentCategory === 'all') {
        activeTopicLabel.textContent = `All Questions (${visibleCount})`;
      } else {
        const activeBtn = document.querySelector(`.faq-category-btn[data-category="${currentCategory}"]`);
        const catName = activeBtn ? activeBtn.querySelector('.cat-label span:last-child').textContent.trim() : 'Topic';
        activeTopicLabel.textContent = `${catName} (${visibleCount})`;
      }
    }

    // Show/Hide Empty State
    if (noResultsState) {
      if (visibleCount === 0 && accordionItems.length > 0) {
        noResultsState.style.display = 'block';
        if (noResultsText && query) {
          noResultsText.textContent = `No answers matched "${query}" in this category. Try another keyword or reset the search.`;
        }
      } else {
        noResultsState.style.display = 'none';
      }
    }
  }

  // 3. Category Button Click
  categoryBtns.forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      categoryBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      currentCategory = this.getAttribute('data-category') || 'all';
      applyFilterAndSearch();

      const deck = document.getElementById('faqDeck');
      if (deck) {
        const deckTop = deck.getBoundingClientRect().top + window.pageYOffset - 110;
        if (window.pageYOffset > deckTop) {
          if (window.retroLenis) {
            window.retroLenis.scrollTo(deckTop, { lerp: 0.08 });
          } else {
            window.scrollTo({ top: deckTop, behavior: 'smooth' });
          }
        }
      }
    });
  });

  // 4. Live Search Input
  if (searchInput) {
    searchInput.addEventListener('input', applyFilterAndSearch);
  }

  if (clearSearchBtn) {
    clearSearchBtn.addEventListener('click', function() {
      searchInput.value = '';
      applyFilterAndSearch();
      searchInput.focus();
    });
  }

  if (btnResetSearch) {
    btnResetSearch.addEventListener('click', function() {
      if (searchInput) searchInput.value = '';
      currentCategory = 'all';
      categoryBtns.forEach(b => b.classList.toggle('active', b.getAttribute('data-category') === 'all'));
      applyFilterAndSearch();
    });
  }

  // 5. Expand All / Collapse All Toggle
  if (btnToggleAll) {
    btnToggleAll.addEventListener('click', function() {
      allExpanded = !allExpanded;

      accordionItems.forEach(item => {
        if (item.style.display !== 'none') {
          const body = item.querySelector('.faq-accordion-body');
          const trigger = item.querySelector('.faq-accordion-trigger');
          if (allExpanded) {
            item.classList.add('is-open');
            if (trigger) trigger.setAttribute('aria-expanded', 'true');
            if (body) {
              body.style.maxHeight = body.scrollHeight + 50 + 'px';
              body.style.opacity = '1';
            }
          } else {
            item.classList.remove('is-open');
            if (trigger) trigger.setAttribute('aria-expanded', 'false');
            if (body) {
              body.style.maxHeight = '0px';
              body.style.opacity = '0';
            }
          }
        }
      });

      if (btnToggleAllText) {
        btnToggleAllText.textContent = allExpanded ? 'Collapse All' : 'Expand All';
      }
      if (btnToggleAllIcon) {
        btnToggleAllIcon.className = allExpanded ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down';
      }
    });
  }
});
</script>
@endpush
