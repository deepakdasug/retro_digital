<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaMarketingSectionsSeeder extends Seeder
{
    public function run(): void
    {
        $service = Service::where('page_section', 'services')
            ->where('slug', 'social-media-marketing')
            ->first();

        if (!$service) {
            return;
        }

        DB::transaction(function () use ($service): void {
            $sections = $this->sections();
            $nextSortOrder = (int) $service->sections()->max('sort_order');

            foreach ($sections as $section) {
                $heading = $section['content']['heading'] ?? null;
                $matchingSections = $service->sections()
                    ->where('section_type', $section['type'])
                    ->get();
                $existing = $matchingSections->first(
                    fn ($existing) => ($existing->content['heading'] ?? null) === $heading
                );

                if (!$existing && $matchingSections->count() === 1) {
                    $existing = $matchingSections->first();
                }

                if ($existing) {
                    continue;
                }

                $service->sections()->create([
                    'section_type' => $section['type'],
                    'content' => $section['content'],
                    'sort_order' => ++$nextSortOrder,
                    'is_active' => true,
                ]);
            }
        });
    }

    private function sections(): array
    {
        return [
            [
                'type' => 'hero',
                'content' => [
                    'eyebrow' => 'SOCIAL MEDIA MARKETING',
                    'title' => 'Turn Social Media Into a Growth Engine',
                    'subtitle' => 'Build a stronger brand, connect with the right audience, and turn engagement into measurable business growth. Our social media marketing services combine thoughtful strategy, compelling content, and data-led campaigns across the platforms that matter to your customers.',
                    'background_image' => 'assets/images/tech-development/business-growth.webp',
                    'cta_text' => 'Let’s Grow Your Social Presence',
                    'cta_link' => '#contact',
                ],
            ],
            [
                'type' => 'seo_content',
                'content' => [
                    'eyebrow' => 'AI-powered social insights',
                    'heading' => '🚀 Introducing Industry-First, AI-Enabled Dashboards',
                    'intro' => 'Our social media marketing team helps businesses grow their online visibility, connect with the right audiences, and turn engagement into meaningful action. We bring strategy, content, paid campaigns, and performance insights together to support measurable growth.',
                    'banner_text' => 'Smarter campaigns. Stronger connections.',
                    'principle_heading' => 'AI Dashboard Demo',
                    'principle_description' => 'See audience insights, channel performance, and campaign results together in one clear view.',
                    'demo_button_text' => 'View Live Demo',
                    'demo_button_link' => '/contact#contact',
                    'items' => [
                        [
                            'title' => 'Speech to text AI chat agent',
                            'description' => 'Convert voice into accurate, real-time text for AI conversations. Benefits: faster support, shorter response times, and greater accessibility.',
                        ],
                        [
                            'title' => 'AI Image generator',
                            'description' => 'Create high-quality custom images from text prompts. Benefits: lower design costs, faster content creation, and polished on-brand visuals.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'seo_services',
                'content' => [
                    'eyebrow' => 'Reach the right people',
                    'heading' => 'Transform Your Business with Social Media Marketing',
                    'body' => 'Connect with customers on the platforms they use. We plan and optimize social campaigns to build awareness, drive qualified enquiries, and grow sales.',
                    'items' => [
                        [
                            'icon' => 'fa-brands fa-facebook',
                            'title' => 'Facebook Advertising',
                            'description' => 'We create campaigns around your goals, from brand awareness and website traffic to lead generation and sales. Audience segmentation, retargeting, and continuous optimization help every ad dollar work harder.',
                        ],
                        [
                            'icon' => 'fa-brands fa-instagram',
                            'title' => 'Instagram Advertising',
                            'description' => 'Grow your presence with a connected plan for ad strategy, creative design, campaign management, and reporting, while you focus on running your business.',
                        ],
                        [
                            'icon' => 'fa-brands fa-linkedin',
                            'title' => 'LinkedIn Advertising',
                            'description' => 'Reach professionals, decision-makers, and potential clients with campaigns designed for B2B lead generation, brand awareness, and meaningful engagement.',
                        ],
                        [
                            'icon' => 'fa-brands fa-youtube',
                            'title' => 'YouTube Advertising',
                            'description' => 'Use engaging video storytelling to capture attention, build trust, and introduce your brand to new audiences with memorable, strategically targeted ads.',
                        ],
                        [
                            'icon' => 'fa-solid fa-bullseye',
                            'title' => 'Paid Social Campaigns',
                            'description' => 'Bring together compelling visuals, persuasive copy, precise targeting, and data-led optimization so every campaign supports your goals and budget.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'features',
                'content' => [
                    'eyebrow' => 'Sample campaign concepts',
                    'heading' => 'Our Projects',
                    'subheading' => 'Illustrative social media projects to show how strategy, creative, and channel selection can support different business goals. These are sample concepts, not client case studies.',
                    'items' => [
                        [
                            'icon' => 'fa-solid fa-mug-hot',
                            'title' => 'Neighborhood Cafe Launch',
                            'description' => 'Sample project: introduce a new cafe with local Instagram and Facebook ads, menu teasers, short-form video, and a launch-week offer.',
                        ],
                        [
                            'icon' => 'fa-solid fa-droplet',
                            'title' => 'Skincare Product Launch',
                            'description' => 'Sample project: build awareness for a skincare range using creator-style content, product education, launch stories, and retargeting.',
                        ],
                        [
                            'icon' => 'fa-solid fa-bullseye',
                            'title' => 'B2B LinkedIn Lead Campaign',
                            'description' => 'Sample project: reach business decision-makers with useful industry content, focused sponsored posts, and a clear consultation offer.',
                        ],
                        [
                            'icon' => 'fa-brands fa-youtube',
                            'title' => 'YouTube Video Awareness',
                            'description' => 'Sample project: introduce a service through concise video ads, audience-based targeting, and follow-up creative for interested viewers.',
                        ],
                        [
                            'icon' => 'fa-solid fa-cart-shopping',
                            'title' => 'Festive E-commerce Campaign',
                            'description' => 'Sample project: coordinate product reels, seasonal offers, catalog ads, and retargeting across Instagram and Facebook.',
                        ],
                        [
                            'icon' => 'fa-solid fa-people-group',
                            'title' => 'Community and Creator Stories',
                            'description' => 'Sample project: grow an engaged community with creator collaborations, customer stories, regular prompts, and responsive moderation.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'seo_process',
                'content' => [
                    'eyebrow' => 'A clear, collaborative approach',
                    'heading' => 'Our Social Media Campaign Process',
                    'body' => 'From the first audit to ongoing optimization, we focus on your return, responsible platform practices, and transparent performance reporting.',
                    'items' => [
                        [
                            'title' => 'Initial audit and goals',
                            'description' => 'Review your social profiles, existing campaigns, audience signals, and business objectives to establish a clear starting point.',
                        ],
                        [
                            'title' => 'Audience and competitor research',
                            'description' => 'Map the people you want to reach, learn from competitor activity, and select the platforms and messages that fit.',
                        ],
                        [
                            'title' => 'Profile and tracking setup',
                            'description' => 'Optimize social profiles, configure campaign targeting, and set up measurement for meaningful actions.',
                        ],
                        [
                            'title' => 'Content and campaign launch',
                            'description' => 'Plan platform-ready creative, publish or launch campaigns, and make it easy for audiences to engage and convert.',
                        ],
                        [
                            'title' => 'Measure, report, and optimize',
                            'description' => 'Track performance, share clear results, test improvements, and refine the strategy as your audience and goals evolve.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'features',
                'content' => [
                    'eyebrow' => 'Professional social media team',
                    'heading' => 'Why Choose Retrotech',
                    'subheading' => 'Six reasons to trust our social media expertise: tailored campaigns, thoughtful creative, clear communication, and measurable improvement.',
                    'items' => [
                        [
                            'icon' => 'fa-solid fa-user-group',
                            'title' => 'Experienced Social Media Professionals',
                            'description' => 'Our strategists and campaign specialists bring platform knowledge, creative thinking, and practical execution together.',
                        ],
                        [
                            'icon' => 'fa-solid fa-sliders',
                            'title' => 'Customized Campaign Strategy',
                            'description' => 'We tailor channel choices, audiences, creative, and budgets to your business goals and customers.',
                        ],
                        [
                            'icon' => 'fa-solid fa-palette',
                            'title' => 'On-Time Campaign Delivery',
                            'description' => 'A clear workflow keeps content, approvals, and campaign launches moving on schedule.',
                        ],
                        [
                            'icon' => 'fa-solid fa-comments',
                            'title' => 'Transparent Communication',
                            'description' => 'Stay informed about what is running, what results show, and what we recommend next.',
                        ],
                        [
                            'icon' => 'fa-solid fa-chart-line',
                            'title' => 'Scalable, Brand-Safe Campaigns',
                            'description' => 'We protect your brand voice and adapt campaign activity as your audience, channels, and business grow.',
                        ],
                        [
                            'icon' => 'fa-solid fa-life-ring',
                            'title' => 'Dedicated Ongoing Support',
                            'description' => 'Get responsive campaign guidance, regular reporting, and continued optimization after launch.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'seo_faq',
                'content' => [
                    'eyebrow' => 'Good questions, clear answers',
                    'heading' => 'Frequently Asked Questions',
                    'body' => 'Get answers to common questions about our social media marketing services.',
                    'items' => [
                        [
                            'title' => 'Which social platforms are right for my business?',
                            'description' => 'We consider your audience, offer, and goals, then recommend the platforms where your customers are most likely to discover and engage with your brand.',
                        ],
                        [
                            'title' => 'Do you create customized campaigns?',
                            'description' => 'Yes. We tailor strategy, creative, targeting, and budget to your business objectives, audience, and chosen platforms.',
                        ],
                        [
                            'title' => 'How long does it take to launch a campaign?',
                            'description' => 'Timing depends on your goals, creative assets, approvals, and tracking setup. We agree on a practical schedule before launch.',
                        ],
                        [
                            'title' => 'Do you provide ongoing support and reporting?',
                            'description' => 'Yes. We monitor campaign performance, share clear reports, recommend improvements, and support your next steps.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'seo_cta',
                'content' => [
                    'eyebrow' => 'Ready to get started?',
                    'heading' => 'Let’s grow your social presence.',
                    'body' => 'Call us to discuss your project goals, audience, and the social media campaigns that can help your business grow.',
                    'button_text' => 'Call Us',
                    'button_link' => 'tel:+919910836538',
                ],
            ],
        ];
    }

}
