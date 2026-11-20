@extends('layouts.service-editor')

@section('title', 'Webpages')

@section('content')
<header class="seo-editor-topbar">
    <a class="seo-editor-brand" href="{{ route('admin.dashboard', ['tab' => 'webpage']) }}">
        <img src="{{ asset('assets/images/retrotech-mark.png') }}" alt="">
        <span>Retrotech Digital · Admin</span>
    </a>
    <div class="seo-editor-actions"><a class="seo-editor-primary" href="{{ route('admin.webpages.create') }}"><i class="fa-solid fa-plus"></i> Create webpage</a></div>
</header>

<main class="seo-settings-page">
    @if(session('success'))<div class="seo-editor-flash">{{ session('success') }}</div>@endif
    <section class="seo-settings-card">
        <span class="seo-eyebrow">Page register</span>
        <h1>Webpages</h1>
        <p>View and manage every page created for the website.</p>
        <div class="webpage-table-wrap">
            <table class="webpage-table">
                <thead><tr><th>Page</th><th>Section</th><th>URL</th><th>Sections</th><th>Actions</th></tr></thead>
                <tbody>
                @forelse($pages as $page)
                    <tr>
                        <td><strong>{{ $page->title }}</strong></td>
                        <td>{{ $sectionLabels[$page->page_section] ?? ucfirst($page->page_section) }}</td>
                        <td><code>/{{ $page->page_section }}/{{ $page->slug }}</code></td>
                        <td>{{ $page->sections_count }}</td>
                        <td class="webpage-actions">
                            <a href="{{ route('webpages.show', ['section' => $page->page_section, 'slug' => $page->slug]) }}" target="_blank" rel="noopener">View</a>
                            <a href="{{ route('admin.webpages.edit', $page) }}">Edit</a>
                            <a href="{{ route('admin.webpages.editor', $page) }}">Sections</a>
                            <form action="{{ route('admin.webpages.destroy', $page) }}" method="POST" onsubmit="return confirm('Delete this webpage and all its sections?')">
                                @csrf @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="webpage-empty">No webpages yet. Create the first one to get started.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
