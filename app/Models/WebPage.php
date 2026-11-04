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

    /**
     * Resolve route binding for both numeric ID and string slug.
     */
    public function resolveRouteBinding($value, $field = null)
    {
        if ($field) {
            return parent::resolveRouteBinding($value, $field);
        }

        if (is_numeric($value)) {
            $page = $this->where('id', $value)->first();
            if ($page) {
                return $page;
            }
        }

        return $this->where('slug', $value)->firstOrFail();
    }

    // Defines the relationship to the sections
    public function sections()
    {
        return $this->hasMany(WebPageSection::class)->orderBy('sort_order');
    }
}