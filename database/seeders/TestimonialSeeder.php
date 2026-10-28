<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            [
                'name'     => 'Sarah Jenkins',
                'location' => 'Apex Global Tech, London',
                'rating'   => 5.0,
                'content'  => 'Retrotech completely transformed our IT asset disposition process. Their team handled our data destruction and hardware decommissioning seamlessly, with full audit trails and zero downtime. Truly exceptional service and professionalism.',
                'image'    => null,
            ],
            [
                'name'     => 'David Miller',
                'location' => 'CloudSphere Systems, New York',
                'rating'   => 4.9,
                'content'  => 'Outstanding experience from start to finish! The communication was prompt, transparent, and the return on value for our remarketed enterprise equipment exceeded our expectations. Highly recommended for any growing tech company.',
                'image'    => null,
            ],
            [
                'name'     => 'Priya Sharma',
                'location' => 'InnoWave Digital, Singapore',
                'rating'   => 5.0,
                'content'  => 'Working with Retrotech on our workflow automation and tech development was a game changer. They delivered a robust, scalable solution on schedule. Their customer support team is always responsive and proactive.',
                'image'    => null,
            ],
            [
                'name'     => 'Marcus Vance',
                'location' => 'Nexus Financial Group, Sydney',
                'rating'   => 4.8,
                'content'  => 'Security and compliance are non-negotiable for us. Retrotech provided certified data destruction documentation and meticulous asset tracking that satisfied our stringent regulatory audits without a hitch.',
                'image'    => null,
            ],
        ];

        foreach ($reviews as $review) {
            Testimonial::firstOrCreate(
                ['name' => $review['name']],
                $review
            );
        }
    }
}
