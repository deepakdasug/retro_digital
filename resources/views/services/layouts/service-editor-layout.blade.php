<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SEO Page Editor') | Retrotech Digital</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">
    @if(($service->page_section ?? null) === 'services')
    @include('services.layouts.service-styles')
    @else
    <link rel="stylesheet" href="{{ asset('css/seo-service.css') }}?v={{ filemtime(public_path('css/seo-service.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/seo-landing.css') }}?v={{ filemtime(public_path('css/seo-landing.css')) }}">
    @endif
    @include('partials.smooth-scroll')
    @stack('styles')
</head>
<body class="seo-editor-layout">
    @yield('content')
    <script src="{{ asset('js/content-studio.js') }}?v={{ filemtime(public_path('js/content-studio.js')) }}"></script>
    <script>
        window.addEventListener('message', function(e) {
            if (e.data && e.data.type === 'resize-custom-frame' && typeof e.data.height === 'number') {
                var targetHeight = Math.ceil(e.data.height);
                document.querySelectorAll('.custom-section-frame').forEach(function(frame) {
                    if (frame.contentWindow === e.source) {
                        var currentHeight = frame.offsetHeight;
                        if (Math.abs(currentHeight - targetHeight) >= 2) {
                            frame.style.height = targetHeight + 'px';
                        }
                    }
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
