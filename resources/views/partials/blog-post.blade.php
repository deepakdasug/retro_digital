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
    <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="blog-post-featured-image">
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
