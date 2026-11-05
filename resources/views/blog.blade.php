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
                <span class="blog-article-topic">{{ $post->category ?: 'RETROTECH INSIGHTS' }}</span>
                
                <h3>
                    <a href="{{ route('blog.show', $post->slug) }}" style="text-decoration: none; color: inherit;">
                        {{ $post->title }}
                    </a>
                </h3>
                
                <p>{{ $post->excerpt }}</p>

                @if($post->image_path)
                  <div style="margin-top: 1.1rem;">
                    <a href="{{ route('blog.show', $post->slug) }}" style="display: inline-block; overflow: hidden; border-radius: 8px;">
                      <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->title }}" style="max-width: 360px; width: 100%; height: 190px; object-fit: cover; border-radius: 8px; border: 1px solid #dce5dc; display: block; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                    </a>
                  </div>
                @endif
              </div>

              <!-- Link to read the full post -->
              <a class="blog-article-link" href="{{ route('blog.show', $post->slug) }}" aria-label="Read {{ $post->title }}"><i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
            </article>
        @empty
            <!-- If database is empty, show this -->
            <div class="blog-article-empty">
                <i class="fa-regular fa-newspaper" style="font-size: 2rem; color: var(--theme-green-brand, #2f6f46); margin-bottom: 0.75rem; display: block;"></i>
                <p>No blog posts have been published yet.</p>
            </div>
        @endforelse
      </div>

      <p class="blog-note">More practical ideas, coming soon.</p>
    </div>
  </section>
</main>
@endsection
