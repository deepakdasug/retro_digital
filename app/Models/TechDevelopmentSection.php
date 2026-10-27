<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechDevelopmentSection extends Model
{
    protected $fillable = [
        'tech_development_id',
        'section_type',
        'title',
        'description',
        'content',
        'sort_order',
        'is_visible',
    ];

    protected function casts(): array
    {
        return [
            'content' => 'array',
            'is_visible' => 'boolean',
        ];
    }

    public function techDevelopment(): BelongsTo
    {
        return $this->belongsTo(TechDevelopment::class);
    }
}
