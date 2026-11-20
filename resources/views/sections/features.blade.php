<section class="seo-section seo-section-soft">
    <div class="seo-container">
        <div class="seo-section-heading">
            <span class="seo-eyebrow">{{ $data['eyebrow'] ?? 'Built for sustainable growth' }}</span>
            @if(!empty($data['heading']))<h2>{{ $data['heading'] }}</h2>@endif
            @if(!empty($data['subheading']))<p>{{ $data['subheading'] }}</p>@endif
        </div>
        @if(!empty($data['items']) && is_array($data['items']))
            <div class="seo-feature-grid">
                @foreach($data['items'] as $item)
                    <article class="seo-feature-card">
                        <span class="seo-feature-icon"><i class="{{ $item['icon'] ?? 'fa-solid fa-check' }}" aria-hidden="true"></i></span>
                        <h3>{{ $item['title'] ?? '' }}</h3>
                        <p>{{ $item['description'] ?? '' }}</p>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</section>
