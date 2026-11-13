<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'short_description',
        'meta_title',
        'meta_description',
        'canonical_url',
        'og_image',
        'robots_index',
        'robots_follow',
        'hero_image',
        'icon_svg',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
        'robots_index' => 'boolean',
        'robots_follow' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Resolve route binding for both numeric ID and string slug.
     */
    public function resolveRouteBinding($value, $field = null)
    {
        if ($field) {
            return parent::resolveRouteBinding($value, $field);
        }

        if (is_numeric($value)) {
            $service = $this->where('id', $value)->first();
            if ($service) {
                return $service;
            }
        }

        return $this->where('slug', $value)->firstOrFail();
    }
}