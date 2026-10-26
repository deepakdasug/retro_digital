@extends('layouts.app')

@section('title', $post->title . ' - Retrotech Insights')
@section('description', \Illuminate\Support\Str::limit(strip_tags($post->content_html), 160))

@section('content')
<main class="blog-post-page">
  <article class="blog-post">
    <header class="blog-post-header">
      <span class="blog-eyebrow">RETROTECH INSIGHTS</span>
      <h1>{{ $post->title }}</h1>
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
      </div>
    </header>

    @if($post->image_path)
      <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->title }}" class="blog-post-featured-image">
    @endif

    <div class="blog-post-content ck-content">{!! $post->content_html !!}</div>

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
