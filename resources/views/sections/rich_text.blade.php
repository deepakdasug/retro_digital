<section class="seo-section seo-section-soft">
    <div class="seo-container seo-rich-wrap">
        @if(!empty($data['eyebrow']))<span class="seo-eyebrow">{{ $data['eyebrow'] }}</span>@endif
        @if(!empty($data['heading']))<h2>{{ $data['heading'] }}</h2>@endif
        @if(!empty($data['body']))<div class="seo-body">{!! nl2br(e($data['body'])) !!}</div>@endif
    </div>
</section>
