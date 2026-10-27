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
        'meta_description',
        'hero_image',
        'icon_svg',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}