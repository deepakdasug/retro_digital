@foreach($sections as $section)
    @php
        $template = config("section_templates.{$section->section_type}");
        if (!$template || empty($template['view'])) continue;

        $data = is_array($section->content) ? $section->content : [];
        $isInactive = !($section->is_active ?? true);
    @endphp

    @if(!empty($isAdmin))
        {{-- Admin Wrapper --}}
        <div class="admin-section-wrapper {{ $isInactive ? 'section-inactive' : '' }}">
            
            {{-- Hidden Status Badge --}}
            @if($isInactive)
                <div class="position-absolute top-0 start-50 translate-middle-x bg-dark text-white px-3 py-1 rounded-bottom shadow-sm" style="z-index: 10; font-size: 0.8rem;">
                    <i class="bi bi-eye-slash"></i> Hidden from Public
                </div>
            @endif

            {{-- Floating Action Toolbar --}}
            <div class="admin-controls shadow">
                {{-- Drag Handle (visual only for now) --}}
                <div class="drag-handle text-muted px-2 cursor-grab" title="Drag to reorder">
                    <i class="bi bi-grip-vertical fs-5"></i>
                </div>

                <div class="vr mx-1"></div>

                {{-- Template Name --}}
                <span class="badge bg-light text-dark border px-2 py-1">
                    {{ $template['name'] }}
                </span>

                <div class="vr mx-1"></div>

                {{-- Action Buttons --}}
                <button class="btn btn-sm btn-light text-primary" title="Edit Content">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <button class="btn btn-sm btn-light text-danger" title="Delete Section">
                    <i class="bi bi-trash3"></i>
                </button>
                
                <div class="vr mx-1"></div>

                {{-- Sorting Buttons --}}
                <button class="btn btn-sm btn-light" title="Move Up">
                    <i class="bi bi-arrow-up"></i>
                </button>
                <button class="btn btn-sm btn-light" title="Move Down">
                    <i class="bi bi-arrow-down"></i>
                </button>
            </div>
    @else
        {{-- Public View: Skip inactive sections --}}
        @if($isInactive) @continue @endif
    @endif

    {{-- Render the actual section content --}}
    @include($template['view'], ['section' => $section, 'sectionType' => $section->section_type, 'data' => $data])

    @if(!empty($isAdmin))
        </div> {{-- End Admin Wrapper --}}
    @endif
@endforeach
