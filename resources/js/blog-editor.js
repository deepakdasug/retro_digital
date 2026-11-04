import {
    ClassicEditor,
    Essentials,
    Paragraph,
    Heading,
    Bold,
    Italic,
    Underline,
    Link,
    List,
    BlockQuote,
    Table,
    TableToolbar,
} from 'ckeditor5';

import 'ckeditor5/ckeditor5.css';

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('blogForm');
    const source = document.getElementById('blogContent');
    const editorHost = document.getElementById('blogContentEditor');
    const fallbackMessage = document.getElementById('blogEditorFallback');

    if (!form || !source || !editorHost) return;

    ClassicEditor.create({
        attachTo: editorHost,
        licenseKey: 'GPL',
        plugins: [
            Essentials,
            Paragraph,
            Heading,
            Bold,
            Italic,
            Underline,
            Link,
            List,
            BlockQuote,
            Table,
            TableToolbar,
        ],
        toolbar: [
            'undo', 'redo', '|', 'heading', '|', 'bold', 'italic', 'underline', 'link', '|',
            'bulletedList', 'numberedList', 'blockQuote', 'insertTable',
        ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
            ],
        },
        table: { contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells'] },
        root: { placeholder: 'Write your article content here...' },
    }).then((editor) => {
        editor.setData(source.value);
        source.hidden = true;
        editorHost.classList.remove('ck-editor-loading');
        if (fallbackMessage) fallbackMessage.hidden = true;

        form.addEventListener('submit', () => {
            source.value = editor.getData();
        });
    }).catch((error) => {
        console.error('CKEditor could not be initialized:', error);
        editorHost.hidden = true;
        source.hidden = false;
        if (fallbackMessage) fallbackMessage.hidden = false;
    });
});
