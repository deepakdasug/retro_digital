<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of roles, permissions, and users.
     */
    public function index()
    {
        $roles = Role::with('permissions', 'users')->get();
        $permissions = Permission::all()->groupBy(function ($perm) {
            $parts = explode('.', $perm->name);
            return $parts[0] ?? 'general';
        });
        $users = User::with('roles', 'permissions')->get();

        return view('admin.roles.index', compact('roles', 'permissions', 'users'));
    }

    /**
     * Store a newly created role with permissions.
     */
    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        $role = Role::create([
            'name' => strtolower(trim($request->name)),
            'guard_name' => 'web',
        ]);

        if ($request->filled('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        return redirect()->back()->with('success', "Role '{$role->name}' created successfully with assigned permissions.");
    }

    /**
     * Update an existing role's permissions.
     */
    public function updateRole(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        // Prevent renaming super-admin or admin
        if (!in_array($role->name, ['super-admin', 'admin'])) {
            $role->name = strtolower(trim($request->name));
            $role->save();
        }

        $permissions = $request->input('permissions', []);
        
        // Super-admin always keeps all permissions
        if ($role->name === 'super-admin') {
            $role->syncPermissions(Permission::all());
        } else {
            $role->syncPermissions($permissions);
        }

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        return redirect()->back()->with('success', "Role '{$role->name}' updated successfully.");
    }

    /**
     * Remove the specified role.
     */
    public function destroyRole(Role $role)
    {
        if (in_array($role->name, ['super-admin', 'admin'])) {
            return redirect()->back()->with('error', "System role '{$role->name}' cannot be deleted.");
        }

        $roleName = $role->name;
        $role->delete();

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        return redirect()->back()->with('success', "Role '{$roleName}' deleted successfully.");
    }

    /**
     * Assign or change a user's role.
     */
    public function assignUserRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::findOrFail($request->user_id);
        $roleName = $request->role;

        $user->syncRoles([$roleName]);

        // If assigned super-admin or admin, also ensure is_admin flag is true
        if (in_array($roleName, ['super-admin', 'admin'])) {
            $user->update(['is_admin' => true]);
        }

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        return redirect()->back()->with('success', "Role '{$roleName}' successfully assigned to user '{$user->name}'.");
    }
}
