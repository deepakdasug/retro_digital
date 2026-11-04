<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
	{
    // Optional safety: clear the table so only the services below        	//exist
    Service::truncate();

    $services = [

            // ─────────────────────────────────────────────────────────────
            // 1. SEARCH ENGINE OPTIMIZATION (SEO)
            // ─────────────────────────────────────────────────────────────
            [
                'slug'              => 'search-engine-optimization',
                'title'             => 'Search Engine Optimization',
                'short_description' => 'Rank higher, earn trust, and win qualified organic traffic with technical, on-page and content-led SEO.',
                'meta_description'  => 'Professional SEO services by Retrotech — technical audits, keyword strategy, content and link building that move rankings and revenue.',
                'hero_image'        => 'https://images.unsplash.com/photo-1571171637578-41bc2dd41cd2?auto=format&fit=crop&w=900&q=80',
                'icon_svg'          => 'chart',
                'content' => [
                    'hero' => [
                        'badge'    => 'Award-Winning SEO Agency',
                        'subtitle' => 'Connect with ready-to-buy customers through search. We combine technical SEO, content strategy and authority building to compound organic growth month after month.',
                        'cta'      => 'Get a Free SEO Audit',
                    ],
                    'topics' => [
                        'Technical SEO', 'On-Page SEO', 'Off-Page SEO', 'Keyword Research',
                        'Content Strategy', 'Link Building', 'Local SEO', 'Site Speed',
                        'Schema Markup', 'Core Web Vitals', 'Analytics', 'Reporting',
                    ],
                    'about' => [
                        'heading'   => 'Search visibility that compounds over time.',
                        'paragraph' => 'Retrotech builds SEO programs that start with a forensic technical audit, layer on intent-driven keyword strategy, then compound value through authoritative content and clean link acquisition. Every month you get transparent reporting tied to actual revenue.',
                        'features'  => [
                            ['chart',  'Data-Backed Strategy',  'Every keyword decision is validated by search volume, intent and competitor gap analysis.', 'Rank for terms that actually convert, not vanity traffic.'],
                            ['bolt',   'Technical Excellence', 'Crawlability, indexation, Core Web Vitals and structured data handled end to end.',           'Google indexes your best pages — and ranks them.'],
                            ['pen',    'Content That Ranks',    'Briefs, drafts and optimization built around topical authority.',                          'Content earns links and converts readers.'],
                            ['shield', 'White-Hat Only',        'No shortcuts, no risky link schemes — only sustainable, compliant tactics.',                'Rankings that survive Google algorithm updates.'],
                        ],
                    ],
                    'rows' => [
                        ['chart', 'Technical SEO Audit',        'A forensic crawl of your site — crawl errors, redirects, index bloat, structured data and Core Web Vitals — with a prioritized fix list.', 'seo-audit'],
                        ['list',  'Keyword & Intent Mapping',   'We map every page to real search intent, quantify opportunity, and build a 6–12 month content roadmap.',                                 'seo-keywords'],
                        ['pen',   'On-Page Optimization',       'Title tags, meta descriptions, headings, internal linking, schema markup — all tuned for both crawlers and humans.',                       'seo-onpage'],
                        ['bolt',  'Link Acquisition',           'Editorially-earned backlinks from relevant, high-authority sites. No PBNs, no private networks, no spam.',                                 'seo-links'],
                        ['pen',   'Content Production',         'Long-form, expert-reviewed content designed to answer queries and earn links. Writer briefs, editing, publishing.',                       'seo-content'],
                    ],
                    'projects' => [
                        ['Retail & E-commerce',  'Online store ranked for 400+ product keywords, tripling non-paid revenue.', [726, 1026, '488%'], [2940, 4310, '488%'], 'seo-p1'],
                        ['SaaS & B2B',           'B2B platform grew qualified demo requests via long-tail content.',           [410, 620, '210%'],  [1890, 2750, '210%'], 'seo-p2'],
                        ['Local Services',       'Local business dominated "near me" searches across 3 cities.',             [530, 780, '320%'],  [2410, 3390, '320%'], 'seo-p3'],
                    ],
                    'workflow' => [
                        ['bolt',  'Discovery & Goal Setting',     'Understand business model, target markets, competitors and current visibility.'],
                        ['list',  'Technical Audit',              'Deep crawl: indexation, redirects, speed, schema, mobile usability.'],
                        ['chart', 'Keyword Research',             'Validate demand, intent, difficulty and business value for each target term.'],
                        ['pen',   'Content Roadmap',              'Map keywords to pages; plan creation and optimization in priority order.'],
                        ['bolt',  'On-Page Optimization',         'Ship title/meta/heading/linking changes page by page.'],
                        ['list',  'Technical Fixes',              'Resolve crawl issues, speed bottlenecks and structured-data gaps.'],
                        ['pen',   'Content Production',           'Write, review and publish — long-form, cited and authoritative.'],
                        ['arrow', 'Link Acquisition',             'Outreach, digital PR and editorial placements to build authority.'],
                        ['chart', 'Rank Tracking & Analytics',    'Weekly tracking of keyword positions, organic traffic and conversion.'],
                        ['shield','Monthly Reporting & Iteration','Reviewed playbook: what worked, what to double down on, what to drop.'],
                    ],
                    'faqs' => [
                        ['How long until we see SEO results?', 'Foundational fixes often move rankings within 30–60 days. Meaningful organic growth typically appears by months 3–6. Local SEO can be faster.'],
                        ['Do you guarantee #1 rankings?',      'No ethical SEO can guarantee rankings — anyone who does is misleading you. We commit to strategy, execution and transparent reporting.'],
                        ['Do you follow Google guidelines?',   'Yes — 100% white-hat. Every tactic we use aligns with Google Search Essentials.'],
                        ['Do you write content too?',          'Yes. Every piece goes through a subject-matter-expert brief, a specialist writer and a fact-check pass.'],
                    ],
                    'related' => ['content-marketing', 'paid-marketing', 'social-media-marketing'],
                ],
            ],

            // ─────────────────────────────────────────────────────────────
            // 2. SOCIAL MEDIA MARKETING
            // ─────────────────────────────────────────────────────────────
            [
                'slug'              => 'social-media-marketing',
                'title'             => 'Social Media Marketing',
                'short_description' => 'Grow awareness and community with platform-native content, paid amplification and honest reporting.',
                'meta_description'  => 'Social media marketing services by Retrotech — strategy, content, paid social, community management and reporting across Instagram, LinkedIn, X and more.',
                'hero_image'        => 'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?auto=format&fit=crop&w=900&q=80',
                'icon_svg'          => 'chat',
                'content' => [
                    'hero' => [
                        'badge'    => 'Full-Service Social Media Team',
                        'subtitle' => 'Turn social from a content treadmill into a measurable growth channel. Strategy, creative, paid amplification and community — all under one roof.',
                        'cta'      => 'Get a Social Audit',
                    ],
                    'topics' => [
                        'Instagram', 'LinkedIn', 'X (Twitter)', 'Facebook', 'Reels', 'Shorts',
                        'Content Calendar', 'Community', 'Paid Social', 'Influencers', 'Analytics', 'Reporting',
                    ],
                    'about' => [
                        'heading'   => 'Social platforms built for business outcomes.',
                        'paragraph' => 'Retrotech treats social as a full funnel — from awareness reels that stop the scroll, to LinkedIn thought-leadership that lands enterprise leads, to community replies that keep customers coming back. Every asset is measured, iterated and reported monthly.',
                        'features'  => [
                            ['pen',    'Platform-Native Creative', 'Instagram needs different skills than LinkedIn. We build for each channel individually.', 'Higher engagement, lower cost per result.'],
                            ['bolt',   'Paid Amplification',       'Organic only goes so far — we amplify top posts to reach the right audience fast.',      'Predictable reach and lead flow.'],
                            ['chat',   'Community Management',     'DMs, comments, reviews handled promptly with brand-consistent voice.',                  'Real conversations convert to customers.'],
                            ['chart',  'Full-Funnel Analytics',    'Reach, engagement, clicks, cost per lead and revenue — tracked end to end.',            'Know exactly what to scale, what to cut.'],
                        ],
                    ],
                    'rows' => [
                        ['chat',  'Channel Strategy',      'Pick the 2–3 platforms that actually matter for your audience. Build a distinct playbook per channel.', 'social-strategy'],
                        ['pen',   'Content Calendar',      'Monthly calendar of posts, reels, carousels and stories — planned, designed and scheduled.',        'social-calendar'],
                        ['bolt',  'Paid Social Campaigns', 'Meta, LinkedIn, TikTok ads with creative testing, audience research and bid strategy.',             'social-paid'],
                        ['user',  'Community Management',  'Replies, DMs and review responses handled daily, with escalation rules and FAQs.',                   'social-community'],
                        ['chart', 'Reporting & Optimization','Monthly reviews: top posts, worst posts, cost per outcome, next-month plan.',                       'social-report'],
                    ],
                    'projects' => [
                        ['D2C Fashion Brand',  'Reels-first strategy grew follower base by 4x and drove direct sales.', [12, 48, '300%'], [680, 2140, '300%'], 'social-p1'],
                        ['B2B SaaS',           'LinkedIn thought leadership drove inbound enterprise demos.',           [9, 27, '200%'],  [410, 980, '200%'],  'social-p2'],
                        ['Fitness Studio',     'Instagram Reels + local targeting filled weekend classes.',            [4, 18, '350%'],  [240, 720, '350%'],  'social-p3'],
                    ],
                    'workflow' => [
                        ['bolt',  'Brand & Audience Discovery','Understand brand voice, target personas and current social footprint.'],
                        ['list',  'Channel Selection',        'Pick the platforms where your buyers actually spend time.'],
                        ['pen',   'Content Pillars',          '3–5 recurring content themes that build brand and drive outcomes.'],
                        ['list',  'Monthly Calendar',         'Detailed plan of posts, formats, CTAs and dates.'],
                        ['pen',   'Design & Copy',            'Short-form video, carousels, static posts — platform-perfect.'],
                        ['bolt',  'Paid Amplification',       'Boost top organic posts + always-on campaigns for lead gen.'],
                        ['chat',  'Community Engagement',     'Daily replies, DMs and review responses.'],
                        ['arrow', 'Scheduling & Publishing',  'Scheduled via tools with timezone targeting per channel.'],
                        ['chart', 'Weekly Analytics Review',  'Performance check: best posts, worst posts, spend efficiency.'],
                        ['shield','Monthly Strategy Iteration','Full report + next-month plan based on what worked.'],
                    ],
                    'faqs' => [
                        ['How many posts per month?',        'Typically 12–20 posts per platform, depending on tier. Includes reels, carousels, stories and statics.'],
                        ['Do you handle replies and DMs?',   'Yes — daily community management is included in most tiers. We route sales leads to you immediately.'],
                        ['Do you manage paid social budget?','Yes. Ad spend is billed separately at cost, but we manage targeting, creative and bidding.'],
                        ['Which platforms do you support?',  'Instagram, LinkedIn, X, Facebook, TikTok, YouTube Shorts and Pinterest.'],
                    ],
                    'related' => ['paid-marketing', 'content-marketing', 'video-marketing'],
                ],
            ],

            // ─────────────────────────────────────────────────────────────
            // 3. PAID MARKETING
            // ─────────────────────────────────────────────────────────────
            [
                'slug'              => 'paid-marketing',
                'title'             => 'Paid Marketing',
                'short_description' => 'Turn ad spend into predictable revenue with Google, Meta and LinkedIn campaigns built for ROI.',
                'meta_description'  => 'Paid marketing services by Retrotech — Google Ads, Meta Ads, LinkedIn Ads, creative testing and conversion tracking that delivers real ROI.',
                'hero_image'        => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80',
                'icon_svg'          => 'bolt',
                'content' => [
                    'hero' => [
                        'badge'    => 'Performance Marketing Experts',
                        'subtitle' => 'Stop funding campaigns you can’t measure. We build paid funnels — Google, Meta, LinkedIn — that pay for themselves and scale predictably.',
                        'cta'      => 'Request a Media Plan',
                    ],
                    'topics' => [
                        'Google Ads', 'Meta Ads', 'LinkedIn Ads', 'YouTube Ads', 'Shopping Ads',
                        'Retargeting', 'Creative Testing', 'Bid Strategy', 'Landing Pages',
                        'Conversion Tracking', 'Attribution', 'Reporting',
                    ],
                    'about' => [
                        'heading'   => 'Paid campaigns engineered for ROI, not vanity metrics.',
                        'paragraph' => 'Retrotech builds paid programs the way a portfolio manager builds positions — small tests to validate, then aggressive scaling on proven winners. Every dollar is tracked to a conversion event.',
                        'features'  => [
                            ['bolt',   'Full-Funnel Campaigns',   'Awareness, consideration and retargeting layers working together.', 'The right message at every stage of the funnel.'],
                            ['chart',  'Creative Testing',        'Rigorous A/B testing of ads, hooks, and offers.',                  'The best-performing creative scales; the rest gets cut.'],
                            ['shield', 'Accurate Tracking',       'GA4, server-side tracking and conversion APIs.',                    'Decisions based on truth, not attribution guesswork.'],
                            ['user',   'Landing Page CRO',        'Ads only work if the landing page does.',                           'Higher conversion rate = lower cost per acquisition.'],
                        ],
                    ],
                    'rows' => [
                        ['chart', 'Account Setup & Audit',      'Full rebuild of account structure, campaign naming, conversion tracking and attribution.', 'paid-setup'],
                        ['bolt',  'Google Search & Shopping',   'High-intent keyword campaigns, Shopping feeds, Performance Max — tuned weekly.',         'paid-google'],
                        ['user',  'Meta & Social Ads',          'Facebook and Instagram ad funnels built around broad targeting and creative iteration.',   'paid-meta'],
                        ['list',  'LinkedIn B2B Ads',           'Account-based targeting for B2B lead gen, thought-leadership ads and demo requests.',      'paid-linkedin'],
                        ['pen',   'Landing Page CRO',           'Test copy, layout, offer and form to lift conversion rate without more spend.',             'paid-cro'],
                    ],
                    'projects' => [
                        ['E-commerce',   'Google Shopping + Meta retargeting scaled ROAS to 5.8x.',    [240, 720, '188%'], [1210, 2980, '188%'], 'paid-p1'],
                        ['B2B SaaS',     'LinkedIn ABM campaigns drove $1.2M pipeline in 90 days.',    [310, 850, '174%'], [1580, 3410, '174%'], 'paid-p2'],
                        ['Real Estate',  'Meta lead-gen funnel reduced cost per lead by 62%.',         [180, 470, '160%'], [820, 1980, '160%'],  'paid-p3'],
                    ],
                    'workflow' => [
                        ['shield','Account Access & Audit',   'Full review of existing accounts, tracking and creative.'],
                        ['chart', 'Conversion Tracking',      'GA4, server-side events, offline imports — properly wired.'],
                        ['list',  'Campaign Architecture',    'Naming, account structure, budget split by funnel stage.'],
                        ['pen',   'Creative Development',     'Ad copy, images, video assets — enough variants to test properly.'],
                        ['bolt',  'Launch Test Wave',         'Small-budget tests to find winning audiences and creative.'],
                        ['chart', 'Data Review',              'Read results after 5–7 days — winners vs. losers identified.'],
                        ['arrow', 'Scale Winners',            'Push budget on winning combos; kill losers quickly.'],
                        ['pen',   'Landing Page Tuning',      'CRO tests based on the ad promise and traffic source.'],
                        ['bolt',  'Ongoing Iteration',        'Weekly optimization, monthly creative refresh.'],
                        ['shield','Reporting & Transparency', 'Live dashboards + monthly deep dive with recommendations.'],
                    ],
                    'faqs' => [
                        ['What ad budget do I need?',       'Most clients see meaningful traction from $1.5k+ per month in ad spend. Below this, data accumulates too slowly to optimize effectively.'],
                        ['Do you charge a % of ad spend?',  'We offer both flat retainer and % of spend — we’ll recommend based on your budget and goals.'],
                        ['Do you handle creative too?',     'Yes — static, video and UGC-style creative included in most retainers.'],
                        ['What platforms do you run?',      'Google, Meta (Facebook + Instagram), LinkedIn, YouTube, and TikTok.'],
                    ],
                    'related' => ['search-engine-optimization', 'social-media-marketing', 'email-marketing'],
                ],
            ],

            // ─────────────────────────────────────────────────────────────
            // 4. EMAIL MARKETING
            // ─────────────────────────────────────────────────────────────
            [
                'slug'              => 'email-marketing',
                'title'             => 'Email Marketing',
                'short_description' => 'Own your audience with automated email funnels, segmentation and campaigns that convert.',
                'meta_description'  => 'Email marketing services by Retrotech — automation, segmentation, flows and campaigns that turn subscribers into repeat customers.',
                'hero_image'        => 'https://images.unsplash.com/photo-1596526131083-e8c633c948d2?auto=format&fit=crop&w=900&q=80',
                'icon_svg'          => 'mail',
                'content' => [
                    'hero' => [
                        'badge'    => 'Retention Marketing Specialists',
                        'subtitle' => 'Email is still the highest-ROI channel in digital. We build automated flows and campaigns that turn subscribers into repeat customers — while keeping deliverability intact.',
                        'cta'      => 'Get a Flow Audit',
                    ],
                    'topics' => [
                        'Welcome Flows', 'Abandoned Cart', 'Browse Abandonment', 'Post-Purchase',
                        'Win-Back', 'Segmentation', 'A/B Testing', 'Deliverability',
                        'List Growth', 'Klaviyo', 'Mailchimp', 'Reporting',
                    ],
                    'about' => [
                        'heading'   => 'Email that feels personal, performs like performance.',
                        'paragraph' => 'Retrotech builds email systems that run like clockwork — welcome flows, cart recovery, post-purchase nurture, win-backs — plus seasonal campaigns that get opened. Every send is tested, segmented and measured.',
                        'features'  => [
                            ['bolt',   'Automated Flows',       'Welcome, cart, post-purchase, win-back — set once, run forever.',  'Revenue on autopilot, no per-campaign effort.'],
                            ['list',   'Smart Segmentation',    'Segment by behavior, purchase history and lifecycle stage.',       'The right message to the right subscriber.'],
                            ['shield', 'Deliverability Focus',  'SPF, DKIM, DMARC, warm-up, list hygiene — deliverability-first.',   'Emails land in the inbox, not spam.'],
                            ['chart',  'Revenue Attribution',   'Every email tracked to open, click and revenue.',                  'See exactly which flow earns what.'],
                        ],
                    ],
                    'rows' => [
                        ['mail',  'Flow Architecture',        'Welcome, cart, browse, post-purchase, win-back — mapped end to end.', 'email-flows'],
                        ['list',  'List Growth & Lead Magnets','Pop-ups, quizzes, lead magnets — growing quality subscribers.',      'email-growth'],
                        ['pen',   'Design & Copywriting',     'Brand-aligned templates and copy engineered for clicks.',             'email-design'],
                        ['bolt',  'A/B Testing',              'Subject lines, send times, content layouts — rigorously tested.',      'email-abtest'],
                        ['shield','Deliverability & Compliance','Authentication, warming, list hygiene and CAN-SPAM/GDPR compliance.', 'email-deliver'],
                    ],
                    'projects' => [
                        ['D2C Skincare',  'Welcome + win-back flows drove 38% of email revenue.',  [4, 15, '275%'], [180, 640, '275%'],  'email-p1'],
                        ['B2B Services',  'Nurture sequences doubled demo bookings.',              [3, 12, '300%'], [140, 560, '300%'],  'email-p2'],
                        ['Online Courses','Segmented campaigns lifted open rate to 62%.',          [8, 22, '175%'], [320, 890, '175%'],  'email-p3'],
                    ],
                    'workflow' => [
                        ['list',  'Audit & Setup',             'Review existing lists, flows, sender reputation.'],
                        ['bolt',  'Authentication',            'SPF, DKIM and DMARC configured correctly.'],
                        ['pen',   'Flow Design',               'Map the customer lifecycle to email touchpoints.'],
                        ['mail',  'Template Build',            'Modular, mobile-first templates for each flow.'],
                        ['pen',   'Copywriting',               'Subject lines, body copy and CTAs written for each flow.'],
                        ['list',  'Segmentation',              'Behavior and lifecycle segments built inside your ESP.'],
                        ['bolt',  'Flow Launch',               'Flows enabled and tested end-to-end.'],
                        ['chart', 'A/B Testing',               'Subject lines, content and send times tested and iterated.'],
                        ['arrow', 'Campaign Calendar',         'Seasonal campaigns planned and designed in advance.'],
                        ['shield','Reporting & Optimization',  'Monthly report + flow tuning + new opportunities.'],
                    ],
                    'faqs' => [
                        ['Which email platforms do you use?', 'Klaviyo, Mailchimp, HubSpot, ActiveCampaign and Brevo. We’ll recommend one based on your stack.'],
                        ['Do you build the flows or just write copy?','Both — flow design, template build, copywriting and deployment end to end.'],
                        ['How long does setup take?', 'Typically 3–4 weeks for a full flow build. Existing accounts can be optimized in 1–2 weeks.'],
                        ['Can you fix deliverability issues?', 'Yes — this is one of our specialities. We audit and fix SPF/DKIM/DMARC, warming and list hygiene.'],
                    ],
                    'related' => ['search-engine-optimization', 'content-marketing', 'social-media-marketing'],
                ],
            ],

        

	            // ─────────────────────────────────────────────────────────────
            // 5. ORM SERVICES
            // ─────────────────────────────────────────────────────────────
            [
                'slug'              => 'orm-services',
                'title'             => 'ORM Services',
                'short_description' => 'Protect and improve your brand reputation across Google, review sites and social channels.',
                'meta_description'  => 'Online reputation management by Retrotech — review strategy, Google Business optimization, complaint handling, brand monitoring and crisis response.',
                'hero_image'        => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=900&q=80',
                'icon_svg'          => 'shield',
                'content' => [
                    'hero' => [
                        'badge'    => 'Reputation Defence Experts',
                        'subtitle' => 'Your reputation is your first impression. We monitor, respond and rebuild across Google, review sites and social — with a structured playbook ready to deploy.',
                        'cta'      => 'Get a Reputation Audit',
                    ],
                    'topics' => [
                        'Google Reviews', 'Trustpilot', 'Glassdoor', 'Complaint Handling',
                        'Brand Monitoring', 'Crisis Response', 'Knowledge Panel', 'Local Listings',
                        'Review Generation', 'Competitor Watch', 'SERP Control', 'Reporting',
                    ],
                    'about' => [
                        'heading'   => 'Proactive reputation management — not damage control.',
                        'paragraph' => 'Retrotech builds reputation programs that get ahead of problems: review generation engines, response playbooks, brand monitoring, and SERP strategies that keep the good stuff visible and the bad stuff buried.',
                        'features'  => [
                            ['shield', 'Real-Time Monitoring', 'Brand mentions, review sites and search results tracked 24/7.',  'You hear it first — not last.'],
                            ['chat',   'Response Playbooks',  'Response templates and escalation paths ready for every scenario.', 'Consistent, brand-safe replies within hours.'],
                            ['pen',    'Review Generation',   'Automated review request flows that lift rating scores.',           'More 5-stars, more customers.'],
                            ['chart',  'SERP Control',        'Own page 1 with brand-owned assets and positive press.',            'Damage pushed off the first page.'],
                        ],
                    ],
                    'rows' => [
                        ['shield','Brand Audit',           'Full audit across Google, review sites and social mentions.',        'orm-audit'],
                        ['chat',  'Review Response',       'Professional, brand-consistent replies to every review within 24h.',  'orm-response'],
                        ['bolt',  'Review Generation',     'Automated request flows triggered post-purchase or post-service.',    'orm-generate'],
                        ['list',  'Complaint Escalation',  'Tiered playbook for handling complex complaints without escalation.', 'orm-complaints'],
                        ['chart', 'SERP & Crisis',         'Content and PR to control page 1 search results during a crisis.',    'orm-crisis'],
                    ],
                    'projects' => [
                        ['Healthcare',   'Grew Google rating from 3.6 to 4.8 in 6 months.',           [12, 48, '300%'], [680, 2140, '300%'], 'orm-p1'],
                        ['E-commerce',   'Negative reviews buried from page 1 by month 3.',            [9, 27, '200%'],  [410, 980, '200%'],  'orm-p2'],
                        ['SaaS',         'Crisis response playbook averted major PR damage.',           [4, 18, '350%'],  [240, 720, '350%'],  'orm-p3'],
                    ],
                    'workflow' => [
                        ['shield','Audit',                  'Map all mentions across Google, review sites and social.'],
                        ['list',  'Prioritization',         'Sort issues by severity and business impact.'],
                        ['chat',  'Response Playbooks',     'Standard responses for common scenarios, escalation rules for edge cases.'],
                        ['bolt',  'Review Generation',      'Automated request flows triggered at the right moment.'],
                        ['pen',   'Content Assets',         'Own the SERP with owned content, press and case studies.'],
                        ['arrow', 'PR & Outreach',          'Third-party credibility to push down negatives.'],
                        ['chart', 'Competitor Monitoring',  'Track competitor mentions and reputation shifts.'],
                        ['shield','Crisis Readiness',       'Standby playbook, holding statements, response team.'],
                        ['arrow', 'SERP Tracking',          'Weekly check of page 1 results for your brand keywords.'],
                        ['chart', 'Reporting',              'Monthly dashboard of mentions, sentiment, ratings and SERP position.'],
                    ],
                    'faqs' => [
                        ['Can you remove bad reviews?',        'Genuine reviews cannot be removed. But we can flag reviews that violate platform policies, bury negatives through SERP control, and rebuild overall rating with volume.'],
                        ['How quickly can you help?',          'Response playbooks deploy within days. Rating improvement is typically visible in 30–90 days. Crisis response is immediate.'],
                        ['Do you offer 24/7 monitoring?',      'Yes — 24/7 brand monitoring is standard on all ORM retainers.'],
                        ['Can you help during a PR crisis?',   'Yes — we maintain a crisis-response retainer with pre-approved statements and rapid deployment.'],
                    ],
                    'related' => ['social-media-marketing', 'search-engine-optimization', 'content-marketing'],
                ],
            ],

            // ─────────────────────────────────────────────────────────────
            // 6. CONTENT MARKETING
            // ─────────────────────────────────────────────────────────────
            [
                'slug'              => 'content-marketing',
                'title'             => 'Content Marketing',
                'short_description' => 'Build authority with content that ranks, converts and compounds — blogs, guides and thought leadership.',
                'meta_description'  => 'Content marketing services by Retrotech — strategy, writing, editing and distribution for blogs, guides and thought leadership that drive real revenue.',
                'hero_image'        => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=900&q=80',
                'icon_svg'          => 'list',
                'content' => [
                    'hero' => [
                        'badge'    => 'Content-Led Growth',
                        'subtitle' => 'Good content earns rankings, links and trust — but only if it’s the right content, written well, and distributed properly. We build engines that do all three.',
                        'cta'      => 'Request a Content Audit',
                    ],
                    'topics' => [
                        'Content Strategy', 'Blog Posts', 'Pillar Pages', 'Thought Leadership',
                        'Case Studies', 'Whitepapers', 'SEO Writing', 'Editorial Calendar',
                        'Subject Experts', 'Distribution', 'Analytics', 'Reporting',
                    ],
                    'about' => [
                        'heading'   => 'Content that earns attention — and revenue.',
                        'paragraph' => 'Retrotech builds content programs that compound. We start from real search and buyer intent data, brief each piece with subject-matter experts, write in your voice, and distribute like a publisher — not a blog.',
                        'features'  => [
                            ['list',   'Data-Backed Topics',   'Every topic validated by search demand, buyer intent and competitor gap.', 'Content that gets found by the right people.'],
                            ['pen',    'Expert-Led Writing',   'Subject-matter experts briefed and interviewed for each piece.',          'Credibility and depth that AI content can’t match.'],
                            ['chart',  'SEO & AEO Optimized', 'Tuned for both traditional SEO and AI-search citation.',                   'Content visible in Google — and in AI answers.'],
                            ['bolt',   'Distribution Engine', 'Repurposed across email, social, LinkedIn and video.',                    'Each piece works 5–10x harder.'],
                        ],
                    ],
                    'rows' => [
                        ['list',  'Content Strategy',        'Audience research, buyer journey mapping, topic clusters and publishing cadence.', 'content-strategy'],
                        ['pen',   'Editorial Calendar',      'Monthly and quarterly calendar — what, when, who, and why.',                        'content-calendar'],
                        ['list',  'Content Production',      'Blog posts, guides, whitepapers, case studies — written, edited, fact-checked.',    'content-write'],
                        ['bolt',  'Distribution',            'Cross-channel promotion: newsletter, social, repurposed video and PDF.',            'content-distribute'],
                        ['chart', 'Analytics & Iteration',   'Track rankings, traffic and conversions — iterate to double down on winners.',       'content-report'],
                    ],
                    'projects' => [
                        ['B2B SaaS',   'Content engine drove 45% of all inbound leads.',           [12, 48, '300%'], [680, 2140, '300%'], 'content-p1'],
                        ['Fintech',    'Pillar pages ranked #1 for 12 commercial keywords.',       [9, 27, '200%'],  [410, 980, '200%'],  'content-p2'],
                        ['Healthcare', 'Case studies + guides cut sales cycle by 30%.',            [4, 18, '350%'],  [240, 720, '350%'],  'content-p3'],
                    ],
                    'workflow' => [
                        ['bolt',  'Discovery',              'Understand audience, product and revenue goals.'],
                        ['list',  'Content Strategy',       'Cluster plan, cadence and channel map.'],
                        ['pen',   'Topic Briefs',           'Detailed briefs with SEO intent, outline and SMEs to interview.'],
                        ['list',  'Subject Expert Outreach','Interview founders and team to capture unique POVs.'],
                        ['pen',   'Writing & Editing',      'Draft, edit, fact-check, design inline visuals.'],
                        ['shield','Publishing Prep',        'SEO checks, metadata, internal linking, schema.'],
                        ['arrow', 'Publishing & Promotion', 'Publish + distribute to newsletter, social and LinkedIn.'],
                        ['bolt',  'Repurposing',            'Each piece → 4 social posts + 1 video + 1 newsletter.'],
                        ['chart', 'Analytics',              'Traffic, rankings, conversions per piece — reviewed monthly.'],
                        ['shield','Iteration',              'Improve top performers, cull bottom, publish next.'],
                    ],
                    'faqs' => [
                        ['Who writes the content?',       'Trained writers paired with subject-matter experts from your team (or ours) for credibility.'],
                        ['Do you research topics?',       'Yes — topic selection is based on search volume, intent and competitor gap data.'],
                        ['Do you handle publishing?',     'Yes — we can publish directly to your CMS or deliver ready-to-publish drafts.'],
                        ['How long until content pays off?','Usually 3–6 months for compounding SEO, faster for distribution-led content.'],
                    ],
                    'related' => ['search-engine-optimization', 'email-marketing', 'social-media-marketing'],
                ],
            ],

            // ─────────────────────────────────────────────────────────────
            // 7. VIDEO MARKETING
            // ─────────────────────────────────────────────────────────────
            [
                'slug'              => 'video-marketing',
                'title'             => 'Video Marketing',
                'short_description' => 'Short-form reels, YouTube strategy and repurposed long-form video that build brand and drive sales.',
                'meta_description'  => 'Video marketing services by Retrotech — short-form reels, YouTube strategy, ad creative and long-form brand video production.',
                'hero_image'        => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=900&q=80',
                'icon_svg'          => 'pen',
                'content' => [
                    'hero' => [
                        'badge'    => 'Short-Form & Long-Form Video',
                        'subtitle' => 'Video is now the front door of your brand. We build reels, YouTube content, ad creative and repurposed clips that actually move people to act.',
                        'cta'      => 'Plan a Video Strategy',
                    ],
                    'topics' => [
                        'Reels', 'YouTube', 'Shorts', 'TikTok', 'Ad Creative', 'Editing',
                        'Scripting', 'Storyboards', 'Repurposing', 'Thumbnails',
                        'Audience Research', 'Analytics',
                    ],
                    'about' => [
                        'heading'   => 'Video content built for both algorithms and customers.',
                        'paragraph' => 'Retrotech runs a full video engine — ideation, scripting, shooting, editing and repurposing — so each piece works hard across reels, Shorts, TikTok, YouTube and paid ads. Native to each platform, never repurposed lazily.',
                        'features'  => [
                            ['pen',    'Reels & Shorts Engine',  'Fast, scroll-stopping short-form content produced weekly.',        'Consistent reach without creative burnout.'],
                            ['bolt',   'YouTube Strategy',       'Long-form SEO-driven content that builds audience and authority.',  'Compounding reach, evergreen traffic.'],
                            ['chart',  'Ad Creative Testing',    'Meta and YouTube video ads built to convert.',                      'Higher thumb-stop and lower CPMs.'],
                            ['user',   'Full Production',        'Idea → script → shoot → edit → publish, managed end to end.',       'One accountable team. Zero handoffs.'],
                        ],
                    ],
                    'rows' => [
                        ['pen',   'Content Ideation',         'Data-driven idea pipeline — what’s trending, what competitors miss, what your audience wants.', 'video-ideas'],
                        ['list',  'Scripting & Storyboards', 'Hooks, structure and narrative designed for retention.',                                       'video-script'],
                        ['bolt',  'Filming & Production',     'Studio or on-location shoots, UGC-style creator shoots, or remote recording.',                 'video-shoot'],
                        ['pen',   'Post-Production',          'Editing, captions, animations, sound design and platform-ready exports.',                     'video-edit'],
                        ['chart', 'Distribution & Analytics', 'Publishing across channels + performance tracking per video.',                                'video-report'],
                    ],
                    'projects' => [
                        ['Skincare D2C',    'Reels strategy drove 12M organic views in 90 days.',           [12, 48, '300%'], [680, 2140, '300%'], 'video-p1'],
                        ['SaaS Platform',   'YouTube channel turned into the #1 demo source.',              [9, 27, '200%'],  [410, 980, '200%'],  'video-p2'],
                        ['Fitness Brand',   'TikTok + Reels creative drove app installs at $0.62 CPI.',       [4, 18, '350%'],  [240, 720, '350%'],  'video-p3'],
                    ],
                    'workflow' => [
                        ['list',  'Audience & Channel Research','Where does your audience watch? What hooks them?'],
                        ['bolt',  'Content Pillars',            '3–5 recurring themes so content builds an identity.'],
                        ['pen',   'Scripting',                  'Hook → tension → resolution → CTA.'],
                        ['list',  'Production Plan',            'Shoot schedule, locations, talent, props.'],
                        ['bolt',  'Filming',                    'Studio, on-location or UGC-style — match the format to the message.'],
                        ['pen',   'Editing',                    'Cut, caption, animate, sound design, platform exports.'],
                        ['chart', 'Platform-Native Publishing', 'Publish with the right dimensions, hooks and captions per channel.'],
                        ['arrow', 'Repurposing',                'One long video → 8–10 short clips → LinkedIn carousels.'],
                        ['shield','Compliance & Rights',        'Music licensing, usage rights, disclosure compliance.'],
                        ['chart', 'Analytics & Iteration',      'Watch time, retention, CTR — iterated monthly.'],
                    ],
                    'faqs' => [
                        ['Do you shoot the videos or do we?','Both models work. We can shoot in our studio or work with your existing content team.'],
                        ['How many videos per month?',       'Typically 4–8 long-form and 12–20 short clips monthly, depending on tier.'],
                        ['Do you handle UGC creators?',      'Yes — we manage a network of creators for authentic UGC-style content.'],
                        ['What about music licensing?',      'All music used is properly licensed. We handle the compliance.'],
                    ],
                    'related' => ['social-media-marketing', 'paid-marketing', 'content-marketing'],
                ],
            ],
];

        foreach ($services as $data) {
            Service::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}