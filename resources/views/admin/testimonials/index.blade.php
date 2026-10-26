@extends('layouts.app')

@section('title', 'Manage Testimonials - Retrotech')

@section('content')
<main class="admin-dashboard-page" style="display: block; padding: 2rem;">
    <div class="admin-dashboard-main" style="max-width: 1100px; margin: 0 auto;">
        
        <!-- Header Section -->
        <div class="admin-section-heading admin-blog-section-heading" style="margin-bottom: 2rem;">
            <div>
                <span class="admin-section-eyebrow">CUSTOMER VOICES</span>
                <h2>Manage Testimonials</h2>
                <p>View and manage the reviews shown in the home page carousel.</p>
            </div>
            <a href="{{ route('admin.testimonials.create') }}" class="admin-action-button" style="text-decoration: none;">
                <i class="fa-solid fa-plus" aria-hidden="true"></i> Add New Testimonial
            </a>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
            <div class="admin-dashboard-success" role="status" style="margin-bottom: 1.5rem;">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Data Table Panel -->
        <div class="admin-table-scroll">
            <table class="admin-data-table">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Location</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Actions</th> <!-- Added Actions Header -->
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                        <tr>
                            <!-- Customer -->
                            <td>
                                <div class="admin-person-cell">
                                    @if($testimonial->image)
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                    @else
                                        <span class="admin-person-avatar">{{ mb_strtoupper(mb_substr($testimonial->name, 0, 1)) }}</span>
                                    @endif
                                    <div>
                                        <strong>{{ $testimonial->name }}</strong>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Location -->
                            <td>
                                <span class="admin-service-tag">{{ $testimonial->location ?: 'Not specified' }}</span>
                            </td>
                            
                            <!-- Rating -->
                            <td>
                                <span class="admin-status-badge" style="background-color: #fff7ed; color: #ea580c; border-color: #fed7aa;">
                                    <i class="fa-solid fa-star" style="font-size: 0.75rem;"></i> {{ number_format($testimonial->rating, 1) }} / 5
                                </span>
                            </td>
                            
                            <!-- Review -->
                            <td>
                                <div style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $testimonial->content }}">
                                    "{{ $testimonial->content }}"
                                </div>
                            </td>
                            
                            <!-- Actions (NEW) -->
                            <td>
                                <div class="admin-row-actions">
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="admin-secondary-button" aria-label="Edit {{ $testimonial->name }}" title="Edit testimonial">
                                        <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>Edit
                                    </a>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Delete this testimonial? This cannot be undone.');">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="admin-delete-button" aria-label="Delete {{ $testimonial->name }}" title="Delete testimonial">
                                            <i class="fa-regular fa-trash-can" aria-hidden="true"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <!-- Changed colspan to 5 to account for the new column -->
                            <td colspan="5" class="admin-table-empty">
                                <span class="admin-empty-icon"><i class="fa-regular fa-star"></i></span>
                                <strong>No testimonials yet</strong>
                                <span>Click "Add New Testimonial" to create your first review.</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</main>
@endsection