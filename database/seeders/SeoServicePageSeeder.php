<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class SeoServicePageSeeder extends Seeder
{
    public function run(): void
    {
        $service = $this->page();
        if ($service->sections()->exists()) {
            return;
        }

        $this->writeSections($service);
    }

    /** Replace the SEO page's current layout with the authored 12-section design. */
    public function redesign(): void
    {
        $service = $this->page();
        $service->update($this->pageAttributes());
        $service->sections()->delete();
        $this->writeSections($service);
    }

    private function page(): Service
    {
        return Service::firstOrCreate(
            ['slug' => 'seo-services'],
            $this->pageAttributes()
        );
    }

    private function pageAttributes(): array
    {
        return [
            'page_section' => 'services',
            'title' => 'SEO Services That Turn Search Into Growth',
            'short_description' => 'A thoughtful SEO program built around stronger visibility, useful content, and measurable business goals.',
            'description' => 'Technical SEO, content strategy, local search, and ongoing optimization delivered as one connected growth plan.',
            'meta_title' => 'SEO Services | Technical SEO, Content & Growth Strategy',
            'meta_description' => 'Build sustainable organic visibility with technical SEO, search intent research, useful content, and clear reporting tailored to your business.',
            'meta_keywords' => 'SEO services, technical SEO, SEO strategy, content SEO, local SEO, organic growth',
        ];
    }

    private function writeSections(Service $service): void
    {
        foreach ($this->sections() as $sortOrder => [$type, $content]) {
            $service->sections()->create([
                'section_type' => $type,
                'content' => $content,
                'sort_order' => $sortOrder,
                'is_active' => true,
            ]);
        }
    }

    private function sections(): array
    {
        return [
            ['seo_hero', [
                'eyebrow' => 'Organic growth, built with intent',
                'heading' => 'Turn search demand into your next growth channel.',
                'body' => 'Build lasting visibility with technical SEO, useful content, and a clear plan to reach the people already looking for what you do.',
                'button_text' => 'Plan your SEO growth',
                'button_link' => '/contact#contact',
                'items' => [
                    ['value' => 'Technical', 'label' => 'sound foundations'],
                    ['value' => 'Useful', 'label' => 'people-first content'],
                    ['value' => 'Measurable', 'label' => 'business outcomes'],
                ],
            ]],
            ['seo_proof', [
                'heading' => 'A clearer way to grow through search',
                'items' => [
                    ['value' => 'Strategy first', 'label' => 'Priorities shaped around your goals'],
                    ['value' => 'Built together', 'label' => 'Collaborative delivery with your team'],
                    ['value' => 'Always learning', 'label' => 'Decisions informed by real performance'],
                ],
            ]],
            ['seo_audit', [
                'eyebrow' => 'Start with the opportunity',
                'heading' => 'Find what is holding search growth back.',
                'body' => 'Before producing more content or changing everything, understand where the strongest opportunities are and what could be preventing the right pages from being found.',
                'items' => [
                    ['title' => 'Technical friction', 'description' => 'Spot crawl, indexing, speed, and site-structure issues that get in the way.'],
                    ['title' => 'Missed demand', 'description' => 'Discover relevant searches your current pages do not answer well yet.'],
                    ['title' => 'Content gaps', 'description' => 'Find where a clearer, more useful page can serve customers better.'],
                    ['title' => 'Conversion obstacles', 'description' => 'Make the path from search result to useful next step easier to follow.'],
                ],
            ]],
            ['seo_services', [
                'eyebrow' => 'Connected expertise',
                'heading' => 'The right work, in the right order.',
                'body' => 'SEO works best when the technical experience, content, and search strategy support one another.',
                'items' => [
                    ['icon' => 'fa-solid fa-screwdriver-wrench', 'title' => 'Technical SEO', 'description' => 'Improve crawlability, indexing, site speed, structured data, and page experience.'],
                    ['icon' => 'fa-solid fa-magnifying-glass-chart', 'title' => 'Research & strategy', 'description' => 'Map demand, search intent, competition, and opportunity into an actionable roadmap.'],
                    ['icon' => 'fa-solid fa-pen-nib', 'title' => 'Content optimization', 'description' => 'Create and improve pages that answer real questions with clarity and depth.'],
                    ['icon' => 'fa-solid fa-location-dot', 'title' => 'Local SEO', 'description' => 'Strengthen location relevance and help nearby customers find your business.'],
                    ['icon' => 'fa-solid fa-link', 'title' => 'Authority & links', 'description' => 'Build a credible presence through useful assets and thoughtful outreach.'],
                    ['icon' => 'fa-solid fa-chart-pie', 'title' => 'Measurement', 'description' => 'Track visibility, qualified visits, and enquiries against agreed business goals.'],
                ],
            ]],
            ['seo_process', [
                'eyebrow' => 'A practical delivery rhythm',
                'heading' => 'From first review to steady improvement.',
                'body' => 'Work is transparent and paced around the changes that can make the biggest difference.',
                'items' => [
                    ['title' => 'Discover', 'description' => 'Understand your goals, customers, website, and competitive landscape.'],
                    ['title' => 'Prioritize', 'description' => 'Turn findings into clear actions ordered by value, effort, and dependencies.'],
                    ['title' => 'Improve', 'description' => 'Deliver the technical fixes and content work with your team.'],
                    ['title' => 'Learn', 'description' => 'Review the evidence, share progress, and adjust the roadmap as you grow.'],
                ],
            ]],
            ['seo_intent', [
                'eyebrow' => 'Meet people at the right moment',
                'heading' => 'Match your pages to what people really mean.',
                'body' => 'A search phrase is a clue to a need. We organize content around the questions and decisions behind it, so visitors land on a page that feels relevant.',
                'items' => [
                    ['title' => 'Learning', 'description' => '“How can I improve my website visibility?”'],
                    ['title' => 'Comparing', 'description' => '“Which SEO approach fits a growing business?”'],
                    ['title' => 'Ready to act', 'description' => '“SEO services for a B2B software company”'],
                ],
            ]],
            ['seo_technical', [
                'eyebrow' => 'Strong foundations',
                'heading' => 'Make your website easier to discover and use.',
                'body' => 'A technically sound site helps search engines understand your pages and gives visitors a smoother experience.',
                'items' => [
                    ['title' => 'Performance & mobile', 'description' => 'Improve loading behavior, responsiveness, and usability across devices.'],
                    ['title' => 'Crawl paths', 'description' => 'Help important pages get discovered through clear architecture and internal links.'],
                    ['title' => 'Index quality', 'description' => 'Make canonical, sitemap, and indexing signals consistent and intentional.'],
                    ['title' => 'Structured context', 'description' => 'Use semantic markup and structured data where they genuinely help.'],
                ],
            ]],
            ['seo_local', [
                'eyebrow' => 'Be present where customers are',
                'heading' => 'Make local discovery feel effortless.',
                'body' => 'For businesses serving specific locations, local SEO connects your services with nearby intent through accurate information and genuinely useful location pages.',
                'items' => [
                    ['title' => 'Consistent business details', 'description' => 'Keep your name, contact information, and service areas clear.'],
                    ['title' => 'Useful location pages', 'description' => 'Give each location distinct information that helps local customers.'],
                    ['title' => 'Reputation signals', 'description' => 'Build a clear process for listening to and learning from customer feedback.'],
                ],
            ]],
            ['seo_content', [
                'eyebrow' => 'Content with a job to do',
                'heading' => 'Create pages people are glad they found.',
                'body' => 'Strong organic content starts with a real audience need, adds original insight, and makes the next step easy to understand.',
                'items' => [
                    ['title' => 'Service pages', 'description' => 'Explain who you help, what changes, and how to take the next step.'],
                    ['title' => 'Guides & resources', 'description' => 'Answer complex questions in a useful, well-structured way.'],
                    ['title' => 'Content refreshes', 'description' => 'Update valuable pages as your expertise, products, and market evolve.'],
                ],
            ]],
            ['seo_results', [
                'eyebrow' => 'Measure progress with context',
                'heading' => 'See the signals that matter to your business.',
                'body' => 'We report the work completed and the outcomes it supports—using your starting point and agreed goals as the reference, not generic promises.',
                'items' => [
                    ['value' => 'Visibility', 'label' => 'Priority searches and landing pages'],
                    ['value' => 'Qualified visits', 'label' => 'Organic sessions with relevant intent'],
                    ['value' => 'Enquiries', 'label' => 'Meaningful actions from organic visitors'],
                    ['value' => 'Site health', 'label' => 'Technical issues and fixes delivered'],
                ],
            ]],
            ['seo_faq', [
                'eyebrow' => 'Good questions, clear answers',
                'heading' => 'SEO services FAQs',
                'body' => 'A few things businesses often want to know before getting started.',
                'items' => [
                    ['title' => 'How soon can SEO make a difference?', 'description' => 'It depends on your website, market, competition, and the work required. We begin with a baseline and prioritize improvements; meaningful organic growth usually takes sustained effort over time.'],
                    ['title' => 'What does an SEO engagement include?', 'description' => 'The plan can include technical improvements, research, content strategy, on-page optimization, local SEO, and measurement. We shape the mix around your goals and team.'],
                    ['title' => 'Will you work with our existing team?', 'description' => 'Yes. We can collaborate with your marketing, content, and development teams, provide clear recommendations, and coordinate implementation in a shared workflow.'],
                    ['title' => 'How do you measure success?', 'description' => 'We agree on a baseline and track relevant search visibility, qualified organic visits, enquiries, and completed work. The measures depend on what matters to your business.'],
                    ['title' => 'Do you guarantee rankings?', 'description' => 'No one can guarantee a particular search position. We focus on sound practices, useful pages, transparent reporting, and improvements guided by evidence.'],
                ],
            ]],
            ['seo_cta', [
                'eyebrow' => 'A good next step starts with a conversation',
                'heading' => 'Let’s find your clearest path to organic growth.',
                'body' => 'Tell us what you want search to do for your business. We’ll help you see where to begin and what to prioritize next.',
                'button_text' => 'Talk with our SEO team',
                'button_link' => '/contact#contact',
            ]],
        ];
    }
}
