@props(['page'])
@php($thumbnail = \App\Support\ServiceImage::sources($page))
<img src="{{ $thumbnail['url'] }}" alt="" width="52" height="52" loading="lazy" decoding="async"
    @if($thumbnail['url'] !== $thumbnail['fallback'])
        data-fallback="{{ $thumbnail['fallback'] }}"
        onerror="this.onerror = null; this.src = this.dataset.fallback"
    @endif
>
