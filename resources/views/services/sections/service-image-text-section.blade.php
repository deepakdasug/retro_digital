@php
    $image = $data['image'] ?? '';
    $imageUrl = !$image ? '' : (str_starts_with($image, 'http') ? $image : (str_starts_with($image, 'assets/') || str_starts_with($image, 'storage/') ? asset($image) : asset('storage/' . $image)));
@endphp
<section class="seo-section" data-reveal="split">
    <div class="seo-container seo-split {{ ($data['image_position'] ?? 'left') === 'right' ? 'seo-split-reverse' : '' }}">
        <div class="seo-split-image">
            @if($imageUrl)<img src="{{ $imageUrl }}" alt="{{ $data['image_alt'] ?? ($data['heading'] ?? 'Section image') }}" loading="lazy">@else
                <div class="seo-image-placeholder"><i class="fa-solid fa-image" aria-hidden="true"></i></div>
            @endif
        </div>
        <div class="seo-split-copy">
            <span class="seo-eyebrow">{{ $data['eyebrow'] ?? 'A better way forward' }}</span>
            @if(!empty($data['heading']))<h2>{{ $data['heading'] }}</h2>@endif
            @if(!empty($data['body']))<div class="seo-body">{!! nl2br(e($data['body'])) !!}</div>@endif
            @if(!empty($data['cta_text']) && !empty($data['cta_link']))
                <a class="seo-text-link" href="{{ $data['cta_link'] }}">{{ $data['cta_text'] }} <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            @endif
        </div>
    </div>
</section>
