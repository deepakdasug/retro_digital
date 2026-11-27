<section class="seo-section seo-section-soft">
    <div class="seo-container seo-faq-wrap">
        <div class="seo-section-heading">
            @if(!empty($data['eyebrow']))<span class="seo-eyebrow">{{ $data['eyebrow'] }}</span>@endif
            @if(!empty($data['heading']))<h2>{{ $data['heading'] }}</h2>@endif
            @if(!empty($data['subheading']))<p>{{ $data['subheading'] }}</p>@endif
        </div>
        <div class="seo-faq-list">
            @foreach(($data['items'] ?? []) as $index => $item)
                @if(!empty($item['question']) || !empty($item['answer']))
                    <details class="seo-faq-item" @if($index === 0) open @endif>
                        <summary>{{ $item['question'] ?? '' }}<i class="fa-solid fa-plus" aria-hidden="true"></i></summary>
                        <div class="seo-faq-answer">{!! nl2br(e($item['answer'] ?? '')) !!}</div>
                    </details>
                @endif
            @endforeach
        </div>
    </div>
</section>
