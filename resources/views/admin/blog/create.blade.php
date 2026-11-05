@extends('layouts.admin')

@php
    $post = $post ?? null;
@endphp

@section('title', ($post ? 'Edit' : 'Create') . ' Blog Post - Admin')
@section('page_heading', $post ? 'Edit Blog Article' : 'Create Blog Article')

@section('admin-content')
<style>
    /* Custom Styling for the Admin Form */
    .admin-container { max-width: 800px; margin: 8px auto 16px; padding: 0 10px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    .admin-card { padding: 10px 14px; background: #ffffff; border: 1px solid #dfe9e1; border-radius: 10px; box-shadow: 0 4px 12px rgba(24, 55, 34, 0.04); }
    .admin-form-heading { padding: 0 0 7px; margin-bottom: 5px; border-bottom: 1px solid #e8efe9; }
    .admin-title { font-size: 18px; line-height: 1.2; font-weight: 750; color: #162a1c; margin: 0; }
    .admin-form-subtitle { color: #647568; font-size: 11px; line-height: 1.35; margin: 3px 0 0; }

    .form-group { margin-bottom: 5px; min-width: 0; }
    .form-label { display: block; font-weight: 600; color: #4a5568; margin-bottom: 2px; font-size: 10px; }
    .form-control { width: 100%; height: 30px; min-height: 30px; padding: 4px 7px; border: 1px solid #ceded1; border-radius: 5px; font-size: 12px; line-height: 1.2; transition: all 0.2s; box-sizing: border-box; background: #ffffff; }
    input.form-control, select.form-control, div.form-control { height: 30px; min-height: 30px; }
    textarea.form-control { height: auto; min-height: 48px; padding: 6px 7px; line-height: 1.35; resize: vertical; }
    .form-control:focus { outline: none; border-color: #398158; background: #fff; box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.13); }

    .grid-2 { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 0 12px; }
    .grid-3 { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 12px; }

    .form-section { padding: 6px 8px 1px; margin: 0 0 5px; scroll-margin-top: 12px; border: 1px solid #dcebe0; border-left: 3px solid #62a976; border-radius: 7px; background: linear-gradient(110deg, #f8fcf8 0%, #ffffff 78%); box-shadow: 0 2px 6px rgba(24, 55, 34, 0.03); }
    .form-section:hover { border-color: #c7dfcc; border-left-color: #398158; box-shadow: 0 3px 9px rgba(24, 55, 34, 0.055); }
    .section-header { display: flex; align-items: center; gap: 7px; margin: 0 0 5px; padding: 3px 5px; border: 0; border-bottom: 1px solid #e5efe7; border-radius: 4px; background: linear-gradient(90deg, #eaf5ec 0%, #f6faf6 100%); }
    .section-icon { width: 22px; height: 22px; flex: 0 0 22px; display: inline-flex; align-items: center; justify-content: center; color: #ffffff; background: linear-gradient(145deg, #438b59, #2f754a); border: 0; border-radius: 6px; font-size: 9px; box-shadow: 0 2px 5px rgba(47, 117, 74, 0.2); }
    .section-title { margin: 0; color: #203b29; font-size: 13px; line-height: 1.2; font-weight: 750; }
    .section-description { margin: 1px 0 0; color: #718075; font-size: 10px; line-height: 1.25; }

    .blog-editor-field { height: auto; min-height: 280px; }
    .ck.ck-editor { width: 100%; }
    .ck.ck-toolbar { border-color: #d8e5dc; background: #f4f8f5; }
    .ck.ck-button.ck-on, .ck.ck-button:not(.ck-disabled):hover { color: #2f754a; }
    .ck.ck-editor__editable_inline { min-height: 280px; border-color: #cbd5e0; background: #fff; color: #24382b; }
    .ck.ck-editor__editable_inline:focus { border-color: #398158; box-shadow: 0 0 0 3px rgba(57, 129, 88, .12); }
    #article-section { height: auto; min-height: 0; padding-bottom: 8px; display: flex; flex-direction: column; }
    #article-section > .article-editor-group { display: flex; flex: 0 0 auto; flex-direction: column; min-height: 0; margin-bottom: 0; }
    #article-section .ck.ck-editor { display: flex; flex: 0 0 auto; flex-direction: column; min-height: 0; }
    #article-section .ck-editor__top { flex: 0 0 auto; }
    #article-section .ck-editor__main { display: flex; flex: 0 0 58.5vh; height: 58.5vh; min-height: 252px; }
    #article-section .ck-editor__editable_inline { flex: 1 1 auto; height: 100%; min-height: 0; overflow-y: auto; }

    .btn-submit { width: 100%; background: #2f754a; color: white; padding: 12px 18px; border: none; border-radius: 9px; font-size: 15px; font-weight: 700; cursor: pointer; margin-top: 0; transition: background 0.2s, transform 0.2s, box-shadow 0.2s; box-shadow: 0 6px 14px rgba(47, 117, 74, 0.2); }
    .btn-submit:hover { background: #245d39; transform: translateY(-1px); box-shadow: 0 9px 18px rgba(47, 117, 74, 0.25); }

    .error-box { background: #fff5f5; border-left: 4px solid #fc8181; padding: 10px; border-radius: 4px; margin-bottom: 12px; color: #c53030; font-size: 12px; }

    .admin-form-topbar { display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-bottom: 6px; }
    .admin-form-back-link { display: inline-flex; align-items: center; gap: 0.4rem; color: #295337; background: #edf5ef; border: 1px solid #d4e4d6; padding: 0.35rem 0.65rem; border-radius: 7px; font-weight: 650; font-size: 0.75rem; text-decoration: none; transition: all 0.2s ease; }
    .admin-form-back-link:hover { background: #e0eee2; border-color: #398158; color: #153320; }

    #btnAddFaq { padding: 7px 12px !important; border-radius: 6px !important; font-size: 12px !important; }
    #btnAddFaq:hover { background: #115e59 !important; }
    .btn-remove-faq:hover { background: #fee2e2 !important; border-color: #f87171 !important; color: #b91c1c !important; }
    .publishing-options { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 5px; }
    .publishing-option { display: flex; align-items: center; gap: 6px; min-height: 27px; padding: 3px 6px; background: #f3f9f4; border: 1px solid #d8e9dc; border-radius: 5px; }
    .publishing-option input { width: 13px; height: 13px; accent-color: #2f754a; cursor: pointer; }
    .publishing-option label { color: #31483a; font-size: 11px; font-weight: 650; cursor: pointer; }
    .section-jump { display: flex; align-items: baseline; flex-wrap: wrap; gap: 3px 7px; margin: 0 0 4px; padding: 3px 0; color: #68796d; background: transparent; border: 0; border-bottom: 1px solid #e8efe9; border-radius: 0; font-size: 10px; }
    .section-jump-label { color: #45594a; font-weight: 700; }
    .section-jump a { color: #2f754a; font-weight: 650; text-decoration: underline; text-decoration-color: #bed6c3; text-underline-offset: 2px; }
    .section-jump a:hover, .section-jump a:focus-visible { color: #1d4e30; text-decoration-color: currentColor; outline: none; }
    .section-jump-separator { color: #a4b1a7; }
    .faq-item { padding: 7px !important; background: #f7fbf8 !important; border: 1px solid #d8e9dc !important; border-radius: 7px !important; }
    .faq-item > div:first-child { margin-bottom: 5px !important; padding-bottom: 4px !important; }
    .faq-item .form-group { margin-bottom: 5px !important; }
    .faq-item .form-group:last-child { margin-bottom: 0 !important; }
    .faq-item .faq-badge { padding: 3px 7px !important; font-size: 11px !important; }
    #faqsList { gap: 5px !important; margin-bottom: 5px !important; }
    #noFaqsBox { padding: 9px 8px !important; margin-bottom: 6px !important; }
    #noFaqsBox > i { font-size: 16px !important; margin-bottom: 3px !important; }
    .faq-actions { margin: 4px 0 5px; }
    .form-actions { display: flex; justify-content: flex-end; padding: 5px 0 0; }
    .form-actions .btn-submit { width: auto; min-width: 140px; padding: 7px 11px; font-size: 12px; }
    @keyframes faqFadeIn { from { opacity: 0; transform: translateY(-6px); } to { opacity: 1; transform: translateY(0); } }

    @media (max-width: 768px) {
        .grid-2, .grid-3 { grid-template-columns: 1fr; }
        .admin-card { padding: 10px; }
        .admin-form-heading { padding: 0 0 10px; }
        .publishing-options { grid-template-columns: 1fr; }
        .form-actions .btn-submit { min-width: 0; }
        .admin-form-topbar { align-items: flex-start; flex-direction: column; }
    }
    @media (max-width: 560px) {
        .grid-2, .grid-3 { grid-template-columns: 1fr; }
        .section-jump { gap: 4px 7px; padding: 5px 0; }
    }
</style>

<div class="admin-container">
    <div class="admin-card">

        <div class="admin-form-heading">
            <div class="admin-form-topbar">
                <a class="admin-form-back-link" href="{{ route('admin.dashboard', ['tab' => 'blogs']) }}">
                    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                    <span>Back to Blog Articles</span>
                </a>
                <span style="font-size: 0.82rem; color: #64748b; font-weight: 600;">
                    <i class="fa-regular fa-clock"></i> Auto-saving disabled
                </span>
            </div>

            <h1 class="admin-title">{{ $post ? 'Edit Blog Post' : 'Create New Blog Post' }}</h1>
            <p class="admin-form-subtitle">Build a polished article by completing each section below.</p>
        </div>

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

            <nav class="section-jump" aria-label="Jump to form section">
                <span class="section-jump-label">Jump to:</span>
                <a href="#author-section">Author</a><span class="section-jump-separator" aria-hidden="true">·</span>
                <a href="#article-section">Article</a><span class="section-jump-separator" aria-hidden="true">·</span>
                <a href="#faqs-section">FAQs</a><span class="section-jump-separator" aria-hidden="true">·</span>
                <a href="#publishing-section">Publishing</a>
            </nav>

            <section class="form-section" id="author-section" aria-labelledby="author-section-title">
                <div class="section-header">
                    <span class="section-icon"><i class="fa-solid fa-user-pen" aria-hidden="true"></i></span>
                    <div>
                        <h2 class="section-title" id="author-section-title">Author &amp; Organization</h2>
                        <p class="section-description">Set the byline and organize this article for readers.</p>
                    </div>
                </div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Author</label>
                    <div class="form-control" style="display:flex; align-items:center; background:#f3f7f4; color:#374151; min-height:23px;">{{ old('author_name', $post?->author_name ?? auth()->user()->name) }}</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Role / Position</label>
                    <div class="form-control" style="display:flex; align-items:center; background:#f3f7f4; color:#374151; min-height:23px;">{{ old('author_designation', $post?->author_designation ?? auth()->user()->designation ?? 'Admin') ?: 'Admin' }}</div>
                </div>
            </div>

            </section>

            <section class="form-section" id="article-section" aria-labelledby="article-section-title">
                <div class="section-header">
                    <span class="section-icon"><i class="fa-solid fa-heading" aria-hidden="true"></i></span>
                    <div>
                        <h2 class="section-title" id="article-section-title">Article</h2>
                        <p class="section-description">Set the headline, URL, summary, image, and article content.</p>
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

            <div class="form-group">
                <label class="form-label">Main Headline *</label>
                <input type="text" name="title" id="titleInput" value="{{ old('title', $post?->title) }}" class="form-control" style="font-size: 12px; font-weight: bold;" placeholder="Enter a catchy title..." required>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Slug (URL) *</label>
                    <input type="text" name="slug" id="slugInput" value="{{ old('slug', $post?->slug) }}" class="form-control" placeholder="auto-generated-if-empty" required>
                    <small style="color: #718096;">Customize the URL part (e.g., <code>my-awesome-post</code>).</small>
                </div>

                <div class="form-group">
                    <label class="form-label">Featured Image (Main Thumbnail)</label>
                    <input type="file" name="image" class="form-control" style="padding: 4px 6px;">
                    @if ($post && $post->image_path)
                        <img src="{{ Storage::url($post->image_path) }}" alt="Current featured image" style="display:block; max-width:200px; max-height:110px; object-fit:cover; margin-top:8px; border-radius:8px;">
                        <small style="color: #38a169;">Choose a new image to replace the current one.</small>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Short Excerpt (Shown on the blog list) *</label>
                <textarea name="excerpt" rows="3" class="form-control" placeholder="A brief summary of the article..." required>{{ old('excerpt', $post?->excerpt) }}</textarea>
            </div>

            <div class="section-header" style="margin-top: 6px;">
                <span class="section-icon"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></span>
                <div>
                    <h3 class="section-title">Search &amp; Technical Metadata</h3>
                    <p class="section-description">Optional settings for search engines and sharing.</p>
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Meta Title (Optional)</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title', $post?->meta_title) }}" class="form-control" placeholder="Defaults to the headline if empty">
                </div>
                <div class="form-group">
                    <label class="form-label">Focus Keyword</label>
                    <input type="text" name="focus_keyword" value="{{ old('focus_keyword', $post?->focus_keyword) }}" class="form-control" placeholder="e.g. IT asset management">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Meta Description (Optional)</label>
                <textarea name="meta_description" rows="2" class="form-control" placeholder="Search engine summary (max 160 characters)...">{{ old('meta_description', $post?->meta_description) }}</textarea>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Canonical URL</label>
                    <input type="url" name="canonical_url" value="{{ old('canonical_url', $post?->canonical_url) }}" class="form-control" placeholder="https://...">
                </div>
                <div class="form-group">
                    <label class="form-label">Robots Meta</label>
                    <select name="robots_meta" class="form-control">
                        <option value="index, follow" @selected(old('robots_meta', $post?->robots_meta) == 'index, follow')>index, follow (Default)</option>
                        <option value="noindex, follow" @selected(old('robots_meta', $post?->robots_meta) == 'noindex, follow')>noindex, follow</option>
                        <option value="index, nofollow" @selected(old('robots_meta', $post?->robots_meta) == 'index, nofollow')>index, nofollow</option>
                        <option value="noindex, nofollow" @selected(old('robots_meta', $post?->robots_meta) == 'noindex, nofollow')>noindex, nofollow</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Schema Markup (JSON-LD)</label>
                <textarea name="schema_markup" rows="3" class="form-control" placeholder='{"@@context": "https://schema.org" ...}'>{{ old('schema_markup', $post?->schema_markup ? json_encode($post->schema_markup) : '') }}</textarea>
            </div>

            <div class="form-group article-editor-group">
                <label class="form-label" for="blogContent">Article Content *</label>
                <textarea id="blogContent" name="content_blocks" class="form-control blog-editor-field"
                    data-upload-url="{{ route('admin.blog.upload_media') }}"
                    data-csrf-token="{{ csrf_token() }}"
                    placeholder="Write your article content here...">{{ old('content_blocks', $post?->content_html ?? '') }}</textarea>
            </div>
            </section>

            <section class="form-section" id="faqs-section" aria-labelledby="faqs-section-title">
                <div class="section-header">
                    <span class="section-icon"><i class="fa-solid fa-circle-question" aria-hidden="true"></i></span>
                    <div>
                        <h2 class="section-title" id="faqs-section-title">Frequently Asked Questions</h2>
                        <p class="section-description">Answer common reader questions and add useful context to your post.</p>
                    </div>
                </div>

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

            <div class="faq-actions">
                <button type="button" id="btnAddFaq" style="display: inline-flex; align-items: center; gap: 8px; background: #0f766e; color: #ffffff; padding: 10px 18px; border: none; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; transition: background 0.2s;">
                    <i class="fa-solid fa-plus"></i> Add FAQ
                </button>
            </div>
            </section>

            <section class="form-section" id="publishing-section" aria-labelledby="publishing-section-title">
                <div class="section-header">
                    <span class="section-icon"><i class="fa-solid fa-paper-plane" aria-hidden="true"></i></span>
                    <div>
                        <h2 class="section-title" id="publishing-section-title">Publishing &amp; Discussion</h2>
                        <p class="section-description">Choose whether this post is public and if readers can comment.</p>
                    </div>
                </div>
                <div class="publishing-options">
                    <div class="publishing-option">
                        <input type="checkbox" name="is_published" value="1" id="publish" @checked(old('is_published', $post?->is_published ?? false))>
                        <label for="publish">Publish this post</label>
                    </div>
                    <div class="publishing-option">
                        <input type="checkbox" name="comment_status" value="1" id="comments" @checked(old('comment_status', $post?->comment_status ?? true))>
                        <label for="comments">Allow reader comments</label>
                    </div>
                </div>
            </section>

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <i class="fa-solid fa-floppy-disk" aria-hidden="true"></i> {{ $post ? 'Save Changes' : 'Save Blog Post' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/ckeditor5/ckeditor5.css') }}">
<style>
    .ck-menubar { border-bottom: 1px solid #e2e8f0; background: #f8fafc; }
    #article-section .ck.ck-editor__editable_inline { min-height: 0; }
    textarea.blog-editor-field { height: auto; min-height: 0; }
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