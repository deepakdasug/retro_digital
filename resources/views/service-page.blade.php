@extends('layouts.app')

@php
    $fallbackCanonical = route('services.show', $service->slug);
    $canonicalUrl = \App\Support\SeoCanonical::resolve($service->canonical_url, $fallbackCanonical);
    $metaDescription = \Illuminate\Support\Str::limit(
        $service->meta_description ?: ($service->short_description ?: 'Professional ' . ($service->title ?? 'Technology') . ' services by Retrotech Digital.'),
        160
    );
    $ogImage = $service->og_image ?: $service->hero_image;
    if ($ogImage && ! \Illuminate\Support\Str::startsWith($ogImage, ['http://', 'https://'])) {
        $ogImage = asset(ltrim($ogImage, '/'));
    }
    $ogImage = $ogImage ?: asset('assets/images/logo.png');
    $serviceSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $service->title,
        'description' => $metaDescription,
        'url' => $canonicalUrl,
        'provider' => ['@id' => rtrim(config('app.url'), '/') . '/#organization'],
    ];
@endphp

@section('title', $service->meta_title ?: (($service->title ?? 'Technology Service') . ' | Retrotech Digital'))
@section('description', $metaDescription)
@section('canonical', $canonicalUrl)
@section('robots', (($service->robots_index ?? true) ? 'index' : 'noindex') . ', ' . (($service->robots_follow ?? true) ? 'follow' : 'nofollow'))
@section('og_image', $ogImage)
@section('og_image_alt', ($service->title ?? 'Technology') . ' service')

@push('head')
<script type="application/ld+json">@json($serviceSchema)</script>
@endpush

@push('styles')
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      corePlugins: { preflight: false },
      theme: {
        extend: {
          colors: {
            retro: { charcoal: '#1e3326', dark: '#16281e', darkCard: '#1f382a', mid: '#334b39', muted: '#637568', green: '#397b4e', greenHover: '#285d3a', emerald: '#25d366', mint: '#eaf4eb', tint: '#f0f7f0', bg: '#f7fbf7', border: '#d7e5d9' }
          },
          fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'] }
        }
      }
    }
  </script>

  <style>
    .sp-theme-page { font-family: var(--font-family, 'Inter', system-ui, sans-serif); color: #334b39; background-color: #f7fbf7; }
    .sp-theme-page .sp-glass-card {
      background: rgba(255, 255, 255, 0.92) !important;
      border: 1px solid rgba(255, 255, 255, 0.96) !important;
      box-shadow: 0 10px 28px rgba(30, 70, 42, 0.08), inset 0 1px 0 rgba(255, 255, 255, 0.98);
      -webkit-backdrop-filter: blur(8px);
      backdrop-filter: blur(8px);
    }
    .sp-theme-page .sp-glass-card-dark {
      background: rgba(22, 48, 31, 0.92) !important;
      border-color: rgba(255, 255, 255, 0.28) !important;
      box-shadow: 0 12px 32px rgba(15, 40, 24, 0.2);
      -webkit-backdrop-filter: blur(8px);
      backdrop-filter: blur(8px);
    }
    .sp-theme-page .sp-projects-aurora {
      position: relative;
      isolation: isolate;
      overflow: hidden;
      background: #eff8f1;
    }
    .sp-theme-page .sp-projects-aurora::before {
      content: '';
      position: absolute;
      z-index: -1;
      inset: 0;
      pointer-events: none;
      background:
        radial-gradient(ellipse at 12% 22%, rgba(66, 214, 139, 0.24), transparent 48%),
        radial-gradient(ellipse at 83% 18%, rgba(90, 196, 205, 0.20), transparent 42%),
        radial-gradient(ellipse at 72% 82%, rgba(139, 133, 220, 0.16), transparent 45%),
        radial-gradient(ellipse at 24% 88%, rgba(172, 231, 160, 0.22), transparent 45%);
    }
    .sp-theme-page .sp-projects-aurora::after {
      content: '';
      position: absolute;
      z-index: 0;
      inset: 0;
      pointer-events: none;
      background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.45), transparent 75%);
    }
    .sp-theme-page .sp-projects-aurora > .container {
      position: relative;
      z-index: 1;
    }
    .sp-theme-page .sp-project-visual {
      padding: 5px;
      border: 1px solid rgba(255, 255, 255, 0.9);
      border-radius: 1.65rem;
      background: linear-gradient(135deg, #5bdc9a, #70cbd0 48%, #9a8bdf);
      box-shadow: 0 22px 48px rgba(36, 91, 63, 0.24), 0 0 32px rgba(87, 205, 160, 0.24);
    }
    .sp-theme-page .sp-project-visual img {
      border-radius: 1.35rem;
    }
    .sp-theme-page .sp-project-panel {
      padding: clamp(1.25rem, 3vw, 2rem);
      border-radius: 1.75rem;
    }
    .sp-theme-page .sp-hero-visual {
      perspective: 1100px;
    }
    .sp-theme-page .sp-hero-tilt {
      --tilt-x: 0deg;
      --tilt-y: 0deg;
      position: relative;
      transform: rotateX(var(--tilt-x)) rotateY(var(--tilt-y));
      transform-style: preserve-3d;
      transition: transform 280ms cubic-bezier(0.2, 0.75, 0.25, 1), box-shadow 280ms ease;
    }
    .sp-theme-page .sp-hero-tilt.is-tilting {
      will-change: transform;
      transition-duration: 70ms;
      box-shadow: 0 30px 65px rgba(25, 83, 45, 0.27);
    }
    .sp-theme-page .sp-hero-image {
      transform: translateZ(18px) scale(1.035);
      transition: transform 280ms ease;
    }
    .sp-theme-page .sp-hero-shade {
      transform: translateZ(24px);
    }
    .sp-theme-page .sp-hero-play {
      transform: translateZ(54px);
    }
    @media (prefers-reduced-motion: reduce) {
      .sp-theme-page .sp-hero-tilt,
      .sp-theme-page .sp-hero-image {
        transition: none;
      }
    }
    .sp-theme-page .sp-neo-section {
      background: #eaf4eb;
      border-block: 2px solid #1e3326;
    }
    .sp-theme-page .sp-neo-section .sp-neo-image {
      border: 3px solid #1e3326;
      border-radius: 1rem;
      box-shadow: 9px 9px 0 #1e3326;
    }
    .sp-theme-page .sp-neo-section .sp-neo-card {
      background: #d8eadb;
      border: 2px solid #1e3326;
      border-radius: 1rem;
      box-shadow: 6px 6px 0 #1e3326;
      transition: transform 160ms ease, box-shadow 160ms ease;
    }
    .sp-theme-page .sp-neo-section .sp-neo-card:nth-child(2n) {
      background: #f7fbf7;
    }
    .sp-theme-page .sp-neo-section .sp-neo-card:nth-child(3n) {
      background: #c8dfcc;
    }
    .sp-theme-page .sp-neo-section .sp-neo-card:hover {
      transform: translate(-3px, -3px);
      box-shadow: 9px 9px 0 #1e3326;
    }
    .sp-theme-page .sp-neo-section .sp-neo-number {
      color: #fff;
      background: #397b4e;
      border: 2px solid #1e3326;
      border-radius: 0.65rem;
      box-shadow: 3px 3px 0 #1e3326;
    }
    .sp-theme-page .sp-clay-section {
      background: linear-gradient(180deg, #f3f9f3, #eaf4eb);
    }
    .sp-theme-page .sp-clay-section .sp-clay-rating {
      background: linear-gradient(145deg, #ffffff, #e4efe5);
      border: 1px solid rgba(255, 255, 255, 0.95);
      border-radius: 1.25rem;
      box-shadow: 10px 10px 24px rgba(41, 79, 49, 0.16), -8px -8px 20px #ffffff, inset 0 2px 3px rgba(255, 255, 255, 0.9);
    }
    .sp-theme-page .sp-clay-section .sp-clay-testimonial {
      background: linear-gradient(145deg, #ffffff, #e4efe5);
      border: 1px solid rgba(255, 255, 255, 0.95);
      border-radius: 1.75rem;
      box-shadow: 12px 12px 28px rgba(41, 79, 49, 0.17), -9px -9px 22px #ffffff, inset 0 2px 4px rgba(255, 255, 255, 0.95);
    }
    .sp-theme-page .sp-clay-section .sp-clay-testimonial-dark {
      background: linear-gradient(145deg, #315c3f, #1e3326);
      border: 1px solid rgba(255, 255, 255, 0.22);
      box-shadow: 12px 12px 28px rgba(22, 51, 31, 0.3), inset 0 2px 4px rgba(255, 255, 255, 0.16);
    }
    .sp-theme-page .sp-knowledge-section {
      position: relative;
      background:
        radial-gradient(ellipse at 12% 18%, rgba(166, 230, 181, 0.35), transparent 45%),
        radial-gradient(ellipse at 88% 72%, rgba(163, 223, 202, 0.35), transparent 45%),
        #edf7ee;
    }
    .sp-theme-section-content {
      position: relative;
      z-index: 1;
    }
    .sp-theme-page .sp-knowledge-section .faq-item {
      border-radius: 1.25rem;
      transition: border-color 0.25s ease, box-shadow 0.25s ease;
    }
    .sp-theme-page .sp-knowledge-section .faq-active {
      border-radius: 1.25rem;
      background: #ffffff !important;
      border-color: #397b4e !important;
      box-shadow: 0 10px 28px rgba(39, 101, 57, 0.08);
    }
    @keyframes marqueeScroll { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
    .sp-marquee-track {
      will-change: transform;
      transform: translateZ(0);
      contain: layout paint;
    }
    .sp-animate-float { animation: floatSlow 6s ease-in-out infinite; }
    .sp-animate-float-alt { animation: floatAlt 5s ease-in-out infinite 1s; }
    .premium-input { width: 100%; padding: 0.95rem 1.25rem; background-color: #f7fbf7; border: 1.5px solid #d7e5d9; border-radius: 0.875rem; color: #1e3326; font-size: 0.95rem; transition: all 0.25s ease; outline: none; }
    .premium-input:focus { border-color: #397b4e; background-color: #ffffff; box-shadow: 0 0 0 4px rgba(57, 123, 78, 0.14); }
    .premium-input::placeholder { color: #637568; }
    .faq-content { max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
    .faq-active .faq-content { max-height: 380px; }
    .faq-active .faq-icon { transform: rotate(180deg); background-color: #397b4e !important; color: #ffffff !important; border-color: #397b4e !important; }
    .no-scrollbar { scrollbar-width: none; }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .ba-switch[aria-checked="true"] .ba-knob { transform: translateX(1.5rem); }
    #contact, #process, #pricing, #about, #projects { scroll-margin-top: 6.5rem; }
  </style>
@endpush

@section('content')

@php
    $t = $service->title ?? 'Digital Marketing';

    $svg = fn ($d, $c = 'w-5 h-5') => '<svg class="'.$c.'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="'.$d.'"></path></svg>';

    $I = [
        'check'  => 'M5 13l4 4L19 7', 'arrow'  => 'M14 5l7 7m0 0l-7 7m7-7H3', 'chev'   => 'M9 5l7 7-7 7', 'left'   => 'M15 19l-7-7 7-7',
        'phone'  => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z',
        'mail'   => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
        'chat'   => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z',
        'user'   => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
        'bolt'   => 'M13 10V3L4 14h7v7l9-11h-7z',
        'pen'    => 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z',
        'chart'  => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
        'list'   => 'M4 6h16M4 12h16M4 18h16',
        'pin'    => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z',
        'clock'  => 'M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z',
        'shield' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
    ];

    // Dynamic data — every array below comes from MySQL
    $content   = $service->content ?? [];
    $hero      = $content['hero']      ?? [];
    $topics    = $content['topics']    ?? [];
    $about     = $content['about']     ?? [];
    $rows      = $content['rows']      ?? [];
    $projects  = $content['projects']  ?? [];
    $workflow  = $content['workflow']  ?? [];
    $faqs      = $content['faqs']      ?? [];
    $related   = $content['related']   ?? [];

    // Static (sitewide) data — same for all services
    $contact = ['phone' => '+91 99108 36538', 'tel' => '+919910836538', 'email' => 'info@retrotechdigital.com', 'wa' => '919910836538', 'address' => 'O-126, O-145, O-146, The Shopping Mall, Arjun Marg, DLF Phase 1, Gurugram, Haryana, India, 122002', 'hours' => 'Mon - Sat : 9:00 AM - 7:00 PM', 'map' => '#contact'];

    $reasons = [
        ['Experienced Professionals', 'Skilled strategists, designers and analysts delivering with proven practices.'],
        ['Customised Solutions',      'Plans built around your processes, audience and objectives.'],
        ['On-Time Delivery',          'Clear timelines and milestones, with delivery you can plan around.'],
        ['Transparent Communication', 'Open reporting and regular check-ins at every stage.'],
        ['Scalable & Secure',         'Tools and workflows that grow with your business and protect your data.'],
        ['Dedicated Support',         'Ongoing optimization and quick help after launch.'],
    ];

    $blogs = [
        ['31', 'JAN', 'Strategy',  "Guide: How to Improve Return on Ad Spend",         'rb1', '#'],
        ['24', 'JAN', 'Tips',      "5 Mistakes That Quietly Kill {$t} Results",         'rb2', '#'],
        ['17', 'JAN', 'Analytics', "Metrics That Matter: A Plain-English Walkthrough",   'rb3', '#'],
        ['09', 'JAN', 'Case study',"How One Brand Doubled Leads in 90 Days",             'rb4', '#'],
    ];
@endphp

<main class="sp-theme-page selection:bg-[#d8eadb] selection:text-[#1e3326]">

    {{-- 1. HERO --}}
    <section class="relative isolate bg-[#f5fbf6] overflow-hidden pt-[88px] pb-16 lg:pt-[90px] lg:pb-20 border-b border-[#d7e9db]/60">

    <!-- ================= BACKGROUND ================= -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none -z-10">

        <div class="absolute -top-40 right-[12%] w-[650px] h-[650px] rounded-full bg-[#d2f3db]/65 blur-[100px]"></div>

        <div class="absolute top-[15%] right-[35%] w-[350px] h-[350px] rounded-full bg-[#e2f8e8]/70 blur-[90px]"></div>

        <div class="absolute bottom-[-350px] left-[-10%] w-[120%] h-[550px] rounded-[50%] bg-gradient-to-r from-[#cdf0d5]/60 via-white/30 to-[#d5f3dd]/60"></div>

        <div class="absolute top-[10%] right-[36%] w-48 h-40 opacity-40" style="background-image:radial-gradient(#73c98a 1.7px,transparent 1.7px);background-size:20px 20px;"></div>

        <div class="absolute bottom-[8%] right-[5%] w-36 h-28 opacity-30" style="background-image:radial-gradient(#73c98a 1.7px,transparent 1.7px);background-size:20px 20px;"></div>

    </div>


    <!-- ================= MAIN CONTAINER ================= -->
    <div class="relative z-10 w-[92%] max-w-[1720px] mx-auto" style="margin-top: -27px;">

        <div class="grid grid-cols-1 lg:grid-cols-[1.08fr_0.92fr] gap-10 xl:gap-[54px] items-center">


            <!-- ================= LEFT CONTENT ================= -->
            <div class="relative z-20 w-full max-w-[820px]">

                <!-- Badge -->
                <div class="sp-glass-card inline-flex items-center gap-2.5 px-4 py-2 sm:px-4.5 sm:py-2.5 rounded-full bg-[#e9f7ec] text-[#245d39] border border-[#c9e8d0] text-xs sm:text-sm font-bold uppercase tracking-wider mb-5 shadow-[0_4px_12px_rgba(30,100,50,0.05)]">

                    <span class="relative flex w-2.5 h-2.5 shrink-0">
                        <span class="absolute inset-0 rounded-full bg-[#28bd5b] animate-ping opacity-40"></span>
                        <span class="relative w-2.5 h-2.5 rounded-full bg-[#28bd5b] shadow-[0_0_8px_#28bd5b]"></span>
                    </span>

                    {{ $hero['badge'] ?? ('Award-Winning ' . $t . ' Agency') }}

                </div>


                <!-- Main Heading -->
                <h1 class="text-[clamp(34px,3.6vw,58px)] font-black text-[#102f20] leading-[1.05] tracking-[-0.04em] mb-0">

                    <span class="block">
                        Grow Your Business With
                    </span>

                    <!-- Changed mt-1 to mt-0, and matched font size to inherit the clamp() -->
                    <span class="block mt-0 whitespace-nowrap">
                        <span style="letter-spacing: 0px; color: green;">
                            {{ $t }}
                        </span>
                    </span>

                </h1>


                <!-- Green Underline -->
                <div class="w-[240px] sm:w-[280px] max-w-[75%] h-[5px] rounded-full bg-gradient-to-r from-[#4bd96b] via-[#8ee5a0] to-transparent mt-3.5 mb-4" style="transform:rotate(-2deg);transform-origin:left center;"></div>


                <!-- Description -->
                <p class="text-base sm:text-lg text-[#536b5b] leading-[1.5] font-normal max-w-[680px] mb-7">
                    {{ $hero['subtitle'] ?? ('Professional ' . $t . ' services by Retrotech.') }}
                </p>


                <!-- ================= CTA BUTTONS ================= -->
                <!-- ================= CTA BUTTONS ================= -->
<div class="flex flex-col sm:flex-row gap-3 mb-8">

    <!-- Primary -->
    <a href="#contact"
       class="inline-flex justify-center items-center px-5 py-2.5 text-sm font-bold text-white bg-[#397b4e] hover:bg-[#285d3a] rounded-full shadow-[0_3px_12px_rgba(57,123,78,0.28)] hover:shadow-[0_6px_18px_rgba(57,123,78,0.38)] hover:-translate-y-0.5 transition-all duration-200">
        {{ $hero['cta'] ?? 'Connect With Our Experts' }}
        {!! $svg($I['arrow'], 'w-4 h-4 ml-2') !!}
    </a>

    <!-- Secondary -->
    <a href="#process"
       class="inline-flex justify-center items-center gap-1.5 px-5 py-2.5 text-sm font-bold text-[#1e3326] bg-white border border-[#d7e5d9] hover:border-[#397b4e] hover:bg-[#f0f7f0] rounded-full shadow-sm hover:shadow-md transition-all duration-200">
        <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-[#e9f7ec] border border-[#c9e8d0] shrink-0">
            <svg class="w-2 h-2 text-[#008000] ml-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M4 3.5v13l12-6.5z"></path>
            </svg>
        </span>
        See How It Works
    </a>

</div>


                <!-- ================= BENEFITS ROW ================= -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-0 pt-4 border-t border-[#d3e6d8]">

                    <div class="flex items-center gap-2.5 sm:pr-4 sm:border-r border-[#c9dfd0]">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 shrink-0 text-[#128548]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 17l6-6 4 4 8-9"></path>
                            <path d="M15 6h6v6"></path>
                            <path d="M3 21v-4M7 21v-6M11 21v-3M15 21v-5M19 21v-9"></path>
                        </svg>
                        <p class="text-xs sm:text-sm font-semibold text-[#405d4b] leading-snug">
                            Drive More
                            <span class="block">Organic Traffic</span>
                        </p>
                    </div>

                    <div class="flex items-center gap-2.5 sm:px-4 sm:border-r border-[#c9dfd0]">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 shrink-0 text-[#128548]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="8" r="3.5"></circle>
                            <path d="M2 20c0-3.4 3.1-5.5 7-5.5s7 2.1 7 5.5"></path>
                            <path d="M16 5a3.5 3.5 0 0 1 0 7M18 15c2.3.8 4 2.4 4 5"></path>
                        </svg>
                        <p class="text-xs sm:text-sm font-semibold text-[#405d4b] leading-snug">
                            Attract Quality
                            <span class="block">Customers</span>
                        </p>
                    </div>

                    <div class="flex items-center gap-2.5 sm:pl-4">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 shrink-0 text-[#128548]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3l2.5 2H20v13h-5l-3 3-3-3H4V5h5z"></path>
                            <path d="M8 11l3 3 5-6"></path>
                        </svg>
                        <p class="text-xs sm:text-sm font-semibold text-[#405d4b] leading-snug">
                            Grow Your
                            <span class="block">Business Online</span>
                        </p>
                    </div>

                </div>

            </div>



            <!-- ================= RIGHT VISUAL ================= -->
            <div class="sp-hero-visual relative w-full max-w-[720px] mx-auto lg:ml-auto lg:mr-0 mt-6 lg:mt-0 pt-4 sm:pt-6 lg:pt-2 pb-8">

                <div class="absolute top-[8%] right-[-1%] w-[98%] h-[88%] rounded-[36px] bg-gradient-to-br from-[#c7efd1] via-[#b3eac1] to-[#d8f5df] rotate-[-2deg]"></div>

                <div class="absolute top-[0%] left-[8%] w-[85%] aspect-square rounded-full bg-[#c7efd5]/60 blur-[70px]"></div>


                <div class="absolute top-[0%] right-[22%] z-10 text-[#65ce85] hidden sm:block pointer-events-none">
                    <svg class="w-32 h-20" viewBox="0 0 180 100" fill="none">
                        <path d="M5 85 C55 85 85 75 115 45 C130 30 143 18 160 8" stroke="currentColor" stroke-width="6" stroke-linecap="round"></path>
                        <path d="M137 9 L161 7 L154 31" stroke="currentColor" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>


                <!-- VISIBILITY FLOATING CARD -->
                <div class="sp-glass-card absolute top-[-10px] right-[-5px] sm:top-[-14px] sm:right-[10px] z-30 flex items-center gap-2.5 px-3.5 py-2.5 sm:px-4 sm:py-3 bg-white/95 backdrop-blur-md rounded-[18px] shadow-[0_10px_25px_rgba(25,90,48,0.12)] border border-[#e1f0e4] rotate-[-2deg]">

                    <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-[#e4f8e9] flex items-center justify-center text-[#17a04f] shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M13 2L4 14h7l-1 8 10-13h-7z"></path>
                        </svg>
                    </div>

                    <p class="text-xs sm:text-sm font-extrabold text-[#193a29] leading-tight">
                        Boost Your
                        <span class="block">Online Visibility</span>
                    </p>

                </div>



                <!-- MAIN IMAGE CARD -->
                <div class="sp-hero-tilt relative z-20 mt-4 sm:mt-5 lg:mt-3 w-full rounded-[28px] sm:rounded-[34px] overflow-hidden border-[5px] sm:border-[6px] border-white bg-[#14271d] shadow-[0_20px_50px_rgba(25,83,45,0.18)]" data-tilt-card>

                    <img
                        src="{{ $service->hero_image ?? 'https://images.unsplash.com/photo-1571171637578-41bc2dd41cd2?auto=format&fit=crop&w=900&q=80' }}"
                        alt="{{ $t }} Dashboard"
                        class="sp-hero-image w-full aspect-[1.48/1] object-cover block"
                        loading="eager"
                    >

                    <div class="sp-hero-shade absolute inset-0 bg-gradient-to-t from-[#081b10]/35 via-transparent to-[#081b10]/10"></div>


                    <!-- Play Button -->
                    <div class="sp-hero-play absolute inset-0 flex items-center justify-center group cursor-pointer">

                        <div class="absolute w-[110px] h-[110px] sm:w-[130px] sm:h-[130px] rounded-full border border-white/30 bg-white/10 backdrop-blur-[2px] transition-transform duration-500 group-hover:scale-110"></div>

                        <div class="relative w-[70px] h-[70px] sm:w-[82px] sm:h-[82px] rounded-full bg-white flex items-center justify-center shadow-[0_8px_25px_rgba(0,0,0,0.20)] group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 sm:w-8 sm:h-8 text-[#16894c] ml-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 3.5v13l12-6.5z"></path>
                            </svg>
                        </div>

                    </div>

                </div>



                <!-- ROI FLOATING CARD -->
                <div class="sp-glass-card absolute z-30 left-[-20px] sm:left-[-35px] bottom-[-10px] sm:bottom-[-15px] w-[310px] sm:w-[330px] max-w-[calc(100vw-40px)] bg-white/95 backdrop-blur-xl px-4 py-3 sm:px-5 sm:py-4 rounded-[20px] sm:rounded-[22px] shadow-[0_14px_35px_rgba(25,83,45,0.14)] border border-[#e0eee3]">

                    <div class="flex items-center gap-3 sm:gap-3.5">

                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-[#e7f8eb] flex items-center justify-center border border-[#d3eed9] text-[#178549] shrink-0">
                            <svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 17l6-6 4 4 8-9"></path>
                                <path d="M15 6h6v6"></path>
                            </svg>
                        </div>


                        <div class="min-w-0 flex-1">
                            <p class="text-[11px] font-extrabold uppercase tracking-wider text-[#718477] mb-0.5">
                                Avg. ROI
                            </p>
                            <p class="text-[26px] sm:text-[30px] font-black text-[#173b27] tracking-tight leading-none">
                                +245%
                            </p>
                        </div>


                        <div class="hidden sm:flex items-end gap-1 h-10 shrink-0">
                            <span class="w-2 h-4 rounded-full bg-[#b8ebc5]"></span>
                            <span class="w-2 h-6 rounded-full bg-[#9ce3ae]"></span>
                            <span class="w-2 h-7 rounded-full bg-[#82da98]"></span>
                            <span class="w-2 h-9 rounded-full bg-[#63ce81]"></span>
                            <span class="w-2 h-10 rounded-full bg-[#35b961]"></span>
                        </div>

                    </div>

                </div>


                <div class="absolute bottom-[2%] right-[-3%] w-5 h-5 rounded-full bg-[#55c779] shadow-[0_0_20px_rgba(86,202,121,0.5)] hidden sm:block"></div>

            </div>

        </div>

    </div>

</section>

    {{-- 2. TRUST MARQUEE --}}
    <div class="border-b border-[#d7e5d9] bg-white py-7 overflow-hidden relative">
        <div class="absolute inset-y-0 left-0 w-24 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
        <div class="absolute inset-y-0 right-0 w-24 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>
        <p class="text-center text-xs font-bold tracking-[0.16em] text-[#397b4e] uppercase mb-4">Trusted by industry leaders</p>
        <div class="flex w-[200%] animate-[marqueeScroll_22s_linear_infinite] sp-marquee-track">
            @for ($k = 0; $k < 2; $k++)
            <div class="flex justify-around items-center w-1/2 opacity-70 gap-12 px-6">
                @foreach (['TechCorp', 'GlobalBank', 'Nexus', 'Innovate', 'Starlight'] as $brand)
                    <span class="text-2xl font-black text-[#1e3326]">{{ $brand }}</span>
                @endforeach
            </div>
            @endfor
        </div>
    </div>

    {{-- 2b. TOPIC MARQUEE --}}
    <div class="bg-[#397b4e] py-4 overflow-hidden" aria-label="What we cover">
        <div class="flex w-max animate-[marqueeScroll_32s_linear_infinite] sp-marquee-track">
            @for ($k = 0; $k < 2; $k++)
                @foreach ($topics as $topic)
                    <span class="shrink-0 px-6 text-sm font-bold uppercase tracking-wider text-white whitespace-nowrap">{{ $topic }}</span>
                    <span class="shrink-0 text-[#25d366]" aria-hidden="true">✦</span>
                @endforeach
            @endfor
        </div>
    </div>

    {{-- 3. ABOUT + FEATURE BOXES --}}
    <section class="py-24 bg-[#f7fbf7]" id="about">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-start">
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.15em] text-[#397b4e] block mb-2">About the service</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-5 tracking-tight">{{ $about['heading'] ?? ('Targeted, conversion-focused ' . $t . ' solutions.') }}</h2>
                    <p class="text-lg text-[#637568] leading-relaxed mb-8">{{ $about['paragraph'] ?? 'Retrotech helps businesses engage audiences, nurture leads and drive conversions.' }}</p>
                    <div class="grid sm:grid-cols-2 gap-5">
                        @foreach (($about['features'] ?? []) as $f)
                        <div class="sp-glass-card bg-white p-6 rounded-3xl border border-[#d7e5d9] shadow-[0_4px_20px_rgba(30,51,38,0.06)] hover:border-[#397b4e] transition-colors">
                            <div class="w-12 h-12 rounded-2xl bg-[#eaf4eb] border border-[#c8dfcc] text-[#397b4e] flex items-center justify-center mb-4">{!! $svg($I[$f[0]] ?? 'check', 'w-6 h-6') !!}</div>
                            <h3 class="font-bold text-[#1e3326] mb-1.5">{{ $f[1] }}</h3>
                            <p class="text-sm text-[#637568] leading-relaxed mb-3">{{ $f[2] }}</p>
                            <p class="text-xs text-[#637568] leading-relaxed border-t border-[#d7e5d9] pt-3"><span class="font-bold text-[#285d3a]">Benefit:</span> {{ $f[3] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="lg:sticky lg:top-28 relative">
                    <div class="rounded-3xl overflow-hidden shadow-[0_20px_50px_rgba(30,51,38,0.12)] border-4 border-white">
                        <img src="https://picsum.photos/seed/rt-about/900/1000" alt="{{ $t }} dashboard preview" class="w-full h-auto object-cover block" loading="lazy">
                    </div>
                    <div class="absolute -bottom-5 right-5 bg-[#1e3326] text-white px-6 py-4 rounded-2xl shadow-xl border border-[#397b4e]/40">
                        <p class="text-xs text-emerald-200/70 mb-0.5">Campaigns delivered</p>
                        <p class="text-2xl font-black text-[#25d366]">1,200+</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 5b. ALTERNATING SERVICE ROWS --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.15em] text-[#397b4e] block mb-2">What's included</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-3 tracking-tight">Transform your business with our {{ $t }} service.</h2>
                <p class="text-lg text-[#637568]">Pick one service or combine them all. Talk to us in the way that suits you.</p>
            </div>
            <div class="space-y-10">
                @foreach ($rows as $i => $row)
                @php 
                    $ic = $row[0]; $title = $row[1]; $desc = $row[2]; $seed = $row[3]; 
                @endphp
                <div class="grid lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-4 {{ $i % 2 ? 'lg:order-2' : '' }}">
                        <div class="rounded-3xl overflow-hidden border-4 border-white shadow-[0_12px_36px_rgba(30,51,38,0.12)]">
                            <img src="https://picsum.photos/seed/{{ $seed }}/700/520" alt="{{ $title }}" class="w-full h-64 lg:h-72 object-cover block" loading="lazy">
                        </div>
                    </div>
                    <div class="lg:col-span-8 {{ $i % 2 ? 'lg:order-1' : '' }}">
                        <div class="bg-[#f0f7f0] rounded-3xl border border-[#d7e5d9] p-8 lg:p-10 h-full">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="w-11 h-11 rounded-2xl bg-white border border-[#c8dfcc] text-[#397b4e] flex items-center justify-center shrink-0">{!! $svg($I[$ic] ?? 'check') !!}</span>
                                <h3 class="text-xl font-bold text-[#1e3326]">{{ $title }}</h3>
                            </div>
                            <p class="text-[#637568] text-sm sm:text-base leading-relaxed">{{ $desc }}</p>
                            <hr class="my-6 border-[#d7e5d9]">
                            <div class="flex flex-wrap items-center justify-between gap-4">
                                <div class="flex gap-3">
                                    <a href="tel:{{ $contact['tel'] }}" aria-label="Call us" class="w-11 h-11 rounded-full bg-white border border-[#d7e5d9] text-[#397b4e] flex items-center justify-center hover:bg-[#397b4e] hover:text-white hover:border-[#397b4e] transition-colors">{!! $svg($I['phone']) !!}</a>
                                    <a href="mailto:{{ $contact['email'] }}" aria-label="Email us" class="w-11 h-11 rounded-full bg-white border border-[#d7e5d9] text-[#397b4e] flex items-center justify-center hover:bg-[#397b4e] hover:text-white hover:border-[#397b4e] transition-colors">{!! $svg($I['mail']) !!}</a>
                                    <a href="https://wa.me/{{ $contact['wa'] }}" target="_blank" rel="noopener" aria-label="WhatsApp us" class="w-11 h-11 rounded-full bg-white border border-[#d7e5d9] text-[#397b4e] flex items-center justify-center hover:bg-[#25d366] hover:text-[#1e3326] hover:border-[#25d366] transition-colors">{!! $svg($I['chat']) !!}</a>
                                    <a href="#contact" aria-label="Contact form" class="w-11 h-11 rounded-full bg-white border border-[#d7e5d9] text-[#397b4e] flex items-center justify-center hover:bg-[#397b4e] hover:text-white hover:border-[#397b4e] transition-colors">{!! $svg($I['user']) !!}</a>
                                </div>
                                <a href="#contact" class="inline-flex items-center px-6 py-2.5 text-sm font-bold text-white bg-[#397b4e] hover:bg-[#285d3a] rounded-full shadow-sm hover:-translate-y-0.5 transition-all">Explore More {!! $svg($I['arrow'], 'w-4 h-4 ml-2') !!}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 7c. PROJECTS SLIDER + BEFORE/AFTER --}}
    <section class="sp-projects-aurora py-24 border-y border-[#d7e5d9]" id="projects">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <div class="text-center mb-14">
                <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#397b4e] block mb-2">Our Projects</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-3 tracking-tight">Real numbers from real clients.</h2>
                <p class="text-lg text-[#637568]">Flip the switch to compare results before and after.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-10 items-center" id="projectSlider">
                <div class="sp-project-visual relative overflow-hidden">
                    @foreach ($projects as $i => $p)
                    <img data-pslide src="https://picsum.photos/seed/{{ $p[4] }}/900/700" alt="{{ $p[0] }} project" class="w-full h-72 md:h-[26rem] object-cover {{ $i ? 'hidden' : '' }}" loading="lazy">
                    @endforeach
                </div>
                <div>
                    @foreach ($projects as $i => $p)
                    <div data-pslide class="sp-glass-card sp-project-panel {{ $i ? 'hidden' : '' }}">
                        <h3 class="text-3xl font-extrabold text-[#1e3326] tracking-tight mb-3">Expect great things from <span class="text-[#397b4e]">{{ $p[0] }}</span></h3>
                        <p class="text-[#637568] mb-6 leading-relaxed">{{ $p[1] }}</p>
                        <div class="grid grid-cols-3 gap-3">
                            @foreach ([['Organic Traffic', 0], ['Ranking Keywords', 1], ['ROI Growth', 2]] as [$label, $k])
                            <div class="sp-glass-card bg-white rounded-2xl border border-[#d7e5d9] p-4 text-center">
                                <p class="text-2xl font-black text-[#1e3326]" data-stat data-before="{{ $p[2][$k] }}" data-after="{{ $p[3][$k] }}">{{ $p[3][$k] }}</p>
                                <p class="text-xs text-[#637568] mt-1">{{ $label }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    <div class="flex items-center gap-3 my-6">
                        <span class="text-sm font-semibold text-[#637568]">Before</span>
                        <button type="button" role="switch" aria-checked="true" aria-label="Show results after" id="baSwitch" class="ba-switch relative w-14 h-8 rounded-full bg-[#397b4e] transition-colors focus:outline-none focus-visible:ring-4 focus-visible:ring-[#397b4e]/30">
                            <span class="ba-knob absolute left-1 top-1 w-6 h-6 bg-white rounded-full shadow transition-transform"></span>
                        </button>
                        <span class="text-sm font-semibold text-[#1e3326]">After</span>
                    </div>
                    <div class="flex flex-wrap items-center gap-4">
                        <a href="#contact" class="inline-flex items-center px-7 py-3.5 text-sm font-bold text-white bg-[#397b4e] hover:bg-[#285d3a] rounded-full shadow-md hover:-translate-y-0.5 transition-all">Get in Touch {!! $svg($I['arrow'], 'w-4 h-4 ml-2') !!}</a>
                        <div class="flex gap-2 ml-auto">
                            <button type="button" id="pPrev" aria-label="Previous project" class="w-11 h-11 rounded-full bg-white border border-[#d7e5d9] text-[#1e3326] flex items-center justify-center hover:bg-[#397b4e] hover:text-white transition-colors">{!! $svg($I['left']) !!}</button>
                            <button type="button" id="pNext" aria-label="Next project" class="w-11 h-11 rounded-full bg-white border border-[#d7e5d9] text-[#1e3326] flex items-center justify-center hover:bg-[#397b4e] hover:text-white transition-colors">{!! $svg($I['chev']) !!}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 7b. DETAILED WORKFLOW --}}
    <section class="py-24 bg-white" id="process">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <div class="grid lg:grid-cols-2 gap-14 items-start">
                <div class="lg:sticky lg:top-28">
                    <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#397b4e] block mb-2">Full workflow</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-4 tracking-tight">How a {{ $t }} project runs, end to end.</h2>
                    <p class="text-lg text-[#637568] leading-relaxed mb-8">A structured workflow keeps every project on time and on target. Here is what happens from the first call to ongoing optimization.</p>
                    <a href="#contact" class="inline-flex items-center mt-8 px-7 py-3.5 text-sm font-bold text-white bg-[#1e3326] hover:bg-[#14241b] rounded-full hover:-translate-y-0.5 transition-all">Contact Us {!! $svg($I['arrow'], 'w-4 h-4 ml-2') !!}</a>
                </div>
                <ol class="relative space-y-5 before:absolute before:left-5 before:top-2 before:bottom-2 before:w-0.5 before:bg-[#d7e5d9]">
                    @foreach ($workflow as $i => $step)
                    @php
                        $ic = $step[0]; $title = $step[1]; $desc = $step[2];
                    @endphp
                    <li class="relative pl-16">
                        <span class="absolute left-0 top-1 w-10 h-10 rounded-full bg-[#397b4e] text-white font-extrabold text-sm flex items-center justify-center border-4 border-white shadow-md">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div class="sp-glass-card bg-[#f7fbf7] p-6 rounded-3xl border border-[#d7e5d9] hover:border-[#397b4e] transition-colors">
                            <span class="text-[#397b4e] block mb-2">{!! $svg($I[$ic] ?? 'check', 'w-6 h-6') !!}</span>
                            <h3 class="font-bold text-[#1e3326] mb-1">{{ $title }}</h3>
                            <p class="text-sm text-[#637568] leading-relaxed">{{ $desc }}</p>
                        </div>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>

    {{-- 8. WHY CHOOSE US --}}
    <section class="sp-neo-section py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <div class="grid lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-5">
                    <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#397b4e] block mb-2">Why choose us</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-4 tracking-tight">Six reasons teams trust Retrotech.</h2>
                    <p class="text-lg text-[#637568] leading-relaxed mb-8">Reliable, secure and scalable solutions built around your goals.</p>
                    <div class="sp-neo-image overflow-hidden">
                        <img src="https://picsum.photos/seed/rt-why/800/600" alt="Our team at work" class="w-full h-auto block" loading="lazy">
                    </div>
                </div>
                <div class="lg:col-span-7 grid sm:grid-cols-2 gap-5">
                    @foreach ($reasons as $i => $reason)
                    @php $title = $reason[0]; $desc = $reason[1]; @endphp
                    <div class="sp-neo-card p-6">
                        <div class="sp-neo-number w-10 h-10 font-extrabold flex items-center justify-center mb-4">{{ $i + 1 }}</div>
                        <h3 class="font-bold text-[#1e3326] mb-1.5">{{ $title }}</h3>
                        <p class="text-sm text-[#637568] leading-relaxed">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- 8b. READY TO GET STARTED (call band) --}}
    <section class="py-14 bg-[#eaf4eb] border-y border-[#c8dfcc]">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl text-center">
            <h2 class="text-2xl md:text-3xl font-extrabold text-[#1e3326] mb-2 tracking-tight">Ready to get started?</h2>
            <p class="text-[#637568] mb-6">Call us to discuss your project needs.</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="tel:{{ $contact['tel'] }}" class="inline-flex justify-center items-center px-8 py-3.5 text-sm font-bold text-white bg-[#397b4e] hover:bg-[#285d3a] rounded-full shadow-md hover:-translate-y-0.5 transition-all">{!! $svg($I['phone'], 'w-4 h-4 mr-2') !!} Call Now</a>
                <a href="https://wa.me/{{ $contact['wa'] }}" target="_blank" rel="noopener" class="inline-flex justify-center items-center px-8 py-3.5 text-sm font-bold text-[#1e3326] bg-white border border-[#d7e5d9] hover:border-[#25d366] rounded-full hover:-translate-y-0.5 transition-all">{!! $svg($I['chat'], 'w-4 h-4 mr-2') !!} WhatsApp Us</a>
            </div>
        </div>
    </section>

    {{-- 9. PREMIUM TESTIMONIALS --}}
    <section class="sp-clay-section py-28 relative overflow-hidden">
        <div class="absolute top-1/2 left-0 w-full h-[600px] bg-gradient-to-b from-[#f0f7f0] to-transparent transform -skew-y-6 -translate-y-1/2 z-0 pointer-events-none"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-1/3">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#eaf4eb] text-[#285d3a] border border-[#c8dfcc] text-xs font-bold uppercase tracking-wider mb-6">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#25d366] animate-pulse"></span> Client Success
                    </div>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-[#1e3326] mb-6 leading-tight tracking-tight">Don't just take our word for it.</h2>
                    <p class="text-lg text-[#637568] mb-8 leading-relaxed">See how we've transformed businesses just like yours into market leaders.</p>
                    <div class="flex items-center gap-4 mb-8">
                        <div class="sp-clay-rating p-4 flex items-center gap-3">
                            <div class="flex text-amber-400">★★★★★</div>
                            <div class="font-bold text-[#1e3326]">4.9/5 <span class="text-sm text-[#637568] font-normal">on Clutch</span></div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-2/3 relative h-[600px] overflow-hidden flex gap-6 group">
                    <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-b from-white to-transparent z-10 pointer-events-none"></div>
                    <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-white to-transparent z-10 pointer-events-none"></div>
                    @php
                        $testimonials = [
                            ['David R.', 'CMO, TechCorp', 11, '"We were burning cash. Within 3 months our cost per lead dropped by 60% and revenue doubled."'],
                            ['Sarah M.', 'Founder, StartupX', 12, '"Best agency we\'ve worked with. They actually understand data."'],
                            ['Tom H.', 'CEO, Innovate', 15, '"Their reporting is so transparent. We finally know exactly where our money is going."'],
                            ['James L.', 'VP Marketing', 33, '"Their execution speed is insane. We saw massive ROI within the first 30 days."'],
                            ['Elena K.', 'Director, GlobalBank', 14, '"Finally an agency that speaks our language. They slotted into our internal team seamlessly."'],
                            ['Mark T.', 'CTO, Nexus', 53, '"They found errors our previous agency missed for 2 years. Absolute lifesavers."'],
                        ];
                    @endphp
                    @foreach ([array_slice($testimonials, 0, 3), array_slice($testimonials, 3, 3)] as $c => $col)
                    <div class="w-1/2 flex flex-col gap-6 {{ $c ? 'animate-[scrollColDown_26s_linear_infinite] mt-16' : 'animate-[scrollColUp_24s_linear_infinite]' }} group-hover:[animation-play-state:paused]">
                        @for ($rep = 0; $rep < 2; $rep++)
                        @foreach ($col as $j => $test)
                        @php 
                            $dark = $c === 1 && $j === 0; 
                            $name = $test[0]; $role = $test[1]; $img = $test[2]; $quote = $test[3];
                        @endphp
                        <div @if($rep) aria-hidden="true" @endif class="sp-clay-testimonial {{ $dark ? 'sp-clay-testimonial-dark text-white border-t-4 border-t-[#25d366]' : 'border-t-4 border-t-[#397b4e]' }} p-8 flex-shrink-0 transform transition-transform hover:scale-105">
                            <div class="flex text-amber-400 mb-4">★★★★★</div>
                            <p class="{{ $dark ? 'text-emerald-50' : 'text-[#334b39]' }} mb-6 text-base font-normal leading-relaxed">{{ $quote }}</p>
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/100?img={{ $img }}" alt="{{ $name }}" class="w-12 h-12 rounded-full border-2 {{ $dark ? 'border-[#25d366]' : 'border-[#d7e5d9]' }}">
                                <div>
                                    <p class="font-bold {{ $dark ? 'text-white' : 'text-[#1e3326]' }}">{{ $name }}</p>
                                    <p class="text-xs {{ $dark ? 'text-emerald-300' : 'text-[#637568]' }}">{{ $role }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endfor
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- 13. NEWSLETTER STRIP --}}
    <section class="py-10 bg-[#f0f7f0] border-y border-[#d7e5d9]">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl">
            <div class="grid md:grid-cols-2 gap-6 items-center">
                <div>
                    <h2 class="text-2xl font-extrabold text-[#1e3326] tracking-tight">Subscribe for offers and updates</h2>
                    <p class="text-sm text-[#637568] mt-1">Deals, newsletters and new guides. No spam.</p>
                </div>
                <form action="{{ url('subscribe_front') }}" method="POST" class="flex flex-col sm:flex-row gap-3">
                    @csrf
                    <input type="email" name="email" placeholder="Your email address" class="premium-input" required aria-label="Email address">
                    <button type="submit" class="shrink-0 px-7 py-3.5 text-sm font-bold text-white bg-[#397b4e] hover:bg-[#285d3a] rounded-2xl shadow-md transition-colors">Subscribe Now</button>
                </form>
            </div>
        </div>
    </section>

    {{-- 14. PREMIUM FAQ ACCORDION --}}
    <section class="sp-knowledge-section py-24 border-b border-[#d7e5d9]">
        <div class="sp-theme-section-content container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl">
            <div class="text-center mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#397b4e] block mb-2">Knowledge Base</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-3 tracking-tight">Frequently Asked Questions</h2>
                <p class="text-lg text-[#637568]">Everything you need to know about our {{ $t }} service.</p>
            </div>
            <div class="space-y-4">
                @foreach ($faqs as $faq)
                @php $q = $faq[0]; $a = $faq[1]; @endphp
                <div class="sp-glass-card bg-white rounded-2xl shadow-sm border border-[#d7e5d9] overflow-hidden faq-item transition-all hover:border-[#397b4e]">
                    <button type="button" class="faq-btn w-full px-8 py-6 text-left font-bold text-lg text-[#1e3326] flex justify-between items-center focus:outline-none focus-visible:ring-4 focus-visible:ring-[#397b4e]/20">
                        {{ $q }}
                        <div class="w-8 h-8 rounded-full bg-[#f0f7f0] border border-[#d7e5d9] flex items-center justify-center flex-shrink-0 transition-all duration-300 faq-icon text-[#397b4e] ml-4">{!! $svg('M19 9l-7 7-7-7') !!}</div>
                    </button>
                    <div class="faq-content px-8 pb-6 text-[#637568] text-base leading-relaxed">{{ $a }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 15. BLOG SLIDER --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <div class="grid lg:grid-cols-12 gap-10 items-center">
                <div class="lg:col-span-4">
                    <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#397b4e] block mb-2">From the blog</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-4 tracking-tight">Latest news and articles.</h2>
                    <p class="text-[#637568] leading-relaxed mb-6">Practical guides and honest breakdowns from our team.</p>
                    <div class="flex items-center gap-3">
                        <a href="#" class="inline-flex items-center px-6 py-3 text-sm font-bold text-white bg-[#397b4e] hover:bg-[#285d3a] rounded-full shadow-md transition-all">View All Blogs {!! $svg($I['arrow'], 'w-4 h-4 ml-2') !!}</a>
                        <button type="button" id="blogPrev" aria-label="Previous articles" class="w-11 h-11 rounded-full bg-white border border-[#d7e5d9] text-[#1e3326] flex items-center justify-center hover:bg-[#397b4e] hover:text-white transition-colors">{!! $svg($I['left']) !!}</button>
                        <button type="button" id="blogNext" aria-label="Next articles" class="w-11 h-11 rounded-full bg-white border border-[#d7e5d9] text-[#1e3326] flex items-center justify-center hover:bg-[#397b4e] hover:text-white transition-colors">{!! $svg($I['chev']) !!}</button>
                    </div>
                </div>
                <div class="lg:col-span-8 min-w-0">
                    <div id="blogTrack" class="flex gap-6 overflow-x-auto snap-x no-scrollbar pb-2" style="overscroll-behavior-x: contain; overscroll-behavior-y: auto;">
                        @foreach ($blogs as $blog)
                        @php
                            $day = $blog[0]; $mon = $blog[1]; $cat = $blog[2]; $title = $blog[3]; $seed = $blog[4]; $href = $blog[5];
                        @endphp
                        <article class="sp-glass-card snap-start shrink-0 w-[85%] sm:w-[calc(50%-0.75rem)] bg-[#f7fbf7] rounded-3xl border border-[#d7e5d9] overflow-hidden hover:border-[#397b4e] hover:shadow-[0_16px_36px_rgba(30,51,38,0.12)] transition-all">
                            <div class="relative">
                                <img src="https://picsum.photos/seed/{{ $seed }}/700/420" alt="{{ $title }}" class="w-full h-48 object-cover block" loading="lazy">
                                <div class="absolute top-4 left-4 bg-white rounded-xl px-3 py-2 text-center shadow-md leading-none"><span class="block text-lg font-black text-[#1e3326]">{{ $day }}</span><span class="block text-[10px] font-bold text-[#397b4e] mt-1">{{ $mon }}</span></div>
                            </div>
                            <div class="p-6">
                                <p class="text-xs font-semibold text-[#397b4e] mb-2">{{ $cat }}</p>
                                <h3 class="font-bold text-[#1e3326] leading-snug mb-4">{{ $title }}</h3>
                                <a href="{{ $href }}" class="inline-flex items-center text-sm font-bold text-[#397b4e] hover:text-[#285d3a]">Read More {!! $svg($I['chev'], 'w-4 h-4 ml-1') !!}</a>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tiltCard = document.querySelector('[data-tilt-card]');
            if (tiltCard && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                tiltCard.addEventListener('pointermove', (event) => {
                    if (event.pointerType === 'touch') return;

                    const rect = tiltCard.getBoundingClientRect();
                    const x = (event.clientX - rect.left) / rect.width;
                    const y = (event.clientY - rect.top) / rect.height;
                    const maxTilt = 8;

                    tiltCard.style.setProperty('--tilt-x', `${(0.5 - y) * maxTilt}deg`);
                    tiltCard.style.setProperty('--tilt-y', `${(x - 0.5) * maxTilt}deg`);
                    tiltCard.classList.add('is-tilting');
                }, { passive: true });

                tiltCard.addEventListener('pointerleave', () => {
                    tiltCard.style.setProperty('--tilt-x', '0deg');
                    tiltCard.style.setProperty('--tilt-y', '0deg');
                    tiltCard.classList.remove('is-tilting');
                });
            }

            // FAQ Accordion
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const btn = item.querySelector('.faq-btn');
                if (btn) {
                    btn.addEventListener('click', () => {
                        const isActive = item.classList.contains('faq-active');
                        faqItems.forEach(i => i.classList.remove('faq-active'));
                        if (!isActive) item.classList.add('faq-active');
                    });
                }
            });

            // Projects slider + Before/After toggle
            const slider = document.getElementById('projectSlider');
            if (slider) {
                const groups = {};
                slider.querySelectorAll('[data-pslide]').forEach((el, i) => {
                    const key = el.tagName === 'IMG' ? 'img' : 'txt';
                    (groups[key] = groups[key] || []).push(el);
                });
                const total = (groups.img || []).length;
                let current = 0, showAfter = true;
                const sw = document.getElementById('baSwitch');

                const renderStats = () => {
                    slider.querySelectorAll('[data-stat]').forEach(s => {
                        s.textContent = showAfter ? s.dataset.after : s.dataset.before;
                    });
                };
                const show = (n) => {
                    current = (n + total) % total;
                    ['img', 'txt'].forEach(k => (groups[k] || []).forEach((el, i) => el.classList.toggle('hidden', i !== current)));
                };
                document.getElementById('pPrev')?.addEventListener('click', () => show(current - 1));
                document.getElementById('pNext')?.addEventListener('click', () => show(current + 1));
                sw?.addEventListener('click', () => {
                    showAfter = !showAfter;
                    sw.setAttribute('aria-checked', showAfter);
                    sw.classList.toggle('bg-[#397b4e]', showAfter);
                    sw.classList.toggle('bg-[#b7c9bb]', !showAfter);
                    renderStats();
                });
                renderStats();
            }

            // Blog carousel arrows
            const blogTrack = document.getElementById('blogTrack');
            if (blogTrack) {
                const step = () => blogTrack.querySelector('article')?.getBoundingClientRect().width + 24 || 320;
                document.getElementById('blogPrev')?.addEventListener('click', () => blogTrack.scrollBy({ left: -step(), behavior: 'smooth' }));
                document.getElementById('blogNext')?.addEventListener('click', () => blogTrack.scrollBy({ left: step(), behavior: 'smooth' }));
            }

        });
    </script>
@endpush