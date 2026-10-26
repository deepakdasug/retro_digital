@extends('layouts.app')

@section('title', 'Retrotech Blogs & Insights')
@section('description', 'Practical ideas on IT asset management, data security, and responsible technology lifecycle planning.')

@section('content')
<main class="blog-page">
  <section class="blog-intro">
    <div class="blog-shell">
      <span class="blog-eyebrow">THE RETROTECH JOURNAL</span>
      <h1>Ideas for managing<br><span>technology better.</span></h1>
      <div class="blog-intro-bottom">
        <p>Sample field notes on retiring business technology, protecting information, and planning a responsible next step for IT assets.</p>
        <a class="blog-contact-link" href="{{ route('contact.page') }}#contact">Talk with Retrotech <span aria-hidden="true">↗</span></a>
      </div>
    </div>
  </section>

  <section class="blog-articles" aria-labelledby="blog-articles-title">
    <div class="blog-shell">
      
      <div class="blog-section-heading">
        <div>
          <span class="blog-eyebrow">THE LATEST</span>
          <h2 id="blog-articles-title">Insights</h2>
        </div>
      </div>

      <!-- DYNAMIC BLOG POST LIST -->
      <div class="blog-article-list">
        @forelse($posts as $index => $post)
            <article class="blog-article">
              <span class="blog-article-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
              
              <div class="blog-article-copy">
                <span class="blog-article-topic">RETROTECH INSIGHTS</span>
                
                <h3>
                    <a href="{{ route('blog.show', $post->slug) }}" style="text-decoration: none; color: inherit;">
                        {{ $post->title }}
                    </a>
                </h3>
                
                <p>{{ $post->excerpt }}</p>

              </div>

              <!-- Link to read the full post -->
              <a class="blog-article-link" href="{{ route('blog.show', $post->slug) }}" aria-label="Read {{ $post->title }}">↗</a>
            </article>
        @empty
            <!-- If database is empty, show this -->
            <div style="text-align: center; padding: 40px; border: 1px dashed #ccc; border-radius: 8px; margin-top: 20px;">
                <p style="color: #666;">No blog posts have been published yet.</p>
            </div>
        @endforelse
      </div>

      <p class="blog-note">More practical ideas, coming soon.</p>
    </div>
  </section>
</main>
@endsection
