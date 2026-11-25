<?php

/*
| Category-specific page layouts. Add the public and editor Blade views for
| each category here as those layouts are introduced.
*/
return [
    'services' => [
        'show' => 'services.show',
        'editor' => 'admin.services.editor',
        'pages' => [
            'social-media-marketing' => [
                'show' => 'services.seo-services',
            ],
            'seo-services' => [
                'show' => 'services.seo-services',
            ],
            'video-marketing' => [
                'show' => 'services.seo-services',
            ],
        ],
    ],
];
