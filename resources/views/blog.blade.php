@extends('layouts.app')

@section('title', 'Retrotech Journal - Enterprise Tech & Software Insights')
@section('description', 'Practical engineering strategies, software architecture, data security frameworks, and digital growth insights curated by Retrotech Digital architects.')
@section('canonical', route('blog'))

@push('head')
<meta name="keywords" content="IT insights, enterprise data security blog, software engineering architecture, Retrotech digital journal">

@if(isset($posts) && $posts->isNotEmpty())
@php
$blogSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Blog',
    'name' => 'The Retrotech Journal',
    'description' => 'Practical ideas on IT asset management, data security, and responsible technology lifecycle planning.',
    'url' => url('/blog'),
    'blogPost' => $posts->map(function($p) {
        return [
            '@type' => 'BlogPosting',
            'headline' => $p->title,
            'description' => $p->excerpt,
            'url' => route('blog.show', $p->slug),
            'datePublished' => $p->published_at ? $p->published_at->toIso8601String() : null,
            'author' => [
                '@type' => 'Person',
                'name' => $p->author_name ?: 'Retrotech Team',
            ],
            'image' => $p->image_url,
        ];
    })->values()->all(),
];
@endphp
<script type="application/ld+json">
{!! json_encode($blogSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endif
@endpush

@push('styles')
<style>
  /* ==========================================================================
     RETROTECH BLOG REDESIGN & EDITORIAL SYSTEM
     Theme: Modern Enterprise Editorial (Mint, Deep Forest, Clean Slate)
     ========================================================================== */
  :root {
    --blog-forest-deep: #13251a;
    --blog-forest-dark: #1b3524;
    --blog-forest-mid: #254a33;
    --blog-green-brand: #2f6f46;
    --blog-green-hover: #235837;
    --blog-green-bright: #3ea05f;
    --blog-emerald: #25d366;
    --blog-mint-soft: #eaf4eb;
    --blog-mint-bg: #f4f9f5;
    --blog-page-bg: #f8faf8;
    --blog-ink-primary: #15271d;
    --blog-ink-secondary: #314436;
    --blog-ink-muted: #5d7063;
    --blog-border-light: rgba(47, 111, 70, 0.14);
    --blog-border-hover: rgba(47, 111, 70, 0.32);
    --blog-card-bg: #ffffff;
    --blog-shadow-sm: 0 4px 16px rgba(19, 37, 26, 0.04);
    --blog-shadow-md: 0 12px 32px rgba(19, 37, 26, 0.08);
    --blog-shadow-lg: 0 20px 45px rgba(19, 37, 26, 0.12);
    --blog-radius-lg: 20px;
    --blog-radius-md: 14px;
    --blog-radius-sm: 8px;
  }

  .blog-flagship-wrap {
    background-color: var(--blog-page-bg);
    color: var(--blog-ink-primary);
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Inter", "Helvetica Neue", Arial, sans-serif;
    padding-bottom: 5rem;
    overflow-x: clip;
    overflow-y: visible;
  }

  /* --------------------------------------------------------------------------
     0. TOP TICKER RIBBON
     -------------------------------------------------------------------------- */
  .blog-top-ribbon {
    background: var(--blog-mint-soft);
    color: var(--blog-forest-deep);
    padding: 10px 0;
    border-bottom: 1px solid rgba(47, 111, 70, 0.14);
    overflow: hidden;
    white-space: nowrap;
  }

  .blog-top-ribbon .ribbon-track {
    display: inline-flex;
    align-items: center;
    gap: 32px;
    animation: blogRibbonScroll 28s linear infinite;
  }

  .blog-top-ribbon span {
    font-size: 11.5px;
    font-weight: 750;
    letter-spacing: 2px;
    text-transform: uppercase;
  }

  .blog-top-ribbon .divider {
    color: var(--blog-green-brand);
    font-size: 11px;
  }

  @keyframes blogRibbonScroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }

  /* --------------------------------------------------------------------------
     1. HERO HEADER (EDITORIAL SHOWCASE)
     -------------------------------------------------------------------------- */
  .blog-hero-section {
    position: relative;
    padding: 5rem 1.5rem 4rem;
    background: radial-gradient(circle at 50% 0%, rgba(47, 111, 70, 0.09) 0%, transparent 70%),
                linear-gradient(180deg, #f4f9f5 0%, #f8faf8 100%);
    border-bottom: 1px solid var(--blog-border-light);
    text-align: center;
  }

  .blog-hero-inner {
    max-width: 900px;
    margin: 0 auto;
  }

  .blog-hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 14px;
    border-radius: 9999px;
    background: #ffffff;
    border: 1px solid var(--blog-border-light);
    color: var(--blog-green-brand);
    font-size: 11.5px;
    font-weight: 750;
    letter-spacing: 1.4px;
    text-transform: uppercase;
    box-shadow: var(--blog-shadow-sm);
    margin-bottom: 1.25rem;
  }

  .blog-hero-eyebrow i {
    color: var(--blog-emerald);
  }

  .blog-hero-title {
    font-size: clamp(2.3rem, 5vw, 3.6rem);
    font-weight: 850;
    color: var(--blog-forest-deep);
    line-height: 1.15;
    letter-spacing: -0.035em;
    margin: 0 0 1.15rem;
  }

  .blog-hero-title .title-accent {
    color: var(--blog-green-brand);
    position: relative;
    display: inline-block;
  }

  .blog-hero-sub {
    font-size: 1.08rem;
    line-height: 1.65;
    color: var(--blog-ink-muted);
    max-width: 720px;
    margin: 0 auto 2.25rem;
  }

  .blog-hero-badges {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 12px;
  }

  .blog-hero-pill {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-size: 0.8rem;
    font-weight: 650;
    color: var(--blog-ink-secondary);
    background: #ffffff;
    border: 1px solid var(--blog-border-light);
    padding: 6px 14px;
    border-radius: 9999px;
    box-shadow: 0 2px 6px rgba(19, 37, 26, 0.04);
  }

  .blog-hero-pill i {
    color: var(--blog-green-brand);
  }

  /* --------------------------------------------------------------------------
     2. CONTAINER & EXECUTIVE FILTER SYSTEM (MATCHING DESIGN SYSTEM)
     -------------------------------------------------------------------------- */
  .blog-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 3rem 1.5rem 2rem;
  }

  .blog-filter-section {
    margin-bottom: 2.75rem;
  }

  /* Flagship Primary Capsule Dock (Strict single row, crisp proportions) */
  .blog-filter-dock {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    background: #ffffff;
    border: 1px solid var(--blog-border-light);
    border-radius: 9999px;
    padding: 7px 10px 7px 12px;
    box-shadow: 0 4px 18px rgba(19, 37, 26, 0.04);
  }

  .blog-filter-pills {
    display: flex;
    align-items: center;
    gap: 6px;
    flex-shrink: 0;
  }

  .blog-pill-btn {
    padding: 9px 20px;
    border-radius: 9999px;
    font-size: 13.5px;
    font-weight: 700;
    border: none;
    background: transparent;
    color: var(--blog-ink-secondary);
    cursor: pointer;
    transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    font-family: inherit;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
  }

  .blog-pill-btn:hover {
    background: var(--blog-mint-soft);
    color: var(--blog-green-brand);
  }

  .blog-pill-btn.active {
    background: var(--blog-green-brand);
    color: #ffffff;
    box-shadow: 0 4px 14px rgba(47, 111, 70, 0.28);
  }

  .blog-pill-btn .pill-counter {
    font-size: 11.5px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 9999px;
    background: rgba(0, 0, 0, 0.08);
    color: inherit;
    transition: all 0.2s ease;
  }

  .blog-pill-btn.active .pill-counter {
    background: rgba(255, 255, 255, 0.25);
    color: #ffffff;
  }

  .blog-search-box {
    position: relative;
    display: flex;
    align-items: center;
    flex: 0 1 310px;
    max-width: 310px;
    min-width: 200px;
  }

  .blog-search-box i.search-icon {
    position: absolute;
    left: 14px;
    color: var(--blog-ink-muted);
    font-size: 13px;
    pointer-events: none;
  }

  .blog-search-input {
    width: 100%;
    padding: 8px 34px 8px 36px;
    border-radius: 9999px;
    border: 1px solid var(--blog-border-light);
    font-size: 13px;
    background: #fbfdfb;
    color: var(--blog-forest-deep);
    outline: none;
    font-family: inherit;
    transition: all 0.2s ease;
  }

  .blog-search-input:focus {
    border-color: var(--blog-green-brand);
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(47, 111, 70, 0.12);
  }

  .blog-search-clear {
    position: absolute;
    right: 10px;
    background: none;
    border: none;
    color: var(--blog-ink-muted);
    cursor: pointer;
    font-size: 13px;
    padding: 4px;
    display: none;
    align-items: center;
    justify-content: center;
    line-height: 1;
  }

  .blog-search-clear:hover {
    color: var(--blog-forest-deep);
  }

  @media (max-width: 900px) {
    .blog-filter-dock {
      flex-direction: column;
      align-items: stretch;
      border-radius: 20px;
      padding: 12px;
      gap: 12px;
    }

    .blog-filter-pills {
      justify-content: center;
      flex-wrap: wrap;
    }

    .blog-search-box {
      max-width: 100%;
      min-width: 100%;
    }
  }

  /* --------------------------------------------------------------------------
     3. SPOTLIGHT HERO ARTICLE CARD
     -------------------------------------------------------------------------- */
  .blog-spotlight-section {
    margin-bottom: 3.5rem;
  }

  .blog-spotlight-card {
    background: var(--blog-card-bg);
    border: 1px solid var(--blog-border-light);
    border-radius: var(--blog-radius-lg);
    box-shadow: var(--blog-shadow-md);
    overflow: hidden;
    display: grid;
    grid-template-columns: 1.15fr 1fr;
    gap: 0;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
  }

  .blog-spotlight-card:hover {
    border-color: var(--blog-border-hover);
    box-shadow: var(--blog-shadow-lg);
    transform: translateY(-3px);
  }

  .spotlight-image-wrap {
    position: relative;
    overflow: hidden;
    background: #112015;
    min-height: 380px;
  }

  .spotlight-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
  }

  .blog-spotlight-card:hover .spotlight-image {
    transform: scale(1.04);
  }

  .spotlight-badge-overlay {
    position: absolute;
    top: 18px;
    left: 18px;
    display: flex;
    gap: 8px;
    z-index: 2;
  }

  .badge-spotlight-cat {
    background: rgba(19, 37, 26, 0.82);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    color: #ffffff;
    padding: 5px 12px;
    border-radius: 9999px;
    font-size: 11px;
    font-weight: 750;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    border: 1px solid rgba(255, 255, 255, 0.2);
  }

  .badge-spotlight-featured {
    background: rgba(37, 211, 102, 0.9);
    color: #0b2214;
    padding: 5px 12px;
    border-radius: 9999px;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.8px;
    text-transform: uppercase;
  }

  .spotlight-content {
    padding: 2.75rem 2.5rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .spotlight-meta-row {
    display: flex;
    align-items: center;
    gap: 14px;
    font-size: 12.5px;
    color: var(--blog-ink-muted);
    margin-bottom: 1.25rem;
  }

  .spotlight-meta-row span {
    display: inline-flex;
    align-items: center;
    gap: 5px;
  }

  .spotlight-meta-row .read-time {
    color: var(--blog-green-brand);
    font-weight: 700;
    background: var(--blog-mint-soft);
    padding: 3px 9px;
    border-radius: 9999px;
  }

  .spotlight-title {
    font-size: clamp(1.6rem, 2.6vw, 2.1rem);
    font-weight: 850;
    color: var(--blog-forest-deep);
    line-height: 1.25;
    margin: 0 0 1.15rem;
    letter-spacing: -0.025em;
  }

  .spotlight-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.2s ease;
  }

  .spotlight-title a:hover {
    color: var(--blog-green-brand);
  }

  .spotlight-excerpt {
    font-size: 1rem;
    line-height: 1.65;
    color: var(--blog-ink-secondary);
    margin: 0 0 1.75rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .spotlight-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    margin-top: auto;
    padding-top: 1.25rem;
    border-top: 1px solid rgba(47, 111, 70, 0.1);
  }

  .spotlight-author {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .author-crest {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--blog-mint-soft);
    border: 1px solid var(--blog-border-light);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--blog-green-brand);
    font-weight: 800;
    font-size: 14px;
    flex-shrink: 0;
  }

  .author-info strong {
    display: block;
    font-size: 13px;
    color: var(--blog-forest-deep);
    line-height: 1.2;
  }

  .author-info small {
    display: block;
    font-size: 11px;
    color: var(--blog-ink-muted);
  }

  .btn-spotlight-read {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--blog-green-brand);
    color: #ffffff;
    font-size: 0.88rem;
    font-weight: 700;
    padding: 10px 20px;
    border-radius: var(--blog-radius-sm);
    text-decoration: none;
    transition: all 0.2s ease;
    box-shadow: 0 4px 14px rgba(47, 111, 70, 0.25);
    flex-shrink: 0;
  }

  .btn-spotlight-read:hover {
    background: var(--blog-green-hover);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(47, 111, 70, 0.35);
  }

  @media (max-width: 900px) {
    .blog-spotlight-card {
      grid-template-columns: 1fr;
    }
    .spotlight-image-wrap {
      min-height: 250px;
      max-height: 300px;
    }
    .spotlight-content {
      padding: 1.75rem 1.5rem;
    }
  }

  /* --------------------------------------------------------------------------
     4. EDITORIAL CARDS GRID (3-COLUMN RESPONSIVE)
     -------------------------------------------------------------------------- */
  .blog-grid-section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.75rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid var(--blog-border-light);
  }

  .blog-grid-heading {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--blog-forest-deep);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .blog-grid-heading i {
    color: var(--blog-green-brand);
  }

  .blog-grid-count {
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--blog-green-brand);
    background: var(--blog-mint-soft);
    padding: 3px 10px;
    border-radius: 9999px;
  }

  .blog-articles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2rem;
  }

  @media (max-width: 768px) {
    .blog-articles-grid {
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }
  }

  .blog-card-item {
    background: var(--blog-card-bg);
    border: 1px solid var(--blog-border-light);
    border-radius: var(--blog-radius-lg);
    box-shadow: var(--blog-shadow-sm);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
  }

  .blog-card-item:hover {
    border-color: var(--blog-border-hover);
    box-shadow: var(--blog-shadow-md);
    transform: translateY(-4px);
  }

  .blog-card-thumb-wrap {
    position: relative;
    width: 100%;
    height: 220px;
    overflow: hidden;
    background: #112015;
  }

  .blog-card-thumb {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
  }

  .blog-card-item:hover .blog-card-thumb {
    transform: scale(1.05);
  }

  .blog-card-badge-top {
    position: absolute;
    top: 14px;
    left: 14px;
    z-index: 2;
  }

  .blog-card-cat-badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 9999px;
    background: rgba(19, 37, 26, 0.85);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    color: #ffffff;
    font-size: 10.5px;
    font-weight: 750;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    border: 1px solid rgba(255, 255, 255, 0.2);
  }

  .blog-card-readtime-badge {
    position: absolute;
    top: 14px;
    right: 14px;
    z-index: 2;
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    color: var(--blog-forest-deep);
    padding: 3px 9px;
    border-radius: 9999px;
    font-size: 11px;
    font-weight: 750;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
  }

  .blog-card-body {
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    flex: 1;
  }

  .blog-card-meta {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 12px;
    color: var(--blog-ink-muted);
    margin-bottom: 0.85rem;
  }

  .blog-card-meta span {
    display: inline-flex;
    align-items: center;
    gap: 4px;
  }

  .blog-card-title {
    font-size: 1.18rem;
    font-weight: 750;
    color: var(--blog-forest-deep);
    line-height: 1.35;
    margin: 0 0 0.85rem;
    letter-spacing: -0.02em;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .blog-card-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.2s ease;
  }

  .blog-card-title a:hover {
    color: var(--blog-green-brand);
  }

  .blog-card-excerpt {
    font-size: 0.92rem;
    line-height: 1.58;
    color: var(--blog-ink-secondary);
    margin: 0 0 1.25rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .blog-card-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 1.25rem;
  }

  .blog-tag-chip {
    font-size: 11px;
    font-weight: 650;
    color: #496351;
    background: var(--blog-mint-bg);
    padding: 2px 8px;
    border-radius: 9999px;
    border: 1px solid rgba(47, 111, 70, 0.12);
  }

  .blog-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: auto;
    padding-top: 1rem;
    border-top: 1px solid rgba(47, 111, 70, 0.1);
  }

  .card-author-name {
    font-size: 12px;
    font-weight: 650;
    color: var(--blog-ink-secondary);
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }

  .card-author-name i {
    color: var(--blog-green-brand);
    font-size: 11px;
  }

  .card-read-link {
    font-size: 12.5px;
    font-weight: 750;
    color: var(--blog-green-brand);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: all 0.2s ease;
  }

  .card-read-link i {
    transition: transform 0.2s ease;
  }

  .blog-card-item:hover .card-read-link {
    color: var(--blog-green-hover);
  }

  .blog-card-item:hover .card-read-link i {
    transform: translateX(3px);
  }

  /* --------------------------------------------------------------------------
     5. EMPTY STATE & NEWSLETTER BANNER
     -------------------------------------------------------------------------- */
  .blog-empty-state {
    text-align: center;
    padding: 4rem 1.5rem;
    background: #ffffff;
    border: 2px dashed var(--blog-border-light);
    border-radius: var(--blog-radius-lg);
    display: none;
    margin-top: 1.5rem;
  }

  .blog-empty-icon {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: var(--blog-mint-soft);
    color: var(--blog-green-brand);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    margin-bottom: 1.25rem;
  }

  .blog-empty-title {
    font-size: 1.35rem;
    font-weight: 800;
    color: var(--blog-forest-deep);
    margin: 0 0 0.5rem;
  }

  .blog-empty-sub {
    font-size: 0.95rem;
    color: var(--blog-ink-muted);
    max-width: 440px;
    margin: 0 auto 1.5rem;
    line-height: 1.55;
  }

  .btn-reset-blog-filter {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--blog-green-brand);
    color: #ffffff;
    font-size: 0.85rem;
    font-weight: 700;
    padding: 10px 20px;
    border-radius: var(--blog-radius-sm);
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .btn-reset-blog-filter:hover {
    background: var(--blog-green-hover);
  }

  /* Newsletter / Advisory Banner */
  .blog-advisory-strip {
    margin-top: 4.5rem;
    background: linear-gradient(135deg, #13251a 0%, #1c3826 100%);
    border-radius: var(--blog-radius-lg);
    padding: 3rem 2.5rem;
    color: #ffffff;
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 2rem;
    align-items: center;
    box-shadow: 0 15px 35px rgba(19, 37, 26, 0.2);
    position: relative;
    overflow: hidden;
  }

  .blog-advisory-strip::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 250px;
    height: 250px;
    background: radial-gradient(circle, rgba(37, 211, 102, 0.18) 0%, transparent 70%);
    pointer-events: none;
  }

  .advisory-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(37, 211, 102, 0.2);
    border: 1px solid rgba(37, 211, 102, 0.4);
    color: #25d366;
    font-size: 11px;
    font-weight: 750;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 4px 12px;
    border-radius: 9999px;
    margin-bottom: 1rem;
  }

  .advisory-title {
    font-size: clamp(1.6rem, 2.5vw, 2.2rem);
    font-weight: 850;
    color: #ffffff;
    line-height: 1.25;
    margin: 0 0 0.85rem;
  }

  .advisory-desc {
    font-size: 0.95rem;
    line-height: 1.6;
    color: #cad8ce;
    margin: 0;
  }

  .advisory-actions {
    display: flex;
    flex-direction: column;
    gap: 12px;
    align-items: flex-start;
    justify-content: center;
  }

  .btn-advisory-cta {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: #25d366;
    color: #0d2214;
    font-size: 0.92rem;
    font-weight: 750;
    padding: 13px 24px;
    border-radius: var(--blog-radius-sm);
    text-decoration: none;
    transition: all 0.2s ease;
    box-shadow: 0 4px 18px rgba(37, 211, 102, 0.35);
  }

  .btn-advisory-cta:hover {
    background: #1eb956;
    color: #0d2214;
    transform: translateY(-2px);
    box-shadow: 0 6px 22px rgba(37, 211, 102, 0.45);
  }

  .advisory-trust-row {
    display: flex;
    align-items: center;
    gap: 16px;
    font-size: 12px;
    color: #9ab4a1;
  }

  .advisory-trust-row span {
    display: inline-flex;
    align-items: center;
    gap: 5px;
  }

  @media (max-width: 900px) {
    .blog-advisory-strip {
      grid-template-columns: 1fr;
      padding: 2.25rem 1.5rem;
    }
  }
</style>
@endpush

@section('content')
<main class="blog-flagship-wrap">

  {{-- =========================================================================
       0. TOP TICKER RIBBON
       ========================================================================= --}}
  <div class="blog-top-ribbon" aria-hidden="true">
    <div class="ribbon-track">
      <span>CONSULTING</span><span class="divider">✦</span>
      <span>WEB DESIGN</span><span class="divider">✦</span>
      <span>DEVELOPMENT</span><span class="divider">✦</span>
      <span>MOBILE APPS</span><span class="divider">✦</span>
      <span>BRANDING</span><span class="divider">✦</span>
      <span>UI/UX DESIGN</span><span class="divider">✦</span>
      <span>DIGITAL MARKETING</span><span class="divider">✦</span>
      <span>SEO OPTIMIZATION</span><span class="divider">✦</span>
      <span>CONSULTING</span><span class="divider">✦</span>
      <span>WEB DESIGN</span><span class="divider">✦</span>
      <span>DEVELOPMENT</span><span class="divider">✦</span>
      <span>MOBILE APPS</span><span class="divider">✦</span>
      <span>BRANDING</span><span class="divider">✦</span>
    </div>
  </div>

  {{-- =========================================================================
       1. HERO SECTION (EDITORIAL KICKER & TITLE)
       ========================================================================= --}}
  <header class="blog-hero-section">
    <div class="blog-hero-inner">
      <div class="blog-hero-eyebrow">
        <i class="fa-solid fa-feather-pointed" aria-hidden="true"></i>
        <span>The Retrotech Journal &amp; Technical Insights</span>
      </div>

      <h1 class="blog-hero-title">
        Ideas, Strategy &amp; <span class="title-accent">Technical Insights</span>
      </h1>

      <p class="blog-hero-sub">
        Practical engineering deep dives, certified IT asset disposition (ITAD) blueprints, NIST 800-88 compliance, and modern software architectures curated by Retrotech Digital architects.
      </p>

      {{-- Trust / Category Strip --}}
      <div class="blog-hero-badges">
        <span class="blog-hero-pill">
          <i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Certified ITAD &amp; Security
        </span>
        <span class="blog-hero-pill">
          <i class="fa-solid fa-code" aria-hidden="true"></i> Full-Stack Engineering
        </span>
        <span class="blog-hero-pill">
          <i class="fa-solid fa-recycle" aria-hidden="true"></i> Zero-Landfill ESG
        </span>
        <span class="blog-hero-pill">
          <i class="fa-solid fa-database" aria-hidden="true"></i> 100% Dynamic Database
        </span>
      </div>
    </div>
  </header>

  {{-- =========================================================================
       2. MASTER CONTAINER: FILTER DOCK, SPOTLIGHT & EDITORIAL GRID
       ========================================================================= --}}
  <div class="blog-container">

    {{-- Quick Filter Dock & Real-Time Search Bar (Clean Single-Row Capsule Dock) --}}
    <div class="blog-filter-dock" role="navigation" aria-label="Article Pillar Filter">
      <div class="blog-filter-pills" role="tablist">
        <button type="button" class="blog-pill-btn active" data-pillar="all">
          <span>All Articles</span>
          <span class="pill-counter" id="totalPostsCounter">{{ $totalCount }}</span>
        </button>

        <button type="button" class="blog-pill-btn" data-pillar="itad">
          <span>ITAD &amp; Hardware</span>
          <span class="pill-counter">{{ $itadCount }}</span>
        </button>

        <button type="button" class="blog-pill-btn" data-pillar="software">
          <span>Software &amp; Cloud</span>
          <span class="pill-counter">{{ $softwareCount }}</span>
        </button>
      </div>

      <div class="blog-search-box">
        <i class="fa-solid fa-magnifying-glass search-icon" aria-hidden="true"></i>
        <input type="text" 
               id="liveBlogSearch" 
               class="blog-search-input" 
               placeholder="Filter articles..." 
               value="{{ $searchQuery ?? '' }}"
               aria-label="Filter articles by keyword">
        <button type="button" id="clearBlogSearch" class="blog-search-clear" aria-label="Clear search input">
          <i class="fa-solid fa-xmark" aria-hidden="true"></i>
        </button>
      </div>
    </div>

    {{-- SPOTLIGHT FEATURED ARTICLE (Top Flagship Story) --}}
    @if($featuredPost)
      @php
        $spotlightCatSlug = Str::slug($featuredPost->category ?? 'enterprise-itad');
        $spotlightSearchBlob = strtolower($featuredPost->title . ' ' . $featuredPost->excerpt . ' ' . $featuredPost->category . ' ' . $featuredPost->author_name);
      @endphp
      <section class="blog-spotlight-section blog-article-entry" 
               id="spotlightSection"
               data-category="{{ $spotlightCatSlug }}"
               data-pillar="{{ $featuredPost->pillar ?? 'itad' }}"
               data-search="{{ $spotlightSearchBlob }}">
        
        <article class="blog-spotlight-card">
          <div class="spotlight-image-wrap">
            <div class="spotlight-badge-overlay">
              <span class="badge-spotlight-cat">{{ $featuredPost->category ?: 'Enterprise ITAD' }}</span>
              <span class="badge-spotlight-featured"><i class="fa-solid fa-star"></i> Featured</span>
            </div>
            <a href="{{ route('blog.show', $featuredPost->slug) }}" style="display: block; width: 100%; height: 100%;">
              <img src="{{ $featuredPost->image_url }}" alt="{{ $featuredPost->title }}" class="spotlight-image">
            </a>
          </div>

          <div class="spotlight-content">
            <div class="spotlight-meta-row">
              @if($featuredPost->published_at)
                <span><i class="fa-regular fa-calendar"></i> {{ $featuredPost->published_at->format('M d, Y') }}</span>
              @endif
              @if($featuredPost->reading_time)
                <span class="read-time"><i class="fa-regular fa-clock"></i> {{ $featuredPost->reading_time }} min read</span>
              @endif
            </div>

            <h2 class="spotlight-title">
              <a href="{{ route('blog.show', $featuredPost->slug) }}">{{ $featuredPost->title }}</a>
            </h2>

            <p class="spotlight-excerpt">{{ $featuredPost->excerpt }}</p>

            <div class="spotlight-footer">
              <div class="spotlight-author">
                <div class="author-crest">
                  {{ strtoupper(substr($featuredPost->author_name ?: 'R', 0, 1)) }}
                </div>
                <div class="author-info">
                  <strong>{{ $featuredPost->author_name ?: 'Retrotech Team' }}</strong>
                  <small>{{ $featuredPost->author_designation ?: 'Infrastructure Architect' }}</small>
                </div>
              </div>

              <a href="{{ route('blog.show', $featuredPost->slug) }}" class="btn-spotlight-read">
                <span>Read Full Story</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </article>
      </section>
    @endif

    {{-- EDITORIAL GRID OF ALL REMAINING POSTS --}}
    <section class="blog-grid-section" id="blogGridSection">
      <div class="blog-grid-section-header">
        <h3 class="blog-grid-heading">
          <i class="fa-solid fa-layer-group"></i> Latest Articles &amp; Insights
        </h3>
        <span class="blog-grid-count" id="activeArticleCountDisplay">Showing {{ $posts->count() }} of {{ $posts->count() }} Stories</span>
      </div>

      <div class="blog-articles-grid" id="blogArticlesGrid">
        @forelse($posts as $index => $post)
          @php
            $catSlug = Str::slug($post->category ?? 'general');
            $searchBlob = strtolower($post->title . ' ' . $post->excerpt . ' ' . ($post->category ?? '') . ' ' . ($post->author_name ?? ''));
            $tags = is_array($post->tags) ? $post->tags : [];
          @endphp
          <article class="blog-card-item blog-article-entry" 
                   data-category="{{ $catSlug }}"
                   data-pillar="{{ $post->pillar ?? 'itad' }}"
                   data-search="{{ $searchBlob }}">

            <div class="blog-card-thumb-wrap">
              <span class="blog-card-badge-top">
                <span class="blog-card-cat-badge">{{ $post->category ?: 'Insights' }}</span>
              </span>
              @if($post->reading_time)
                <span class="blog-card-readtime-badge">
                  <i class="fa-regular fa-clock"></i> {{ $post->reading_time }} min
                </span>
              @endif
              <a href="{{ route('blog.show', $post->slug) }}" style="display: block; width: 100%; height: 100%;">
                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="blog-card-thumb" loading="lazy">
              </a>
            </div>

            <div class="blog-card-body">
              <div class="blog-card-meta">
                @if($post->published_at)
                  <span><i class="fa-regular fa-calendar"></i> {{ $post->published_at->format('M d, Y') }}</span>
                @endif
              </div>

              <h4 class="blog-card-title">
                <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
              </h4>

              <p class="blog-card-excerpt">{{ $post->excerpt }}</p>

              @if(count($tags) > 0)
                <div class="blog-card-tags">
                  @foreach(array_slice($tags, 0, 3) as $tag)
                    <span class="blog-tag-chip">{{ $tag }}</span>
                  @endforeach
                </div>
              @endif

              <div class="blog-card-footer">
                <span class="card-author-name">
                  <i class="fa-solid fa-user-pen"></i> {{ $post->author_name ?: 'Retrotech' }}
                </span>
                <a href="{{ route('blog.show', $post->slug) }}" class="card-read-link">
                  <span>Read Article</span>
                  <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
              </div>
            </div>

          </article>
        @empty
          <div class="blog-empty-state" style="display: block; grid-column: 1 / -1;">
            <div class="blog-empty-icon"><i class="fa-regular fa-newspaper"></i></div>
            <h4 class="blog-empty-title">No Articles Published Yet</h4>
            <p class="blog-empty-sub">Our engineers and technical writers are currently drafting new field notes. Please check back shortly.</p>
          </div>
        @endforelse
      </div>

      {{-- Empty Search / Filter State --}}
      <div class="blog-empty-state" id="blogNoResultsState">
        <div class="blog-empty-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
        <h4 class="blog-empty-title">No Articles Found</h4>
        <p class="blog-empty-sub" id="blogNoResultsText">
          No articles matched your criteria. Try adjusting your keyword or resetting category filters.
        </p>
        <button type="button" id="btnResetBlogFilter" class="btn-reset-blog-filter">
          <i class="fa-solid fa-rotate-left"></i> Reset All Filters
        </button>
      </div>
    </section>

    {{-- ADVISORY / TECHNICAL CONSULTATION STRIP --}}
    <section class="blog-advisory-strip">
      <div class="advisory-content">
        <span class="advisory-badge">
          <i class="fa-solid fa-bolt"></i> Need Technical Advisory?
        </span>
        <h3 class="advisory-title">Have a Complex Enterprise IT or Software Challenge?</h3>
        <p class="advisory-desc">
          From custom SaaS multi-tenancy architectures to certified NIST 800-88 data destruction and data center decommissioning, our architects provide actionable, confidential roadmaps.
        </p>
      </div>

      <div class="advisory-actions">
        <a href="{{ route('contact.page') }}#contact" class="btn-advisory-cta">
          <span>Speak With Our Engineers</span>
          <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
        </a>
        <div class="advisory-trust-row">
          <span><i class="fa-solid fa-lock" style="color: #25d366;"></i> Strict NDA Protected</span>
          <span><i class="fa-solid fa-clock" style="color: #25d366;"></i> &lt; 2h Response</span>
        </div>
      </div>
    </section>

  </div>
</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const pillarBtns = document.querySelectorAll('.blog-pill-btn');
  const articleEntries = document.querySelectorAll('.blog-article-entry');
  const searchInput = document.getElementById('liveBlogSearch');
  const clearSearchBtn = document.getElementById('clearBlogSearch');
  const noResultsBox = document.getElementById('blogNoResultsState');
  const noResultsText = document.getElementById('blogNoResultsText');
  const resetBtn = document.getElementById('btnResetBlogFilter');
  const counterDisplay = document.getElementById('activeArticleCountDisplay');

  let activePillar = 'all';

  function applyBlogFilter() {
    const q = (searchInput ? searchInput.value : '').toLowerCase().trim();
    if (clearSearchBtn) {
      clearSearchBtn.style.display = q ? 'inline-flex' : 'none';
    }

    let visibleCount = 0;

    articleEntries.forEach(entry => {
      const entryPillar = entry.getAttribute('data-pillar') || '';
      const entrySearch = entry.getAttribute('data-search') || '';

      const matchesPillar = (activePillar === 'all') || (entryPillar === activePillar);
      const matchesSearch = (q === '') || entrySearch.includes(q);

      if (matchesPillar && matchesSearch) {
        entry.style.display = '';
        visibleCount++;
      } else {
        entry.style.display = 'none';
      }
    });

    if (counterDisplay) {
      if (q !== '') {
        counterDisplay.textContent = `Showing ${visibleCount} result${visibleCount === 1 ? '' : 's'} for "${q}"`;
      } else if (activePillar !== 'all') {
        counterDisplay.textContent = `Showing ${visibleCount} Stories in selected division`;
      } else {
        counterDisplay.textContent = `Showing all ${visibleCount} Stories`;
      }
    }

    // Toggle Empty State
    if (noResultsBox) {
      if (visibleCount === 0) {
        noResultsBox.style.display = 'block';
        if (noResultsText) {
          if (q) {
            noResultsText.textContent = `No articles found matching "${q}". Try another keyword or reset filters.`;
          } else {
            noResultsText.textContent = 'No articles match the chosen division. Reset filters to see all articles.';
          }
        }
      } else {
        noResultsBox.style.display = 'none';
      }
    }
  }

  // Pillar button click handlers
  pillarBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      pillarBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      activePillar = this.getAttribute('data-pillar') || 'all';
      applyBlogFilter();
    });
  });

  // Search input handlers
  if (searchInput) {
    searchInput.addEventListener('input', applyBlogFilter);
  }

  if (clearSearchBtn) {
    clearSearchBtn.addEventListener('click', function() {
      if (searchInput) {
        searchInput.value = '';
        searchInput.focus();
      }
      applyBlogFilter();
    });
  }

  // Reset button in empty state
  if (resetBtn) {
    resetBtn.addEventListener('click', function() {
      if (searchInput) searchInput.value = '';
      activePillar = 'all';

      pillarBtns.forEach(b => b.classList.toggle('active', b.getAttribute('data-pillar') === 'all'));
      applyBlogFilter();
    });
  }
});
</script>
@endpush
