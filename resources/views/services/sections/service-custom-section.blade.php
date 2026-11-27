@php
    $frameId = 'custom-frame-' . ($section->id ?? uniqid());
@endphp
<div class="custom-section-container" style="width:100%;position:relative;clear:both;">
    <iframe
        id="{{ $frameId }}"
        name="{{ $frameId }}"
        class="custom-section-frame"
        sandbox="allow-scripts allow-same-origin allow-forms allow-popups"
        srcdoc="{{ $section?->srcdoc ?? (new \App\Models\ServiceSection(['content' => $data]))->srcdoc }}"
        loading="lazy"
        referrerpolicy="no-referrer"
        style="width:100%;border:0;display:block;min-height:80px;height:200px;overflow:hidden;"
        title="Custom page section"
    ></iframe>
</div>
