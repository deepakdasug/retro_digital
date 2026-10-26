@extends('layouts.app')

@section('content')
@php($post = $post ?? null)
<style>
    /* Custom Styling for the Admin Form */
    .admin-container { max-width: 900px; margin: 40px auto; padding: 0 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    .admin-card { background: #ffffff; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); padding: 40px; border: 1px solid #eaeaea; }
    .admin-title { font-size: 24px; font-weight: 700; color: #1a1a1a; margin-bottom: 30px; border-bottom: 2px solid #f0f0f0; padding-bottom: 15px; }
    
    .form-group { margin-bottom: 24px; }
    .form-label { display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px; font-size: 14px; }
    .form-control { width: 100%; padding: 12px 16px; border: 1px solid #cbd5e0; border-radius: 8px; font-size: 15px; transition: all 0.2s; box-sizing: border-box; background: #f9fafb; }
    .form-control:focus { outline: none; border-color: #4299e1; background: #fff; box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15); }
    
    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .blog-editor-field { min-height: 420px; }
    textarea.blog-editor-field { resize: vertical; }
    .editor-fallback-message { display: block; margin-top: 8px; color: #647568; }
    .editor-fallback-message[hidden] { display: none; }
    .ck.ck-editor { width: 100%; }
    .ck-editor-loading { display: flex; align-items: flex-start; padding: 16px; border: 1px solid #cbd5e0; border-radius: 8px; background: #f9fafb; color: #647568; }
    .ck-editor-loading[hidden] { display: none; }
    .ck.ck-toolbar { border-color: #d8e5dc; background: #f4f8f5; }
    .ck.ck-button.ck-on, .ck.ck-button:not(.ck-disabled):hover { color: #2f754a; }
    .ck.ck-editor__editable_inline { min-height: 360px; border-color: #cbd5e0; background: #fff; color: #24382b; }
    .ck.ck-editor__editable_inline:focus { border-color: #398158; box-shadow: 0 0 0 3px rgba(57, 129, 88, .12); }
    
    .btn-submit { width: 100%; background: #2563eb; color: white; padding: 16px; border: none; border-radius: 8px; font-size: 16px; font-weight: 700; cursor: pointer; margin-top: 30px; transition: background 0.2s; }
    .btn-submit:hover { background: #1d4ed8; }
    
    .error-box { background: #fff5f5; border-left: 4px solid #fc8181; padding: 15px; border-radius: 4px; margin-bottom: 25px; color: #c53030; }
    
    .admin-form-topbar { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin-bottom: 22px; }
    .admin-form-topbar a { color: #397b4e; font-weight: 600; text-decoration: none; }
    .admin-form-topbar button { background: #a83b3b; color: #fff; border: 0; border-radius: 6px; padding: 9px 14px; cursor: pointer; }
    
    @media (max-width: 560px) { 
        .grid-2 { grid-template-columns: 1fr; } 
        .admin-form-topbar { align-items: flex-start; flex-direction: column; } 
    }
</style>

<div class="admin-container">
    <div class="admin-card">
        
        <!-- Top Bar (Back button and Logout) -->
        <div class="admin-form-topbar">
            <a class="icon-label-control" href="{{ route('admin.dashboard', ['tab' => 'blogs']) }}"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i><span>Back to dashboard</span></a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="icon-label-control"><i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i><span>Log out</span></button>
            </form>
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
            @if($post)
                @method('PUT')
            @endif

            <!-- Author Info -->
            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Author Name *</label>
                    <input type="text" name="author_name" value="{{ old('author_name', $post?->author_name ?? auth()->user()->name) }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Role / Position (Optional)</label>
                    <input type="text" name="author_designation" value="{{ old('author_designation', $post?->author_designation) }}" class="form-control" placeholder="e.g. IT Asset Specialist">
                </div>
            </div>

            <!-- Main Blog Info -->
            <div class="form-group">
                <label class="form-label">Main Headline *</label>
                <input type="text" name="title" value="{{ old('title', $post?->title) }}" class="form-control" style="font-size: 20px; font-weight: bold;" placeholder="Enter a catchy title..." required>
            </div>

            <div class="form-group">
                <label class="form-label">Short Excerpt (Shown on the blog list) *</label>
                <textarea name="excerpt" rows="2" class="form-control" placeholder="A brief summary of the article..." required>{{ old('excerpt', $post?->excerpt) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Featured Image (Main Thumbnail)</label>
                <input type="file" name="image" class="form-control" style="padding: 10px;">
                @if($post?->image_path)
                    <img src="{{ Storage::url($post->image_path) }}" alt="Current featured image" style="display:block; max-width:240px; max-height:140px; object-fit:cover; margin-top:12px; border-radius:8px;">
                    <small style="color: #38a169;">Choose a new image to replace the current one.</small>
                @endif
            </div>

            <div class="form-group">
                <label class="form-label" for="blogContent">Article Content *</label>
                <textarea id="blogContent" name="content" class="form-control blog-editor-field"
                    data-upload-url="{{ route('admin.blog.upload_media') }}"
                    data-csrf-token="{{ csrf_token() }}"
                    placeholder="Write your article content here...">{{ old('content', $post?->content_html ?? '') }}</textarea>
            </div>

            <!-- Publishing -->
            <div class="form-group" style="margin-top: 30px; display: flex; align-items: center; gap: 10px;">
                <input type="checkbox" name="is_published" value="1" id="publish" style="width: 20px; height: 20px; cursor: pointer;" @checked(old('is_published', $post?->is_published ?? false))>
                <label for="publish" style="font-weight: 600; color: #2d3748; cursor: pointer;">Publish post</label>
            </div>

            <button type="submit" class="btn-submit"><i class="fa-solid fa-floppy-disk" aria-hidden="true"></i> {{ $post ? 'Save Changes' : 'Save Blog Post' }}</button>
        </form>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/ckeditor5/ckeditor5.css') }}">
<style>
    .ck-menubar {
        border-bottom: 1px solid #e2e8f0;
        background: #f8fafc;
    }
    .ck.ck-editor__editable_inline {
        min-height: 420px;
    }
    /* Fullscreen editor support */
    .ck-editor--fullscreen {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        width: 100vw !important;
        height: 100vh !important;
        z-index: 999999 !important;
        display: flex !important;
        flex-direction: column !important;
        background: #ffffff !important;
        border-radius: 0 !important;
        box-sizing: border-box !important;
    }
    .ck-editor--fullscreen .ck-editor__top {
        position: sticky !important;
        top: 0 !important;
        z-index: 10 !important;
    }
    .ck-editor--fullscreen .ck-editor__main {
        flex: 1 1 auto !important;
        overflow-y: auto !important;
        height: calc(100vh - 120px) !important;
        background: #f9fafb;
        padding: 24px 0;
    }
    .ck-editor--fullscreen .ck-editor__editable_inline {
        min-height: 100% !important;
        max-width: 960px !important;
        margin: 0 auto !important;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 30px !important;
    }
    body.ck-editor-fullscreen-active {
        overflow: hidden !important;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('vendor/ckeditor5/ckeditor5.umd.js') }}"></script>
<script src="{{ asset('js/blog-editor.js') }}"></script>
@endpush
@endsection
