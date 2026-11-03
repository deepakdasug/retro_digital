@extends('layouts.app')

@section('title', 'Digital Marketing Services | Retrotech Digital')
@section('description', 'Grow your brand with data-driven digital marketing, advanced SEO, and AI-enabled dashboards by Retrotech Digital.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/digital-marketing.css') }}">
@endpush

@section('content')

@php
    $contactPhone = '+91 99108 36538';
    $contactTel   = '+919910836538';
    $contactEmail = 'info@retrotechdigital.com';
    $contactWa    = '919910836538';

    $coreAreas = [
        [
            'title' => 'Local SEO',
            'desc'  => 'Local SEO is a practice used by professional SEO companies to rank your website higher for location specific queries such as “SEO services company near me” and “SEO company in Delhi”. It involves optimization of business profiles, managing local citations and generating location-specific content. This helps increase the website\'s online visibility for “services near me” searches, helping you get local leads.',
            'img'   => 'https://www.retrotechdigital.com/frontend/img/untitled-design.jpg',
            'tag'   => 'Local Discovery'
        ],
        [
            'title' => 'Ecommerce SEO',
            'desc'  => 'Ecommerce SEO is an optimization practice used by our SEO company for online businesses to increase their visibility and ranking on search engine pages for product related queries. It helps businesses drive organic traffic directly to product category pages to maximize the lead conversion rate. Ecommerce SEO services company involves optimization of category page, product description and overall technical performance of the website for a seamless user experience.',
            'img'   => 'https://www.retrotechdigital.com/frontend/img/ecommerce-seo-retrotech.webp',
            'tag'   => 'E-commerce'
        ],
        [
            'title' => 'Enterprise SEO',
            'desc'  => 'Ecommerce SEO is an optimization practice used by our SEO company for online businesses to increase their visibility and ranking on search engine pages for product related queries. It helps businesses drive organic traffic directly to product category pages to maximize the lead conversion rate. Ecommerce SEO services company involves optimization of category page, product description and overall technical performance of the website for a seamless user experience.',
            'img'   => 'https://www.retrotechdigital.com/frontend/img/enterprise-seo-retrotech.webp',
            'tag'   => 'Enterprise Scale'
        ],
        [
            'title' => 'Mobile SEO',
            'desc'  => 'It is a type of optimization practice used by our SEO company,where we optimise the website for users on mobile devices such as smartphones and tablets. It helps make the website mobile responsive, increases its speed and makes the navigation easy while ensuring the website is still crawlable. It includes practices like responsive design, page speed optimization, User Experience, mobile first indexing and local SEO.',
            'img'   => 'https://www.retrotechdigital.com/frontend/img/mobile-retrotech.webp',
            'tag'   => 'Mobile-First'
        ],
        [
            'title' => 'Video SEO',
            'desc'  => 'Video SEO is the process of optimizing video content to increase its visibility and ranking on search engine result pages (SERPs) including google and youtube. The main objective is to increase the views, engagement and traffic, ensuring higher CTR by the right audience. A professional SEO services company delivers video SEO practices such as keyword optimization, meta tags, thumbnail optimization and engagement metrics.',
            'img'   => 'https://www.retrotechdigital.com/frontend/img/video-seo-retrotech.webp',
            'tag'   => 'Video & YouTube'
        ],
        [
            'title' => 'App Store Optimization',
            'desc'  => 'App store optimization is a type of optimization provided by a professional SEO services company, which is used to increase the visibility and ranking of a mobile app in app stores such as google play store and Apple app store. Just like SEO for websites, ASO helps optimise apps, make them easily recoverable for users, eventually getting more downloads.',
            'img'   => 'https://www.retrotechdigital.com/frontend/img/app_store.jpg',
            'tag'   => 'Mobile Apps'
        ],
        [
            'title' => 'National SEO',
            'desc'  => 'National SEO is a strategic optimization technique that helps take your business nation wise. Unlike local SEO, it focuses on nationwide search terms rather than region specific. It is ideal for businesses that work across an entire country. It includes broad keyword targeting, content strategy, technical SEO and authority building. It helps your website rank globally and generate traffic within a nation.',
            'img'   => 'https://www.retrotechdigital.com/frontend/img/national-seo-retrotech.webp',
            'tag'   => 'Nationwide'
        ],
        [
            'title' => 'International SEO',
            'desc'  => 'International SEO is an optimization practice that helps rank your website and generate traffic across multiple countries and languages. It is ideal for businesses that work globally. It includes practices like implementing hreflang tags, using country-specific domains, creating culture wise content, performing local keyword research and setting Geo-targeting. Partnering with a professional SEO services company makes your website easily discoverable to global audiences.',
            'img'   => 'https://www.retrotechdigital.com/frontend/img/international-seo-retrotech.webp',
            'tag'   => 'Global Markets'
        ],
    ];

    $projectsData = [
        [
            'name'     => 'E-Commerce Workshop',
            'category' => 'Retail & E-commerce',
            'desc'     => 'Online store ranked for 400+ high-intent product queries, driving exponential non-paid conversions and revenue.',
            'before'   => [240, 380, '120%'],
            'after'    => [726, 1026, '488%'],
            'img'      => 'https://www.retrotechdigital.com/frontend/img/e-commerce-workshop-retrotech.webp'
        ],
        [
            'name'     => 'Education Portals',
            'category' => 'EdTech & Portals',
            'desc'     => 'Empowering institutions with online learning systems, student management & exam automation.',
            'before'   => [310, 420, '140%'],
            'after'    => [726, 1026, '488%'],
            'img'      => 'https://www.retrotechdigital.com/frontend/img/education-retrotech.webp'
        ],
        [
            'name'     => 'Real Estate Apps',
            'category' => 'Real Estate & PropTech',
            'desc'     => 'Building patient-friendly platforms for appointment booking, reports, and teleconsultation.',
            'before'   => [280, 490, '150%'],
            'after'    => [726, 1026, '488%'],
            'img'      => 'https://www.retrotechdigital.com/frontend/img/real_estate-retrotech.webp'
        ],
        [
            'name'     => 'Legal Industries',
            'category' => 'Corporate & Legal',
            'desc'     => 'We design property listing platforms with map integration, filtering, and 360° virtual tours.',
            'before'   => [190, 310, '110%'],
            'after'    => [726, 1026, '488%'],
            'img'      => 'https://www.retrotechdigital.com/frontend/img/legal-industry-retrotech.webp'
        ],
        [
            'name'     => 'Insurance Industry',
            'category' => 'Finance & Insurance',
            'desc'     => 'Accelerating policy comparison and insurance lead volume through compliance-first search and paid funnels.',
            'before'   => [220, 350, '130%'],
            'after'    => [726, 1026, '488%'],
            'img'      => 'https://www.retrotechdigital.com/frontend/img/insurance-industry-retrotech.webp'
        ],
        [
            'name'     => 'Travel & Hospitality',
            'category' => 'Tourism & Stays',
            'desc'     => 'Boosting direct guest bookings with high-intent localized search campaigns and digital engagement.',
            'before'   => [260, 410, '160%'],
            'after'    => [726, 1026, '488%'],
            'img'      => 'https://www.retrotechdigital.com/frontend/img/travel-final-retrotech.webp'
        ],
    ];

    $processSteps = [
        ['title' => 'Strategy Development', 'desc' => 'We define digital goals, target audience, and channels to create a customized marketing roadmap for your brand.'],
        ['title' => 'Market Research & Audience Analysis', 'desc' => 'We analyze competitors, industry trends, and audience behavior to discover valuable insights for effective targeting.'],
        ['title' => 'Content & Creative Planning', 'desc' => 'Our creative team plans engaging content ideas, visuals, and brand messaging aligned with your digital strategy.'],
        ['title' => 'SEO & Website Optimization', 'desc' => 'We optimize website structure, content, and keywords to enhance visibility, ranking, and user experience.'],
        ['title' => 'Social Media Marketing Planning', 'desc' => 'We develop platform-specific strategies to increase reach, build engagement, and strengthen brand presence online.'],
        ['title' => 'Email Marketing Planning', 'desc' => 'Targeted email campaigns are crafted to nurture leads, promote offers, and build long-term customer loyalty.'],
        ['title' => 'Paid Advertising (PPC & Social Ads)', 'desc' => 'We run data-driven ad campaigns on Google and social media to drive targeted traffic and maximize ROI.'],
        ['title' => 'Analytics & Performance Tracking', 'desc' => 'Campaign performance is tracked through analytics tools to measure engagement, conversions, and growth.'],
        ['title' => 'Optimization & Continuous Improvement', 'desc' => 'Data insights are used to refine strategies and enhance overall campaign effectiveness continuously.'],
        ['title' => 'Online Reputation & Brand Management', 'desc' => 'We protect and enhance your brand image online through proactive monitoring and positive engagement.'],
    ];

    $testimonials = [
        ['Priya Sharma', 'Marketing Head, UrbanNest Interiors 🇮🇳', 'https://randomuser.me/api/portraits/women/65.jpg', 'Retrotech helped us grow our online presence with a perfectly executed social media strategy. Our brand visibility and inquiries have increased dramatically within months!'],
        ['Michael Thompson', 'CEO, TechNova Solutions 🇺🇸', 'https://randomuser.me/api/portraits/men/32.jpg', 'The team built a robust and responsive web application for our company. Their communication, technical expertise, and timely delivery were top-notch.'],
        ['Arjun Patel', 'Founder, FitAura Gym Chain 🇮🇳', 'https://randomuser.me/api/portraits/men/45.jpg', 'Our local SEO rankings improved tremendously! Thanks to Retrotech, we now receive 3x more customer inquiries from Google.'],
        ['Sophie Martin', 'Product Manager, HealthBridge App 🇬🇧', 'https://randomuser.me/api/portraits/women/48.jpg', 'They developed a clean, user-friendly mobile app for our healthcare startup. The experience was seamless from design to deployment.'],
        ['Rohit Mehta', 'Director, Mehta Enterprises 🇮🇳', 'https://randomuser.me/api/portraits/men/15.jpg', 'From logo to Google Ads — Retrotech handled everything with creativity and professionalism. Our online sales jumped by 45%.'],
        ['Emily Johnson', 'Sales Head, Global Freight Co. 🇨🇦', 'https://randomuser.me/api/portraits/women/22.jpg', 'They built a custom CRM for our logistics operations. It’s intuitive, fast, and integrates perfectly with our existing systems.'],
        ['Neha Gupta', 'Owner, StyleAura Boutique 🇮🇳', 'https://randomuser.me/api/portraits/women/33.jpg', 'They redesigned our website and ran digital campaigns — the results were fantastic. My online orders doubled in just 2 months!'],
        ['David Miller', 'Managing Director, EcoTrend Store 🇦🇺', 'https://randomuser.me/api/portraits/men/28.jpg', 'Excellent eCommerce development support. Smooth functionality, fast speed, and an amazing UI that our customers love.'],
        ['Karan Verma', 'Founder, Cafe Aroma 🇮🇳', 'https://randomuser.me/api/portraits/men/23.jpg', 'Their social media team is brilliant — engaging content, great visuals, and consistent growth in followers and engagement.'],
        ['Laura Rodriguez', 'Marketing Consultant, BlueSky Digital 🇪🇸', 'https://randomuser.me/api/portraits/women/26.jpg', 'Retrotech helped optimize our website and improve SEO performance. They’re reliable, transparent, and always deliver on time.'],
    ];

    $sixReasons = [
        ['Experienced IT Professionals', 'Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.'],
        ['Customised Business Solutions', 'We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.'],
        ['On-Time Project Delivery', 'We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.'],
        ['Transparent Communication', 'We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.'],
        ['Scalable & Secure Technologies', 'Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.'],
        ['Dedicated Post-Launch Support', 'We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.'],
    ];

    $faqsList = [
        [
            'What IT services does your company provide?',
            'We provide website development, mobile app development, custom software solutions, UI/UX design, cloud services, digital marketing, SEO, and ongoing IT support.'
        ],
        [
            'Do you provide customized solutions for businesses?',
            'Yes, we develop customized IT solutions based on your business requirements, target audience, workflow, budget, and long-term goals.'
        ],
        [
            'How long does it take to complete an IT project?',
            'The project timeline depends on its scope, features, and complexity. After reviewing your requirements, our team provides a clear development plan and estimated delivery timeline.'
        ],
        [
            'Do you provide support after the project is completed?',
            'Yes, we provide post-launch maintenance, technical support, security updates, performance monitoring, bug fixes, and future enhancements to keep your solution running smoothly.'
        ],
    ];
@endphp

<main id="dm-page">

    {{-- =========================================================================
         1. HERO SECTION (Editorial, Clean, Minimal)
         ========================================================================= --}}
    <section class="dm-hero">
        <div class="dm-container">
            <div class="dm-hero-grid">

                {{-- Left: Clean Editorial Copy --}}
                <div>
                    <span class="dm-kicker">Digital Marketing &amp; SEO Agency</span>

                    <h1 class="dm-hero-h1">
                        Digital Marketing
                        <span class="dm-hero-h1-sub">Grow Your Brand with Data-Driven Marketing</span>
                    </h1>

                    <p class="dm-subtitle">
                        An experienced SEO and digital marketing company providing search optimization, multi-channel marketing, and strategic growth campaigns to help businesses increase online visibility and win customer trust.
                    </p>

                    <div class="dm-hero-actions">
                        <a href="#dm-consult" class="dm-btn-primary">
                            Get Free Consultation <span aria-hidden="true">→</span>
                        </a>
                        <a href="#dm-services" class="dm-btn-secondary">
                            View Capabilities <span aria-hidden="true">↓</span>
                        </a>
                    </div>

                    <div class="dm-hero-proof">
                        <div class="dm-proof-item">
                            <span class="dm-proof-val">4.9 / 5.0</span>
                            <span class="dm-proof-lbl">5,000+ Reviews</span>
                        </div>
                        <div class="dm-proof-item">
                            <span class="dm-proof-val">500+</span>
                            <span class="dm-proof-lbl">Brands Scaled</span>
                        </div>
                        <div class="dm-proof-item">
                            <span class="dm-proof-val">+488%</span>
                            <span class="dm-proof-lbl">Average ROI</span>
                        </div>
                    </div>
                </div>

                {{-- Right: Direct Consultation Card --}}
                <div id="dm-consult">
                    <div class="dm-consult-card">
                        <h2 class="dm-consult-title">Request a Consultation</h2>
                        <p class="dm-consult-sub">Speak with our strategists about your website and growth targets.</p>

                        @if(session('success'))
                            <div style="margin-bottom: 0.75rem; padding: 0.65rem 0.85rem; border-radius: 8px; background: #eaf4ec; color: #2f6f46; font-size: 0.8rem; font-weight: 600;">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="dm-form-group">
                                <label for="c_name" class="dm-form-label">Your Name <span class="dm-req">*</span></label>
                                <input type="text" id="c_name" name="name" class="dm-input" placeholder="John Doe" required>
                            </div>

                            <div class="dm-form-row">
                                <div class="dm-form-group">
                                    <label for="c_email" class="dm-form-label">Email Address <span class="dm-req">*</span></label>
                                    <input type="email" id="c_email" name="email" class="dm-input" placeholder="name@company.com" required>
                                </div>
                                <div class="dm-form-group">
                                    <label for="c_phone" class="dm-form-label">Phone Number <span class="dm-req">*</span></label>
                                    <input type="tel" id="c_phone" name="phone" class="dm-input" placeholder="+91 99108 36538" required>
                                </div>
                            </div>

                            <div class="dm-form-group">
                                <label for="c_service" class="dm-form-label">Service Area <span class="dm-req">*</span></label>
                                <select id="c_service" name="service" class="dm-input" required>
                                    <option value="Digital Marketing" selected>Digital Marketing Strategy</option>
                                    <option value="Local SEO">Local SEO</option>
                                    <option value="Ecommerce SEO">Ecommerce SEO</option>
                                    <option value="Enterprise SEO">Enterprise SEO</option>
                                    <option value="Mobile & Video SEO">Mobile &amp; Video SEO</option>
                                    <option value="App Store Optimization">App Store Optimization (ASO)</option>
                                    <option value="National & International SEO">National &amp; International SEO</option>
                                </select>
                            </div>

                            <div class="dm-form-group">
                                <label for="c_message" class="dm-form-label">Project Overview <span class="dm-req">*</span></label>
                                <textarea id="c_message" name="message" rows="2" class="dm-input" placeholder="Tell us about your brand and current objectives..." required></textarea>
                            </div>

                            <button type="submit" class="dm-consult-submit-btn">
                                <span>Submit Request</span>
                                <span aria-hidden="true">→</span>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- =========================================================================
         2. NEXT-GEN PLATFORMS (AI DASHBOARDS - Clean Editorial & Full Visibility)
         ========================================================================= --}}
    <section class="dm-ai-section" id="dm-ai">
        <div class="dm-container">
            <div class="dm-ai-grid">

                {{-- Left: Editorial Narrative & Features (Matching Hero Quality) --}}
                <div class="dm-ai-content">
                    <span class="dm-kicker">Next-Gen Platforms</span>

                    <h2 class="dm-ai-h2">
                        <span class="dm-ai-h2-main">Introducing Industry-First,</span>
                        <span class="dm-ai-h2-sub">AI-Enabled Dashboards</span>
                    </h2>

                    <p class="dm-ai-desc">
                        Empower your growth strategy with next-generation analytics that unite search engine intelligence, real-time consumer intent, and conversational AI tools to maximize organic performance.
                    </p>

                    <div class="dm-ai-features">
                        <div class="dm-ai-feature-card">
                            <div class="dm-ai-icon-bubble">
                                <i class="fa-solid fa-comments" aria-hidden="true"></i>
                            </div>
                            <h3 class="dm-ai-card-title">Speech-to-Text AI Agent</h3>
                            <p class="dm-ai-card-p">
                                Converts voice into accurate real-time text to power natural conversational customer interactions.
                            </p>
                            <span class="dm-ai-benefit-tag">
                                <strong>Benefit:</strong> 3x faster response times and seamless query handling.
                            </span>
                        </div>

                        <div class="dm-ai-feature-card">
                            <div class="dm-ai-icon-bubble">
                                <i class="fa-solid fa-wand-magic-sparkles" aria-hidden="true"></i>
                            </div>
                            <h3 class="dm-ai-card-title">AI Creative Generator</h3>
                            <p class="dm-ai-card-p">
                                Generates customized, on-brand graphics and campaign visuals instantly from simple text prompts.
                            </p>
                            <span class="dm-ai-benefit-tag">
                                <strong>Benefit:</strong> Fast content production with reduced external design costs.
                            </span>
                        </div>
                    </div>

                    <div class="dm-ai-actions">
                        <a href="#dm-consult" class="dm-btn-primary">
                            <span>Request AI Demo</span>
                            <span aria-hidden="true">→</span>
                        </a>
                        <a href="#dm-services" class="dm-btn-secondary">
                            <span>View Capabilities</span>
                            <span aria-hidden="true">↓</span>
                        </a>
                    </div>
                </div>

                {{-- Right: Full-Visibility Media Frame --}}
                <div class="dm-ai-media-col">
                    <div class="dm-ai-media-frame">
                        <div class="dm-frame-img-wrap">
                            <img src="https://www.retrotechdigital.com/frontend/img/ai-chat.png" alt="Retrotech AI Dashboard Demo" loading="lazy">
                        </div>
                        <div class="dm-ai-caption">
                            <span>Retrotech AI Analytics &amp; Search Console</span>
                            <span class="dm-live-badge">
                                <span class="dm-pulse-dot"></span>
                                Live Platform Demo
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- =========================================================================
         3. CORE GROWTH DISCIPLINES (Left Fixed Content + Right Scroll-Driven Cards)
         ========================================================================= --}}
    <section class="dm-services-scroll-section" id="dm-services">
        <div class="dm-container">
            <div class="dm-services-layout">

                {{-- Left: Content (Fixed on left) --}}
                <div class="dm-services-left">
                    <span class="dm-kicker">Core Growth Disciplines</span>
                    <h2 class="dm-services-h2">
                        <span class="dm-services-h2-main">Transform Your Business</span>
                        <span class="dm-services-h2-sub">with Our SEO Services</span>
                    </h2>
                    <p class="dm-services-desc">
                        Explore our specialized search disciplines designed to capture high-intent queries, accelerate qualified traffic, and generate predictable business leads.
                    </p>
                    <div class="dm-services-actions">
                        <a href="#dm-consult" class="dm-btn-primary">
                            <span>Get Free Consultation</span>
                            <span aria-hidden="true">→</span>
                        </a>
                        <div class="dm-services-arrows">
                            <button type="button" class="dm-nav-arrow" id="dmServicesPrev" aria-label="Previous Service">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                            <button type="button" class="dm-nav-arrow" id="dmServicesNext" aria-label="Next Service">
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Right: Standalone Card Stage (Only one card visible at a time) --}}
                <div class="dm-services-right-col">
                    <div class="dm-services-stage" id="dmServicesStage">
                        @foreach ($coreAreas as $idx => $area)
                        <article class="dm-service-card" data-service-idx="{{ $idx }}">
                            <div>
                                <div class="dm-service-thumb">
                                    <img src="{{ $area['img'] }}" alt="{{ $area['title'] }}" loading="lazy">
                                    <span class="dm-service-tag">{{ $area['tag'] }}</span>
                                    <span class="dm-card-idx-badge">{{ str_pad((string)($idx + 1), 2, '0', STR_PAD_LEFT) }} / 08</span>
                                </div>

                                <div class="dm-service-body">
                                    <h3 class="dm-service-title">{{ $area['title'] }}</h3>
                                    <p class="dm-service-desc">{{ $area['desc'] }}</p>
                                </div>
                            </div>

                            <div class="dm-service-foot">
                                <div class="dm-service-contacts">
                                    <a href="tel:{{ $contactTel }}" aria-label="Call {{ $contactPhone }}" class="dm-mini-icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </a>
                                    <a href="mailto:{{ $contactEmail }}" aria-label="Email Us" class="dm-mini-icon">
                                        <i class="fa-solid fa-envelope"></i>
                                    </a>
                                    <a href="https://wa.me/{{ $contactWa }}" target="_blank" rel="noopener" aria-label="WhatsApp" class="dm-mini-icon">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                </div>
                                <a href="#dm-consult" class="dm-service-link">
                                    <span>Request Call →</span>
                                </a>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- =========================================================================
         5. CASE STUDIES & RESULTS (Before / After Comparison)
         ========================================================================= --}}
    <section class="dm-cases-section dm-section-space" id="dm-cases">
        <div class="dm-container">
            <div class="dm-cases-grid">

                {{-- Left: Project Showcase Image --}}
                <div>
                    <div class="dm-case-visual">
                        @foreach ($projectsData as $i => $proj)
                        <img data-case-img="{{ $i }}" src="{{ $proj['img'] }}" alt="{{ $proj['name'] }}" style="{{ $i === 0 ? 'opacity: 1;' : 'opacity: 0; pointer-events: none;' }}" loading="lazy">
                        @endforeach
                    </div>
                </div>

                {{-- Right: Content, Industry Switcher, Stats & Toggle --}}
                <div>
                    <span class="dm-kicker">Our Projects</span>

                    <h2 class="dm-title-lg" style="margin-bottom: 0.5rem;">
                        Expect Great Things from Your Agency
                    </h2>

                    <p class="dm-subtitle" style="margin-bottom: 1.5rem;">
                        Believe it because you've seen it. Here are real numbers from just one successful Victorious partner.
                    </p>

                    {{-- Industry Tabs --}}
                    <div class="dm-case-tabs-row" role="tablist">
                        @foreach ($projectsData as $i => $proj)
                        <button type="button" class="dm-case-tab-btn {{ $i === 0 ? 'active' : '' }}" data-case-tab="{{ $i }}">
                            {{ $proj['name'] }}
                        </button>
                        @endforeach
                    </div>

                    {{-- Dynamic Project Details --}}
                    @foreach ($projectsData as $i => $proj)
                    <div data-case-txt="{{ $i }}" style="{{ $i === 0 ? 'display: block;' : 'display: none;' }}">
                        <h3 class="dm-case-lead-h3">
                            Expect Great Things · <span style="color: var(--dm-green-brand);">{{ $proj['name'] }}</span>
                        </h3>
                        <p class="dm-case-lead-p">
                            {{ $proj['desc'] }}
                        </p>

                        <div class="dm-case-numbers">
                            <div class="dm-number-box">
                                <div class="dm-num-val" data-stat data-before="{{ $proj['before'][0] }}" data-after="{{ $proj['after'][0] }}">{{ $proj['after'][0] }}</div>
                                <div class="dm-num-lbl">Organic Traffic</div>
                            </div>
                            <div class="dm-number-box">
                                <div class="dm-num-val" data-stat data-before="{{ $proj['before'][1] }}" data-after="{{ $proj['after'][1] }}">{{ $proj['after'][1] }}</div>
                                <div class="dm-num-lbl">Ranking Keywords</div>
                            </div>
                            <div class="dm-number-box">
                                <div class="dm-num-val" data-stat data-before="{{ $proj['before'][2] }}" data-after="{{ $proj['after'][2] }}" style="color: var(--dm-green-brand);">{{ $proj['after'][2] }}</div>
                                <div class="dm-num-lbl">ROI Growth</div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- Actions Row: Toggle Switch & Audit Button in a Single Line --}}
                    <div class="dm-case-actions-row">
                        <div class="dm-toggle-wrap">
                            <span style="font-size: 0.8rem; font-weight: 700; color: var(--dm-ink-muted);">Before SEO</span>
                            <button type="button" role="switch" aria-checked="true" aria-label="Toggle Results Before and After" id="dmSwitch" class="dm-clean-switch">
                                <span class="dm-clean-knob"></span>
                            </button>
                            <span style="font-size: 0.8rem; font-weight: 700; color: var(--dm-forest-deep);">After SEO</span>
                        </div>

                        <a href="#dm-consult" class="dm-btn-primary">
                            Get Free SEO Audit <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- =========================================================================
         6. 10-STEP PROCESS (Clean, Light, Linear)
         ========================================================================= --}}
    <section class="dm-process-section dm-section-space" id="dm-process">
        <div class="dm-container">
            <div class="dm-process-grid">

                {{-- Left: Sticky Overview & 4 Pillars --}}
                <div class="dm-sticky-col">
                    <span class="dm-kicker">Our SEO Process</span>

                    <h2 class="dm-title-lg dm-process-h2">
                        <span class="dm-process-h2-main">Structured Steps</span>
                        <span class="dm-process-h2-sub">for Meaningful Rankings</span>
                    </h2>

                    <p class="dm-subtitle" style="margin-bottom: 1.5rem;">
                        An experienced SEO services company follows structured steps to effectively help organizations with their SEO processes and optimize their ranking on search engines. The steps in our SEO process are as follows:
                    </p>

                    <div class="dm-pillars-list">
                        <div class="dm-pillar-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <p>Guaranteed Search Engine Rankings</p>
                        </div>
                        <div class="dm-pillar-item">
                            <i class="fa-solid fa-chart-line"></i>
                            <p>Focused on Your ROI</p>
                        </div>
                        <div class="dm-pillar-item">
                            <i class="fa-solid fa-shield-halved"></i>
                            <p>Ethical SEO Practices</p>
                        </div>
                        <div class="dm-pillar-item">
                            <i class="fa-solid fa-chart-pie"></i>
                            <p>Advanced Analytics and Reporting</p>
                        </div>
                    </div>

                    <a href="#dm-consult" class="dm-btn-primary">
                        Contact Us Today <span aria-hidden="true">→</span>
                    </a>
                </div>

                {{-- Right: 10 Steps List --}}
                <div>
                    <div class="dm-steps-list">
                        @foreach ($processSteps as $idx => $step)
                        <article class="dm-step-row">
                            <span class="dm-step-num">{{ str_pad((string) ($idx + 1), 2, '0', STR_PAD_LEFT) }}</span>
                            <div>
                                <h3 class="dm-step-h4">{{ $step['title'] }}</h3>
                                <p class="dm-step-desc">{{ $step['desc'] }}</p>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- =========================================================================
         7. WHY CHOOSE RETROTECH (Top 6 Reasons)
         ========================================================================= --}}
    <section class="dm-reasons-section dm-section-space">
        <div class="dm-container">
            <div style="text-align: center; max-width: 44rem; margin: 0 auto;">
                <span class="dm-kicker">Why Choose Us</span>
                <h2 class="dm-title-lg">Top Six Reasons to Trust Our IT Expertise</h2>
                <p class="dm-subtitle" style="margin-inline: auto;">
                    Empower your business with reliable, secure, and scalable IT solutions tailored to your unique goals and requirements.
                </p>
            </div>

            <div class="dm-reasons-grid">
                @foreach ($sixReasons as $rIdx => $reason)
                <div class="dm-reason-box">
                    <div class="dm-reason-index">0{{ $rIdx + 1 }}</div>
                    <h3 class="dm-reason-h3">{{ $reason[0] }}</h3>
                    <p class="dm-reason-p">{{ $reason[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- =========================================================================
         8. TESTIMONIALS (Professional Reviews Marquee)
         ========================================================================= --}}
    <section class="dm-reviews-section dm-section-space">
        <div class="dm-container">
            <div class="dm-reviews-header">
                <div>
                    <span class="dm-kicker">Client Feedback</span>
                    <h2 class="dm-title-lg">Customer Experiences That Speak for Themselves</h2>
                    <p class="dm-subtitle" style="margin-top: 0.5rem; margin-bottom: 0;">
                        Real results and verified testimonials from fast-growing businesses worldwide.
                    </p>
                </div>

                <div class="dm-reviews-rating-badge">
                    <div>
                        <div class="dm-rating-score">4.9 / 5.0</div>
                        <div class="dm-rating-stars">★★★★★</div>
                    </div>
                    <div class="dm-rating-divider"></div>
                    <div class="dm-rating-platforms">
                        <img src="https://www.retrotechdigital.com/frontend/img/trustpilot.png" alt="Trustpilot" loading="lazy">
                        <img src="https://www.retrotechdigital.com/frontend/img/google-icon.png" alt="Google" loading="lazy">
                    </div>
                </div>
            </div>
        </div>

        {{-- Infinite Right-to-Left Scrolling Reviews Marquee --}}
        <div class="dm-reviews-marquee-wrap">
            <div class="dm-reviews-marquee-track">
                @for ($set = 0; $set < 3; $set++)
                <div class="dm-reviews-group" @if($set > 0) aria-hidden="true" @endif>
                    @foreach ($testimonials as $t)
                    <article class="dm-review-card">
                        <div class="dm-review-top">
                            <div class="dm-review-rating">
                                <div class="dm-review-stars" aria-label="5 out of 5 stars">★★★★★</div>
                                <span class="dm-review-score">5.0</span>
                            </div>
                            <span class="dm-review-badge">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <span>Verified</span>
                            </span>
                        </div>

                        <blockquote class="dm-review-quote">
                            “{{ $t[3] }}”
                        </blockquote>

                        <div class="dm-review-author">
                            <div class="dm-author-avatar-wrap">
                                <img src="{{ $t[2] }}" alt="{{ $t[0] }}" class="dm-author-avatar" loading="lazy" width="44" height="44">
                                <span class="dm-avatar-badge" title="Verified Client">✓</span>
                            </div>
                            <div class="dm-author-meta">
                                <h4 class="dm-author-name">{{ $t[0] }}</h4>
                                <p class="dm-author-role">{{ $t[1] }}</p>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
                @endfor
            </div>
        </div>
    </section>

    {{-- =========================================================================
         9. FAQS (Minimal Line Accordion)
         ========================================================================= --}}
    <section class="dm-faq-section dm-section-space" id="dm-faq">
        <div class="dm-container">
            <div style="text-align: center; max-width: 44rem; margin: 0 auto;">
                <span class="dm-kicker">Got Questions?</span>
                <h2 class="dm-title-lg">Frequently Asked Questions</h2>
                <p class="dm-subtitle" style="margin-inline: auto;">
                    Get answers to common queries about our services
                </p>
            </div>

            <div class="dm-faq-list">
                @foreach ($faqsList as $faq)
                <div class="dm-faq-row">
                    <button type="button" class="dm-faq-trigger">
                        <span>{{ $faq[0] }}</span>
                        <span class="dm-faq-icon-sign">+</span>
                    </button>
                    <div class="dm-faq-answer">
                        {{ $faq[1] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- =========================================================================
         10. BLOG HIGHLIGHTS
         ========================================================================= --}}
    <section class="dm-blog-section dm-section-space">
        <div class="dm-container">
            <div style="display: flex; flex-direction: column; gap: 1rem; align-items: flex-start; justify-content: space-between;">
                <div>
                    <span class="dm-kicker">From the Blog</span>
                    <h2 class="dm-title-lg">Check Out Latest News Update &amp; Articles</h2>
                </div>
                <a href="{{ route('blog') }}" class="dm-btn-secondary">
                    View All Blogs <span aria-hidden="true">→</span>
                </a>
            </div>

            <div class="dm-blog-grid">
                <article class="dm-article-card">
                    <div class="dm-article-img">
                        <img src="https://images.unsplash.com/photo-1709281847802-9aef10b6d4bf?auto=format&fit=crop&w=1600&h=900&q=80" alt="How SEO Helps Businesses Generate Consistent Organic Leads" loading="lazy">
                    </div>
                    <div class="dm-article-body">
                        <span class="dm-article-cat">Strategy · 31 JAN</span>
                        <h3 class="dm-article-h3">How SEO Helps Businesses Generate Consistent Organic Leads</h3>
                        <p class="dm-article-p">
                            Learn how modern search engine optimization delivers compounding organic discovery and long-term customer acquisition.
                        </p>
                        <a href="{{ route('blog') }}" class="dm-service-link">Read Full Guide →</a>
                    </div>
                </article>

                <article class="dm-article-card">
                    <div class="dm-article-img">
                        <img src="https://images.unsplash.com/photo-1780253256194-34e5867ccb8c?auto=format&fit=crop&w=1600&h=900&q=80" alt="Why Modern Businesses Need a Responsive and Secure Website" loading="lazy">
                    </div>
                    <div class="dm-article-body">
                        <span class="dm-article-cat">Development · 31 JAN</span>
                        <h3 class="dm-article-h3">Why Modern Businesses Need a Responsive and Secure Website</h3>
                        <p class="dm-article-p">
                            Explore how mobile performance, site speed, and HTTPS security directly impact search rankings and visitor retention.
                        </p>
                        <a href="{{ route('blog') }}" class="dm-service-link">Read Full Guide →</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

</main>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Minimal FAQ Toggle
        const faqRows = document.querySelectorAll('#dm-page .dm-faq-row');
        faqRows.forEach(row => {
            const btn = row.querySelector('.dm-faq-trigger');
            if (btn) {
                btn.addEventListener('click', () => {
                    const isOpen = row.classList.contains('open');
                    faqRows.forEach(r => r.classList.remove('open'));
                    if (!isOpen) row.classList.add('open');
                });
            }
        });

        // Case Studies Tab Switcher + Before/After Toggle
        const caseTabs = document.querySelectorAll('#dm-page [data-case-tab]');
        const caseImgs = document.querySelectorAll('#dm-page [data-case-img]');
        const caseTxts = document.querySelectorAll('#dm-page [data-case-txt]');
        let currentTab = 0;
        let isAfter = true;

        const updateTab = (idx) => {
            currentTab = idx;
            caseTabs.forEach(t => t.classList.toggle('active', parseInt(t.dataset.caseTab) === idx));
            caseImgs.forEach(img => {
                const match = parseInt(img.dataset.caseImg) === idx;
                img.style.opacity = match ? '1' : '0';
                img.style.pointerEvents = match ? 'auto' : 'none';
            });
            caseTxts.forEach(txt => {
                txt.style.display = parseInt(txt.dataset.caseTxt) === idx ? 'block' : 'none';
            });
            renderStats();
        };

        const renderStats = () => {
            const activeTxt = document.querySelector(`#dm-page [data-case-txt="${currentTab}"]`);
            if (!activeTxt) return;
            activeTxt.querySelectorAll('[data-stat]').forEach(stat => {
                stat.textContent = isAfter ? stat.dataset.after : stat.dataset.before;
            });
        };

        caseTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                updateTab(parseInt(tab.dataset.caseTab));
            });
        });

        const toggleSwitch = document.getElementById('dmSwitch');
        toggleSwitch?.addEventListener('click', () => {
            isAfter = !isAfter;
            toggleSwitch.setAttribute('aria-checked', isAfter);
            renderStats();
        });
        renderStats();

        // =====================================================================
        // Core Growth Disciplines: Pure Arrow-Driven Slider (No On-Scroll Hijack)
        // =====================================================================
        const stage = document.getElementById('dmServicesStage');
        const cards = stage ? Array.from(stage.querySelectorAll('.dm-service-card')) : [];
        const prevBtn = document.getElementById('dmServicesPrev');
        const nextBtn = document.getElementById('dmServicesNext');

        if (stage && cards.length > 0) {
            const totalCards = cards.length;
            let currentIdx = 0;
            let isAnimating = false;

            const initCards = () => {
                cards.forEach((card, idx) => {
                    card.style.transition = 'transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.28s ease';
                    if (idx === currentIdx) {
                        card.style.transform = 'translate3d(0, 0, 0)';
                        card.style.opacity = '1';
                        card.style.visibility = 'visible';
                        card.style.pointerEvents = 'auto';
                        card.style.zIndex = '2';
                    } else {
                        card.style.transform = 'translate3d(105%, 0, 0)';
                        card.style.opacity = '0';
                        card.style.visibility = 'hidden';
                        card.style.pointerEvents = 'none';
                        card.style.zIndex = '1';
                    }
                });
            };

            const goToCard = (targetIdx, isForward = true) => {
                if (isAnimating) return;

                // Circular loop through all 8 cards
                let nextIdx = targetIdx;
                if (nextIdx >= totalCards) nextIdx = 0;
                if (nextIdx < 0) nextIdx = totalCards - 1;

                if (nextIdx === currentIdx) return;

                isAnimating = true;
                const oldCard = cards[currentIdx];
                const newCard = cards[nextIdx];
                currentIdx = nextIdx;

                // Animate current card out
                oldCard.style.transition = 'transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.25s ease';
                oldCard.style.transform = isForward ? 'translate3d(-105%, 0, 0)' : 'translate3d(105%, 0, 0)';
                oldCard.style.opacity = '0';
                oldCard.style.pointerEvents = 'none';
                oldCard.style.zIndex = '1';

                // Position new card at starting edge before sliding into place
                newCard.style.transition = 'none';
                newCard.style.transform = isForward ? 'translate3d(105%, 0, 0)' : 'translate3d(-105%, 0, 0)';
                newCard.style.opacity = '0';
                newCard.style.visibility = 'visible';
                newCard.style.zIndex = '2';
                void newCard.offsetWidth; // Force reflow

                newCard.style.transition = 'transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.28s ease';
                newCard.style.transform = 'translate3d(0, 0, 0)';
                newCard.style.opacity = '1';
                newCard.style.pointerEvents = 'auto';

                setTimeout(() => {
                    cards.forEach((c, idx) => {
                        if (idx !== currentIdx) {
                            c.style.visibility = 'hidden';
                            c.style.opacity = '0';
                            c.style.pointerEvents = 'none';
                            c.style.zIndex = '1';
                        }
                    });
                    isAnimating = false;
                }, 370);
            };

            if (prevBtn) {
                prevBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    goToCard(currentIdx - 1, false);
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    goToCard(currentIdx + 1, true);
                });
            }

            // Mobile touch gestures
            let touchStartX = 0;
            stage.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });
            stage.addEventListener('touchend', (e) => {
                const diffX = e.changedTouches[0].screenX - touchStartX;
                if (diffX < -40) {
                    goToCard(currentIdx + 1, true);
                } else if (diffX > 40) {
                    goToCard(currentIdx - 1, false);
                }
            }, { passive: true });

            initCards();
        }
    });
</script>
@endpush
