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
    <h3>Section content fields</h3>
    <p>Choose the inputs this section needs. Insert HTML values with <code>@{{ heading }}</code> or read them in JavaScript as <code>window.sectionData.heading</code>. HTML values are escaped; image and video values become uploaded file URLs. Files go to public storage; their paths and section content are stored in the database.</p>
    <div data-custom-fields></div>
    <button type="button" class="seo-section-preview-button" data-add-custom-field>Add content field</button>
    <button type="button" class="seo-section-preview-button" data-theme-toggle aria-expanded="false">Theme</button>
    <div class="custom-theme-panel" data-theme-panel hidden>
        <p>Starter example using the website’s forest green, leaf green, and soft background palette. Define fields named <code>eyebrow</code>, <code>heading</code>, and <code>hero_image</code> to use this layout.</p>
        <h4>HTML</h4>
        <pre><code data-theme-html></code></pre>
        <h4>CSS</h4>
        <pre><code data-theme-css></code></pre>
    </div>
    <div class="custom-section-code">
        <label>HTML layout</label>
        <textarea name="{{ $prefix }}[html]" rows="10" required>{{ old('sections.'.$section->id.'.content.html', $data['html'] ?? '') }}</textarea>
        <label>CSS</label>
        <textarea name="{{ $prefix }}[css]" rows="7">{{ old('sections.'.$section->id.'.content.css', $data['css'] ?? '') }}</textarea>
        <label>JavaScript</label>
        <textarea name="{{ $prefix }}[js]" rows="7">{{ old('sections.'.$section->id.'.content.js', $data['js'] ?? '') }}</textarea>
    </div>
    <p data-custom-variables class="custom-section-variables"></p>
</div>
