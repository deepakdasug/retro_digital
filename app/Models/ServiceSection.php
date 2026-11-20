<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceSection extends Model
{
    use HasFactory;

    protected $table = 'services_sections';   // 👈 THIS LINE

    protected $fillable = [
        'service_id',
        'section_type',
        'content',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'content'    => 'array',
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}