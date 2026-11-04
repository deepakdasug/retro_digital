<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Faq;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogFaqManagementTest extends TestCase
{
    use RefreshDatabase;

    private function createAdminUser(): User
    {
        return User::factory()->create([
            'is_admin' => true,
        ]);
    }

    public function test_admin_can_view_blog_create_page_with_faqs_section(): void
    {
        $admin = $this->createAdminUser();

        $response = $this->actingAs($admin)->get(route('admin.blog.create'));

        $response->assertOk();
        $response->assertSee('Frequently Asked Questions (FAQs)');
        $response->assertSee('id="faqsList"', false);
        $response->assertSee('id="btnAddFaq"', false);
    }

    public function test_admin_can_create_blog_with_dynamic_faqs(): void
    {
        $admin = $this->createAdminUser();

        $payload = [
            'title' => 'Understanding IT Asset Disposition',
            'slug' => 'understanding-it-asset-disposition',
            'excerpt' => 'A comprehensive guide on securely recycling enterprise hardware.',
            'content_blocks' => '<p>Article content goes here...</p>',
            'category' => 'Technology',
            'is_published' => 1,
            'faqs' => [
                [
                    'question' => 'What does ITAD stand for?',
                    'answer' => 'ITAD stands for IT Asset Disposition.',
                    'order' => 1,
                ],
                [
                    'question' => 'Is data destruction guaranteed?',
                    'answer' => 'Yes, with complete NIST-compliant certificates.',
                    'order' => 2,
                ],
                [
                    'question' => '', // Should be ignored
                    'answer' => '',
                ],
            ],
        ];

        $response = $this->actingAs($admin)->post(route('admin.blog.store'), $payload);

        $response->assertRedirect(route('admin.dashboard', ['tab' => 'blogs']));

        $post = BlogPost::where('slug', 'understanding-it-asset-disposition')->first();
        $this->assertNotNull($post);

        $this->assertDatabaseHas('faqs', [
            'model_type' => 'blog',
            'model_id' => $post->id,
            'question' => 'What does ITAD stand for?',
            'answer' => 'ITAD stands for IT Asset Disposition.',
            'order' => 1,
        ]);

        $this->assertDatabaseHas('faqs', [
            'model_type' => 'blog',
            'model_id' => $post->id,
            'question' => 'Is data destruction guaranteed?',
            'answer' => 'Yes, with complete NIST-compliant certificates.',
            'order' => 2,
        ]);

        $this->assertEquals(2, $post->faqs()->count());
        $this->assertEquals('What does ITAD stand for?', $post->faqs->first()->question);
    }

    public function test_admin_can_update_add_and_remove_faqs_on_existing_blog(): void
    {
        $admin = $this->createAdminUser();

        $post = BlogPost::create([
            'title' => 'Initial Blog Post',
            'slug' => 'initial-blog-post',
            'excerpt' => 'Initial excerpt',
            'content_blocks' => '<p>Initial content</p>',
            'author_name' => 'Admin User',
            'is_published' => true,
        ]);

        $faq1 = $post->faqs()->create([
            'model_type' => 'blog',
            'model_id' => $post->id,
            'question' => 'Old Question 1',
            'answer' => 'Old Answer 1',
            'order' => 1,
            'is_published' => true,
        ]);

        $faq2 = $post->faqs()->create([
            'model_type' => 'blog',
            'model_id' => $post->id,
            'question' => 'To Be Removed',
            'answer' => 'This FAQ will be removed',
            'order' => 2,
            'is_published' => true,
        ]);

        // Verify edit view shows existing FAQs
        $editResponse = $this->actingAs($admin)->get(route('admin.blog.edit', $post));
        $editResponse->assertOk();
        $editResponse->assertSee('Old Question 1');
        $editResponse->assertSee('To Be Removed');

        // Update blog: modify faq1, remove faq2, add faq3
        $updatePayload = [
            'title' => 'Updated Blog Post',
            'slug' => 'updated-blog-post',
            'excerpt' => 'Updated excerpt',
            'content_blocks' => '<p>Updated content</p>',
            'category' => 'Hardware',
            'is_published' => 1,
            'faqs' => [
                [
                    'id' => $faq1->id,
                    'question' => 'Updated Question 1',
                    'answer' => 'Updated Answer 1',
                    'order' => 1,
                ],
                [
                    'question' => 'Brand New Question 3',
                    'answer' => 'Brand New Answer 3',
                    'order' => 2,
                ],
            ],
        ];

        $updateResponse = $this->actingAs($admin)->put(route('admin.blog.update', $post), $updatePayload);
        $updateResponse->assertRedirect(route('admin.dashboard', ['tab' => 'blogs']));

        $post->refresh();

        // faq1 updated
        $this->assertDatabaseHas('faqs', [
            'id' => $faq1->id,
            'question' => 'Updated Question 1',
            'answer' => 'Updated Answer 1',
        ]);

        // faq2 removed
        $this->assertSoftDeleted('faqs', [
            'id' => $faq2->id,
        ]);

        // new faq created
        $this->assertDatabaseHas('faqs', [
            'model_type' => 'blog',
            'model_id' => $post->id,
            'question' => 'Brand New Question 3',
            'answer' => 'Brand New Answer 3',
        ]);

        $this->assertEquals(2, $post->faqs()->count());
    }

    public function test_deleting_blog_removes_attached_faqs(): void
    {
        $admin = $this->createAdminUser();

        $post = BlogPost::create([
            'title' => 'Post to Delete',
            'slug' => 'post-to-delete',
            'excerpt' => 'Excerpt',
            'content_blocks' => '<p>Content</p>',
            'author_name' => 'Admin User',
            'is_published' => true,
        ]);

        $faq = $post->faqs()->create([
            'model_type' => 'blog',
            'model_id' => $post->id,
            'question' => 'Will be deleted with post',
            'answer' => 'Answer',
            'order' => 1,
            'is_published' => true,
        ]);

        $response = $this->actingAs($admin)->delete(route('admin.blog.destroy', $post));
        $response->assertRedirect(route('admin.dashboard', ['tab' => 'blogs']));

        $this->assertDatabaseMissing('blog_posts', ['id' => $post->id]);
        $this->assertSoftDeleted('faqs', ['id' => $faq->id]);
    }

    public function test_public_blog_page_displays_attached_faqs(): void
    {
        $post = BlogPost::create([
            'title' => 'Public Post with FAQs',
            'slug' => 'public-post-with-faqs',
            'excerpt' => 'Excerpt',
            'content_blocks' => '<p>Content</p>',
            'author_name' => 'Author',
            'is_published' => true,
            'published_at' => now(),
        ]);

        $post->faqs()->create([
            'model_type' => 'blog',
            'model_id' => $post->id,
            'question' => 'Is this post informative?',
            'answer' => 'Yes, very informative.',
            'order' => 1,
            'is_published' => true,
        ]);

        $response = $this->get(route('blog.show', $post->slug));

        $response->assertOk();
        $response->assertSee('Frequently Asked Questions');
        $response->assertSee('Is this post informative?');
        $response->assertSee('Yes, very informative.');
        $response->assertSee('FAQPage');
    }
}
