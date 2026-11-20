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
                        @php
                            $featureImage = $item['image'] ?? '';
                            $featureImageUrl = !$featureImage ? '' : (str_starts_with($featureImage, 'http') ? $featureImage : (str_starts_with($featureImage, 'assets/') || str_starts_with($featureImage, 'storage/') ? asset($featureImage) : asset('storage/' . $featureImage)));
                        @endphp
                        @if($featureImageUrl)
                            <img class="seo-feature-card-image" src="{{ $featureImageUrl }}" alt="{{ $item['title'] ?? 'Feature image' }}" loading="lazy">
                        @else
                            <span class="seo-feature-icon"><i class="{{ $item['icon'] ?? 'fa-solid fa-check' }}" aria-hidden="true"></i></span>
                        @endif
                        <h3>{{ $item['title'] ?? '' }}</h3>
                        <p>{{ $item['description'] ?? '' }}</p>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</section>
