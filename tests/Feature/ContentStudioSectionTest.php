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

        $renderedSection = view('sections.seo_landing', [
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

        $renderedThreeCardSection = view('sections.seo_landing', [
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
