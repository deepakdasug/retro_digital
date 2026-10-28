<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebPage extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Tells Laravel to use the 'slug' column for routing
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Defines the relationship to the sections
    public function sections()
    {
        return $this->hasMany(WebPageSection::class)->orderBy('sort_order');
    }
}