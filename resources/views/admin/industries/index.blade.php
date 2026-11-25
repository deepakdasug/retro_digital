@extends('layouts.admin')

@section('title', 'Industries - Retrotech Admin')
@section('page_heading', 'Industries')

@section('admin-content')
    <div class="admin-section-heading" style="margin-bottom: 1.5rem;">
        <div>
            <span class="admin-section-eyebrow">SHARED INDUSTRY LAYOUT</span>
            <h2>Industries Management</h2>
            <p>All industry pages share the unified <code>industries.layout</code> design with dynamic data from the <code>industries</code> table.</p>
        </div>
        @can('industries.create')
        <a href="{{ route('admin.industries.create') }}" class="admin-action-button" style="text-decoration: none;">
            <i class="fa-solid fa-plus" aria-hidden="true"></i> Add Industry
        </a>
        @endcan
    </div>

    <div class="admin-table-scroll">
        <table class="admin-data-table">
            <thead>
                <tr>
                    <th>Industry</th>
                    <th>URL Slug</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($industries as $industry)
                    <tr>
                        <td>
                            <div style="display:flex; align-items:center; gap:0.65rem;">
                                <span style="width:34px; height:34px; border-radius:8px; background:#eaf6ec; color:#2f6f46; display:inline-flex; align-items:center; justify-content:center; flex-shrink:0;">
                                    <i class="{{ $industry->icon ?: 'fa-solid fa-industry' }}" aria-hidden="true"></i>
                                </span>
                                <div>
                                    <strong>{{ $industry->name }}</strong>
                                    @if($industry->short_description)
                                        <span style="display:block; font-size:0.8rem; color:#64748b; max-width:340px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $industry->short_description }}</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td><code>/who-we-serve/{{ $industry->slug }}</code></td>
                        <td>{{ $industry->sort_order }}</td>
                        <td>
                            <span class="admin-status-badge {{ $industry->is_published ? '' : 'is-draft' }}">
                                <span></span>{{ $industry->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>
                            <strong class="admin-date-primary">{{ $industry->updated_at?->format('M d, Y') ?? '—' }}</strong>
                            <span class="admin-date-secondary">{{ $industry->updated_at?->diffForHumans() }}</span>
                        </td>
                        <td>
                            <div class="admin-row-actions">
                                @if($industry->is_published)
                                    <a href="{{ route('industries.show', ['slug' => $industry->slug]) }}" target="_blank" rel="noopener" class="admin-secondary-button">
                                        <i class="fa-regular fa-eye" aria-hidden="true"></i> View
                                    </a>
                                @endif
                                @can('industries.edit')
                                    <a href="{{ route('admin.industries.edit', $industry) }}" class="admin-secondary-button">
                                        <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i> Settings
                                    </a>
                                    <a href="{{ route('admin.industries.editor', $industry) }}" class="admin-secondary-button" style="background:#eaf3ec; color:#27623c; border-color:#b8d9be;">
                                        <i class="fa-solid fa-layer-group" aria-hidden="true"></i> Sections
                                    </a>
                                @endcan
                                @can('industries.delete')
                                    <form action="{{ route('admin.industries.destroy', $industry) }}" method="POST" onsubmit="return confirm('Delete this industry page? This cannot be undone.');" style="display:inline-block; margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-delete-button">
                                            <i class="fa-regular fa-trash-can" aria-hidden="true"></i> Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="admin-table-empty">
                            <strong>No industries found</strong>
                            <span>Select “Add Industry” or run <code>IndustrySeeder</code> to populate industry pages.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($industries->hasPages())
        <div style="margin-top: 1.5rem;">
            {{ $industries->links() }}
        </div>
    @endif
@endsection
