@extends('layouts.admin')

@section('title', 'FAQs - Retrotech Admin')
@section('page_heading', 'FAQs')

@section('admin-content')
    <div style="max-width: 1100px; margin: 0 auto;">
        <div class="admin-section-heading admin-blog-section-heading" style="margin-bottom: 2rem;">
            <div>
                <span class="admin-section-eyebrow">HELP CENTER CONTENT</span>
                <h2>Frequently Asked Questions</h2>
                <p>Manage answers to common questions shown to your website visitors.</p>
            </div>
            <a href="{{ route('admin.faqs.create') }}" class="admin-action-button" style="text-decoration: none;">
                <i class="fa-solid fa-plus" aria-hidden="true"></i> Add FAQ
            </a>
        </div>

        <div class="admin-table-scroll">
            <table class="admin-data-table">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($faqs as $faq)
                        <tr>
                            <td><strong>{{ $faq->question }}</strong></td>
                            <td><span class="admin-service-tag">{{ $faq->category ?: 'Uncategorized' }}</span></td>
                            <td>
                                <span class="admin-status-badge {{ $faq->is_published ? '' : 'is-draft' }}">
                                    <span></span>{{ $faq->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td>
                                <strong class="admin-date-primary">{{ $faq->updated_at?->format('M d, Y') ?? '—' }}</strong>
                                <span class="admin-date-secondary">{{ $faq->updated_at?->diffForHumans() }}</span>
                            </td>
                            <td>
                                <div class="admin-row-actions">
                                    <a href="{{ route('admin.faqs.edit', $faq) }}" class="admin-secondary-button" aria-label="Edit FAQ: {{ $faq->question }}" title="Edit FAQ">
                                        <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>Edit
                                    </a>
                                    <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" onsubmit="return confirm('Delete this FAQ? This cannot be undone.');" style="display:inline-block; margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-delete-button" aria-label="Delete FAQ: {{ $faq->question }}" title="Delete FAQ">
                                            <i class="fa-regular fa-trash-can" aria-hidden="true"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="admin-table-empty">
                                <span class="admin-empty-icon"><i class="fa-regular fa-circle-question"></i></span>
                                <strong>No FAQs yet</strong>
                                <span>Select “Add FAQ” to create your first answer.</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 1.5rem;">{{ $faqs->links() }}</div>
    </div>
@endsection
