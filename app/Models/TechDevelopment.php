<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TechDevelopment extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'hero_title',
        'hero_description',
        'hero_image',
        'meta_title',
        'meta_description',
        'canonical_url',
        'og_image',
        'robots_index',
        'robots_follow',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'robots_index' => 'boolean',
            'robots_follow' => 'boolean',
        ];
    }

    public function sections(): HasMany
    {
        return $this->hasMany(TechDevelopmentSection::class)
            ->orderBy('sort_order');
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
            $item = $this->where('id', $value)->first();
            if ($item) {
                return $item;
            }
        }

        return $this->where('slug', $value)->firstOrFail();
    }
}
