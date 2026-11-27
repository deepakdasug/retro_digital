@php
    $backgroundImage = $data['background_image'] ?? '';
    $backgroundImageUrl = !$backgroundImage ? '' : (str_starts_with($backgroundImage, 'http') ? $backgroundImage : (str_starts_with($backgroundImage, 'assets/') || str_starts_with($backgroundImage, 'storage/') ? asset($backgroundImage) : asset('storage/' . $backgroundImage)));
@endphp
<section class="seo-cta-section">
    <div class="seo-container seo-cta-card" @if($backgroundImageUrl) style="--seo-cta-image:url('{{ $backgroundImageUrl }}')" @endif>
        <div>
            @if(!empty($data['eyebrow']))<span class="seo-eyebrow">{{ $data['eyebrow'] }}</span>@endif
            @if(!empty($data['heading']))<h2>{{ $data['heading'] }}</h2>@endif
            @if(!empty($data['description']))<p>{{ $data['description'] }}</p>@endif
        </div>
        @if(!empty($data['button_text']) && !empty($data['button_link']))
            <a class="seo-button seo-button-light" href="{{ $data['button_link'] }}">{{ $data['button_text'] }} <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        @endif
    </div>
</section>
