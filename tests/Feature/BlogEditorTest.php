<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\WebPage;
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

    public function test_admin_can_complete_blog_details_before_opening_the_full_page_editor(): void
    {
        $admin = $this->createAdminUser();

        $response = $this->actingAs($admin)->get(route('admin.blog.create'));

        $response->assertStatus(200);
        $response->assertSee('js/blog-page-editor.js');
        $response->assertSee('id="blogContent"', false);
        $response->assertSee('id="blogDetailsStep"', false);
        $response->assertSee('id="blogEditorStep"', false);
        $response->assertSee('Continue to page editor');
        $response->assertSee('Add section');
        $response->assertSee('Add image');
        $response->assertSee('blog-live-preview');
        $response->assertSee('id="siteHeader"', false);
        $response->assertSee('css/blog-post.css');
        $response->assertSee('fieldset class="contact-inc-form blog-contact-preview-form" disabled', false);
        $response->assertDontSee('<form class="contact-inc-form"', false);
        $response->assertSee('class="admin-sidebar-link is-active" type="button" data-admin-tab="blogs"', false);
        $response->assertSee('window.location.assign(dashboardUrl.toString())', false);
        $response->assertDontSee('name="published_at"', false);
        $response->assertDontSee('name="post_status"', false);
    }

    public function test_admin_dashboard_uses_shared_layout_and_working_navigation_controls(): void
    {
        $admin = $this->createAdminUser();

        $response = $this->actingAs($admin)->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('id="adminSidebar"', false);
        $response->assertSee('id="sidebarToggle"', false);
        $response->assertSee('id="dashboard"', false);
        $response->assertSee('Dashboard overview');
        $response->assertSee('data-admin-tab="blogs"', false);
        $response->assertSee("showAdminTab('blogs')", false);
        $response->assertSee("localStorage.getItem('adminLastTab')", false);
        $response->assertSee("localStorage.setItem('adminLastTab', tabName)", false);
        $response->assertSee("localStorage.setItem('adminSidebarCollapsed'", false);
        $this->assertSame(1, substr_count($response->getContent(), "sidebarToggle.addEventListener('click'"));
    }

    public function test_testimonial_and_webpage_admin_views_use_shared_layout(): void
    {
        $admin = $this->createAdminUser();
        $testimonial = Testimonial::create([
            'name' => 'Taylor Client',
            'rating' => 5,
            'content' => 'Excellent service.',
        ]);
        $webPage = WebPage::create([
            'title' => 'Shared Layout Page',
            'slug' => 'shared-layout-page',
        ]);

        $testimonialViews = [
            route('admin.testimonials.index') => 'Manage Testimonials',
            route('admin.testimonials.create') => 'Add New Testimonial',
            route('admin.testimonials.edit', $testimonial) => 'Edit Testimonial',
        ];
        foreach ($testimonialViews as $url => $content) {
            $response = $this->actingAs($admin)->get($url);
            $response->assertOk();
            $response->assertSee($content);
            $response->assertSee('data-admin-tab="testimonials"', false);
            $response->assertSee('class="admin-sidebar-link is-active" type="button" data-admin-tab="testimonials"', false);
        }

        $webPageViews = [
            route('admin.web-pages.index') => 'Dynamic Web Pages',
            route('admin.web-pages.create') => 'Create Web Page',
            route('admin.web-pages.edit', $webPage) => 'Edit Web Page',
        ];
        foreach ($webPageViews as $url => $content) {
            $response = $this->actingAs($admin)->get($url);
            $response->assertOk();
            $response->assertSee($content);
            $response->assertSee('class="admin-sidebar-link is-active" type="button" data-admin-tab="webpage"', false);
        }
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
            'category' => 'Technology',
            'tags' => 'hardware, security',
            'meta_title' => 'Secure IT Asset Lifecycles',
            'meta_description' => 'A practical guide to secure and responsible IT asset lifecycles.',
            'canonical_url' => 'https://example.com/blog/it-asset-lifecycles',
            'robots_meta' => 'noindex, follow',
            'content' => $richHtml,
            'is_published' => 1,
        ];

        $response = $this->actingAs($admin)->post(route('admin.blog.store'), $payload);

        $response->assertRedirect(route('admin.dashboard', ['tab' => 'blogs']));
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'Revolutionizing Enterprise IT Lifecycles',
            'slug' => 'revolutionizing-enterprise-it-lifecycles',
            'author_name' => $admin->name,
            'category' => 'Technology',
            'is_published' => 1,
        ]);

        $post = BlogPost::where('slug', 'revolutionizing-enterprise-it-lifecycles')->firstOrFail();
        $this->assertNotNull($post->published_at);
        $this->assertTrue($post->published_at->lte(now()));
        $this->assertStringContainsString('The Future of IT Asset Management', $post->content_html);
        $this->assertStringContainsString('Certified data destruction', $post->content_html);
        $this->assertStringContainsString('text-align: center', $post->content_html);

        // Verify public view
        $publicResponse = $this->get(route('blog.show', $post->slug));
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee('The Future of IT Asset Management');
        $publicResponse->assertSee('<title>Secure IT Asset Lifecycles</title>', false);
        $publicResponse->assertSee('Technology');
        $publicResponse->assertSee('hardware');
        $publicResponse->assertSee('1 min read');
        $publicResponse->assertSee('<meta name="robots" content="noindex, follow">', false);
        $publicResponse->assertSee('<link rel="canonical" href="https://example.com/blog/it-asset-lifecycles">', false);
        $publicResponse->assertSee('<script type="application/ld+json">', false);

        $listingResponse = $this->get(route('blog'));
        $listingResponse->assertStatus(200);
        $listingResponse->assertSee('Technology');
        $listingResponse->assertSee('Revolutionizing Enterprise IT Lifecycles');
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
        $editPage->assertSee('class="admin-sidebar-link is-active" type="button" data-admin-tab="blogs"', false);

        $updatePayload = [
            'title' => 'Updated Title With CKEditor',
            'excerpt' => 'Updated excerpt text.',
            'content' => '<h3>Updated Subheading</h3><p>Updated content with rich facilities.</p>',
            'is_published' => 1,
        ];

        $updateResponse = $this->actingAs($admin)->put(route('admin.blog.update', $post), $updatePayload);
        $updateResponse->assertRedirect(route('admin.dashboard', ['tab' => 'blogs']));

        $post->refresh();
        $this->assertSame('Updated Title With CKEditor', $post->title);
        $this->assertStringContainsString('Updated Subheading', $post->content_html);
    }

    public function test_unchecked_publish_checkbox_keeps_future_publish_date_as_draft(): void
    {
        $admin = $this->createAdminUser();

        $response = $this->actingAs($admin)->post(route('admin.blog.store'), [
            'title' => 'Draft Strategy Update',
            'excerpt' => 'An editorial update saved as a draft.',
            'content_blocks' => '<h3>Draft article</h3><p>This content is not published yet.</p>',
            'published_at' => now()->addDay(),
            'is_published' => 0,
        ]);

        $response->assertRedirect(route('admin.dashboard', ['tab' => 'blogs']));
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'Draft Strategy Update',
            'post_status' => 'draft',
            'is_published' => 0,
            'author_name' => $admin->name,
            'published_at' => null,
        ]);

        $post = BlogPost::where('slug', 'draft-strategy-update')->firstOrFail();
        $this->assertStringContainsString('Draft article', $post->content_html);
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
