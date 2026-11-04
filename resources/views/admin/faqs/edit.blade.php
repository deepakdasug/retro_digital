@extends('layouts.admin')

@section('title', 'Edit FAQ - Retrotech Admin')
@section('page_heading', 'Edit FAQ')

@section('admin-content')
    <div style="max-width: 800px; margin: 0 auto;">
        <div class="admin-section-heading" style="margin-bottom: 2rem;">
            <div>
                <span class="admin-section-eyebrow">HELP CENTER CONTENT</span>
                <h2>Edit FAQ</h2>
                <p>Update this question and its answer.</p>
            </div>
            <a href="{{ route('admin.faqs.index') }}" class="admin-secondary-button" style="text-decoration: none;">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Back to FAQs
            </a>
        </div>

        @include('admin.faqs.form', ['action' => route('admin.faqs.update', $faq), 'method' => 'PUT'])
    </div>
@endsection
