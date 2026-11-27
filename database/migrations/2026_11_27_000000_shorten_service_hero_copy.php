<?php

use App\Models\Service;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Shorten the hero copy on every service landing page so the headline
     * reads like a punchy tagline and the supporting line stays to one line.
     */
    public function up(): void
    {
        $heroCopy = [
            'seo-services' => ['Rank. Reach. Grow. Repeat.', 'Search strategies that turn demand into steady growth.'],
            'social-media-marketing' => ['Scroll. Stop. Click. Convert.', 'Social strategies that turn followers into loyal customers.'],
            'video-marketing' => ['Watch. Engage. Convert. Repeat.', 'Video built to stop the scroll and move people to act.'],
            'paid-marketing' => ['Test. Learn. Scale. Profit.', 'Paid media that turns every rupee into measurable growth.'],
            'email-marketing' => ['Reach. Retain. Repeat.', 'Lifecycle emails that earn the inbox and the next sale.'],
            'content-marketing' => ['Inform. Engage. Convert. Repeat.', 'Content that answers real questions and earns real trust.'],
            'orm-services' => ['Listen. Respond. Protect. Grow.', 'Reputation strategies that keep your brand trusted online.'],
            'web-development' => ['Fast. Sharp. Built to Convert.', 'Websites that look great, load fast, and earn their keep.'],
            'mobile-app-development' => ['Launch. Engage. Retain. Repeat.', 'Apps people keep, not apps they delete.'],
            'custom-application' => ['Build. Fit. Scale. Grow.', 'Software shaped around the way your business actually works.'],
            'salesforce-erpnext-services' => ['Connect. Align. Operate. Grow.', 'Salesforce and ERPNext working as one team.'],
            'saas-application' => ['Launch. Scale. Retain. Repeat.', 'SaaS products built to survive success.'],
            'api-development' => ['Connect. Secure. Scale. Repeat.', 'APIs that connect systems without the chaos.'],
            'software-development' => ['Plan. Build. Ship. Maintain.', 'Custom software without the custom chaos.'],
            'whatsapp-integration' => ['Chat. Automate. Convert. Repeat.', 'WhatsApp flows that turn conversations into revenue.'],
        ];

        foreach ($heroCopy as $slug => [$heading, $body]) {
            $service = Service::query()
                ->where('page_section', 'services')
                ->where('slug', $slug)
                ->first();

            if (! $service) {
                continue;
            }

            $section = $service->sections()
                ->where('section_type', 'seo_hero')
                ->first();

            if ($section) {
                $content = is_array($section->content) ? $section->content : [];
                $content['heading'] = $heading;
                $content['body'] = $body;
                $section->content = $content;
                $section->save();

                continue;
            }

            // Social media marketing uses a custom HTML hero section.
            $customSection = $service->sections()
                ->where('section_type', 'custom')
                ->orderBy('sort_order')
                ->first();

            if (! $customSection) {
                continue;
            }

            $content = is_array($customSection->content) ? $customSection->content : [];
            $content['values'] = is_array($content['values'] ?? null) ? $content['values'] : [];
            $content['values']['heading'] = $heading;
            $content['values']['heading_accent'] = 'Convert.';
            $content['values']['body'] = $body;
            $customSection->content = $content;
            $customSection->save();
        }
    }

    public function down(): void
    {
        // Copy changes are not reverted.
    }
};
