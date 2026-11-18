import Quill from 'quill';
import QuillTableBetter from 'quill-table-better';
import 'quill/dist/quill.snow.css';
import 'quill-table-better/dist/quill-table-better.css';

Quill.register({
    'modules/table-better': QuillTableBetter,
}, true);

const imagePositions = ['left', 'center', 'right'];
const ImageBlot = Quill.import('formats/image');

class BlogImageBlot extends ImageBlot {
    static formats(domNode) {
        const formats = super.formats(domNode);
        const position = domNode.getAttribute('data-image-position');
        if (imagePositions.includes(position)) formats.imagePosition = position;
        return formats;
    }

    format(name, value) {
        if (name === 'imagePosition') {
            if (imagePositions.includes(value)) this.domNode.setAttribute('data-image-position', value);
            else this.domNode.removeAttribute('data-image-position');
            return;
        }

        super.format(name, value);
    }
}

Quill.register(BlogImageBlot, true);

export function createBlogQuill(editorHost, source, callbacks) {
    let quill;
    let lastSelection = null;
    let clickedImageIndex = null;
    let imageSizeSelect = null;
    let imagePositionSelect = null;
    let applyingPreviewHtml = false;
    const imageSizes = ['', '25%', '50%', '75%', '100%'];

    function reportError(error) {
        callbacks.onError(error instanceof Error ? error.message : 'Image upload failed.');
    }

    async function uploadImage(file, index, length) {
        const formData = new FormData();
        formData.append('upload', file);

        const response = await fetch(source.dataset.uploadUrl, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': source.dataset.csrfToken,
                Accept: 'application/json',
            },
            body: formData,
        });
        const result = await response.json().catch(() => null);

        if (!response.ok) {
            throw new Error(result?.error?.message || 'Image upload failed.');
        }

        if (typeof result?.url !== 'string' || !result.url) {
            throw new Error('The image upload response did not contain an image URL.');
        }

        if (length) quill.deleteText(index, length, Quill.sources.USER);
        quill.insertEmbed(index, 'image', result.url, Quill.sources.USER);
        quill.setSelection(index + 1, 0, Quill.sources.SILENT);
        callbacks.onError('');
    }

    function chooseImage() {
        const selection = quill.getSelection() || lastSelection;
        const index = selection?.index ?? Math.max(0, quill.getLength() - 1);
        const length = selection?.length ?? 0;
        const input = document.createElement('input');

        input.type = 'file';
        input.accept = 'image/jpeg,image/png,image/webp,image/gif,image/svg+xml';
        input.addEventListener('change', async () => {
            const file = input.files?.[0];
            if (!file) {
                input.remove();
                return;
            }

            try {
                await uploadImage(file, index, length);
            } catch (error) {
                console.error('Blog image upload failed:', error);
                reportError(error);
            } finally {
                input.remove();
            }
        }, { once: true });

        document.body.appendChild(input);
        input.click();
    }

    function selectedImageIndex() {
        if (clickedImageIndex !== null) return clickedImageIndex;

        const selection = quill.getSelection() || lastSelection;
        if (!selection) return null;

        for (const index of [selection.index, selection.index - 1]) {
            if (index < 0 || index >= quill.getLength()) continue;
            const [leaf, offset] = quill.getLeaf(index);
            if (leaf?.domNode?.tagName === 'IMG') return index - offset;
        }

        return null;
    }

    function setSelectedImageSize(size) {
        const index = selectedImageIndex();
        if (!imageSizes.includes(size)) return;
        if (index === null) {
            callbacks.onError('Select an image in the editor before changing its size.');
            return;
        }

        quill.formatText(index, 1, 'width', size || false, Quill.sources.USER);
        callbacks.onError('');
    }

    function setSelectedImagePosition(position) {
        const index = selectedImageIndex();
        if (!imagePositions.includes(position)) return;
        if (index === null) {
            callbacks.onError('Select an image in the editor before changing its position.');
            return;
        }

        quill.formatText(index, 1, 'imagePosition', position, Quill.sources.USER);
        callbacks.onError('');
    }

    function updateImageControls() {
        const index = selectedImageIndex();
        if (imageSizeSelect) imageSizeSelect.disabled = index === null;
        if (imagePositionSelect) imagePositionSelect.disabled = index === null;
        if (index === null) return;

        const [leaf] = quill.getLeaf(index);
        if (leaf?.domNode?.tagName !== 'IMG') return;

        const width = leaf.domNode.getAttribute('width') || '';
        if (imageSizes.includes(width) && imageSizeSelect) imageSizeSelect.value = width;

        const position = leaf.domNode.getAttribute('data-image-position') || 'left';
        if (imagePositions.includes(position) && imagePositionSelect) {
            imagePositionSelect.value = position;
        }
    }

    function addImageControls() {
        const toolbar = editorHost.parentElement?.querySelector('.ql-toolbar');
        if (!toolbar) return;

        const controls = document.createElement('span');
        controls.className = 'ql-formats blog-quill-image-controls';

        function addSelect(labelText, values, selectedValue, onChange) {
            const label = document.createElement('label');
            label.className = 'blog-quill-image-control';
            label.append(document.createTextNode(labelText));

            const select = document.createElement('select');
            select.setAttribute('aria-label', labelText);
            values.forEach((value) => {
                const option = document.createElement('option');
                option.value = value;
                option.textContent = value
                    ? (imagePositions.includes(value) ? value[0].toUpperCase() + value.slice(1) : value)
                    : 'Default';
                select.appendChild(option);
            });
            select.value = selectedValue;
            select.disabled = true;
            select.addEventListener('change', () => onChange(select.value));
            label.appendChild(select);
            controls.appendChild(label);

            return select;
        }

        imageSizeSelect = addSelect('Image size', imageSizes, '', setSelectedImageSize);
        imagePositionSelect = addSelect('Image position', imagePositions, 'left', setSelectedImagePosition);
        toolbar.appendChild(controls);
    }

    quill = new Quill(editorHost, {
        theme: 'snow',
        placeholder: 'Write and format your article content here...',
        modules: {
            toolbar: {
                container: [
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ header: [2, 3, false] }],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    [{ indent: '-1' }, { indent: '+1' }],
                    [{ align: [] }],
                    [{ color: [] }, { background: [] }],
                    ['blockquote', 'link', 'image'],
                    ['table-better'],
                    ['clean'],
                ],
                handlers: {
                    image: chooseImage,
                },
            },
            table: false,
            'table-better': {
                language: 'en_US',
                menus: ['column', 'row', 'merge', 'table', 'cell', 'wrap', 'copy', 'delete'],
                toolbarTable: true,
            },
            keyboard: {
                bindings: QuillTableBetter.keyboardBindings,
            },
        },
    });
    editorHost.parentElement?.querySelector('.ql-align.ql-picker')?.setAttribute('title', 'Text alignment');
    addImageControls();

    quill.root.addEventListener('click', (event) => {
        const target = event.target instanceof Element ? event.target.closest('img') : null;
        const blot = target && quill.root.contains(target) ? Quill.find(target) : null;
        clickedImageIndex = blot ? quill.getIndex(blot) : null;
        updateImageControls();
    });
    quill.root.addEventListener('keydown', () => {
        clickedImageIndex = null;
        updateImageControls();
    });

    const initialDelta = quill.clipboard.convert({ html: source.value });
    if (initialDelta.ops.length) {
        const [range] = quill.selection.getRange();
        quill.updateContents(initialDelta, Quill.sources.USER);
        quill.setSelection(
            initialDelta.length() - (range?.length || 0),
            Quill.sources.SILENT,
        );
        quill.scrollSelectionIntoView();
    }

    quill.on('selection-change', (range) => {
        if (range) lastSelection = range;
        updateImageControls();
    });

    quill.on('text-change', (delta, oldDelta, changeSource) => {
        if (changeSource !== Quill.sources.USER || applyingPreviewHtml) return;
        callbacks.onChange(quill.getSemanticHTML());
    });

    return {
        getHtml() {
            return quill.getSemanticHTML();
        },
        getHtmlForSave() {
            quill.getModule('table-better').deleteTableTemporary();
            return quill.getSemanticHTML();
        },
        focus() {
            quill.focus();
            quill.setSelection(Math.max(0, quill.getLength() - 1), 0, Quill.sources.SILENT);
        },
        hasFocus() {
            return quill.hasFocus();
        },
        setHtml(html) {
            applyingPreviewHtml = true;
            try {
                quill.setText('', Quill.sources.SILENT);
                const delta = quill.clipboard.convert({ html });
                if (delta.ops.length) {
                    quill.updateContents(delta, Quill.sources.USER);
                }
            } finally {
                applyingPreviewHtml = false;
            }
        },
    };
}
