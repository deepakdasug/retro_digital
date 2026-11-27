@props(['photo', 'fallback', 'alt', 'sizes' => '(max-width: 600px) 90vw, (max-width: 1050px) 45vw, 420px'])
@php($url = 'https://images.unsplash.com/photo-' . $photo . '?auto=format&fit=crop&q=78&w=')
<img src="{{ $url }}800"
     srcset="{{ $url }}480 480w, {{ $url }}800 800w, {{ $url }}1280 1280w"
     sizes="{{ $sizes }}" alt="{{ $alt }}" loading="lazy" decoding="async"
     data-fallback="{{ asset('assets/images/' . $fallback) }}"
     onerror="this.onerror = null; this.removeAttribute('srcset'); this.src = this.dataset.fallback"
     {{ $attributes }}>
