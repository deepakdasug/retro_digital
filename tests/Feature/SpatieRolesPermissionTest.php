<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Faq;
use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class SpatieRolesPermissionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Seed Spatie roles and permissions
        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_super_admin_can_access_all_crud_operations(): void
    {
        $superAdmin = User::factory()->create(['is_admin' => true]);
        $superAdmin->assignRole('super-admin');

        // Can access dashboard
        $this->actingAs($superAdmin)->get(route('admin.dashboard'))
            ->assertStatus(200)
            ->assertSee('Roles &amp; Permissions', false);

        // Can access blog create
        $this->actingAs($superAdmin)->get(route('admin.blog.create'))
            ->assertStatus(200);

        // Can access roles index
        $this->actingAs($superAdmin)->get(route('admin.roles.index'))
            ->assertStatus(200)
            ->assertSee('Defined Roles &amp; Permissions', false);
    }

    public function test_editor_can_create_blogs_but_cannot_delete(): void
    {
        $editor = User::factory()->create(['is_admin' => false]);
        $editor->assignRole('editor');

        $blog = BlogPost::create([
            'title' => 'Test Security Post',
            'slug' => 'test-security-post',
            'excerpt' => 'Sample excerpt for test',
            'author_name' => 'Editor Person',
            'content_blocks' => [],
            'is_published' => true,
        ]);

        // Editor can access blog create
        $this->actingAs($editor)->get(route('admin.blog.create'))
            ->assertStatus(200);

        // Editor can edit blog
        $this->actingAs($editor)->get(route('admin.blog.edit', $blog))
            ->assertStatus(200);

        // Editor CANNOT delete blog -> 403 Forbidden
        $this->actingAs($editor)->delete(route('admin.blog.destroy', $blog))
            ->assertStatus(403);
    }

    public function test_viewer_can_view_dashboard_but_cannot_access_create_routes(): void
    {
        $viewer = User::factory()->create(['is_admin' => false]);
        $viewer->assignRole('viewer');

        // Viewer can view dashboard
        $this->actingAs($viewer)->get(route('admin.dashboard'))
            ->assertStatus(200);

        // Viewer CANNOT access blog create -> 403 Forbidden
        $this->actingAs($viewer)->get(route('admin.blog.create'))
            ->assertStatus(403);

        // Viewer CANNOT access FAQ create -> 403 Forbidden
        $this->actingAs($viewer)->get(route('admin.faqs.create'))
            ->assertStatus(403);

        // Viewer CANNOT access roles management -> 403 Forbidden
        $this->actingAs($viewer)->get(route('admin.roles.index'))
            ->assertStatus(403);
    }

    public function test_super_admin_can_create_new_role_and_assign_to_user(): void
    {
        $superAdmin = User::factory()->create(['is_admin' => true]);
        $superAdmin->assignRole('super-admin');

        $staffUser = User::factory()->create(['is_admin' => false]);

        // Create new role via POST
        $response = $this->actingAs($superAdmin)->post(route('admin.roles.store'), [
            'name' => 'compliance-officer',
            'permissions' => ['blogs.view', 'contacts.view'],
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('roles', ['name' => 'compliance-officer']);

        // Assign to user via POST
        $assignResponse = $this->actingAs($superAdmin)->post(route('admin.roles.assign-user'), [
            'user_id' => $staffUser->id,
            'role' => 'compliance-officer',
        ]);

        $assignResponse->assertSessionHas('success');
        $this->assertTrue($staffUser->fresh()->hasRole('compliance-officer'));
    }

    public function test_cannot_delete_default_system_roles(): void
    {
        $superAdmin = User::factory()->create(['is_admin' => true]);
        $superAdmin->assignRole('super-admin');

        $adminRole = Role::findByName('admin', 'web');

        $response = $this->actingAs($superAdmin)->delete(route('admin.roles.destroy', $adminRole));
        $response->assertSessionHas('error');
        $this->assertDatabaseHas('roles', ['name' => 'admin']);
    }
}
