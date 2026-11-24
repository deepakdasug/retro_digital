<iframe
    sandbox="allow-scripts"
    srcdoc="{{ $section?->srcdoc ?? (new \App\Models\ServiceSection(['content' => $data]))->srcdoc }}"
    loading="lazy"
    referrerpolicy="no-referrer"
    style="width:100%;border:0;height:500px;display:block;"
    title="Custom page section"
></iframe>
