<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'page_section',
        'title',
        'icon',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'schema_markup',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(ServiceSection::class)
            ->orderBy('sort_order');
    }

    /**
     * Short, human-readable webpage name for admin listings.
     */
    public function getDisplayNameAttribute(): string
    {
        $names = [
            'seo-services' => 'SEO Services',
            'social-media-marketing' => 'Social Media Marketing',
            'video-marketing' => 'Video Marketing',
            'paid-marketing' => 'Paid Marketing',
            'email-marketing' => 'Email Marketing',
            'content-marketing' => 'Content Marketing',
            'orm-services' => 'ORM Services',
            'web-development' => 'Web Development',
            'mobile-app-development' => 'Mobile App Development',
            'custom-application' => 'Custom Application',
            'salesforce-erpnext-services' => 'Salesforce & ERPNext',
            'saas-application' => 'SaaS Application',
            'api-development' => 'API Development',
            'software-development' => 'Software Development',
            'whatsapp-integration' => 'WhatsApp Integration',
        ];

        return $names[$this->slug] ?? Str::headline($this->slug);
    }
}
