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
    | 'fields'     - list of fields to show in the admin form
    | 'repeater'   - (optional) if the section supports "Add row" items
    */

    'types' => [

        'hero' => [
            'label' => 'Hero Banner',
            'icon'  => 'fa-solid fa-star',
            'fields' => [
                ['name' => 'badge',    'type' => 'text',     'label' => 'Badge Text',        'required' => false],
                ['name' => 'subtitle', 'type' => 'textarea', 'label' => 'Subtitle',          'required' => true],
                ['name' => 'cta_text', 'type' => 'text',     'label' => 'CTA Button Text',   'required' => false],
                ['name' => 'cta_link', 'type' => 'text',     'label' => 'CTA Button Link',   'required' => false],
            ],
        ],

        'topics' => [
            'label' => 'Topics Marquee',
            'icon'  => 'fa-solid fa-tags',
            'fields' => [
                ['name' => 'topics', 'type' => 'text', 'label' => 'Comma-separated topics', 'required' => true],
            ],
        ],

        'about' => [
            'label' => 'About + Feature Grid',
            'icon'  => 'fa-solid fa-circle-info',
            'fields' => [
                ['name' => 'heading',   'type' => 'text',     'label' => 'Heading',   'required' => true],
                ['name' => 'paragraph', 'type' => 'textarea', 'label' => 'Paragraph', 'required' => true],
            ],
            'repeater' => [
                'label'  => 'Feature Cards',
                'fields' => [
                    ['name' => 'icon',        'type' => 'text',     'label' => 'Icon (FontAwesome class)', 'required' => false],
                    ['name' => 'title',       'type' => 'text',     'label' => 'Title',                    'required' => true],
                    ['name' => 'description', 'type' => 'textarea', 'label' => 'Description',              'required' => true],
                    ['name' => 'benefit',     'type' => 'text',     'label' => 'Benefit Line',             'required' => false],
                ],
            ],
        ],

        'rows' => [
            'label' => 'Alternating Rows',
            'icon'  => 'fa-solid fa-list',
            'fields' => [],
            'repeater' => [
                'label'  => 'Rows',
                'fields' => [
                    ['name' => 'icon',        'type' => 'text',     'label' => 'Icon',        'required' => false],
                    ['name' => 'title',       'type' => 'text',     'label' => 'Title',       'required' => true],
                    ['name' => 'description', 'type' => 'textarea', 'label' => 'Description', 'required' => true],
                    ['name' => 'image',       'type' => 'text',     'label' => 'Image URL',   'required' => false],
                ],
            ],
        ],

        'projects' => [
            'label' => 'Project Slider',
            'icon'  => 'fa-solid fa-chart-line',
            'fields' => [],
            'repeater' => [
                'label'  => 'Projects',
                'fields' => [
                    ['name' => 'name',        'type' => 'text',     'label' => 'Project Name',       'required' => true],
                    ['name' => 'description', 'type' => 'textarea', 'label' => 'Description',        'required' => true],
                    ['name' => 'before',      'type' => 'text',     'label' => 'Before Numbers',     'required' => false],
                    ['name' => 'after',       'type' => 'text',     'label' => 'After Numbers',      'required' => false],
                    ['name' => 'image',       'type' => 'text',     'label' => 'Image URL',          'required' => false],
                ],
            ],
        ],

        'workflow' => [
            'label' => 'Workflow Timeline',
            'icon'  => 'fa-solid fa-diagram-project',
            'fields' => [],
            'repeater' => [
                'label'  => 'Steps',
                'fields' => [
                    ['name' => 'icon',        'type' => 'text',     'label' => 'Icon',        'required' => false],
                    ['name' => 'title',       'type' => 'text',     'label' => 'Title',       'required' => true],
                    ['name' => 'description', 'type' => 'textarea', 'label' => 'Description', 'required' => true],
                ],
            ],
        ],

        'faqs' => [
            'label' => 'FAQ Accordion',
            'icon'  => 'fa-solid fa-circle-question',
            'fields' => [],
            'repeater' => [
                'label'  => 'FAQs',
                'fields' => [
                    ['name' => 'question', 'type' => 'text',     'label' => 'Question', 'required' => true],
                    ['name' => 'answer',   'type' => 'textarea', 'label' => 'Answer',   'required' => true],
                ],
            ],
        ],

        'cta' => [
            'label' => 'CTA Banner',
            'icon'  => 'fa-solid fa-bullhorn',
            'fields' => [
                ['name' => 'heading',     'type' => 'text',     'label' => 'Heading',      'required' => true],
                ['name' => 'description', 'type' => 'textarea', 'label' => 'Description',  'required' => false],
                ['name' => 'button_text', 'type' => 'text',     'label' => 'Button Text',  'required' => false],
                ['name' => 'button_link', 'type' => 'text',     'label' => 'Button Link',  'required' => false],
            ],
        ],

        'related' => [
            'label' => 'Related Services',
            'icon'  => 'fa-solid fa-link',
            'fields' => [
                ['name' => 'slugs', 'type' => 'text', 'label' => 'Comma-separated service slugs', 'required' => true],
            ],
        ],

    ],

];