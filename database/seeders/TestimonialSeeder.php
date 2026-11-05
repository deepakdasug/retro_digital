<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        // Truncate or clean existing junk/test data
        Testimonial::truncate();

        $reviews = [
            [
                'name'     => 'Aarav Mehta',
                'location' => 'Founder & CEO, Zenith Retail • Gurugram',
                'rating'   => 5.0,
                'content'  => 'Retrotech completely redesigned our web platform and integrated automated customer messaging. Our organic traffic and leads jumped by 140% in just 60 days. Truly exceptional engineering and delivery!',
                'image'    => null,
            ],
            [
                'name'     => 'Sarah Jenkins',
                'location' => 'VP of Engineering, CloudSphere Global • London',
                'rating'   => 5.0,
                'content'  => 'Working with Retrotech on our multi-tenant SaaS architecture was a game changer. The APIs are lightning-fast, secure, and built for immense scale. Their team worked as a seamless extension of ours.',
                'image'    => null,
            ],
            [
                'name'     => 'Vikram Singhania',
                'location' => 'Managing Director, Apex Logistics • Mumbai',
                'rating'   => 4.9,
                'content'  => 'Their WhatsApp marketing tools and automated bot workflows transformed our sales pipeline. Customer response times dropped from hours to seconds, boosting conversions by over 45%.',
                'image'    => null,
            ],
            [
                'name'     => 'Priya Sharma',
                'location' => 'Product Lead, HealthPulse Tech • Bangalore',
                'rating'   => 5.0,
                'content'  => 'The mobile app Retrotech engineered for our healthcare ecosystem is fast, intuitive, and handles 50k+ active users effortlessly. Their post-launch support and commitment are second to none.',
                'image'    => null,
            ],
            [
                'name'     => 'David Miller',
                'location' => 'Head of Growth, FinEdge Capital • New York',
                'rating'   => 4.9,
                'content'  => 'Retrotech’s performance marketing and technical SEO strategy helped us secure top rankings for our most lucrative keywords. We experienced a 3x increase in qualified enterprise inbound leads.',
                'image'    => null,
            ],
            [
                'name'     => 'Neha Kapoor',
                'location' => 'Operations Director, Nexus Systems • Delhi NCR',
                'rating'   => 5.0,
                'content'  => 'From modernizing legacy workflows to custom software integration, Retrotech delivered our complete enterprise portal on schedule with zero downtime. Honest, transparent, and highly skilled!',
                'image'    => null,
            ],
        ];

        foreach ($reviews as $review) {
            Testimonial::create($review);
        }
    }
}
