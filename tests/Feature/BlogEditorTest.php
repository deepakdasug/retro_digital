<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogEditorTest extends TestCase
{
    use RefreshDatabase;

    private function createAdminUser(): User
    {
        return User::factory()->create([
            'is_admin' => true,
        ]);
    }

    public function test_admin_can_view_blog_create_page_with_ckeditor_assets(): void
    {
        $admin = $this->createAdminUser();

        $response = $this->actingAs($admin)->get(route('admin.blog.create'));

        $response->assertStatus(200);
        $response->assertSee('vendor/ckeditor5/ckeditor5.umd.js');
        $response->assertSee('vendor/ckeditor5/ckeditor5.css');
        $response->assertSee('js/blog-editor.js');
        $response->assertSee('id="blogContent"', false);
    }

    public function test_admin_can_create_blog_post_with_rich_content(): void
    {
        $admin = $this->createAdminUser();

        $richHtml = '<h2>The Future of IT Asset Management</h2>'
            . '<p style="text-align: center;">Proper disposition is crucial.</p>'
            . '<blockquote>Certified data destruction protects customer privacy.</blockquote>'
            . '<figure class="table"><table><tbody><tr><th>Stage</th><th>Action</th></tr><tr><td>1</td><td>Audit</td></tr></tbody></table></figure>'
            . '<ul><li>Asset Tracking</li><li>Certificate of Destruction</li></ul>';

        $payload = [
            'title' => 'Revolutionizing Enterprise IT Lifecycles',
            'excerpt' => 'A comprehensive review on IT asset disposition strategies.',
            'author_name' => 'Jane Tech',
            'author_designation' => 'Principal Security Architect',
            'content' => $richHtml,
            'is_published' => 1,
        ];

        $response = $this->actingAs($admin)->post(route('admin.blog.store'), $payload);

        $response->assertRedirect(route('admin.dashboard', ['tab' => 'blogs']));
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'Revolutionizing Enterprise IT Lifecycles',
            'slug' => 'revolutionizing-enterprise-it-lifecycles',
            'author_name' => 'Jane Tech',
            'is_published' => 1,
        ]);

        $post = BlogPost::where('slug', 'revolutionizing-enterprise-it-lifecycles')->firstOrFail();
        $this->assertStringContainsString('The Future of IT Asset Management', $post->content_html);
        $this->assertStringContainsString('Certified data destruction', $post->content_html);
        $this->assertStringContainsString('text-align: center', $post->content_html);

        // Verify public view
        $publicResponse = $this->get(route('blog.show', $post->slug));
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee('The Future of IT Asset Management');
    }

    public function test_admin_can_edit_existing_blog_post(): void
    {
        $admin = $this->createAdminUser();

        $post = BlogPost::create([
            'title' => 'Initial Title',
            'slug' => 'initial-title',
            'excerpt' => 'Initial excerpt',
            'author_name' => 'John Admin',
            'content_blocks' => [[
                'type' => 'html',
                'content' => '<p>Initial article content</p>',
            ]],
            'is_published' => true,
            'published_at' => now(),
        ]);

        $editPage = $this->actingAs($admin)->get(route('admin.blog.edit', $post));
        $editPage->assertStatus(200);
        $editPage->assertSee('Edit Blog Post');
        $editPage->assertSee('Initial article content');

        $updatePayload = [
            'title' => 'Updated Title With CKEditor',
            'excerpt' => 'Updated excerpt text.',
            'author_name' => 'John Admin',
            'content' => '<h3>Updated Subheading</h3><p>Updated content with rich facilities.</p>',
            'is_published' => 1,
        ];

        $updateResponse = $this->actingAs($admin)->put(route('admin.blog.update', $post), $updatePayload);
        $updateResponse->assertRedirect(route('admin.dashboard', ['tab' => 'blogs']));

        $post->refresh();
        $this->assertSame('Updated Title With CKEditor', $post->title);
        $this->assertStringContainsString('Updated Subheading', $post->content_html);
    }

    public function test_admin_can_upload_photo_and_video_from_computer(): void
    {
        \Illuminate\Support\Facades\Storage::fake('public');
        $admin = $this->createAdminUser();

        // 1. Test image upload from computer / paste
        $fakeImage = \Illuminate\Http\UploadedFile::fake()->create('diagram.png', 100, 'image/png');
        $imageResponse = $this->actingAs($admin)->postJson(route('admin.blog.upload_media'), [
            'upload' => $fakeImage,
        ]);

        $imageResponse->assertStatus(200);
        $imageResponse->assertJsonStructure(['url', 'is_video']);
        $this->assertFalse($imageResponse->json('is_video'));
        $imageUrl = $imageResponse->json('url');
        $this->assertStringContainsString('storage/blog_images', $imageUrl);

        // 2. Test video upload from computer
        $fakeVideo = \Illuminate\Http\UploadedFile::fake()->create('walkthrough.mp4', 5000, 'video/mp4');
        $videoResponse = $this->actingAs($admin)->postJson(route('admin.blog.upload_media'), [
            'upload' => $fakeVideo,
        ]);

        $videoResponse->assertStatus(200);
        $this->assertTrue($videoResponse->json('is_video'));
        $videoUrl = $videoResponse->json('url');
        $this->assertStringContainsString('storage/blog_videos', $videoUrl);

        // 3. Create a blog post containing both the image and the video
        $contentWithMedia = '<p>Check out our photo:</p>'
            . '<figure class="image"><img src="' . $imageUrl . '" alt="Diagram"></figure>'
            . '<p>And our local video walkthrough:</p>'
            . '<figure class="media-video"><video controls src="' . $videoUrl . '"></video></figure>';

        $postResponse = $this->actingAs($admin)->post(route('admin.blog.store'), [
            'title' => 'Article With Local Photo and Video',
            'excerpt' => 'An article testing media upload facilities.',
            'author_name' => 'Tech Admin',
            'content' => $contentWithMedia,
            'is_published' => 1,
        ]);

        $postResponse->assertRedirect(route('admin.dashboard', ['tab' => 'blogs']));

        $post = BlogPost::where('slug', 'article-with-local-photo-and-video')->firstOrFail();
        $this->assertStringContainsString('<video controls', $post->content_html);
        $this->assertStringContainsString('<img src="' . $imageUrl . '"', $post->content_html);

        // Public show page displays video and image
        $showResponse = $this->get(route('blog.show', $post->slug));
        $showResponse->assertStatus(200);
        $showResponse->assertSee('<video controls', false);
    }
}
