<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebPageSection extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'content' => 'array',
        'is_visible' => 'boolean',
    ];

    public function page()
    {
        return $this->belongsTo(WebPage::class, 'web_page_id');
    }
}