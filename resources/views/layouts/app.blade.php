<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Retrotech - Business Made Easy')</title>

  <meta name="description" content="@yield('description', 'Business Made Easy with Retrotech. Grow your business and boost revenue by engaging customers, automating messages, and selling smarter through WhatsApp marketing tools.')">
  <meta name="keywords" content="Retrotech, WhatsApp marketing, business automation, customer engagement, WhatsApp API, marketing tools">
  <meta name="author" content="Retrotech">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/lenis@1.3.26/dist/lenis.css">
  @stack('styles')
</head>
<body class="{{ request()->routeIs('home') ? 'home-page' : 'inner-page' }}">

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

  <script src="https://unpkg.com/lenis@1.3.26/dist/lenis.min.js"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  @stack('scripts')
</body>
</html>
