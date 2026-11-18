<?php

namespace App\Models;

use App\Support\ImageUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    'featured_image_width',
    'featured_image_alignment',
    
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
                    ? '<figure class="image"><img src="' . e(ImageUrl::resolve($block['image_path'])) . '" alt="' . e($block['alt'] ?? $this->title) . '"></figure>'
                    : '',
                default => '',
            };
        })->implode("\n");
    }

    public function getImageUrlAttribute(): ?string
    {
        return ImageUrl::resolve(
            $this->image_path,
            'assets/images/tech-development/web-development.jpg'
        );
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'model_id')
            ->where('model_type', 'blog')
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc');
    }
}
