<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
    // Basic Content & Media
    'title', 
    'slug', 
    'excerpt', 
    'content_blocks', 
    'image_path', // Featured Image
    
    // Author Details (E-E-A-T)
    'author_name', 
    'author_designation',
    
    // Taxonomy & Organization
    'category',
    'tags',
    
    // On-Page & Technical SEO Fields
    'meta_title', 
    'meta_description', 
    'focus_keyword', 
    'canonical_url', 
    'robots_meta', 
    'schema_markup',
    
    // Publishing & Workflow
    'is_published', 
    'post_status', // draft or published; kept for dashboard compatibility
    'published_at',
    
    // Engagement & UX
    'comment_status', 
    'reading_time'
    ];

    // This is CRUCIAL: It tells Laravel to automatically convert the JSON 
    // from the database into a PHP Array when you use it in your views.
    protected $casts = [
        'content_blocks' => 'array',
        'tags' => 'array',
        'schema_markup' => 'array',
        'is_published' => 'boolean',
        'comment_status' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function getContentHtmlAttribute(): string
    {
        $blocks = $this->content_blocks ?? [];
        if (is_string($blocks)) {
            return $blocks;
        }
        if (!is_array($blocks)) {
            return '';
        }
        if (count($blocks) === 1 && ($blocks[0]['type'] ?? null) === 'html') {
            return $blocks[0]['content'] ?? '';
        }

        return collect($blocks)->map(function (array $block): string {
            $text = e($block['content'] ?? '');
            return match ($block['type'] ?? null) {
                'heading' => '<h2>' . $text . '</h2>',
                'subheading' => '<h3>' . $text . '</h3>',
                'paragraph' => '<p>' . nl2br($text) . '</p>',
                'image' => !empty($block['image_path'])
                    ? '<figure class="image"><img src="' . e(Storage::url($block['image_path'])) . '" alt="' . e($block['alt'] ?? $this->title) . '"></figure>'
                    : '',
                default => '',
            };
        })->implode("\n");
    }

    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image_path)) {
            return asset('assets/images/it-asset-management.jpg');
        }

        if (str_starts_with($this->image_path, 'http://') || str_starts_with($this->image_path, 'https://')) {
            return $this->image_path;
        }

        $base = basename($this->image_path);

        if (file_exists(public_path('assets/images/' . $base))) {
            return asset('assets/images/' . $base);
        }

        if (file_exists(public_path('assets/images/tech-development/' . $base))) {
            return asset('assets/images/tech-development/' . $base);
        }

        if (file_exists(public_path($this->image_path))) {
            return asset($this->image_path);
        }

        if (Storage::disk('public')->exists($this->image_path)) {
            return Storage::url($this->image_path);
        }

        return asset('assets/images/it-asset-management.jpg');
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'model_id')
            ->where('model_type', 'blog')
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc');
    }
}
