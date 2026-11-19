@push('styles')
<style>
/* ============================================================
   WEB PAGE EDITOR — TWO-STEP FLOW
   Step 1: compact settings + sections builder
   Step 2: full-width live page editor (mirrors blog editor UX)
   ============================================================ */

/* Hide panels not in use */
.wp-editor-step[hidden] { display: none !important; }

/* ── Step 1: existing form layout unchanged ── */

/* ── Step 2: full-width page editor ── */
.wp-page-editor-active .wp-editor-wrap { background: #f1f5f9; }

/* Sticky top toolbar (mirrors .blog-editor-toolbar) */
.wp-page-editor-toolbar {
    position: sticky;
    top: 0;
    z-index: 200;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding: 0.75rem 1.25rem;
    background: #ffffff;
    border: 1px solid #dfe9e1;
    border-radius: 0.75rem;
    box-shadow: 0 4px 14px rgba(24, 55, 34, 0.1);
    margin-bottom: 0.85rem;
    flex-wrap: wrap;
}
.wp-page-editor-toolbar__left { display: flex; align-items: center; gap: 0.75rem; }
.wp-page-editor-toolbar__left strong { font-size: 0.95rem; color: #0f172a; }
.wp-page-editor-toolbar__left p  { margin: 0; font-size: 0.78rem; color: #64748b; }
.wp-page-editor-toolbar__actions {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    align-items: center;
}
.wp-pet-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 0.4rem 0.8rem;
    border: 1px solid #cbd9ce;
    border-radius: 0.45rem;
    background: #f3f8f4;
    color: #23462f;
    font-size: 0.8rem;
    font-weight: 650;
    cursor: pointer;
    transition: background 0.15s, border-color 0.15s;
}
.wp-pet-btn:hover { background: #e8f3ea; border-color: #94c4a2; }
.wp-pet-btn--save {
    background: #16a34a;
    border-color: #15803d;
    color: #ffffff;
    box-shadow: 0 1px 3px rgba(22,163,74,0.2);
}
.wp-pet-btn--save:hover { background: #15803d; }

/* Width toggles */
.wp-pet-widths { display: flex; gap: 0.3rem; }
.wp-pet-widths button {
    padding: 0.35rem 0.6rem;
    border: 1px solid #cbd5e1;
    border-radius: 0.4rem;
    background: #fff;
    color: #334155;
    font-size: 0.75rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.15s;
}
.wp-pet-widths button:hover,
.wp-pet-widths button.active {
    background: #f0fdf4;
    border-color: #86efac;
    color: #166534;
}

/* The iframe canvas in full-editor mode */
.wp-page-editor-canvas {
    background: #fff;
    border: 1px solid #dfe9e1;
    border-radius: 0.75rem;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0,0,0,0.04);
    display: flex;
    justify-content: center;
    min-height: 80vh;
}
.wp-page-editor-canvas iframe {
    display: block;
    width: 100%;
    min-width: 100%;
    min-height: 80vh;
    height: 80vh;
    border: 0;
    background: #fff;
    transition: width 0.25s ease, min-width 0.25s ease;
}

/* Error bar */
.wp-page-editor-error {
    margin-bottom: 0.65rem;
    padding: 0.6rem 0.85rem;
    border: 1px solid #fca5a5;
    border-radius: 0.4rem;
    background: #fef2f2;
    color: #991b1b;
    font-size: 0.84rem;
    display: none;
}
.wp-page-editor-error:not([hidden]) { display: block; }

/* Keep old tab styles working (Step 1 uses them when settings tab is active) */
.web-page-editor-tabs { display: flex; gap: .5rem; margin-bottom: 1rem; }
.web-page-editor-tabs button { border: 1px solid #cbd5e1; border-radius: .5rem; padding: .65rem 1rem; background: #fff; color: #334155; font-weight: 700; cursor: pointer; }
.web-page-editor-tabs button[aria-selected="true"] { border-color: #16a34a; background: #f0fdf4; color: #166534; }
.web-page-editor-panel[hidden] { display: none; }

/* Legacy preview widget (shown inside Step 1 settings panel if needed) */
.visual-page-preview { margin-bottom: 1.5rem; padding: 1rem; border: 1px solid #dfe9e1; border-radius: .75rem; background: #fff; }
.visual-page-preview__toolbar { display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: .85rem; }
.visual-page-preview__toolbar h2 { margin: 0; color: #0f172a; font-size: 1.15rem; font-weight: 800; }
.visual-page-preview__toolbar p  { margin: .25rem 0 0; color: #64748b; font-size: .85rem; }
.visual-page-preview__sizes { display: flex; flex-wrap: wrap; gap: .4rem; }
.visual-page-preview__sizes button { border: 1px solid #cbd5e1; border-radius: .4rem; padding: .4rem .65rem; background: #fff; color: #334155; font-size: .78rem; font-weight: 700; cursor: pointer; }
.visual-page-preview__error { margin: 0 0 .75rem; padding: .65rem .8rem; border: 1px solid #fca5a5; border-radius: .4rem; background: #fef2f2; color: #991b1b; font-size: .85rem; }
</style>
@endpush

@push('scripts')
<script src="{{ asset('js/webpage-live-preview.js') }}?v={{ md5_file(public_path('js/webpage-live-preview.js')) }}"></script>
<script>
(function () {
    document.addEventListener('DOMContentLoaded', function () {

        /* ── Elements ── */
        var step1          = document.getElementById('wp-step-settings');
        var step2          = document.getElementById('wp-step-editor');
        var continueBtn    = document.getElementById('wp-continue-to-editor');
        var backBtn        = document.getElementById('wp-back-to-settings');
        var saveBtn        = document.getElementById('wp-save-btn');
        var widthBtns      = document.querySelectorAll('[data-wp-preview-width]');
        var iframe         = document.getElementById('web-page-live-preview');
        var errorEl        = document.getElementById('wp-page-editor-error');
        var editorWrap     = document.querySelector('.wp-editor-wrap');
        var addSectionBtn  = document.getElementById('wp-toolbar-add-section');

        if (!step1 || !step2 || !continueBtn) return;

        /* ── Step transition ── */
        function showEditor() {
            step1.hidden = true;
            step2.hidden = false;
            if (editorWrap) editorWrap.classList.add('wp-page-editor-active');
            window.scrollTo({ top: 0, behavior: 'smooth' });
            // Trigger a preview refresh now that the iframe is visible
            if (typeof window.refreshVisualPagePreview === 'function') {
                window.refreshVisualPagePreview();
            }
        }

        function showSettings() {
            step2.hidden = true;
            step1.hidden = false;
            if (editorWrap) editorWrap.classList.remove('wp-page-editor-active');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        continueBtn.addEventListener('click', function () {
            /* Basic validation — title is required */
            var titleInput = document.getElementById('pageTitleInput');
            if (titleInput && !titleInput.value.trim()) {
                titleInput.focus();
                titleInput.style.borderColor = '#ef4444';
                titleInput.style.boxShadow   = '0 0 0 3px rgba(239,68,68,.12)';
                var toast = document.getElementById('validationToast');
                var msg   = document.getElementById('validationToastMsg');
                if (toast && msg) {
                    msg.textContent = 'Please enter a Page Title before opening the editor.';
                    toast.style.display = 'flex';
                    window.setTimeout(function () { toast.style.display = 'none'; }, 3500);
                }
                return;
            }
            if (titleInput) {
                titleInput.style.borderColor = '';
                titleInput.style.boxShadow   = '';
            }
            showEditor();
        });

        if (backBtn) backBtn.addEventListener('click', showSettings);

        /* ── Save button in toolbar submits the main form ── */
        if (saveBtn) {
            saveBtn.addEventListener('click', function () {
                var form = document.getElementById('wizardForm');
                if (form) form.requestSubmit();
            });
        }

        /* ── Viewport width toggles ── */
        widthBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                widthBtns.forEach(function (b) { b.classList.remove('active'); });
                btn.classList.add('active');
                var w = btn.dataset.wpPreviewWidth;
                if (iframe) {
                    iframe.style.width    = w;
                    iframe.style.minWidth = w;
                }
            });
        });

        /* ── "Add Section" shortcut in toolbar ── */
        if (addSectionBtn) {
            addSectionBtn.addEventListener('click', function () {
                if (typeof openTemplateCatalogModal === 'function') openTemplateCatalogModal();
            });
        }

        /* ── Error relay from webpage-live-preview.js ── */
        if (errorEl && iframe) {
            /* webpage-live-preview.js writes to #web-page-preview-error; mirror it */
            var legacyError = document.getElementById('web-page-preview-error');
            if (legacyError) {
                new MutationObserver(function () {
                    errorEl.textContent = legacyError.textContent;
                    errorEl.hidden      = legacyError.hidden;
                }).observe(legacyError, { attributes: true, childList: true, subtree: true, characterData: true });
            }
        }
    });
})();
</script>
@endpush

{{-- ══════════════════════════════════════════════════════
     STEP 1 — SETTINGS, SECTIONS & SEO
     (All existing form sections move here via JS in
      webpage-live-preview.js → movePageFields())
     The form itself stays in create/edit.blade.php;
     this partial only injects the two-step scaffold.
     ══════════════════════════════════════════════════════ --}}
<div id="wp-step-settings">

    {{-- Step note --}}
    <div style="display:flex; align-items:center; justify-content:space-between; gap:1rem; margin-bottom:1.25rem; padding:0.85rem 1.25rem; background:#f0fdf4; border:1px solid #bbf7d0; border-radius:0.65rem;">
        <div>
            <strong style="font-size:0.9rem; color:#166534;">Step 1 of 2 — Page Settings & Sections</strong>
            <p style="margin:0.15rem 0 0; font-size:0.8rem; color:#4ade80; color:#15803d;">Fill in the page title, add content sections, and set SEO details. Then open the live page editor.</p>
        </div>
        <button type="button" id="wp-continue-to-editor" style="display:inline-flex; align-items:center; gap:0.45rem; padding:0.5rem 1.1rem; background:#16a34a; border:1px solid #15803d; border-radius:0.5rem; color:#fff; font-size:0.85rem; font-weight:700; cursor:pointer; white-space:nowrap; box-shadow:0 1px 3px rgba(22,163,74,.2); transition:background 0.15s;">
            Continue to Page Editor <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>

    {{-- ── Tab navigation (content / settings) used by webpage-live-preview.js ── --}}
    <nav class="web-page-editor-tabs" aria-label="Webpage editor sections">
        <button type="button" data-editor-tab="content"  aria-controls="page-content-panel"  aria-selected="true">Page content &amp; sections</button>
        <button type="button" data-editor-tab="settings" aria-controls="page-settings-panel" aria-selected="false">URL &amp; SEO</button>
    </nav>

    <section id="page-content-panel" class="web-page-editor-panel">
        <div id="page-content-fields"></div>
        <div id="page-section-fields"></div>
    </section>

    <section id="page-settings-panel" class="web-page-editor-panel" hidden>
        <div id="page-meta-fields"></div>
    </section>

    {{-- Bottom continue button (repeated for long forms) --}}
    <div style="display:flex; justify-content:flex-end; margin-top:1.25rem;">
        <button type="button" id="wp-continue-to-editor-bottom" onclick="document.getElementById('wp-continue-to-editor').click()" style="display:inline-flex; align-items:center; gap:0.45rem; padding:0.5rem 1.1rem; background:#16a34a; border:1px solid #15803d; border-radius:0.5rem; color:#fff; font-size:0.85rem; font-weight:700; cursor:pointer; box-shadow:0 1px 3px rgba(22,163,74,.2);">
            Continue to Page Editor <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════
     STEP 2 — FULL-WIDTH LIVE PAGE EDITOR
     ══════════════════════════════════════════════════════ --}}
<div id="wp-step-editor" hidden>

    {{-- Sticky toolbar --}}
    <div class="wp-page-editor-toolbar">
        <div class="wp-page-editor-toolbar__left">
            <div>
                <strong>Live Page Editor</strong>
                <p>Click any element on the page to edit it inline, or use the section overlay controls.</p>
            </div>
        </div>

        <div class="wp-page-editor-toolbar__actions">
            <button type="button" id="wp-back-to-settings" class="wp-pet-btn">
                <i class="fa-solid fa-arrow-left"></i> Back to Settings
            </button>

            <button type="button" id="wp-toolbar-add-section" class="wp-pet-btn">
                <i class="fa-solid fa-plus"></i> Add Section
            </button>

            <div class="wp-pet-widths" aria-label="Preview width">
                <button type="button" data-wp-preview-width="100%"  class="active" title="Desktop view">
                    <i class="fa-solid fa-desktop"></i> Desktop
                </button>
                <button type="button" data-wp-preview-width="768px" title="Tablet view">
                    <i class="fa-solid fa-tablet-screen-button"></i> Tablet
                </button>
                <button type="button" data-wp-preview-width="390px" title="Mobile view">
                    <i class="fa-solid fa-mobile-screen"></i> Mobile
                </button>
            </div>

            <button type="button" id="wp-save-btn" class="wp-pet-btn wp-pet-btn--save">
                <i class="fa-solid fa-floppy-disk"></i>
                {{ isset($webPage) && isset($webPage->id) && $webPage->id ? 'Save Changes' : 'Save & Publish' }}
            </button>
        </div>
    </div>

    {{-- Error bar --}}
    <p id="wp-page-editor-error" class="wp-page-editor-error" role="alert" hidden></p>

    {{-- Hidden legacy error element still used by webpage-live-preview.js internally --}}
    <p id="web-page-preview-error" style="display:none;" role="alert" hidden></p>

    {{-- The iframe canvas --}}
    <div class="wp-page-editor-canvas">
        <iframe
            id="web-page-live-preview"
            title="Live webpage editor canvas"
            data-preview-url="{{ route('admin.web-pages.preview') }}"
            data-csrf-token="{{ csrf_token() }}"
            data-preview-page-id="{{ isset($webPage) ? $webPage->id : 0 }}"
            sandbox="allow-same-origin"
        ></iframe>
    </div>

</div>
