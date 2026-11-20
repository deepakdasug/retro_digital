<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'page_section',
        'title',
        'short_description',
        'description',
        'icon',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(ServiceSection::class)
            ->orderBy('sort_order');
    }
}
