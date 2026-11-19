(function () {
    function movePageFields() {
        const general = document.getElementById('page-general-section');
        const contentFields = document.getElementById('page-content-fields');
        const metadataFields = document.getElementById('page-meta-fields');
        const slugInput = document.getElementById('slugInput');
        const slugColumn = slugInput && slugInput.closest('.wp-slug-group')
            ? slugInput.closest('.wp-slug-group').parentElement
            : null;

        if (metadataFields && slugColumn) {
            const slugRow = slugColumn.parentElement;
            const metadataSection = document.createElement('section');
            metadataSection.className = 'wp-form-section';
            metadataSection.innerHTML = '<div class="wp-section-header"><div><h2 class="wp-section-title">Page URL</h2><p class="wp-section-subtitle">Set the public address for this page.</p></div></div>';
            metadataSection.appendChild(slugColumn);
            metadataFields.appendChild(metadataSection);
            if (slugRow) slugRow.style.gridTemplateColumns = '1fr';
        }

        if (general && contentFields) contentFields.appendChild(general);

        const sectionsCard = document.getElementById('page-sections-card');
        const sectionFields = document.getElementById('page-section-fields');
        if (sectionsCard && sectionFields) sectionFields.appendChild(sectionsCard);

        const metadataSections = [
            document.getElementById('page-seo-section'),
            document.getElementById('page-publication-section')
        ];
        metadataSections.forEach(section => {
            if (section && metadataFields) metadataFields.appendChild(section);
        });
    }

    function readFile(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result);
            reader.onerror = () => reject(new Error('Could not read the selected image for preview.'));
            reader.readAsDataURL(file);
        });
    }

    async function formDataForPreview(form) {
        const data = new FormData(form);
        data.delete('_method');

        const imageFiles = Array.from(form.querySelectorAll('input[type="file"]'))
            .filter(input => input.files && input.files.length);

        for (const input of form.querySelectorAll('input[type="file"]')) {
            data.delete(input.name);
        }

        for (const input of imageFiles) {
            const file = input.files[0];
            const dataUrl = await readFile(file);
            let fieldName = input.name;
            if (fieldName === 'hero_image_file') {
                fieldName = 'hero_image';
            } else {
                fieldName = fieldName
                    .replace('[files][', '[fields][')
                    .replace('[item_files][', '[items][');
            }
            data.set(fieldName, dataUrl);
        }

        data.set('preview_page_id', form.dataset.previewPageId || '0');
        return data;
    }

    function createControl(doc, label, action, sectionId) {
        const button = doc.createElement('button');
        button.type = 'button';
        button.className = 'admin-page-editor-control';
        button.dataset.editorAction = action;
        if (sectionId !== null) button.dataset.sectionId = sectionId;
        button.textContent = label;
        button.style.cssText = 'padding:5px 8px;border:1px solid #d4dfd6;border-radius:5px;background:#fff;color:#23462f;font:600 12px/1.2 Inter,system-ui,sans-serif;cursor:pointer;box-shadow:0 2px 6px rgba(0,0,0,.12);';
        return button;
    }

    function addEditorControls(iframe) {
        const doc = iframe.contentDocument;
        if (!doc) return;

        doc.querySelectorAll('.admin-page-editor-controls').forEach(element => element.remove());
        const hero = doc.querySelector('[data-admin-preview-hero]');
        if (hero) {
            hero.style.position = 'relative';
            const controls = doc.createElement('div');
            controls.className = 'admin-page-editor-controls';
            controls.style.cssText = 'position:absolute;top:10px;right:10px;z-index:9999;display:flex;gap:5px;padding:5px;background:rgba(31,51,38,.85);border-radius:7px;';
            if (hero.querySelector('[data-admin-preview-field]')) {
                controls.appendChild(createControl(doc, 'Edit page text', 'edit-inline', null));
            }
            controls.appendChild(createControl(doc, 'Edit page details', 'edit-page', null));
            hero.appendChild(controls);
        }

        doc.querySelectorAll('[data-admin-preview-section]').forEach(section => {
            section.style.position = 'relative';
            section.querySelectorAll('.faq-item').forEach(item => item.classList.add('faq-active'));
            const sectionId = section.dataset.adminPreviewSection;
            const controls = doc.createElement('div');
            controls.className = 'admin-page-editor-controls';
            controls.style.cssText = 'position:absolute;top:10px;right:10px;z-index:9999;display:flex;flex-wrap:wrap;justify-content:flex-end;gap:5px;padding:5px;background:rgba(31,51,38,.85);border-radius:7px;max-width:100%;';
            if (section.querySelector('[data-admin-preview-field]')) {
                controls.appendChild(createControl(doc, 'Edit text', 'edit-inline', sectionId));
            }
            controls.appendChild(createControl(doc, 'Edit fields', 'edit-section', sectionId));
            if (sectionId !== '9999') {
                controls.appendChild(createControl(doc, 'Add before', 'insert-section', sectionId));
                controls.appendChild(createControl(doc, '↑', 'move-up', sectionId));
                controls.appendChild(createControl(doc, '↓', 'move-down', sectionId));
                controls.appendChild(createControl(doc, 'Delete', 'delete-section', sectionId));
            }
            section.appendChild(controls);
        });
    }

    function matchingSectionBlock(sectionId) {
        return Array.from(document.querySelectorAll('#sections-container .section-block')).find(block => {
            const typeInput = block.querySelector('input[name]');
            return typeInput && typeInput.name === 'sections[' + sectionId + '][type]';
        });
    }

    function scrollToEditorField(element) {
        if (!element) return;
        element.scrollIntoView({ behavior: 'smooth', block: 'center' });
        element.style.boxShadow = '0 0 0 4px rgba(22,163,74,.35)';
        window.setTimeout(() => { element.style.boxShadow = ''; }, 1800);
    }

    function previewInputForField(fieldName) {
        if (!fieldName) return null;
        return Array.from(document.querySelectorAll('#wizardForm [name]'))
            .find(field => field.name === fieldName) || null;
    }

    function finishInlineEdit(root, button) {
        root.querySelectorAll('[data-admin-preview-field][contenteditable="true"]').forEach(field => {
            const input = previewInputForField(field.dataset.adminPreviewField);
            if (input) {
                input.value = field.innerText.trim();
                input.dispatchEvent(new Event('input', { bubbles: true }));
            }
            field.removeAttribute('contenteditable');
            field.style.outline = '';
            field.style.outlineOffset = '';
            field.style.cursor = '';
        });
        button.textContent = button.dataset.defaultLabel || 'Edit text';
        button.dataset.editing = 'false';
        if (typeof window.refreshVisualPagePreview === 'function') {
            window.refreshVisualPagePreview();
        }
    }

    function handleInlineEdit(iframe, sectionId, button) {
        const doc = iframe.contentDocument;
        if (!doc) return;

        const root = sectionId === null
            ? doc.querySelector('[data-admin-preview-hero]')
            : doc.querySelector('[data-admin-preview-section="' + sectionId + '"]');
        if (!root) return;

        if (button.dataset.editing === 'true') {
            finishInlineEdit(root, button);
            return;
        }

        const fields = Array.from(root.querySelectorAll('[data-admin-preview-field]'))
            .filter(field => previewInputForField(field.dataset.adminPreviewField));
        if (!fields.length) {
            const block = matchingSectionBlock(sectionId);
            scrollToEditorField(block || document.getElementById('page-general-section'));
            return;
        }

        fields.forEach(field => {
            field.setAttribute('contenteditable', 'true');
            field.style.outline = '2px dashed #25d366';
            field.style.outlineOffset = '3px';
            field.style.cursor = 'text';
            if (field.closest('button') && field.dataset.adminEditClickGuard !== 'true') {
                field.dataset.adminEditClickGuard = 'true';
                field.addEventListener('click', function (event) {
                    if (field.getAttribute('contenteditable') === 'true') event.stopPropagation();
                });
            }
        });

        button.dataset.defaultLabel = button.textContent;
        button.dataset.editing = 'true';
        button.textContent = 'Done';
        fields[0].focus();
    }

    function handlePreviewAction(action, sectionId, iframe, button) {
        if (action === 'edit-page') {
            scrollToEditorField(document.getElementById('page-general-section'));
            return;
        }

        if (action === 'edit-inline') {
            handleInlineEdit(iframe, sectionId, button);
            return;
        }

        if (sectionId === '9999') {
            scrollToEditorField(document.getElementById('wp-faqs-section'));
            return;
        }

        const block = matchingSectionBlock(sectionId);
        if (!block) return;

        if (action === 'edit-section') scrollToEditorField(block);
        if (action === 'insert-section') {
            window.wpInsertBeforeSectionId = block.id;
            openTemplateCatalogModal();
        }
        if (action === 'move-up' && typeof moveSectionUp === 'function') moveSectionUp(block.id);
        if (action === 'move-down' && typeof moveSectionDown === 'function') moveSectionDown(block.id);
        if (action === 'delete-section' && typeof removeSection === 'function') removeSection(block.id);
    }

    document.addEventListener('DOMContentLoaded', function () {
        movePageFields();

        const form = document.getElementById('wizardForm');
        const iframe = document.getElementById('web-page-live-preview');
        const errorMessage = document.getElementById('web-page-preview-error');
        const viewport = document.querySelector('.visual-page-preview__viewport');
        if (!form || !iframe || !errorMessage || !viewport) return;

        document.querySelectorAll('[data-editor-tab]').forEach(tab => {
            tab.addEventListener('click', function () {
                const selectedPanel = tab.dataset.editorTab === 'settings'
                    ? 'page-settings-panel'
                    : 'page-content-panel';
                document.querySelectorAll('[data-editor-tab]').forEach(otherTab => {
                    otherTab.setAttribute('aria-selected', String(otherTab === tab));
                });
                document.querySelectorAll('.web-page-editor-panel').forEach(panel => {
                    panel.hidden = panel.id !== selectedPanel;
                });
            });
        });

        let renderTimer = null;
        let renderSequence = 0;

        async function renderPreview() {
            const sequence = ++renderSequence;
            errorMessage.hidden = true;
            try {
                const data = await formDataForPreview(form);
                const response = await fetch(iframe.dataset.previewUrl, {
                    method: 'POST',
                    headers: {
                        'Accept': 'text/html',
                        'X-CSRF-TOKEN': iframe.dataset.csrfToken
                    },
                    body: data,
                    credentials: 'same-origin'
                });
                if (!response.ok) {
                    throw new Error('The live page preview could not be rendered (HTTP ' + response.status + ').');
                }
                const html = await response.text();
                if (sequence !== renderSequence) return;
                const previewDocument = new DOMParser().parseFromString(html, 'text/html');
                previewDocument.querySelectorAll('script').forEach(script => script.remove());
                iframe.srcdoc = '<!doctype html>' + previewDocument.documentElement.outerHTML;
            } catch (error) {
                if (sequence !== renderSequence) return;
                errorMessage.textContent = error.message || 'The live page preview could not be rendered.';
                errorMessage.hidden = false;
            }
        }

        function schedulePreview() {
            window.clearTimeout(renderTimer);
            renderTimer = window.setTimeout(renderPreview, 300);
        }

        iframe.addEventListener('load', function () {
            try {
                addEditorControls(iframe);
                iframe.contentDocument.addEventListener('click', function (event) {
                    const button = event.target.closest('.admin-page-editor-control');
                    if (!button) return;
                    event.preventDefault();
                    event.stopPropagation();
                    handlePreviewAction(
                        button.dataset.editorAction,
                        button.dataset.sectionId === undefined ? null : button.dataset.sectionId,
                        iframe,
                        button
                    );
                });
                iframe.contentDocument.addEventListener('input', function (event) {
                    const field = event.target.closest('[data-admin-preview-field][contenteditable="true"]');
                    if (!field) return;
                    const input = previewInputForField(field.dataset.adminPreviewField);
                    if (input) input.value = field.innerText;
                });
            } catch (error) {
                errorMessage.textContent = 'The live preview loaded, but editing controls could not be attached.';
                errorMessage.hidden = false;
            }
        });

        form.addEventListener('input', schedulePreview);
        form.addEventListener('change', schedulePreview);
        const sectionsContainer = document.getElementById('sections-container');
        if (sectionsContainer) {
            new MutationObserver(schedulePreview).observe(sectionsContainer, { childList: true });
        }
        form.addEventListener('click', function (event) {
            const viewportButton = event.target.closest('[data-preview-width]');
            if (!viewportButton) return;
            iframe.style.width = viewportButton.dataset.previewWidth;
            iframe.style.minWidth = viewportButton.dataset.previewWidth;
        });

        window.refreshVisualPagePreview = schedulePreview;
        schedulePreview();
    });
})();
