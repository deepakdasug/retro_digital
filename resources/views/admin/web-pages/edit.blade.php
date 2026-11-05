@extends('layouts.admin')

@section('title', 'Edit Web Page - ' . $webPage->title)
@section('page_heading', 'Edit Web Page')

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    corePlugins: { preflight: false },
    theme: {
      extend: {
        colors: {
          retro: {
            charcoal: '#1e3326',
            dark: '#16281e',
            darkCard: '#1f382a',
            mid: '#334b39',
            muted: '#637568',
            green: '#397b4e',
            greenHover: '#285d3a',
            emerald: '#25d366',
            mint: '#eaf4eb',
            tint: '#f0f7f0',
            bg: '#f7fbf7',
            border: '#d7e5d9'
          }
        }
      }
    }
  }
</script>
<style>
  /* Minimal & Professional Design System */
  .wp-editor-wrap {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Inter", "Helvetica Neue", Arial, sans-serif;
    color: #0f172a;
    -webkit-font-smoothing: antialiased;
  }

  /* Quick Template Shelf */
  .quick-template-shelf {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
    align-items: center;
    padding: 0.75rem 1rem;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 0.65rem;
    margin-bottom: 1.25rem;
  }
  .quick-template-pill {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    padding: 0.28rem 0.65rem;
    background: #ffffff;
    color: #334155;
    border: 1px solid #cbd5e1;
    border-radius: 99px;
    font-size: 0.76rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.15s ease;
  }
  .quick-template-pill:hover {
    background: #f0fdf4;
    color: #166534;
    border-color: #86efac;
    transform: translateY(-1px);
  }
  .quick-template-pill.browse {
    background: #f0fdf4;
    color: #166534;
    border-color: #bbf7d0;
  }
  .quick-template-pill.browse:hover {
    background: #dcfce7;
  }

  /* Catalog Modal */
  .catalog-modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(15, 23, 42, 0.7);
    backdrop-filter: blur(4px);
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
    opacity: 0;
    transition: opacity 0.25s ease;
  }
  .catalog-modal-backdrop.is-open {
    display: flex;
    opacity: 1;
  }
  .catalog-modal-dialog {
    background: #ffffff;
    width: 100%;
    max-width: 1040px;
    max-height: 88vh;
    border-radius: 1rem;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    animation: modalSlideUp 0.3s cubic-bezier(0.16, 1, 0.3, 1);
  }

  /* Single Unified Form Container */
  .wp-unified-form {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 0.875rem;
    box-shadow: 0 1px 3px rgba(0,0,0,0.03);
    overflow: hidden;
  }
  .wp-form-section {
    padding: 1.75rem 2rem;
  }
  .wp-form-section + .wp-form-section {
    border-top: 1px solid #f1f5f9;
  }
  .wp-section-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding-bottom: 0.85rem;
    margin-bottom: 1.35rem;
    border-bottom: 1px solid #f8fafc;
  }
  .wp-section-title {
    font-size: 1.05rem;
    font-weight: 700;
    color: #0f172a;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.55rem;
    letter-spacing: -0.01em;
  }
  .wp-section-subtitle {
    font-size: 0.825rem;
    color: #64748b;
    margin: 0.25rem 0 0 0;
  }

  /* Form Controls */
  .wp-form-group {
    margin-bottom: 1.35rem;
  }
  .wp-label {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.85rem;
    font-weight: 600;
    color: #334155;
    margin-bottom: 0.45rem;
  }
  .wp-label span.req {
    color: #ef4444;
    margin-left: 0.2rem;
  }
  .wp-hint {
    font-size: 0.75rem;
    color: #94a3b8;
    font-weight: 400;
  }
  .wp-input, .wp-select, .wp-textarea {
    width: 100%;
    padding: 0.65rem 0.85rem;
    font-size: 0.9rem;
    line-height: 1.45;
    color: #0f172a;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    border-radius: 0.5rem;
    box-sizing: border-box;
    transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
    font-family: inherit;
  }
  .wp-input:focus, .wp-select:focus, .wp-textarea:focus {
    outline: none;
    border-color: #16a34a;
    box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.12);
  }
  .wp-input::placeholder, .wp-textarea::placeholder {
    color: #94a3b8;
  }

  /* Slug Input Prefix Group */
  .wp-slug-group {
    display: flex;
    align-items: stretch;
    border: 1px solid #cbd5e1;
    border-radius: 0.5rem;
    overflow: hidden;
    background: #ffffff;
    transition: border-color 0.15s ease, box-shadow 0.15s ease;
  }
  .wp-slug-group:focus-within {
    border-color: #16a34a;
    box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.12);
  }
  .wp-slug-prefix {
    background: #f8fafc;
    color: #64748b;
    font-size: 0.825rem;
    padding: 0 0.85rem;
    display: flex;
    align-items: center;
    border-right: 1px solid #e2e8f0;
    user-select: none;
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
    font-weight: 600;
  }
  .wp-slug-input {
    flex: 1;
    border: none;
    padding: 0.65rem 0.85rem;
    font-size: 0.9rem;
    color: #0f172a;
    outline: none;
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
  }

  /* Media Uploader Box */
  .wp-media-box {
    display: flex;
    gap: 1.25rem;
    align-items: center;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 0.75rem;
    padding: 1.15rem 1.25rem;
  }
  .wp-media-preview {
    width: 80px;
    height: 80px;
    border-radius: 0.65rem;
    background: #ffffff;
    border: 1px dashed #cbd5e1;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    flex-shrink: 0;
    position: relative;
    box-shadow: 0 1px 2px rgba(0,0,0,0.04);
  }
  .wp-media-preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  /* SERP Snippet Preview Card */
  .wp-serp-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 0.65rem;
    padding: 1.15rem 1.35rem;
    margin-bottom: 1.35rem;
    box-shadow: 0 1px 3px rgba(0,0,0,0.02);
  }
  .wp-serp-badge {
    display: inline-block;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #166534;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    padding: 0.15rem 0.5rem;
    border-radius: 99px;
    margin-bottom: 0.6rem;
  }
  .wp-serp-url {
    font-size: 0.8rem;
    color: #202124;
    margin-bottom: 0.25rem;
    font-family: Arial, sans-serif;
    line-height: 1.3;
    word-break: break-all;
  }
  .wp-serp-title {
    font-size: 1.15rem;
    color: #1a0dab;
    font-weight: 500;
    line-height: 1.3;
    margin-bottom: 0.3rem;
    cursor: pointer;
    font-family: Arial, sans-serif;
  }
  .wp-serp-title:hover {
    text-decoration: underline;
  }
  .wp-serp-desc {
    font-size: 0.825rem;
    color: #4d5156;
    line-height: 1.45;
    font-family: Arial, sans-serif;
  }

  /* Status Toggle Card */
  .wp-status-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #ffffff;
    padding: 0.5rem 0.25rem;
  }
  .wp-status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    font-size: 0.78rem;
    font-weight: 700;
    padding: 0.25rem 0.65rem;
    border-radius: 99px;
  }
  .wp-status-badge.is-published {
    background: #f0fdf4;
    color: #166534;
    border: 1px solid #bbf7d0;
  }
  .wp-status-badge.is-draft {
    background: #fef2f2;
    color: #991b1b;
    border: 1px solid #fecaca;
  }

  /* iOS Switch */
  .wp-switch {
    position: relative;
    display: inline-block;
    width: 46px;
    height: 26px;
  }
  .wp-switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }
  .wp-slider {
    position: absolute;
    cursor: pointer;
    top: 0; left: 0; right: 0; bottom: 0;
    background-color: #cbd5e1;
    transition: 0.25s ease;
    border-radius: 99px;
  }
  .wp-slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: 0.25s ease;
    border-radius: 50%;
    box-shadow: 0 1px 3px rgba(0,0,0,0.2);
  }
  input:checked + .wp-slider {
    background-color: #16a34a;
  }
  input:checked + .wp-slider:before {
    transform: translateX(20px);
  }

  /* Footer Action Bar */
  .wp-footer-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #f8fafc;
    padding: 1rem 1.75rem;
    border-top: 1px solid #e2e8f0;
  }

  /* Custom Buttons */
  .btn-wp-secondary {
    padding: 0.42rem 0.9rem;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    border-radius: 0.45rem;
    font-size: 0.815rem;
    font-weight: 600;
    color: #475569;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    box-shadow: 0 1px 2px rgba(0,0,0,0.03);
    transition: all 0.15s ease;
  }
  .btn-wp-secondary:hover {
    background: #f8fafc;
    color: #0f172a;
    border-color: #94a3b8;
  }
  .btn-wp-primary {
    padding: 0.42rem 1rem;
    background: #16a34a;
    border: 1px solid #15803d;
    border-radius: 0.45rem;
    font-size: 0.815rem;
    font-weight: 600;
    color: #ffffff;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.38rem;
    box-shadow: 0 1px 2px rgba(22, 163, 74, 0.18);
    transition: all 0.15s ease;
  }
  .btn-wp-primary:hover {
    background: #15803d;
    box-shadow: 0 2px 5px rgba(22, 163, 74, 0.28);
  }
  .btn-wp-publish {
    padding: 0.45rem 1.15rem;
    background: #16a34a;
    border: 1px solid #15803d;
    border-radius: 0.45rem;
    font-size: 0.815rem;
    font-weight: 600;
    color: #ffffff;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.38rem;
    box-shadow: 0 1px 3px rgba(22, 163, 74, 0.22);
    transition: all 0.15s ease;
  }
  .btn-wp-publish:hover {
    background: #15803d;
    box-shadow: 0 3px 8px rgba(22, 163, 74, 0.32);
  }

  /* In-Card Mini Visual Previews */
  .template-card {
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    display: flex;
    flex-direction: column;
    border: 1.5px solid #e2e8f0;
    border-radius: 0.875rem;
    background: #ffffff;
    overflow: hidden;
    text-align: left;
  }
  .template-card:hover {
    border-color: #16a34a;
    box-shadow: 0 10px 25px -5px rgba(22, 163, 74, 0.12), 0 8px 10px -6px rgba(22, 163, 74, 0.08);
    transform: translateY(-2px);
  }
  .mini-preview-box {
    width: 100%;
    height: 110px;
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0.75rem;
    box-sizing: border-box;
    user-select: none;
  }

  /* Preview Modal Styles */
  .preview-modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(15, 23, 42, 0.7);
    backdrop-filter: blur(4px);
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    opacity: 0;
    transition: opacity 0.25s ease;
  }
  .preview-modal-backdrop.is-open {
    display: flex;
    opacity: 1;
  }
  .preview-modal-dialog {
    background: #ffffff;
    width: 100%;
    max-width: 1080px;
    max-height: 90vh;
    border-radius: 1rem;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    animation: modalSlideUp 0.3s cubic-bezier(0.16, 1, 0.3, 1);
  }
  @keyframes modalSlideUp {
    from { transform: translateY(20px) scale(0.97); opacity: 0; }
    to { transform: translateY(0) scale(1); opacity: 1; }
  }
  .preview-viewport-wrap {
    flex: 1;
    overflow-y: auto;
    background: #f1f5f9;
    padding: 1.5rem;
    display: flex;
    justify-content: center;
  }
  .preview-viewport-content {
    background: #ffffff;
    width: 100%;
    max-width: 100%;
    border-radius: 0.75rem;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
    overflow: hidden;
    transition: max-width 0.3s ease;
  }
  .preview-viewport-content.view-tablet { max-width: 768px; }
  .preview-viewport-content.view-mobile { max-width: 390px; }

  @keyframes slideInRight {
    from { transform: translateX(100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
  }
</style>
@endpush

@section('admin-content')

<!-- FLOATING VALIDATION NOTICE -->
<div id="validationToast" style="display: none; position: fixed; top: 1.5rem; right: 1.5rem; max-width: 450px; background: #fee2e2; border: 1px solid #f87171; color: #991b1b; padding: 1rem 1.25rem; border-radius: 0.5rem; box-shadow: 0 10px 25px rgba(0,0,0,0.15); z-index: 999999; animation: slideInRight 0.3s ease;">
    <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
        <i class="fa-solid fa-circle-exclamation" style="color: #ef4444; font-size: 1.2rem; margin-top: 2px;"></i>
        <div style="flex: 1;">
            <strong style="display: block; font-size: 0.9rem; margin-bottom: 0.2rem;">Cannot Save Page Yet</strong>
            <span id="validationToastMsg" style="font-size: 0.85rem; line-height: 1.4;"></span>
        </div>
        <button type="button" onclick="document.getElementById('validationToast').style.display='none'" style="background: none; border: none; color: #991b1b; cursor: pointer; font-size: 1rem; padding: 0 0.25rem;">✕</button>
    </div>
</div>

@if ($errors->any())
    <div style="background: #fee2e2; color: #991b1b; padding: 1rem 1.25rem; margin: 1.5rem auto 0; max-width: 1040px; border-radius: 0.5rem; border: 1px solid #f87171;">
        <strong style="display: block; margin-bottom: 0.5rem;"><i class="fa-solid fa-triangle-exclamation"></i> Please correct the following errors:</strong>
        <ul style="margin: 0; padding-left: 1.2rem; font-size: 0.875rem;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div style="background: #fee2e2; color: #991b1b; padding: 1rem 1.25rem; margin: 1.5rem auto 0; max-width: 1040px; border-radius: 0.5rem; border: 1px solid #f87171; font-size: 0.875rem;">
        <strong>Error:</strong> {{ session('error') }}
    </div>
@endif

<div class="wp-editor-wrap" style="min-height: 100vh; background: #f8fafc; padding: 2.25rem 1rem;">
    <div style="max-width: 1040px; margin: 0 auto;">
        
        <!-- Top Navigation & Header -->
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 1.75rem;">
            <div>
                <a href="{{ route('admin.dashboard', ['tab' => 'webpage']) }}" style="display: inline-flex; align-items: center; gap: 0.4rem; font-size: 0.84rem; font-weight: 600; color: #166534; background: #f0fdf4; border: 1px solid #bbf7d0; padding: 0.35rem 0.75rem; border-radius: 99px; text-decoration: none; margin-bottom: 0.65rem; transition: all 0.15s ease;">
                    <i class="fa-solid fa-arrow-left"></i> Web Pages List
                </a>
                <h1 style="font-size: 1.85rem; font-weight: 800; color: #0f172a; margin: 0; letter-spacing: -0.025em; line-height: 1.2;">Edit {{ !empty($isService) ? 'Marketing Service' : 'Web Page' }}</h1>
                <p style="font-size: 0.875rem; color: #64748b; margin: 0.35rem 0 0 0;">Editing: <strong style="color: #0f172a;">{{ $webPage->title }}</strong> (<code>/{{ !empty($isService) ? 'services' : 'web' }}/{{ $webPage->slug }}</code>)</p>
            </div>
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <a href="{{ !empty($isService) ? route('services.show', $webPage->slug) : route('web-pages.show', $webPage->slug) }}" target="_blank" rel="noopener" class="btn-wp-secondary">
                    <i class="fa-solid fa-arrow-up-right-from-square" style="color: #16a34a;"></i> View Live
                </a>
                <a href="{{ route('admin.dashboard', ['tab' => 'webpage']) }}" class="btn-wp-secondary">Cancel</a>
                <button type="button" onclick="document.getElementById('wizardForm').requestSubmit()" class="btn-wp-publish">
                    <i class="fa-solid fa-check"></i> Save Changes
                </button>
            </div>
        </div>

        <form action="{{ !empty($isService) ? route('admin.services.update', $webPage->id) : route('admin.web-pages.update', $webPage->id) }}" method="POST" id="wizardForm" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            <input type="hidden" name="sections_submitted" value="1">
            
            <div class="wp-unified-form">

                <!-- 1. GENERAL INFORMATION & MEDIA -->
                <div class="wp-form-section">
                    <div class="wp-section-header">
                        <div>
                            <h2 class="wp-section-title">
                                <i class="fa-solid fa-file-lines" style="color: #16a34a;"></i>
                                General Information & Media
                            </h2>
                            <p class="wp-section-subtitle">Define the primary title, URL slug, category, short summary, and header visual</p>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 1.5rem; margin-bottom: 1.25rem;">
                        <div>
                            <label class="wp-label">
                                <span>Page Title <span class="req">*</span></span>
                            </label>
                            <input type="text" name="title" id="pageTitleInput" data-label="Page Title" data-required="1" value="{{ old('title', $webPage->title) }}" placeholder="e.g. Conversion Rate Optimization" class="wp-input">
                        </div>

                        <div>
                            <label class="wp-label">
                                <span>Public URL Slug</span>
                                <span class="wp-hint">Auto-generated</span>
                            </label>
                            <div class="wp-slug-group">
                                <span class="wp-slug-prefix">/{{ !empty($isService) ? 'services' : 'web' }}/</span>
                                <input type="text" name="slug" id="slugInput" value="{{ old('slug', $webPage->slug) }}" placeholder="conversion-rate-optimization" class="wp-slug-input">
                                <button type="button" id="btnSyncSlug" title="Re-sync slug from Page Title" style="background: none; border: none; padding: 0 0.85rem; color: #94a3b8; cursor: pointer; transition: color 0.15s ease;" onmouseover="this.style.color='#16a34a'" onmouseout="this.style.color='#94a3b8'">
                                    <i class="fa-solid fa-arrows-rotate"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                        <div>
                            <label class="wp-label">
                                <span>Category</span>
                            </label>
                            <select name="category" class="wp-select">
                                <option value="marketing" {{ old('category', $webPage->category) == 'marketing' ? 'selected' : '' }}>Marketing Service</option>
                                <option value="tech" {{ old('category', $webPage->category) == 'tech' ? 'selected' : '' }}>Technology & Development</option>
                                <option value="consulting" {{ old('category', $webPage->category) == 'consulting' ? 'selected' : '' }}>Consulting & Strategy</option>
                                <option value="landing" {{ old('category', $webPage->category) == 'landing' ? 'selected' : '' }}>Campaign Landing Page</option>
                            </select>
                        </div>

                        <div>
                            <label class="wp-label">
                                <span>Short Description</span>
                                <span class="wp-hint">Cards & teasers</span>
                            </label>
                            <textarea name="short_description" id="shortDescInput" rows="2" placeholder="Brief summary of this page for teasers, cards, and page previews..." class="wp-textarea">{{ old('short_description', $webPage->short_description) }}</textarea>
                        </div>
                    </div>

                    @php
                        $heroImgSrc = old('hero_image', $webPage->hero_image);
                        $heroImgFull = $heroImgSrc ? (Str::startsWith($heroImgSrc, 'http') ? $heroImgSrc : asset($heroImgSrc)) : '';
                    @endphp

                    <div>
                        <label class="wp-label">
                            <span>Hero Header Image</span>
                            <span class="wp-hint">Top of page showcase visual</span>
                        </label>
                        <div class="image-field-wrap wp-media-box">
                            <div class="img-thumb-preview wp-media-preview">
                                <img src="{{ $heroImgFull }}" style="{{ $heroImgFull ? 'display:block;' : 'display:none;' }}" alt="Hero Preview" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <span class="placeholder-icon" style="{{ $heroImgFull ? 'display:none;' : 'display:flex;' }} color: #94a3b8; font-size: 1.75rem;">
                                    <i class="fa-regular fa-image"></i>
                                </span>
                            </div>

                            <div style="flex: 1; display: flex; flex-direction: column; gap: 0.65rem;">
                                <div style="position: relative;">
                                    <span style="position: absolute; left: 0.75rem; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 0.85rem;">
                                        <i class="fa-solid fa-link"></i>
                                    </span>
                                    <input type="text" name="hero_image" value="{{ old('hero_image', $webPage->hero_image) }}" placeholder="Paste Image URL (https://...)" oninput="handleImageUrlInput(this)" class="wp-input" style="padding-left: 2.2rem;">
                                </div>

                                <div style="display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap;">
                                    <label style="display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.35rem 0.75rem; background: #ffffff; color: #334155; border: 1px solid #cbd5e1; border-radius: 0.45rem; font-size: 0.78rem; font-weight: 600; cursor: pointer; box-shadow: 0 1px 2px rgba(0,0,0,0.03); transition: all 0.15s ease;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='#ffffff'">
                                        <i class="fa-solid fa-arrow-up-from-bracket" style="color: #16a34a;"></i> Upload from Computer
                                        <input type="file" name="hero_image_file" accept="image/*" onchange="handleImageFileInput(this)" style="display: none;">
                                    </label>
                                    <span class="file-name-label wp-hint">{{ $webPage->hero_image ? 'Current image set' : 'No file chosen (JPG, PNG, WEBP max 10MB)' }}</span>
                                    <button type="button" id="clearHeroBtn" onclick="clearHeroImage()" style="{{ $webPage->hero_image ? 'display:inline-flex;' : 'display:none;' }} margin-left: auto; align-items: center; gap: 0.3rem; font-size: 0.74rem; font-weight: 600; color: #ef4444; background: none; border: none; cursor: pointer;">
                                        <i class="fa-solid fa-trash"></i> Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. PAGE SECTIONS & CONTENT ARCHITECTURE -->
                <div class="wp-form-section" id="page-sections-card">
                    <div class="wp-section-header">
                        <div>
                            <h2 class="wp-section-title">
                                <i class="fa-solid fa-layer-group" style="color: #16a34a;"></i>
                                Page Sections (<span id="section-badge-count">{{ count($webPage->sections) }}</span>)
                            </h2>
                            <p class="wp-section-subtitle">Add, customize, and arrange interactive content blocks for your page</p>
                        </div>
                        <button type="button" onclick="openTemplateCatalogModal()" class="btn-wp-primary">
                            <i class="fa-solid fa-plus"></i> Add Section Template
                        </button>
                    </div>

                    <!-- QUICK TEMPLATE SHORTCUT PILLS -->
                    <div class="quick-template-shelf">
                        <span style="font-size: 0.75rem; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin-right: 0.35rem;">
                            Quick Insert:
                        </span>
                        @foreach($sectionTypes as $key => $type)
                            <button type="button" onclick='addSection(@json($key), @json($type))' class="quick-template-pill" title="Add {{ $type['label'] }} section">
                                <i class="{{ $type['icon'] }}" style="color: #16a34a; font-size: 0.75rem;"></i>
                                <span>{{ $type['label'] }}</span>
                            </button>
                        @endforeach
                        <button type="button" onclick="openTemplateCatalogModal()" class="quick-template-pill browse" title="View visual previews of all section templates">
                            <i class="fa-regular fa-eye"></i>
                            <span>Browse Gallery</span>
                        </button>
                    </div>

                    <!-- QUICK NAVIGATION BAR TO SECTIONS -->
                    <div id="quick-section-nav" style="display: none; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 1.25rem; padding: 0.75rem 1rem; background: #f8fafc; border-radius: 0.5rem; border: 1px solid #e2e8f0; align-items: center;">
                        <span style="font-size: 0.75rem; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin-right: 0.25rem;">
                            <i class="fa-solid fa-arrow-down-short-wide"></i> Jump to:
                        </span>
                        <div id="quick-nav-pills" style="display: flex; gap: 0.5rem; flex-wrap: wrap;"></div>
                    </div>

                    <div id="sections-container" style="display: flex; flex-direction: column; gap: 1.5rem;"></div>

                    <div id="no-sections-msg" style="text-align: center; padding: 3.5rem 2rem; background: #f8fafc; border-radius: 0.75rem; border: 2px dashed #cbd5e1; color: #64748b; margin-top: 0.5rem; display: none;">
                        <div style="width: 52px; height: 52px; border-radius: 50%; background: #f0fdf4; color: #16a34a; display: inline-flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 1rem;">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                        <h3 style="font-size: 1.1rem; font-weight: 700; color: #0f172a; margin: 0 0 0.5rem 0;">No Sections Added Yet</h3>
                        <p style="font-size: 0.875rem; color: #64748b; max-width: 440px; margin: 0 auto 1.5rem auto;">Click any of the Quick Insert pills above or open the Section Catalog to add components.</p>
                        <button type="button" onclick="openTemplateCatalogModal()" class="btn-wp-primary">
                            <i class="fa-solid fa-plus"></i> Browse Section Catalog
                        </button>
                    </div>
                </div>

                <!-- 3. SEARCH ENGINE OPTIMIZATION (SEO) -->
                <div class="wp-form-section">
                    <div class="wp-section-header">
                        <div>
                            <h2 class="wp-section-title">
                                <i class="fa-solid fa-magnifying-glass" style="color: #16a34a;"></i>
                                Search Engine Optimization (SEO)
                            </h2>
                            <p class="wp-section-subtitle">Control the search preview snippet and how search engines index this page</p>
                        </div>
                    </div>

                    <!-- Live Google SERP Snippet Preview Box -->
                    <div class="wp-serp-card">
                        <span class="wp-serp-badge">Live Google Search Preview</span>
                        <div class="wp-serp-url">
                            <span style="font-weight: 700; color: #166534;">retrodigital.in</span>
                            <span style="color: #5f6368;">› {{ !empty($isService) ? 'services' : 'web' }} › </span>
                            <span id="serpSlugPreview" style="color: #5f6368;">{{ old('slug', $webPage->slug) }}</span>
                        </div>
                        <div class="wp-serp-title" id="serpTitlePreview">
                            {{ old('meta_title', $webPage->meta_title ?: $webPage->title) }} | Retro Digital
                        </div>
                        <div class="wp-serp-desc" id="serpDescPreview">
                            {{ old('meta_description', $webPage->meta_description ?: ($webPage->short_description ?: 'Brief summary of this page for search results, cards, and page previews.')) }}
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                        <div>
                            <label class="wp-label">
                                <span>Meta Title (SEO)</span>
                                <span class="wp-hint">Recommended: 50-60 chars</span>
                            </label>
                            <input type="text" name="meta_title" id="metaTitleInput" value="{{ old('meta_title', $webPage->meta_title) }}" placeholder="SEO title for search engines" class="wp-input">
                        </div>

                        <div>
                            <label class="wp-label">
                                <span>Meta Description (SEO)</span>
                                <span class="wp-hint">Recommended: 150-160 chars</span>
                            </label>
                            <textarea name="meta_description" id="metaDescInput" rows="2" placeholder="150-160 characters search snippet" class="wp-textarea">{{ old('meta_description', $webPage->meta_description) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- 4. PUBLICATION & VISIBILITY -->
                <div class="wp-form-section">
                    <div class="wp-status-card">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="width: 40px; height: 40px; border-radius: 50%; background: #f0fdf4; color: #16a34a; display: flex; align-items: center; justify-content: center; font-size: 1.15rem;">
                                <i class="fa-solid fa-globe"></i>
                            </div>
                            <div>
                                <h3 style="font-size: 0.95rem; font-weight: 700; color: #0f172a; margin: 0;">Page Publication Status</h3>
                                <p style="font-size: 0.8rem; color: #64748b; margin: 0.2rem 0 0 0;">When published, this page is publicly visible at <code>/{{ !empty($isService) ? 'services' : 'web' }}/{{ $webPage->slug }}</code></p>
                            </div>
                        </div>

                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <span class="wp-status-badge {{ old('is_published', $webPage->is_published) ? 'is-published' : 'is-draft' }}" id="publishStatusBadge">
                                {{ old('is_published', $webPage->is_published) ? '● Published' : 'Draft' }}
                            </span>
                            <label class="wp-switch">
                                <input type="checkbox" name="is_published" id="isPublishedInput" value="1" {{ old('is_published', $webPage->is_published) ? 'checked' : '' }}>
                                <span class="wp-slider"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- 5. INTEGRATED BOTTOM ACTION TOOLBAR -->
                <div class="wp-footer-bar">
                    <a href="{{ route('admin.dashboard', ['tab' => 'webpage']) }}" class="btn-wp-secondary">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </a>
                    <button type="submit" id="btn-submit" class="btn-wp-publish">
                        <i class="fa-solid fa-check"></i> Save Changes
                    </button>
                </div>

            </div>
        </form>

    </div>
</div>

<!-- SECTION TEMPLATE CATALOG MODAL -->
<div id="templateCatalogModal" class="catalog-modal-backdrop" onclick="closeTemplateCatalogModal(event)">
    <div class="catalog-modal-dialog" onclick="event.stopPropagation()">
        
        <div style="padding: 1.15rem 1.5rem; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; background: #f8fafc;">
            <div>
                <h3 style="margin: 0; font-size: 1.15rem; font-weight: 700; color: #0f172a;">Section Template Catalog</h3>
                <p style="margin: 0.2rem 0 0 0; font-size: 0.8rem; color: #64748b;">Browse visual templates and click "Add Section" to insert into your page.</p>
            </div>
            <button type="button" onclick="closeTemplateCatalogModal()" style="border: none; background: none; font-size: 1.25rem; color: #94a3b8; cursor: pointer; padding: 0.25rem 0.5rem;">✕</button>
        </div>

        <div style="flex: 1; overflow-y: auto; padding: 1.5rem;">
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.25rem;">
                @foreach($sectionTypes as $key => $type)
                <div class="template-card">
                    <div class="mini-preview-box" onclick="openPreviewModal('{{ $key }}')" title="Click for live mockup" style="cursor: pointer;">
                        @if($key === 'hero')
                            <div style="width: 90%; background: #ffffff; border: 1px solid #d1d5db; border-radius: 6px; padding: 6px 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.04); display: flex; gap: 8px; align-items: center;">
                                <div style="flex: 1;">
                                    <div style="display: inline-flex; align-items: center; gap: 3px; background: #eaf4eb; border-radius: 99px; padding: 1px 5px; margin-bottom: 3px;">
                                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #25d366;"></span>
                                        <span style="font-size: 7px; font-weight: 700; color: #285d3a;">AWARD WINNING</span>
                                    </div>
                                    <div style="height: 6px; width: 85%; background: #1e3326; border-radius: 2px; margin-bottom: 3px;"></div>
                                    <div style="height: 4px; width: 60%; background: #9ca3af; border-radius: 2px; margin-bottom: 5px;"></div>
                                    <div style="display: flex; gap: 4px;">
                                        <span style="display: inline-block; width: 32px; height: 9px; background: #397b4e; border-radius: 99px;"></span>
                                        <span style="display: inline-block; width: 26px; height: 9px; background: #e5e7eb; border-radius: 99px;"></span>
                                    </div>
                                </div>
                                <div style="width: 42px; height: 38px; background: #eaf4eb; border-radius: 4px; border: 1px dashed #397b4e; display: flex; align-items: center; justify-content: center; font-size: 8px; color: #397b4e; font-weight: 700;">Hero</div>
                            </div>
                        @elseif($key === 'topics')
                            <div style="width: 96%; background: #397b4e; border-radius: 6px; padding: 8px 10px; display: flex; align-items: center; gap: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.08); overflow: hidden;">
                                <span style="font-size: 8px; font-weight: 800; color: #ffffff; text-transform: uppercase; white-space: nowrap; background: rgba(255,255,255,0.15); padding: 2px 6px; border-radius: 4px;">SEO Audit</span>
                                <span style="color: #25d366; font-size: 7px;">✦</span>
                                <span style="font-size: 8px; font-weight: 800; color: #ffffff; text-transform: uppercase; white-space: nowrap; background: rgba(255,255,255,0.15); padding: 2px 6px; border-radius: 4px;">Web Dev</span>
                                <span style="color: #25d366; font-size: 7px;">✦</span>
                                <span style="font-size: 8px; font-weight: 800; color: #ffffff; text-transform: uppercase; white-space: nowrap; background: rgba(255,255,255,0.15); padding: 2px 6px; border-radius: 4px;">Analytics</span>
                            </div>
                        @elseif($key === 'about')
                            <div style="width: 92%; display: grid; grid-template-columns: 1fr 1fr; gap: 6px; align-items: center;">
                                <div>
                                    <div style="height: 4px; width: 35%; background: #397b4e; border-radius: 2px; margin-bottom: 3px;"></div>
                                    <div style="height: 6px; width: 90%; background: #1e3326; border-radius: 2px; margin-bottom: 4px;"></div>
                                    <div style="height: 4px; width: 80%; background: #cbd5e1; border-radius: 2px;"></div>
                                </div>
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3px;">
                                    <div style="background: #ffffff; border: 1px solid #d7e5d9; border-radius: 4px; padding: 3px; font-size: 6px; font-weight: 700; color: #397b4e; text-align: center;">⚡ Fast</div>
                                    <div style="background: #ffffff; border: 1px solid #d7e5d9; border-radius: 4px; padding: 3px; font-size: 6px; font-weight: 700; color: #397b4e; text-align: center;">📊 ROI</div>
                                    <div style="background: #ffffff; border: 1px solid #d7e5d9; border-radius: 4px; padding: 3px; font-size: 6px; font-weight: 700; color: #397b4e; text-align: center;">🛡 Safe</div>
                                    <div style="background: #ffffff; border: 1px solid #d7e5d9; border-radius: 4px; padding: 3px; font-size: 6px; font-weight: 700; color: #397b4e; text-align: center;">🎯 Scale</div>
                                </div>
                            </div>
                        @elseif($key === 'rows')
                            <div style="width: 92%; display: flex; flex-direction: column; gap: 5px;">
                                <div style="display: flex; gap: 6px; align-items: center;">
                                    <div style="width: 28px; height: 22px; background: #cbd5e1; border-radius: 4px;"></div>
                                    <div style="flex: 1; background: #f0f7f0; border: 1px solid #d7e5d9; border-radius: 4px; padding: 3px 5px;"><div style="height: 4px; width: 70%; background: #1e3326; border-radius: 2px;"></div></div>
                                </div>
                                <div style="display: flex; gap: 6px; align-items: center;">
                                    <div style="flex: 1; background: #f0f7f0; border: 1px solid #d7e5d9; border-radius: 4px; padding: 3px 5px;"><div style="height: 4px; width: 70%; background: #1e3326; border-radius: 2px;"></div></div>
                                    <div style="width: 28px; height: 22px; background: #cbd5e1; border-radius: 4px;"></div>
                                </div>
                            </div>
                        @elseif($key === 'projects')
                            <div style="width: 92%; display: flex; gap: 8px; align-items: center;">
                                <div style="width: 48px; height: 42px; background: #cbd5e1; border-radius: 5px;"></div>
                                <div style="flex: 1;">
                                    <div style="height: 5px; width: 75%; background: #1e3326; border-radius: 2px; margin-bottom: 4px;"></div>
                                    <div style="display: flex; gap: 3px;">
                                        <div style="background: #ffffff; border: 1px solid #d7e5d9; border-radius: 3px; padding: 1px 3px; font-size: 6px; font-weight: 800; color: #25d366;">+488%</div>
                                        <div style="background: #ffffff; border: 1px solid #d7e5d9; border-radius: 3px; padding: 1px 3px; font-size: 6px; font-weight: 800; color: #25d366;">+210%</div>
                                    </div>
                                </div>
                            </div>
                        @elseif($key === 'workflow')
                            <div style="width: 92%; display: flex; align-items: center; justify-content: space-between; position: relative;">
                                <div style="position: absolute; top: 50%; left: 10px; right: 10px; height: 2px; background: #d7e5d9; transform: translateY(-50%); z-index: 1;"></div>
                                <span style="width: 16px; height: 16px; border-radius: 50%; background: #397b4e; color: #fff; font-size: 7px; font-weight: 800; display: flex; align-items: center; justify-content: center; z-index: 2;">01</span>
                                <span style="width: 16px; height: 16px; border-radius: 50%; background: #397b4e; color: #fff; font-size: 7px; font-weight: 800; display: flex; align-items: center; justify-content: center; z-index: 2;">02</span>
                                <span style="width: 16px; height: 16px; border-radius: 50%; background: #397b4e; color: #fff; font-size: 7px; font-weight: 800; display: flex; align-items: center; justify-content: center; z-index: 2;">03</span>
                            </div>
                        @elseif($key === 'faqs')
                            <div style="width: 90%; display: flex; flex-direction: column; gap: 4px;">
                                <div style="background: #ffffff; border: 1px solid #397b4e; border-radius: 4px; padding: 3px 6px; display: flex; justify-content: space-between; align-items: center;">
                                    <div style="height: 4px; width: 75%; background: #1e3326; border-radius: 2px;"></div>
                                    <span style="font-size: 7px; color: #397b4e; font-weight: 800;">−</span>
                                </div>
                                <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 4px; padding: 3px 6px; display: flex; justify-content: space-between; align-items: center;">
                                    <div style="height: 4px; width: 65%; background: #9ca3af; border-radius: 2px;"></div>
                                    <span style="font-size: 7px; color: #9ca3af; font-weight: 800;">+</span>
                                </div>
                            </div>
                        @elseif($key === 'cta')
                            <div style="width: 92%; background: linear-gradient(135deg, #1e3326 0%, #397b4e 100%); border-radius: 6px; padding: 8px 10px; color: #fff; text-align: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                <div style="height: 5px; width: 70%; background: #fff; border-radius: 2px; margin: 0 auto 4px auto;"></div>
                                <div style="height: 3px; width: 50%; background: rgba(255,255,255,0.7); border-radius: 2px; margin: 0 auto 6px auto;"></div>
                                <span style="display: inline-block; background: #25d366; color: #1e3326; font-size: 7px; font-weight: 800; padding: 2px 8px; border-radius: 99px;">Get Started ↗</span>
                            </div>
                        @elseif($key === 'related')
                            <div style="width: 92%; display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 4px;">
                                <div style="background: #ffffff; border: 1px solid #d7e5d9; border-radius: 4px; padding: 4px 3px; text-align: center;">
                                    <div style="width: 8px; height: 8px; border-radius: 50%; background: #397b4e; margin: 0 auto 2px auto;"></div>
                                    <div style="height: 3px; width: 80%; background: #1e3326; border-radius: 1px; margin: 0 auto;"></div>
                                </div>
                                <div style="background: #ffffff; border: 1px solid #d7e5d9; border-radius: 4px; padding: 4px 3px; text-align: center;">
                                    <div style="width: 8px; height: 8px; border-radius: 50%; background: #397b4e; margin: 0 auto 2px auto;"></div>
                                    <div style="height: 3px; width: 80%; background: #1e3326; border-radius: 1px; margin: 0 auto;"></div>
                                </div>
                                <div style="background: #ffffff; border: 1px solid #d7e5d9; border-radius: 4px; padding: 4px 3px; text-align: center;">
                                    <div style="width: 8px; height: 8px; border-radius: 50%; background: #397b4e; margin: 0 auto 2px auto;"></div>
                                    <div style="height: 3px; width: 80%; background: #1e3326; border-radius: 1px; margin: 0 auto;"></div>
                                </div>
                            </div>
                        @else
                            <i class="{{ $type['icon'] }}" style="font-size: 2rem; color: #9ca3af;"></i>
                        @endif

                        <div style="position: absolute; bottom: 4px; right: 6px; background: rgba(0,0,0,0.6); color: #fff; font-size: 9px; padding: 1px 6px; border-radius: 4px; display: flex; align-items: center; gap: 3px;">
                            <i class="fa-regular fa-eye"></i> Preview
                        </div>
                    </div>

                    <div style="padding: 1rem; display: flex; flex-direction: column; flex: 1;">
                        <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.25rem;">
                            <div style="color: #16a34a; font-size: 1rem;"><i class="{{ $type['icon'] }}"></i></div>
                            <span style="font-weight: 700; color: #0f172a; font-size: 0.95rem;">{{ $type['label'] }}</span>
                        </div>
                        <p style="font-size: 0.78rem; color: #64748b; margin: 0 0 1rem 0; line-height: 1.4; flex: 1;">
                            {{ $type['description'] ?? 'Add this section to your page.' }}
                        </p>

                        <div style="display: flex; gap: 0.5rem; align-items: center; margin-top: auto;">
                            <button type="button" onclick="openPreviewModal('{{ $key }}')" class="btn-wp-secondary" style="flex: 1; padding: 0.45rem 0.5rem; font-size: 0.78rem; justify-content: center;">
                                <i class="fa-regular fa-eye"></i> Preview
                            </button>
                            <button type="button" onclick='addSectionAndCloseModal(@json($key), @json($type))' class="btn-wp-primary" style="flex: 1; padding: 0.45rem 0.5rem; font-size: 0.78rem; justify-content: center;">
                                <i class="fa-solid fa-plus"></i> Add Section
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div style="padding: 1rem 1.5rem; border-top: 1px solid #e2e8f0; display: flex; justify-content: flex-end; background: #f8fafc;">
            <button type="button" onclick="closeTemplateCatalogModal()" class="btn-wp-secondary">
                Done Browsing
            </button>
        </div>

    </div>
</div>

<!-- LIVE PREVIEW MODAL -->
<div id="previewModal" class="preview-modal-backdrop" onclick="closePreviewModal(event)">
    <div class="preview-modal-dialog" onclick="event.stopPropagation()">
        
        <div style="padding: 1rem 1.5rem; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; background: #f8fafc;">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div id="modalIcon" style="width: 36px; height: 36px; border-radius: 8px; background: #eef2ff; color: #4f46e5; display: flex; align-items: center; justify-content: center; font-size: 1.1rem;">
                    <i class="fa-solid fa-star"></i>
                </div>
                <div>
                    <h3 id="modalTitle" style="margin: 0; font-size: 1.1rem; font-weight: 700; color: #0f172a;">Hero Banner</h3>
                    <p id="modalDesc" style="margin: 0; font-size: 0.78rem; color: #64748b;">Live visual representation on the frontend</p>
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 0.5rem; background: #e2e8f0; padding: 3px; border-radius: 8px;">
                <button type="button" onclick="setPreviewViewport('desktop')" id="vp-btn-desktop" style="padding: 4px 10px; border-radius: 6px; border: none; background: #fff; color: #1e293b; font-size: 0.75rem; font-weight: 600; cursor: pointer;">
                    <i class="fa-solid fa-desktop"></i> Desktop
                </button>
                <button type="button" onclick="setPreviewViewport('tablet')" id="vp-btn-tablet" style="padding: 4px 10px; border-radius: 6px; border: none; background: transparent; color: #64748b; font-size: 0.75rem; font-weight: 600; cursor: pointer;">
                    <i class="fa-solid fa-tablet-screen-button"></i> Tablet
                </button>
                <button type="button" onclick="setPreviewViewport('mobile')" id="vp-btn-mobile" style="padding: 4px 10px; border-radius: 6px; border: none; background: transparent; color: #64748b; font-size: 0.75rem; font-weight: 600; cursor: pointer;">
                    <i class="fa-solid fa-mobile-screen-button"></i> Mobile
                </button>
            </div>

            <button type="button" onclick="closePreviewModal()" style="border: none; background: none; font-size: 1.25rem; color: #94a3b8; cursor: pointer; padding: 0.25rem 0.5rem;">✕</button>
        </div>

        <div class="preview-viewport-wrap">
            <div id="previewViewport" class="preview-viewport-content">
                <div id="previewRenderBody" style="padding: 0;"></div>
            </div>
        </div>

        <div style="padding: 1rem 1.5rem; border-top: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; background: #f8fafc;">
            <span style="font-size: 0.8rem; color: #64748b;">✦ Styled with Retro Digital live theme</span>
            <div style="display: flex; gap: 0.65rem;">
                <button type="button" onclick="closePreviewModal()" class="btn-wp-secondary">
                    Close Preview
                </button>
                <button type="button" id="modalAddBtn" class="btn-wp-primary">
                    <i class="fa-solid fa-plus"></i> Add This Section to Page
                </button>
            </div>
        </div>

    </div>
</div>

<script>
    let sectionCount = 0;
    let nextSectionId = 0;
    const allSectionTypes = @json($sectionTypes);
    const existingSections = @json($webPage->sections);
    const oldSections = @json(old('sections', [])) || [];
    const hasSubmittedSections = @json(old('sections_submitted') === '1');

    // =========================================================================
    // TEMPLATE CATALOG MODAL CONTROLS
    // =========================================================================
    function openTemplateCatalogModal() {
        const modal = document.getElementById('templateCatalogModal');
        if (modal) {
            modal.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeTemplateCatalogModal(e) {
        if (e && e.target && e.target.id !== 'templateCatalogModal' && !e.target.closest('button[onclick*="closeTemplateCatalogModal"]')) {
            return;
        }
        const modal = document.getElementById('templateCatalogModal');
        if (modal) {
            modal.classList.remove('is-open');
            document.body.style.overflow = 'auto';
        }
    }

    function addSectionAndCloseModal(key, type) {
        addSection(key, type);
        closeTemplateCatalogModal();
    }

    function clearHeroImage() {
        const wrap = document.querySelector('.wp-media-box');
        if (!wrap) return;
        const textInput = wrap.querySelector('input[name="hero_image"]');
        const fileInput = wrap.querySelector('input[type="file"]');
        const img = wrap.querySelector('.wp-media-preview img');
        const icon = wrap.querySelector('.wp-media-preview .placeholder-icon');
        const nameLabel = wrap.querySelector('.file-name-label');
        const clearBtn = document.getElementById('clearHeroBtn');

        if (textInput) textInput.value = '';
        if (fileInput) fileInput.value = '';
        if (img) {
            img.src = '';
            img.style.display = 'none';
        }
        if (icon) icon.style.display = 'flex';
        if (nameLabel) {
            nameLabel.innerText = 'No file chosen (JPG, PNG, WEBP max 10MB)';
            nameLabel.style.color = '#94a3b8';
            nameLabel.style.fontWeight = 'normal';
        }
        if (clearBtn) clearBtn.style.display = 'none';
    }

    function initStep1Interactions() {
        const titleInput = document.getElementById('pageTitleInput');
        const slugInput = document.getElementById('slugInput');
        const metaTitleInput = document.getElementById('metaTitleInput');
        const shortDescInput = document.getElementById('shortDescInput');
        const metaDescInput = document.getElementById('metaDescInput');
        const syncBtn = document.getElementById('btnSyncSlug');
        const isPublishedInput = document.getElementById('isPublishedInput');
        const publishBadge = document.getElementById('publishStatusBadge');

        let userTouchedSlug = slugInput && slugInput.value.trim().length > 0;

        function slugify(text) {
            return text.toString().toLowerCase()
                .trim()
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-')
                .replace(/^-+/, '')
                .replace(/-+$/, '');
        }

        function updateSerp() {
            const pageTitle = (titleInput ? titleInput.value.trim() : '') || 'Page Title';
            const metaTitle = (metaTitleInput ? metaTitleInput.value.trim() : '') || pageTitle;
            const fullTitle = metaTitle + ' | Retro Digital';

            const rawSlug = (slugInput ? slugInput.value.trim() : '') || slugify(pageTitle) || 'conversion-rate-optimization';
            
            const shortDesc = (shortDescInput ? shortDescInput.value.trim() : '');
            const metaDesc = (metaDescInput ? metaDescInput.value.trim() : '') || shortDesc || 'Brief summary of this page for search results, cards, and page previews.';

            const serpTitleEl = document.getElementById('serpTitlePreview');
            const serpSlugEl = document.getElementById('serpSlugPreview');
            const serpDescEl = document.getElementById('serpDescPreview');

            if (serpTitleEl) serpTitleEl.innerText = fullTitle;
            if (serpSlugEl) serpSlugEl.innerText = rawSlug;
            if (serpDescEl) serpDescEl.innerText = metaDesc;
        }

        if (titleInput) {
            titleInput.addEventListener('input', () => {
                if (!userTouchedSlug && slugInput) {
                    slugInput.value = slugify(titleInput.value);
                }
                updateSerp();
            });
        }

        if (slugInput) {
            slugInput.addEventListener('input', () => {
                userTouchedSlug = slugInput.value.trim().length > 0;
                updateSerp();
            });
        }

        if (syncBtn) {
            syncBtn.addEventListener('click', () => {
                if (titleInput && slugInput) {
                    slugInput.value = slugify(titleInput.value);
                    userTouchedSlug = false;
                    updateSerp();
                }
            });
        }

        if (metaTitleInput) metaTitleInput.addEventListener('input', updateSerp);
        if (shortDescInput) shortDescInput.addEventListener('input', updateSerp);
        if (metaDescInput) metaDescInput.addEventListener('input', updateSerp);

        if (isPublishedInput && publishBadge) {
            isPublishedInput.addEventListener('change', () => {
                if (isPublishedInput.checked) {
                    publishBadge.innerText = '● Published';
                    publishBadge.className = 'wp-status-badge is-published';
                } else {
                    publishBadge.innerText = 'Draft';
                    publishBadge.className = 'wp-status-badge is-draft';
                }
            });
        }

        updateSerp();
    }

    function refreshSectionNumbers() {
        const blocks = document.querySelectorAll('#sections-container .section-block');
        sectionCount = blocks.length;
        blocks.forEach((block, index) => {
            const number = block.querySelector('.section-number');
            if (number) number.innerText = `#${index + 1}`;
            block.querySelectorAll('[name]').forEach(field => {
                field.name = field.name.replace(/^sections\[\d+\]/, `sections[${index}]`);
            });
        });
        const badge = document.getElementById('section-badge-count');
        if (badge) badge.innerText = sectionCount;

        const emptyMsg = document.getElementById('no-sections-msg');
        if (emptyMsg) {
            emptyMsg.style.display = sectionCount === 0 ? 'block' : 'none';
        }

        updateQuickNav();
    }

    // =========================================================================
    // IMAGE FIELD HANDLERS (URL input & File Upload with Instant Preview)
    // =========================================================================
    function handleImageUrlInput(input) {
        const wrap = input.closest('.image-field-wrap');
        if (!wrap) return;
        const img = wrap.querySelector('.img-thumb-preview img');
        const icon = wrap.querySelector('.img-thumb-preview .placeholder-icon');
        const val = input.value.trim();
        const clearBtn = wrap.querySelector('#clearHeroBtn') || document.getElementById('clearHeroBtn');
        if (val) {
            img.src = val;
            img.style.display = 'block';
            if (icon) icon.style.display = 'none';
            if (clearBtn) clearBtn.style.display = 'inline-flex';
        } else {
            img.style.display = 'none';
            if (icon) icon.style.display = 'flex';
            if (clearBtn) clearBtn.style.display = 'none';
        }
        input.style.borderColor = '#cbd5e1';
        input.style.boxShadow = 'none';
    }

    function handleImageFileInput(input) {
        const wrap = input.closest('.image-field-wrap');
        if (!wrap) return;
        const img = wrap.querySelector('.img-thumb-preview img');
        const icon = wrap.querySelector('.img-thumb-preview .placeholder-icon');
        const nameLabel = wrap.querySelector('.file-name-label');
        const urlInput = wrap.querySelector('input[type="text"]');
        const clearBtn = wrap.querySelector('#clearHeroBtn') || document.getElementById('clearHeroBtn');
        
        if (input.files && input.files[0]) {
            const file = input.files[0];
            nameLabel.innerText = file.name;
            nameLabel.title = file.name;
            nameLabel.style.color = '#16a34a';
            nameLabel.style.fontWeight = '700';
            
            const previewUrl = URL.createObjectURL(file);
            img.src = previewUrl;
            img.style.display = 'block';
            if (icon) icon.style.display = 'none';
            if (clearBtn) clearBtn.style.display = 'inline-flex';
            
            if (urlInput) {
                urlInput.style.borderColor = '#cbd5e1';
                urlInput.style.boxShadow = 'none';
            }
        } else {
            nameLabel.innerText = 'No file chosen (JPG, PNG, WEBP max 10MB)';
            nameLabel.style.color = '#94a3b8';
            nameLabel.style.fontWeight = 'normal';
            if (clearBtn) clearBtn.style.display = 'none';
        }
    }

    function escapeHtml(value) {
        return String(value).replace(/[&<>"']/g, character => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        })[character]);
    }

    // =========================================================================
    // FIELD RENDERER (Supports Text, Textarea & Image with URL + File Upload)
    // =========================================================================
    function renderFieldHtml(sectionId, f, isRepeater = false, itemIndex = null, prefillVal = '') {
        const isTextarea = f.type === 'textarea';
        const isImage = f.type === 'image';
        const inputName = isRepeater 
            ? `sections[${sectionId}][items][${itemIndex}][${f.name}]`
            : `sections[${sectionId}][fields][${f.name}]`;
        const fileInputName = isRepeater 
            ? `sections[${sectionId}][item_files][${itemIndex}][${f.name}]`
            : `sections[${sectionId}][files][${f.name}]`;
        const label = escapeHtml(f.label || '');
        const placeholder = escapeHtml(f.placeholder || '');
        const rawValue = Array.isArray(prefillVal) ? prefillVal.join(', ') : (prefillVal || '');
        const val = escapeHtml(rawValue);

        if (isImage) {
            return `
            <div class="image-field-wrap" style="border: 1px solid #d1d5db; border-radius: 0.5rem; padding: 0.85rem; background: #fff;">
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.5rem;">
                    ${label} ${f.required ? '<span style="color:#ef4444;">*</span>' : ''}
                </label>
                <div style="display: flex; gap: 0.75rem; align-items: center;">
                    <div class="img-thumb-preview" style="width: 56px; height: 56px; border-radius: 6px; border: 1px dashed #cbd5e1; background: #f8fafc; display: flex; align-items: center; justify-content: center; overflow: hidden; flex-shrink: 0; position: relative;">
                        <img src="${val}" style="${val ? 'display:block;' : 'display:none;'} width: 100%; height: 100%; object-fit: cover;" alt="Preview" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <span class="placeholder-icon" style="${val ? 'display:none;' : 'display:flex;'} color: #94a3b8; font-size: 1.25rem;">
                            <i class="fa-regular fa-image"></i>
                        </span>
                    </div>
                    <div style="flex: 1; display: flex; flex-direction: column; gap: 0.4rem;">
                        <div style="position: relative;">
                            <span style="position: absolute; left: 0.6rem; top: 50%; transform: translateY(-50%); color: #9ca3af; font-size: 0.75rem;">
                                <i class="fa-solid fa-link"></i>
                            </span>
                            <input type="text" name="${inputName}" value="${val}" data-label="${label}" placeholder="Paste Image URL (https://...)" oninput="handleImageUrlInput(this)" style="width: 100%; padding: 0.45rem 0.5rem 0.45rem 1.85rem; border: 1px solid #d1d5db; border-radius: 0.375rem; box-sizing: border-box; font-size: 0.8rem;" ${f.required ? 'data-required="1" data-is-image="1"' : ''}>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <label style="display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.3rem 0.65rem; background: #f3f4f6; color: #374151; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.75rem; font-weight: 600; cursor: pointer;">
                                <i class="fa-solid fa-upload"></i> Upload from Computer
                                <input type="file" name="${fileInputName}" accept="image/*" onchange="handleImageFileInput(this)" style="display: none;">
                            </label>
                            <span class="file-name-label" style="font-size: 0.72rem; color: #6b7280; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 160px;">
                                No file chosen
                            </span>
                        </div>
                    </div>
                </div>
            </div>`;
        }

        if (isTextarea) {
            return `
            <div>
                <label style="display:block; font-size:0.8rem; font-weight:700; color:#374151; margin-bottom:0.25rem;">
                    ${label} ${f.required ? '<span style="color:#ef4444;">*</span>' : ''}
                </label>
                <textarea name="${inputName}" data-label="${label}" rows="2" placeholder="${placeholder}" style="width:100%; padding:0.55rem; border:1px solid #d1d5db; border-radius:0.375rem; box-sizing:border-box; font-family:inherit; font-size:0.85rem;" ${f.required ? 'data-required="1"' : ''}>${val}</textarea>
            </div>`;
        }

        return `
        <div>
            <label style="display:block; font-size:0.8rem; font-weight:700; color:#374151; margin-bottom:0.25rem;">
                ${label} ${f.required ? '<span style="color:#ef4444;">*</span>' : ''}
            </label>
            <input type="text" name="${inputName}" data-label="${label}" value="${val}" placeholder="${placeholder}" style="width:100%; padding:0.55rem; border:1px solid #d1d5db; border-radius:0.375rem; box-sizing:border-box; font-size:0.85rem;" ${f.required ? 'data-required="1"' : ''}>
        </div>`;
    }

    // =========================================================================
    // SECTION BUILDER & MANAGEMENT
    // =========================================================================
    function addSection(type, config, prefill = null) {
        const sectionId = nextSectionId++;
        const container = document.getElementById('sections-container');
        document.getElementById('no-sections-msg').style.display = 'none';

        const label = config.label || type;
        const icon = config.icon || 'fa-solid fa-cube';
        const fields = config.fields || [];
        const repeater = config.repeater || null;
        const repeaterFields = repeater ? (repeater.fields || []) : [];
        const prefillFields = prefill ? (prefill.fields || prefill.content || {}) : {};

        let fieldsHtml = '';
        if (fields.length > 0) {
            fieldsHtml = `<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1rem; margin-bottom: 1rem;">`;
            fields.forEach(f => {
                const val = prefillFields[f.name] !== undefined ? prefillFields[f.name] : (f.default || '');
                fieldsHtml += renderFieldHtml(sectionId, f, false, null, val);
            });
            fieldsHtml += `</div>`;
        }

        let repeaterHtml = '';
        if (repeaterFields.length > 0) {
            repeaterHtml = `
            <div style="margin-top: 1.25rem; border-top: 1px solid #e5e7eb; padding-top: 1.25rem;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                    <div>
                        <h4 style="font-weight:700; font-size:0.875rem; color:#111827; margin:0;">${repeater.label || 'Items'}</h4>
                        <span style="font-size:0.75rem; color:#64748b;">Add individual items or rows for this section</span>
                    </div>
                    <button type="button" onclick="addRepeaterItem(this, ${JSON.stringify(repeaterFields).replace(/"/g, '&quot;')})" style="font-size:0.75rem; font-weight:600; background:#f0fdf4; color:#166534; border:1px solid #bbf7d0; padding:0.3rem 0.65rem; border-radius:0.375rem; cursor:pointer; display:inline-flex; align-items:center; gap:0.3rem;">
                        <i class="fa-solid fa-plus"></i> Add Item
                    </button>
                </div>
                <div class="repeater-container" style="display:flex; flex-direction:column; gap:0.875rem;"></div>
            </div>`;
        }

        const sectionHtml = `
        <div class="section-block" id="section-${sectionId}" data-label="${label}" style="background:#fff; border-radius:0.75rem; box-shadow:0 1px 3px rgba(0,0,0,0.06); overflow:hidden; border:1px solid #e5e7eb; transition: all 0.2s;">
            <div style="background:#f9fafb; padding:0.75rem 1.15rem; border-bottom:1px solid #e5e7eb; display:flex; justify-content:space-between; align-items:center;">
                <div style="display:flex; align-items:center; gap:0.65rem;">
                    <span class="section-number" style="display:inline-flex; align-items:center; justify-content:center; width:24px; height:24px; border-radius:50%; background:#f0fdf4; color:#166534; font-size:0.72rem; font-weight:700; border: 1px solid #bbf7d0;">#0</span>
                    <i class="${icon}" style="color:#16a34a; font-size:0.95rem;"></i>
                    <h3 style="font-weight:700; color:#0f172a; margin:0; font-size:0.92rem;">${label}</h3>
                </div>
                <div style="display:flex; align-items:center; gap:0.35rem;">
                    <button type="button" onclick="openPreviewModal('${type}')" style="padding:0.25rem 0.55rem; font-size:0.72rem; font-weight:600; color:#475569; background:#fff; border:1px solid #cbd5e1; border-radius:0.375rem; cursor:pointer;">
                        <i class="fa-regular fa-eye"></i> Preview
                    </button>
                    <button type="button" onclick="moveSectionUp('section-${sectionId}')" title="Move Up" style="padding:0.25rem 0.45rem; font-size:0.72rem; color:#475569; background:#fff; border:1px solid #cbd5e1; border-radius:0.375rem; cursor:pointer;">
                        ↑
                    </button>
                    <button type="button" onclick="moveSectionDown('section-${sectionId}')" title="Move Down" style="padding:0.25rem 0.45rem; font-size:0.72rem; color:#475569; background:#fff; border:1px solid #cbd5e1; border-radius:0.375rem; cursor:pointer;">
                        ↓
                    </button>
                    <button type="button" onclick="removeSection('section-${sectionId}')" style="padding:0.25rem 0.55rem; font-size:0.72rem; font-weight:600; color:#ef4444; background:#fef2f2; border:1px solid #fecaca; border-radius:0.375rem; cursor:pointer;">
                        ✕ Remove
                    </button>
                </div>
            </div>
            <div style="padding:1.5rem;">
                <input type="hidden" name="sections[${sectionId}][type]" value="${type}">
                ${fieldsHtml}
                ${repeaterHtml}
            </div>
        </div>`;
        
        container.insertAdjacentHTML('beforeend', sectionHtml);

        if (repeaterFields.length > 0) {
            const newBlock = document.getElementById(`section-${sectionId}`);
            const addBtn = newBlock.querySelector('button[onclick*="addRepeaterItem"]');
            if (addBtn) {
                const sampleRows = prefill && Array.isArray(prefill.items)
                    ? prefill.items
                    : (config.preview && config.preview.items ? config.preview.items.slice(0, 2) : [{}, {}]);
                sampleRows.forEach(itemData => {
                    addRepeaterItem(addBtn, repeaterFields, itemData);
                });
            }
        }

        refreshSectionNumbers();

        // Smoothly scroll to the newly added section
        const newBlock = document.getElementById(`section-${sectionId}`);
        if (newBlock) {
            setTimeout(() => {
                newBlock.scrollIntoView({ behavior: 'smooth', block: 'center' });
                newBlock.style.boxShadow = '0 0 0 3px rgba(22, 163, 74, 0.35)';
                setTimeout(() => {
                    newBlock.style.boxShadow = '';
                }, 1500);
            }, 50);
        }
    }

    function removeSection(id) {
        if (!confirm('Are you sure you want to remove this section?')) return;
        const block = document.getElementById(id);
        if (block) {
            block.remove();
            refreshSectionNumbers();
        }
    }

    function moveSectionUp(id) {
        const el = document.getElementById(id);
        if (el && el.previousElementSibling && el.previousElementSibling.classList.contains('section-block')) {
            el.parentNode.insertBefore(el, el.previousElementSibling);
            refreshSectionNumbers();
        }
    }

    function moveSectionDown(id) {
        const el = document.getElementById(id);
        if (el && el.nextElementSibling && el.nextElementSibling.classList.contains('section-block')) {
            el.parentNode.insertBefore(el.nextElementSibling, el);
            refreshSectionNumbers();
        }
    }

    function addRepeaterItem(btn, repeaterFields, prefill = null) {
        const sectionBlock = btn.closest('.section-block');
        if (!sectionBlock) return;
        const container = sectionBlock.querySelector('.repeater-container');
        if (!container) return;

        const itemIndex = container.children.length;
        const sectionId = sectionBlock.id.replace('section-', '');
        
        let html = `<div style="position:relative; padding:1.25rem; border:1px solid #e2e8f0; border-radius:0.5rem; background:#f8fafc;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.75rem; border-bottom:1px solid #e2e8f0; padding-bottom:0.4rem;">
                <span style="font-size:0.75rem; font-weight:700; color:#16a34a;">Item #${itemIndex + 1}</span>
                <button type="button" onclick="removeRepeaterItem(this)" style="color:#ef4444; background:none; border:none; cursor:pointer; font-size:0.75rem; font-weight:600;">
                    <i class="fa-solid fa-trash"></i> Remove Item
                </button>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:1rem;">`;
            
        repeaterFields.forEach(f => {
            const val = prefill && prefill[f.name] !== undefined ? prefill[f.name] : '';
            html += renderFieldHtml(sectionId, f, true, itemIndex, val);
        });
        
        html += `</div></div>`;
        container.insertAdjacentHTML('beforeend', html);
        refreshRepeaterItems(container);
        refreshSectionNumbers();
    }

    function removeRepeaterItem(button) {
        const item = button.closest('.repeater-container > div');
        if (!item) return;

        const container = item.parentElement;
        item.remove();
        refreshRepeaterItems(container);
        refreshSectionNumbers();
    }

    function refreshRepeaterItems(container) {
        Array.from(container.children).forEach((item, index) => {
            const label = item.querySelector('span');
            if (label) label.innerText = `Item #${index + 1}`;

            item.querySelectorAll('[name]').forEach(field => {
                field.name = field.name.replace(/\[(items|item_files)\]\[\d+\]/, `[$1][${index}]`);
            });
        });
    }

    // =========================================================================
    // QUICK SECTION NAVIGATION (Jump to section pills)
    // =========================================================================
    function updateQuickNav() {
        const navWrap = document.getElementById('quick-section-nav');
        const pillsWrap = document.getElementById('quick-nav-pills');
        const blocks = document.querySelectorAll('#sections-container .section-block');

        if (!navWrap || !pillsWrap) return;

        if (blocks.length === 0) {
            navWrap.style.display = 'none';
            return;
        }

        navWrap.style.display = 'flex';
        pillsWrap.innerHTML = '';

        blocks.forEach((block, idx) => {
            const label = block.dataset.label || `Section ${idx + 1}`;
            const pill = document.createElement('button');
            pill.type = 'button';
            pill.style.cssText = 'padding: 0.3rem 0.75rem; border-radius: 99px; background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; font-size: 0.75rem; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 0.35rem; transition: all 0.15s ease;';
            pill.innerHTML = `<span style="opacity:0.75;">#${idx + 1}</span> ${label}`;
            pill.onclick = () => scrollToSection(block.id);
            pillsWrap.appendChild(pill);
        });
    }

    function scrollToSection(id) {
        const el = document.getElementById(id);
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'center' });
            el.style.boxShadow = '0 0 0 4px rgba(22, 163, 74, 0.35)';
            setTimeout(() => {
                el.style.boxShadow = '';
            }, 1500);
        }
    }

    // =========================================================================
    // FORM VALIDATION ON SAVE (Save only happens after filling required inputs)
    // =========================================================================
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('wizardForm');

        if (form) {
            form.addEventListener('submit', function(e) {
                const requiredFields = form.querySelectorAll('[data-required="1"]');
                let firstMissing = null;
                let missingLabel = '';

                for (let field of requiredFields) {
                    // If it's an image field, valid if either text URL is filled OR file input has file
                    if (field.dataset.isImage === '1') {
                        const wrap = field.closest('.image-field-wrap');
                        const fileInput = wrap ? wrap.querySelector('input[type="file"]') : null;
                        const hasFile = fileInput && fileInput.files && fileInput.files.length > 0;
                        const hasUrl = field.value.trim().length > 0;
                        if (!hasFile && !hasUrl) {
                            firstMissing = field;
                            missingLabel = field.dataset.label || 'Image';
                            break;
                        }
                    } else {
                        if (!field.value.trim()) {
                            firstMissing = field;
                            missingLabel = field.dataset.label || field.placeholder || 'Required field';
                            break;
                        }
                    }
                }

                if (firstMissing) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Highlight the invalid field
                    firstMissing.style.borderColor = '#ef4444';
                    firstMissing.style.boxShadow = '0 0 0 3px rgba(239, 68, 68, 0.25)';
                    firstMissing.focus();
                    firstMissing.scrollIntoView({ behavior: 'smooth', block: 'center' });

                    // Show floating validation notification
                    const toast = document.getElementById('validationToast');
                    const toastMsg = document.getElementById('validationToastMsg');
                    if (toast && toastMsg) {
                        toastMsg.innerHTML = `Please fill in the required field: <strong style="color: #b91c1c;">"${missingLabel}"</strong> before saving.`;
                        toast.style.display = 'block';

                        setTimeout(() => {
                            if (toast) toast.style.display = 'none';
                        }, 6000);
                    }

                    return false;
                }
            });
        }

        const submittedSections = Array.isArray(oldSections) ? oldSections : Object.values(oldSections);
        const sectionsToLoad = hasSubmittedSections ? submittedSections : (Array.isArray(existingSections) ? existingSections : Object.values(existingSections || {}));

        sectionsToLoad.forEach(section => {
            const type = section.type || section.section_type;
            const config = allSectionTypes[type];
            if (config) {
                addSection(type, config, section);
            }
        });
        initStep1Interactions();
    });

    // =========================================================================
    // LIVE PREVIEW MODAL RENDERING
    // =========================================================================
    function setPreviewViewport(mode) {
        const vp = document.getElementById('previewViewport');
        vp.classList.remove('view-tablet', 'view-mobile');
        
        document.getElementById('vp-btn-desktop').style.background = mode === 'desktop' ? '#fff' : 'transparent';
        document.getElementById('vp-btn-desktop').style.color = mode === 'desktop' ? '#1e293b' : '#64748b';
        document.getElementById('vp-btn-tablet').style.background = mode === 'tablet' ? '#fff' : 'transparent';
        document.getElementById('vp-btn-tablet').style.color = mode === 'tablet' ? '#1e293b' : '#64748b';
        document.getElementById('vp-btn-mobile').style.background = mode === 'mobile' ? '#fff' : 'transparent';
        document.getElementById('vp-btn-mobile').style.color = mode === 'mobile' ? '#1e293b' : '#64748b';

        if (mode === 'tablet') vp.classList.add('view-tablet');
        if (mode === 'mobile') vp.classList.add('view-mobile');
    }

    function openPreviewModal(typeKey) {
        const config = allSectionTypes[typeKey];
        if (!config) return;

        document.getElementById('modalTitle').innerText = config.label;
        document.getElementById('modalDesc').innerText = config.description || 'Frontend preview with live sample data';
        document.getElementById('modalIcon').innerHTML = `<i class="${config.icon}"></i>`;
        
        const addBtn = document.getElementById('modalAddBtn');
        addBtn.onclick = function() {
            addSection(typeKey, config);
            closePreviewModal();
        };

        const body = document.getElementById('previewRenderBody');
        body.innerHTML = getSectionSampleHtml(typeKey, config);

        const modal = document.getElementById('previewModal');
        modal.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    }

    function closePreviewModal(e) {
        if (e && e.target && e.target.id !== 'previewModal' && !e.target.closest('button[onclick*="closePreviewModal"]')) {
            return;
        }
        const modal = document.getElementById('previewModal');
        modal.classList.remove('is-open');
        document.body.style.overflow = 'auto';
    }

    function getSectionSampleHtml(typeKey, config) {
        const sample = config.preview || {};

        if (typeKey === 'hero') {
            return `
            <div style="background: #f7fbf7; padding: 4rem 2rem; border-bottom: 1px solid #d7e5d9; font-family: Inter, system-ui, sans-serif;">
                <div style="max-width: 900px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2.5rem; align-items: center;">
                    <div>
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: #eaf4eb; border: 1px solid #c8dfcc; color: #285d3a; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 0.35rem 0.75rem; border-radius: 99px; margin-bottom: 1rem;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background: #25d366; display: inline-block;"></span>
                            ${sample.badge || 'Award-Winning Agency'}
                        </div>
                        <h2 style="font-size: 2.25rem; font-weight: 800; color: #1e3326; line-height: 1.15; margin: 0 0 1rem 0; letter-spacing: -0.02em;">
                            ${sample.heading || 'Grow Your Business With Precision Strategy'}
                        </h2>
                        <p style="font-size: 1rem; color: #637568; line-height: 1.6; margin: 0 0 1.5rem 0;">
                            ${sample.subtitle || 'We combine strategy, technical precision, and creative innovation.'}
                        </p>
                        <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                            <a href="#" style="background: #397b4e; color: #fff; font-weight: 700; font-size: 0.9rem; padding: 0.8rem 1.5rem; border-radius: 99px; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
                                ${sample.cta_text || 'Connect With Our Experts'} →
                            </a>
                        </div>
                    </div>
                    <div>
                        <div style="border-radius: 1.25rem; overflow: hidden; border: 4px solid #fff; box-shadow: 0 20px 40px rgba(30,51,38,0.12);">
                            <img src="${sample.image || 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80'}" style="width: 100%; height: auto; display: block;" alt="Showcase">
                        </div>
                    </div>
                </div>
            </div>`;
        }

        if (typeKey === 'topics') {
            const list = sample.topics || ['Technical SEO', 'Web Dev', 'CRO', 'Content Strategy'];
            return `
            <div style="background: #397b4e; padding: 1.25rem 1rem; overflow: hidden; font-family: Inter, system-ui, sans-serif;">
                <div style="display: flex; gap: 2rem; align-items: center; justify-content: center; flex-wrap: wrap;">
                    ${list.map(t => `<span style="color: #fff; font-size: 0.875rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; display: inline-flex; align-items: center; gap: 0.5rem;"><span style="color: #25d366;">✦</span> ${t}</span>`).join('')}
                </div>
            </div>`;
        }

        if (typeKey === 'about') {
            const items = sample.items || [];
            return `
            <div style="background: #f7fbf7; padding: 4rem 2rem; font-family: Inter, system-ui, sans-serif;">
                <div style="max-width: 960px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3rem;">
                    <div>
                        <span style="font-size: 0.75rem; font-weight: 700; color: #397b4e; text-transform: uppercase; letter-spacing: 0.1em; display: block; margin-bottom: 0.5rem;">${sample.kicker || 'About The Service'}</span>
                        <h2 style="font-size: 2rem; font-weight: 800; color: #1e3326; margin: 0 0 1rem 0; line-height: 1.2;">${sample.heading || 'Targeted, conversion-focused solutions.'}</h2>
                        <p style="font-size: 0.95rem; color: #637568; line-height: 1.6; margin: 0 0 2rem 0;">${sample.paragraph || 'We build specialized programs designed to engage audiences and generate conversions.'}</p>
                    </div>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                        ${items.map(it => `
                            <div style="background: #fff; border: 1px solid #d7e5d9; border-radius: 1rem; padding: 1.25rem; box-shadow: 0 2px 8px rgba(30,51,38,0.04);">
                                <h4 style="font-size: 0.95rem; font-weight: 700; color: #1e3326; margin: 0 0 0.4rem 0;">${it.title}</h4>
                                <p style="font-size: 0.8rem; color: #637568; line-height: 1.5; margin: 0;">${it.description}</p>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>`;
        }

        if (typeKey === 'rows') {
            const items = sample.items || [];
            return `
            <div style="background: #fff; padding: 4rem 2rem; font-family: Inter, system-ui, sans-serif;">
                <div style="max-width: 900px; margin: 0 auto;">
                    <div style="text-align: center; margin-bottom: 3rem;">
                        <span style="font-size: 0.75rem; font-weight: 700; color: #397b4e; text-transform: uppercase;">What's Included</span>
                        <h2 style="font-size: 2rem; font-weight: 800; color: #1e3326; margin: 0.5rem 0;">${sample.heading || "What's included in our service"}</h2>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 2rem;">
                        ${items.map((row, i) => `
                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; align-items: center;">
                                <div style="${i % 2 === 1 ? 'order: 2;' : ''} border-radius: 1rem; overflow: hidden; border: 3px solid #fff; box-shadow: 0 8px 24px rgba(30,51,38,0.08);">
                                    <img src="${row.image || 'https://picsum.photos/seed/row1/700/520'}" style="width: 100%; height: 180px; object-fit: cover; display: block;" alt="Row">
                                </div>
                                <div style="${i % 2 === 1 ? 'order: 1;' : ''} background: #f0f7f0; border: 1px solid #d7e5d9; border-radius: 1rem; padding: 1.75rem;">
                                    <h3 style="font-size: 1.2rem; font-weight: 700; color: #1e3326; margin: 0 0 0.5rem 0;">${row.title}</h3>
                                    <p style="font-size: 0.875rem; color: #637568; line-height: 1.6; margin: 0;">${row.description}</p>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>`;
        }

        if (typeKey === 'projects') {
            const items = sample.items || [];
            return `
            <div style="background: #f7fbf7; padding: 4rem 2rem; border-top: 1px solid #d7e5d9; border-bottom: 1px solid #d7e5d9; font-family: Inter, system-ui, sans-serif;">
                <div style="max-width: 900px; margin: 0 auto;">
                    <div style="text-align: center; margin-bottom: 2.5rem;">
                        <span style="font-size: 0.75rem; font-weight: 700; color: #397b4e; text-transform: uppercase;">Featured Case Studies</span>
                        <h2 style="font-size: 2rem; font-weight: 800; color: #1e3326; margin: 0.5rem 0;">${sample.heading || 'Real numbers from real clients.'}</h2>
                    </div>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; align-items: center; background: #fff; border: 1px solid #d7e5d9; border-radius: 1.25rem; padding: 2rem;">
                        <div>
                            <img src="${(items[0] && items[0].image) || 'https://picsum.photos/seed/p1/900/700'}" style="width: 100%; height: 220px; object-fit: cover; border-radius: 0.875rem;" alt="Project">
                        </div>
                        <div>
                            <h3 style="font-size: 1.35rem; font-weight: 800; color: #1e3326; margin: 0 0 0.5rem 0;">${(items[0] && items[0].name) || 'Retail & E-commerce Platform'}</h3>
                            <p style="font-size: 0.875rem; color: #637568; line-height: 1.6; margin: 0 0 1.25rem 0;">${(items[0] && items[0].description) || 'Ranked for 400+ product keywords, tripling organic revenue.'}</p>
                        </div>
                    </div>
                </div>
            </div>`;
        }

        if (typeKey === 'workflow') {
            const items = sample.items || [];
            return `
            <div style="background: #fff; padding: 4rem 2rem; font-family: Inter, system-ui, sans-serif;">
                <div style="max-width: 900px; margin: 0 auto;">
                    <div style="text-align: center; margin-bottom: 3rem;">
                        <span style="font-size: 0.75rem; font-weight: 700; color: #397b4e; text-transform: uppercase;">Full Process</span>
                        <h2 style="font-size: 2rem; font-weight: 800; color: #1e3326; margin: 0.5rem 0;">${sample.heading || 'How our projects run, end to end.'}</h2>
                    </div>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                        ${items.map((step, i) => `
                            <div style="background: #f7fbf7; border: 1px solid #d7e5d9; border-radius: 1rem; padding: 1.5rem;">
                                <div style="width: 32px; height: 32px; border-radius: 50%; background: #397b4e; color: #fff; font-weight: 800; font-size: 0.85rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                                    0${i + 1}
                                </div>
                                <h4 style="font-size: 1rem; font-weight: 700; color: #1e3326; margin: 0 0 0.5rem 0;">${step.title}</h4>
                                <p style="font-size: 0.8rem; color: #637568; line-height: 1.5; margin: 0;">${step.description}</p>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>`;
        }

        if (typeKey === 'faqs') {
            const items = sample.items || [];
            return `
            <div style="background: #f7fbf7; padding: 4rem 2rem; font-family: Inter, system-ui, sans-serif;">
                <div style="max-width: 760px; margin: 0 auto;">
                    <div style="text-align: center; margin-bottom: 2.5rem;">
                        <span style="font-size: 0.75rem; font-weight: 700; color: #397b4e; text-transform: uppercase;">Knowledge Base</span>
                        <h2 style="font-size: 2rem; font-weight: 800; color: #1e3326; margin: 0.5rem 0;">${sample.heading || 'Frequently Asked Questions'}</h2>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                        ${items.map((faq, i) => `
                            <div style="background: #fff; border: 1px solid #d7e5d9; border-radius: 0.75rem; padding: 1rem 1.25rem;">
                                <div style="font-weight: 700; font-size: 0.95rem; color: #1e3326; margin-bottom: 0.5rem;">${faq.question}</div>
                                <div style="font-size: 0.875rem; color: #637568; line-height: 1.6;">${faq.answer}</div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>`;
        }

        if (typeKey === 'cta') {
            return `
            <div style="background: #eaf4eb; padding: 4rem 2rem; border-top: 1px solid #c8dfcc; border-bottom: 1px solid #c8dfcc; font-family: Inter, system-ui, sans-serif;">
                <div style="max-width: 800px; margin: 0 auto; text-align: center; background: linear-gradient(135deg, #1e3326 0%, #285d3a 100%); border-radius: 1.5rem; padding: 3rem 2rem; color: #fff;">
                    <h2 style="font-size: 2.25rem; font-weight: 800; color: #fff; margin: 0 0 1rem 0;">${sample.heading || 'Ready to accelerate your digital growth?'}</h2>
                    <p style="font-size: 1rem; color: #cbd5e1; max-width: 600px; margin: 0 auto 2rem auto;">${sample.description || 'Schedule a free strategy consultation with our specialists.'}</p>
                    <a href="#" style="background: #25d366; color: #1e3326; font-size: 0.95rem; font-weight: 800; padding: 0.85rem 2rem; border-radius: 99px; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
                        ${sample.button_text || 'Discuss Your Project ↗'}
                    </a>
                </div>
            </div>`;
        }

        if (typeKey === 'related') {
            const slugs = sample.slugs || ['SEO Optimization', 'Performance Marketing', 'Website Dev'];
            return `
            <div style="background: #f7fbf7; padding: 4rem 2rem; font-family: Inter, system-ui, sans-serif;">
                <div style="max-width: 900px; margin: 0 auto;">
                    <div style="text-align: center; margin-bottom: 2.5rem;">
                        <h2 style="font-size: 2rem; font-weight: 800; color: #1e3326; margin: 0.5rem 0;">${sample.heading || 'Explore Related Services'}</h2>
                    </div>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem;">
                        ${slugs.map(s => `
                            <div style="background: #fff; border: 1px solid #d7e5d9; border-radius: 1rem; padding: 1.5rem;">
                                <h4 style="font-size: 1.05rem; font-weight: 700; color: #1e3326; margin: 0 0 0.5rem 0; text-transform: capitalize;">${s.replace(/-/g, ' ')}</h4>
                                <span style="font-size: 0.8rem; font-weight: 700; color: #397b4e;">Learn More ↗</span>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>`;
        }

        return `<div style="padding: 2rem; text-align: center; color: #6b7280;">Preview is currently unavailable for this section.</div>`;
    }
</script>
@endsection
