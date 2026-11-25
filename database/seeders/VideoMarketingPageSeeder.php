<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class VideoMarketingPageSeeder extends Seeder
{
    public function run(): void
    {
        $service = $this->page();
        if ($service->sections()->exists()) {
            return;
        }

        $this->writeSections($service);
    }

    /** Replace the video marketing page's layout with the authored 12-section design. */
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
            ['slug' => 'video-marketing'],
            $this->pageAttributes()
        );
    }

    private function pageAttributes(): array
    {
        return [
            'page_section' => 'services',
            'title' => 'Video Marketing Services That Turn Attention Into Action',
            'short_description' => 'Strategy, production, editing, and distribution for video content that helps the right audience find and choose your brand.',
            'description' => 'A connected video marketing program spanning creative strategy, filming, post-production, social video, and measurement.',
            'meta_title' => 'Video Marketing Services | Strategy, Production & Social Video',
            'meta_description' => 'Plan, produce, and distribute video content that earns attention and drives action with strategy, brand films, short-form social clips, and clear measurement.',
            'meta_keywords' => 'video marketing, video production, social video, brand films, video SEO, motion graphics, video strategy',
            'og_image' => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=1600&q=80',
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
                'eyebrow' => 'VIDEO MARKETING',
                'heading' => 'Turn attention into action with video that converts.',
                'body' => 'From first idea to final edit, we plan, produce, and distribute video content that helps the right audience find your brand, understand your offer, and take the next step.',
                'hero_image' => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=1600&q=80',
                'hero_image_alt' => 'Video production team filming a brand campaign',
                'button_text' => 'Plan your video strategy',
                'button_link' => '/contact#contact',
                'items' => [
                    ['value' => 'Strategy', 'label' => 'built around your funnel'],
                    ['value' => 'Production', 'label' => 'on-brand video content'],
                    ['value' => 'Growth', 'label' => 'measurable audience action'],
                ],
            ]],
            ['seo_proof', [
                'heading' => 'A video partner for the whole journey',
                'items' => [
                    ['value' => 'Story first', 'label' => 'Messages shaped around real customer questions'],
                    ['value' => 'End to end', 'label' => 'Strategy, production, editing, and distribution'],
                    ['value' => 'Performance led', 'label' => 'Creative refined with real audience data'],
                ],
            ]],
            ['image_text', [
                'eyebrow' => 'Why video, why now',
                'heading' => 'Video earns attention - and keeps it.',
                'body' => 'People remember what they watch. Short-form clips, product demos, customer stories, and explainers make complex offers easier to understand and easier to buy. We connect every video to a clear business goal, so creativity and performance move together.',
                'image' => 'https://images.unsplash.com/photo-1524253482453-3fed8d2fe12b?auto=format&fit=crop&w=1600&q=80',
                'image_alt' => 'Professional cinema camera ready for a brand shoot',
                'image_position' => 'right',
                'cta_text' => 'Talk about your video goals',
                'cta_link' => '/contact#contact',
            ]],
            ['seo_services', [
                'eyebrow' => 'What we do',
                'heading' => 'Video services built around your growth.',
                'body' => 'Choose a single service or bring strategy, production, and distribution together as one connected program.',
                'items' => [
                    [
                        'icon' => 'fa-solid fa-clapperboard',
                        'image' => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=1600&q=80',
                        'title' => 'Video Strategy & Creative Direction',
                        'description' => 'Audience research, messaging, format planning, and a content roadmap tied to your funnel.',
                    ],
                    [
                        'icon' => 'fa-solid fa-video',
                        'image' => 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=1600&q=80',
                        'title' => 'Brand & Product Video Production',
                        'description' => 'Scripting, filming, lighting, sound, and on-location or studio capture for polished brand films.',
                    ],
                    [
                        'icon' => 'fa-solid fa-scissors',
                        'image' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&w=1600&q=80',
                        'title' => 'Editing & Post-Production',
                        'description' => 'Story-led editing, colour, sound design, captions, and platform-ready exports.',
                    ],
                    [
                        'icon' => 'fa-solid fa-wand-magic-sparkles',
                        'image' => 'https://images.unsplash.com/photo-1611162616475-46b635cb6868?auto=format&fit=crop&w=1600&q=80',
                        'title' => 'Motion Graphics & Animation',
                        'description' => 'Explainer animations, animated titles, lower thirds, and visual effects that clarify ideas.',
                    ],
                    [
                        'icon' => 'fa-brands fa-instagram',
                        'image' => 'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?auto=format&fit=crop&w=1600&q=80',
                        'title' => 'Social Video Campaigns',
                        'description' => 'Short-form reels, shorts, and paid social cuts designed for each platform and audience.',
                    ],
                    [
                        'icon' => 'fa-brands fa-youtube',
                        'image' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=1600&q=80',
                        'title' => 'YouTube Growth & Video SEO',
                        'description' => 'Channel setup, keyword research, thumbnails, descriptions, and publishing plans that earn watch time.',
                    ],
                ],
            ]],
            ['seo_process', [
                'eyebrow' => 'How we work',
                'heading' => 'From brief to launch, without the guesswork.',
                'body' => 'A clear, collaborative process keeps every video on brand, on schedule, and pointed at a business outcome.',
                'items' => [
                    ['title' => 'Discover & define', 'description' => 'Clarify goals, audience, key messages, and the channels the video needs to serve.'],
                    ['title' => 'Script & storyboard', 'description' => 'Turn the idea into a practical shot plan with clear creative approvals before production.'],
                    ['title' => 'Produce & capture', 'description' => 'Film on location or in studio with the right crew, equipment, lighting, and sound.'],
                    ['title' => 'Edit & polish', 'description' => 'Shape the story, add graphics, captions, colour, and sound, then refine with your feedback.'],
                    ['title' => 'Launch, measure & optimize', 'description' => 'Publish platform-ready versions, track performance, and improve future content with what you learn.'],
                ],
            ]],
            ['seo_intent', [
                'eyebrow' => 'Meet viewers at the right moment',
                'heading' => 'Create video for every stage of interest.',
                'body' => 'Great video programs answer different questions on different channels. We map content to what your audience is actually trying to learn, compare, or do.',
                'items' => [
                    ['title' => 'Learning', 'description' => '"How does video marketing help my business?"'],
                    ['title' => 'Comparing', 'description' => '"Which video agency fits a B2B software company?"'],
                    ['title' => 'Ready to act', 'description' => '"Book a video strategy and production call"'],
                ],
            ]],
            ['seo_content', [
                'eyebrow' => 'Content with a job to do',
                'heading' => 'Build a video library that keeps working.',
                'intro' => 'One well-planned shoot can produce weeks of content for your website, social channels, sales team, and ads. We help you plan a library, not a one-off.',
                'banner_image' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&w=1600&q=80',
                'banner_image_alt' => 'Editor working on a video timeline in post-production',
                'banner_text' => 'One shoot. Many assets.',
                'principle_heading' => 'One shoot. Many assets.',
                'principle_description' => 'Plan hero films, short-form clips, product demos, and customer stories together so every asset supports the others.',
                'demo_button_text' => 'Plan a video library',
                'demo_button_link' => '/contact#contact',
                'items' => [
                    ['title' => 'Hero brand film', 'description' => 'A flagship story for your homepage, pitch, or event.'],
                    ['title' => 'Short-form social cuts', 'description' => 'Scroll-stopping vertical edits for reels, shorts, and stories.'],
                    ['title' => 'Product & feature demos', 'description' => 'Show how your offer works in clear, useful steps.'],
                    ['title' => 'Customer stories', 'description' => 'Let real users explain the change your product or service made.'],
                    ['title' => 'Explainer & how-to videos', 'description' => 'Answer common questions and reduce friction before the sale.'],
                ],
            ]],
            ['seo_results', [
                'eyebrow' => 'Measure what matters',
                'heading' => 'See how video supports real business goals.',
                'body' => 'We agree on a baseline, then report the signals that connect creative work to your funnel - without vanity metrics pretending to be results.',
                'items' => [
                    ['value' => 'Views & reach', 'label' => 'Where new audiences discovered your brand'],
                    ['value' => 'Watch time', 'label' => 'How long viewers stayed with the story'],
                    ['value' => 'Click-through rate', 'label' => 'How many viewers took the next step'],
                    ['value' => 'Qualified enquiries', 'label' => 'Conversations and leads influenced by video'],
                ],
            ]],
            ['seo_faq', [
                'eyebrow' => 'Good questions, clear answers',
                'heading' => 'Video marketing FAQs',
                'body' => 'A few things businesses often ask before investing in video.',
                'items' => [
                    ['title' => 'How much does video marketing cost?', 'description' => 'It depends on the scope, number of videos, filming days, locations, animation, and post-production needs. We scope a plan around your goals and budget before production begins.'],
                    ['title' => 'How long does a video project take?', 'description' => 'A single social video can move quickly, while brand films and multi-asset campaigns need more planning. We agree on a schedule with clear review points before work starts.'],
                    ['title' => 'Do you handle scripting and storyboards?', 'description' => 'Yes. We can shape the concept, write the script, and prepare a shot plan so approvals happen before anyone gets on set.'],
                    ['title' => 'Can you repurpose one shoot into more content?', 'description' => 'Yes. We plan shoots with multiple deliverables in mind - hero films, short-form clips, stills, and product demos can often come from the same production.'],
                    ['title' => 'How do you measure video performance?', 'description' => 'We track views, watch time, click-throughs, and the enquiries or actions that follow. The exact measures depend on the goal of each campaign.'],
                ],
            ]],
            ['seo_cta', [
                'eyebrow' => 'A good next step starts with a conversation',
                'heading' => 'Let\'s make your next video count.',
                'body' => 'Tell us what you want video to do for your business. We\'ll help you choose the right formats, plan the production, and build a content rhythm you can sustain.',
                'button_text' => 'Talk with our video team',
                'button_link' => '/contact#contact',
            ]],
        ];
    }
}
