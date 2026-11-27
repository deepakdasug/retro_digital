<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\ServiceSection;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ContentStudioSectionTest extends TestCase
{
    use RefreshDatabase;

    private function createPage(): Service
    {
        return Service::create([
            'slug' => 'content-studio-test',
            'page_section' => 'services',
            'title' => 'Content Studio Test',
        ]);
    }

    public function test_dashboard_service_records_show_configured_and_fallback_thumbnails(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $page = $this->createPage();
        $page->update(['og_image' => 'storage/app/public/services/seo/upload.webp']);
        Service::create(['slug' => 'video-marketing', 'page_section' => 'services', 'title' => 'Video Marketing']);

        $response = $this->actingAs($admin)->get(route('admin.dashboard', ['tab' => 'webpage']));

        $response->assertOk()
            ->assertSee('src="' . asset('storage/services/seo/upload.webp') . '"', false)
            ->assertSee('data-fallback="' . asset('assets/images/tech-development/business-growth.webp') . '"', false)
            ->assertSee('src="' . asset('assets/images/enterprise-clients.jpg') . '"', false);
    }

    public function test_editor_uses_live_service_layout_and_preserves_excluded_sections(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $service = $this->createPage();
        $technical = $service->sections()->create([
            'section_type' => 'seo_technical',
            'content' => ['heading' => 'Excluded technical content'],
            'sort_order' => 1,
            'is_active' => true,
        ]);
        $hero = $service->sections()->create([
            'section_type' => 'seo_hero',
            'content' => ['heading' => 'Shared hero heading'],
            'sort_order' => 2,
            'is_active' => true,
        ]);

        $liveUrl = route('webpages.show', ['section' => 'services', 'slug' => $service->slug]);
        $this->get($liveUrl)->assertOk()
            ->assertSee('Shared hero heading')
            ->assertSee('css/service-page-vibrant.css')
            ->assertDontSee('Excluded technical content');
        $this->actingAs($admin)->get(route('admin.webpages.editor', $service))->assertOk()
            ->assertSee('Shared hero heading')
            ->assertSee('css/service-page-vibrant.css')
            ->assertSee('src="' . $liveUrl . '"', false)
            ->assertDontSee('Excluded technical content')
            ->assertDontSee('value="seo_technical"', false);

        $this->post(route('admin.webpages.save', $service), [
            'ordered_sections' => [$hero->id],
            'sections' => [$hero->id => ['is_active' => '1', 'content' => ['heading' => 'Updated hero']]],
        ])->assertRedirect(route('admin.webpages.editor', $service));

        $this->assertSame(['heading' => 'Excluded technical content'], $technical->refresh()->content);
        $this->assertTrue($technical->is_active);
        $this->get($liveUrl)->assertOk()->assertSee('Updated hero');
    }

    public function test_admin_can_upload_banner_and_edit_its_description(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create(['is_admin' => true]);
        $service = $this->createPage();
        $section = $service->sections()->create([
            'section_type' => 'seo_content',
            'content' => [
                'eyebrow' => 'Content',
                'heading' => 'Content strategy',
                'body' => 'Intro copy.',
                'items' => [],
            ],
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $editorResponse = $this->actingAs($admin)->get(route('admin.webpages.editor', $service));
        $editorResponse->assertOk();
        $editorResponse->assertSee('Principle banner image');
        $editorResponse->assertSee('Banner description');
        $editorResponse->assertSee('name="sections[' . $section->id . '][content][banner_image]"', false);
        $editorResponse->assertDontSee('name="sections[' . $section->id . '][content][body]"', false);

        $response = $this->actingAs($admin)->post(route('admin.webpages.save', $service), [
            'sections' => [
                $section->id => [
                    'is_active' => '1',
                    'content' => [
                        'eyebrow' => 'Content',
                        'heading' => 'Content strategy',
                        'body' => 'Intro copy.',
                        'banner_image' => UploadedFile::fake()->image('principle.png'),
                        'banner_image_alt' => 'A green content principle graphic',
                        'principle_heading' => 'Make useful pages.',
                        'principle_description' => 'Give readers an answer they can act on.',
                        'items' => array_map(static fn (int $index) => [
                            'title' => "Practice {$index}",
                            'description' => "Description {$index}",
                        ], range(1, 5)),
                    ],
                    'existing_images' => ['banner_image' => ''],
                ],
            ],
        ]);

        $response->assertRedirect(route('admin.webpages.editor', $service));
        $savedContent = $section->fresh()->content;
        $this->assertSame('Make useful pages.', $savedContent['principle_heading']);
        $this->assertSame('Give readers an answer they can act on.', $savedContent['principle_description']);
        $this->assertCount(5, $savedContent['items']);
        Storage::disk('public')->assertExists($savedContent['banner_image']);

        $renderedSection = view('services.sections.service-section-layout', [
            'data' => $savedContent,
            'sectionType' => 'seo_content',
        ])->render();
        $this->assertStringContainsString('Give readers an answer they can act on.', $renderedSection);
        $this->assertStringNotContainsString('Intro copy.', $renderedSection);
        $this->assertStringContainsString('seo-lp-content-art-image', $renderedSection);
        $this->assertStringContainsString('data-content-list-more', $renderedSection);
        $this->assertStringContainsString('data-content-list-window', $renderedSection);
        $this->assertStringNotContainsString('fa-arrow-right', $renderedSection);
        $this->assertStringNotContainsString('THE CONTENT PRINCIPLE', $renderedSection);
        $this->assertStringNotContainsString(' / CONTENT', $renderedSection);

        $renderedThreeCardSection = view('services.sections.service-section-layout', [
            'data' => array_merge($savedContent, ['items' => array_slice($savedContent['items'], 0, 3)]),
            'sectionType' => 'seo_content',
        ])->render();
        $this->assertStringNotContainsString('data-content-list-more', $renderedThreeCardSection);
    }

    public function test_new_content_studio_section_accepts_a_banner_image_and_uses_copy_defaults(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create(['is_admin' => true]);
        $service = $this->createPage();

        $response = $this->actingAs($admin)->post(route('admin.webpages.sections.store', $service), [
            'section_type' => 'seo_content',
            'sort_order' => 1,
            'content' => [
                'banner_image' => UploadedFile::fake()->image('principle.png'),
            ],
        ]);

        $response->assertRedirect(route('admin.webpages.editor', $service));
        $section = ServiceSection::where('service_id', $service->id)->firstOrFail();
        $this->assertSame('Make every page earn its place.', $section->content['principle_heading']);
        $this->assertSame(
            'Answer a real question with clarity, depth, and a next step that feels natural.',
            $section->content['principle_description']
        );
        Storage::disk('public')->assertExists($section->content['banner_image']);
    }
}
