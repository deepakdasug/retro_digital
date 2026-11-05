<?php

namespace Tests\Feature;

use App\Models\TechDevelopment;
use App\Models\TechDevelopmentSection;
use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TechDevelopmentEditorTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_admin_dashboard_webpage_tab_displays_edit_button_for_tech_development(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $admin->assignRole('super-admin');

        $tech = TechDevelopment::create([
            'name' => 'NextJS Architecture',
            'slug' => 'nextjs-architecture',
            'short_description' => 'Scalable headless web architecture.',
            'hero_title' => 'NextJS Architecture Solutions',
            'is_published' => true,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.dashboard', ['tab' => 'webpage']));

        $response->assertStatus(200);
        $response->assertSee(route('admin.tech-developments.edit', $tech->id));
        $response->assertSee('NextJS Architecture');
    }

    public function test_admin_can_view_tech_development_edit_page(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $admin->assignRole('super-admin');

        $tech = TechDevelopment::create([
            'name' => 'SaaS Engineering',
            'slug' => 'saas-engineering',
            'hero_title' => 'Enterprise SaaS Development',
            'short_description' => 'Multi-tenant cloud systems.',
            'is_published' => true,
        ]);

        $diffSection = TechDevelopmentSection::create([
            'tech_development_id' => $tech->id,
            'section_type' => 'differentiator',
            'title' => 'How This Service Differentiates',
            'description' => 'Zero-trust multi-tenant isolation.',
            'content' => ['text' => 'Zero-trust multi-tenant isolation.'],
            'sort_order' => 1,
            'is_visible' => true,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.tech-developments.edit', $tech->id));

        $response->assertStatus(200);
        $response->assertSee('Edit Tech Development');
        $response->assertSee('Enterprise SaaS Development');
        $response->assertSee('Zero-trust multi-tenant isolation.');
    }

    public function test_admin_can_update_tech_development_and_its_sections(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $admin->assignRole('super-admin');

        $tech = TechDevelopment::create([
            'name' => 'Cloud APIs',
            'slug' => 'cloud-apis',
            'hero_title' => 'High-Throughput APIs',
            'short_description' => 'Microservices and webhooks.',
            'is_published' => true,
        ]);

        $diffSection = TechDevelopmentSection::create([
            'tech_development_id' => $tech->id,
            'section_type' => 'differentiator',
            'title' => 'Initial Title',
            'description' => 'Initial description text.',
            'content' => ['text' => 'Initial description text.'],
            'sort_order' => 1,
            'is_visible' => true,
        ]);

        $updateResponse = $this->actingAs($admin)->put(route('admin.tech-developments.update', $tech->id), [
            'name' => 'Cloud APIs & Microservices',
            'slug' => 'cloud-apis-microservices',
            'hero_title' => 'Scalable Enterprise Cloud APIs',
            'short_description' => 'Updated microservices short description.',
            'description' => 'Full updated description here.',
            'is_published' => 1,
            'sections' => [
                $diffSection->id => [
                    'section_type' => 'differentiator',
                    'title' => 'Updated Differentiator Title',
                    'description' => 'Updated differentiator description text.',
                ],
            ],
        ]);

        $updateResponse->assertRedirect(route('admin.dashboard', ['tab' => 'webpage']));
        $updateResponse->assertSessionHas('success');

        $tech->refresh();
        $this->assertSame('Cloud APIs & Microservices', $tech->name);
        $this->assertSame('cloud-apis-microservices', $tech->slug);
        $this->assertSame('Scalable Enterprise Cloud APIs', $tech->hero_title);

        $diffSection->refresh();
        $this->assertSame('Updated Differentiator Title', $diffSection->title);
        $this->assertSame('Updated differentiator description text.', $diffSection->description);
    }
}

