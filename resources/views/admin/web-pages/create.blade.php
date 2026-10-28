@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div style="background: #fee2e2; color: #991b1b; padding: 1rem; margin: 1rem auto; max-width: 900px; border-radius: 0.5rem; border: 1px solid #f87171;">
        <strong style="display: block; margin-bottom: 0.5rem;">⚠ Validation Errors:</strong>
        <ul style="margin: 0; padding-left: 1.2rem;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div style="background: #fee2e2; color: #991b1b; padding: 1rem; margin: 1rem auto; max-width: 900px; border-radius: 0.5rem; border: 1px solid #f87171;">
        <strong>Error:</strong> {{ session('error') }}
    </div>
@endif

<div style="min-height: 100vh; background: #f3f4f6; padding: 2rem 1rem;">
    <div style="max-width: 900px; margin: 0 auto;">
        
        <!-- Header -->
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 2rem;">
            <div>
                <h1 style="font-size: 1.5rem; font-weight: 700; color: #111827; margin: 0;">Create Web Page</h1>
                <p style="font-size: 0.875rem; color: #6b7280; margin: 0.25rem 0 0 0;">Build a dynamic page step-by-step.</p>
            </div>
            <a href="{{ route('admin.web-pages.index') }}" style="font-size: 0.875rem; font-weight: 500; color: #6b7280; text-decoration: none;">Cancel</a>
        </div>

        <form action="{{ route('admin.web-pages.store') }}" method="POST" id="wizardForm" enctype="multipart/form-data">
            @csrf
            
            <!-- STEP 1 -->
            <div id="step-1" style="background: #fff; border-radius: 0.75rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 2rem; margin-bottom: 2rem;">
                <h2 style="font-size: 1.125rem; font-weight: 700; color: #111827; border-bottom: 1px solid #e5e7eb; padding-bottom: 1rem; margin-top: 0; margin-bottom: 1.5rem;">1. Basic Details</h2>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Page Title <span style="color: red;">*</span></label>
                        <input type="text" name="title" required style="width: 100%; padding: 0.6rem; border: 1px solid #d1d5db; border-radius: 0.375rem; box-sizing: border-box;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">URL Slug (auto if empty)</label>
                        <input type="text" name="slug" style="width: 100%; padding: 0.6rem; border: 1px solid #d1d5db; border-radius: 0.375rem; box-sizing: border-box;">
                    </div>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Short Description</label>
                    <textarea name="short_description" rows="2" style="width: 100%; padding: 0.6rem; border: 1px solid #d1d5db; border-radius: 0.375rem; box-sizing: border-box; font-family: inherit;"></textarea>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Meta Title (SEO)</label>
                        <input type="text" name="meta_title" style="width: 100%; padding: 0.6rem; border: 1px solid #d1d5db; border-radius: 0.375rem; box-sizing: border-box;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Meta Description (SEO)</label>
                        <input type="text" name="meta_description" style="width: 100%; padding: 0.6rem; border: 1px solid #d1d5db; border-radius: 0.375rem; box-sizing: border-box;">
                    </div>
                </div>

                <div style="margin-bottom: 1.5rem; border: 1px solid #e5e7eb; padding: 1rem; border-radius: 0.5rem; background: #f9fafb;">
                    <label style="display: block; font-size: 0.875rem; font-weight: 700; color: #374151; margin-bottom: 0.5rem;">Hero Image</label>
                    <p style="font-size: 0.8rem; color: #6b7280; margin: 0 0 0.75rem 0;">Provide a URL or upload an image from your computer.</p>
                    
                    <div style="margin-bottom: 0.75rem;">
                        <label style="display: block; font-size: 0.8rem; font-weight: 600; color: #4b5563; margin-bottom: 0.25rem;">Option 1: Image URL</label>
                        <input type="text" name="hero_image" placeholder="https://images.unsplash.com/..." style="width: 100%; padding: 0.6rem; border: 1px solid #d1d5db; border-radius: 0.375rem; box-sizing: border-box;">
                    </div>
                    
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 600; color: #4b5563; margin-bottom: 0.25rem;">Option 2: Upload File (jpg, png, webp)</label>
                        <input type="file" name="hero_image_file" accept="image/*" style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem; box-sizing: border-box; background: #fff;">
                    </div>
                </div>

                <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.875rem; font-weight: 500; color: #374151; cursor: pointer;">
                    <input type="checkbox" name="is_published" value="1" checked> Publish immediately
                </label>
            </div>

            <!-- STEP 2: SECTIONS SELECTOR -->
            <div id="step-2" style="display: none; background: #fff; border-radius: 0.75rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 2rem; margin-bottom: 2rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e5e7eb; padding-bottom: 1rem; margin-bottom: 1.5rem;">
                    <div>
                        <h2 style="font-size: 1.125rem; font-weight: 700; color: #111827; margin: 0;">2. Add Sections (Optional)</h2>
                        <p style="font-size: 0.8rem; color: #6b7280; margin: 0.25rem 0 0 0;">You can skip this step if you only want the basic page.</p>
                    </div>
                    <button type="button" onclick="skipSections()" style="font-size: 0.875rem; color: #4f46e5; background: none; border: none; cursor: pointer; font-weight: 600;">Skip & Save Page →</button>
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem;">
                    @foreach($sectionTypes as $key => $type)
                    <button type="button" onclick="addSection('{{ $key }}', '{{ $type['label'] }}', {{ json_encode($type['fields'] ?? []) }}, {{ json_encode($type['repeater']['fields'] ?? []) }})" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 1.5rem; border: 2px solid #e5e7eb; border-radius: 0.75rem; background: #fff; cursor: pointer; transition: all 0.2s;" onmouseover="this.style.borderColor='#4f46e5'; this.style.background='#eef2ff';" onmouseout="this.style.borderColor='#e5e7eb'; this.style.background='#fff';">
                        <div style="width: 3rem; height: 3rem; border-radius: 50%; background: #f3f4f6; display: flex; align-items: center; justify-content: center; margin-bottom: 0.75rem; color: #4f46e5;">
                            <i class="{{ $type['icon'] }}" style="font-size: 1.25rem;"></i>
                        </div>
                        <span style="font-weight: 600; color: #374151; font-size: 0.9rem;">{{ $type['label'] }}</span>
                    </button>
                    @endforeach
                </div>
            </div>

            <!-- STEP 3: ADDED SECTIONS FORM -->
            <div id="step-3" style="display: none;">
                <div id="sections-container" style="display: flex; flex-direction: column; gap: 1.5rem; margin-bottom: 2rem;"></div>
                <div id="no-sections-msg" style="text-align: center; padding: 3rem; background: #fff; border-radius: 0.75rem; border: 1px dashed #d1d5db; color: #6b7280;">
                    No sections added. You can save the page as is, or go back to add sections.
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div style="display: flex; justify-content: space-between; margin-top: 2rem;">
                <button type="button" id="btn-prev" onclick="prevStep()" style="display: none; padding: 0.6rem 1.2rem; background: #fff; border: 1px solid #d1d5db; border-radius: 0.5rem; font-weight: 600; cursor: pointer;">← Back</button>
                <div style="margin-left: auto; display: flex; gap: 1rem;">
                    <button type="button" id="btn-next" onclick="nextStep()" style="padding: 0.6rem 1.5rem; background: #4f46e5; color: #fff; border: none; border-radius: 0.5rem; font-weight: 600; cursor: pointer;">Next Step →</button>
                    <button type="submit" id="btn-submit" style="display: none; padding: 0.6rem 1.5rem; background: #16a34a; color: #fff; border: none; border-radius: 0.5rem; font-weight: 600; cursor: pointer;">Save Page</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    let currentStep = 1;
    let sectionCount = 0;

    function updateButtons() {
        document.getElementById('step-1').style.display = currentStep === 1 ? 'block' : 'none';
        document.getElementById('step-2').style.display = currentStep === 2 ? 'block' : 'none';
        document.getElementById('step-3').style.display = currentStep === 3 ? 'block' : 'none';
        
        document.getElementById('btn-prev').style.display = currentStep > 1 ? 'block' : 'none';
        document.getElementById('btn-next').style.display = currentStep < 3 ? 'block' : 'none';
        document.getElementById('btn-submit').style.display = currentStep === 3 ? 'block' : 'none';
    }

    function nextStep() {
        if (currentStep === 1) {
            const title = document.querySelector('input[name="title"]').value;
            if (!title) { alert('Please enter a Page Title before proceeding.'); return; }
        }
        if (currentStep < 3) { currentStep++; updateButtons(); window.scrollTo(0,0); }
    }

    function prevStep() {
        if (currentStep > 1) { currentStep--; updateButtons(); window.scrollTo(0,0); }
    }

    function skipSections() {
        currentStep = 3;
        updateButtons();
        window.scrollTo(0,0);
    }

    function addSection(type, label, fields, repeaterFields) {
        sectionCount++;
        const container = document.getElementById('sections-container');
        document.getElementById('no-sections-msg').style.display = 'none';

        let fieldsHtml = '';
        fields.forEach(f => {
            const inputType = f.type === 'textarea' ? 'textarea' : 'input';
            // FIXED: Added [fields] to the name attribute
            const input = inputType === 'textarea' 
                ? `<textarea name="sections[${sectionCount}][fields][${f.name}]" rows="2" style="width:100%; padding:0.5rem; border:1px solid #d1d5db; border-radius:0.375rem; box-sizing:border-box; font-family:inherit;" ${f.required ? 'required' : ''}></textarea>`
                : `<input type="text" name="sections[${sectionCount}][fields][${f.name}]" style="width:100%; padding:0.5rem; border:1px solid #d1d5db; border-radius:0.375rem; box-sizing:border-box;" ${f.required ? 'required' : ''}>`;
            
            fieldsHtml += `<div style="margin-bottom: 1rem;">
                <label style="display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:0.25rem;">${f.label} ${f.required ? '<span style="color:red;">*</span>' : ''}</label>
                ${input}
            </div>`;
        });

        let repeaterHtml = '';
        if (repeaterFields.length > 0) {
            repeaterHtml = `
            <div style="margin-top: 1.5rem; border-top: 1px solid #e5e7eb; padding-top: 1rem;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                    <h4 style="font-weight:700; font-size:0.9rem; color:#374151;">Repeater Items</h4>
                    <button type="button" onclick="addRepeaterItem(this, ${JSON.stringify(repeaterFields).replace(/"/g, '&quot;')})" style="font-size:0.75rem; font-weight:600; background:#eef2ff; color:#4f46e5; border:none; padding:0.4rem 0.8rem; border-radius:0.375rem; cursor:pointer;">+ Add Row</button>
                </div>
                <div class="repeater-container" style="display:flex; flex-direction:column; gap:1rem;"></div>
            </div>`;
        }

        const sectionHtml = `
        <div class="section-block" id="section-${sectionCount}" style="background:#fff; border-radius:0.75rem; box-shadow:0 1px 3px rgba(0,0,0,0.1); overflow:hidden; border:1px solid #e5e7eb;">
            <div style="background:#f9fafb; padding:0.75rem 1rem; border-bottom:1px solid #e5e7eb; display:flex; justify-content:space-between; align-items:center;">
                <div style="display:flex; align-items:center; gap:0.75rem;">
                    <span style="font-size:0.75rem; font-weight:700; color:#9ca3af;">#${sectionCount}</span>
                    <h3 style="font-weight:700; color:#111827; margin:0; font-size:0.95rem;">${label}</h3>
                </div>
                <button type="button" onclick="removeSection('section-${sectionCount}')" style="color:#ef4444; background:none; border:none; cursor:pointer; font-size:0.85rem;">✕ Remove</button>
            </div>
            <div style="padding:1.5rem;">
                <input type="hidden" name="sections[${sectionCount}][type]" value="${type}">
                ${fieldsHtml}
                ${repeaterHtml}
            </div>
        </div>`;
        
        container.insertAdjacentHTML('beforeend', sectionHtml);

        // Automatically jump to Step 3
        currentStep = 3; 
        updateButtons();
        window.scrollTo(0,0);
    }

    function removeSection(id) {
        document.getElementById(id).remove();
        sectionCount--;
        if (sectionCount === 0) {
            document.getElementById('no-sections-msg').style.display = 'block';
        }
    }

    function addRepeaterItem(btn, repeaterFields) {
        const container = btn.closest('.repeater-container');
        const itemIndex = container.children.length;
        const sectionBlock = btn.closest('.section-block');
        const sectionId = sectionBlock.id.replace('section-', '');
        
        let html = `<div style="position:relative; padding:1rem; border:1px solid #e5e7eb; border-radius:0.5rem; background:#f9fafb;">
            <button type="button" onclick="this.parentElement.remove()" style="position:absolute; top:0.5rem; right:0.5rem; color:#ef4444; background:none; border:none; cursor:pointer; font-size:0.75rem;">Remove</button>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">`;
            
        repeaterFields.forEach(f => {
            const inputType = f.type === 'textarea' ? 'textarea' : 'input';
            // FIXED: Nested under items correctly
            const input = inputType === 'textarea' 
                ? `<textarea name="sections[${sectionId}][items][${itemIndex}][${f.name}]" rows="2" style="width:100%; padding:0.5rem; border:1px solid #d1d5db; border-radius:0.375rem; box-sizing:border-box; font-family:inherit;" ${f.required ? 'required' : ''}></textarea>`
                : `<input type="text" name="sections[${sectionId}][items][${itemIndex}][${f.name}]" style="width:100%; padding:0.5rem; border:1px solid #d1d5db; border-radius:0.375rem; box-sizing:border-box;" ${f.required ? 'required' : ''}>`;
                
            html += `<div>
                <label style="display:block; font-size:0.75rem; font-weight:600; color:#4b5563; margin-bottom:0.25rem;">${f.label} ${f.required ? '<span style="color:red;">*</span>' : ''}</label>
                ${input}
            </div>`;
        });
        
        html += `</div></div>`;
        container.insertAdjacentHTML('beforeend', html);
    }
</script>
@endsection