@extends('layouts.app')

@section('title', $post->meta_title ?: ($post->title . ' - Retrotech Insights'))
@section('description', $post->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($post->excerpt ?: $post->content_html), 160))

@php
  $articleUrl = $post->canonical_url ?: route('blog.show', $post->slug);
  $articleImage = $post->image_url;
  $articleSchema = $post->schema_markup ?: array_filter([
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => $post->title,
    'description' => $post->meta_description ?: $post->excerpt,
    'image' => $articleImage,
    'datePublished' => $post->published_at?->toIso8601String(),
    'author' => ['@type' => 'Person', 'name' => $post->author_name],
    'mainEntityOfPage' => $articleUrl,
  ]);

  $faqSchema = ($post->faqs && $post->faqs->count() > 0) ? [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => $post->faqs->map(fn($f) => [
      '@type' => 'Question',
      'name' => $f->question,
      'acceptedAnswer' => [
        '@type' => 'Answer',
        'text' => $f->answer,
      ],
    ])->values()->all(),
  ] : null;
@endphp

@push('head')
<link rel="canonical" href="{{ $articleUrl }}">
<meta name="robots" content="{{ $post->robots_meta ?: 'index, follow' }}">
<meta property="og:type" content="article">
<meta property="og:title" content="{{ $post->meta_title ?: $post->title }}">
<meta property="og:description" content="{{ $post->meta_description ?: $post->excerpt }}">
<meta property="og:url" content="{{ $articleUrl }}">
@if($articleImage)<meta property="og:image" content="{{ $articleImage }}">@endif
<script type="application/ld+json">@json($articleSchema)</script>
@if($faqSchema)
<script type="application/ld+json">@json($faqSchema)</script>
@endif
@endpush

@section('content')
<main class="blog-post-page">
  <article class="blog-post">
    <header class="blog-post-header">
      <span class="blog-eyebrow">{{ $post->category ?: 'RETROTECH INSIGHTS' }}</span>
      <h1>{{ $post->title }}</h1>
      @if($post->excerpt)
        <p class="blog-post-excerpt">{{ $post->excerpt }}</p>
      @endif
      <div class="blog-post-meta">
        <div>
          <strong>{{ $post->author_name }}</strong>
          @if($post->author_designation)
            <span class="blog-post-author-role">{{ $post->author_designation }}</span>
          @endif
        </div>
        @if($post->published_at)
          <time datetime="{{ $post->published_at->toDateString() }}">Published on {{ $post->published_at->format('M d, Y') }}</time>
        @endif
        @if($post->reading_time)
          <span>{{ $post->reading_time }} min read</span>
        @endif
      </div>
      @if($post->tags)
        <ul class="blog-post-tags" aria-label="Article tags">
          @foreach($post->tags as $tag)
            <li>{{ $tag }}</li>
          @endforeach
        </ul>
      @endif
    </header>

    @if($post->image_url)
      <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="blog-post-featured-image" onerror="this.onerror=null; this.src='{{ asset('assets/images/tech-development/web-development.jpg') }}';">
    @endif

    <div class="blog-post-content ck-content">{!! $post->content_html !!}</div>

    @if($post->faqs && $post->faqs->count() > 0)
      <section class="blog-faqs-section" style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid #e2e8f0;">
        <h2 style="font-size: 1.5rem; font-weight: 700; color: #1a202c; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 10px;">
          <i class="fa-solid fa-circle-question" style="color: #0f766e;"></i> Frequently Asked Questions
        </h2>
        <div class="blog-faqs-list" style="display: flex; flex-direction: column; gap: 1rem;">
          @foreach($post->faqs as $faq)
            <details style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1.1rem 1.25rem;">
              <summary style="font-weight: 600; color: #1e293b; cursor: pointer; font-size: 1.05rem;">{{ $faq->question }}</summary>
              <div style="margin-top: 0.85rem; color: #475569; line-height: 1.65; white-space: pre-line; border-top: 1px dashed #e2e8f0; padding-top: 0.75rem;">{{ $faq->answer }}</div>
            </details>
          @endforeach
        </div>
      </section>
    @endif

    <footer class="blog-post-footer">
      <a href="{{ route('blog') }}">← Back to all insights</a>
    </footer>
  </article>
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/ckeditor5/ckeditor5.css') }}">
<style>
  .blog-post-content {
    margin-top: 2rem;
    font-size: 1.0625rem;
    line-height: 1.75;
    color: #2d3748;
  }
  .blog-post-content h2, .blog-post-content h3, .blog-post-content h4 {
    color: #1a202c;
    margin-top: 2rem;
    margin-bottom: 0.75rem;
    font-weight: 700;
  }
  .blog-post-content p {
    margin-bottom: 1.25rem;
  }
  .blog-post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
  }
  .blog-post-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 1.5rem 0;
  }
  .blog-post-content table th, .blog-post-content table td {
    border: 1px solid #e2e8f0;
    padding: 0.75rem 1rem;
  }
  .blog-post-content table th {
    background: #f7fafc;
    font-weight: 600;
  }
  .blog-post-content blockquote {
    border-left: 4px solid #319795;
    padding-left: 1rem;
    margin: 1.5rem 0;
    color: #4a5568;
    font-style: italic;
  }
  .blog-post-content pre {
    background: #1a202c;
    color: #f7fafc;
    padding: 1rem;
    border-radius: 6px;
    overflow-x: auto;
    margin: 1.5rem 0;
  }
  .blog-post-content .callout {
    background: #ebf8ff;
    border-left: 4px solid #3182ce;
    padding: 1rem;
    border-radius: 4px;
    margin: 1.5rem 0;
  }
  .blog-post-content .badge {
    display: inline-block;
    background: #edf2f7;
    color: #4a5568;
    padding: 0.2rem 0.6rem;
    border-radius: 9999px;
    font-size: 0.85em;
    font-weight: 600;
  }
  .blog-post-content video {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    display: block;
    margin: 1.5rem auto;
  }
  .blog-post-content .media-video {
    margin: 1.5rem 0;
    text-align: center;
  }
</style>
@endpush
