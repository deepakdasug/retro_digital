@php
    $prefix = 'sections['.$section->id.'][content]';
    $schema = old('sections.'.$section->id.'.content.schema', $data['schema'] ?? []);
    $values = old('sections.'.$section->id.'.content.values', $data['values'] ?? []);
@endphp
<div class="seo-field seo-field-full custom-section-builder"
    data-custom-builder
    data-prefix="{{ $prefix }}"
    data-schema="{{ json_encode($schema) }}"
    data-values="{{ json_encode($values) }}">

    <!-- Compact Toolbar: Title & Starter Templates -->
    <div class="csb-toolbar">
        <div class="csb-toolbar-info">
            <span class="csb-badge"><i class="fa-solid fa-code"></i> Custom Section Builder</span>
            <span class="csb-hint">Write raw HTML & CSS below, or click a template to start:</span>
        </div>
        <div class="csb-presets">
            <button type="button" class="csb-preset-btn" data-preset="hero" title="Load Hero Banner"><i class="fa-solid fa-star"></i> Hero Banner</button>
            <button type="button" class="csb-preset-btn" data-preset="cards" title="Load 3-Card Grid"><i class="fa-solid fa-grip"></i> 3-Card Grid</button>
            <button type="button" class="csb-preset-btn" data-preset="cta" title="Load Gradient CTA"><i class="fa-solid fa-bullhorn"></i> Gradient CTA</button>
            <button type="button" class="csb-preset-btn" data-preset="blank" title="Start with clean blank canvas"><i class="fa-regular fa-file"></i> Blank Canvas</button>
        </div>
    </div>

    <!-- Clean Tab Navigation -->
    <div class="csb-tabs">
        <button type="button" class="csb-tab-btn is-active" data-tab="html">
            <i class="fa-brands fa-html5" style="color: #ea580c;"></i> HTML Layout
        </button>
        <button type="button" class="csb-tab-btn" data-tab="css">
            <i class="fa-brands fa-css3-alt" style="color: #2563eb;"></i> Custom CSS
        </button>
        <button type="button" class="csb-tab-btn" data-tab="js">
            <i class="fa-brands fa-js" style="color: #ca8a04;"></i> JavaScript
        </button>
        <button type="button" class="csb-tab-btn" data-tab="media">
            <i class="fa-solid fa-photo-film" style="color: #166534;"></i> Upload Images & Media
        </button>
        <button type="button" class="csb-tab-btn" data-tab="vars">
            <i class="fa-solid fa-sliders" style="color: #64748b;"></i> Dynamic Fields (Optional)
        </button>
    </div>

    <!-- Tab 1: HTML Layout -->
    <div class="csb-pane is-active" data-pane="html">
        <div class="csb-pane-header">
            <label><i class="fa-brands fa-html5" style="color: #ea580c;"></i> HTML Code</label>
            <span class="csb-pane-tip">Press <strong>[Tab]</strong> to indent. Real content can be written directly inside HTML tags.</span>
        </div>
        <textarea name="{{ $prefix }}[html]" class="csb-code-textarea" rows="12" spellcheck="false" placeholder="<!-- Write your raw HTML here -->">{{ old('sections.'.$section->id.'.content.html', $data['html'] ?? '') }}</textarea>
    </div>

    <!-- Tab 2: Custom CSS -->
    <div class="csb-pane" data-pane="css" hidden>
        <div class="csb-pane-header">
            <label><i class="fa-brands fa-css3-alt" style="color: #2563eb;"></i> CSS Styles</label>
            <span class="csb-pane-tip">Styles written here are automatically scoped to this section.</span>
        </div>
        <textarea name="{{ $prefix }}[css]" class="csb-code-textarea" rows="12" spellcheck="false" placeholder="/* Write custom CSS rules here */">{{ old('sections.'.$section->id.'.content.css', $data['css'] ?? '') }}</textarea>
    </div>

    <!-- Tab 3: Custom JS -->
    <div class="csb-pane" data-pane="js" hidden>
        <div class="csb-pane-header">
            <label><i class="fa-brands fa-js" style="color: #ca8a04;"></i> JavaScript Code (Optional)</label>
            <span class="csb-pane-tip">Runs automatically when the section loads. Access dynamic data at <code>window.sectionData</code>.</span>
        </div>
        <textarea name="{{ $prefix }}[js]" class="csb-code-textarea" rows="8" spellcheck="false" placeholder="// Optional JavaScript">{{ old('sections.'.$section->id.'.content.js', $data['js'] ?? '') }}</textarea>
    </div>

    <!-- Tab 4: Upload Images & Media -->
    <div class="csb-pane" data-pane="media" hidden>
        <div class="csb-media-uploader">
            <div class="csb-upload-dropzone">
                <i class="fa-solid fa-cloud-arrow-up csb-upload-icon"></i>
                <div class="csb-upload-prompt">
                    <strong>Choose an image to upload from your computer</strong>
                    <span>Supports JPG, PNG, WEBP, GIF, SVG (up to 20MB)</span>
                </div>
                <input type="file" class="csb-upload-file-input" accept="image/jpeg,image/png,image/webp,image/gif,image/svg+xml">
            </div>
            <div class="csb-media-status" data-media-status hidden></div>
            <div class="csb-media-gallery" data-media-gallery>
                <!-- Uploaded images appear here with [Insert <img> into HTML] button -->
            </div>
        </div>
    </div>

    <!-- Tab 5: Dynamic Fields (Optional) -->
    <div class="csb-pane" data-pane="vars" hidden>
        <div class="csb-fields-panel">
            <div class="csb-fields-header">
                <p>Define dynamic variables (e.g. <code>@{{ heading }}</code>) to bind inputs. If not needed, you can simply write text directly in the HTML tab.</p>
                <button type="button" class="seo-section-preview-button csb-add-field-btn" data-add-custom-field>
                    <i class="fa-solid fa-plus"></i> Add field
                </button>
            </div>
            <div data-custom-fields class="csb-fields-list"></div>
        </div>
    </div>
</div>
