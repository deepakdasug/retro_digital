@extends('layouts.admin')

@section('title', 'Add FAQ - Retrotech Admin')
@section('page_heading', 'Add FAQ')

@section('admin-content')
    <div style="max-width: 800px; margin: 0 auto;">
        <div class="admin-section-heading" style="margin-bottom: 2rem;">
            <div>
                <span class="admin-section-eyebrow">HELP CENTER CONTENT</span>
                <h2>Add FAQ</h2>
                <p>Create a question and answer for your website visitors.</p>
            </div>
            <a href="{{ route('admin.faqs.index') }}" class="admin-secondary-button" style="text-decoration: none;">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Back to FAQs
            </a>
        </div>

        @include('admin.faqs.form', ['action' => route('admin.faqs.store'), 'method' => 'POST'])
    </div>
@endsection
