@extends('layouts.admin')

@section('title', 'Web Pages - Admin')
@section('page_heading', 'Web pages')

@section('admin-content')
    <div style="max-width: 1100px; margin: 0 auto;">
        
        <!-- Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <div>
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <a href="{{ route('admin.dashboard') }}" style="color: #6b7280; text-decoration: none; font-size: 0.875rem; font-weight: 500;">
                        ← Dashboard
                    </a>
                </div>
                <h1 style="font-size: 1.75rem; font-weight: 800; color: #111827; margin: 0.5rem 0 0 0; letter-spacing: -0.02em;">Dynamic Web Pages</h1>
                <p style="font-size: 0.875rem; color: #6b7280; margin: 0.25rem 0 0 0;">Create and customize conversion-focused web pages using reusable section templates.</p>
            </div>
            <div>
                <a href="{{ route('admin.web-pages.create') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; background: #16a34a; color: #fff; font-weight: 600; font-size: 0.875rem; padding: 0.7rem 1.25rem; border-radius: 0.5rem; text-decoration: none; box-shadow: 0 2px 8px rgba(22, 163, 74, 0.25); transition: background 0.2s;">
                    <i class="fa-solid fa-plus"></i> Add New Page
                </a>
            </div>
        </div>

        <!-- Pages Card / Table -->
        <div style="background: #fff; border-radius: 0.75rem; box-shadow: 0 1px 3px rgba(0,0,0,0.06); border: 1px solid #e5e7eb; overflow: hidden;">
            @if($pages->isEmpty())
                <div style="text-align: center; padding: 4rem 2rem;">
                    <div style="width: 64px; height: 64px; border-radius: 50%; background: #f0fdf4; color: #16a34a; display: inline-flex; align-items: center; justify-content: center; font-size: 1.75rem; margin-bottom: 1rem;">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <h3 style="font-size: 1.125rem; font-weight: 700; color: #111827; margin: 0 0 0.5rem 0;">No pages created yet</h3>
                    <p style="color: #6b7280; font-size: 0.875rem; max-width: 420px; margin: 0 auto 1.5rem auto;">Use the Page Builder wizard to assemble high-converting web pages with hero banners, project sliders, workflow timelines, and FAQs.</p>
                    <a href="{{ route('admin.web-pages.create') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; background: #16a34a; color: #fff; font-weight: 600; font-size: 0.875rem; padding: 0.7rem 1.4rem; border-radius: 0.5rem; text-decoration: none;">
                        <i class="fa-solid fa-plus"></i> Create First Page
                    </a>
                </div>
            @else
                <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem;">
                    <thead>
                        <tr style="background: #f9fafb; border-bottom: 1px solid #e5e7eb; color: #4b5563; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">
                            <th style="padding: 1rem 1.25rem; font-weight: 700;">Page Title</th>
                            <th style="padding: 1rem 1.25rem; font-weight: 700;">Category</th>
                            <th style="padding: 1rem 1.25rem; font-weight: 700; text-align: center;">Sections</th>
                            <th style="padding: 1rem 1.25rem; font-weight: 700;">Status</th>
                            <th style="padding: 1rem 1.25rem; font-weight: 700;">Last Updated</th>
                            <th style="padding: 1rem 1.25rem; font-weight: 700; text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody style="divide-y: divide-gray-100;">
                        @foreach($pages as $page)
                            <tr style="border-bottom: 1px solid #f3f4f6; transition: background 0.15s;" onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='#fff'">
                                <td style="padding: 1rem 1.25rem;">
                                    <div style="display: flex; align-items: center; gap: 0.875rem;">
                                        @if($page->hero_image)
                                            <img src="{{ Str::startsWith($page->hero_image, 'http') ? $page->hero_image : asset($page->hero_image) }}" alt="" style="width: 44px; height: 44px; border-radius: 8px; object-fit: cover; border: 1px solid #e5e7eb; flex-shrink: 0;">
                                        @else
                                            <div style="width: 44px; height: 44px; border-radius: 8px; background: #eaf4eb; color: #397b4e; display: inline-flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0;">
                                                <i class="fa-solid fa-globe"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <strong style="color: #111827; font-size: 0.95rem; display: block;">{{ $page->title }}</strong>
                                            <span style="font-family: monospace; font-size: 0.75rem; color: #6b7280;">/web/{{ $page->slug }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td style="padding: 1rem 1.25rem;">
                                    <span style="display: inline-flex; align-items: center; padding: 0.25rem 0.65rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; background: #e0e7ff; color: #3730a3;">
                                        {{ ucfirst($page->category ?: 'Marketing') }}
                                    </span>
                                </td>
                                <td style="padding: 1rem 1.25rem; text-align: center;">
                                    <span style="display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 28px; border-radius: 50%; background: #f3f4f6; font-weight: 700; color: #374151; font-size: 0.8rem;">
                                        {{ $page->sections_count ?? $page->sections()->count() }}
                                    </span>
                                </td>
                                <td style="padding: 1rem 1.25rem;">
                                    @if($page->is_published)
                                        <span style="display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.25rem 0.65rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; background: #ecfdf5; color: #047857;">
                                            <span style="width: 6px; height: 6px; border-radius: 50%; background: #10b981;"></span> Published
                                        </span>
                                    @else
                                        <span style="display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.25rem 0.65rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; background: #f3f4f6; color: #6b7280;">
                                            <span style="width: 6px; height: 6px; border-radius: 50%; background: #9ca3af;"></span> Draft
                                        </span>
                                    @endif
                                </td>
                                <td style="padding: 1rem 1.25rem; color: #6b7280; font-size: 0.8rem;">
                                    {{ $page->updated_at ? $page->updated_at->format('M d, Y') : '-' }}
                                </td>
                                <td style="padding: 1rem 1.25rem; text-align: right;">
                                    <div style="display: inline-flex; align-items: center; gap: 0.5rem;">
                                        <a href="{{ route('web-pages.show', $page->slug) }}" target="_blank" rel="noopener" style="padding: 0.4rem 0.75rem; border-radius: 0.375rem; background: #f3f4f6; color: #374151; font-size: 0.75rem; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem; border: 1px solid #d1d5db;">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i> View
                                        </a>
                                        <a href="{{ route('admin.web-pages.edit', $page->id) }}" style="padding: 0.4rem 0.75rem; border-radius: 0.375rem; background: #eef2ff; color: #4338ca; font-size: 0.75rem; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem; border: 1px solid #c7d2fe;">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.web-pages.destroy', $page->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this web page? This cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="padding: 0.4rem 0.75rem; border-radius: 0.375rem; background: #fee2e2; color: #991b1b; font-size: 0.75rem; font-weight: 600; border: 1px solid #fecaca; cursor: pointer; display: inline-flex; align-items: center; gap: 0.35rem;">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
