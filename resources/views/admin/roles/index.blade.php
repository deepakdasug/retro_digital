@extends('layouts.admin')

@section('title', 'Roles & Permissions - Retrotech Admin')
@section('page_heading', 'Roles & Permissions Management')

@section('admin-content')
<div style="max-width: 1200px; margin: 0 auto;">
    
    <!-- Header Section -->
    <div class="admin-section-heading admin-blog-section-heading" style="margin-bottom: 2rem;">
        <div>
            <span class="admin-section-eyebrow">ACCESS CONTROL &amp; SECURITY</span>
            <h2>Roles &amp; Permissions (Spatie RBAC)</h2>
            <p>Manage role hierarchies, assign granular CRUD permissions, and control user access across the admin panel.</p>
        </div>
        <div style="display:flex; align-items:center; gap:0.75rem;">
            <span class="admin-section-total"><i class="fa-solid fa-shield-halved"></i> {{ $roles->count() }} roles</span>
            @can('roles.create')
            <button type="button" class="admin-action-button" onclick="document.getElementById('createRoleCard').scrollIntoView({behavior:'smooth'})">
                <i class="fa-solid fa-plus" aria-hidden="true" style="margin-right: 0.45rem;"></i>Create Role
            </button>
            @endcan
        </div>
    </div>

    <!-- Security Metrics Grid -->
    <div class="admin-dashboard-metrics admin-insight-metrics" style="margin-bottom: 1.75rem;">
        <article class="admin-metric-card">
            <div class="admin-metric-icon is-green"><i class="fa-solid fa-user-shield"></i></div>
            <div>
                <span class="admin-metric-label">System Roles</span>
                <strong>{{ $roles->count() }}</strong>
                <small>Configured roles</small>
            </div>
        </article>
        <article class="admin-metric-card">
            <div class="admin-metric-icon is-blue"><i class="fa-solid fa-key"></i></div>
            <div>
                <span class="admin-metric-label">CRUD Permissions</span>
                <strong>{{ \Spatie\Permission\Models\Permission::count() }}</strong>
                <small>Granular abilities</small>
            </div>
        </article>
        <article class="admin-metric-card">
            <div class="admin-metric-icon is-violet"><i class="fa-solid fa-users-gear"></i></div>
            <div>
                <span class="admin-metric-label">Admin Accounts</span>
                <strong>{{ $users->count() }}</strong>
                <small>Assigned staff users</small>
            </div>
        </article>
        <article class="admin-metric-card">
            <div class="admin-metric-icon is-amber"><i class="fa-solid fa-lock"></i></div>
            <div>
                <span class="admin-metric-label">Engine Status</span>
                <strong style="color: #397b4e; font-size: 1.15rem;">Spatie Active</strong>
                <small>Guard: web</small>
            </div>
        </article>
    </div>

    <!-- ROLES LIST TABLE -->
    <div class="admin-card" style="background:#fff; border-radius:12px; border:1px solid #e2eae2; padding:1.5rem; margin-bottom:2rem; box-shadow:0 2px 10px rgba(0,0,0,0.03);">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.25rem;">
            <h3 style="margin:0; font-size:1.15rem; color:#1a2e20; font-weight:750;">
                <i class="fa-solid fa-shield-halved" style="color:#398158; margin-right:0.4rem;"></i> Defined Roles &amp; Permissions
            </h3>
            <span style="font-size:0.82rem; color:#64748b;">Showing all roles and their granted CRUD capabilities</span>
        </div>

        <div class="admin-table-scroll">
            <table class="admin-data-table">
                <thead>
                    <tr>
                        <th style="min-width: 140px;">Role Name</th>
                        <th>Guard</th>
                        <th>Assigned Users</th>
                        <th>Granted Permissions</th>
                        <th style="text-align: right; min-width: 160px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>
                            <div style="display:flex; align-items:center; gap:0.55rem;">
                                <span style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:6px; background:{{ in_array($role->name, ['super-admin', 'admin']) ? '#ecfdf5' : '#eff6ff' }}; color:{{ in_array($role->name, ['super-admin', 'admin']) ? '#059669' : '#2563eb' }}; font-size:0.85rem;">
                                    <i class="fa-solid {{ in_array($role->name, ['super-admin', 'admin']) ? 'fa-crown' : 'fa-user-tag' }}"></i>
                                </span>
                                <div>
                                    <strong style="font-size:0.92rem; color:#1e293b; text-transform:capitalize;">{{ str_replace('-', ' ', $role->name) }}</strong>
                                    @if(in_array($role->name, ['super-admin', 'admin']))
                                        <small style="display:block; font-size:0.7rem; color:#059669; font-weight:600;">System Protected</small>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td><span style="font-family:monospace; font-size:0.8rem; background:#f1f5f9; padding:0.2rem 0.5rem; border-radius:4px; color:#475569;">{{ $role->guard_name }}</span></td>
                        <td>
                            <span style="font-weight:600; color:#334155; font-size:0.88rem;">{{ $role->users->count() }} user(s)</span>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:0.4rem; flex-wrap:wrap; max-width:550px;">
                                @if($role->name === 'super-admin')
                                    <span style="display:inline-flex; align-items:center; gap:0.3rem; font-size:0.75rem; font-weight:700; background:#dcfce7; color:#15803d; padding:0.25rem 0.6rem; border-radius:9999px;">
                                        <i class="fa-solid fa-asterisk" style="font-size:0.65rem;"></i> All System Permissions (Wildcard)
                                    </span>
                                @else
                                    <span style="font-weight:700; color:#0f766e; background:#ccfbf1; padding:0.2rem 0.55rem; border-radius:9999px; font-size:0.75rem;">
                                        {{ $role->permissions->count() }} permissions
                                    </span>
                                    @foreach($role->permissions->take(4) as $perm)
                                        <span style="font-size:0.72rem; background:#f1f5f9; color:#475569; border:1px solid #e2e8f0; padding:0.15rem 0.45rem; border-radius:4px;">{{ $perm->name }}</span>
                                    @endforeach
                                    @if($role->permissions->count() > 4)
                                        <span style="font-size:0.72rem; color:#64748b; font-weight:600;">+{{ $role->permissions->count() - 4 }} more</span>
                                    @endif
                                @endif
                            </div>
                        </td>
                        <td style="text-align: right;">
                            <div class="admin-row-actions" style="justify-content: flex-end;">
                                @can('roles.edit')
                                <button type="button" class="admin-secondary-button" onclick="openEditRoleModal('{{ $role->id }}', '{{ $role->name }}', {{ json_encode($role->permissions->pluck('name')) }})" title="Edit permissions for this role">
                                    <i class="fa-solid fa-sliders"></i> Permissions
                                </button>
                                @endcan

                                @can('roles.delete')
                                @if(!in_array($role->name, ['super-admin', 'admin']))
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" onsubmit="return confirm('Delete role \'{{ $role->name }}\'? This will remove it from all users.');" style="display:inline-block; margin:0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-delete-button" title="Delete role">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                                @endif
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ASSIGN USERS TO ROLES -->
    <div class="admin-card" style="background:#fff; border-radius:12px; border:1px solid #e2eae2; padding:1.5rem; margin-bottom:2rem; box-shadow:0 2px 10px rgba(0,0,0,0.03);">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.25rem;">
            <div>
                <h3 style="margin:0; font-size:1.15rem; color:#1a2e20; font-weight:750;">
                    <i class="fa-solid fa-users-gear" style="color:#2563eb; margin-right:0.4rem;"></i> User Role Assignment
                </h3>
                <p style="margin:0.25rem 0 0; font-size:0.85rem; color:#64748b;">Assign roles to administrator staff to grant or restrict their panel capabilities.</p>
            </div>
            <span style="font-size:0.82rem; font-weight:600; color:#334155; background:#f8fafc; border:1px solid #e2e8f0; padding:0.35rem 0.75rem; border-radius:6px;">
                {{ $users->count() }} Registered Admin(s)
            </span>
        </div>

        <div class="admin-table-scroll">
            <table class="admin-data-table">
                <thead>
                    <tr>
                        <th>User Name &amp; Email</th>
                        <th>Current Role</th>
                        <th>Admin Flag</th>
                        <th>Joined</th>
                        <th>Assign New Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $usr)
                    <tr>
                        <td>
                            <div class="admin-person-cell">
                                <span class="admin-person-avatar" style="background:linear-gradient(135deg, #10b981 0%, #047857 100%); color:#fff; font-weight:750;">
                                    {{ mb_strtoupper(mb_substr($usr->name, 0, 1)) }}
                                </span>
                                <div>
                                    <strong style="color:#1e293b;">{{ $usr->name }}</strong>
                                    <a href="mailto:{{ $usr->email }}" style="color:#64748b; font-size:0.8rem; text-decoration:none;">{{ $usr->email }}</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            @php($primaryRole = $usr->roles->pluck('name')->first() ?: ($usr->is_admin ? 'super-admin' : 'None'))
                            <span style="display:inline-flex; align-items:center; gap:0.35rem; font-size:0.8rem; font-weight:700; padding:0.25rem 0.65rem; border-radius:9999px; background:{{ in_array($primaryRole, ['super-admin', 'admin']) ? '#ecfdf5' : '#eff6ff' }}; color:{{ in_array($primaryRole, ['super-admin', 'admin']) ? '#059669' : '#1d4ed8' }}; border:1px solid {{ in_array($primaryRole, ['super-admin', 'admin']) ? '#a7f3d0' : '#bfdbfe' }};">
                                <i class="fa-solid fa-shield"></i> {{ ucwords(str_replace('-', ' ', $primaryRole)) }}
                            </span>
                        </td>
                        <td>
                            <span style="font-size:0.8rem; font-weight:600; color:{{ $usr->is_admin ? '#059669' : '#64748b' }};">
                                <i class="fa-solid {{ $usr->is_admin ? 'fa-circle-check' : 'fa-circle-xmark' }}"></i> {{ $usr->is_admin ? 'Yes (Admin)' : 'No' }}
                            </span>
                        </td>
                        <td>
                            <span style="font-size:0.82rem; color:#64748b;">{{ $usr->created_at ? $usr->created_at->format('M d, Y') : '—' }}</span>
                        </td>
                        <td>
                            @can('users.manage')
                            <form action="{{ route('admin.roles.assign-user') }}" method="POST" style="display:flex; align-items:center; gap:0.5rem; margin:0;">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $usr->id }}">
                                <select name="role" style="padding:0.4rem 0.65rem; border:1px solid #cbd5e1; border-radius:6px; font-size:0.82rem; background:#fff; color:#1e293b; min-width:140px;">
                                    @foreach($roles as $r)
                                        <option value="{{ $r->name }}" {{ $usr->hasRole($r->name) ? 'selected' : '' }}>
                                            {{ ucwords(str_replace('-', ' ', $r->name)) }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="admin-secondary-button" style="padding:0.4rem 0.65rem; font-size:0.8rem;">
                                    Save
                                </button>
                            </form>
                            @else
                            <span style="font-size:0.8rem; color:#94a3b8;">Restricted</span>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- CREATE NEW ROLE CARD -->
    @can('roles.create')
    <div id="createRoleCard" class="admin-card" style="background:#fff; border-radius:12px; border:1px solid #e2eae2; padding:1.75rem; margin-bottom:2.5rem; box-shadow:0 2px 10px rgba(0,0,0,0.03);">
        <div style="border-bottom:1px solid #eef3ef; padding-bottom:1rem; margin-bottom:1.5rem;">
            <h3 style="margin:0; font-size:1.2rem; color:#1a2e20; font-weight:750;">
                <i class="fa-solid fa-plus-circle" style="color:#398158; margin-right:0.4rem;"></i> Create New Role with Permissions
            </h3>
            <p style="margin:0.25rem 0 0; font-size:0.85rem; color:#64748b;">Define a new custom role and check the exact CRUD permissions to assign.</p>
        </div>

        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf
            
            <div style="margin-bottom: 1.5rem; max-width: 450px;">
                <label style="display:block; font-size:0.88rem; font-weight:650; color:#334155; margin-bottom:0.4rem;">Role Name <span style="color:#ef4444;">*</span></label>
                <input type="text" name="name" required placeholder="e.g. content-manager, seo-analyst" style="width:100%; padding:0.65rem 0.85rem; border:1px solid #cbd5e1; border-radius:8px; font-size:0.9rem; box-sizing:border-box;">
                <small style="display:block; color:#64748b; font-size:0.75rem; margin-top:0.3rem;">Use lowercase letters and dashes (e.g., support-staff, auditor).</small>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:0.8rem;">
                    <label style="font-size:0.92rem; font-weight:700; color:#1e293b;">Assign Permissions</label>
                    <div style="display:flex; gap:0.5rem;">
                        <button type="button" onclick="toggleAllCheckboxes('createPermissionsWrap', true)" style="background:#f1f5f9; border:1px solid #cbd5e1; padding:0.3rem 0.65rem; border-radius:6px; font-size:0.75rem; font-weight:600; cursor:pointer;">Select All</button>
                        <button type="button" onclick="toggleAllCheckboxes('createPermissionsWrap', false)" style="background:#f1f5f9; border:1px solid #cbd5e1; padding:0.3rem 0.65rem; border-radius:6px; font-size:0.75rem; font-weight:600; cursor:pointer;">Deselect All</button>
                    </div>
                </div>

                <div id="createPermissionsWrap" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap:1rem;">
                    @foreach($permissions as $group => $perms)
                    <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:8px; padding:1rem;">
                        <div style="font-weight:750; font-size:0.85rem; color:#0f172a; text-transform:uppercase; letter-spacing:0.04em; margin-bottom:0.6rem; display:flex; align-items:center; gap:0.4rem;">
                            <i class="fa-solid fa-folder" style="color:#64748b;"></i> {{ $group }} Module
                        </div>
                        <div style="display:flex; flex-direction:column; gap:0.45rem;">
                            @foreach($perms as $p)
                            <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.82rem; color:#334155; cursor:pointer;">
                                <input type="checkbox" name="permissions[]" value="{{ $p->name }}" style="accent-color:#16a34a; width:15px; height:15px;">
                                <span>{{ $p->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="admin-action-button" style="padding:0.75rem 1.5rem; font-size:0.92rem;">
                <i class="fa-solid fa-check" style="margin-right:0.4rem;"></i> Save New Role
            </button>
        </form>
    </div>
    @endcan

</div>

<!-- EDIT ROLE MODAL -->
<div id="editRoleModal" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.5); backdrop-filter:blur(4px); z-index:9999; align-items:center; justify-content:center; padding:1.5rem;">
    <div style="background:#fff; border-radius:14px; max-width:750px; width:100%; max-height:90vh; overflow-y:auto; padding:2rem; box-shadow:0 20px 40px rgba(0,0,0,0.2);">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem; border-bottom:1px solid #e2e8f0; padding-bottom:1rem;">
            <div>
                <h3 style="margin:0; font-size:1.25rem; font-weight:750; color:#0f172a;" id="editModalRoleTitle">Edit Role Permissions</h3>
                <small style="color:#64748b;">Configure granted CRUD abilities for this role.</small>
            </div>
            <button type="button" onclick="closeEditRoleModal()" style="background:#f1f5f9; border:none; width:32px; height:32px; border-radius:50%; font-size:1rem; cursor:pointer; color:#64748b;">✕</button>
        </div>

        <form id="editRoleForm" method="POST">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 1.5rem;">
                <label style="display:block; font-size:0.88rem; font-weight:650; color:#334155; margin-bottom:0.4rem;">Role Name</label>
                <input type="text" id="editRoleNameInput" name="name" required style="width:100%; padding:0.65rem 0.85rem; border:1px solid #cbd5e1; border-radius:8px; font-size:0.9rem; box-sizing:border-box;">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:0.8rem;">
                    <label style="font-size:0.92rem; font-weight:700; color:#1e293b;">Role Permissions</label>
                    <div style="display:flex; gap:0.5rem;">
                        <button type="button" onclick="toggleAllCheckboxes('editPermissionsWrap', true)" style="background:#f1f5f9; border:1px solid #cbd5e1; padding:0.3rem 0.65rem; border-radius:6px; font-size:0.75rem; font-weight:600; cursor:pointer;">Select All</button>
                        <button type="button" onclick="toggleAllCheckboxes('editPermissionsWrap', false)" style="background:#f1f5f9; border:1px solid #cbd5e1; padding:0.3rem 0.65rem; border-radius:6px; font-size:0.75rem; font-weight:600; cursor:pointer;">Deselect All</button>
                    </div>
                </div>

                <div id="editPermissionsWrap" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap:1rem;">
                    @foreach($permissions as $group => $perms)
                    <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:8px; padding:0.85rem;">
                        <div style="font-weight:750; font-size:0.82rem; color:#0f172a; text-transform:uppercase; letter-spacing:0.04em; margin-bottom:0.5rem;">
                            {{ $group }} Module
                        </div>
                        <div style="display:flex; flex-direction:column; gap:0.4rem;">
                            @foreach($perms as $p)
                            <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.8rem; color:#334155; cursor:pointer;">
                                <input type="checkbox" name="permissions[]" value="{{ $p->name }}" class="edit-perm-checkbox" style="accent-color:#16a34a; width:15px; height:15px;">
                                <span>{{ $p->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div style="display:flex; justify-content:flex-end; gap:0.75rem; border-top:1px solid #e2e8f0; padding-top:1.25rem;">
                <button type="button" onclick="closeEditRoleModal()" style="padding:0.65rem 1.25rem; border:1px solid #cbd5e1; border-radius:8px; background:#fff; font-weight:600; cursor:pointer; color:#475569;">Cancel</button>
                <button type="submit" class="admin-action-button" style="padding:0.65rem 1.5rem;">
                    <i class="fa-solid fa-check" style="margin-right:0.4rem;"></i> Update Permissions
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function toggleAllCheckboxes(containerId, check) {
    const wrap = document.getElementById(containerId);
    if (!wrap) return;
    wrap.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = check);
}

function openEditRoleModal(roleId, roleName, assignedPermissions) {
    const modal = document.getElementById('editRoleModal');
    const title = document.getElementById('editModalRoleTitle');
    const nameInput = document.getElementById('editRoleNameInput');
    const form = document.getElementById('editRoleForm');

    title.textContent = `Edit Permissions: ${roleName}`;
    nameInput.value = roleName;
    if (['super-admin', 'admin'].includes(roleName)) {
        nameInput.readOnly = true;
        nameInput.style.backgroundColor = '#f1f5f9';
    } else {
        nameInput.readOnly = false;
        nameInput.style.backgroundColor = '#ffffff';
    }

    form.action = `/admin/roles/${roleId}`;

    // Set checkboxes
    const assignedSet = new Set(assignedPermissions);
    document.querySelectorAll('.edit-perm-checkbox').forEach(cb => {
        cb.checked = assignedSet.has(cb.value);
    });

    modal.style.display = 'flex';
}

function closeEditRoleModal() {
    document.getElementById('editRoleModal').style.display = 'none';
}
</script>
@endsection
