document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('blogForm');
    const source = document.getElementById('blogContent');
    const editorHost = document.getElementById('blogContentEditor');
    const panel = document.getElementById('blogRichTextPanel');
    const toggle = document.getElementById('toggleRichTextEditor');
    const status = document.getElementById('blogRichTextStatus');
    const note = document.getElementById('blogRichTextNote');
    const errorBox = document.getElementById('blogRichTextError');
    const sectionActions = document.getElementById('blogRichTextSectionActions');
    const saveSectionButton = document.getElementById('saveBlogQuillSection');
    const cancelSectionButton = document.getElementById('cancelBlogQuillSection');
    const backButton = document.getElementById('backToBlogDetails');

    if (!form || !source || !editorHost || !panel || !toggle) return;

    const panelHome = panel.parentNode;
    const panelPlaceholder = document.createComment('Rich text editor panel home');
    panelHome.insertBefore(panelPlaceholder, panel);

    let editor = null;
    let initializationPromise = null;
    let editingSection = null;
    let sectionPanelWasOpen = false;
    const defaultNote = 'Select an image, then use Image size or Image position. Edits sync to the preview.';

    function setError(message) {
        if (errorBox) {
            errorBox.textContent = message;
            errorBox.hidden = !message;
        }
    }

    function syncEditorFromPreview(html) {
        if (!editor || editingSection || panel.hidden || typeof html !== 'string' || editor.hasFocus()) return;
        if (editor.getHtml() !== html) editor.setHtml(html);
    }

    function finishSectionEdit(saveChanges) {
        if (!editingSection || (saveChanges && !editor)) return false;

        const target = editingSection;
        const html = saveChanges ? editor.getHtmlForSave() : null;
        editingSection = null;
        target.section.classList.remove('blog-editor-section--quill-editing');
        target.content.hidden = false;
        panelHome.insertBefore(panel, panelPlaceholder.nextSibling);
        panel.hidden = !sectionPanelWasOpen;
        sectionPanelWasOpen = false;
        if (sectionActions) sectionActions.hidden = true;
        if (saveSectionButton) saveSectionButton.disabled = false;
        if (backButton) backButton.disabled = false;
        toggle.disabled = false;
        toggle.setAttribute('aria-expanded', String(!panel.hidden));
        toggle.textContent = panel.hidden ? 'Open rich text editor' : 'Close rich text editor';
        if (note) note.textContent = defaultNote;

        if (saveChanges) {
            window.dispatchEvent(new CustomEvent('blog-quill-section-saved', {
                detail: { section: target.section, html },
            }));
        } else if (editor) {
            editor.setHtml(source.value);
        }

        return true;
    }

    function initializeEditor() {
        if (editor || initializationPromise) return initializationPromise;

        if (status) {
            status.textContent = 'Loading rich text editor...';
            status.hidden = false;
        }

        initializationPromise = import('./blog-quill.js')
            .then(({ createBlogQuill }) => createBlogQuill(editorHost, source, {
                onChange(html) {
                    if (editingSection) return;
                    source.value = html;
                    window.dispatchEvent(new CustomEvent('blog-rich-content-changed', {
                        detail: { html },
                    }));
                },
                onError: setError,
            }))
            .then((instance) => {
                editor = instance;
                if (status) status.hidden = true;
                if (errorBox) errorBox.hidden = true;
                return editor;
            })
            .catch((error) => {
                console.error('Quill initialization failed:', error);
                editorHost.replaceChildren();
                if (status) status.hidden = true;
                setError('The rich text editor could not be loaded. You can still edit the article in the website preview.');
                initializationPromise = null;
                return null;
            });

        return initializationPromise;
    }

    toggle.addEventListener('click', () => {
        panel.hidden = !panel.hidden;
        const isOpen = !panel.hidden;
        toggle.setAttribute('aria-expanded', String(isOpen));
        toggle.textContent = isOpen ? 'Close rich text editor' : 'Open rich text editor';

        if (isOpen) {
            if (editor && !editingSection) syncEditorFromPreview(source.value);
            else initializeEditor();
        }
    });

    window.addEventListener('blog-quill-edit-section', (event) => {
        const section = event.detail?.section;
        const content = section?.querySelector('.blog-editor-section__content');
        if (!content) return;
        if (editingSection) {
            setError('Save or cancel the current section edit before opening another section.');
            return;
        }

        editingSection = { section, content };
        sectionPanelWasOpen = !panel.hidden;
        section.classList.add('blog-editor-section--quill-editing');
        content.hidden = true;
        section.insertBefore(panel, content);
        panel.hidden = false;
        if (backButton) backButton.disabled = true;
        toggle.disabled = true;
        toggle.setAttribute('aria-expanded', 'true');
        toggle.textContent = 'Editing one section';
        if (note) note.textContent = 'Select an image and use Image size or Image position; save this section to apply changes.';
        if (sectionActions) sectionActions.hidden = false;
        if (saveSectionButton) saveSectionButton.disabled = true;

        initializeEditor().then((instance) => {
            if (!instance) {
                finishSectionEdit(false);
                return;
            }
            if (editingSection?.content !== content) return;

            instance.setHtml(content.innerHTML);
            instance.focus();
            if (saveSectionButton) saveSectionButton.disabled = false;
            if (errorBox) errorBox.hidden = true;
        });
    });

    if (saveSectionButton) {
        saveSectionButton.addEventListener('click', () => finishSectionEdit(true));
    }
    if (cancelSectionButton) {
        cancelSectionButton.addEventListener('click', () => finishSectionEdit(false));
    }

    window.addEventListener('blog-preview-content-changed', (event) => {
        syncEditorFromPreview(event.detail?.html);
    });

    form.addEventListener('submit', (event) => {
        if (editingSection && !editor) {
            event.preventDefault();
            initializeEditor().then((instance) => {
                if (!instance || !editingSection) return;
                finishSectionEdit(true);
                form.requestSubmit(form.querySelector('.blog-editor-save'));
            });
            return;
        }
        if (editingSection) finishSectionEdit(true);
        if (!editor || panel.hidden) return;

        if (!editor.hasFocus()) syncEditorFromPreview(source.value);
        const html = editor.getHtmlForSave();
        source.value = html;
        window.dispatchEvent(new CustomEvent('blog-rich-content-changed', {
            detail: { html },
        }));
    }, true);
});
