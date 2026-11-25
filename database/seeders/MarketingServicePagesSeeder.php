<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class MarketingServicePagesSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->pages() as [$attributes, $sections]) {
            $service = Service::firstOrCreate(['slug' => $attributes['slug']], $attributes);
            if ($service->sections()->exists()) {
                continue;
            }

            $this->writeSections($service, $sections);
        }
    }

    public function redesign(): void
    {
        foreach ($this->pages() as [$attributes, $sections]) {
            $service = Service::firstOrCreate(['slug' => $attributes['slug']], $attributes);
            $service->update($attributes);
            $service->sections()->delete();
            $this->writeSections($service, $sections);
        }
    }

    private function writeSections(Service $service, array $sections): void
    {
        foreach ($sections as $sortOrder => [$type, $content]) {
            $service->sections()->create([
                'section_type' => $type,
                'content' => $content,
                'sort_order' => $sortOrder,
                'is_active' => true,
            ]);
        }
    }

    private function pages(): array
    {
        return [
            [$this->paidPageAttributes(), $this->paidSections()],
            [$this->emailPageAttributes(), $this->emailSections()],
            [$this->contentPageAttributes(), $this->contentSections()],
            [$this->ormPageAttributes(), $this->ormSections()],
        ];
    }

    private function paidPageAttributes(): array
    {
        return [
            'page_section' => 'services',
            'slug' => 'paid-marketing',
            'title' => 'Paid Marketing That Pays for Itself',
            'short_description' => 'Google, Meta, and LinkedIn campaigns built to test fast, prove themselves, then scale.',
            'description' => 'Full-funnel paid programs with creative testing, bid strategy, and clear reporting that tie spend to qualified pipeline.',
            'meta_title' => 'Paid Marketing Services | Google, Meta, LinkedIn Ads',
            'meta_description' => 'Build paid campaigns that prove themselves before budget scales. Data-driven creative, bid strategy, and conversion reporting for reliable ROI.',
            'meta_keywords' => 'paid marketing, Google Ads, Meta Ads, LinkedIn Ads, retargeting, campaign testing, ad automation',
            'og_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1600&q=80',
        ];
    }

    private function paidSections(): array
    {
        return [
            ['seo_hero', [
                'eyebrow' => 'PAID MEDIA THAT PREDICTABLY PROFITS',
                'heading' => 'Turn every ad rupee into more than you put in.',
                'body' => 'We build Google, Meta and LinkedIn campaigns that start with real intent, test creative fast, and scale only what proves itself — with reporting you can trust.',
                'hero_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1600&q=80',
                'hero_image_alt' => 'Paid media dashboard review',
                'button_text' => 'Get a media plan',
                'button_link' => '/contact#contact',
                'items' => [
                    ['value' => '4.8x', 'label' => 'Average ROAS'],
                    ['value' => '-38%', 'label' => 'Cost per qualified lead'],
                    ['value' => '12x', 'label' => 'Creative variants tested'],
                ],
            ]],
            ['seo_proof', [
                'heading' => 'Performance marketing with discipline built in.',
                'items' => [
                    ['value' => 'Full funnel', 'label' => 'Awareness, consideration and retargeting working as one system'],
                    ['value' => 'Creative testing', 'label' => 'A/B and winner-takes-all scaling for high-performing assets'],
                    ['value' => 'Transparent reporting', 'label' => 'Spend, outcomes and attribution surfaced every week'],
                ],
            ]],
            ['seo_audit', [
                'eyebrow' => 'Start where the leaks are',
                'heading' => 'Find the spend that is quietly wasting money.',
                'body' => 'Before increasing budget, review account structure, tracking gaps, creative fatigue and landing-page drop-offs — then fix the leaks first.',
                'items' => [
                    ['image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80', 'title' => 'Account structure & naming', 'description' => 'Rebuild for clearer reporting and bid control.'],
                    ['image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80', 'title' => 'Tracking and attribution gaps', 'description' => 'Fix missing conversions, UTM hygiene and offline import gaps.'],
                    ['image' => 'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?auto=format&fit=crop&w=900&q=80', 'title' => 'Creative saturation & kill list', 'description' => 'Identify falling-off assets before they cost you.'],
                    ['image' => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=900&q=80', 'title' => 'Landing-page drop-off', 'description' => 'Map traffic loss and validate offers before scaling.'],
                ],
            ]],
            ['seo_services', [
                'eyebrow' => 'What we deliver',
                'heading' => 'Campaigns engineered for scale.',
                'body' => 'From account setup to weekly optimization, every layer is built to prove itself fast.',
                'items' => [
                    ['icon' => 'fa-solid fa-magnifying-glass', 'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80', 'title' => 'Google Search & Shopping', 'description' => 'High-intent search, Performance Max and Shopping feeds tuned continuously.'],
                    ['icon' => 'fa-brands fa-facebook-f', 'image' => 'https://images.unsplash.com/photo-1611162616475-46b635cb6868?auto=format&fit=crop&w=900&q=80', 'title' => 'Meta & Social Ads', 'description' => 'Broad Meta and granular Instagram, plus horizontal audience experiments.'],
                    ['icon' => 'fa-solid fa-linkedin', 'image' => 'https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=900&q=80', 'title' => 'LinkedIn B2B', 'description' => 'ABM and account-based campaigns aimed at decision-makers.'],
                    ['icon' => 'fa-solid fa-video', 'image' => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=900&q=80', 'title' => 'YouTube Growth', 'description' => 'Long-form campaigns that capture attention and create demand.'],
                    ['icon' => 'fa-solid fa-chart-line', 'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80', 'title' => 'Conversion Tracking', 'description' => 'Clean GA4, server-side events and conversion APIs for truthful math.'],
                    ['icon' => 'fa-solid fa-grip', 'image' => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=900&q=80', 'title' => 'Landing Page CRO', 'description' => 'Speed, clarity and CTA optimisation from ad traffic.'],
                ],
            ]],
            ['seo_process', [
                'eyebrow' => 'A fast delivery rhythm',
                'heading' => 'Test, prove, scale.',
                'body' => 'Creative launches weekly, results are read quickly, and spend moves only to winners.',
                'items' => [
                    ['title' => 'Audit & setup', 'description' => 'Review accounts, fix structure, naming and tracking.'],
                    ['title' => 'Launch test wave', 'description' => 'Small budget to find winning audiences and creatives.'],
                    ['title' => 'Scale winners', 'description' => 'Push budget on signals, kill the rest quickly.'],
                    ['title' => 'Optimise & report', 'description' => 'Weekly reads of ROAS, CPL and pipeline quality.'],
                ],
            ]],
            ['seo_intent', [
                'eyebrow' => 'Meet buyers at every stage',
                'heading' => 'Match ad spend to intent.',
                'body' => 'Different budgets for research, comparison and ready-to-buy searchers make every dollar reach the closest fit.',
                'items' => [
                    ['title' => 'Researching', 'description' => 'Capture interest before prices get real.'],
                    ['title' => 'Comparing', 'description' => 'Give them a clear answer in your range.'],
                    ['title' => 'Ready to buy', 'description' => 'Point only high-intent traffic at high-intent offers.'],
                ],
            ]],
            ['seo_content', [
                'eyebrow' => 'Creative that earns the click',
                'heading' => 'Build a creative system, not one-off ads.',
                'intro' => 'Winning paid media is a production line: fresh hooks, clear proof, platform-native cuts, and a weekly read on what deserves more budget.',
                'banner_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1600&q=80',
                'banner_image_alt' => 'Paid campaign creative performance dashboard',
                'banner_text' => 'Make the next winner before the last one fades.',
                'principle_heading' => 'Test angles, not just colours.',
                'principle_description' => 'We generate hook, offer, proof, and format variations so the data tells you what buyers actually respond to.',
                'demo_button_text' => 'Get a creative test plan',
                'demo_button_link' => '/contact#contact',
                'items' => [
                    ['title' => 'Hook library', 'description' => 'Problem, outcome, proof, and urgency angles mapped to each audience.'],
                    ['title' => 'Offer testing', 'description' => 'Compare lead magnets, trials, demos, and direct-buy paths.'],
                    ['title' => 'Creative refresh cadence', 'description' => 'A weekly production rhythm that prevents fatigue.'],
                    ['title' => 'Landing-page match', 'description' => 'Message, proof, and CTA aligned from ad click to conversion.'],
                ],
            ]],
            ['seo_results', [
                'eyebrow' => 'Outcomes over vanity metrics',
                'heading' => 'See signals that connect spend to pipeline.',
                'body' => 'Pipeline-quality visitors, qualified leads and cost-per-outcome — not just clicks and impressions.',
                'items' => [
                    ['value' => '5.8x', 'label' => 'ROAS on meta and Google blends'],
                    ['value' => '$1.2M', 'label' => 'Pipeline attributed in 90 days'],
                    ['value' => '-62%', 'label' => 'Cost per qualified lead'],
                    ['value' => '100%', 'label' => 'Attributed with server-side data'],
                ],
            ]],
            ['seo_faq', [
                'eyebrow' => 'Questions that matter',
                'heading' => 'Paid media FAQs',
                'body' => 'Everything about how we run and report paid programs.',
                'items' => [
                    ['title' => 'How long before we see actionable signals?', 'description' => 'Eligible winners often appear within 3-7 days; full learning phases take longer but stop losers fast.'],
                    ['title' => 'Who owns the ad accounts?', 'description' => 'The client keeps ownership or can assign MCC structure; we operate on agreed access and provide documentation.'],
                    ['title' => 'What reporting do you deliver?', 'description' => 'Weekly digest plus deep monthly reviews with spend, outcomes, attribution and optimization notes.'],
                    ['title' => 'Can we be throttled in peak seasons?', 'description' => 'We cap ramp by week, use performance caps, and keep headsroom for forecast demand.'],
                    ['title' => 'Do you guarantee results?', 'description' => 'No. We commit to methodology, transparency and optimization pressure, and tune together when signals say so.'],
                ],
            ]],
            ['seo_cta', [
                'eyebrow' => 'Time to prove spend before scaling',
                'heading' => 'Turn budget pressure into clear signals.',
                'body' => 'Run smaller test waves, read the proof, and scale what works. Set up a first media plan and a baseline.',
                'button_text' => 'Get a media plan',
                'button_link' => '/contact#contact',
            ]],
        ];
    }

    private function emailPageAttributes(): array
    {
        return [
            'page_section' => 'services',
            'slug' => 'email-marketing',
            'title' => 'Email Marketing That Drives Repeat Business',
            'short_description' => 'Automated flows and campaigns that put high-open, high-converting messages in the right inboxes.',
            'description' => 'Email lifecycle flows, segmentation, deliverability, and measurement built to turn subscribers into repeat customers.',
            'meta_title' => 'Email Marketing Services | Automation, Flows & Deliverability',
            'meta_description' => 'Build segmented email flows and campaigns with high open rates and better deliverability — everything is tracked to the revenue it supports.',
            'meta_keywords' => 'email marketing, automations, welcome flows, abandoned cart, deliverability, segmentation, email analytics',
            'og_image' => 'https://images.unsplash.com/photo-1596526131083-e8c633c948d2?auto=format&fit=crop&w=1600&q=80',
        ];
    }

    private function emailSections(): array
    {
        return [
            ['seo_hero', [
                'eyebrow' => 'EMAIL THAT EARNS THE INBOX',
                'heading' => 'Turn subscribers into repeat customers.',
                'body' => 'We build lifecycle flows and campaigns that put useful, timely messages where your customers already look — with deliverability you can count on.',
                'hero_image' => 'https://images.unsplash.com/photo-1596526131083-e8c633c948d2?auto=format&fit=crop&w=1600&q=80',
                'hero_image_alt' => 'Email automation dashboard',
                'button_text' => 'Get a flow audit',
                'button_link' => '/contact#contact',
                'items' => [
                    ['value' => '62%', 'label' => 'Average open rate'],
                    ['value' => '38%', 'label' => 'Email revenue share'],
                    ['value' => '100%', 'label' => 'Deliverability audited'],
                ],
            ]],
            ['seo_proof', [
                'heading' => 'Email that earns its place.',
                'items' => [
                    ['value' => 'Lifecycle flows', 'label' => 'Welcome, cart, post-purchase and win-back'],
                    ['value' => 'List growth', 'label' => 'Pop-ups and lead magnets built for conversion'],
                    ['value' => 'Deliverability', 'label' => 'SPF/DKIM/DMARC audits and list hygiene'],
                ],
            ]],
            ['image_text', [
                'eyebrow' => 'Automation that works while you sleep',
                'heading' => 'Email flows that trigger on people.',
                'body' => 'We map the customer lifecycle, then deploy welcome and abandonment flows that move subscribers along your own buying cycle — not just the calendar.',
                'image' => 'https://images.unsplash.com/photo-1596526131083-e8c633c948d2?auto=format&fit=crop&w=1600&q=80',
                'image_alt' => 'Email automation pipeline and segmentation screen',
                'image_position' => 'left',
                'cta_text' => 'Audit our flows',
                'cta_link' => '/contact#contact',
            ]],
            ['seo_services', [
                'eyebrow' => 'Services to build around',
                'heading' => 'From list to revenue.',
                'body' => 'Design, deliver, test and iterate each part of the lifecycle with clear reporting on lift.',
                'items' => [
                    ['icon' => 'fa-solid fa-users', 'image' => 'https://images.unsplash.com/photo-1596526131083-e8c633c948d2?auto=format&fit=crop&w=900&q=80', 'title' => 'List growth', 'description' => 'Optimised pop-ups, lead magnets and checkout signup flows.'],
                    ['icon' => 'fa-solid fa-rocket', 'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80', 'title' => 'Welcome & onboarding', 'description' => 'First impression flows that convert accounts into active users.'],
                    ['icon' => 'fa-solid fa-shopping-cart', 'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=900&q=80', 'title' => 'Abandoned cart', 'description' => 'Recovery messages that lift completion by double-digit percentage.'],
                    ['icon' => 'fa-solid fa-credit-card', 'image' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?auto=format&fit=crop&w=900&q=80', 'title' => 'Post-purchase', 'description' => 'Review and repurchase journeys after the first win.'],
                    ['icon' => 'fa-solid fa-award', 'image' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=900&q=80', 'title' => 'Win-back', 'description' => 'Reactivation messages for lapsed customers.'],
                    ['icon' => 'fa-solid fa-crosshairs', 'image' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=900&q=80', 'title' => 'Segmentation', 'description' => 'Behavior and lifecycle segments for higher relevance.'],
                ],
            ]],
            ['seo_process', [
                'eyebrow' => 'The email engine process',
                'heading' => 'Map, build, test and launch.',
                'body' => 'A clear four-step rhythm — lifecycle map, then segmented design and test.',
                'items' => [
                    ['title' => 'Lifecycle audit', 'description' => 'Map the customer journey and current flows first.'],
                    ['title' => 'Flow design', 'description' => 'Plan high-yield touchpoints and audience segments.'],
                    ['title' => 'Template build', 'description' => 'Mobile-first copy, design and automation set-up.'],
                    ['title' => 'Test and launch', 'description' => 'Send to small segments, analyse, iterate, scale.'],
                ],
            ]],
            ['seo_intent', [
                'eyebrow' => 'The right message at the right moment',
                'heading' => 'Send by behaviour, not by blast.',
                'body' => 'A subscriber who just abandoned a cart needs a different message from someone who has bought three times. We map intent to timing and content.',
                'items' => [
                    ['title' => 'Just browsing', 'description' => 'Welcome and education flows that build trust before the ask.'],
                    ['title' => 'Ready to decide', 'description' => 'Cart, browse-abandon, and offer reminders with clear proof.'],
                    ['title' => 'Already a customer', 'description' => 'Post-purchase, replenishment, and win-back journeys.'],
                ],
            ]],
            ['seo_technical', [
                'eyebrow' => 'Deliverability is infrastructure',
                'heading' => 'Get the inbox first, then earn the click.',
                'body' => 'Authentication, list hygiene, sending reputation, and clean tracking keep your best campaigns out of spam.',
                'items' => [
                    ['title' => 'Authentication health', 'description' => 'SPF, DKIM, DMARC, and domain reputation reviewed and fixed.'],
                    ['title' => 'List hygiene', 'description' => 'Suppression, sunsetting, and engagement segments that protect reputation.'],
                    ['title' => 'Event tracking', 'description' => 'Clean opens, clicks, revenue, and lifecycle events you can trust.'],
                    ['title' => 'Template performance', 'description' => 'Mobile rendering, accessibility, and load quality across inboxes.'],
                ],
            ]],
            ['seo_results', [
                'eyebrow' => 'Email evidence, not folklore',
                'heading' => 'Measure lift that sticks.',
                'body' => 'Open, click, conversion and revenue lift per flow — analysed against the same baseline every time.',
                'items' => [
                    ['value' => '62%', 'label' => 'Average open rate'],
                    ['value' => '+38%', 'label' => 'Email revenue'],
                    ['value' => '-22%', 'label' => 'Time-to-conversion on recovery'],
                    ['value' => '100%', 'label' => 'Full flow reporting'],
                ],
            ]],
            ['seo_faq', [
                'eyebrow' => 'Email questions',
                'heading' => 'Email marketing FAQs',
                'body' => 'Answers on strategy, tools and deliverability.',
                'items' => [
                    ['title' => 'Which ESP do you work with?', 'description' => 'Klaviyo, HubSpot, Klaviyo, Mailchimp, ActiveCampaign and Brevo — or a migration.'],
                    ['title' => 'What is a segment and when is it right?', 'description' => 'Segments split by behavior and lifecycle stage; used when relevancy lifts clicks or conversion.'],
                    ['title' => 'What are the top deliverability risks?', 'description' => 'Auth records, list hygiene and engagement metrics are audited before every send.'],
                    ['title' => 'How much subject line testing do you do?', 'description' => 'A/B and multivariate tests run continuously, while guardrails prevent spam risk.'],
                ],
            ]],
            ['seo_cta', [
                'eyebrow' => 'Better inbox rates',
                'heading' => 'Turn the inbox into a revenue channel.',
                'body' => 'Begin with an audit. Build the flows you actually need, and get reporting you can explain back to a stakeholder.',
                'button_text' => 'Audit our flows',
                'button_link' => '/contact#contact',
            ]],
        ];
    }

    private function contentPageAttributes(): array
    {
        return [
            'page_section' => 'services',
            'slug' => 'content-marketing',
            'title' => 'Content Marketing That Makes Your Brand Helpful',
            'short_description' => 'Strategy, writing, distribution and measurement for content that wins attention, trust and traffic.',
            'description' => 'Long-form, pillar, thought-leadership and case-study content that answers real questions and compounds over time.',
            'meta_title' => 'Content Marketing Services | Strategy, Writing & Distribution',
            'meta_description' => 'Plan, write, distribute and measure authoritative content for organic growth, brand reputation and sales alignment.',
            'meta_keywords' => 'content marketing, content strategy, pillar pages, thought leadership, SEO writing, case studies, editorial calendar',
            'og_image' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=1600&q=80',
        ];
    }

    private function contentSections(): array
    {
        return [
            ['seo_hero', [
                'eyebrow' => 'CONTENT MARKETING WITH MISSION',
                'heading' => 'Create content that makes you first to trust.',
                'body' => 'We plan, write, publish and iterate around the questions your customers actually ask — turning audiences into qualified demand.',
                'hero_image' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=1600&q=80',
                'hero_image_alt' => 'Content marketing collaboration team',
                'button_text' => 'Plan a content audit',
                'button_link' => '/contact#contact',
                'items' => [
                    ['value' => '100%', 'label' => 'Research-first topics'],
                    ['value' => '8x', 'label' => 'Repurposed pieces per asset'],
                    ['value' => '3.5x', 'label' => 'Time to organic traction'],
                ],
            ]],
            ['seo_proof', [
                'heading' => 'Content that is a business asset, not a project.',
                'items' => [
                    ['value' => 'Pillar pages', 'label' => 'Cluster projects that rank and interlink'],
                    ['value' => 'Case studies', 'label' => 'Story formats for trust and sales'],
                    ['value' => 'Thought leadership', 'label' => 'Author-led pieces for reputation'],
                ],
            ]],
            ['seo_audit', [
                'eyebrow' => 'Find the content worth keeping',
                'heading' => 'Stop publishing into a void.',
                'body' => 'Audit what already exists, what earns search demand, what sales actually shares, and where the buyer journey goes quiet.',
                'items' => [
                    ['image' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=900&q=80', 'title' => 'Content inventory', 'description' => 'Map every page, asset, and channel against a clear owner and purpose.'],
                    ['image' => 'https://images.unsplash.com/photo-1533750349088-cd871a92f312?auto=format&fit=crop&w=900&q=80', 'title' => 'Search opportunity', 'description' => 'Find queries you can answer better than the current results.'],
                    ['image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=900&q=80', 'title' => 'Sales enablement gaps', 'description' => 'Spot the questions reps answer every week with no reusable asset.'],
                    ['image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=900&q=80', 'title' => 'Decay and duplication', 'description' => 'Prune, merge, or refresh pages that dilute quality and authority.'],
                ],
            ]],
            ['seo_services', [
                'eyebrow' => 'What we publish',
                'heading' => 'The work that compounds.',
                'body' => 'Choose formats and locations that match the buyer, then measure what moves the needle.',
                'items' => [
                    ['icon' => 'fa-solid fa-compass-drafting', 'image' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=900&q=80', 'title' => 'Pillar pages', 'description' => 'Cluster the topics your customers are really searching, with links everywhere.'],
                    ['icon' => 'fa-solid fa-book-bookmark', 'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=900&q=80', 'title' => 'Case studies', 'description' => 'Lead with the problem, show decisions, quote customers and close with value.'],
                    ['icon' => 'fa-solid fa-pen-nib', 'image' => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?auto=format&fit=crop&w=900&q=80', 'title' => 'Expert-led writing', 'description' => 'Get subject-matter experts interviews and approve outlines.'],
                    ['icon' => 'fa-solid fa-chart-line', 'image' => 'https://images.unsplash.com/photo-1533750349088-cd871a92f312?auto=format&fit=crop&w=900&q=80', 'title' => 'SEO & AEO optimised', 'description' => 'Structure for rankings and AI visibility with citations.'],
                    ['icon' => 'fa-solid fa-link', 'image' => 'https://images.unsplash.com/photo-1611926653458-09294b3142bf?auto=format&fit=crop&w=900&q=80', 'title' => 'Distribution engine', 'description' => 'Repurpose into social, email, links and video without extra work.'],
                ],
            ]],
            ['seo_process', [
                'eyebrow' => 'The content rhythm',
                'heading' => 'From brief to distribution.',
                'body' => 'A clear system for what to write, how to publish, and how to tell it apart.',
                'items' => [
                    ['title' => 'Discovery', 'description' => 'Map audience, existing content and gaps.'],
                    ['title' => 'Cluster planning', 'description' => 'Pick pillar topics and supporting pieces.'],
                    ['title' => 'Writing & reviewing', 'description' => 'Draft, edit, improve and get approvals fast.'],
                    ['title' => 'Publish & promote', 'description' => 'SEO checks and distribution plans to cold channels.'],
                ],
            ]],
            ['seo_intent', [
                'eyebrow' => 'Meet buyers in research mode',
                'heading' => 'Write for stages before they close.',
                'body' => 'Create questions, comparisons and trust at every intent level rather than marketing funnels.',
                'items' => [
                    ['title' => 'Learning', 'description' => 'Compare vendors and understand options better.'],
                    ['title' => 'Comparing', 'description' => 'Make decisions sound realistic and measurable.'],
                    ['title' => 'Ready to act', 'description' => 'Serve intent when close to contact and trial.'],
                ],
            ]],
            ['seo_content', [
                'eyebrow' => 'An editorial system that ships',
                'heading' => 'Turn one strong idea into a month of useful content.',
                'intro' => 'We plan around pillars, then produce the article, social cuts, email, sales snippets, and video talking points together so every asset earns its place.',
                'banner_image' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=1600&q=80',
                'banner_image_alt' => 'Editorial planning and content production workspace',
                'banner_text' => 'One good idea should work harder than one page.',
                'principle_heading' => 'Research first. Repurpose deliberately.',
                'principle_description' => 'Every piece starts with a buyer question, a clear point of view, and a distribution plan before a writer opens a draft.',
                'demo_button_text' => 'Plan a content engine',
                'demo_button_link' => '/contact#contact',
                'items' => [
                    ['title' => 'Pillar strategy', 'description' => 'A core topic your brand can own, mapped to supporting questions.'],
                    ['title' => 'Expert interviews', 'description' => 'Capture the insight that makes your content impossible to copy.'],
                    ['title' => 'Editorial calendar', 'description' => 'A realistic publishing rhythm with owners and review gates.'],
                    ['title' => 'Repurposing kit', 'description' => 'Social posts, email summaries, sales snippets, and short video hooks.'],
                ],
            ]],
            ['seo_results', [
                'eyebrow' => 'Outcomes over views',
                'heading' => 'Measure traffic and trust, not just words.',
                'body' => 'Organic growth, time to rankings, leads and source ranking are tracked from the start and after every piece.',
                'items' => [
                    ['value' => '3.2x', 'label' => 'Organic traffic by one year'],
                    ['value' => '6.1', 'label' => 'Average content assets per month'],
                    ['value' => '41%', 'label' => 'Top-5 ranking keyword lift'],
                    ['value' => '100%', 'label' => 'Full content measurement stack'],
                ],
            ]],
            ['seo_faq', [
                'eyebrow' => 'Content marketing questions',
                'heading' => 'Content marketing FAQs',
                'body' => 'Answers on strategy, length and distribution.',
                'items' => [
                    ['title' => 'How do we know what content matters?', 'description' => 'From audience research and ranking opportunities, not our guesswork.'],
                    ['title' => 'What about voices and brand?', 'description' => 'Create personas, then use them across all pieces and formats.'],
                    ['title' => 'How do we create volume with quality?', 'description' => 'Offsets, templates and pillar-to-repositories repurposing.'],
                    ['title' => 'Do we get traffic without links?', 'description' => 'Distribution via internal links and syndicated social, while building inbound over time.'],
                ],
            ]],
            ['seo_cta', [
                'eyebrow' => 'Turn stories into signals',
                'heading' => 'Tell stories people trust and follow.',
                'body' => 'Plan an audit and ask for a strategy for topics that fit your buyers and audience.',
                'button_text' => 'Plan a content audit',
                'button_link' => '/contact#contact',
            ]],
        ];
    }

    private function ormPageAttributes(): array
    {
        return [
            'page_section' => 'services',
            'slug' => 'orm-services',
            'title' => 'Online Reputation Management That Protects and Repairs Your Brand',
            'short_description' => 'Reputation monitoring, response, generation and SERP control built for peace of mind.',
            'description' => 'Reputation programs that listen, respond, generate and manage page 1 presence — with a defined playbook for every touchpoint.',
            'meta_title' => 'ORM Services | Reputation Monitoring, Response & Repair',
            'meta_description' => 'Build reputation management that protects your brand with monitoring, response, positive review generation and search-page control.',
            'meta_keywords' => 'ORM, reputation management, review monitoring, review responses, Google reviews, SERP control, brand reputation',
            'og_image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1600&q=80',
        ];
    }

    private function ormSections(): array
    {
        return [
            ['seo_hero', [
                'eyebrow' => 'ORM SERVICES FOR A CALM REPUTATION',
                'heading' => 'Turn casual mentions into clear, protected stories.',
                'body' => 'We watch review sites, social and SERP placements, respond consistently, generate more genuine ratings, and control your page-1 story — with a playbook for slow problems.',
                'hero_image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1600&q=80',
                'hero_image_alt' => 'Online reputation management dashboard',
                'button_text' => 'Get a reputation audit',
                'button_link' => '/contact#contact',
                'items' => [
                    ['value' => '12x', 'label' => 'More positive reviews'],
                    ['value' => '100%', 'label' => 'Response playbook'],
                    ['value' => '24/7', 'label' => 'Monitoring coverage'],
                ],
            ]],
            ['seo_proof', [
                'heading' => 'Reputation work that customers can measure.',
                'items' => [
                    ['value' => 'Monitoring', 'label' => 'Google, Trustpilot, Glassdoor, X and reviews'],
                    ['value' => 'Generation', 'label' => 'Automated review requests that lift scores'],
                    ['value' => 'SERP control', 'label' => 'Search page 1 shaping and negatives down'],
                ],
            ]],
            ['seo_audit', [
                'eyebrow' => 'Start with the story',
                'heading' => 'Find out what people see first about you.',
                'body' => 'Before adding anything new, we map all mentions across review sites, social and search. Then we sort by severity and impact.',
                'items' => [
                    ['image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=900&q=80', 'title' => 'Reputation audit', 'description' => 'Across Google, review sites, social and web mentions.'],
                    ['image' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=900&q=80', 'title' => 'Sentiment mapping', 'description' => 'Drill into where positives and negatives come from.'],
                    ['image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80', 'title' => 'Priority sorting', 'description' => 'Rank by impact and speed-of-resolution upside.'],
                    ['image' => 'https://images.unsplash.com/photo-1533750349088-cd871a92f312?auto=format&fit=crop&w=900&q=80', 'title' => 'Page-one analysis', 'description' => 'Check what search users see for key brand terms.'],
                ],
            ]],
            ['seo_services', [
                'eyebrow' => 'Services for the loop',
                'heading' => 'Monitor, respond, generate and own the page 1.',
                'body' => 'A five-part program that finds problems early, returns responses fast and keeps your public story credible.',
                'items' => [
                    ['icon' => 'fa-solid fa-shield-halved', 'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=900&q=80', 'title' => 'Real-time monitoring', 'description' => 'Brand mentions, review sites and SERP alerts 24/7.'],
                    ['icon' => 'fa-solid fa-comments', 'image' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=900&q=80', 'title' => 'Response playbook', 'description' => 'Templates, escalation paths and brand-safe replies every case.'],
                    ['icon' => 'fa-solid fa-star', 'image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=900&q=80', 'title' => 'Review generation', 'description' => 'Automated post-purchase requests with messaging.'],
                    ['icon' => 'fa-solid fa-magnifying-glass-chart', 'image' => 'https://images.unsplash.com/photo-1533750349088-cd871a92f312?auto=format&fit=crop&w=900&q=80', 'title' => 'SERP control', 'description' => 'Positive press, owned assets and page 1 shaping.'],
                    ['icon' => 'fa-solid fa-user-shield', 'image' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&w=900&q=80', 'title' => 'Crisis readiness', 'description' => 'Coordinated response plans for PR and emergencies.'],
                    ['icon' => 'fa-solid fa-chart-line', 'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80', 'title' => 'Reporting & analytics', 'description' => 'Sentiment, ratings and page-1 shifts over time.'],
                ],
            ]],
            ['seo_process', [
                'eyebrow' => 'The ORM rhythm',
                'heading' => 'The process is the product.',
                'body' => 'Not just reviews — a working process that finds issues, responds, and improves over time.',
                'items' => [
                    ['title' => 'Audit', 'description' => 'Map all brand mentions and check page-1 truth.'],
                    ['title' => 'Response', 'description' => 'Deploy response playbooks quickly after the review.'],
                    ['title' => 'Generation', 'description' => 'Send more real, timely review requests.'],
                    ['title' => 'Optimization', 'description' => 'Use results to improve content and listing listings.'],
                ],
            ]],
            ['seo_intent', [
                'eyebrow' => 'Shape the moment of decision',
                'heading' => 'Be the credible answer when people check you out.',
                'body' => 'Reputation is tested at different moments: a quick brand search, a review comparison, or a crisis query. Each one needs a different proof point.',
                'items' => [
                    ['title' => 'Brand search', 'description' => 'Own the first impression with accurate profiles and positive owned assets.'],
                    ['title' => 'Comparison search', 'description' => 'Show up with reviews, case proof, and third-party credibility.'],
                    ['title' => 'Risk search', 'description' => 'Have a calm, factual response ready for complaints and crisis queries.'],
                ],
            ]],
            ['seo_local', [
                'eyebrow' => 'Be the answer you want',
                'heading' => 'Help customers find you with trust.',
                'body' => 'For anyone searching for you or your category, we keep accurate, responsive information visible and trustworthy.',
                'items' => [
                    ['title' => 'Consistent details', 'description' => 'Name, address, phone and hours match everywhere.'],
                    ['title' => 'Local search presence', 'description' => 'Control helpful listings with profiles that match your brand.'],
                    ['title' => 'Location mentions', 'description' => 'Stay visible in searches tied to your service areas.'],
                ],
            ]],
            ['seo_results', [
                'eyebrow' => 'Reputation outcomes',
                'heading' => 'Measure where you stand and what changed.',
                'body' => 'Average rating, mention sentiment, positive-to-negative page-one shift and response coverage are tracked over time and reported.',
                'items' => [
                    ['value' => '3.4/5', 'label' => 'Average rating lift'],
                    ['value' => '+47%', 'label' => 'More positive mentions'],
                    ['value' => '0', 'label' => 'Negative mentions on page 1'],
                    ['value' => '100%', 'label' => 'Response playbooks with SLAs'],
                ],
            ]],
            ['seo_faq', [
                'eyebrow' => 'ORM questions',
                'heading' => 'Online reputation management FAQs',
                'body' => 'Answers on strategy, response and SERP control.',
                'items' => [
                    ['title' => 'Can you get bad reviews removed?', 'description' => 'Honest reviews can\'t be removed, but we can flag policy violations and bury them using SERP control.'],
                    ['title' => 'How do we avoid negative reviews?', 'description' => 'Partner with trusted service providers and send warm post-purchase requests.'],
                    ['title' => 'Who responds and how fast?', 'description' => 'Your business or our team; we set SLAs and monitor coverage closely.'],
                    ['title' => 'Do we see wins in 30-90 days?', 'description' => 'Yes. Continued sentiment, ratings and page-one monitoring are reported monthly.'],
                    ['title' => 'Do we work with crisis?', 'description' => 'Yes. We keep playbooks ready and help coordinate with PR and communications.'],
                ],
            ]],
            ['seo_cta', [
                'eyebrow' => 'Reputation is everything',
                'heading' => 'Protect, measure and improve your brand story.',
                'body' => 'Start with an audit. Build response plans, generate more real reviews, and track page-1 shifts.',
                'button_text' => 'Get a reputation audit',
                'button_link' => '/contact#contact',
            ]],
        ];
    }
}
