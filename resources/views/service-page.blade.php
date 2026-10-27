@extends('layouts.app')

@section('title', ($service->title ?? 'Service') . ' - Retrotech')
@section('description', $service->meta_description ?? 'Professional ' . ($service->title ?? 'Technology') . ' services by Retrotech.')

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
    @keyframes floatSlow { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-12px); } }
    @keyframes floatAlt { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-8px); } }
    @keyframes marqueeScroll { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
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
    <section class="relative bg-[#f7fbf7] overflow-hidden pt-28 pb-20 lg:pt-36 lg:pb-28 border-b border-[#d7e5d9]/60">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
            <div class="absolute -top-32 -right-32 w-[550px] h-[550px] bg-[#397b4e]/10 rounded-full blur-3xl opacity-70"></div>
            <div class="absolute bottom-0 left-10 w-[420px] h-[420px] bg-[#25d366]/8 rounded-full blur-3xl opacity-60"></div>
        </div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#eaf4eb] text-[#285d3a] border border-[#c8dfcc] text-xs sm:text-sm font-bold uppercase tracking-wider mb-6 shadow-sm">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#25d366] animate-pulse shadow-[0_0_8px_#25d366]"></span>
                        {{ $hero['badge'] ?? ('Award-Winning ' . $t . ' Agency') }}
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-[#1e3326] leading-[1.12] tracking-tight mb-6">
                        Grow Your Business with <br class="hidden lg:block">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#1e3326] via-[#285d3a] to-[#397b4e]">{{ $t }}</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-[#637568] mb-8 leading-relaxed font-normal">{{ $hero['subtitle'] ?? ('Professional ' . $t . ' services by Retrotech.') }}</p>
                    <div class="flex flex-col sm:flex-row gap-4 mb-10">
                        <a href="#contact" class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-white transition-all bg-[#397b4e] hover:bg-[#285d3a] rounded-full shadow-[0_4px_18px_rgba(57,123,78,0.28)] hover:shadow-[0_8px_25px_rgba(57,123,78,0.38)] hover:-translate-y-0.5">
                            {{ $hero['cta'] ?? 'Connect With Our Experts' }} {!! $svg($I['arrow'], 'w-5 h-5 ml-2') !!}
                        </a>
                        <a href="#process" class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-[#1e3326] transition-all bg-white border border-[#d7e5d9] hover:border-[#397b4e] hover:bg-[#f0f7f0] rounded-full shadow-sm hover:shadow-md">See How It Works</a>
                    </div>
                    <div class="flex flex-wrap items-center gap-6 pt-6 border-t border-[#d7e5d9]">
                        <div class="flex items-center gap-6">
                            <div class="flex -space-x-3">
                                <img class="w-10 h-10 rounded-full border-2 border-white object-cover shadow-sm" src="https://i.pravatar.cc/100?img=1" alt="Client">
                                <img class="w-10 h-10 rounded-full border-2 border-white object-cover shadow-sm" src="https://i.pravatar.cc/100?img=2" alt="Client">
                                <img class="w-10 h-10 rounded-full border-2 border-white object-cover shadow-sm" src="https://i.pravatar.cc/100?img=3" alt="Client">
                                <div class="flex items-center justify-center w-10 h-10 text-xs font-bold text-[#285d3a] bg-[#eaf4eb] border-2 border-white rounded-full shadow-sm">500+</div>
                            </div>
                            <div class="text-sm font-medium text-[#637568]">Trusted by <span class="text-[#1e3326] font-bold">500+</span> brands</div>
                        </div>
                    </div>
                </div>
                <div class="relative lg:ml-auto w-full max-w-lg">
                    <div class="relative rounded-3xl overflow-hidden shadow-[0_20px_50px_rgba(30,51,38,0.12)] border-4 border-white sp-animate-float">
                        <img src="{{ $service->hero_image ?? 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}" alt="{{ $t }} Dashboard" class="w-full h-auto object-cover block">
                        <div class="absolute inset-0 bg-[#1e3326]/25 flex items-center justify-center group cursor-pointer hover:bg-[#1e3326]/35 transition-all">
                            <div class="w-20 h-20 bg-white/95 rounded-full flex items-center justify-center shadow-xl group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-[#397b4e] ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"></path></svg>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-white p-5 rounded-2xl shadow-[0_12px_30px_rgba(30,51,38,0.12)] border border-[#d7e5d9] sp-animate-float-alt">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-[#eaf4eb] flex items-center justify-center border border-[#c8dfcc] text-[#397b4e]">{!! $svg('M13 7h8m0 0v8m0-8l-8 8-4-4-6 6', 'w-6 h-6') !!}</div>
                            <div>
                                <p class="text-xs uppercase tracking-wider text-[#637568] font-bold">Avg. ROI</p>
                                <p class="text-2xl font-black text-[#1e3326]">+245%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. TRUST MARQUEE --}}
    <div class="border-b border-[#d7e5d9] bg-white py-7 overflow-hidden relative">
        <div class="absolute inset-y-0 left-0 w-24 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
        <div class="absolute inset-y-0 right-0 w-24 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>
        <p class="text-center text-xs font-bold tracking-[0.16em] text-[#397b4e] uppercase mb-4">Trusted by industry leaders</p>
        <div class="flex w-[200%] animate-[marqueeScroll_22s_linear_infinite]">
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
        <div class="flex w-max animate-[marqueeScroll_32s_linear_infinite]">
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
                        <div class="bg-white p-6 rounded-3xl border border-[#d7e5d9] shadow-[0_4px_20px_rgba(30,51,38,0.06)] hover:border-[#397b4e] transition-colors">
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
    <section class="py-24 bg-[#f7fbf7] border-y border-[#d7e5d9]" id="projects">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <div class="text-center mb-14">
                <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#397b4e] block mb-2">Our Projects</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-3 tracking-tight">Real numbers from real clients.</h2>
                <p class="text-lg text-[#637568]">Flip the switch to compare results before and after.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-10 items-center" id="projectSlider">
                <div class="relative rounded-3xl overflow-hidden border-4 border-white shadow-[0_20px_50px_rgba(30,51,38,0.12)]">
                    @foreach ($projects as $i => $p)
                    <img data-pslide src="https://picsum.photos/seed/{{ $p[4] }}/900/700" alt="{{ $p[0] }} project" class="w-full h-72 md:h-[26rem] object-cover {{ $i ? 'hidden' : '' }}" loading="lazy">
                    @endforeach
                </div>
                <div>
                    @foreach ($projects as $i => $p)
                    <div data-pslide class="{{ $i ? 'hidden' : '' }}">
                        <h3 class="text-3xl font-extrabold text-[#1e3326] tracking-tight mb-3">Expect great things from <span class="text-[#397b4e]">{{ $p[0] }}</span></h3>
                        <p class="text-[#637568] mb-6 leading-relaxed">{{ $p[1] }}</p>
                        <div class="grid grid-cols-3 gap-3">
                            @foreach ([['Organic Traffic', 0], ['Ranking Keywords', 1], ['ROI Growth', 2]] as [$label, $k])
                            <div class="bg-white rounded-2xl border border-[#d7e5d9] p-4 text-center">
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
                        <div class="bg-[#f7fbf7] p-6 rounded-3xl border border-[#d7e5d9] hover:border-[#397b4e] transition-colors">
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
    <section class="py-24 bg-[#f7fbf7]">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <div class="grid lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-5">
                    <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#397b4e] block mb-2">Why choose us</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-4 tracking-tight">Six reasons teams trust Retrotech.</h2>
                    <p class="text-lg text-[#637568] leading-relaxed mb-8">Reliable, secure and scalable solutions built around your goals.</p>
                    <div class="rounded-3xl overflow-hidden border-4 border-white shadow-[0_16px_40px_rgba(30,51,38,0.12)]">
                        <img src="https://picsum.photos/seed/rt-why/800/600" alt="Our team at work" class="w-full h-auto block" loading="lazy">
                    </div>
                </div>
                <div class="lg:col-span-7 grid sm:grid-cols-2 gap-5">
                    @foreach ($reasons as $i => $reason)
                    @php $title = $reason[0]; $desc = $reason[1]; @endphp
                    <div class="bg-white p-6 rounded-3xl border border-[#d7e5d9] hover:border-[#397b4e] hover:-translate-y-1 transition-all duration-300">
                        <div class="w-10 h-10 rounded-full bg-[#397b4e] text-white font-extrabold flex items-center justify-center mb-4">{{ $i + 1 }}</div>
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
    <section class="py-28 bg-white relative overflow-hidden">
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
                        <div class="bg-white p-4 rounded-2xl shadow-md border border-[#d7e5d9] flex items-center gap-3">
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
                        <div @if($rep) aria-hidden="true" @endif class="{{ $dark ? 'bg-[#1e3326] text-white border-t-4 border-t-[#25d366] shadow-[0_12px_36px_rgba(30,51,38,0.25)]' : 'bg-white border border-[#d7e5d9] border-t-4 border-t-[#397b4e] shadow-[0_8px_30px_rgba(30,51,38,0.06)]' }} p-8 rounded-3xl flex-shrink-0 transform transition-transform hover:scale-105">
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
    <section class="py-24 bg-[#f7fbf7] border-b border-[#d7e5d9]">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl">
            <div class="text-center mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#397b4e] block mb-2">Knowledge Base</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-3 tracking-tight">Frequently Asked Questions</h2>
                <p class="text-lg text-[#637568]">Everything you need to know about our {{ $t }} service.</p>
            </div>
            <div class="space-y-4">
                @foreach ($faqs as $faq)
                @php $q = $faq[0]; $a = $faq[1]; @endphp
                <div class="bg-white rounded-2xl shadow-sm border border-[#d7e5d9] overflow-hidden faq-item transition-all hover:border-[#397b4e]">
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
                    <div id="blogTrack" class="flex gap-6 overflow-x-auto snap-x snap-mandatory no-scrollbar pb-2">
                        @foreach ($blogs as $blog)
                        @php 
                            $day = $blog[0]; $mon = $blog[1]; $cat = $blog[2]; $title = $blog[3]; $seed = $blog[4]; $href = $blog[5];
                        @endphp
                        <article class="snap-start shrink-0 w-[85%] sm:w-[calc(50%-0.75rem)] bg-[#f7fbf7] rounded-3xl border border-[#d7e5d9] overflow-hidden hover:border-[#397b4e] hover:shadow-[0_16px_36px_rgba(30,51,38,0.12)] transition-all">
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

            // Blog slider arrows
            const track = document.getElementById('blogTrack');
            if (track) {
                const step = () => track.querySelector('article')?.getBoundingClientRect().width + 24 || 320;
                document.getElementById('blogPrev')?.addEventListener('click', () => track.scrollBy({ left: -step(), behavior: 'smooth' }));
                document.getElementById('blogNext')?.addEventListener('click', () => track.scrollBy({ left: step(), behavior: 'smooth' }));
            }
        });
    </script>
@endpush