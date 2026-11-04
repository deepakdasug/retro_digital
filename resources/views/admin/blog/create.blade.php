@extends('layouts.admin')

@php
    $post = $post ?? null;
@endphp

@section('title', ($post ? 'Edit' : 'Create') . ' Blog Post - Admin')
@section('page_heading', $post ? 'Edit Blog Article' : 'Create Blog Article')

@section('admin-content')
<style>
    /* Custom Styling for the Admin Form */
    .admin-container { max-width: 1000px; margin: 20px auto 40px; padding: 0 10px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    .admin-card { background: #ffffff; border-radius: 14px; box-shadow: 0 4px 20px rgba(0,0,0,0.04); padding: 36px; border: 1px solid #e2e8e3; }
    .admin-title { font-size: 22px; font-weight: 750; color: #162a1c; margin-bottom: 26px; border-bottom: 2px solid #eef3ef; padding-bottom: 14px; }

    .form-group { margin-bottom: 24px; }
    .form-label { display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px; font-size: 14px; }
    .form-control { width: 100%; padding: 12px 16px; border: 1px solid #cbd5e0; border-radius: 8px; font-size: 15px; transition: all 0.2s; box-sizing: border-box; background: #f9fafb; }
    .form-control:focus { outline: none; border-color: #4299e1; background: #fff; box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15); }

    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; }

    /* Section Headers */
    .section-header { font-size: 18px; font-weight: 700; color: #2d3748; margin: 40px 0 20px; padding-bottom: 10px; border-bottom: 1px solid #edf2f7; display: flex; align-items: center; gap: 8px; }
    .section-header.first { margin-top: 0; }

    .blog-editor-field { min-height: 420px; }
    .ck.ck-editor { width: 100%; }
    .ck.ck-toolbar { border-color: #d8e5dc; background: #f4f8f5; }
    .ck.ck-button.ck-on, .ck.ck-button:not(.ck-disabled):hover { color: #2f754a; }
    .ck.ck-editor__editable_inline { min-height: 360px; border-color: #cbd5e0; background: #fff; color: #24382b; }
    .ck.ck-editor__editable_inline:focus { border-color: #398158; box-shadow: 0 0 0 3px rgba(57, 129, 88, .12); }

    .btn-submit { width: 100%; background: #2563eb; color: white; padding: 16px; border: none; border-radius: 8px; font-size: 16px; font-weight: 700; cursor: pointer; margin-top: 30px; transition: background 0.2s; }
    .btn-submit:hover { background: #1d4ed8; }

    .error-box { background: #fff5f5; border-left: 4px solid #fc8181; padding: 15px; border-radius: 4px; margin-bottom: 25px; color: #c53030; }

    .admin-form-topbar { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin-bottom: 22px; }
    .admin-form-back-link { display: inline-flex; align-items: center; gap: 0.5rem; color: #295337; background: #edf5ef; border: 1px solid #d4e4d6; padding: 0.5rem 0.95rem; border-radius: 8px; font-weight: 650; font-size: 0.85rem; text-decoration: none; transition: all 0.2s ease; }
    .admin-form-back-link:hover { background: #e0eee2; border-color: #398158; color: #153320; }

    #btnAddFaq:hover { background: #115e59 !important; }
    .btn-remove-faq:hover { background: #fee2e2 !important; border-color: #f87171 !important; color: #b91c1c !important; }
    @keyframes faqFadeIn { from { opacity: 0; transform: translateY(-6px); } to { opacity: 1; transform: translateY(0); } }

    @media (max-width: 768px) {
        .grid-2, .grid-3 { grid-template-columns: 1fr; }
        .admin-form-topbar { align-items: flex-start; flex-direction: column; }
    }
</style>

<div class="admin-container">
    <div class="admin-card">

        <!-- Top Bar -->
        <div class="admin-form-topbar">
            <a class="admin-form-back-link" href="{{ route('admin.dashboard', ['tab' => 'blogs']) }}">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                <span>Back to Blog Articles</span>
            </a>
            <span style="font-size: 0.82rem; color: #64748b; font-weight: 600;">
                <i class="fa-regular fa-clock"></i> Auto-saving disabled
            </span>
        </div>

        <h1 class="admin-title">✍️ {{ $post ? 'Edit Blog Post' : 'Create New Blog Post' }}</h1>

        @if ($errors->any())
            <div class="error-box">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- MAIN FORM STARTS HERE -->
        <form action="{{ $post ? route('admin.blog.update', $post) : route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" id="blogForm">
            @csrf
            @if ($post)
                @method('PUT')
            @endif

            <!-- ================= SECTION: AUTHOR & TAXONOMY ================= -->
            <div class="section-header first"><i class="fa-solid fa-user-pen"></i> Author & Organization</div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Author</label>
                    <div class="form-control" style="display:flex; align-items:center; background:#f3f4f6; color:#374151; min-height:48px;">{{ old('author_name', $post?->author_name ?? auth()->user()->name) }}</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Role / Position</label>
                    <div class="form-control" style="display:flex; align-items:center; background:#f3f4f6; color:#374151; min-height:48px;">{{ old('author_designation', $post?->author_designation ?? auth()->user()->designation ?? 'Admin') ?: 'Admin' }}</div>
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Category (Optional)</label>
                    <input type="text" name="category" value="{{ old('category', $post?->category) }}" class="form-control" placeholder="e.g. Technology">
                </div>
                <div class="form-group">
                    <label class="form-label">Tags (Comma Separated)</label>
                    <input type="text" name="tags" value="{{ old('tags', $post && is_array($post->tags) ? implode(', ', $post->tags) : '') }}" class="form-control" placeholder="tech, coding, laravel">
                </div>
            </div>

            <!-- ================= SECTION: SEO & METADATA ================= -->
            <div class="section-header"><i class="fa-solid fa-magnifying-glass"></i> SEO & Technical Meta</div>

            <div class="form-group">
                <label class="form-label">Meta Title (Optional)</label>
                <input type="text" name="meta_title" value="{{ old('meta_title', $post?->meta_title) }}" class="form-control" placeholder="SEO Title (Defaults to Main Headline if empty)">
            </div>

            <div class="form-group">
                <label class="form-label">Meta Description (Optional)</label>
                <textarea name="meta_description" rows="2" class="form-control" placeholder="Search engine summary (max 160 characters)...">{{ old('meta_description', $post?->meta_description) }}</textarea>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Focus Keyword</label>
                    <input type="text" name="focus_keyword" value="{{ old('focus_keyword', $post?->focus_keyword) }}" class="form-control" placeholder="e.g. IT asset management">
                </div>
                <div class="form-group">
                    <label class="form-label">Canonical URL</label>
                    <input type="url" name="canonical_url" value="{{ old('canonical_url', $post?->canonical_url) }}" class="form-control" placeholder="https://...">
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Robots Meta</label>
                    <select name="robots_meta" class="form-control">
                        <option value="index, follow" @selected(old('robots_meta', $post?->robots_meta) == 'index, follow')>index, follow (Default)</option>
                        <option value="noindex, follow" @selected(old('robots_meta', $post?->robots_meta) == 'noindex, follow')>noindex, follow</option>
                        <option value="index, nofollow" @selected(old('robots_meta', $post?->robots_meta) == 'index, nofollow')>index, nofollow</option>
                        <option value="noindex, nofollow" @selected(old('robots_meta', $post?->robots_meta) == 'noindex, nofollow')>noindex, nofollow</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Schema Markup (JSON-LD)</label>
                    <textarea name="schema_markup" rows="1" class="form-control" placeholder='{"@@context": "https://schema.org" ...}'>{{ old('schema_markup', $post?->schema_markup ? json_encode($post->schema_markup) : '') }}</textarea>
                </div>
            </div>

            <!-- ================= SECTION: BASIC CONTENT ================= -->
            <div class="section-header"><i class="fa-solid fa-file-lines"></i> Main Content</div>

            <div class="form-group">
                <label class="form-label">Main Headline *</label>
                <input type="text" name="title" id="titleInput" value="{{ old('title', $post?->title) }}" class="form-control" style="font-size: 20px; font-weight: bold;" placeholder="Enter a catchy title..." required>
            </div>

            <div class="form-group">
                <label class="form-label">Slug (URL) *</label>
                <input type="text" name="slug" id="slugInput" value="{{ old('slug', $post?->slug) }}" class="form-control" placeholder="auto-generated-if-empty" required>
                <small style="color: #718096;">Leave as is or customize the URL part (e.g., <code>my-awesome-post</code>).</small>
            </div>

            <div class="form-group">
                <label class="form-label">Short Excerpt (Shown on the blog list) *</label>
                <textarea name="excerpt" rows="2" class="form-control" placeholder="A brief summary of the article..." required>{{ old('excerpt', $post?->excerpt) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Featured Image (Main Thumbnail)</label>
                <input type="file" name="image" class="form-control" style="padding: 10px;">
                @if ($post && $post->image_path)
                    <img src="{{ Storage::url($post->image_path) }}" alt="Current featured image" style="display:block; max-width:240px; max-height:140px; object-fit:cover; margin-top:12px; border-radius:8px;">
                    <small style="color: #38a169;">Choose a new image to replace the current one.</small>
                @endif
            </div>

            <div class="form-group">
                <label class="form-label" for="blogContent">Article Content *</label>
                <textarea id="blogContent" name="content_blocks" class="form-control blog-editor-field"
                    data-upload-url="{{ route('admin.blog.upload_media') }}"
                    data-csrf-token="{{ csrf_token() }}"
                    placeholder="Write your article content here...">{{ old('content_blocks', $post?->content_html ?? '') }}</textarea>
            </div>

            <!-- ================= SECTION: DYNAMIC FAQS ================= -->
            <div class="section-header"><i class="fa-solid fa-circle-question"></i> Frequently Asked Questions (FAQs)</div>
            <p style="color: #64748b; font-size: 14px; margin-top: -10px; margin-bottom: 18px;">
                Add FAQs specific to this blog post to improve user clarity and boost search engine rich results.
            </p>

            @php
                $currentFaqs = old('faqs', isset($faqs) && count($faqs) ? $faqs->map(fn($f) => [
                    'id' => $f->id ?? null,
                    'question' => $f->question ?? '',
                    'answer' => $f->answer ?? '',
                    'order' => $f->order ?? 0,
                ])->toArray() : ($post && $post->relationLoaded('faqs') ? $post->faqs->map(fn($f) => [
                    'id' => $f->id,
                    'question' => $f->question,
                    'answer' => $f->answer,
                    'order' => $f->order,
                ])->toArray() : []));
            @endphp

            <div id="noFaqsBox" style="text-align: center; padding: 28px 16px; background: #f8fafc; border: 2px dashed #cbd5e1; border-radius: 10px; margin-bottom: 16px; {{ count($currentFaqs) ? 'display: none;' : '' }}">
                <i class="fa-regular fa-comments" style="font-size: 28px; color: #94a3b8; margin-bottom: 8px; display: block;"></i>
                <p style="margin: 0 0 4px 0; font-weight: 600; color: #475569; font-size: 14px;">No FAQs attached yet</p>
                <p style="margin: 0; color: #94a3b8; font-size: 13px;">Click &ldquo;Add FAQ&rdquo; to attach questions and answers to this blog.</p>
            </div>

            <div id="faqsList" style="display: flex; flex-direction: column; gap: 16px; margin-bottom: 16px;">
                @foreach ($currentFaqs as $index => $faq)
                    <div class="faq-item" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 18px; position: relative; animation: faqFadeIn 0.2s ease-in;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; border-bottom: 1px dashed #cbd5e1; padding-bottom: 10px;">
                            <span class="faq-badge" style="display: inline-flex; align-items: center; gap: 6px; font-weight: 700; font-size: 13px; color: #2563eb; background: #eff6ff; padding: 4px 10px; border-radius: 6px; border: 1px solid #dbeafe;">
                                <i class="fa-solid fa-circle-question"></i> FAQ #<span class="faq-index-label">{{ $loop->iteration }}</span>
                            </span>
                            <button type="button" class="btn-remove-faq" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; border-radius: 6px; padding: 6px 12px; font-size: 13px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s;" title="Remove this FAQ">
                                <i class="fa-solid fa-trash-can"></i> Remove
                            </button>
                        </div>

                        <input type="hidden" name="faqs[{{ $index }}][id]" value="{{ $faq['id'] ?? '' }}" class="faq-input-id">
                        <input type="hidden" name="faqs[{{ $index }}][order]" value="{{ $faq['order'] ?? $loop->iteration }}" class="faq-input-order">

                        <div class="form-group" style="margin-bottom: 14px;">
                            <label class="form-label" style="font-size: 13px;">Question</label>
                            <input type="text" name="faqs[{{ $index }}][question]" value="{{ $faq['question'] ?? '' }}" class="form-control faq-input-question" placeholder="e.g., Why is IT asset disposition necessary?" style="background: #ffffff;">
                        </div>

                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label" style="font-size: 13px;">Answer</label>
                            <textarea name="faqs[{{ $index }}][answer]" rows="3" class="form-control faq-input-answer" placeholder="Enter clear, helpful answer here..." style="background: #ffffff;">{{ $faq['answer'] ?? '' }}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>

            <div style="margin-bottom: 24px;">
                <button type="button" id="btnAddFaq" style="display: inline-flex; align-items: center; gap: 8px; background: #0f766e; color: #ffffff; padding: 10px 18px; border: none; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; transition: background 0.2s;">
                    <i class="fa-solid fa-plus"></i> Add FAQ
                </button>
            </div>

            <div class="grid-2">
                <div class="form-group" style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
                    <input type="checkbox" name="is_published" value="1" id="publish" style="width: 20px; height: 20px; cursor: pointer;" @checked(old('is_published', $post?->is_published ?? false))>
                    <label for="publish" style="font-weight: 600; color: #2d3748; cursor: pointer; margin: 0;">Publish post</label>
                </div>
                <div class="form-group" style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
                    <input type="checkbox" name="comment_status" value="1" id="comments" style="width: 20px; height: 20px; cursor: pointer;" @checked(old('comment_status', $post?->comment_status ?? true))>
                    <label for="comments" style="font-weight: 600; color: #2d3748; cursor: pointer; margin: 0;">Allow Comments</label>
                </div>
            </div>

            <button type="submit" class="btn-submit"><i class="fa-solid fa-floppy-disk" aria-hidden="true"></i> {{ $post ? 'Save Changes' : 'Save Blog Post' }}</button>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/ckeditor5/ckeditor5.css') }}">
<style>
    .ck-menubar { border-bottom: 1px solid #e2e8f0; background: #f8fafc; }
    .ck.ck-editor__editable_inline { min-height: 420px; }
    .ck-editor--fullscreen { position: fixed !important; top: 0 !important; left: 0 !important; width: 100vw !important; height: 100vh !important; z-index: 999999 !important; display: flex !important; flex-direction: column !important; background: #ffffff !important; border-radius: 0 !important; box-sizing: border-box !important; }
    .ck-editor--fullscreen .ck-editor__top { position: sticky !important; top: 0 !important; z-index: 10 !important; }
    .ck-editor--fullscreen .ck-editor__main { flex: 1 1 auto !important; overflow-y: auto !important; height: calc(100vh - 120px) !important; background: #f9fafb; padding: 24px 0; }
    .ck-editor--fullscreen .ck-editor__editable_inline { min-height: 100% !important; max-width: 960px !important; margin: 0 auto !important; box-shadow: 0 4px 20px rgba(0,0,0,0.06); border: 1px solid #e2e8f0; border-radius: 8px; padding: 30px !important; }
    body.ck-editor-fullscreen-active { overflow: hidden !important; }
</style>
@endpush

@push('scripts')
<script src="{{ asset('vendor/ckeditor5/ckeditor5.umd.js') }}"></script>
<script src="{{ asset('js/blog-editor.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const titleInput = document.getElementById('titleInput');
        const slugInput = document.getElementById('slugInput');
        const isEditing = @json((bool) $post);
        let slugEdited = false;

        if (slugInput) {
            slugInput.addEventListener('input', function () {
                slugEdited = true;
            });
        }

        if (titleInput && slugInput) {
            titleInput.addEventListener('input', function () {
                if (!slugEdited && !isEditing) {
                    slugInput.value = this.value
                        .toLowerCase()
                        .replace(/[^a-z0-9]+/g, '-')
                        .replace(/(^-|-$)+/g, '');
                }
            });
        }

        // ================= FAQ DYNAMIC HANDLER =================
        const faqsContainer = document.getElementById('faqsList');
        const btnAddFaq = document.getElementById('btnAddFaq');
        const noFaqsBox = document.getElementById('noFaqsBox');

        function updateFaqIndexes() {
            if (!faqsContainer) return;
            const items = faqsContainer.querySelectorAll('.faq-item');

            if (noFaqsBox) {
                noFaqsBox.style.display = items.length === 0 ? 'block' : 'none';
            }

            items.forEach((item, index) => {
                const label = item.querySelector('.faq-index-label');
                if (label) label.textContent = index + 1;

                const idInput = item.querySelector('.faq-input-id');
                if (idInput) idInput.name = `faqs[${index}][id]`;

                const orderInput = item.querySelector('.faq-input-order');
                if (orderInput) {
                    orderInput.name = `faqs[${index}][order]`;
                    orderInput.value = index + 1;
                }

                const qInput = item.querySelector('.faq-input-question');
                if (qInput) qInput.name = `faqs[${index}][question]`;

                const aInput = item.querySelector('.faq-input-answer');
                if (aInput) aInput.name = `faqs[${index}][answer]`;
            });
        }

        function createFaqBlock(data = {}) {
            if (!faqsContainer) return;
            const index = faqsContainer.querySelectorAll('.faq-item').length;
            const block = document.createElement('div');
            block.className = 'faq-item';
            block.style.cssText = 'background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 18px; position: relative; animation: faqFadeIn 0.2s ease-in;';

            block.innerHTML = `
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; border-bottom: 1px dashed #cbd5e1; padding-bottom: 10px;">
                    <span class="faq-badge" style="display: inline-flex; align-items: center; gap: 6px; font-weight: 700; font-size: 13px; color: #2563eb; background: #eff6ff; padding: 4px 10px; border-radius: 6px; border: 1px solid #dbeafe;">
                        <i class="fa-solid fa-circle-question"></i> FAQ #<span class="faq-index-label">${index + 1}</span>
                    </span>
                    <button type="button" class="btn-remove-faq" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; border-radius: 6px; padding: 6px 12px; font-size: 13px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s;" title="Remove this FAQ">
                        <i class="fa-solid fa-trash-can"></i> Remove
                    </button>
                </div>

                <input type="hidden" name="faqs[${index}][id]" value="${data.id || ''}" class="faq-input-id">
                <input type="hidden" name="faqs[${index}][order]" value="${data.order || (index + 1)}" class="faq-input-order">

                <div class="form-group" style="margin-bottom: 14px;">
                    <label class="form-label" style="font-size: 13px;">Question</label>
                    <input type="text" name="faqs[${index}][question]" value="" class="form-control faq-input-question" placeholder="e.g., Why is IT asset disposition necessary?" style="background: #ffffff;">
                </div>

                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label" style="font-size: 13px;">Answer</label>
                    <textarea name="faqs[${index}][answer]" rows="3" class="form-control faq-input-answer" placeholder="Enter clear, helpful answer here..." style="background: #ffffff;"></textarea>
                </div>
            `;

            if (data.question) {
                block.querySelector('.faq-input-question').value = data.question;
            }
            if (data.answer) {
                block.querySelector('.faq-input-answer').value = data.answer;
            }

            block.querySelector('.btn-remove-faq').addEventListener('click', function () {
                block.remove();
                updateFaqIndexes();
            });

            faqsContainer.appendChild(block);
            updateFaqIndexes();

            const questionInput = block.querySelector('.faq-input-question');
            if (questionInput) {
                questionInput.focus();
            }
        }

        // Attach click listeners to server-rendered remove buttons
        if (faqsContainer) {
            faqsContainer.querySelectorAll('.btn-remove-faq').forEach(btn => {
                btn.addEventListener('click', function () {
                    const item = btn.closest('.faq-item');
                    if (item) {
                        item.remove();
                        updateFaqIndexes();
                    }
                });
            });
        }

        if (btnAddFaq) {
            btnAddFaq.addEventListener('click', function () {
                createFaqBlock();
            });
        }
    });
</script>
@endpush