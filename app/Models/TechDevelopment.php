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
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    public function sections(): HasMany
    {
        return $this->hasMany(TechDevelopmentSection::class)
            ->orderBy('sort_order');
    }
}
