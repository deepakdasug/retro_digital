<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WebPage;
use App\Models\WebPageSection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WebPageSectionEditorTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_a_web_page_with_configured_sections_and_items(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post(route('admin.web-pages.store'), [
            'title' => 'Search Optimization',
            'sections' => [
                0 => [
                    'type' => 'topics',
                    'fields' => ['topics' => 'Technical SEO, Content Strategy'],
                ],
                2 => [
                    'type' => 'faqs',
                    'fields' => [
                        'heading' => 'Frequently Asked Questions',
                        'subtitle' => 'Answers to common questions.',
                    ],
                    'items' => [
                        0 => [
                            'question' => 'When will we see results?',
                            'answer' => 'Results depend on the starting point and competition.',
                        ],
                    ],
                ],
            ],
        ]);

        $response->assertRedirect(route('admin.web-pages.index'));

        $page = WebPage::with('sections')->where('slug', 'search-optimization')->firstOrFail();
        $this->assertCount(2, $page->sections);
        $this->assertSame(
            ['Technical SEO', 'Content Strategy'],
            $page->sections[0]->content['topics']
        );
        $this->assertSame(
            'Frequently Asked Questions',
            $page->sections[1]->content['heading']
        );
        $this->assertSame(
            'When will we see results?',
            $page->sections[1]->content['items'][0]['question']
        );
    }

    public function test_admin_can_update_existing_sections_and_add_a_section(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $page = WebPage::create([
            'title' => 'Search Optimization',
            'slug' => 'search-optimization',
        ]);
        WebPageSection::create([
            'web_page_id' => $page->id,
            'section_type' => 'topics',
            'content' => ['topics' => ['Technical SEO', 'Content Strategy']],
            'sort_order' => 0,
        ]);

        $response = $this->actingAs($admin)
            ->from(route('admin.web-pages.edit', $page))
            ->put(route('admin.web-pages.update', $page), [
                'title' => 'Search Optimization',
                'sections_submitted' => '1',
                'sections' => [
                    0 => [
                        'type' => 'topics',
                        'fields' => ['topics' => 'Technical SEO, Analytics'],
                    ],
                    1 => [
                        'type' => 'faqs',
                        'fields' => ['heading' => 'Common Questions'],
                        'items' => [
                            0 => [
                                'question' => 'How long does it take?',
                                'answer' => 'It depends on your site and competition.',
                            ],
                        ],
                    ],
                ],
            ]);

        $response->assertRedirect(route('admin.web-pages.index'));

        $page->refresh()->load('sections');
        $this->assertCount(2, $page->sections);
        $this->assertSame(
            ['Technical SEO', 'Analytics'],
            $page->sections[0]->content['topics']
        );
        $this->assertSame('faqs', $page->sections[1]->section_type);
        $this->assertSame(
            'How long does it take?',
            $page->sections[1]->content['items'][0]['question']
        );
    }

    public function test_section_required_fields_are_validated_before_page_creation(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)
            ->from(route('admin.web-pages.create'))
            ->post(route('admin.web-pages.store'), [
                'title' => 'Incomplete Page',
                'sections' => [
                    0 => [
                        'type' => 'topics',
                        'fields' => ['topics' => ''],
                    ],
                ],
            ]);

        $response->assertRedirect(route('admin.web-pages.create'));
        $response->assertSessionHasErrors('sections.0.fields.topics');
        $this->assertDatabaseMissing('web_pages', ['slug' => 'incomplete-page']);
    }

    public function test_unknown_section_types_are_rejected_instead_of_silently_discarded(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)
            ->from(route('admin.web-pages.create'))
            ->post(route('admin.web-pages.store'), [
                'title' => 'Invalid Section Page',
                'sections' => [
                    0 => ['type' => 'unknown'],
                ],
            ]);

        $response->assertRedirect(route('admin.web-pages.create'));
        $response->assertSessionHasErrors('sections.0.type');
        $this->assertDatabaseMissing('web_pages', ['slug' => 'invalid-section-page']);
    }
}
