<?php

namespace Tests\Unit;

use App\Models\BlogPost;
use App\Support\ImageUrl;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImageUrlTest extends TestCase
{
    public function test_it_resolves_external_public_and_storage_image_paths(): void
    {
        Storage::fake('public');

        $this->assertSame(
            'https://cdn.example.test/images/cover.jpg',
            ImageUrl::resolve('https://cdn.example.test/images/cover.jpg')
        );
        $this->assertSame(
            asset('assets/images/logo.png'),
            ImageUrl::resolve('public/assets/images/logo.png')
        );
        $this->assertSame(
            asset('storage/blog_images/cover.webp'),
            ImageUrl::resolve('storage/app/public/blog_images/cover.webp')
        );
        $this->assertSame(
            asset('storage/blog_images/cover.webp'),
            ImageUrl::resolve('public\\storage\\blog_images\\cover.webp')
        );
        $this->assertSame(
            Storage::disk('public')->url('blog_images/cover.webp'),
            ImageUrl::resolve('blog_images/cover.webp')
        );
    }

    public function test_it_uses_a_fallback_for_an_empty_image_path(): void
    {
        $this->assertSame(
            asset('assets/images/logo.png'),
            ImageUrl::resolve('', 'assets/images/logo.png')
        );
        $this->assertNull(ImageUrl::resolve(null));
    }

    public function test_blog_post_images_use_normalized_storage_urls(): void
    {
        Storage::fake('public');

        $post = new BlogPost([
            'image_path' => 'storage/app/public/blog_images/featured.jpg',
            'content_blocks' => [
                ['type' => 'image', 'image_path' => 'blog_images/content.jpg'],
            ],
        ]);

        $this->assertSame(
            asset('storage/blog_images/featured.jpg'),
            $post->image_url
        );
        $this->assertStringContainsString(
            Storage::disk('public')->url('blog_images/content.jpg'),
            $post->content_html
        );
    }
}
