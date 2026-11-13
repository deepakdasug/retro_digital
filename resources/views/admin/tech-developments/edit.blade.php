@extends('layouts.admin')

@section('title', 'Edit Tech Development - ' . $techDevelopment->name)
@section('page_heading', 'Edit Tech Development')

@section('admin-content')
<div style="max-width: 1040px; margin: 0 auto; padding-bottom: 5rem;">

    {{-- Top Navigation & Action Header --}}
    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
        <div>
            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.35rem;">
                <a href="{{ route('admin.dashboard', ['tab' => 'webpage']) }}" style="color: #6b7280; text-decoration: none; font-size: 0.875rem; font-weight: 600; display: inline-flex; align-items: center; gap: 0.35rem;">
                    <i class="fa-solid fa-arrow-left"></i> Back to Webpages
                </a>
                <span style="color: #d1d5db;">/</span>
                <span style="color: #10b981; font-size: 0.825rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">Tech Development</span>
            </div>
            <h1 style="font-size: 1.85rem; font-weight: 800; color: #111827; margin: 0; letter-spacing: -0.02em;">
                Edit Tech Development
            </h1>
            <p style="font-size: 0.875rem; color: #6b7280; margin: 0.25rem 0 0 0;">
                Configuring: <strong style="color: #111827;">{{ $techDevelopment->name }}</strong> · 
                <span style="font-family: monospace; color: #059669;">/services/{{ $techDevelopment->slug }}</span>
            </p>
        </div>

        <div style="display: flex; align-items: center; gap: 0.75rem;">
            <a href="{{ route('services.show', $techDevelopment->slug) }}" 
               target="_blank" 
               rel="noopener" 
               class="admin-secondary-button" 
               style="display: inline-flex; align-items: center; gap: 0.45rem;">
                <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i> View Live Page
            </a>
            <a href="{{ route('admin.dashboard', ['tab' => 'webpage']) }}" 
               class="admin-secondary-button">
                Cancel
            </a>
        </div>
    </div>

    {{-- Session Feedback Alerts --}}
    @if(session('success'))
        <div class="admin-dashboard-success" style="margin-bottom: 1.5rem;">
            <i class="fa-solid fa-circle-check"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if(session('error'))
        <div class="admin-dashboard-success" style="background-color: #fee2e2; color: #991b1b; border-color: #f87171; margin-bottom: 1.5rem;">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div>{{ session('error') }}</div>
        </div>
    @endif

    @if ($errors->any())
        <div class="admin-dashboard-success" style="background-color: #fee2e2; color: #991b1b; border-color: #f87171; margin-bottom: 1.5rem;">
            <i class="fa-solid fa-circle-exclamation"></i>
            <div>
                <strong>Please fix the following validation errors:</strong>
                <ul style="margin: 0.5rem 0 0 1.25rem; font-size: 0.85rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('admin.tech-developments.update', $techDevelopment->id) }}" 
          method="POST" 
          enctype="multipart/form-data" 
          id="techDevForm">
        @csrf
        @method('PUT')

        {{-- =========================================================================
             1. CORE SERVICE IDENTITY & HERO SECTION
             ========================================================================= --}}
        <article class="admin-insight-panel" style="padding: 1.85rem; margin-bottom: 1.75rem; border-radius: 14px;">
            <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #f3f4f6; padding-bottom: 1rem; margin-bottom: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <span style="width: 36px; height: 36px; border-radius: 10px; background: #e0f2fe; color: #0284c7; display: inline-flex; align-items: center; justify-content: center; font-size: 1.1rem;">
                        <i class="fa-solid fa-laptop-code"></i>
                    </span>
                    <div>
                        <h2 style="font-size: 1.15rem; font-weight: 750; color: #111827; margin: 0;">1. Core Discipline &amp; Hero Banner</h2>
                        <p style="font-size: 0.8rem; color: #6b7280; margin: 0.15rem 0 0;">Basic identification and hero cockpit presentation on the public website.</p>
                    </div>
                </div>
                <div>
                    <label style="display: inline-flex; align-items: center; gap: 0.5rem; cursor: pointer; font-size: 0.85rem; font-weight: 600; color: #374151; background: #f9fafb; padding: 0.4rem 0.85rem; border-radius: 8px; border: 1px solid #e5e7eb;">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $techDevelopment->is_published) ? 'checked' : '' }} style="accent-color: #10b981;">
                        <span>Publish Status (Active)</span>
                    </label>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
                <div>
                    <label style="display: block; font-size: 0.825rem; font-weight: 700; color: #374151; margin-bottom: 0.4rem;">
                        Service Name *
                    </label>
                    <input type="text" 
                           name="name" 
                           value="{{ old('name', $techDevelopment->name) }}" 
                           required 
                           class="admin-form-input" 
                           placeholder="e.g. Web Development" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.9rem;">
                </div>

                <div>
                    <label style="display: block; font-size: 0.825rem; font-weight: 700; color: #374151; margin-bottom: 0.4rem;">
                        URL Slug *
                    </label>
                    <div style="display: flex; align-items: center; border: 1px solid #d1d5db; border-radius: 8px; overflow: hidden; background: #f9fafb;">
                        <span style="padding: 0 0.65rem; color: #6b7280; font-size: 0.8rem; font-family: monospace;">/services/</span>
                        <input type="text" 
                               name="slug" 
                               value="{{ old('slug', $techDevelopment->slug) }}" 
                               class="admin-form-input" 
                               placeholder="web-development" 
                               style="flex: 1; border: none; padding: 0.65rem 0.85rem; background: #fff; font-size: 0.9rem; font-family: monospace;">
                    </div>
                </div>

                <div style="grid-column: span 2;">
                    <label style="display: block; font-size: 0.825rem; font-weight: 700; color: #374151; margin-bottom: 0.4rem;">
                        Hero Headline (H1 on page)
                    </label>
                    <input type="text" 
                           name="hero_title" 
                           value="{{ old('hero_title', $techDevelopment->hero_title) }}" 
                           class="admin-form-input" 
                           placeholder="e.g. Innovative & High-Performance Web Development Solutions" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.9rem;">
                </div>

                <div style="grid-column: span 2;">
                    <label style="display: block; font-size: 0.825rem; font-weight: 700; color: #374151; margin-bottom: 0.4rem;">
                        Hero Lead Subtitle
                    </label>
                    <textarea name="hero_description" 
                              rows="2" 
                              class="admin-form-input" 
                              placeholder="Responsive, secure and search-friendly websites designed around your brand, customers and business goals." 
                              style="width: 100%; padding: 0.65rem 0.85rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.875rem; line-height: 1.5;">{{ old('hero_description', $techDevelopment->hero_description) }}</textarea>
                </div>

                <div>
                    <label style="display: block; font-size: 0.825rem; font-weight: 700; color: #374151; margin-bottom: 0.4rem;">
                        Short Summary (Card Teaser)
                    </label>
                    <textarea name="short_description" 
                              rows="3" 
                              class="admin-form-input" 
                              placeholder="Brief 1-2 sentence teaser shown on grids and breadcrumbs..." 
                              style="width: 100%; padding: 0.65rem 0.85rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.85rem; line-height: 1.5;">{{ old('short_description', $techDevelopment->short_description) }}</textarea>
                </div>

                <div>
                    <label style="display: block; font-size: 0.825rem; font-weight: 700; color: #374151; margin-bottom: 0.4rem;">
                        Full Overview Description
                    </label>
                    <textarea name="description" 
                              rows="3" 
                              class="admin-form-input" 
                              placeholder="Full detailed introduction paragraph for this service..." 
                              style="width: 100%; padding: 0.65rem 0.85rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.85rem; line-height: 1.5;">{{ old('description', $techDevelopment->description) }}</textarea>
                </div>

                {{-- Hero Image Upload & Media Path --}}
                <div style="grid-column: span 2; padding: 1.25rem; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px;">
                    <label style="display: block; font-size: 0.825rem; font-weight: 700; color: #1e293b; margin-bottom: 0.5rem;">
                        Hero Showcase &amp; Cockpit Media
                    </label>
                    
                    <div style="display: flex; gap: 1.25rem; align-items: center; flex-wrap: wrap;">
                        <div style="width: 120px; height: 80px; border-radius: 8px; overflow: hidden; background: #0f172a; border: 1px solid #cbd5e1; flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                            @if(!empty($techDevelopment->hero_image))
                                <img src="{{ Str::startsWith($techDevelopment->hero_image, 'http') ? $techDevelopment->hero_image : asset($techDevelopment->hero_image) }}" 
                                     alt="Hero preview" 
                                     id="heroImgPreview" 
                                     style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <span style="font-size: 0.75rem; color: #94a3b8;"><i class="fa-solid fa-image"></i> No Image</span>
                            @endif
                        </div>

                        <div style="flex: 1; min-width: 260px;">
                            <div style="margin-bottom: 0.65rem;">
                                <label style="font-size: 0.75rem; color: #475569; font-weight: 600; display: block; margin-bottom: 0.25rem;">
                                    Option A: Image Path or Remote URL
                                </label>
                                <input type="text" 
                                       name="hero_image" 
                                       value="{{ old('hero_image', $techDevelopment->hero_image) }}" 
                                       placeholder="assets/images/tech-development/web-development.jpg" 
                                       style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.85rem; font-family: monospace;">
                            </div>

                            <div>
                                <label style="font-size: 0.75rem; color: #475569; font-weight: 600; display: block; margin-bottom: 0.25rem;">
                                    Option B: Upload New File from Computer
                                </label>
                                <input type="file" 
                                       name="hero_image_file" 
                                       accept="image/*" 
                                       style="font-size: 0.8rem; color: #475569;">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SEO Meta Tags --}}
                <div>
                    <label style="display: block; font-size: 0.825rem; font-weight: 700; color: #374151; margin-bottom: 0.4rem;">
                        Meta Title (Google Browser Tab)
                    </label>
                    <input type="text" 
                           name="meta_title" 
                           value="{{ old('meta_title', $techDevelopment->meta_title) }}" 
                           placeholder="e.g. Web Development Services | Retrotech Digital" 
                           style="width: 100%; padding: 0.55rem 0.85rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.85rem;">
                </div>

                <div>
                    <label style="display: block; font-size: 0.825rem; font-weight: 700; color: #374151; margin-bottom: 0.4rem;">
                        Meta Description (Search Snippet)
                    </label>
                    <input type="text" 
                           name="meta_description" 
                           value="{{ old('meta_description', $techDevelopment->meta_description) }}" 
                           placeholder="e.g. Build responsive, SEO-optimized websites and web apps with Retrotech Digital." 
                           style="width: 100%; padding: 0.55rem 0.85rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.85rem;">
                </div>
            </div>
        </article>

        {{-- =========================================================================
             2. DYNAMIC PAGE SECTIONS
             ========================================================================= --}}
        @php
            $sections = $techDevelopment->sections->keyBy('section_type');
            $diffSec    = $sections->get('differentiator');
            $capSec     = $sections->get('capabilities');
            $procSec    = $sections->get('process');
            $reasonsSec = $sections->get('reasons');
            $metricsSec = $sections->get('metrics');
            $faqSec     = $sections->get('faq');
            $ctaSec     = $sections->get('cta');
        @endphp

        {{-- SECTION 1: DIFFERENTIATOR --}}
        @if($diffSec)
            <article class="admin-insight-panel" style="padding: 1.75rem; margin-bottom: 1.5rem; border-radius: 14px;">
                <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #f3f4f6; padding-bottom: 0.85rem; margin-bottom: 1.25rem;">
                    <div style="display: flex; align-items: center; gap: 0.65rem;">
                        <span style="width: 32px; height: 32px; border-radius: 8px; background: #ecfdf5; color: #059669; display: inline-flex; align-items: center; justify-content: center; font-size: 0.95rem;">
                            <i class="fa-solid fa-crosshairs"></i>
                        </span>
                        <div>
                            <h3 style="font-size: 1.05rem; font-weight: 750; color: #111827; margin: 0;">2. Differentiator Section</h3>
                            <p style="font-size: 0.78rem; color: #6b7280; margin: 0;">Explains how this service stands apart from alternatives.</p>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="sections[{{ $diffSec->id }}][section_type]" value="differentiator">

                <div style="display: grid; gap: 1rem;">
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Section Title</label>
                        <input type="text" name="sections[{{ $diffSec->id }}][title]" value="{{ old("sections.{$diffSec->id}.title", $diffSec->title) }}" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Differentiator Core Statement / Narrative</label>
                        <textarea name="sections[{{ $diffSec->id }}][description]" rows="3" style="width: 100%; padding: 0.65rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem; line-height: 1.5;">{{ old("sections.{$diffSec->id}.description", $diffSec->description) }}</textarea>
                    </div>
                </div>
            </article>
        @endif

        {{-- SECTION 2: CAPABILITIES & VALUE PILLARS --}}
        @if($capSec)
            <article class="admin-insight-panel" style="padding: 1.75rem; margin-bottom: 1.5rem; border-radius: 14px;">
                <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #f3f4f6; padding-bottom: 0.85rem; margin-bottom: 1.25rem;">
                    <div style="display: flex; align-items: center; gap: 0.65rem;">
                        <span style="width: 32px; height: 32px; border-radius: 8px; background: #ede9fe; color: #7c3aed; display: inline-flex; align-items: center; justify-content: center; font-size: 0.95rem;">
                            <i class="fa-solid fa-cubes"></i>
                        </span>
                        <div>
                            <h3 style="font-size: 1.05rem; font-weight: 750; color: #111827; margin: 0;">3. Key Capabilities &amp; Value Pillars</h3>
                            <p style="font-size: 0.78rem; color: #6b7280; margin: 0;">Core competencies with business value impact statements.</p>
                        </div>
                    </div>
                    <button type="button" onclick="addCapabilityItem({{ $capSec->id }})" class="admin-secondary-button" style="font-size: 0.78rem; padding: 0.35rem 0.75rem;">
                        <i class="fa-solid fa-plus"></i> Add Capability Card
                    </button>
                </div>

                <input type="hidden" name="sections[{{ $capSec->id }}][section_type]" value="capabilities">

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.25rem;">
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Section Title</label>
                        <input type="text" name="sections[{{ $capSec->id }}][title]" value="{{ old("sections.{$capSec->id}.title", $capSec->title) }}" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Section Subtitle</label>
                        <input type="text" name="sections[{{ $capSec->id }}][description]" value="{{ old("sections.{$capSec->id}.description", $capSec->description) }}" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>
                </div>

                <div id="capItemsContainer_{{ $capSec->id }}" style="display: flex; flex-direction: column; gap: 0.85rem;">
                    @php $capItems = $capSec->content['items'] ?? []; @endphp
                    @foreach($capItems as $idx => $item)
                        <div class="repeater-card-item" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem; position: relative;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.65rem;">
                                <span style="font-size: 0.75rem; font-weight: 750; color: #64748b; text-transform: uppercase;">Capability #<span class="cap-num">{{ $idx + 1 }}</span></span>
                                <button type="button" onclick="this.closest('.repeater-card-item').remove()" style="background: none; border: none; color: #ef4444; font-size: 0.75rem; font-weight: 600; cursor: pointer;">
                                    <i class="fa-regular fa-trash-can"></i> Remove
                                </button>
                            </div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem;">
                                <div>
                                    <label style="font-size: 0.75rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Title</label>
                                    <input type="text" name="sections[{{ $capSec->id }}][content][items][{{ $idx }}][title]" value="{{ $item['title'] ?? '' }}" placeholder="e.g. Custom Web Design" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;">
                                </div>
                                <div>
                                    <label style="font-size: 0.75rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Business Value / Impact</label>
                                    <input type="text" name="sections[{{ $capSec->id }}][content][items][{{ $idx }}][impact]" value="{{ $item['impact'] ?? '' }}" placeholder="e.g. Accelerates organic conversions..." style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;">
                                </div>
                                <div style="grid-column: span 2;">
                                    <label style="font-size: 0.75rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Description</label>
                                    <textarea name="sections[{{ $capSec->id }}][content][items][{{ $idx }}][description]" rows="2" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;">{{ $item['description'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>
        @endif

        {{-- SECTION 3: DELIVERY PROCESS (ROADMAP) --}}
        @if($procSec)
            <article class="admin-insight-panel" style="padding: 1.75rem; margin-bottom: 1.5rem; border-radius: 14px;">
                <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #f3f4f6; padding-bottom: 0.85rem; margin-bottom: 1.25rem;">
                    <div style="display: flex; align-items: center; gap: 0.65rem;">
                        <span style="width: 32px; height: 32px; border-radius: 8px; background: #fef3c7; color: #d97706; display: inline-flex; align-items: center; justify-content: center; font-size: 0.95rem;">
                            <i class="fa-solid fa-timeline"></i>
                        </span>
                        <div>
                            <h3 style="font-size: 1.05rem; font-weight: 750; color: #111827; margin: 0;">4. Delivery Process &amp; Roadmap</h3>
                            <p style="font-size: 0.78rem; color: #6b7280; margin: 0;">Step-by-step development phases.</p>
                        </div>
                    </div>
                    <button type="button" onclick="addProcessItem({{ $procSec->id }})" class="admin-secondary-button" style="font-size: 0.78rem; padding: 0.35rem 0.75rem;">
                        <i class="fa-solid fa-plus"></i> Add Phase Step
                    </button>
                </div>

                <input type="hidden" name="sections[{{ $procSec->id }}][section_type]" value="process">

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.25rem;">
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Section Title</label>
                        <input type="text" name="sections[{{ $procSec->id }}][title]" value="{{ old("sections.{$procSec->id}.title", $procSec->title) }}" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Section Subtitle</label>
                        <input type="text" name="sections[{{ $procSec->id }}][description]" value="{{ old("sections.{$procSec->id}.description", $procSec->description) }}" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>
                </div>

                <div id="procItemsContainer_{{ $procSec->id }}" style="display: flex; flex-direction: column; gap: 0.85rem;">
                    @php $procItems = $procSec->content['items'] ?? []; @endphp
                    @foreach($procItems as $idx => $item)
                        <div class="repeater-card-item" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                <span style="font-size: 0.75rem; font-weight: 750; color: #d97706;">Phase {{ $idx + 1 }}</span>
                                <button type="button" onclick="this.closest('.repeater-card-item').remove()" style="background: none; border: none; color: #ef4444; font-size: 0.75rem; font-weight: 600; cursor: pointer;">
                                    <i class="fa-regular fa-trash-can"></i> Remove
                                </button>
                            </div>
                            <div style="display: grid; gap: 0.65rem;">
                                <div>
                                    <label style="font-size: 0.75rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Step Title</label>
                                    <input type="text" name="sections[{{ $procSec->id }}][content][items][{{ $idx }}][title]" value="{{ $item['title'] ?? '' }}" placeholder="e.g. Wireframing & Prototyping" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;">
                                </div>
                                <div>
                                    <label style="font-size: 0.75rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Step Description</label>
                                    <textarea name="sections[{{ $procSec->id }}][content][items][{{ $idx }}][description]" rows="2" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;">{{ $item['description'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>
        @endif

        {{-- SECTION 4: REASONS (WHY RETROTECH) --}}
        @if($reasonsSec)
            <article class="admin-insight-panel" style="padding: 1.75rem; margin-bottom: 1.5rem; border-radius: 14px;">
                <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #f3f4f6; padding-bottom: 0.85rem; margin-bottom: 1.25rem;">
                    <div style="display: flex; align-items: center; gap: 0.65rem;">
                        <span style="width: 32px; height: 32px; border-radius: 8px; background: #e0f2fe; color: #0369a1; display: inline-flex; align-items: center; justify-content: center; font-size: 0.95rem;">
                            <i class="fa-solid fa-shield-halved"></i>
                        </span>
                        <div>
                            <h3 style="font-size: 1.05rem; font-weight: 750; color: #111827; margin: 0;">5. Why Retrotech / Value Reasons</h3>
                            <p style="font-size: 0.78rem; color: #6b7280; margin: 0;">Pillars of client trust and engineering excellence.</p>
                        </div>
                    </div>
                    <button type="button" onclick="addReasonItem({{ $reasonsSec->id }})" class="admin-secondary-button" style="font-size: 0.78rem; padding: 0.35rem 0.75rem;">
                        <i class="fa-solid fa-plus"></i> Add Reason
                    </button>
                </div>

                <input type="hidden" name="sections[{{ $reasonsSec->id }}][section_type]" value="reasons">

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.25rem;">
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Section Title</label>
                        <input type="text" name="sections[{{ $reasonsSec->id }}][title]" value="{{ old("sections.{$reasonsSec->id}.title", $reasonsSec->title) }}" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Section Subtitle</label>
                        <input type="text" name="sections[{{ $reasonsSec->id }}][description]" value="{{ old("sections.{$reasonsSec->id}.description", $reasonsSec->description) }}" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>
                </div>

                <div id="reasonsItemsContainer_{{ $reasonsSec->id }}" style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.85rem;">
                    @php $reasonsItems = $reasonsSec->content['items'] ?? []; @endphp
                    @foreach($reasonsItems as $idx => $item)
                        <div class="repeater-card-item" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                <span style="font-size: 0.75rem; font-weight: 750; color: #0284c7;">Reason #{{ $idx + 1 }}</span>
                                <button type="button" onclick="this.closest('.repeater-card-item').remove()" style="background: none; border: none; color: #ef4444; font-size: 0.75rem; font-weight: 600; cursor: pointer;">
                                    <i class="fa-regular fa-trash-can"></i> Remove
                                </button>
                            </div>
                            <div style="display: grid; gap: 0.5rem;">
                                <div>
                                    <label style="font-size: 0.72rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Title</label>
                                    <input type="text" name="sections[{{ $reasonsSec->id }}][content][items][{{ $idx }}][title]" value="{{ $item['title'] ?? '' }}" placeholder="e.g. Experienced IT Professionals" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;">
                                </div>
                                <div>
                                    <label style="font-size: 0.72rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Description</label>
                                    <textarea name="sections[{{ $reasonsSec->id }}][content][items][{{ $idx }}][description]" rows="2" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;">{{ $item['description'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>
        @endif

        {{-- SECTION 5: METRICS --}}
        @if($metricsSec)
            <article class="admin-insight-panel" style="padding: 1.75rem; margin-bottom: 1.5rem; border-radius: 14px;">
                <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #f3f4f6; padding-bottom: 0.85rem; margin-bottom: 1.25rem;">
                    <div style="display: flex; align-items: center; gap: 0.65rem;">
                        <span style="width: 32px; height: 32px; border-radius: 8px; background: #ecfdf5; color: #047857; display: inline-flex; align-items: center; justify-content: center; font-size: 0.95rem;">
                            <i class="fa-solid fa-chart-line"></i>
                        </span>
                        <div>
                            <h3 style="font-size: 1.05rem; font-weight: 750; color: #111827; margin: 0;">6. Key Metrics &amp; Performance Proof</h3>
                            <p style="font-size: 0.78rem; color: #6b7280; margin: 0;">Quantifiable proof points shown on the page.</p>
                        </div>
                    </div>
                    <button type="button" onclick="addMetricItem({{ $metricsSec->id }})" class="admin-secondary-button" style="font-size: 0.78rem; padding: 0.35rem 0.75rem;">
                        <i class="fa-solid fa-plus"></i> Add Metric
                    </button>
                </div>

                <input type="hidden" name="sections[{{ $metricsSec->id }}][section_type]" value="metrics">

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.25rem;">
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Section Title</label>
                        <input type="text" name="sections[{{ $metricsSec->id }}][title]" value="{{ old("sections.{$metricsSec->id}.title", $metricsSec->title) }}" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Section Subtitle</label>
                        <input type="text" name="sections[{{ $metricsSec->id }}][description]" value="{{ old("sections.{$metricsSec->id}.description", $metricsSec->description) }}" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>
                </div>

                <div id="metricItemsContainer_{{ $metricsSec->id }}" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.85rem;">
                    @php $metricsItems = $metricsSec->content['items'] ?? []; @endphp
                    @foreach($metricsItems as $idx => $item)
                        <div class="repeater-card-item" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 0.85rem;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.4rem;">
                                <span style="font-size: 0.72rem; font-weight: 750; color: #059669;">Metric #{{ $idx + 1 }}</span>
                                <button type="button" onclick="this.closest('.repeater-card-item').remove()" style="background: none; border: none; color: #ef4444; font-size: 0.72rem; cursor: pointer;">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </div>
                            <div style="display: grid; gap: 0.4rem;">
                                <div>
                                    <label style="font-size: 0.7rem; font-weight: 600; color: #475569; display: block;">Value (e.g. 726+)</label>
                                    <input type="text" name="sections[{{ $metricsSec->id }}][content][items][{{ $idx }}][value]" value="{{ $item['value'] ?? '' }}" placeholder="726+" style="width: 100%; padding: 0.4rem 0.55rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.85rem; font-weight: 700;">
                                </div>
                                <div>
                                    <label style="font-size: 0.7rem; font-weight: 600; color: #475569; display: block;">Label</label>
                                    <input type="text" name="sections[{{ $metricsSec->id }}][content][items][{{ $idx }}][label]" value="{{ $item['label'] ?? '' }}" placeholder="Projects Shipped" style="width: 100%; padding: 0.4rem 0.55rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.8rem;">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>
        @endif

        {{-- SECTION 6: FAQs --}}
        @if($faqSec)
            <article class="admin-insight-panel" style="padding: 1.75rem; margin-bottom: 1.5rem; border-radius: 14px;">
                <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #f3f4f6; padding-bottom: 0.85rem; margin-bottom: 1.25rem;">
                    <div style="display: flex; align-items: center; gap: 0.65rem;">
                        <span style="width: 32px; height: 32px; border-radius: 8px; background: #fef2f2; color: #dc2626; display: inline-flex; align-items: center; justify-content: center; font-size: 0.95rem;">
                            <i class="fa-regular fa-circle-question"></i>
                        </span>
                        <div>
                            <h3 style="font-size: 1.05rem; font-weight: 750; color: #111827; margin: 0;">7. Frequently Asked Questions (FAQs)</h3>
                            <p style="font-size: 0.78rem; color: #6b7280; margin: 0;">Accordion Q&amp;A cards addressing common client inquiries.</p>
                        </div>
                    </div>
                    <button type="button" onclick="addFaqItem({{ $faqSec->id }})" class="admin-secondary-button" style="font-size: 0.78rem; padding: 0.35rem 0.75rem;">
                        <i class="fa-solid fa-plus"></i> Add Question
                    </button>
                </div>

                <input type="hidden" name="sections[{{ $faqSec->id }}][section_type]" value="faq">

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.25rem;">
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Section Title</label>
                        <input type="text" name="sections[{{ $faqSec->id }}][title]" value="{{ old("sections.{$faqSec->id}.title", $faqSec->title) }}" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Section Subtitle</label>
                        <input type="text" name="sections[{{ $faqSec->id }}][description]" value="{{ old("sections.{$faqSec->id}.description", $faqSec->description) }}" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>
                </div>

                <div id="faqItemsContainer_{{ $faqSec->id }}" style="display: flex; flex-direction: column; gap: 0.85rem;">
                    @php $faqItems = $faqSec->content['items'] ?? []; @endphp
                    @foreach($faqItems as $idx => $item)
                        <div class="repeater-card-item" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                <span style="font-size: 0.75rem; font-weight: 750; color: #dc2626;">FAQ #{{ $idx + 1 }}</span>
                                <button type="button" onclick="this.closest('.repeater-card-item').remove()" style="background: none; border: none; color: #ef4444; font-size: 0.75rem; font-weight: 600; cursor: pointer;">
                                    <i class="fa-regular fa-trash-can"></i> Remove
                                </button>
                            </div>
                            <div style="display: grid; gap: 0.5rem;">
                                <div>
                                    <label style="font-size: 0.75rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Question</label>
                                    <input type="text" name="sections[{{ $faqSec->id }}][content][items][{{ $idx }}][question]" value="{{ $item['question'] ?? '' }}" placeholder="e.g. What IT services does Retrotech Digital provide?" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;">
                                </div>
                                <div>
                                    <label style="font-size: 0.75rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Answer</label>
                                    <textarea name="sections[{{ $faqSec->id }}][content][items][{{ $idx }}][answer]" rows="2" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;">{{ $item['answer'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>
        @endif

        {{-- SECTION 7: CTA CONVERSION PANEL --}}
        @if($ctaSec)
            <article class="admin-insight-panel" style="padding: 1.75rem; margin-bottom: 2rem; border-radius: 14px;">
                <div style="display: flex; align-items: center; gap: 0.65rem; border-bottom: 1px solid #f3f4f6; padding-bottom: 0.85rem; margin-bottom: 1.25rem;">
                    <span style="width: 32px; height: 32px; border-radius: 8px; background: #ecfdf5; color: #059669; display: inline-flex; align-items: center; justify-content: center; font-size: 0.95rem;">
                        <i class="fa-solid fa-bullhorn"></i>
                    </span>
                    <div>
                        <h3 style="font-size: 1.05rem; font-weight: 750; color: #111827; margin: 0;">8. Conversion CTA Panel &amp; Contact Channels</h3>
                        <p style="font-size: 0.78rem; color: #6b7280; margin: 0;">Bottom conversion card with direct phone, email, and office location.</p>
                    </div>
                </div>

                <input type="hidden" name="sections[{{ $ctaSec->id }}][section_type]" value="cta">

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">CTA Heading</label>
                        <input type="text" name="sections[{{ $ctaSec->id }}][title]" value="{{ old("sections.{$ctaSec->id}.title", $ctaSec->title) }}" placeholder="Ready to Build Your Solution?" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Lead Subtitle</label>
                        <input type="text" name="sections[{{ $ctaSec->id }}][description]" value="{{ old("sections.{$ctaSec->id}.description", $ctaSec->description) }}" placeholder="Connect with Retrotech Digital’s team to discuss requirements..." style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Phone Number</label>
                        <input type="text" name="sections[{{ $ctaSec->id }}][content][phone]" value="{{ $ctaSec->content['phone'] ?? '+91 99108 36538' }}" placeholder="+91 99108 36538" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Email Address</label>
                        <input type="email" name="sections[{{ $ctaSec->id }}][content][email]" value="{{ $ctaSec->content['email'] ?? 'info@retrotechdigital.com' }}" placeholder="info@retrotechdigital.com" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>

                    <div style="grid-column: span 2;">
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem;">Office Address</label>
                        <input type="text" name="sections[{{ $ctaSec->id }}][content][office]" value="{{ $ctaSec->content['office'] ?? 'O-126, O-145, O-146 The Shopping Mall, Arjun Marg, DLF Phase 1, Gurugram, Haryana, India, 122002' }}" style="width: 100%; padding: 0.55rem 0.8rem; border: 1px solid #d1d5db; border-radius: 7px; font-size: 0.875rem;">
                    </div>
                </div>
            </article>
        @endif

        {{-- Sticky Bottom Action Bar --}}
        <div style="position: sticky; bottom: 1.5rem; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid #d1d5db; border-radius: 14px; padding: 1rem 1.5rem; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1); z-index: 50;">
            <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #475569;">
                <i class="fa-solid fa-circle-info" style="color: #0284c7;"></i>
                <span>All changes update the live tech development page immediately.</span>
            </div>

            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <a href="{{ route('admin.dashboard', ['tab' => 'webpage']) }}" class="admin-secondary-button">
                    Discard
                </a>
                <button type="submit" class="admin-primary-button" style="display: inline-flex; align-items: center; gap: 0.5rem; background: linear-gradient(135deg, #16a34a 0%, #15803d 100%); color: #fff; padding: 0.65rem 1.45rem; border-radius: 8px; font-weight: 750; border: none; cursor: pointer; box-shadow: 0 4px 12px rgba(22, 163, 74, 0.25);">
                    <i class="fa-solid fa-floppy-disk"></i> Save Tech Development
                </button>
            </div>
        </div>

    </form>
</div>

{{-- Interactive Client-side repeater script --}}
<script>
    function addCapabilityItem(sectionId) {
        const container = document.getElementById('capItemsContainer_' + sectionId);
        const count = container.querySelectorAll('.repeater-card-item').length;
        const html = `
            <div class="repeater-card-item" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.65rem;">
                    <span style="font-size: 0.75rem; font-weight: 750; color: #64748b; text-transform: uppercase;">Capability #<span class="cap-num">${count + 1}</span></span>
                    <button type="button" onclick="this.closest('.repeater-card-item').remove()" style="background: none; border: none; color: #ef4444; font-size: 0.75rem; font-weight: 600; cursor: pointer;">
                        <i class="fa-regular fa-trash-can"></i> Remove
                    </button>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem;">
                    <div>
                        <label style="font-size: 0.75rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Title</label>
                        <input type="text" name="sections[${sectionId}][content][items][${count}][title]" placeholder="e.g. Scalable Architecture" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;">
                    </div>
                    <div>
                        <label style="font-size: 0.75rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Business Value / Impact</label>
                        <input type="text" name="sections[${sectionId}][content][items][${count}][impact]" placeholder="e.g. Reduces maintenance costs by 40%..." style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;">
                    </div>
                    <div style="grid-column: span 2;">
                        <label style="font-size: 0.75rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Description</label>
                        <textarea name="sections[${sectionId}][content][items][${count}][description]" rows="2" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;"></textarea>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }

    function addProcessItem(sectionId) {
        const container = document.getElementById('procItemsContainer_' + sectionId);
        const count = container.querySelectorAll('.repeater-card-item').length;
        const html = `
            <div class="repeater-card-item" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                    <span style="font-size: 0.75rem; font-weight: 750; color: #d97706;">Phase ${count + 1}</span>
                    <button type="button" onclick="this.closest('.repeater-card-item').remove()" style="background: none; border: none; color: #ef4444; font-size: 0.75rem; font-weight: 600; cursor: pointer;">
                        <i class="fa-regular fa-trash-can"></i> Remove
                    </button>
                </div>
                <div style="display: grid; gap: 0.65rem;">
                    <div>
                        <label style="font-size: 0.75rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Step Title</label>
                        <input type="text" name="sections[${sectionId}][content][items][${count}][title]" placeholder="e.g. Quality Assurance & Testing" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;">
                    </div>
                    <div>
                        <label style="font-size: 0.75rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Step Description</label>
                        <textarea name="sections[${sectionId}][content][items][${count}][description]" rows="2" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;"></textarea>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }

    function addReasonItem(sectionId) {
        const container = document.getElementById('reasonsItemsContainer_' + sectionId);
        const count = container.querySelectorAll('.repeater-card-item').length;
        const html = `
            <div class="repeater-card-item" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                    <span style="font-size: 0.75rem; font-weight: 750; color: #0284c7;">Reason #${count + 1}</span>
                    <button type="button" onclick="this.closest('.repeater-card-item').remove()" style="background: none; border: none; color: #ef4444; font-size: 0.75rem; font-weight: 600; cursor: pointer;">
                        <i class="fa-regular fa-trash-can"></i> Remove
                    </button>
                </div>
                <div style="display: grid; gap: 0.5rem;">
                    <div>
                        <label style="font-size: 0.72rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Title</label>
                        <input type="text" name="sections[${sectionId}][content][items][${count}][title]" placeholder="e.g. Zero Vendor Lock-in" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;">
                    </div>
                    <div>
                        <label style="font-size: 0.72rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Description</label>
                        <textarea name="sections[${sectionId}][content][items][${count}][description]" rows="2" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;"></textarea>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }

    function addMetricItem(sectionId) {
        const container = document.getElementById('metricItemsContainer_' + sectionId);
        const count = container.querySelectorAll('.repeater-card-item').length;
        const html = `
            <div class="repeater-card-item" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 0.85rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.4rem;">
                    <span style="font-size: 0.72rem; font-weight: 750; color: #059669;">Metric #${count + 1}</span>
                    <button type="button" onclick="this.closest('.repeater-card-item').remove()" style="background: none; border: none; color: #ef4444; font-size: 0.72rem; cursor: pointer;">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </div>
                <div style="display: grid; gap: 0.4rem;">
                    <div>
                        <label style="font-size: 0.7rem; font-weight: 600; color: #475569; display: block;">Value (e.g. 99.9%)</label>
                        <input type="text" name="sections[${sectionId}][content][items][${count}][value]" placeholder="99.9%" style="width: 100%; padding: 0.4rem 0.55rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.85rem; font-weight: 700;">
                    </div>
                    <div>
                        <label style="font-size: 0.7rem; font-weight: 600; color: #475569; display: block;">Label</label>
                        <input type="text" name="sections[${sectionId}][content][items][${count}][label]" placeholder="Uptime Guarantee" style="width: 100%; padding: 0.4rem 0.55rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.8rem;">
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }

    function addFaqItem(sectionId) {
        const container = document.getElementById('faqItemsContainer_' + sectionId);
        const count = container.querySelectorAll('.repeater-card-item').length;
        const html = `
            <div class="repeater-card-item" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                    <span style="font-size: 0.75rem; font-weight: 750; color: #dc2626;">FAQ #${count + 1}</span>
                    <button type="button" onclick="this.closest('.repeater-card-item').remove()" style="background: none; border: none; color: #ef4444; font-size: 0.75rem; font-weight: 600; cursor: pointer;">
                        <i class="fa-regular fa-trash-can"></i> Remove
                    </button>
                </div>
                <div style="display: grid; gap: 0.5rem;">
                    <div>
                        <label style="font-size: 0.75rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Question</label>
                        <input type="text" name="sections[${sectionId}][content][items][${count}][question]" placeholder="e.g. What tech stacks do you support?" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;">
                    </div>
                    <div>
                        <label style="font-size: 0.75rem; font-weight: 600; color: #475569; display: block; margin-bottom: 0.2rem;">Answer</label>
                        <textarea name="sections[${sectionId}][content][items][${count}][answer]" rows="2" style="width: 100%; padding: 0.45rem 0.65rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.825rem;"></textarea>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }
</script>
@endsection

