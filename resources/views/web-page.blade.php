@extends('layouts.app')

@section('title', $webPage->meta_title ?: ($webPage->title . ' - Retrotech Digital'))
@section('description', $webPage->meta_description ?: ($webPage->short_description ?: 'Professional digital services by Retrotech.'))

@push('styles')
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      corePlugins: { preflight: false },
      theme: {
        extend: {
          colors: {
            retro: {
              charcoal: '#1e3326',
              dark: '#16281e',
              darkCard: '#1f382a',
              mid: '#334b39',
              muted: '#637568',
              green: '#397b4e',
              greenHover: '#285d3a',
              emerald: '#25d366',
              mint: '#eaf4eb',
              tint: '#f0f7f0',
              bg: '#f7fbf7',
              border: '#d7e5d9'
            }
          },
          fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'] }
        }
      }
    }
  </script>

  <style>
    .sp-theme-page { font-family: 'Inter', system-ui, sans-serif; color: #334b39; background-color: #f7fbf7; }
    @keyframes floatSlow { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-12px); } }
    @keyframes floatAlt { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-8px); } }
    @keyframes marqueeScroll { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
    .sp-animate-float { animation: floatSlow 6s ease-in-out infinite; }
    .sp-animate-float-alt { animation: floatAlt 5s ease-in-out infinite 1s; }
    
    .faq-content { max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
    .faq-active .faq-content { max-height: 400px; }
    .faq-active .faq-icon { transform: rotate(180deg); background-color: #397b4e !important; color: #ffffff !important; border-color: #397b4e !important; }
    .ba-switch[aria-checked="true"] .ba-knob { transform: translateX(1.5rem); }
  </style>
@endpush

@section('content')

@php
    $t = $webPage->title;

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
        'shield' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
    ];

    $renderIcon = function($iconName) use ($I, $svg) {
        if (empty($iconName)) return $svg($I['check'], 'w-6 h-6');
        if (isset($I[$iconName])) return $svg($I[$iconName], 'w-6 h-6');
        if (str_contains($iconName, 'fa-')) return '<i class="' . e($iconName) . '" style="font-size: 1.25rem;"></i>';
        return $svg($I['check'], 'w-6 h-6');
    };

    $contact = [
        'phone' => '+91 99108 36538',
        'tel' => '+919910836538',
        'email' => 'info@retrotechdigital.com',
        'wa' => '919910836538'
    ];
@endphp

<main class="sp-theme-page selection:bg-[#d8eadb] selection:text-[#1e3326]">

    {{-- DRAFT NOTICE FOR ADMINS --}}
    @if(!$webPage->is_published)
        <div class="bg-amber-100 border-b border-amber-300 text-amber-900 px-4 py-2.5 text-center text-sm font-semibold">
            <span class="inline-block w-2.5 h-2.5 rounded-full bg-amber-500 mr-1.5 animate-pulse"></span>
            <strong>Admin Draft Preview:</strong> This page is currently unpublished and only visible to logged-in administrators.
        </div>
    @endif

    {{-- 
    =============================================================================
    PRIMARY PAGE HERO HEADER
    =============================================================================
    --}}
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
                        {{ ucfirst($webPage->category ?: 'Marketing') }} / {{ str_pad((string) $webPage->id, 2, '0', STR_PAD_LEFT) }}
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-[#1e3326] leading-[1.12] tracking-tight mb-6">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#1e3326] via-[#285d3a] to-[#397b4e]">{{ $webPage->title }}</span>
                    </h1>

                    @if($webPage->short_description)
                        <p class="text-lg sm:text-xl text-[#637568] mb-8 leading-relaxed font-normal">
                            {{ $webPage->short_description }}
                        </p>
                    @endif

                    <div class="flex flex-col sm:flex-row gap-4 mb-10">
                        <a href="#contact" class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-white transition-all bg-[#397b4e] hover:bg-[#285d3a] rounded-full shadow-[0_4px_18px_rgba(57,123,78,0.28)] hover:shadow-[0_8px_25px_rgba(57,123,78,0.38)] hover:-translate-y-0.5">
                            Discuss Your Project {!! $svg($I['arrow'], 'w-5 h-5 ml-2') !!}
                        </a>
                        <a href="#about" class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-[#1e3326] transition-all bg-white border border-[#d7e5d9] hover:border-[#397b4e] hover:bg-[#f0f7f0] rounded-full shadow-sm hover:shadow-md">
                            Explore Capabilities
                        </a>
                    </div>

                    <div class="flex flex-wrap items-center gap-6 pt-6 border-t border-[#d7e5d9]">
                        <div class="flex items-center gap-4">
                            <div class="flex -space-x-3">
                                <img class="w-10 h-10 rounded-full border-2 border-white object-cover shadow-sm" src="https://i.pravatar.cc/100?img=1" alt="Client">
                                <img class="w-10 h-10 rounded-full border-2 border-white object-cover shadow-sm" src="https://i.pravatar.cc/100?img=2" alt="Client">
                                <img class="w-10 h-10 rounded-full border-2 border-white object-cover shadow-sm" src="https://i.pravatar.cc/100?img=3" alt="Client">
                                <div class="flex items-center justify-center w-10 h-10 text-xs font-bold text-[#285d3a] bg-[#eaf4eb] border-2 border-white rounded-full shadow-sm">500+</div>
                            </div>
                            <div class="text-sm font-medium text-[#637568]">Trusted by <span class="text-[#1e3326] font-bold">500+</span> businesses</div>
                        </div>
                    </div>
                </div>

                <div class="relative lg:ml-auto w-full max-w-lg">
                    <div class="relative rounded-3xl overflow-hidden shadow-[0_20px_50px_rgba(30,51,38,0.12)] border-4 border-white sp-animate-float">
                        <img src="{{ !empty($webPage->hero_image) ? (Str::startsWith($webPage->hero_image, 'http') ? $webPage->hero_image : asset($webPage->hero_image)) : 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}" 
                             alt="{{ $webPage->title }} Showcase" 
                             class="w-full h-auto object-cover block">
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

    {{-- 
    =============================================================================
    DYNAMIC SECTIONS LOOP (ALL 9 TEMPLATES FULLY WORKING)
    =============================================================================
    --}}
    @foreach ($webPage->sections as $section)
        @php
            $c = $section->content ?? [];
            $sType = $section->section_type;
        @endphp

        {{-- 1. HERO BANNER --}}
        @if ($sType === 'hero')
            <section class="py-20 bg-white border-b border-[#d7e5d9]">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div>
                            @if(!empty($c['badge']))
                                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#eaf4eb] text-[#285d3a] border border-[#c8dfcc] text-xs font-bold uppercase tracking-wider mb-4">
                                    <span class="w-2 h-2 rounded-full bg-[#25d366]"></span>
                                    {{ $c['badge'] }}
                                </div>
                            @endif
                            <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-4 tracking-tight leading-tight">
                                {{ $c['heading'] ?? $section->title ?? $webPage->title }}
                            </h2>
                            <p class="text-lg text-[#637568] mb-8 leading-relaxed">
                                {{ $c['subtitle'] ?? $section->description }}
                            </p>
                            @if(!empty($c['cta_text']))
                                <a href="{{ $c['cta_link'] ?? '#contact' }}" class="inline-flex items-center px-7 py-3.5 text-sm font-bold text-white bg-[#397b4e] hover:bg-[#285d3a] rounded-full shadow-md hover:-translate-y-0.5 transition-all">
                                    {{ $c['cta_text'] }} {!! $svg($I['arrow'], 'w-4 h-4 ml-2') !!}
                                </a>
                            @endif
                        </div>
                        @if(!empty($c['image']))
                            <div class="rounded-3xl overflow-hidden border-4 border-white shadow-[0_16px_40px_rgba(30,51,38,0.12)]">
                                <img src="{{ Str::startsWith($c['image'], 'http') ? $c['image'] : asset($c['image']) }}" alt="{{ $section->title }}" class="w-full h-auto object-cover block" loading="lazy">
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif

        {{-- 2. TOPICS MARQUEE --}}
        @if ($sType === 'topics')
            @php
                $topics = is_array($c['topics'] ?? null) ? $c['topics'] : (is_string($c['topics'] ?? null) ? array_filter(array_map('trim', explode(',', $c['topics']))) : []);
            @endphp
            @if(count($topics) > 0)
                <div class="bg-[#397b4e] py-4 overflow-hidden border-y border-[#2d633e]" aria-label="Core focus topics">
                    <div class="flex w-max animate-[marqueeScroll_32s_linear_infinite]">
                        @for ($k = 0; $k < 2; $k++)
                            @foreach ($topics as $topic)
                                <span class="shrink-0 px-6 text-sm font-bold uppercase tracking-wider text-white whitespace-nowrap">{{ $topic }}</span>
                                <span class="shrink-0 text-[#25d366]" aria-hidden="true">✦</span>
                            @endforeach
                        @endfor
                    </div>
                </div>
            @endif
        @endif

        {{-- 3. ABOUT + FEATURE GRID --}}
        @if ($sType === 'about')
            @php
                $features = $c['items'] ?? $c['features'] ?? [];
            @endphp
            <section class="py-24 bg-[#f7fbf7]" id="about">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-start">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-[0.15em] text-[#397b4e] block mb-2">{{ $c['kicker'] ?? 'About the service' }}</span>
                            <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-5 tracking-tight">
                                {{ $c['heading'] ?? $section->title ?? 'Targeted, conversion-focused solutions.' }}
                            </h2>
                            <p class="text-lg text-[#637568] leading-relaxed mb-8">
                                {{ $c['paragraph'] ?? $section->description ?? 'We build scalable solutions tailored to your unique requirements.' }}
                            </p>
                            @if(count($features) > 0)
                                <div class="grid sm:grid-cols-2 gap-5">
                                    @foreach ($features as $f)
                                        @php
                                            $ic = is_array($f) ? ($f['icon'] ?? ($f[0] ?? 'check')) : 'check';
                                            $title = is_array($f) ? ($f['title'] ?? ($f[1] ?? '')) : '';
                                            $desc = is_array($f) ? ($f['description'] ?? ($f[2] ?? '')) : '';
                                            $benefit = is_array($f) ? ($f['benefit'] ?? ($f[3] ?? null)) : null;
                                        @endphp
                                        <div class="bg-white p-6 rounded-3xl border border-[#d7e5d9] shadow-[0_4px_20px_rgba(30,51,38,0.06)] hover:border-[#397b4e] transition-colors">
                                            <div class="w-12 h-12 rounded-2xl bg-[#eaf4eb] border border-[#c8dfcc] text-[#397b4e] flex items-center justify-center mb-4">
                                                {!! $renderIcon($ic) !!}
                                            </div>
                                            <h3 class="font-bold text-[#1e3326] mb-1.5">{{ $title }}</h3>
                                            <p class="text-sm text-[#637568] leading-relaxed mb-3">{{ $desc }}</p>
                                            @if($benefit)
                                                <p class="text-xs text-[#637568] leading-relaxed border-t border-[#d7e5d9] pt-3">
                                                    <span class="font-bold text-[#285d3a]">Benefit:</span> {{ $benefit }}
                                                </p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="lg:sticky lg:top-28 relative">
                            <div class="rounded-3xl overflow-hidden shadow-[0_20px_50px_rgba(30,51,38,0.12)] border-4 border-white">
                                @php
                                    $aboutImg = !empty($c['image']) ? $c['image'] : 'https://picsum.photos/seed/rt-about/900/1000';
                                @endphp
                                <img src="{{ Str::startsWith($aboutImg, 'http') ? $aboutImg : asset($aboutImg) }}" alt="About preview" class="w-full h-auto object-cover block" loading="lazy">
                            </div>
                            <div class="absolute -bottom-5 right-5 bg-[#1e3326] text-white px-6 py-4 rounded-2xl shadow-xl border border-[#397b4e]/40">
                                <p class="text-xs text-emerald-200/70 mb-0.5">Campaigns delivered</p>
                                <p class="text-2xl font-black text-[#25d366]">1,200+</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- 4. ALTERNATING ROWS --}}
        @if ($sType === 'rows')
            @php
                $rows = $c['items'] ?? [];
            @endphp
            <section class="py-24 bg-white border-b border-[#d7e5d9]">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <span class="text-xs font-bold uppercase tracking-[0.15em] text-[#397b4e] block mb-2">What's included</span>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-3 tracking-tight">
                            {{ $c['heading'] ?? $section->title ?? ("Transform your business with our " . $t . " service.") }}
                        </h2>
                        <p class="text-lg text-[#637568]">
                            {{ $c['subtitle'] ?? $section->description ?? 'Pick one service or combine them all. Built around your unique objectives.' }}
                        </p>
                    </div>
                    <div class="space-y-12">
                        @foreach ($rows as $i => $row)
                            @php
                                $ic = $row['icon'] ?? ($row[0] ?? 'check');
                                $rowTitle = $row['title'] ?? ($row[1] ?? 'Service Deliverable');
                                $rowDesc = $row['description'] ?? ($row[2] ?? '');
                                $rowImg = $row['image'] ?? ($row[3] ?? 'https://picsum.photos/seed/row' . ($i + 1) . '/700/520');
                            @endphp
                            <div class="grid lg:grid-cols-12 gap-8 items-center">
                                <div class="lg:col-span-4 {{ $i % 2 ? 'lg:order-2' : '' }}">
                                    <div class="rounded-3xl overflow-hidden border-4 border-white shadow-[0_12px_36px_rgba(30,51,38,0.12)]">
                                        <img src="{{ Str::startsWith($rowImg, 'http') ? $rowImg : asset($rowImg) }}" alt="{{ $rowTitle }}" class="w-full h-64 lg:h-72 object-cover block" loading="lazy">
                                    </div>
                                </div>
                                <div class="lg:col-span-8 {{ $i % 2 ? 'lg:order-1' : '' }}">
                                    <div class="bg-[#f0f7f0] rounded-3xl border border-[#d7e5d9] p-8 lg:p-10 h-full">
                                        <div class="flex items-center gap-3 mb-4">
                                            <span class="w-11 h-11 rounded-2xl bg-white border border-[#c8dfcc] text-[#397b4e] flex items-center justify-center shrink-0">
                                                {!! $renderIcon($ic) !!}
                                            </span>
                                            <h3 class="text-xl font-bold text-[#1e3326]">{{ $rowTitle }}</h3>
                                        </div>
                                        <p class="text-[#637568] text-sm sm:text-base leading-relaxed">{{ $rowDesc }}</p>
                                        <hr class="my-6 border-[#d7e5d9]">
                                        <div class="flex flex-wrap items-center justify-between gap-4">
                                            <div class="flex gap-3">
                                                <a href="tel:{{ $contact['tel'] }}" aria-label="Call us" class="w-11 h-11 rounded-full bg-white border border-[#d7e5d9] text-[#397b4e] flex items-center justify-center hover:bg-[#397b4e] hover:text-white hover:border-[#397b4e] transition-colors">{!! $svg($I['phone']) !!}</a>
                                                <a href="mailto:{{ $contact['email'] }}" aria-label="Email us" class="w-11 h-11 rounded-full bg-white border border-[#d7e5d9] text-[#397b4e] flex items-center justify-center hover:bg-[#397b4e] hover:text-white hover:border-[#397b4e] transition-colors">{!! $svg($I['mail']) !!}</a>
                                                <a href="https://wa.me/{{ $contact['wa'] }}" target="_blank" rel="noopener" aria-label="WhatsApp us" class="w-11 h-11 rounded-full bg-white border border-[#d7e5d9] text-[#397b4e] flex items-center justify-center hover:bg-[#25d366] hover:text-[#1e3326] hover:border-[#25d366] transition-colors">{!! $svg($I['chat']) !!}</a>
                                            </div>
                                            <a href="#contact" class="inline-flex items-center px-6 py-2.5 text-sm font-bold text-white bg-[#397b4e] hover:bg-[#285d3a] rounded-full shadow-sm hover:-translate-y-0.5 transition-all">
                                                Explore More {!! $svg($I['arrow'], 'w-4 h-4 ml-2') !!}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- 5. PROJECT SLIDER WITH BEFORE/AFTER STATS --}}
        @if ($sType === 'projects')
            @php
                $projects = $c['items'] ?? [];
            @endphp
            <section class="py-24 bg-[#f7fbf7] border-b border-[#d7e5d9]" id="projects">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
                    <div class="text-center mb-14">
                        <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#397b4e] block mb-2">Our Projects</span>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-3 tracking-tight">
                            {{ $c['heading'] ?? $section->title ?? 'Real numbers from real clients.' }}
                        </h2>
                        <p class="text-lg text-[#637568]">
                            {{ $c['subtitle'] ?? $section->description ?? 'Flip the switch to compare results before and after.' }}
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-10 items-center project-slider-block">
                        <div class="relative rounded-3xl overflow-hidden border-4 border-white shadow-[0_20px_50px_rgba(30,51,38,0.12)]">
                            @foreach ($projects as $i => $p)
                                @php
                                    $pImg = !empty($p['image']) ? $p['image'] : ('https://picsum.photos/seed/p' . ($i + 1) . '/900/700');
                                @endphp
                                <img data-pslide src="{{ Str::startsWith($pImg, 'http') ? $pImg : asset($pImg) }}" 
                                     alt="{{ $p['name'] ?? 'Project' }}" 
                                     class="w-full h-72 md:h-[26rem] object-cover {{ $i ? 'hidden' : '' }}" 
                                     loading="lazy">
                            @endforeach
                        </div>

                        <div>
                            @foreach ($projects as $i => $p)
                                @php
                                    $pName = $p['name'] ?? 'Growth Showcase';
                                    $pDesc = $p['description'] ?? 'Exceptional compounding returns achieved through rigorous execution.';
                                    
                                    $bRaw = $p['before'] ?? '720, 1020, 120%';
                                    $aRaw = $p['after'] ?? '2940, 4310, 488%';
                                    
                                    $bStats = str_contains($bRaw, ',') ? array_map('trim', explode(',', $bRaw)) : [$bRaw, '45', '1.2x'];
                                    $aStats = str_contains($aRaw, ',') ? array_map('trim', explode(',', $aRaw)) : [$aRaw, '380', '4.8x'];
                                @endphp
                                <div data-pslide class="{{ $i ? 'hidden' : '' }}">
                                    <h3 class="text-3xl font-extrabold text-[#1e3326] tracking-tight mb-3">
                                        Expect great things from <span class="text-[#397b4e]">{{ $pName }}</span>
                                    </h3>
                                    <p class="text-[#637568] mb-6 leading-relaxed">{{ $pDesc }}</p>
                                    
                                    <div class="grid grid-cols-3 gap-3">
                                        @foreach ([['Organic Traffic', 0], ['Ranking Keywords', 1], ['ROI Growth', 2]] as [$label, $k])
                                            <div class="bg-white rounded-2xl border border-[#d7e5d9] p-4 text-center">
                                                <p class="text-2xl font-black text-[#1e3326]" data-stat 
                                                   data-before="{{ $bStats[$k] ?? ($bStats[0] ?? '-') }}" 
                                                   data-after="{{ $aStats[$k] ?? ($aStats[0] ?? '-') }}">
                                                    {{ $aStats[$k] ?? ($aStats[0] ?? '-') }}
                                                </p>
                                                <p class="text-xs text-[#637568] mt-1">{{ $label }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                            <div class="flex items-center gap-3 my-6">
                                <span class="text-sm font-semibold text-[#637568]">Before</span>
                                <button type="button" role="switch" aria-checked="true" aria-label="Show results after" class="ba-switch relative w-14 h-8 rounded-full bg-[#397b4e] transition-colors focus:outline-none">
                                    <span class="ba-knob absolute left-1 top-1 w-6 h-6 bg-white rounded-full shadow transition-transform"></span>
                                </button>
                                <span class="text-sm font-semibold text-[#1e3326]">After</span>
                            </div>

                            <div class="flex flex-wrap items-center gap-4">
                                <a href="#contact" class="inline-flex items-center px-7 py-3.5 text-sm font-bold text-white bg-[#397b4e] hover:bg-[#285d3a] rounded-full shadow-md hover:-translate-y-0.5 transition-all">
                                    Get in Touch {!! $svg($I['arrow'], 'w-4 h-4 ml-2') !!}
                                </a>
                                @if(count($projects) > 1)
                                    <div class="flex gap-2 ml-auto">
                                        <button type="button" class="p-prev-btn w-11 h-11 rounded-full bg-white border border-[#d7e5d9] text-[#1e3326] flex items-center justify-center hover:bg-[#397b4e] hover:text-white transition-colors">{!! $svg($I['left']) !!}</button>
                                        <button type="button" class="p-next-btn w-11 h-11 rounded-full bg-white border border-[#d7e5d9] text-[#1e3326] flex items-center justify-center hover:bg-[#397b4e] hover:text-white transition-colors">{!! $svg($I['chev']) !!}</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- 6. WORKFLOW TIMELINE --}}
        @if ($sType === 'workflow')
            @php
                $steps = $c['items'] ?? [];
            @endphp
            <section class="py-24 bg-white border-b border-[#d7e5d9]" id="process">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
                    <div class="grid lg:grid-cols-2 gap-14 items-start">
                        <div class="lg:sticky lg:top-28">
                            <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#397b4e] block mb-2">Full workflow</span>
                            <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-4 tracking-tight">
                                {{ $c['heading'] ?? $section->title ?? ("How a " . $t . " project runs, end to end.") }}
                            </h2>
                            <p class="text-lg text-[#637568] leading-relaxed mb-8">
                                {{ $c['subtitle'] ?? $section->description ?? 'A structured workflow keeps every project on time and on target from kickoff to ongoing optimization.' }}
                            </p>
                            <a href="#contact" class="inline-flex items-center mt-4 px-7 py-3.5 text-sm font-bold text-white bg-[#1e3326] hover:bg-[#14241b] rounded-full hover:-translate-y-0.5 transition-all">
                                Contact Us {!! $svg($I['arrow'], 'w-4 h-4 ml-2') !!}
                            </a>
                        </div>
                        <ol class="relative space-y-6 before:absolute before:left-5 before:top-2 before:bottom-2 before:w-0.5 before:bg-[#d7e5d9]">
                            @foreach ($steps as $i => $step)
                                @php
                                    $ic = $step['icon'] ?? ($step[0] ?? 'check');
                                    $stepTitle = $step['title'] ?? ($step[1] ?? 'Milestone');
                                    $stepDesc = $step['description'] ?? ($step[2] ?? '');
                                @endphp
                                <li class="relative pl-16">
                                    <span class="absolute left-0 top-1 w-10 h-10 rounded-full bg-[#397b4e] text-white font-extrabold text-sm flex items-center justify-center border-4 border-white shadow-md">
                                        {{ str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                    <div class="bg-[#f7fbf7] p-6 rounded-3xl border border-[#d7e5d9] hover:border-[#397b4e] transition-colors">
                                        <span class="text-[#397b4e] block mb-2">{!! $renderIcon($ic) !!}</span>
                                        <h3 class="font-bold text-[#1e3326] mb-1">{{ $stepTitle }}</h3>
                                        <p class="text-sm text-[#637568] leading-relaxed">{{ $stepDesc }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </section>
        @endif

        {{-- 7. FAQ ACCORDION --}}
        @if ($sType === 'faqs' || $sType === 'faq')
            @php
                $faqs = $c['items'] ?? [];
            @endphp
            <section class="py-24 bg-[#f7fbf7] border-b border-[#d7e5d9]">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl">
                    <div class="text-center mb-16">
                        <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#397b4e] block mb-2">Knowledge Base</span>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-3 tracking-tight">
                            {{ $c['heading'] ?? $section->title ?? 'Frequently Asked Questions' }}
                        </h2>
                        <p class="text-lg text-[#637568]">
                            {{ $c['subtitle'] ?? $section->description ?? ("Everything you need to know about our " . $t . " services.") }}
                        </p>
                    </div>
                    <div class="space-y-4">
                        @foreach ($faqs as $i => $faq)
                            @php
                                $q = $faq['question'] ?? ($faq[0] ?? 'Question');
                                $a = $faq['answer'] ?? ($faq[1] ?? 'Answer');
                            @endphp
                            <div class="bg-white rounded-2xl shadow-sm border border-[#d7e5d9] overflow-hidden faq-item transition-all hover:border-[#397b4e] {{ $i === 0 ? 'faq-active' : '' }}">
                                <button type="button" class="faq-btn w-full px-8 py-6 text-left font-bold text-lg text-[#1e3326] flex justify-between items-center focus:outline-none">
                                    {{ $q }}
                                    <div class="w-8 h-8 rounded-full bg-[#f0f7f0] border border-[#d7e5d9] flex items-center justify-center flex-shrink-0 transition-all duration-300 faq-icon text-[#397b4e] ml-4">
                                        {!! $svg('M19 9l-7 7-7-7') !!}
                                    </div>
                                </button>
                                <div class="faq-content px-8 pb-6 text-[#637568] text-base leading-relaxed">
                                    {{ $a }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- 8. CTA BANNER --}}
        @if ($sType === 'cta')
            <section id="contact" class="py-20 bg-[#eaf4eb] border-y border-[#c8dfcc]">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl text-center">
                    <div class="bg-gradient-to-br from-[#1e3326] to-[#285d3a] rounded-3xl p-10 md:p-14 text-white shadow-2xl">
                        @if(!empty($c['image']))
                            <div class="mb-6 flex justify-center">
                                <img src="{{ Str::startsWith($c['image'], 'http') ? $c['image'] : asset($c['image']) }}" alt="{{ $c['heading'] ?? 'CTA' }}" class="max-h-48 rounded-2xl object-cover shadow-lg border-2 border-white/20">
                            </div>
                        @endif
                        @if(!empty($c['kicker']))
                            <span class="inline-block text-xs font-bold uppercase tracking-[0.16em] text-[#25d366] mb-3">
                                {{ $c['kicker'] }}
                            </span>
                        @endif
                        <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4 tracking-tight leading-tight">
                            {{ $c['heading'] ?? $section->title ?? 'Ready to accelerate your growth?' }}
                        </h2>
                        @if(!empty($c['description']) || $section->description)
                            <p class="text-emerald-100/90 text-lg max-w-2xl mx-auto mb-8 leading-relaxed">
                                {{ $c['description'] ?? $section->description }}
                            </p>
                        @endif
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ $c['button_link'] ?? '#contact' }}" class="inline-flex justify-center items-center px-9 py-4 text-base font-bold text-[#1e3326] bg-[#25d366] hover:bg-[#1fb355] rounded-full shadow-[0_4px_18px_rgba(37,211,102,0.35)] hover:-translate-y-0.5 transition-all">
                                {{ $c['button_text'] ?? 'Discuss Your Project' }} <span class="ml-2" aria-hidden="true">↗</span>
                            </a>
                            <a href="https://wa.me/{{ $contact['wa'] }}" target="_blank" rel="noopener" class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-white bg-white/10 hover:bg-white/20 border border-white/20 rounded-full transition-all">
                                {!! $svg($I['chat'], 'w-5 h-5 mr-2') !!} WhatsApp Us
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- 9. RELATED SERVICES --}}
        @if ($sType === 'related')
            @php
                $slugs = is_array($c['slugs'] ?? null) ? $c['slugs'] : (is_string($c['slugs'] ?? null) ? array_filter(array_map('trim', explode(',', $c['slugs']))) : []);
                
                $relatedServices = count($slugs) > 0 
                    ? \App\Models\Service::whereIn('slug', $slugs)->get() 
                    : collect();

                if ($relatedServices->isEmpty()) {
                    $relatedServices = \App\Models\Service::latest()->take(3)->get();
                }
            @endphp
            <section class="py-24 bg-white border-b border-[#d7e5d9]">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
                    <div class="text-center mb-16">
                        <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#397b4e] block mb-2">Complementary Solutions</span>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3326] mb-3 tracking-tight">
                            {{ $c['heading'] ?? $section->title ?? 'Explore Related Services' }}
                        </h2>
                        <p class="text-lg text-[#637568]">
                            {{ $c['subtitle'] ?? $section->description ?? 'Combine complementary capabilities to accelerate your time-to-market.' }}
                        </p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        @foreach ($relatedServices as $rel)
                            <article class="bg-[#f7fbf7] rounded-3xl border border-[#d7e5d9] p-8 hover:border-[#397b4e] hover:shadow-[0_12px_30px_rgba(30,51,38,0.08)] transition-all flex flex-col justify-between">
                                <div>
                                    <div class="w-12 h-12 rounded-2xl bg-[#eaf4eb] border border-[#c8dfcc] text-[#397b4e] flex items-center justify-center mb-6">
                                        <i class="fa-solid fa-arrow-trend-up"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-[#1e3326] mb-3">{{ $rel->title }}</h3>
                                    <p class="text-sm text-[#637568] leading-relaxed mb-6">{{ $rel->short_description ?: $rel->meta_description }}</p>
                                </div>
                                <a href="{{ route('services.show', $rel->slug) }}" class="inline-flex items-center text-sm font-bold text-[#397b4e] hover:text-[#285d3a]">
                                    Learn More {!! $svg($I['arrow'], 'w-4 h-4 ml-1.5') !!}
                                </a>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

    @endforeach

</main>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // FAQ Accordions
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

        // Project Sliders + Before/After switches
        document.querySelectorAll('.project-slider-block').forEach(slider => {
            const groups = { img: [], txt: [] };
            slider.querySelectorAll('[data-pslide]').forEach((el) => {
                const key = el.tagName === 'IMG' ? 'img' : 'txt';
                groups[key].push(el);
            });
            const total = groups.img.length;
            let current = 0;
            let showAfter = true;
            const sw = slider.querySelector('.ba-switch');

            const renderStats = () => {
                slider.querySelectorAll('[data-stat]').forEach(s => {
                    s.textContent = showAfter ? (s.dataset.after || s.textContent) : (s.dataset.before || s.textContent);
                });
            };

            const show = (n) => {
                if (total <= 0) return;
                current = (n + total) % total;
                ['img', 'txt'].forEach(k => groups[k].forEach((el, i) => el.classList.toggle('hidden', i !== current)));
            };

            slider.querySelector('.p-prev-btn')?.addEventListener('click', () => show(current - 1));
            slider.querySelector('.p-next-btn')?.addEventListener('click', () => show(current + 1));
            
            sw?.addEventListener('click', () => {
                showAfter = !showAfter;
                sw.setAttribute('aria-checked', showAfter);
                sw.classList.toggle('bg-[#397b4e]', showAfter);
                sw.classList.toggle('bg-[#b7c9bb]', !showAfter);
                renderStats();
            });

            renderStats();
        });
    });
</script>
@endpush
