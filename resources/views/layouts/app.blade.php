<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  {{-- Primary SEO --}}
  <title>@yield('title', 'Retrotech Digital | 360° IT, Software & Digital Solutions')</title>
  <meta name="description" content="@yield('description', 'Retrotech Digital delivers enterprise web development, mobile apps, custom SaaS architecture, and automated WhatsApp marketing engines.')">
  <meta name="robots" content="@yield('robots', 'index, follow, max-image-preview:large')">
  <link rel="canonical" href="@yield('canonical', url()->current())">

  {{-- Open Graph / Facebook / LinkedIn / WhatsApp --}}
  <meta property="og:site_name" content="Retrotech Digital">
  <meta property="og:type" content="@yield('og_type', 'website')">
  <meta property="og:url" content="@yield('canonical', url()->current())">
  <meta property="og:title" content="@yield('title', 'Retrotech Digital | 360° IT, Software & Digital Solutions')">
  <meta property="og:description" content="@yield('description', 'Retrotech Digital delivers enterprise web development, mobile apps, custom SaaS architecture, and automated WhatsApp marketing engines.')">
  <meta property="og:image" content="@yield('og_image', asset('assets/images/logo.png'))">
  <meta property="og:locale" content="en_US">

  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="@yield('canonical', url()->current())">
  <meta name="twitter:title" content="@yield('title', 'Retrotech Digital | 360° IT, Software & Digital Solutions')">
  <meta name="twitter:description" content="@yield('description', 'Retrotech Digital delivers enterprise web development, mobile apps, custom SaaS architecture, and automated WhatsApp marketing engines.')">
  <meta name="twitter:image" content="@yield('og_image', asset('assets/images/logo.png'))">

  {{-- Icons --}}
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/icon.ico') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/retrotech-mark.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/retrotech-mark.png') }}">

  {{-- Fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ file_exists(public_path('css/style.css')) ? filemtime(public_path('css/style.css')) : '1.0' }}">
  <link rel="stylesheet" href="{{ asset('vendor/lenis/lenis.css') }}?v={{ file_exists(public_path('vendor/lenis/lenis.css')) ? filemtime(public_path('vendor/lenis/lenis.css')) : '1.0' }}">

  {{-- page-specific extras (JSON-LD, preloads, per-page <style>) --}}
  @stack('head')
  @stack('styles')
</head>

<body class="{{ request()->routeIs('home') ? 'home-page' : 'inner-page' }}">
  <div class="scroll-progress-bar" id="scrollProgressBar" aria-hidden="true"></div>

  @if (request()->routeIs('home'))
    @include('partials.hero-video')
  @endif
  @unless (request()->routeIs('admin.*'))
    @include('partials.header')
    @include('partials.mobile-drawer')
  @endunless

  @yield('content')

  @unless (request()->routeIs('admin.*'))
    @include('partials.contact-section')
    @include('partials.footer')
    @include('partials.whatsapp-widget')
  @endunless

  <script src="{{ asset('vendor/lenis/lenis.min.js') }}?v={{ file_exists(public_path('vendor/lenis/lenis.min.js')) ? filemtime(public_path('vendor/lenis/lenis.min.js')) : '1.0' }}"></script>
  <script>
    (function () {
      if (!window.Lenis || window.retroLenis) return;
      if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
      window.retroLenis = new window.Lenis({
        autoRaf: true,
        duration: 1.1,
        easing: function (time) { return 1 - Math.pow(1 - time, 3); },
        wheelMultiplier: 1.0,
        touchMultiplier: 1.0,
        smoothWheel: true,
        syncTouch: false,
        anchors: false,
        allowNestedScroll: true,
        stopInertiaOnNavigate: true
      });
    })();
  </script>
  @unless (request()->routeIs('admin.*'))
    <script src="{{ asset('js/main.js') }}?v={{ file_exists(public_path('js/main.js')) ? filemtime(public_path('js/main.js')) : '1.0' }}"></script>
  @endunless

  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  @stack('scripts')
</body>

</html>