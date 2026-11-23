@extends('layouts.admin')

@section('title', 'Webpages - Retrotech Admin')
@section('page_heading', 'Webpages')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/seo-service.css') }}?v={{ filemtime(public_path('css/seo-service.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/seo-landing.css') }}?v={{ filemtime(public_path('css/seo-landing.css')) }}">
    <style>
        .webpages-admin-card {
            background: #ffffff;
            border: 1px solid #d8e6db;
            border-radius: 16px;
            padding: 1.75rem 2rem;
            box-shadow: 0 4px 20px rgba(20, 40, 26, 0.04);
            margin-bottom: 2rem;
        }
        .webpages-header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }
        .webpages-header-info h2 {
            font-size: 1.45rem;
            font-weight: 800;
            color: #173622;
            margin: 0.2rem 0;
            letter-spacing: -0.02em;
        }
        .webpages-header-info p {
            color: #617268;
            font-size: 0.95rem;
            margin: 0;
        }
        .webpages-add-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.35rem;
            border-radius: 10px;
            background: #27623c;
            color: #ffffff !important;
            font-weight: 700;
            font-size: 0.9rem;
            text-decoration: none;
            transition: background 0.2s, transform 0.2s;
            box-shadow: 0 4px 12px rgba(39, 98, 60, 0.2);
        }
        .webpages-add-btn:hover {
            background: #1c472c;
            transform: translateY(-1px);
        }
        .webpage-table {
            border-radius: 10px;
            overflow: hidden;
        }
        .webpage-table th {
            background: #f4f8f4;
            color: #2e4b37;
            font-weight: 700;
        }
    </style>
@endpush

@section('admin-content')
<div style="max-width: 1200px; margin: 0 auto;">
    <section class="webpages-admin-card">
        <div class="webpages-header-row">
            <div class="webpages-header-info">
                <span class="seo-eyebrow">PAGE REGISTER</span>
                <h2>Webpages Management</h2>
                <p>View, configure, and manage dynamic landing pages across all website sections.</p>
            </div>
            <a class="webpages-add-btn" href="{{ route('admin.webpages.create') }}">
                <i class="fa-solid fa-plus"></i> Create Webpage
            </a>
        </div>

        <div class="webpage-table-wrap">
            <table class="webpage-table">
                <thead>
                    <tr>
                        <th>Page Title</th>
                        <th>Website Section</th>
                        <th>Live URL</th>
                        <th>Sections</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($pages as $page)
                    <tr>
                        <td><strong>{{ $page->title }}</strong></td>
                        <td><span style="display:inline-block; padding: 3px 10px; border-radius: 6px; background: #eaf3ec; color: #27623c; font-weight: 600; font-size: 0.8rem;">{{ $sectionLabels[$page->page_section] ?? ucfirst($page->page_section) }}</span></td>
                        <td><code>/{{ $page->page_section }}/{{ $page->slug }}</code></td>
                        <td><strong>{{ $page->sections_count }}</strong></td>
                        <td class="webpage-actions">
                            <a href="{{ route('webpages.show', ['section' => $page->page_section, 'slug' => $page->slug]) }}" target="_blank" rel="noopener" title="View live page">
                                <i class="fa-solid fa-arrow-up-right-from-square" style="margin-right: 4px;"></i> View
                            </a>
                            <a href="{{ route('admin.webpages.edit', $page) }}" title="Edit settings">
                                <i class="fa-solid fa-pen-to-square" style="margin-right: 4px;"></i> Edit
                            </a>
                            <a href="{{ route('admin.webpages.editor', $page) }}" style="background: #eaf3ec; color: #27623c; border-color: #b8d9be;" title="Visual Section Builder">
                                <i class="fa-solid fa-cubes" style="margin-right: 4px;"></i> Sections
                            </a>
                            <form action="{{ route('admin.webpages.destroy', $page) }}" method="POST" onsubmit="return confirm('Delete this webpage and all its sections?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" title="Delete page">
                                    <i class="fa-solid fa-trash-can" style="margin-right: 4px;"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="webpage-empty">No webpages yet. Click "Create Webpage" to build your first page.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
