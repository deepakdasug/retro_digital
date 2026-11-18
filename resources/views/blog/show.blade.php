@extends('layouts.app')

@php
  $articleUrl = \App\Support\SeoCanonical::resolve(
    $post->canonical_url,
    route('blog.show', $post->slug)
  );
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

@section('title', $post->meta_title ?: ($post->title . ' - Retrotech Insights'))
@section('description', $post->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($post->excerpt ?: $post->content_html), 155))
@if(!($isAdminPreview ?? false))
@section('canonical', $articleUrl)
@endif
@section('og_type', 'article')
@if($articleImage)
@section('og_image', $articleImage)
@section('og_image_alt', $post->title)
@endif
@if($isAdminPreview ?? false)
@section('robots', 'noindex, nofollow')
@elseif($post->robots_meta)
@section('robots', $post->robots_meta)
@endif

@push('head')
<script type="application/ld+json">@json($articleSchema)</script>
@if($faqSchema)
<script type="application/ld+json">@json($faqSchema)</script>
@endif
@endpush

@section('content')
@if($isAdminPreview ?? false)
  <aside class="blog-admin-preview-notice" role="status">
    Draft preview — this article is not visible to the public.
    <a href="{{ route('admin.blog.edit', $post) }}">Return to editor</a>
  </aside>
@endif
<main class="blog-post-page">
  @include('partials.blog-post', ['post' => $post])
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/blog-post.css') }}">
@if($isAdminPreview ?? false)
<style>
  .blog-admin-preview-notice { padding: 10px 20px; background: #fff4d6; color: #644b00; text-align: center; }
  .blog-admin-preview-notice a { margin-left: 8px; font-weight: 700; }
</style>
@endif
@endpush
