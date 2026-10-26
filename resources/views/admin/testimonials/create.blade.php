@extends('layouts.app')

@section('title', 'Add Testimonial - Retrotech')

@section('content')
<main class="admin-dashboard-page" style="display: block; padding: 2rem;">
    <div class="admin-dashboard-main" style="max-width: 800px; margin: 0 auto;">
        
        <!-- Header Section -->
        <div class="admin-section-heading" style="margin-bottom: 2rem;">
            <div>
                <span class="admin-section-eyebrow">CUSTOMER VOICES</span>
                <h2>Add New Testimonial</h2>
                <p>Create a new review to display in the home page carousel.</p>
            </div>
            <a href="{{ route('admin.testimonials.index') }}" class="admin-secondary-button">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Back to List
            </a>
        </div>

        <!-- Error Alerts -->
        @if ($errors->any())
            <div class="admin-dashboard-success" style="background-color: #fee2e2; color: #991b1b; margin-bottom: 1.5rem; border-color: #f87171;">
                <i class="fa-solid fa-circle-exclamation"></i>
                <div>
                    <strong>Please fix the following errors:</strong>
                    <ul style="margin-top: 0.5rem; padding-left: 1.5rem; list-style-type: disc;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Form Panel -->
        <article class="admin-insight-panel" style="padding: 2rem;">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                    <!-- Name -->
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #1f2937;">Name <span style="color: #dc2626;">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; outline: none; transition: border-color 0.2s;"
                               onfocus="this.style.borderColor='#398158'" onblur="this.style.borderColor='#d1d5db'">
                    </div>

                    <!-- Location -->
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #1f2937;">Location</label>
                        <input type="text" name="location" value="{{ old('location') }}" placeholder="e.g. New York"
                               style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; outline: none; transition: border-color 0.2s;"
                               onfocus="this.style.borderColor='#398158'" onblur="this.style.borderColor='#d1d5db'">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                    <!-- Rating -->
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #1f2937;">Rating (1 to 5) <span style="color: #dc2626;">*</span></label>
                        <input type="number" name="rating" value="{{ old('rating', 5) }}" min="1" max="5" step="0.1" required
                               style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; outline: none; transition: border-color 0.2s;"
                               onfocus="this.style.borderColor='#398158'" onblur="this.style.borderColor='#d1d5db'">
                        <small style="display: block; color: #6b7280; margin-top: 0.25rem;">Decimals allowed (e.g. 4.5, 4.7)</small>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #1f2937;">Profile Image (Optional)</label>
                        <input type="file" name="image" accept="image/*"
                               style="width: 100%; padding: 0.6rem; border: 1px solid #d1d5db; border-radius: 0.5rem; background: #f9fafb;">
                    </div>
                </div>

                <!-- Review Content -->
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #1f2937;">Review Content <span style="color: #dc2626;">*</span></label>
                    <textarea name="content" rows="4" required placeholder="Write the testimonial here..."
                              style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; outline: none; resize: vertical; transition: border-color 0.2s;"
                              onfocus="this.style.borderColor='#398158'" onblur="this.style.borderColor='#d1d5db'">{{ old('content') }}</textarea>
                </div>

                <!-- Action Buttons -->
                <div style="display: flex; gap: 1rem; border-top: 1px solid #e5e7eb; padding-top: 1.5rem;">
                    <button type="submit" class="admin-action-button" style="cursor: pointer; border: none;">
                        <i class="fa-solid fa-check" aria-hidden="true"></i> Save Testimonial
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}" class="admin-secondary-button" style="text-decoration: none;">
                        Cancel
                    </a>
                </div>
            </form>
        </article>
    </div>
</main>
@endsection