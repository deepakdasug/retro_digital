<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'faqs';

    protected $fillable = [
        'question', 'answer',
        'category', 'subcategory',
        'sort_order', 'is_published', 'is_featured',
        'meta_title', 'meta_description',
        'created_by', 'updated_by',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured'  => 'boolean',
        'sort_order'   => 'integer',
    ];

    public function scopePublished($q)
    {
        return $q->where('is_published', true);
    }

    public function scopeOrdered($q)
    {
        return $q->orderBy('sort_order')->orderBy('id');
    }

    public function scopeInCategory($q, string $category)
    {
        return $q->where('category', $category);
    }

    public function scopeInSubcategory($q, string $subcategory)
    {
        return $q->where('subcategory', $subcategory);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}