<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Section Templates Registry
    |--------------------------------------------------------------------------
    |
    | Each entry defines one template that the admin can add to a service.
    | The key (e.g. "hero") is what gets stored in `services_sections.section_type`.
    |
    | Structure:
    |   name   => Human-readable label shown in the admin "Add Section" dropdown
    |   view   => Blade view path that renders it (resources/views/sections/*)
    |   icon   => Bootstrap icon class (optional, for admin UI)
    |   fields => Array of editable fields, keyed by field name
    |
    | Field structure:
    |   type   => text | textarea | richtext | image | url | repeater
    |   label  => Label shown in the admin form
    |   rules  => Validation rules for this field (Laravel rule string)
    |   fields => (only for repeater) nested field definitions
    |
    */

    'hero' => [
        'name' => 'Hero Banner',
        'view' => 'sections.hero',
        'icon' => 'fa-solid fa-sparkles',
        'fields' => [
            'eyebrow' => [
                'type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100',
            ],
            'title' => [
                'type'  => 'text',
                'label' => 'Main Heading',
                'rules' => 'nullable|string|max:200',
            ],
            'subtitle' => [
                'type'  => 'textarea',
                'label' => 'Subheading / Description',
                'rules' => 'nullable|string|max:500',
            ],
            'background_image' => [
                'type'  => 'image',
                'label' => 'Background Image',
                'rules' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
            ],
            'cta_text' => [
                'type'  => 'text',
                'label' => 'Button Text',
                'rules' => 'nullable|string|max:50',
            ],
            'cta_link' => [
                'type'  => 'url',
                'label' => 'Button Link',
                'rules' => 'nullable|string|max:500',
            ],
        ],
    ],

    'features' => [
        'name' => 'Features Grid',
        'view' => 'sections.features',
        'icon' => 'fa-solid fa-grip',
        'fields' => [
            'eyebrow' => [
                'type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100',
            ],
            'heading' => [
                'type'  => 'text',
                'label' => 'Section Heading',
                'rules' => 'nullable|string|max:200',
            ],
            'subheading' => [
                'type'  => 'textarea',
                'label' => 'Section Subheading',
                'rules' => 'nullable|string|max:500',
            ],
            'items' => [
                'type'   => 'repeater',
                'label'  => 'Feature Items',
                'rules'  => 'nullable|array',
                'fields' => [
                    'icon' => [
                        'type'  => 'text',
                        'label' => 'Icon (Bootstrap class, e.g. bi bi-star)',
                    ],
                    'image' => [
                        'type' => 'image',
                        'label' => 'Optional feature image',
                        'rules' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
                    ],
                    'title' => [
                        'type'  => 'text',
                        'label' => 'Item Title',
                    ],
                    'description' => [
                        'type'  => 'textarea',
                        'label' => 'Item Description',
                    ],
                ],
            ],
        ],
    ],

    'image_text' => [
        'name' => 'Image + Text',
        'view' => 'sections.image_text',
        'icon' => 'fa-regular fa-image',
        'fields' => [
            'eyebrow' => [
                'type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100',
            ],
            'heading' => [
                'type'  => 'text',
                'label' => 'Heading',
                'rules' => 'nullable|string|max:200',
            ],
            'body' => [
                'type'  => 'richtext',
                'label' => 'Body Content',
                'rules' => 'nullable|string',
            ],
            'image' => [
                'type'  => 'image',
                'label' => 'Image',
                'rules' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
            ],
            'image_alt' => [
                'type' => 'text', 'label' => 'Image alternative text', 'rules' => 'nullable|string|max:200',
            ],
            'image_position' => [
                'type'    => 'select',
                'label'   => 'Image Position',
                'rules'   => 'nullable|in:left,right',
                'options' => [
                    'left'  => 'Image on Left',
                    'right' => 'Image on Right',
                ],
            ],
            'cta_text' => [
                'type'  => 'text',
                'label' => 'Button Text (optional)',
                'rules' => 'nullable|string|max:50',
            ],
            'cta_link' => [
                'type'  => 'url',
                'label' => 'Button Link (optional)',
                'rules' => 'nullable|string|max:500',
            ],
        ],
    ],

    'rich_text' => [
        'name' => 'Rich Text Block',
        'view' => 'sections.rich_text',
        'icon' => 'fa-solid fa-align-left',
        'fields' => [
            'eyebrow' => [
                'type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100',
            ],
            'heading' => [
                'type'  => 'text',
                'label' => 'Heading',
                'rules' => 'nullable|string|max:200',
            ],
            'body' => [
                'type'  => 'richtext',
                'label' => 'Body Content',
                'rules' => 'nullable|string',
            ],
        ],
    ],

    'cta' => [
        'name' => 'Call to Action',
        'view' => 'sections.cta',
        'icon' => 'fa-solid fa-bullhorn',
        'fields' => [
            'eyebrow' => [
                'type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100',
            ],
            'heading' => [
                'type'  => 'text',
                'label' => 'Heading',
                'rules' => 'nullable|string|max:200',
            ],
            'description' => [
                'type'  => 'textarea',
                'label' => 'Description',
                'rules' => 'nullable|string|max:500',
            ],
            'background_image' => [
                'type' => 'image',
                'label' => 'Optional background image',
                'rules' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
            ],
            'button_text' => [
                'type'  => 'text',
                'label' => 'Button Text',
                'rules' => 'nullable|string|max:50',
            ],
            'button_link' => [
                'type'  => 'url',
                'label' => 'Button Link',
                'rules' => 'nullable|string|max:500',
            ],
        ],
    ],

    'faq' => [
        'name' => 'Frequently Asked Questions',
        'view' => 'sections.faq',
        'icon' => 'fa-regular fa-circle-question',
        'fields' => [
            'eyebrow' => [
                'type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100',
            ],
            'heading' => [
                'type' => 'text', 'label' => 'Section Heading', 'rules' => 'nullable|string|max:200',
            ],
            'subheading' => [
                'type' => 'textarea', 'label' => 'Section Intro', 'rules' => 'nullable|string|max:500',
            ],
            'items' => [
                'type' => 'repeater',
                'label' => 'Questions and Answers',
                'rules' => 'nullable|array|max:12',
                'fields' => [
                    'question' => ['type' => 'text', 'label' => 'Question', 'rules' => 'nullable|string|max:300'],
                    'answer' => ['type' => 'textarea', 'label' => 'Answer', 'rules' => 'nullable|string|max:3000'],
                ],
            ],
        ],
    ],

    'seo_hero' => [
        'name' => 'SEO — Hero', 'view' => 'sections.seo_landing', 'icon' => 'fa-solid fa-sparkles',
        'fields' => [
            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100'],
            'heading' => ['type' => 'text', 'label' => 'Main heading', 'rules' => 'nullable|string|max:200'],
            'body' => ['type' => 'textarea', 'label' => 'Supporting copy', 'rules' => 'nullable|string|max:700'],
            'hero_image' => ['type' => 'image', 'label' => 'Optional hero image', 'rules' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120'],
            'hero_image_alt' => ['type' => 'text', 'label' => 'Hero image alternative text', 'rules' => 'nullable|string|max:200'],
            'button_text' => ['type' => 'text', 'label' => 'Primary button', 'rules' => 'nullable|string|max:70'],
            'button_link' => ['type' => 'text', 'label' => 'Primary link', 'rules' => 'nullable|string|max:500'],
            'items' => ['type' => 'repeater', 'label' => 'Proof points', 'rules' => 'nullable|array|max:4', 'fields' => [
                'value' => ['type' => 'text', 'label' => 'Value', 'rules' => 'nullable|string|max:30'],
                'label' => ['type' => 'text', 'label' => 'Label', 'rules' => 'nullable|string|max:70'],
            ]],
        ],
    ],
    'seo_proof' => [
        'name' => 'SEO — Proof Bar', 'view' => 'sections.seo_landing', 'icon' => 'fa-solid fa-award',
        'fields' => [
            'heading' => ['type' => 'text', 'label' => 'Intro', 'rules' => 'nullable|string|max:160'],
            'items' => ['type' => 'repeater', 'label' => 'Proof points', 'rules' => 'nullable|array|max:4', 'fields' => [
                'value' => ['type' => 'text', 'label' => 'Value', 'rules' => 'nullable|string|max:40'],
                'label' => ['type' => 'text', 'label' => 'Label', 'rules' => 'nullable|string|max:80'],
            ]],
        ],
    ],
    'seo_audit' => [
        'name' => 'SEO — Opportunity Audit', 'view' => 'sections.seo_landing', 'icon' => 'fa-solid fa-magnifying-glass-chart',
        'fields' => [
            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100'],
            'heading' => ['type' => 'text', 'label' => 'Heading', 'rules' => 'nullable|string|max:200'],
            'body' => ['type' => 'textarea', 'label' => 'Copy', 'rules' => 'nullable|string|max:1000'],
            'items' => ['type' => 'repeater', 'label' => 'Opportunity cards', 'rules' => 'nullable|array|max:4', 'fields' => [
                'title' => ['type' => 'text', 'label' => 'Title', 'rules' => 'nullable|string|max:100'],
                'description' => ['type' => 'textarea', 'label' => 'Description', 'rules' => 'nullable|string|max:300'],
            ]],
        ],
    ],
    'seo_services' => [
        'name' => 'SEO — Service Cards', 'view' => 'sections.seo_landing', 'icon' => 'fa-solid fa-layer-group',
        'fields' => [
            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100'],
            'heading' => ['type' => 'text', 'label' => 'Heading', 'rules' => 'nullable|string|max:200'],
            'body' => ['type' => 'textarea', 'label' => 'Intro', 'rules' => 'nullable|string|max:700'],
            'items' => ['type' => 'repeater', 'label' => 'Services', 'rules' => 'nullable|array|max:6', 'fields' => [
                'icon' => ['type' => 'text', 'label' => 'Icon class', 'rules' => 'nullable|string|max:80'],
                'image' => ['type' => 'image', 'label' => 'Optional service image', 'rules' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120'],
                'title' => ['type' => 'text', 'label' => 'Title', 'rules' => 'nullable|string|max:100'],
                'description' => ['type' => 'textarea', 'label' => 'Description', 'rules' => 'nullable|string|max:300'],
            ]],
        ],
    ],
    'seo_process' => [
        'name' => 'SEO — Process Timeline', 'view' => 'sections.seo_landing', 'icon' => 'fa-solid fa-route',
        'fields' => [
            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100'],
            'heading' => ['type' => 'text', 'label' => 'Heading', 'rules' => 'nullable|string|max:200'],
            'body' => ['type' => 'textarea', 'label' => 'Intro', 'rules' => 'nullable|string|max:700'],
            'items' => ['type' => 'repeater', 'label' => 'Steps', 'rules' => 'nullable|array|max:5', 'fields' => [
                'title' => ['type' => 'text', 'label' => 'Step title', 'rules' => 'nullable|string|max:100'],
                'description' => ['type' => 'textarea', 'label' => 'Step detail', 'rules' => 'nullable|string|max:300'],
            ]],
        ],
    ],
    'seo_intent' => [
        'name' => 'SEO — Search Intent', 'view' => 'sections.seo_landing', 'icon' => 'fa-solid fa-crosshairs',
        'fields' => [
            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100'],
            'heading' => ['type' => 'text', 'label' => 'Heading', 'rules' => 'nullable|string|max:200'],
            'body' => ['type' => 'textarea', 'label' => 'Intro', 'rules' => 'nullable|string|max:700'],
            'items' => ['type' => 'repeater', 'label' => 'Intent examples', 'rules' => 'nullable|array|max:4', 'fields' => [
                'title' => ['type' => 'text', 'label' => 'Intent', 'rules' => 'nullable|string|max:70'],
                'description' => ['type' => 'textarea', 'label' => 'Example searches', 'rules' => 'nullable|string|max:250'],
            ]],
        ],
    ],
    'seo_technical' => [
        'name' => 'SEO — Technical Bento', 'view' => 'sections.seo_landing', 'icon' => 'fa-solid fa-screwdriver-wrench',
        'fields' => [
            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100'],
            'heading' => ['type' => 'text', 'label' => 'Heading', 'rules' => 'nullable|string|max:200'],
            'body' => ['type' => 'textarea', 'label' => 'Intro', 'rules' => 'nullable|string|max:700'],
            'items' => ['type' => 'repeater', 'label' => 'Technical checks', 'rules' => 'nullable|array|max:5', 'fields' => [
                'title' => ['type' => 'text', 'label' => 'Check', 'rules' => 'nullable|string|max:90'],
                'description' => ['type' => 'textarea', 'label' => 'Why it matters', 'rules' => 'nullable|string|max:300'],
            ]],
        ],
    ],
    'seo_local' => [
        'name' => 'SEO — Local Search', 'view' => 'sections.seo_landing', 'icon' => 'fa-solid fa-location-dot',
        'fields' => [
            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100'],
            'heading' => ['type' => 'text', 'label' => 'Heading', 'rules' => 'nullable|string|max:200'],
            'body' => ['type' => 'textarea', 'label' => 'Copy', 'rules' => 'nullable|string|max:1000'],
            'items' => ['type' => 'repeater', 'label' => 'Local focus areas', 'rules' => 'nullable|array|max:4', 'fields' => [
                'title' => ['type' => 'text', 'label' => 'Focus area', 'rules' => 'nullable|string|max:90'],
                'description' => ['type' => 'textarea', 'label' => 'Description', 'rules' => 'nullable|string|max:300'],
            ]],
        ],
    ],
    'seo_content' => [
        'name' => 'SEO — Content Studio', 'view' => 'sections.seo_landing', 'icon' => 'fa-solid fa-pen-nib',
        'fields' => [
            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100'],
            'heading' => ['type' => 'text', 'label' => 'Heading', 'rules' => 'nullable|string|max:200'],
            'body' => ['type' => 'textarea', 'label' => 'Intro', 'rules' => 'nullable|string|max:700'],
            'items' => ['type' => 'repeater', 'label' => 'Content practices', 'rules' => 'nullable|array|max:4', 'fields' => [
                'title' => ['type' => 'text', 'label' => 'Practice', 'rules' => 'nullable|string|max:90'],
                'description' => ['type' => 'textarea', 'label' => 'Description', 'rules' => 'nullable|string|max:300'],
            ]],
        ],
    ],
    'seo_results' => [
        'name' => 'SEO — Results Story', 'view' => 'sections.seo_landing', 'icon' => 'fa-solid fa-chart-line',
        'fields' => [
            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100'],
            'heading' => ['type' => 'text', 'label' => 'Heading', 'rules' => 'nullable|string|max:200'],
            'body' => ['type' => 'textarea', 'label' => 'Story', 'rules' => 'nullable|string|max:1000'],
            'items' => ['type' => 'repeater', 'label' => 'Outcome metrics', 'rules' => 'nullable|array|max:4', 'fields' => [
                'value' => ['type' => 'text', 'label' => 'Metric', 'rules' => 'nullable|string|max:30'],
                'label' => ['type' => 'text', 'label' => 'What it represents', 'rules' => 'nullable|string|max:90'],
            ]],
        ],
    ],
    'seo_faq' => [
        'name' => 'SEO — FAQ', 'view' => 'sections.seo_landing', 'icon' => 'fa-regular fa-circle-question',
        'fields' => [
            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100'],
            'heading' => ['type' => 'text', 'label' => 'Heading', 'rules' => 'nullable|string|max:200'],
            'body' => ['type' => 'textarea', 'label' => 'Intro', 'rules' => 'nullable|string|max:500'],
            'items' => ['type' => 'repeater', 'label' => 'Questions and answers', 'rules' => 'nullable|array|max:12', 'fields' => [
                'title' => ['type' => 'text', 'label' => 'Question', 'rules' => 'nullable|string|max:300'],
                'description' => ['type' => 'textarea', 'label' => 'Answer', 'rules' => 'nullable|string|max:3000'],
            ]],
        ],
    ],
    'seo_cta' => [
        'name' => 'SEO — Closing CTA', 'view' => 'sections.seo_landing', 'icon' => 'fa-solid fa-bullhorn',
        'fields' => [
            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow', 'rules' => 'nullable|string|max:100'],
            'heading' => ['type' => 'text', 'label' => 'Heading', 'rules' => 'nullable|string|max:200'],
            'body' => ['type' => 'textarea', 'label' => 'Supporting copy', 'rules' => 'nullable|string|max:700'],
            'button_text' => ['type' => 'text', 'label' => 'Button text', 'rules' => 'nullable|string|max:70'],
            'button_link' => ['type' => 'text', 'label' => 'Button link', 'rules' => 'nullable|string|max:500'],
        ],
    ],

];
