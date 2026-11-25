<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'short_description',
        'description',
        'hero_eyebrow',
        'hero_title',
        'hero_description',
        'hero_image',
        'hero_cta_text',
        'hero_cta_link',
        'hero_secondary_text',
        'hero_secondary_link',
        'hero_index_label',
        'intro_eyebrow',
        'intro_heading',
        'intro_description',
        'intro_link_text',
        'intro_link_url',
        'intro_image',
        'intro_note_title',
        'intro_note_text',
        'features_eyebrow',
        'features_heading',
        'features_description',
        'features',
        'reasons_eyebrow',
        'reasons_heading',
        'reasons_description',
        'reasons',
        'spotlight_eyebrow',
        'spotlight_heading',
        'spotlight_description',
        'spotlight_image',
        'faq_eyebrow',
        'faq_heading',
        'faq_description',
        'faqs',
        'cta_eyebrow',
        'cta_heading',
        'cta_description',
        'cta_primary_text',
        'cta_primary_link',
        'cta_whatsapp_text',
        'cta_whatsapp_link',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_image',
        'schema_markup',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
        'reasons' => 'array',
        'faqs' => 'array',
        'is_published' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
