/**
 * CKEditor 5 Blog Editor Integration
 * Pure Vanilla JavaScript implementation (No TypeScript, No build step required)
 * Local vendor asset integration with Computer Photo/Video upload & Clipboard image paste
 */

(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var textarea = document.getElementById('blogContent');
        var form = document.getElementById('blogForm');

        if (!textarea) {
            return;
        }

        if (typeof window.CKEDITOR === 'undefined' || !window.CKEDITOR.ClassicEditor) {
            console.error('CKEditor library is not loaded.');
            return;
        }

        var uploadUrl = textarea.dataset.uploadUrl || '/admin/blog/upload-media';
        var csrfToken = textarea.dataset.csrfToken || (document.querySelector('input[name="_token"]') ? document.querySelector('input[name="_token"]').value : '');

        var {
            ClassicEditor,
            Alignment,
            Autoformat,
            AutoImage,
            AutoLink,
            BlockQuote,
            Bold,
            Bookmark,
            ButtonView,
            Code,
            CodeBlock,
            Essentials,
            FindAndReplace,
            Font,
            FontFamily,
            FontSize,
            FontColor,
            FontBackgroundColor,
            Fullscreen,
            Heading,
            Highlight,
            HorizontalLine,
            GeneralHtmlSupport,
            Image,
            ImageCaption,
            ImageInsert,
            ImageResize,
            ImageStyle,
            ImageToolbar,
            ImageUpload,
            SimpleUploadAdapter,
            Base64UploadAdapter,
            PictureEditing,
            Indent,
            IndentBlock,
            Italic,
            Link,
            LinkImage,
            List,
            ListProperties,
            TodoList,
            MediaEmbed,
            PageBreak,
            Paragraph,
            PasteFromOffice,
            RemoveFormat,
            SelectAll,
            ShowBlocks,
            SourceEditing,
            SpecialCharacters,
            SpecialCharactersArrows,
            SpecialCharactersCurrency,
            SpecialCharactersEssentials,
            SpecialCharactersLatin,
            SpecialCharactersMathematical,
            SpecialCharactersText,
            Strikethrough,
            Style,
            Subscript,
            Superscript,
            Table,
            TableCaption,
            TableCellProperties,
            TableColumnResize,
            TableProperties,
            TableToolbar,
            TextTransformation,
            Underline,
            WordCount
        } = window.CKEDITOR;

        // Custom plugin to insert videos from the computer
        function UploadVideoPlugin(editor) {
            if (!ButtonView) return;

            editor.ui.componentFactory.add('uploadVideo', function (locale) {
                var view = new ButtonView(locale);
                view.set({
                    label: 'Insert Video from Computer',
                    icon: '<svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="m15 5 4-2v14l-4-2V5zm-2 11H2a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zm-5-3.5 4-2.5-4-2.5v5z"/></svg>',
                    tooltip: true
                });

                var fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.accept = 'video/mp4,video/webm,video/ogg,video/quicktime';
                fileInput.style.display = 'none';
                document.body.appendChild(fileInput);

                view.on('execute', function () {
                    fileInput.click();
                });

                fileInput.addEventListener('change', function () {
                    var file = fileInput.files && fileInput.files[0];
                    if (!file) return;

                    var formData = new FormData();
                    formData.append('upload', file);

                    view.isEnabled = false;
                    view.set({ label: 'Uploading video from computer…' });

                    fetch(uploadUrl, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(function (res) {
                        if (!res.ok) {
                            return res.json().then(function (err) {
                                throw new Error((err.error && err.error.message) || 'Upload failed');
                            });
                        }
                        return res.json();
                    })
                    .then(function (data) {
                        if (data && data.url) {
                            var videoHtml = '<figure class="media-video" style="margin: 1.5rem 0; text-align: center;"><video controls preload="metadata" style="max-width: 100%; border-radius: 8px;"><source src="' + data.url + '" type="' + (file.type || 'video/mp4') + '">Your browser does not support the video tag.</video></figure><p>&nbsp;</p>';
                            var viewFragment = editor.data.processor.toView(videoHtml);
                            var modelFragment = editor.data.toModel(viewFragment);
                            editor.model.insertContent(modelFragment);
                        } else if (data && data.error) {
                            alert(data.error.message || 'Could not upload video.');
                        }
                    })
                    .catch(function (err) {
                        console.error('Video upload error:', err);
                        alert(err.message || 'Failed to upload video from computer.');
                    })
                    .finally(function () {
                        fileInput.value = '';
                        view.isEnabled = true;
                        view.set({ label: 'Insert Video from Computer' });
                    });
                });

                return view;
            });
        }

        ClassicEditor.create(textarea, {
            licenseKey: 'GPL',
            menuBar: {
                isVisible: true
            },
            plugins: [
                Alignment,
                Autoformat,
                AutoImage,
                AutoLink,
                BlockQuote,
                Bold,
                Bookmark,
                Code,
                CodeBlock,
                Essentials,
                FindAndReplace,
                Font,
                FontFamily,
                FontSize,
                FontColor,
                FontBackgroundColor,
                Fullscreen,
                Heading,
                Highlight,
                HorizontalLine,
                GeneralHtmlSupport,
                Image,
                ImageCaption,
                ImageInsert,
                ImageResize,
                ImageStyle,
                ImageToolbar,
                ImageUpload,
                SimpleUploadAdapter,
                Base64UploadAdapter,
                PictureEditing,
                Indent,
                IndentBlock,
                Italic,
                Link,
                LinkImage,
                List,
                ListProperties,
                TodoList,
                MediaEmbed,
                PageBreak,
                Paragraph,
                PasteFromOffice,
                RemoveFormat,
                SelectAll,
                ShowBlocks,
                SourceEditing,
                SpecialCharacters,
                SpecialCharactersArrows,
                SpecialCharactersCurrency,
                SpecialCharactersEssentials,
                SpecialCharactersLatin,
                SpecialCharactersMathematical,
                SpecialCharactersText,
                Strikethrough,
                Style,
                Subscript,
                Superscript,
                Table,
                TableCaption,
                TableCellProperties,
                TableColumnResize,
                TableProperties,
                TableToolbar,
                TextTransformation,
                Underline,
                WordCount,
                UploadVideoPlugin
            ],
            simpleUpload: {
                uploadUrl: uploadUrl,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest'
                }
            },
            toolbar: {
                shouldNotGroupWhenFull: true,
                items: [
                    'undo',
                    'redo',
                    '|',
                    'sourceEditing',
                    'showBlocks',
                    '|',
                    'findAndReplace',
                    'selectAll',
                    '|',
                    'link',
                    'bookmark',
                    'insertImage',
                    'uploadVideo',
                    'mediaEmbed',
                    'insertTable',
                    'blockQuote',
                    'codeBlock',
                    'pageBreak',
                    'horizontalLine',
                    'specialCharacters',
                    '-',
                    'heading',
                    'style',
                    '|',
                    'bold',
                    'italic',
                    'underline',
                    'strikethrough',
                    'subscript',
                    'superscript',
                    'code',
                    '|',
                    'fontSize',
                    'fontFamily',
                    'fontColor',
                    'fontBackgroundColor',
                    'highlight',
                    '|',
                    'alignment',
                    '|',
                    'bulletedList',
                    'numberedList',
                    'todoList',
                    '|',
                    'outdent',
                    'indent',
                    '|',
                    'removeFormat',
                    '|',
                    'fullscreen'
                ]
            },
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 24, 28, 32, 36],
                supportAllValues: true
            },
            fontFamily: {
                supportAllValues: true
            },
            style: {
                definitions: [
                    { name: 'Document Title', element: 'h1', classes: ['document-title'] },
                    { name: 'Subtitle', element: 'h2', classes: ['document-subtitle'] },
                    { name: 'Callout Box', element: 'p', classes: ['callout'] },
                    { name: 'Side Quote', element: 'blockquote', classes: ['side-quote'] },
                    { name: 'Highlighted Note', element: 'span', classes: ['highlighted-note'] },
                    { name: 'Badge Tag', element: 'span', classes: ['badge'] }
                ]
            },
            image: {
                resizeOptions: [
                    { name: 'resizeImage:original', label: 'Original width', value: null },
                    { name: 'resizeImage:25', label: '25% width', value: '25' },
                    { name: 'resizeImage:50', label: '50% width', value: '50' },
                    { name: 'resizeImage:75', label: '75% width', value: '75' }
                ],
                toolbar: [
                    'imageTextAlternative',
                    'toggleImageCaption',
                    '|',
                    'imageStyle:inline',
                    'imageStyle:wrapText',
                    'imageStyle:breakText',
                    '|',
                    'resizeImage'
                ],
                insert: {
                    integrations: ['upload', 'url', 'assetManager'],
                    type: 'auto'
                }
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells',
                    'tableProperties',
                    'tableCellProperties',
                    'toggleTableCaption'
                ]
            },
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            link: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://'
            },
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ],
                disallow: [
                    {
                        attributes: [
                            { key: /^on(.*)/i, value: true },
                            { key: /.*/, value: /(\b)(on\S+)(\s*)=|javascript:|(<\s*)(\/*)script/i }
                        ]
                    },
                    { name: 'script' }
                ]
            },
            placeholder: 'Write your article content here...'
        }).then(function (editor) {
            window.blogEditor = editor;

            // Sync editor data back to textarea continuously and before submit
            editor.model.document.on('change:data', function () {
                textarea.value = editor.getData();
            });

            if (form) {
                form.addEventListener('submit', function () {
                    textarea.value = editor.getData();
                });
            }
        }).catch(function (error) {
            console.error('CKEditor initialization error:', error);
        });
    });
})();
