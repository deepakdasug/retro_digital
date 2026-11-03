<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Available Section Types
    |--------------------------------------------------------------------------
    | This is the single source of truth for all sections that can be added
    | to a web page. Both the Admin Wizard and Frontend renderer use this.
    |
    | 'key'        - unique slug for the section (used in DB & loops)
    | 'label'      - display name in the admin wizard
    | 'icon'       - FontAwesome icon class for the admin picker
    | 'description'- short summary of the section's purpose
    | 'fields'     - list of fields to show in the admin form
    | 'repeater'   - (optional) if the section supports "Add row" items
    | 'preview'    - realistic sample data used by the interactive Preview Modal
    */

    'types' => [

        'hero' => [
            'label'       => 'Hero Banner',
            'icon'        => 'fa-solid fa-star',
            'description' => 'High-impact banner with badge, headline, subtitle, and primary call to action.',
            'fields' => [
                ['name' => 'badge',    'type' => 'text',     'label' => 'Badge Text',              'placeholder' => 'Award-Winning Digital Agency', 'required' => false],
                ['name' => 'heading',  'type' => 'text',     'label' => 'Custom Heading (optional)', 'placeholder' => 'Leave blank to use Page Title', 'required' => false],
                ['name' => 'subtitle', 'type' => 'textarea', 'label' => 'Subtitle / Lead Text',    'placeholder' => 'We combine strategy, technical precision, and creative innovation to compound your growth.', 'required' => true],
                ['name' => 'cta_text', 'type' => 'text',     'label' => 'CTA Button Text',         'placeholder' => 'Connect With Our Experts', 'required' => false],
                ['name' => 'cta_link', 'type' => 'text',     'label' => 'CTA Button Link',         'placeholder' => '#contact', 'required' => false],
                ['name' => 'image',    'type' => 'image',    'label' => 'Showcase Image (optional)', 'placeholder' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80', 'required' => false],
            ],
            'preview' => [
                'badge'    => 'Award-Winning Agency',
                'heading'  => 'Grow Your Business With Precision Strategy',
                'subtitle' => 'We combine cutting-edge technology, intent-driven strategy, and transparent reporting to deliver compounding digital growth.',
                'cta_text' => 'Connect With Our Experts',
                'cta_link' => '#contact',
                'image'    => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80',
            ],
        ],

        'topics' => [
            'label'       => 'Topics Marquee',
            'icon'        => 'fa-solid fa-tags',
            'description' => 'Smooth scrolling continuous ticker highlighting core focus topics and competencies.',
            'fields' => [
                ['name' => 'topics', 'type' => 'text', 'label' => 'Comma-separated topics', 'placeholder' => 'Technical SEO, Web Development, Link Building, Content Strategy, Analytics, Schema Markup', 'required' => true],
            ],
            'preview' => [
                'topics' => ['Technical SEO', 'Web Development', 'Link Building', 'Content Strategy', 'Core Web Vitals', 'Conversion Rate Optimization', 'Analytics & Reporting'],
            ],
        ],

        'about' => [
            'label'       => 'About + Feature Grid',
            'icon'        => 'fa-solid fa-circle-info',
            'description' => 'Comprehensive section with deep-dive narrative on one side and a 2x2 grid of feature cards on the other.',
            'fields' => [
                ['name' => 'kicker',    'type' => 'text',     'label' => 'Kicker / Pre-heading', 'placeholder' => 'About The Service', 'required' => false],
                ['name' => 'heading',   'type' => 'text',     'label' => 'Section Heading',      'placeholder' => 'Targeted, conversion-focused solutions.', 'required' => true],
                ['name' => 'paragraph', 'type' => 'textarea', 'label' => 'Section Paragraph',    'placeholder' => 'We build specialized programs designed to engage audiences, nurture leads, and generate high-intent conversions.', 'required' => true],
                ['name' => 'image',     'type' => 'image',    'label' => 'Side Showcase Image (optional)', 'placeholder' => 'https://picsum.photos/seed/rt-about/900/1000', 'required' => false],
            ],
            'repeater' => [
                'label'  => 'Feature Cards',
                'fields' => [
                    ['name' => 'icon',        'type' => 'text',     'label' => 'Icon (chart, bolt, shield, pen, check)', 'placeholder' => 'chart', 'required' => false],
                    ['name' => 'title',       'type' => 'text',     'label' => 'Feature Title',       'placeholder' => 'Data-Backed Strategy', 'required' => true],
                    ['name' => 'description', 'type' => 'textarea', 'label' => 'Feature Description', 'placeholder' => 'Every decision is validated by search volume, intent, and competitor gap analysis.', 'required' => true],
                    ['name' => 'benefit',     'type' => 'text',     'label' => 'Benefit Line',        'placeholder' => 'Rank for terms that actually convert.', 'required' => false],
                ],
            ],
            'preview' => [
                'kicker'    => 'About The Service',
                'heading'   => 'Targeted, conversion-focused digital solutions.',
                'paragraph' => 'We build comprehensive programs that start with rigorous forensic analysis, layer on intent-driven execution, and compound value month over month.',
                'image'     => 'https://picsum.photos/seed/rt-about/900/1000',
                'items'     => [
                    ['icon' => 'chart',  'title' => 'Data-Backed Strategy', 'description' => 'Every decision is validated by empirical search volume, audience intent, and gap analysis.', 'benefit' => 'Target terms that actually convert, not vanity metrics.'],
                    ['icon' => 'bolt',   'title' => 'Technical Excellence',  'description' => 'Crawlability, architecture, Core Web Vitals, and structured schemas handled end-to-end.', 'benefit' => 'Faster indexation and resilient organic rankings.'],
                    ['icon' => 'pen',    'title' => 'Authoritative Content', 'description' => 'Expert-level briefs, drafts, and creative assets designed to engage and persuade.', 'benefit' => 'Content that earns natural backlinks and builds trust.'],
                    ['icon' => 'shield', 'title' => 'Sustainable Growth',    'description' => 'Compliant, white-hat tactics designed to endure algorithm shifts and market updates.', 'benefit' => 'Long-term equity that compounds reliably over time.'],
                ],
            ],
        ],

        'rows' => [
            'label'       => 'Alternating Rows',
            'icon'        => 'fa-solid fa-list',
            'description' => 'Staggered alternating media-and-text rows detailing service offerings, packages, or process steps.',
            'fields' => [
                ['name' => 'heading',  'type' => 'text',     'label' => 'Section Heading (optional)',  'placeholder' => "What's included in our service", 'required' => false],
                ['name' => 'subtitle', 'type' => 'textarea', 'label' => 'Section Subtitle (optional)', 'placeholder' => 'Pick one service or combine them all. Tailored to your objectives.', 'required' => false],
            ],
            'repeater' => [
                'label'  => 'Rows',
                'fields' => [
                    ['name' => 'icon',        'type' => 'text',     'label' => 'Icon (chart, list, pen, bolt)', 'placeholder' => 'chart', 'required' => false],
                    ['name' => 'title',       'type' => 'text',     'label' => 'Row Title',                     'placeholder' => 'Forensic Technical Audit', 'required' => true],
                    ['name' => 'description', 'type' => 'textarea', 'label' => 'Row Description',               'placeholder' => 'A forensic crawl of your site with prioritized fixes for crawl errors, redirects, and index bloat.', 'required' => true],
                    ['name' => 'image',       'type' => 'image',    'label' => 'Row Image (optional)',          'placeholder' => 'https://picsum.photos/seed/row1/700/520', 'required' => false],
                ],
            ],
            'preview' => [
                'heading'  => "What's included in our service",
                'subtitle' => 'Pick one service or combine them all. Talk to our team in the way that suits you best.',
                'items'    => [
                    ['icon' => 'chart', 'title' => 'Forensic Technical Audit', 'description' => 'A comprehensive crawl of your digital architecture with prioritized fixes for crawlability, performance, and structured data.', 'image' => 'https://picsum.photos/seed/row1/700/520'],
                    ['icon' => 'list',  'title' => 'Intent & Keyword Mapping', 'description' => 'We map every page to real commercial intent, quantify revenue opportunity, and build a cohesive 12-month strategic roadmap.', 'image' => 'https://picsum.photos/seed/row2/700/520'],
                ],
            ],
        ],

        'projects' => [
            'label'       => 'Project Slider',
            'icon'        => 'fa-solid fa-chart-line',
            'description' => 'Interactive project showcase with before & after metric toggle and responsive cards.',
            'fields' => [
                ['name' => 'heading',  'type' => 'text',     'label' => 'Section Heading (optional)',  'placeholder' => 'Real numbers from real clients.', 'required' => false],
                ['name' => 'subtitle', 'type' => 'textarea', 'label' => 'Section Subtitle (optional)', 'placeholder' => 'Flip the switch to compare results before and after.', 'required' => false],
            ],
            'repeater' => [
                'label'  => 'Projects',
                'fields' => [
                    ['name' => 'name',        'type' => 'text',     'label' => 'Project / Brand Name',    'placeholder' => 'Retail & E-commerce Platform', 'required' => true],
                    ['name' => 'description', 'type' => 'textarea', 'label' => 'Project Description',     'placeholder' => 'Ranked for 400+ competitive commercial keywords, tripling organic revenue within 6 months.', 'required' => true],
                    ['name' => 'before',      'type' => 'text',     'label' => 'Before Stats (e.g. 720 Traffic, 45 Keywords, 1.2x ROI)', 'placeholder' => '720, 45, 1.2x', 'required' => false],
                    ['name' => 'after',       'type' => 'text',     'label' => 'After Stats (e.g. 2940 Traffic, 380 Keywords, 4.8x ROI)', 'placeholder' => '2940, 380, 4.8x', 'required' => false],
                    ['name' => 'image',       'type' => 'image',    'label' => 'Project Image (optional)', 'placeholder' => 'https://picsum.photos/seed/p1/900/700', 'required' => false],
                ],
            ],
            'preview' => [
                'heading'  => 'Real numbers from real clients.',
                'subtitle' => 'Flip the switch to compare results before and after.',
                'items'    => [
                    [
                        'name'        => 'Retail & E-commerce Growth',
                        'description' => 'Online store ranked for 400+ product keywords, tripling non-paid revenue in 180 days.',
                        'before'      => '720, 1020, 120%',
                        'after'       => '2940, 4310, 488%',
                        'image'       => 'https://picsum.photos/seed/p1/900/700',
                    ],
                    [
                        'name'        => 'B2B Enterprise SaaS',
                        'description' => 'Cloud platform grew qualified demo bookings by 240% through targeted search visibility.',
                        'before'      => '410, 620, 210%',
                        'after'       => '1890, 2750, 460%',
                        'image'       => 'https://picsum.photos/seed/p2/900/700',
                    ],
                ],
            ],
        ],

        'workflow' => [
            'label'       => 'Workflow Timeline',
            'icon'        => 'fa-solid fa-diagram-project',
            'description' => 'Numbered step-by-step roadmap demonstrating how projects are executed end-to-end.',
            'fields' => [
                ['name' => 'heading',  'type' => 'text',     'label' => 'Section Heading (optional)',  'placeholder' => 'How our projects run, end to end.', 'required' => false],
                ['name' => 'subtitle', 'type' => 'textarea', 'label' => 'Section Subtitle (optional)', 'placeholder' => 'A structured workflow keeps every project on time and on target from kickoff to ongoing optimization.', 'required' => false],
            ],
            'repeater' => [
                'label'  => 'Steps',
                'fields' => [
                    ['name' => 'icon',        'type' => 'text',     'label' => 'Icon (phone, chart, bolt, check)', 'placeholder' => 'chart', 'required' => false],
                    ['name' => 'title',       'type' => 'text',     'label' => 'Step Title',                       'placeholder' => '01. Discovery & Audit', 'required' => true],
                    ['name' => 'description', 'type' => 'textarea', 'label' => 'Step Description',                 'placeholder' => 'We review existing benchmarks, competitors, and technical constraints to establish a clear baseline.', 'required' => true],
                ],
            ],
            'preview' => [
                'heading'  => 'How our projects run, end to end.',
                'subtitle' => 'A structured workflow keeps every project on time and on target from kickoff to ongoing optimization.',
                'items'    => [
                    ['icon' => 'phone', 'title' => 'Discovery & Baseline Audit', 'description' => 'We analyze current traffic, crawl logs, user funnels, and competitors to establish measurable KPI goals.'],
                    ['icon' => 'chart', 'title' => 'Strategy & Architecture',    'description' => 'A comprehensive implementation roadmap prioritizing highest-impact fixes and content expansion.'],
                    ['icon' => 'bolt',  'title' => 'Execution & Sprint Rollout', 'description' => 'Rapid iterative execution across technical enhancements, on-page optimization, and outreach.'],
                    ['icon' => 'check', 'title' => 'Measurement & Scaling',      'description' => 'Transparent monthly reports tied directly to revenue growth with ongoing testing and refinement.'],
                ],
            ],
        ],

        'faqs' => [
            'label'       => 'FAQ Accordion',
            'icon'        => 'fa-solid fa-circle-question',
            'description' => 'Clean, interactive accordion answering the most frequent buyer questions.',
            'fields' => [
                ['name' => 'heading',  'type' => 'text',     'label' => 'Section Heading (optional)',  'placeholder' => 'Frequently Asked Questions', 'required' => false],
                ['name' => 'subtitle', 'type' => 'textarea', 'label' => 'Section Subtitle (optional)', 'placeholder' => 'Everything you need to know about our approach and deliverables.', 'required' => false],
            ],
            'repeater' => [
                'label'  => 'FAQs',
                'fields' => [
                    ['name' => 'question', 'type' => 'text',     'label' => 'Question', 'placeholder' => 'How soon can we expect to see measurable results?', 'required' => true],
                    ['name' => 'answer',   'type' => 'textarea', 'label' => 'Answer',   'placeholder' => 'Most clients observe meaningful leading indicators within 30 to 60 days, with compounding gains accelerating over 3 to 6 months.', 'required' => true],
                ],
            ],
            'preview' => [
                'heading'  => 'Frequently Asked Questions',
                'subtitle' => 'Everything you need to know about our approach and deliverables.',
                'items'    => [
                    ['question' => 'How soon can we expect to see measurable results?', 'answer' => 'Most clients observe meaningful leading indicators within 30 to 60 days, with compounding organic gains accelerating steadily over 3 to 6 months.'],
                    ['question' => 'What makes your methodology different from other agencies?', 'answer' => 'We focus exclusively on revenue-generating intent rather than vanity traffic. Every recommendation is backed by transparent data and custom-tailored to your business model.'],
                    ['question' => 'Do you require long-term contracts?', 'answer' => 'We offer flexible engagements including sprint-based projects and rolling monthly partnerships with clear deliverables and no locked-in penalties.'],
                ],
            ],
        ],

        'cta' => [
            'label'       => 'CTA Banner',
            'icon'        => 'fa-solid fa-bullhorn',
            'description' => 'High-conversion banner with bold headline, call-to-action buttons, and contact options.',
            'fields' => [
                ['name' => 'kicker',      'type' => 'text',     'label' => 'Kicker / Small Tag (optional)', 'placeholder' => "Let's Build Something Great", 'required' => false],
                ['name' => 'heading',     'type' => 'text',     'label' => 'Main Heading',                  'placeholder' => 'Ready to accelerate your digital growth?', 'required' => true],
                ['name' => 'description', 'type' => 'textarea', 'label' => 'Description',                   'placeholder' => 'Schedule a free strategy consultation with our senior specialists today.', 'required' => false],
                ['name' => 'button_text', 'type' => 'text',     'label' => 'Primary Button Text',           'placeholder' => 'Discuss Your Project', 'required' => false],
                ['name' => 'button_link', 'type' => 'text',     'label' => 'Primary Button Link',           'placeholder' => '#contact', 'required' => false],
                ['name' => 'image',       'type' => 'image',    'label' => 'Side / Background Image (optional)', 'placeholder' => 'https://...', 'required' => false],
            ],
            'preview' => [
                'kicker'      => "Let's Build Something Great",
                'heading'     => 'Ready to accelerate your digital growth?',
                'description' => 'Schedule a free strategy consultation with our senior specialists today and discover the untapped potential in your funnel.',
                'button_text' => 'Discuss Your Project ↗',
                'button_link' => '#contact',
            ],
        ],

        'related' => [
            'label'       => 'Related Services',
            'icon'        => 'fa-solid fa-link',
            'description' => 'Showcase of related and complementary services to increase cross-engagement.',
            'fields' => [
                ['name' => 'heading',  'type' => 'text',     'label' => 'Section Heading (optional)',  'placeholder' => 'Explore Related Services', 'required' => false],
                ['name' => 'subtitle', 'type' => 'textarea', 'label' => 'Section Subtitle (optional)', 'placeholder' => 'Combine complementary capabilities to accelerate your time-to-market.', 'required' => false],
                ['name' => 'slugs',    'type' => 'text',     'label' => 'Comma-separated service slugs', 'placeholder' => 'search-engine-optimization, performance-marketing, website-development', 'required' => true],
            ],
            'preview' => [
                'heading'  => 'Explore Related Services',
                'subtitle' => 'Combine complementary capabilities to accelerate your time-to-market.',
                'slugs'    => ['search-engine-optimization', 'performance-marketing', 'website-development'],
            ],
        ],

    ],

];
