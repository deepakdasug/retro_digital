<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Seed all 12 industries from retrotechdigital.com into the database.
     * Includes hero details, intro overviews, feature cards, reasons to choose us, and FAQs.
     */
    public function run(): void
    {
        $industries = [
            /*
            |--------------------------------------------------------------------------
            | 1. Ecommerce & Multivendor
            |--------------------------------------------------------------------------
            */
            [
                'name' => 'Ecommerce & Multivendor',
                'slug' => 'ecommerce-multivendor',
                'short_description' => 'Build high-converting online stores, multi-vendor marketplaces, and omnichannel retail platforms with seamless checkout and inventory management.',
                'description' => 'Ecommerce and multivendor businesses require robust, scalable, and secure digital platforms that deliver flawless shopping experiences. Retrotech Digital builds customized ecommerce storefronts, multi-vendor marketplaces, B2B supplier portals, and omnichannel digital solutions tailored to modern retail operations.',
                'hero_title' => 'Ecommerce & Multivendor',
                'hero_description' => 'We build scalable online stores, high-volume multi-vendor marketplaces, and customized digital retail solutions that boost conversions and maximize customer lifetime value.',
                'hero_image' => 'https://images.unsplash.com/photo-1556740738-b6a63e27c4df?auto=format&fit=crop&w=1920&h=900&q=85',
                'intro_heading' => 'High-Converting Digital Storefronts & Multi-Vendor Ecosystems',
                'intro_description' => "In today’s hyper-competitive retail landscape, success depends on speed, personalized customer journeys, and seamless inventory management. Retrotech Digital engineers bespoke ecommerce solutions on Shopify, WooCommerce, Magento, and custom headless architectures that empower online sellers to scale effortlessly.\n\nOur ecommerce services include multi-vendor vendor portals, product catalog management, automated checkout flows, secure payment gateway integrations, CRM and ERP synchronization, inventory tracking, and mobile shopping app development. We also accelerate growth through precision ecommerce SEO, conversion rate optimization (CRO), performance marketing, and retention email workflows.",
                'intro_image' => 'https://www.retrotechdigital.com/frontend/img/ecommerce-retrotech.webp',
                'meta_title' => 'Ecommerce & Multivendor Development Solutions | Retrotech Digital',
                'meta_description' => 'Build high-converting online stores, multivendor marketplaces, secure checkout flows, and growth-driven ecommerce marketing with Retrotech Digital.',
                'meta_keywords' => 'ecommerce development, multivendor marketplace, online store development, retail tech solutions, ecommerce SEO',
                'canonical_url' => 'https://www.retrotechdigital.com/who-we-serve/ecommerce-multivendor',
                'og_image' => 'https://www.retrotechdigital.com/frontend/img/ecommerce-retrotech.webp',
                'is_published' => true,
                'sort_order' => 1,
                'contents' => [
                    [
                        'content_type' => 'feature',
                        'title' => 'Custom Storefront & Marketplace Architecture',
                        'description' => 'Headless commerce, multi-vendor seller dashboards, commission automation, vendor payouts, and high-performance product discovery.',
                        'icon' => 'fa-solid fa-cart-shopping',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Omnichannel & Gateway Integrations',
                        'description' => 'Seamless Stripe, PayPal, Razorpay payment integrations, POS synchronization, and automated inventory sync across warehouses.',
                        'icon' => 'fa-solid fa-credit-card',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Conversion & Performance Marketing',
                        'description' => 'Product SEO, dynamic retargeting ads, cart abandonment recovery workflows, and customer loyalty reward systems.',
                        'icon' => 'fa-solid fa-chart-line',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Experienced IT Professionals',
                        'description' => 'Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Customised Business Solutions',
                        'description' => 'We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'On-Time Project Delivery',
                        'description' => 'We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Transparent Communication',
                        'description' => 'We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.',
                        'sort_order' => 4,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Scalable & Secure Technologies',
                        'description' => 'Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.',
                        'sort_order' => 5,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Dedicated Post-Launch Support',
                        'description' => 'We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.',
                        'sort_order' => 6,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can you build customized multi-vendor marketplaces like Amazon or Etsy?',
                        'description' => 'Yes, we develop end-to-end multi-vendor platforms with separate merchant portals, automated commissions, shipping rules, and unified customer checkout.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'What ecommerce platforms and frameworks do you specialize in?',
                        'description' => 'We work across modern frameworks including Laravel, Shopify, WooCommerce, Magento, Next.js, and custom headless microservices tailored to your transaction volumes.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'How do you handle payment gateways and multi-currency transactions?',
                        'description' => 'We integrate major payment gateways including Stripe, PayPal, and regional gateways with automated currency conversion, multi-tax support, and PCI-DSS compliant checkout.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Do you provide ongoing maintenance and security audits for ecommerce websites?',
                        'description' => 'Yes, we provide 24/7 server monitoring, performance optimization, vulnerability patching, database backups, and feature upgrades to ensure continuous uptime.',
                        'sort_order' => 4,
                    ],
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | 2. Real Estate & Construction
            |--------------------------------------------------------------------------
            */
            [
                'name' => 'Real Estate & Construction',
                'slug' => 'real-estate-and-construction',
                'short_description' => 'Modern property portals, real estate CRM systems, MLS/IDX integrations, and lead generation marketing for developers and brokers.',
                'description' => 'Real estate and construction firms require sophisticated digital tools to showcase properties, manage contractor workflows, capture qualified investor leads, and streamline sales pipelines. Retrotech Digital delivers modern property portals, custom real estate CRMs, and immersive project showcases.',
                'hero_title' => 'Real Estate & Construction',
                'hero_description' => 'We design dynamic property portals, construction management platforms, and high-impact digital marketing strategies that turn property seekers into qualified buyers.',
                'hero_image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&h=900&q=85',
                'intro_heading' => 'Digital Innovations for Modern Property Developers & Agencies',
                'intro_description' => "From commercial builders to residential brokerage agencies, real estate demands visually stunning presentations and reliable digital workflows. Retrotech Digital builds fast, interactive real estate portals equipped with advanced search filters, virtual tour embeds, interactive floorplans, and automated lead routing.\n\nOur solutions encompass MLS/IDX feed integration, custom real estate CRM development, property auction platforms, tenant management portals, construction milestone tracking systems, and mobile field inspection apps. We also drive high-value buyer inquiries through hyper-local Google Ads, geo-targeted SEO, Facebook lead generation, and automated WhatsApp inquiry pipelines.",
                'intro_image' => 'https://www.retrotechdigital.com/frontend/img/realestate-retrotech.webp',
                'meta_title' => 'Real Estate & Construction Digital Solutions | Retrotech Digital',
                'meta_description' => 'Custom real estate websites, property management systems, CRM integration, and high-performing lead generation campaigns for builders and agencies.',
                'meta_keywords' => 'real estate web development, property portal development, real estate CRM, construction software solutions, real estate digital marketing',
                'canonical_url' => 'https://www.retrotechdigital.com/who-we-serve/real-estate-and-construction',
                'og_image' => 'https://www.retrotechdigital.com/frontend/img/realestate-retrotech.webp',
                'is_published' => true,
                'sort_order' => 2,
                'contents' => [
                    [
                        'content_type' => 'feature',
                        'title' => 'Interactive Property Portals & IDX Integration',
                        'description' => 'Automated MLS/IDX listings, map-based property search, virtual tours, high-res galleries, and interactive mortgage calculators.',
                        'icon' => 'fa-solid fa-building',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Custom Real Estate CRM & Lead Routing',
                        'description' => 'Instant buyer inquiry capture, WhatsApp chatbots, agent assignment rules, and automated follow-up sequences that boost conversions.',
                        'icon' => 'fa-solid fa-users-gear',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Construction Milestone & Project Portals',
                        'description' => 'Cloud-based client portals, site progress photo updates, document management, and subcontractor scheduling systems.',
                        'icon' => 'fa-solid fa-trowel-bricks',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Experienced IT Professionals',
                        'description' => 'Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Customised Business Solutions',
                        'description' => 'We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'On-Time Project Delivery',
                        'description' => 'We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Transparent Communication',
                        'description' => 'We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.',
                        'sort_order' => 4,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Scalable & Secure Technologies',
                        'description' => 'Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.',
                        'sort_order' => 5,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Dedicated Post-Launch Support',
                        'description' => 'We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.',
                        'sort_order' => 6,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can you integrate MLS or IDX property listings into our website?',
                        'description' => 'Yes, we integrate MLS and IDX feeds to automatically sync live listings, pricing updates, and availability directly onto your branded website.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'How do your CRM solutions help manage real estate leads?',
                        'description' => 'Our CRMs capture leads from property portals, Google Ads, and social media, assigning them to agents with automated follow-ups via email, SMS, and WhatsApp.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can you build mobile apps for construction site inspections and field teams?',
                        'description' => 'Yes, we engineer cross-platform mobile apps for iOS and Android featuring offline data storage, photo uploads, punch lists, and digital sign-offs.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'What digital marketing strategies do you recommend for selling luxury properties?',
                        'description' => 'We deploy targeted Google Search campaigns, cinematic video marketing, virtual tour landing pages, and demographic-specific social advertising to reach high-net-worth buyers.',
                        'sort_order' => 4,
                    ],
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | 3. Manufacturing
            |--------------------------------------------------------------------------
            */
            [
                'name' => 'Manufacturing',
                'slug' => 'manufacturing',
                'short_description' => 'Industrial web platforms, ERP/CRM integration, supply chain tracking, and digital transformation for manufacturing enterprises.',
                'description' => 'Manufacturing companies need interconnected digital ecosystems that bridge the gap between factory floor operations, supply chain logistics, and B2B client acquisition. Retrotech Digital develops industrial web platforms, ERP integrations, inventory management systems, and enterprise software that enhance operational visibility and drive B2B growth.',
                'hero_title' => 'Manufacturing',
                'hero_description' => 'We engineer industrial web portals, custom ERP/CRM integrations, and automated supply chain solutions that modernize production workflows and scale global B2B operations.',
                'hero_image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1920&h=900&q=85',
                'intro_heading' => 'Streamlining Industrial Workflows Through Digital Excellence',
                'intro_description' => "Modern manufacturers face rising operational complexities, fragmented supplier communications, and shifting B2B buyer expectations. Retrotech Digital equips manufacturers with tailored software solutions that optimize resource planning, automate procurement workflows, and showcase complex technical catalogs online.\n\nOur capabilities span custom ERP development, inventory and warehouse management systems, IoT sensor dashboards, equipment maintenance scheduling software, and secure vendor portals. We also help industrial suppliers expand market share through B2B search engine optimization, technical content marketing, distributor portals, and targeted industrial lead acquisition campaigns.",
                'intro_image' => 'https://www.retrotechdigital.com/frontend/img/manufacturing-retrotech.webp',
                'meta_title' => 'Manufacturing IT & Digital Solutions | Retrotech Digital',
                'meta_description' => 'Custom manufacturing software, ERP/CRM systems, supply chain automation, and B2B industrial web portals built by Retrotech Digital.',
                'meta_keywords' => 'manufacturing software development, industrial web design, ERP integration, supply chain management systems, B2B manufacturing marketing',
                'canonical_url' => 'https://www.retrotechdigital.com/who-we-serve/manufacturing',
                'og_image' => 'https://www.retrotechdigital.com/frontend/img/manufacturing-retrotech.webp',
                'is_published' => true,
                'sort_order' => 3,
                'contents' => [
                    [
                        'content_type' => 'feature',
                        'title' => 'Custom ERP & Operations Management',
                        'description' => 'Integrated production scheduling, bill of materials (BOM), asset tracking, inventory control, and quality inspection dashboards.',
                        'icon' => 'fa-solid fa-industry',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'B2B Vendor & Distributor Portals',
                        'description' => 'Secure quote request systems, tiered wholesale pricing, digital order tracking, contract management, and invoices.',
                        'icon' => 'fa-solid fa-boxes-packing',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'IoT & Industrial Telemetry Dashboards',
                        'description' => 'Real-time machine performance monitoring, predictive maintenance alerts, and automated downtime analysis.',
                        'icon' => 'fa-solid fa-microchip',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Experienced IT Professionals',
                        'description' => 'Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Customised Business Solutions',
                        'description' => 'We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'On-Time Project Delivery',
                        'description' => 'We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Transparent Communication',
                        'description' => 'We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.',
                        'sort_order' => 4,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Scalable & Secure Technologies',
                        'description' => 'Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.',
                        'sort_order' => 5,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Dedicated Post-Launch Support',
                        'description' => 'We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.',
                        'sort_order' => 6,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can you integrate our existing legacy systems with new cloud ERP solutions?',
                        'description' => 'Yes, our team builds secure custom REST APIs and middleware connectors to bridge legacy on-premise systems with modern cloud-based ERP and CRM platforms.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'How do custom vendor portals benefit industrial manufacturers?',
                        'description' => 'Vendor portals automate purchase orders, invoice submissions, material specifications, and delivery schedules, eliminating manual back-and-forth communications.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Do you build secure portals for B2B distributors and dealers?',
                        'description' => 'Yes, we create multi-tier dealer portals featuring custom pricing rules, real-time inventory visibility, bulk re-ordering, and marketing collateral downloads.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'What data security measures do you implement for proprietary industrial data?',
                        'description' => 'We implement enterprise encryption, role-based access control (RBAC), multi-factor authentication, network isolation, and regular security vulnerability assessments.',
                        'sort_order' => 4,
                    ],
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | 4. Media & Entertainment
            |--------------------------------------------------------------------------
            */
            [
                'name' => 'Media & Entertainment',
                'slug' => 'media-and-entertainment',
                'short_description' => 'High-performance streaming apps, digital content hubs, ticketing systems, and audience engagement platforms for creative industries.',
                'description' => 'Media, broadcasting, and entertainment companies need resilient, ultra-fast platforms capable of handling high-bandwidth streaming, real-time audience engagement, digital ticketing, and multi-channel content delivery. Retrotech Digital creates bespoke media applications, OTT platforms, content management systems, and interactive digital experiences.',
                'hero_title' => 'Media & Entertainment',
                'hero_description' => 'We build high-throughput video streaming platforms, interactive content portals, and viral marketing engines that captivate global audiences and monetize digital content.',
                'hero_image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?auto=format&fit=crop&w=1920&h=900&q=85',
                'intro_heading' => 'Engaging Global Audiences with Next-Generation Media Technology',
                'intro_description' => "The media and entertainment sector thrives on speed, immersive storytelling, and seamless content accessibility across devices. Retrotech Digital engineers responsive, cloud-native media distribution architectures that deliver high-definition audio and video content with ultra-low latency.\n\nWe specialize in OTT streaming platform development, subscription and pay-per-view monetization models, live event ticketing systems, celebrity and talent portfolio platforms, digital asset management (DAM), and mobile entertainment apps. Our digital marketing team drives viral engagement through social video campaigns, influencer collaborations, fan community management, and search-optimized entertainment news portals.",
                'intro_image' => 'https://www.retrotechdigital.com/frontend/img/entertainment-retrotech.webp',
                'meta_title' => 'Media & Entertainment IT Solutions | Retrotech Digital',
                'meta_description' => 'OTT platforms, video streaming apps, digital asset management, ticketing systems, and audience growth marketing by Retrotech Digital.',
                'meta_keywords' => 'media web development, OTT platform development, video streaming app, entertainment software, digital asset management',
                'canonical_url' => 'https://www.retrotechdigital.com/who-we-serve/media-and-entertainment',
                'og_image' => 'https://www.retrotechdigital.com/frontend/img/entertainment-retrotech.webp',
                'is_published' => true,
                'sort_order' => 4,
                'contents' => [
                    [
                        'content_type' => 'feature',
                        'title' => 'OTT & Video Streaming Infrastructure',
                        'description' => 'Adaptive bitrate video streaming, DRM copyright protection, offline playback capabilities, and smart TV app integration.',
                        'icon' => 'fa-solid fa-play',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Digital Ticketing & Event Management',
                        'description' => 'Interactive seat selection, QR code gate verification, integrated instant payments, and automated anti-scalping protections.',
                        'icon' => 'fa-solid fa-ticket',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Digital Asset Management (DAM)',
                        'description' => 'Centralized cloud media repository for high-resolution footage, audio master files, automated tagging, and team collaboration.',
                        'icon' => 'fa-solid fa-photo-film',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Experienced IT Professionals',
                        'description' => 'Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Customised Business Solutions',
                        'description' => 'We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'On-Time Project Delivery',
                        'description' => 'We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Transparent Communication',
                        'description' => 'We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.',
                        'sort_order' => 4,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Scalable & Secure Technologies',
                        'description' => 'Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.',
                        'sort_order' => 5,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Dedicated Post-Launch Support',
                        'description' => 'We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.',
                        'sort_order' => 6,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can you build video streaming platforms compatible with web and mobile?',
                        'description' => 'Yes, we develop cross-platform video streaming applications optimized for browsers, iOS, Android, and connected TV operating systems.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'How do you secure video and audio assets against unauthorized downloads?',
                        'description' => 'We implement industry-standard Digital Rights Management (DRM) encryption including Widevine and FairPlay alongside tokenized video streams.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'What monetization options can be integrated into media platforms?',
                        'description' => 'We support subscription video on demand (SVOD), advertising-based video on demand (AVOD), transactional pay-per-view (TVOD), and hybrid models.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can your ticketing systems handle high-volume traffic spikes during major ticket releases?',
                        'description' => 'Yes, our architectures leverage auto-scaling cloud servers, Redis queuing, and CDN caching to effortlessly absorb traffic surges during flash ticket sales.',
                        'sort_order' => 4,
                    ],
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | 5. Medical & Healthcare
            |--------------------------------------------------------------------------
            */
            [
                'name' => 'Medical & Healthcare',
                'slug' => 'medical-and-healthcare',
                'short_description' => 'Telemedicine platforms, EHR/EMR systems, clinic management portals, and HIPAA-compliant healthcare applications.',
                'description' => 'Healthcare providers, hospitals, diagnostic laboratories, and medical practices require compliant, patient-centric digital tools that safeguard confidential health records while optimizing clinical appointments and care delivery. Retrotech Digital develops secure telemedicine solutions, clinic portals, electronic health records (EHR) integrations, and health-tech web applications.',
                'hero_title' => 'Medical & Healthcare',
                'hero_description' => 'We build HIPAA-compliant telemedicine apps, patient portals, clinic management software, and patient acquisition strategies that advance modern healthcare delivery.',
                'hero_image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1920&h=900&q=85',
                'intro_heading' => 'Secure, Patient-Centered Digital Solutions for Modern Healthcare',
                'intro_description' => "Delivering superior medical care requires instant access to accurate patient data, effortless appointment scheduling, and strict adherence to privacy regulations. Retrotech Digital builds compliant, cloud-enabled health solutions that empower medical practitioners and elevate patient satisfaction.\n\nOur expertise covers telemedicine video consultations, patient self-service booking portals, EHR/EMR interoperability, prescription management modules, lab results distribution, and medical billing automation. We also assist clinics, hospitals, and wellness centers in growing their patient base through local medical SEO, reputation management, educational healthcare content, and compliant lead generation.",
                'intro_image' => 'https://www.retrotechdigital.com/frontend/img/healthcare-retrotech.webp',
                'meta_title' => 'Healthcare & Medical IT Solutions | Retrotech Digital',
                'meta_description' => 'HIPAA-compliant patient portals, telemedicine apps, EHR integrations, and healthcare digital marketing by Retrotech Digital.',
                'meta_keywords' => 'healthcare software development, telemedicine app development, medical website design, EHR integration, healthcare digital marketing',
                'canonical_url' => 'https://www.retrotechdigital.com/who-we-serve/medical-and-healthcare',
                'og_image' => 'https://www.retrotechdigital.com/frontend/img/healthcare-retrotech.webp',
                'is_published' => true,
                'sort_order' => 5,
                'contents' => [
                    [
                        'content_type' => 'feature',
                        'title' => 'Telemedicine & Video Consultation',
                        'description' => 'Secure WebRTC video calling, digital prescription generation, virtual waiting rooms, and integrated doctor calendar management.',
                        'icon' => 'fa-solid fa-user-doctor',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Patient Portals & Medical Records',
                        'description' => 'Encrypted health records, online lab test report downloads, automated SMS/email reminders, and contactless payments.',
                        'icon' => 'fa-solid fa-notes-medical',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'HIPAA & GDPR Compliant Infrastructure',
                        'description' => 'End-to-end data encryption, granular role-based permissions, detailed access audit trails, and secure cloud storage.',
                        'icon' => 'fa-solid fa-shield-virus',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Experienced IT Professionals',
                        'description' => 'Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Customised Business Solutions',
                        'description' => 'We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'On-Time Project Delivery',
                        'description' => 'We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Transparent Communication',
                        'description' => 'We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.',
                        'sort_order' => 4,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Scalable & Secure Technologies',
                        'description' => 'Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.',
                        'sort_order' => 5,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Dedicated Post-Launch Support',
                        'description' => 'We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.',
                        'sort_order' => 6,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Are your healthcare applications compliant with HIPAA and data protection standards?',
                        'description' => 'Yes, our architectures adhere to HIPAA, GDPR, and local healthcare privacy mandates with data-at-rest and data-in-transit encryption and audit logging.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can you integrate our existing hospital EHR/EMR software with a patient portal?',
                        'description' => 'Yes, we support FHIR and HL7 protocols as well as custom REST APIs to sync patient records, appointment bookings, and lab reports with your EHR.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'How do you protect sensitive medical data and patient health records?',
                        'description' => 'We enforce multi-factor authentication, end-to-end encryption, regular penetration testing, strict access control lists, and automated backups.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can patients book doctor appointments and pay consultation fees online?',
                        'description' => 'Yes, patients can choose medical departments, select available doctors, book appointment slots, and pay securely via credit card, UPI, or insurance portals.',
                        'sort_order' => 4,
                    ],
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | 6. Personal Beauty Care
            |--------------------------------------------------------------------------
            */
            [
                'name' => 'Personal Beauty Care',
                'slug' => 'personal-beauty-care',
                'short_description' => 'Salon booking systems, beauty brand ecommerce stores, client loyalty apps, and targeted social media marketing.',
                'description' => 'Salons, spas, aesthetic clinics, and cosmetic brands require engaging, aesthetically polished digital platforms that simplify appointment booking, showcase service menus, manage recurring memberships, and drive online product sales. Retrotech Digital creates bespoke beauty websites, booking apps, and conversion-focused marketing campaigns.',
                'hero_title' => 'Personal Beauty Care',
                'hero_description' => 'We design elegant salon websites, smart booking platforms, and Instagram-first digital marketing strategies that turn beauty brands into household names.',
                'hero_image' => 'https://images.unsplash.com/photo-1560750588-73207b1ef5b8?auto=format&fit=crop&w=1920&h=900&q=85',
                'intro_heading' => 'Elevate Your Beauty Brand with Seamless Digital Experiences',
                'intro_description' => "In the visual world of personal care, beauty, and wellness, brand presentation and client convenience define lasting customer relationships. Retrotech Digital develops visually captivating websites, mobile booking apps, and automated client communication tools that streamline front-desk operations and increase appointment retention.\n\nOur services encompass real-time appointment booking engines, staff scheduling modules, loyalty and gift card systems, beauty ecommerce storefronts, and automated appointment reminders via WhatsApp and SMS. We amplify brand awareness through influencer marketing campaigns, Instagram Reels and TikTok advertising, local salon SEO, and five-star review automation.",
                'intro_image' => 'https://www.retrotechdigital.com/frontend/img/beauty-personal-care-retrotech.webp',
                'meta_title' => 'Personal Beauty Care Digital Solutions | Retrotech Digital',
                'meta_description' => 'Beautiful salon booking systems, cosmetic ecommerce portals, membership apps, and social marketing by Retrotech Digital.',
                'meta_keywords' => 'salon booking system, beauty brand website, spa management software, cosmetic ecommerce, beauty marketing agency',
                'canonical_url' => 'https://www.retrotechdigital.com/who-we-serve/personal-beauty-care',
                'og_image' => 'https://www.retrotechdigital.com/frontend/img/beauty-personal-care-retrotech.webp',
                'is_published' => true,
                'sort_order' => 6,
                'contents' => [
                    [
                        'content_type' => 'feature',
                        'title' => 'Real-Time Appointment Scheduling',
                        'description' => 'Self-service online booking, stylist and therapist selection, calendar sync, and automated reminder notifications via WhatsApp and SMS.',
                        'icon' => 'fa-solid fa-calendar-check',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Cosmetic & Skincare Ecommerce',
                        'description' => 'Shoppable product lookbooks, subscription replenishment orders, ingredient transparency details, and verified review showcases.',
                        'icon' => 'fa-solid fa-spa',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Loyalty Programs & VIP Memberships',
                        'description' => 'Tiered client points rewards, digital gift vouchers, automated birthday promotions, and exclusive treatment packages.',
                        'icon' => 'fa-solid fa-crown',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Experienced IT Professionals',
                        'description' => 'Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Customised Business Solutions',
                        'description' => 'We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'On-Time Project Delivery',
                        'description' => 'We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Transparent Communication',
                        'description' => 'We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.',
                        'sort_order' => 4,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Scalable & Secure Technologies',
                        'description' => 'Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.',
                        'sort_order' => 5,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Dedicated Post-Launch Support',
                        'description' => 'We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.',
                        'sort_order' => 6,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can customers choose specific stylists or therapists when booking online?',
                        'description' => 'Yes, your booking system displays individual staff schedules, portfolios, service specializations, and real-time open slots.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'How do automated booking reminders reduce no-shows?',
                        'description' => 'Automated reminders sent via WhatsApp and SMS 24 hours and 2 hours prior allow clients to confirm or reschedule with one tap, slashing no-show rates by up to 40%.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can we sell cosmetic products and salon memberships directly on the website?',
                        'description' => 'Yes, our solutions seamlessly combine service bookings with ecommerce, recurring monthly membership subscriptions, and digital gift cards in a unified checkout.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'How do you help local salons and spas rank at the top of Google Maps?',
                        'description' => 'We optimize your Google Business Profile, implement local schema markup, build local citations, and set up automated review generation funnels.',
                        'sort_order' => 4,
                    ],
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | 7. EdTech & E-Learning
            |--------------------------------------------------------------------------
            */
            [
                'name' => 'EdTech & E-Learning',
                'slug' => 'edtech-and-e-learning',
                'short_description' => 'Learning Management Systems (LMS), virtual classrooms, certification portals, and student engagement platforms.',
                'description' => 'Educational institutions, corporate training academies, and EdTech startups need interactive, scalable digital learning environments that support live video streaming, student progress tracking, quizzes, and automated certification. Retrotech Digital builds customized LMS platforms, interactive learning apps, and student management systems.',
                'hero_title' => 'EdTech & E-Learning',
                'hero_description' => 'We engineer interactive Learning Management Systems (LMS), virtual classrooms, and gamified education platforms that inspire students and drive measurable learning outcomes.',
                'hero_image' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=1920&h=900&q=85',
                'intro_heading' => 'Transformative Digital Education Platforms for Modern Learners',
                'intro_description' => "Education is evolving rapidly toward flexible, on-demand, and blended learning experiences. Retrotech Digital designs intuitive, feature-rich educational software that simplifies course authoring for educators while creating rewarding, immersive learning pathways for students of all ages.\n\nOur solutions include custom LMS development, SCORM/xAPI compliant architectures, live interactive classroom integration (Zoom/Agora), automated quizzes and grading systems, digital certificate generation, student forum communities, and subscription monetization. We also scale enrollment through educational content marketing, search engine optimization, student acquisition funnels, and performance marketing.",
                'intro_image' => 'https://www.retrotechdigital.com/frontend/img/e-learning-retrotech.webp',
                'meta_title' => 'EdTech & E-Learning Software Solutions | Retrotech Digital',
                'meta_description' => 'Custom LMS development, virtual classrooms, student portals, course marketplaces, and education marketing by Retrotech Digital.',
                'meta_keywords' => 'EdTech software development, LMS development, virtual classroom platform, online course website, educational technology',
                'canonical_url' => 'https://www.retrotechdigital.com/who-we-serve/edtech-and-e-learning',
                'og_image' => 'https://www.retrotechdigital.com/frontend/img/e-learning-retrotech.webp',
                'is_published' => true,
                'sort_order' => 7,
                'contents' => [
                    [
                        'content_type' => 'feature',
                        'title' => 'Custom Learning Management Systems (LMS)',
                        'description' => 'Intuitive course builder, video lecture hosting, downloadable lesson notes, student homework submission, and progress tracking.',
                        'icon' => 'fa-solid fa-graduation-cap',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Virtual Classrooms & Live Streaming',
                        'description' => 'Low-latency interactive video lectures, interactive digital whiteboards, breakout discussion rooms, and real-time messaging.',
                        'icon' => 'fa-solid fa-chalkboard-user',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Automated Assessments & Verifiable Certificates',
                        'description' => 'Timed quizzes, anti-cheat proctoring tools, automated grading, and instant verifiable PDF certificates with QR codes.',
                        'icon' => 'fa-solid fa-award',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Experienced IT Professionals',
                        'description' => 'Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Customised Business Solutions',
                        'description' => 'We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'On-Time Project Delivery',
                        'description' => 'We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Transparent Communication',
                        'description' => 'We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.',
                        'sort_order' => 4,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Scalable & Secure Technologies',
                        'description' => 'Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.',
                        'sort_order' => 5,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Dedicated Post-Launch Support',
                        'description' => 'We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.',
                        'sort_order' => 6,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'What LMS platforms and technologies do you use for building e-learning portals?',
                        'description' => 'We build custom LMS platforms using Laravel, Node.js, and React, as well as customized implementations of Moodle, WordPress LearnDash, and Canvas.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can our platform host live interactive webinars and virtual lectures?',
                        'description' => 'Yes, we integrate Zoom, Agora, BigBlueButton, and WebRTC to provide crystal-clear live video sessions with interactive whiteboards and live chats.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can we sell individual courses as well as recurring monthly subscriptions?',
                        'description' => 'Yes, our platforms support pay-per-course purchases, recurring subscription tiers, bundle packages, discount coupons, and corporate group licenses.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can the LMS track student quiz scores, completion certificates, and attendance?',
                        'description' => 'Yes, comprehensive instructor and student dashboards provide granular analytics on lesson completion, quiz scores, time spent, and downloadable credentials.',
                        'sort_order' => 4,
                    ],
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | 8. Travel & Hospitality
            |--------------------------------------------------------------------------
            */
            [
                'name' => 'Travel & Hospitality',
                'slug' => 'travel-and-hospitality',
                'short_description' => 'Hotel websites, travel portals, booking systems, API integrations and digital marketing services that help travel brands increase direct bookings.',
                'description' => 'Travel and hospitality businesses need seamless online experiences from discovery and booking to check-in and post-stay engagement. Retrotech Digital develops hotel websites, travel portals, booking systems, itinerary platforms and customer communication solutions for hotels, resorts, travel agencies and tour operators.',
                'hero_title' => 'Travel & Hospitality',
                'hero_description' => 'We create booking platforms, hotel websites, travel portals and digital campaigns that improve guest experiences and increase direct reservations.',
                'hero_image' => 'https://images.unsplash.com/photo-1564501049412-61c2a3083791?auto=format&fit=crop&w=1920&h=900&q=85',
                'intro_heading' => 'Digital Journeys That Inspire More Bookings',
                'intro_description' => "Travel and hospitality businesses need seamless online experiences from discovery and booking to check-in and post-stay engagement. Retrotech Digital develops hotel websites, travel portals, booking systems, itinerary platforms and customer communication solutions for hotels, resorts, travel agencies and tour operators.\n\nOur services include room and package listings, availability management, payment integration, enquiry automation, CRM connectivity, multilingual websites and third-party API integrations. We also drive direct bookings through destination SEO, social media marketing, paid campaigns, email marketing and online reputation management.",
                'intro_image' => 'https://www.retrotechdigital.com/frontend/img/travel-retrotech.webp',
                'meta_title' => 'Travel & Hospitality Digital Solutions | Retrotech Digital',
                'meta_description' => 'Hotel websites, travel portals, booking systems, API integrations and digital marketing services that help travel brands increase direct bookings.',
                'meta_keywords' => 'hotel website development, travel portal development, booking engine integration, hospitality digital marketing',
                'canonical_url' => 'https://www.retrotechdigital.com/who-we-serve/travel-and-hospitality',
                'og_image' => 'https://images.unsplash.com/photo-1564501049412-61c2a3083791?auto=format&fit=crop&w=1200&h=630&q=85',
                'is_published' => true,
                'sort_order' => 8,
                'contents' => [
                    [
                        'content_type' => 'feature',
                        'title' => 'Custom IT Solutions',
                        'description' => 'We build responsive websites, mobile applications, SaaS platforms and custom software solutions tailored to your business goals.',
                        'icon' => 'fa-solid fa-laptop-code',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Digital Marketing Growth',
                        'description' => 'Our SEO, social media, paid advertising and content marketing services help increase visibility, leads and online sales.',
                        'icon' => 'fa-solid fa-bullhorn',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Secure & Scalable Services',
                        'description' => 'We deliver secure, reliable and scalable digital solutions with continuous technical support for businesses of every size.',
                        'icon' => 'fa-solid fa-shield-halved',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Experienced IT Professionals',
                        'description' => 'Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Customised Business Solutions',
                        'description' => 'We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'On-Time Project Delivery',
                        'description' => 'We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Transparent Communication',
                        'description' => 'We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.',
                        'sort_order' => 4,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Scalable & Secure Technologies',
                        'description' => 'Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.',
                        'sort_order' => 5,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Dedicated Post-Launch Support',
                        'description' => 'We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.',
                        'sort_order' => 6,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'What IT services does your company provide?',
                        'description' => 'We provide website development, mobile app development, custom software solutions, UI/UX design, cloud services, digital marketing, SEO, and ongoing IT support.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Do you provide customized solutions for businesses?',
                        'description' => 'Yes, we develop customized IT solutions based on your business requirements, target audience, workflow, budget, and long-term goals.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'How long does it take to complete an IT project?',
                        'description' => 'The project timeline depends on its scope, features, and complexity. After reviewing your requirements, our team provides a clear development plan and estimated delivery timeline.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Do you provide support after the project is completed?',
                        'description' => 'Yes, we provide post-launch maintenance, technical support, security updates, performance monitoring, bug fixes, and future enhancements to keep your solution running smoothly.',
                        'sort_order' => 4,
                    ],
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | 9. Transportation & Logistics
            |--------------------------------------------------------------------------
            */
            [
                'name' => 'Transportation & Logistics',
                'slug' => 'transportation-and-logistics',
                'short_description' => 'Fleet management systems, real-time cargo tracking, freight forwarding portals, and logistics automation software.',
                'description' => 'Transportation, freight forwarding, and logistics enterprises operate in fast-paced environments requiring end-to-end operational visibility, automated dispatching, driver routing, and instant shipment tracking for clients. Retrotech Digital engineers robust logistics portals, fleet management software, and supply chain tracking systems.',
                'hero_title' => 'Transportation & Logistics',
                'hero_description' => 'We engineer real-time freight tracking portals, fleet management software, and automated logistics systems that reduce transit times and optimize supply chain efficiency.',
                'hero_image' => 'https://images.unsplash.com/photo-1519003722824-194d4455a60c?auto=format&fit=crop&w=1920&h=900&q=85',
                'intro_heading' => 'Intelligent Logistics & Supply Chain Software Solutions',
                'intro_description' => "Managing distributed fleets, fluctuating fuel costs, and complex multi-modal shipping networks demands precision software. Retrotech Digital develops tailored logistics and transportation technology that empowers 3PL providers, freight forwarders, and courier services to operate with total transparency.\n\nOur solutions include real-time GPS tracking integrations, automated dispatch and route optimization, digital bill of lading (eBOL) systems, warehouse management integration, customer shipment tracking portals, and driver mobile apps. We also help freight operators attract commercial shipping accounts through targeted B2B logistics SEO, Google Search Ads, and conversion-optimized quotation landing pages.",
                'intro_image' => 'https://www.retrotechdigital.com/frontend/img/logistics-retrotech.webp',
                'meta_title' => 'Transportation & Logistics Software Solutions | Retrotech Digital',
                'meta_description' => 'Fleet management software, real-time shipment tracking, freight forwarding portals, and logistics digital solutions by Retrotech Digital.',
                'meta_keywords' => 'logistics software development, fleet management system, shipment tracking portal, freight software, transportation IT solutions',
                'canonical_url' => 'https://www.retrotechdigital.com/who-we-serve/transportation-and-logistics',
                'og_image' => 'https://www.retrotechdigital.com/frontend/img/logistics-retrotech.webp',
                'is_published' => true,
                'sort_order' => 9,
                'contents' => [
                    [
                        'content_type' => 'feature',
                        'title' => 'Real-Time Shipment & GPS Tracking',
                        'description' => 'Customer self-service tracking portals, milestone status webhooks, automated SMS/email alerts, and digital delivery confirmations.',
                        'icon' => 'fa-solid fa-location-dot',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Automated Dispatch & Route Optimization',
                        'description' => 'Algorithm-assisted route planning, vehicle capacity optimization, automated driver assignment, and fuel monitoring.',
                        'icon' => 'fa-solid fa-truck-fast',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Freight Rate Calculator & Instant Quotations',
                        'description' => 'Automated volumetric weight calculation, multi-carrier rate comparisons, online quotation generators, and digital booking forms.',
                        'icon' => 'fa-solid fa-calculator',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Experienced IT Professionals',
                        'description' => 'Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Customised Business Solutions',
                        'description' => 'We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'On-Time Project Delivery',
                        'description' => 'We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Transparent Communication',
                        'description' => 'We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.',
                        'sort_order' => 4,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Scalable & Secure Technologies',
                        'description' => 'Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.',
                        'sort_order' => 5,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Dedicated Post-Launch Support',
                        'description' => 'We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.',
                        'sort_order' => 6,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can your logistics platforms provide real-time GPS tracking for customers?',
                        'description' => 'Yes, we integrate IoT GPS devices and telematics APIs to display live interactive delivery maps and estimated arrival times for shippers and consignees.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Do you build driver mobile applications for electronic proof of delivery (ePOD)?',
                        'description' => 'Yes, our mobile apps enable drivers to capture digital signatures, take delivery confirmation photos, scan barcodes, and log timestamps in real time.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can our freight booking portal integrate with third-party carrier APIs?',
                        'description' => 'Yes, we integrate with major carriers, shipping lines, and airlines via EDI/REST APIs for instantaneous rate lookups, booking confirmations, and status updates.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'How does automated route optimization lower operational logistics costs?',
                        'description' => 'Dynamic route calculation avoids traffic bottlenecks, balances vehicle payloads, and cuts fuel consumption and transit delays by up to 25%.',
                        'sort_order' => 4,
                    ],
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | 10. Oil and Gas
            |--------------------------------------------------------------------------
            */
            [
                'name' => 'Oil and Gas',
                'slug' => 'oil-and-gas',
                'short_description' => 'Operational safety portals, asset management dashboards, equipment maintenance tracking, and energy sector digital solutions.',
                'description' => 'Energy companies, oilfield service providers, refineries, and drilling contractors require enterprise-grade digital systems that maintain rigorous environmental, health, and safety (HSE) standards while coordinating distributed assets and global supply operations. Retrotech Digital delivers secure software, equipment tracking systems, and digital portals for the energy sector.',
                'hero_title' => 'Oil and Gas',
                'hero_description' => 'We deliver mission-critical software, asset tracking dashboards, and digital safety portals that optimize operational performance for energy and oilfield enterprises.',
                'hero_image' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=1920&h=900&q=85',
                'intro_heading' => 'Empowering Energy & Oilfield Operations with Advanced Digital Systems',
                'intro_description' => "The oil and gas industry operates under rigorous compliance mandates, harsh physical conditions, and high-stakes operational environments. Retrotech Digital builds robust, secure, and compliant software solutions that modernize field reporting, track remote assets, and streamline supply chains for energy enterprises worldwide.\n\nOur capabilities include digital HSE compliance portals, remote asset inspection software, equipment maintenance scheduling, supply chain procurement management, contractor verification databases, and real-time operational KPI dashboards. We also build corporate brand portals and B2B energy marketing strategies that position oilfield service firms for lucrative commercial contracts.",
                'intro_image' => 'https://www.retrotechdigital.com/frontend/img/oil-and-gas-retrotech.webp',
                'meta_title' => 'Oil & Gas Digital Solutions & Enterprise IT | Retrotech Digital',
                'meta_description' => 'HSE compliance portals, remote asset tracking dashboards, and enterprise IT solutions for oil, gas, and energy firms by Retrotech Digital.',
                'meta_keywords' => 'oil and gas software development, energy sector IT solutions, HSE compliance management, oilfield asset tracking, energy tech',
                'canonical_url' => 'https://www.retrotechdigital.com/who-we-serve/oil-and-gas',
                'og_image' => 'https://www.retrotechdigital.com/frontend/img/oil-and-gas-retrotech.webp',
                'is_published' => true,
                'sort_order' => 10,
                'contents' => [
                    [
                        'content_type' => 'feature',
                        'title' => 'Digital HSE & Safety Compliance Portals',
                        'description' => 'Automated safety incident reporting, hazard audits, PPE compliance checklists, regulatory filings, and worker safety certifications.',
                        'icon' => 'fa-solid fa-shield-halved',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Remote Asset & Equipment Telemetry',
                        'description' => 'Preventative maintenance schedules, remote sensor monitoring, equipment downtime reduction, and spare parts inventory tracking.',
                        'icon' => 'fa-solid fa-oil-well',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Field Operations & Contractor Portals',
                        'description' => 'Contractor onboarding, site credential verification, digital work permits (PTW), and real-time operational KPI dashboards.',
                        'icon' => 'fa-solid fa-helmet-safety',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Experienced IT Professionals',
                        'description' => 'Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Customised Business Solutions',
                        'description' => 'We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'On-Time Project Delivery',
                        'description' => 'We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Transparent Communication',
                        'description' => 'We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.',
                        'sort_order' => 4,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Scalable & Secure Technologies',
                        'description' => 'Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.',
                        'sort_order' => 5,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Dedicated Post-Launch Support',
                        'description' => 'We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.',
                        'sort_order' => 6,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can your software operate in offline or low-connectivity remote oilfield locations?',
                        'description' => 'Yes, our mobile and field web applications feature robust offline caching and progressive data syncing as soon as network connectivity is restored.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'How do your solutions support health, safety, and environmental (HSE) compliance?',
                        'description' => 'Our digital HSE modules streamline incident logging, root cause analysis, corrective action tracking, and automated regulatory reporting for safety audits.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'How do you protect confidential and proprietary energy infrastructure data?',
                        'description' => 'We enforce strict zero-trust network architectures, multi-tenant isolation, end-to-end encryption, and role-based access management.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can we track heavy equipment maintenance and operational telemetry across multiple job sites?',
                        'description' => 'Yes, centralized cloud dashboards aggregate equipment operating hours, service milestones, sensor logs, and maintenance histories across global sites.',
                        'sort_order' => 4,
                    ],
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | 11. Finance & Insurance
            |--------------------------------------------------------------------------
            */
            [
                'name' => 'Finance & Insurance',
                'slug' => 'finance-and-insurance',
                'short_description' => 'FinTech web platforms, automated insurance claim portals, loan application workflows, and bank-grade data security.',
                'description' => 'Financial institutions, insurance agencies, wealth managers, and FinTech innovators need bank-grade security, lightning-fast transaction processing, automated underwriting, and intuitive self-service customer portals. Retrotech Digital builds secure financial applications, insurance claim workflows, investment dashboards, and regulatory-compliant digital solutions.',
                'hero_title' => 'Finance & Insurance',
                'hero_description' => 'We engineer secure FinTech platforms, digital insurance claim portals, and automated financial workflows with bank-grade encryption and seamless user experiences.',
                'hero_image' => 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=1920&h=900&q=85',
                'intro_heading' => 'Secure, Compliant FinTech & InsurTech Platforms Built for Trust',
                'intro_description' => "Trust, precision, and security are the cornerstones of financial services and insurance. Retrotech Digital engineers high-performance web platforms and mobile apps that simplify complex financial products, accelerate customer onboarding, and automate underwriting workflows while ensuring complete data confidentiality.\n\nOur finance & insurance services include digital loan origination systems, automated insurance claim submission portals, policy comparison tools, KYC/AML verification integrations, wealth management customer dashboards, and accounting API integrations. We also accelerate client acquisition through targeted financial SEO, trust-building thought leadership content, and high-conversion PPC campaigns.",
                'intro_image' => 'https://www.retrotechdigital.com/frontend/img/insurance-retrotech.webp',
                'meta_title' => 'Finance & Insurance IT Solutions | Retrotech Digital',
                'meta_description' => 'FinTech development, insurance claim management portals, loan origination systems, and secure banking portals by Retrotech Digital.',
                'meta_keywords' => 'finance software development, InsurTech solutions, loan application portal, insurance claim software, FinTech development agency',
                'canonical_url' => 'https://www.retrotechdigital.com/who-we-serve/finance-and-insurance',
                'og_image' => 'https://www.retrotechdigital.com/frontend/img/insurance-retrotech.webp',
                'is_published' => true,
                'sort_order' => 11,
                'contents' => [
                    [
                        'content_type' => 'feature',
                        'title' => 'Instant Loan & Policy Calculators',
                        'description' => 'Interactive EMI estimators, insurance premium quote engines, risk assessment tools, and digital pre-approvals.',
                        'icon' => 'fa-solid fa-coins',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Digital Claim Submission & Tracking',
                        'description' => 'Paperless insurance claim filing, photo evidence uploads, automated adjuster assignment, and real-time claim status alerts.',
                        'icon' => 'fa-solid fa-file-invoice-dollar',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Bank-Grade Security & Compliance',
                        'description' => '256-bit SSL encryption, biometric authentication, digital KYC/AML verification, and comprehensive audit logs.',
                        'icon' => 'fa-solid fa-lock',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Experienced IT Professionals',
                        'description' => 'Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Customised Business Solutions',
                        'description' => 'We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'On-Time Project Delivery',
                        'description' => 'We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Transparent Communication',
                        'description' => 'We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.',
                        'sort_order' => 4,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Scalable & Secure Technologies',
                        'description' => 'Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.',
                        'sort_order' => 5,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Dedicated Post-Launch Support',
                        'description' => 'We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.',
                        'sort_order' => 6,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'How do you ensure data security and compliance for financial applications?',
                        'description' => 'We follow PCI-DSS, SOC 2, and GDPR standards with end-to-end data encryption, multi-factor authentication, secure key vaults, and regular penetration testing.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can you automate customer onboarding with digital KYC and identity verification?',
                        'description' => 'Yes, we integrate optical character recognition (OCR) and government ID verification APIs for instant paperless customer verification.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can customers submit insurance claims and track progress directly online?',
                        'description' => 'Yes, our customer portals allow policyholders to upload incident photos, fill incident forms, and track claim approval stages in real time.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'What payment gateways and banking APIs can be integrated into financial portals?',
                        'description' => 'We integrate major payment gateways, core banking APIs, Plaid for account verification, and automated ACH/wire clearing networks.',
                        'sort_order' => 4,
                    ],
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | 12. Other Industries
            |--------------------------------------------------------------------------
            */
            [
                'name' => 'Other Industries',
                'slug' => 'other-industries',
                'short_description' => 'Custom software engineering, enterprise web applications, cloud infrastructure, and tailored digital transformation for unique business verticals.',
                'description' => 'Every industry faces distinct operational challenges and digital growth opportunities. Whether in non-profit, agriculture, professional services, legal, or emerging technology sectors, Retrotech Digital architects bespoke software, scalable web portals, and comprehensive digital marketing strategies customized to your unique organization.',
                'hero_title' => 'Other Industries',
                'hero_description' => 'We create tailor-made enterprise software, web portals, cloud systems, and strategic digital campaigns engineered specifically for your organization’s distinctive needs.',
                'hero_image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1920&h=900&q=85',
                'intro_heading' => 'Tailored IT Solutions Engineered for Any Business Sector',
                'intro_description' => "While specialized industries have specific requirements, the core ingredients of digital success remain consistent: robust technology architectures, intuitive user interfaces, rock-solid security, and scalable cloud infrastructures. Retrotech Digital collaborates closely with forward-thinking leaders across diverse sectors to design custom software that solves unique problems.\n\nOur versatile capabilities include bespoke CRM and ERP system development, custom client and partner portals, business process automation tools, cloud migrations, API integrations, and mobile applications. We also design data-driven digital marketing roadmaps that amplify brand authority, capture high-intent leads, and unlock scalable revenue streams for specialized enterprises.",
                'intro_image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&h=900&q=85',
                'meta_title' => 'Custom IT Solutions for All Industries | Retrotech Digital',
                'meta_description' => 'Tailored software development, custom web portals, cloud engineering, and digital growth strategies for specialized industries by Retrotech Digital.',
                'meta_keywords' => 'custom IT solutions, enterprise software development, business process automation, bespoke web applications, digital transformation',
                'canonical_url' => 'https://www.retrotechdigital.com/who-we-serve/other-industries',
                'og_image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&h=630&q=85',
                'is_published' => true,
                'sort_order' => 12,
                'contents' => [
                    [
                        'content_type' => 'feature',
                        'title' => 'Bespoke Software Engineering',
                        'description' => 'Tailor-made web and mobile applications engineered to match your organization’s proprietary workflows and operational objectives.',
                        'icon' => 'fa-solid fa-code',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Workflow Automation & System Integration',
                        'description' => 'Eliminate repetitive manual tasks, connect disparate legacy databases, and streamline company-wide information flows.',
                        'icon' => 'fa-solid fa-gears',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'feature',
                        'title' => 'Cloud Migration & Modernization',
                        'description' => 'Migrate on-premise infrastructure to modern, secure, and auto-scaling cloud architectures with zero operational downtime.',
                        'icon' => 'fa-solid fa-cloud-arrow-up',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Experienced IT Professionals',
                        'description' => 'Our skilled developers, designers, and technology experts deliver reliable solutions using proven industry practices.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Customised Business Solutions',
                        'description' => 'We create tailored websites, applications, software, and digital solutions that match your business processes and objectives.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'On-Time Project Delivery',
                        'description' => 'We use the latest tools, frameworks, and technologies to build secure, high-performing, and future-ready digital products.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Transparent Communication',
                        'description' => 'We maintain clear communication, transparent processes, and timely delivery throughout every stage of your project.',
                        'sort_order' => 4,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Scalable & Secure Technologies',
                        'description' => 'Every solution is carefully designed, developed, tested, and optimized to provide an excellent user experience.',
                        'sort_order' => 5,
                    ],
                    [
                        'content_type' => 'reason',
                        'title' => 'Dedicated Post-Launch Support',
                        'description' => 'We provide cost-effective IT services that can easily scale and adapt as your business continues to grow.',
                        'sort_order' => 6,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'Can you build custom software if our business operates in a niche or specialized industry?',
                        'description' => 'Yes, our engineering team excels at translating unique domain-specific workflows into intuitive, high-performance digital tools.',
                        'sort_order' => 1,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'What is your discovery and development process for custom business software?',
                        'description' => 'We conduct a comprehensive requirements discovery, produce interactive UI/UX prototypes, develop iteratively in agile sprints, and thoroughly test before launch.',
                        'sort_order' => 2,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'How do you ensure the software scales as our business grows?',
                        'description' => 'We build with modular microservices, clean code standards, cloud auto-scaling, and optimized database indexing to handle exponential growth effortlessly.',
                        'sort_order' => 3,
                    ],
                    [
                        'content_type' => 'faq',
                        'title' => 'What kind of post-launch maintenance, training, and technical support do you provide?',
                        'description' => 'We provide complete team onboarding, comprehensive documentation, regular security updates, server monitoring, and dedicated SLAs for ongoing support.',
                        'sort_order' => 4,
                    ],
                ],
            ],
        ];

        foreach ($industries as $data) {
            $contents = $data['contents'] ?? [];
            unset($data['contents']);

            $industry = Industry::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );

            $industry->contents()->updateOrCreate(
                [
                    'content_type' => 'certification',
                ],
                [
                    'title' => 'Our Certification',
                    'description' => 'As a swiftly advancing leader in comprehensive ITAD and managed solutions for reverse logistics, B2B Exports is R2V3 Certified.',
                    'image' => 'https://www.retrotechdigital.com/frontend/img/certificate.png',
                    'sort_order' => 1,
                    'is_visible' => true,
                ]
            );

            foreach ($contents as $content) {
                $industry->contents()->updateOrCreate(
                    [
                        'content_type' => $content['content_type'],
                        'title' => $content['title'],
                    ],
                    array_merge($content, [
                        'is_visible' => true,
                    ])
                );
            }
        }
    }
}
