<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Define all permissions grouped by module
        $permissions = [
            // Dashboard
            'dashboard.view',

            // Blogs (CRUD)
            'blogs.view',
            'blogs.create',
            'blogs.edit',
            'blogs.delete',

            // Testimonials (CRUD)
            'testimonials.view',
            'testimonials.create',
            'testimonials.edit',
            'testimonials.delete',

            // FAQs (CRUD)
            'faqs.view',
            'faqs.create',
            'faqs.edit',
            'faqs.delete',

            // Industries (CRUD)
            'industries.view',
            'industries.create',
            'industries.edit',
            'industries.delete',

            // Contacts / Enquiries
            'contacts.view',
            'contacts.delete',

            // Roles & Permissions Management
            'roles.view',
            'roles.create',
            'roles.edit',
            'roles.delete',
            'users.manage',
        ];

        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
        }

        // 2. Create Roles and Assign Permissions
        // Super Admin: Has all permissions
        $superAdminRole = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
        $superAdminRole->syncPermissions(Permission::all());

        // Admin: Has all permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $adminRole->syncPermissions(Permission::all());

        // Editor: Content management (Blogs, Webpages, Services, Testimonials, FAQs, Contacts)
        $editorRole = Role::firstOrCreate(['name' => 'editor', 'guard_name' => 'web']);
        $editorRole->syncPermissions([
            'dashboard.view',
            'blogs.view',
            'blogs.create',
            'blogs.edit',


            'testimonials.view',
            'testimonials.create',
            'testimonials.edit',
            'faqs.view',
            'faqs.create',
            'faqs.edit',
            'industries.view',
            'industries.create',
            'industries.edit',
            'contacts.view',
        ]);

        // Author: Can view and write blog posts
        $authorRole = Role::firstOrCreate(['name' => 'author', 'guard_name' => 'web']);
        $authorRole->syncPermissions([
            'dashboard.view',
            'blogs.view',
            'blogs.create',
            'blogs.edit',
            'faqs.view',
        ]);

        // Viewer: Read-only access to dashboard data
        $viewerRole = Role::firstOrCreate(['name' => 'viewer', 'guard_name' => 'web']);
        $viewerRole->syncPermissions([
            'dashboard.view',
            'blogs.view',
            'testimonials.view',
            'faqs.view',
            'industries.view',
            'contacts.view',
        ]);

        // 3. Assign super-admin to all existing admin users
        $adminUsers = User::where('is_admin', true)->orWhere('email', 'admin@test.com')->get();
        foreach ($adminUsers as $admin) {
            if (!$admin->hasRole('super-admin')) {
                $admin->assignRole('super-admin');
            }
        }

        // 4. Create convenient demo staff accounts for testing role-based permissions
        $editorUser = User::firstOrCreate(
            ['email' => 'editor@test.com'],
            ['name' => 'Editor Staff', 'password' => bcrypt('Editor@1234'), 'is_admin' => false]
        );
        $editorUser->syncRoles(['editor']);

        $authorUser = User::firstOrCreate(
            ['email' => 'author@test.com'],
            ['name' => 'Author Writer', 'password' => bcrypt('Author@1234'), 'is_admin' => false]
        );
        $authorUser->syncRoles(['author']);

        $viewerUser = User::firstOrCreate(
            ['email' => 'viewer@test.com'],
            ['name' => 'Support Viewer', 'password' => bcrypt('Viewer@1234'), 'is_admin' => false]
        );
        $viewerUser->syncRoles(['viewer']);
    }
}
