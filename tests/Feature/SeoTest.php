<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Support\SeoCanonical;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class SeoTest extends TestCase
{
    use RefreshDatabase;

    public function test_dynamic_pages_emit_indexing_directives_and_safe_canonicals(): void
    {
        $legalResponse = $this->get(route('privacy-policy'));
        $legalResponse->assertOk();
        $legalResponse->assertSee('<meta name="robots" content="noindex, follow">', false);
    }

    public function test_canonical_urls_reject_http_variants_and_query_strings(): void
    {
        $fallback = 'https://www.retrotechdigital.com/services/search-engine-optimization';

        $this->assertSame(
            $fallback,
            SeoCanonical::resolve('http://www.retrotechdigital.com/services/search-engine-optimization', $fallback)
        );
        $this->assertSame(
            $fallback,
            SeoCanonical::resolve('https://www.retrotechdigital.com/services/search-engine-optimization?source=campaign', $fallback)
        );
        $this->assertSame(
            $fallback,
            SeoCanonical::resolve('https://localhost/services/search-engine-optimization', $fallback)
        );
    }

    public function test_published_blog_posts_without_categories_remain_discoverable(): void
    {
        $post = BlogPost::create([
            'title' => 'Categoryless Article',
            'slug' => 'categoryless-article',
            'excerpt' => 'A published article without a category.',
            'content_blocks' => [['type' => 'html', 'content' => '<p>Article body</p>']],
            'author_name' => 'Editorial Team',
            'author_designation' => 'Editor',
            'is_published' => true,
            'published_at' => now(),
        ]);

        $response = $this->get(route('blog'));

        $response->assertOk();
        $response->assertSee($post->title);
    }

    public function test_generated_sitemap_contains_published_indexable_routes_only(): void
    {
        config(['app.url' => 'https://www.retrotechdigital.com']);
        URL::forceRootUrl('https://www.retrotechdigital.com');
        URL::forceScheme('https');

        BlogPost::create([
            'title' => 'Indexable Blog Post',
            'slug' => 'indexable-blog-post',
            'excerpt' => 'Published content for the sitemap.',
            'content_blocks' => [['type' => 'html', 'content' => '<p>Article body</p>']],
            'author_name' => 'Editorial Team',
            'author_designation' => 'Editor',
            'is_published' => true,
            'published_at' => now(),
            'canonical_url' => 'http://localhost/blog/indexable-blog-post',
            'robots_meta' => 'index, follow',
        ]);
        BlogPost::create([
            'title' => 'Noindex Blog Post',
            'slug' => 'noindex-blog-post',
            'excerpt' => 'This article must not appear in the sitemap.',
            'content_blocks' => [['type' => 'html', 'content' => '<p>Article body</p>']],
            'author_name' => 'Editorial Team',
            'author_designation' => 'Editor',
            'is_published' => true,
            'published_at' => now(),
            'robots_meta' => 'noindex, follow',
        ]);

        $path = tempnam(sys_get_temp_dir(), 'seo-sitemap-');
        try {
            $this->assertNotFalse($path);
            Artisan::call('sitemap:generate', ['--path' => $path]);
            $sitemap = file_get_contents($path);

            $this->assertIsString($sitemap);
            $this->assertStringContainsString(route('blog.show', 'indexable-blog-post'), $sitemap);
            $this->assertStringContainsString(route('about'), $sitemap);
            $this->assertStringNotContainsString('noindex-blog-post', $sitemap);
            $this->assertStringNotContainsString('http://localhost', $sitemap);
            $this->assertStringNotContainsString('/privacy-policy', $sitemap);
            $this->assertStringNotContainsString('/terms-and-conditions', $sitemap);
        } finally {
            if (is_string($path) && file_exists($path)) {
                unlink($path);
            }
            URL::forceRootUrl(null);
            URL::forceScheme(null);
        }
    }
}
