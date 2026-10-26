<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'slug', 
        'image_path', 
        'excerpt', 
        'content_blocks', 
        'author_name', 
        'author_designation',
        'is_published', 
        'published_at'
    ];

    // This is CRUCIAL: It tells Laravel to automatically convert the JSON 
    // from the database into a PHP Array when you use it in your views.
    protected $casts = [
        'content_blocks' => 'array', 
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function getContentHtmlAttribute(): string
    {
        $blocks = $this->content_blocks ?? [];
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
}
