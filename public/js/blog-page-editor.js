(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('blogForm');
        var detailsStep = document.getElementById('blogDetailsStep');
        var editorStep = document.getElementById('blogEditorStep');
        var source = document.getElementById('blogContent');
        var articleContent = document.querySelector('.blog-live-preview .blog-post-content');
        var errorBox = document.getElementById('blogEditorError');

        if (!form || !detailsStep || !editorStep || !source || !articleContent) return;

        var editorContainer = document.querySelector('.admin-container');
        var uploadUrl = source.dataset.uploadUrl;
        var csrfToken = source.dataset.csrfToken;
        var featuredImageInput = form.querySelector('input[name="image"]');
        var titleInput = document.getElementById('titleInput');
        var excerptInput = document.getElementById('excerptInput');
        var categoryInput = document.getElementById('categoryInput');
        var tagsInput = document.getElementById('tagsInput');
        var slugInput = document.getElementById('slugInput');
        var slugEdited = Boolean(slugInput && slugInput.value);

        function escapeHtml(value) {
            return String(value || '').replace(/[&<>"']/g, function (character) {
                return {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                }[character];
            });
        }

        function createButton(label, className, action) {
            var button = document.createElement('button');
            button.type = 'button';
            button.textContent = label;
            if (className) button.className = className;
            button.addEventListener('click', action);
            return button;
        }

        function currentSections() {
            return Array.prototype.slice.call(articleContent.querySelectorAll('.blog-editor-section'));
        }

        function syncContent() {
            source.value = currentSections().map(function (section) {
                var content = section.querySelector('.blog-editor-section__content');
                return content ? content.innerHTML.trim() : '';
            }).filter(Boolean).join('\n');

            var textRoot = articleContent.cloneNode(true);
            textRoot.querySelectorAll('.blog-editor-section__actions, .blog-editor-insert').forEach(function (control) {
                control.remove();
            });
            var text = textRoot.innerText || '';
            var wordCount = text.trim().split(/\s+/).filter(Boolean).length;
            var meta = document.querySelector('.blog-live-preview .blog-post-meta');
            var readingTime = meta && meta.querySelector(':scope > span');
            if (!readingTime && meta) {
                readingTime = document.createElement('span');
                meta.appendChild(readingTime);
            }
            if (readingTime) readingTime.textContent = Math.max(1, Math.ceil(wordCount / 200)) + ' min read';
        }

        function slugify(value) {
            return String(value || '').toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
        }

        function bindTextEditor(node, input, label, options) {
            if (!node || !input || node.dataset.editorControls === 'true') return;

            var controls = document.createElement('div');
            controls.className = 'blog-editor-inline-controls';
            var editButton = createButton('Edit ' + label, '', function () {
                var editing = node.contentEditable === 'true';
                if (!editing && node.dataset.emptyPlaceholder === 'true') {
                    node.textContent = '';
                    node.dataset.emptyPlaceholder = 'false';
                }
                node.contentEditable = editing ? 'false' : 'true';
                editButton.textContent = editing ? 'Edit ' + label : 'Done';
                if (!editing) node.focus();
                else {
                    input.value = node.innerText.trim();
                    updatePreview();
                }
            });
            controls.appendChild(editButton);

            if (options && options.clearable) {
                controls.appendChild(createButton('Clear', '', function () {
                    input.value = '';
                    updatePreview();
                }));
            }

            node.parentNode.insertBefore(controls, node);
            node.dataset.editorControls = 'true';
            node.addEventListener('input', function (event) {
                event.stopPropagation();
                input.value = node.innerText.trim();
                if (input === titleInput && slugInput && !slugEdited) {
                    slugInput.value = slugify(input.value);
                }
            });
            node.addEventListener('blur', function () {
                window.setTimeout(function () {
                    if (node.contentEditable === 'true' && document.activeElement !== editButton) {
                        node.contentEditable = 'false';
                        editButton.textContent = 'Edit ' + label;
                        input.value = node.innerText.trim();
                        updatePreview();
                    }
                }, 0);
            });
        }

        function updateSectionLabels() {
            currentSections().forEach(function (section, index) {
                var label = section.querySelector('.blog-editor-section__label');
                if (label) label.textContent = 'Section ' + (index + 1);
            });
        }

        function setEditing(section, editing) {
            var content = section.querySelector('.blog-editor-section__content');
            var editButton = section.querySelector('.blog-editor-edit');
            if (!content || !editButton) return;

            content.contentEditable = editing ? 'true' : 'false';
            editButton.textContent = editing ? 'Done' : 'Edit';
            if (editing) content.focus();
            syncContent();
        }

        function makeEditableSection(html, before) {
            var emptyMessage = articleContent.querySelector('.blog-editor-empty');
            if (emptyMessage) emptyMessage.remove();

            var section = document.createElement('section');
            section.className = 'blog-editor-section';

            var actions = document.createElement('div');
            actions.className = 'blog-editor-section__actions';

            var label = document.createElement('span');
            label.className = 'blog-editor-section__label';
            actions.appendChild(label);

            actions.appendChild(createButton('Add before', '', function () {
                insertTextSection(section);
            }));

            actions.appendChild(createButton('Edit', 'blog-editor-edit', function (event) {
                var content = section.querySelector('.blog-editor-section__content');
                setEditing(section, content.contentEditable !== 'true');
                event.currentTarget.textContent = content.contentEditable === 'true' ? 'Done' : 'Edit';
            }));

            actions.appendChild(createButton('Replace image', 'blog-editor-replace-image', function () {
                replaceImage(section);
            }));

            actions.appendChild(createButton('Delete', 'blog-editor-delete', function () {
                if (!window.confirm('Delete this article section?')) return;
                section.remove();
                updateSectionLabels();
                syncContent();
            }));

            var content = document.createElement('div');
            content.className = 'blog-editor-section__content';
            content.innerHTML = html;
            content.addEventListener('input', syncContent);
            content.addEventListener('blur', syncContent);

            section.appendChild(actions);
            section.appendChild(content);
            if (before) articleContent.insertBefore(section, before);
            else articleContent.appendChild(section);

            var replaceButton = section.querySelector('.blog-editor-replace-image');
            replaceButton.hidden = !content.querySelector('img');
            updateSectionLabels();
            syncContent();
            return section;
        }

        function addInsertControl(after) {
            var control = document.createElement('div');
            control.className = 'blog-editor-insert';
            control.appendChild(createButton('+ Add section here', '', function () {
                insertTextSection(after ? after.nextSibling : null);
            }));
            if (after) articleContent.insertBefore(control, after.nextSibling);
            else articleContent.insertBefore(control, articleContent.firstChild);
        }

        function insertTextSection(before) {
            var section = makeEditableSection('<h2>New section</h2><p>Write your article section here.</p>', before);
            addInsertControl(section);
            setEditing(section, true);
            section.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        function renderSections(html) {
            var parser = new DOMParser();
            var documentFragment = parser.parseFromString('<div>' + html + '</div>', 'text/html');
            var root = documentFragment.body.firstElementChild;
            articleContent.innerHTML = '';
            if (!root) return;

            var nodes = Array.prototype.slice.call(root.childNodes).filter(function (node) {
                return node.nodeType !== Node.TEXT_NODE || node.textContent.trim() !== '';
            });
            var groups = [];
            var hasHeadings = nodes.some(function (node) {
                return node.nodeType === Node.ELEMENT_NODE && node.tagName.toLowerCase() === 'h2';
            });

            if (hasHeadings) {
                nodes.forEach(function (node) {
                    if (node.nodeType === Node.ELEMENT_NODE && node.tagName.toLowerCase() === 'h2') {
                        groups.push([]);
                    }
                    if (!groups.length) groups.push([]);
                    groups[groups.length - 1].push(node);
                });
            } else {
                nodes.forEach(function (node) {
                    groups.push([node]);
                });
            }

            groups.forEach(function (group) {
                var sectionHtml = group.map(function (node) {
                    return node.nodeType === Node.TEXT_NODE ? escapeHtml(node.textContent) : node.outerHTML;
                }).join('');
                var section = makeEditableSection(sectionHtml);
                addInsertControl(section);
            });

            if (!groups.length) {
                articleContent.innerHTML = '<p class="blog-editor-empty">Your article has no sections yet. Use Add section or Add image to begin.</p>';
            }
        }

        function updatePreview() {
            var titleNode = document.querySelector('.blog-live-preview .blog-post-header h1');
            var excerptNode = document.querySelector('.blog-live-preview .blog-post-excerpt');
            var categoryNode = document.querySelector('.blog-live-preview .blog-eyebrow');
            var tagsNode = document.querySelector('.blog-live-preview .blog-post-tags');

            if (titleNode && titleNode.contentEditable !== 'true') {
                titleNode.textContent = titleInput && titleInput.value.trim() ? titleInput.value.trim() : 'Click Edit to add a title';
                titleNode.dataset.emptyPlaceholder = titleInput && titleInput.value.trim() ? 'false' : 'true';
            }
            var featuredImage = document.querySelector('.blog-live-preview .blog-post-featured-image');
            if (featuredImage && titleInput && titleInput.value.trim()) featuredImage.alt = titleInput.value.trim();
            if (excerptNode) {
                if (excerptNode.contentEditable !== 'true') {
                    excerptNode.textContent = excerptInput && excerptInput.value.trim() ? excerptInput.value : 'Click Edit to add an excerpt';
                    excerptNode.dataset.emptyPlaceholder = excerptInput && excerptInput.value.trim() ? 'false' : 'true';
                }
                excerptNode.hidden = !excerptInput || (!excerptInput.value.trim() && excerptNode.contentEditable !== 'true');
            }
            if (categoryNode && categoryNode.contentEditable !== 'true') {
                categoryNode.textContent = categoryInput && categoryInput.value.trim() ? categoryInput.value.trim() : 'RETROTECH INSIGHTS';
            }

            if (tagsNode && tagsNode.contentEditable !== 'true') {
                var tagValues = tagsInput && tagsInput.value ? tagsInput.value.split(/[,\n]+/).map(function (tag) { return tag.trim(); }).filter(Boolean) : [];
                tagsNode.replaceChildren();
                tagValues.forEach(function (tag) {
                    var item = document.createElement('li');
                    item.textContent = tag;
                    tagsNode.appendChild(item);
                });
                tagsNode.hidden = tagValues.length === 0;
            }

            updateFaqPreview();
        }

        function updateFaqPreview() {
            var faqFields = document.querySelectorAll('#faqsList .faq-item');
            var existingSection = document.querySelector('.blog-live-preview .blog-faqs-section');
            var entries = Array.prototype.slice.call(faqFields).map(function (item) {
                return {
                    item: item,
                    question: item.querySelector('.faq-input-question')?.value.trim() || '',
                    answer: item.querySelector('.faq-input-answer')?.value.trim() || ''
                };
            }).filter(function (faq) { return faq.question; });

            if (!entries.length) {
                if (existingSection) existingSection.remove();
                return;
            }

            var section = existingSection || document.createElement('section');
            section.className = 'blog-faqs-section';
            section.style.cssText = 'margin-top: 3rem; padding-top: 2rem; border-top: 1px solid #e2e8f0;';
            section.innerHTML = '<h2 style="font-size:1.5rem;font-weight:700;color:#1a202c;margin-bottom:1.5rem;display:flex;align-items:center;gap:10px;"><i class="fa-solid fa-circle-question" style="color:#0f766e;"></i> Frequently Asked Questions</h2><div class="blog-faqs-list" style="display:flex;flex-direction:column;gap:1rem;"></div>';
            var list = section.querySelector('.blog-faqs-list');

            entries.forEach(function (faq) {
                var details = document.createElement('details');
                details.style.cssText = 'background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;padding:1.1rem 1.25rem;';
                var actions = document.createElement('div');
                actions.className = 'blog-editor-faq-controls';
                actions.appendChild(createButton('Edit FAQ', '', function () {
                    var question = faq.item.querySelector('.faq-input-question');
                    document.getElementById('faqs-section').scrollIntoView({ behavior: 'smooth', block: 'center' });
                    if (question) question.focus();
                }));
                actions.appendChild(createButton('Delete FAQ', 'blog-editor-delete', function () {
                    var removeButton = faq.item.querySelector('.btn-remove-faq');
                    if (removeButton) removeButton.click();
                    updateFaqPreview();
                }));
                var summary = document.createElement('summary');
                summary.style.cssText = 'font-weight:600;color:#1e293b;cursor:pointer;font-size:1.05rem;';
                summary.textContent = faq.question;
                var answer = document.createElement('div');
                answer.style.cssText = 'margin-top:.85rem;color:#475569;line-height:1.65;white-space:pre-line;border-top:1px dashed #e2e8f0;padding-top:.75rem;';
                answer.textContent = faq.answer;
                details.append(actions, summary, answer);
                list.appendChild(details);
            });

            if (!existingSection) document.querySelector('.blog-live-preview .blog-post').insertBefore(section, document.querySelector('.blog-live-preview .blog-post-footer'));
        }

        function showEditor() {
            updatePreview();
            renderSections(source.value);
            if (errorBox) errorBox.hidden = true;
            detailsStep.hidden = true;
            editorStep.hidden = false;
            if (editorContainer) editorContainer.classList.add('blog-editor-active');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function showDetails() {
            syncContent();
            editorStep.hidden = true;
            detailsStep.hidden = false;
            if (editorContainer) editorContainer.classList.remove('blog-editor-active');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function uploadImage(file) {
            var data = new FormData();
            data.append('upload', file);

            return fetch(uploadUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: data
            }).then(function (response) {
                if (!response.ok) {
                    return response.json().then(function (body) {
                        throw new Error(body.error?.message || 'Image upload failed.');
                    });
                }
                return response.json();
            });
        }

        function chooseImage(onUpload) {
            var input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/jpeg,image/png,image/webp';
            input.className = 'blog-editor-image-input';
            input.addEventListener('change', function () {
                var file = input.files && input.files[0];
                if (!file) return;

                uploadImage(file).then(onUpload).catch(function (error) {
                    if (errorBox) {
                        errorBox.hidden = false;
                        errorBox.textContent = error.message || 'Image upload failed.';
                    }
                }).finally(function () {
                    input.remove();
                });
            });
            form.appendChild(input);
            input.click();
        }

        function replaceImage(section) {
            chooseImage(function (result) {
                var image = section.querySelector('.blog-editor-section__content img');
                if (!image) return;
                image.src = result.url;
                image.alt = window.prompt('Image description for accessibility:', image.alt) || image.alt;
                syncContent();
            });
        }

        function setupVisiblePageControls() {
            var titleNode = document.querySelector('.blog-live-preview .blog-post-header h1');
            var excerptNode = document.querySelector('.blog-live-preview .blog-post-excerpt');
            var categoryNode = document.querySelector('.blog-live-preview .blog-eyebrow');
            var tagsNode = document.querySelector('.blog-live-preview .blog-post-tags');
            var header = document.querySelector('.blog-live-preview .blog-post-header');
            var meta = document.querySelector('.blog-live-preview .blog-post-meta');

            if (!excerptNode && titleNode) {
                excerptNode = document.createElement('p');
                excerptNode.className = 'blog-post-excerpt';
                titleNode.parentNode.insertBefore(excerptNode, titleNode.nextSibling);
            }
            if (!tagsNode && header && meta) {
                tagsNode = document.createElement('ul');
                tagsNode.className = 'blog-post-tags';
                tagsNode.setAttribute('aria-label', 'Article tags');
                header.appendChild(tagsNode);
            }

            bindTextEditor(titleNode, titleInput, 'title');
            bindTextEditor(excerptNode, excerptInput, 'excerpt');
            bindTextEditor(categoryNode, categoryInput, 'category', { clearable: true });
            bindTextEditor(tagsNode, tagsInput, 'tags', { clearable: true });
        }

        document.getElementById('continueToBlogEditor').addEventListener('click', showEditor);
        document.getElementById('backToBlogDetails').addEventListener('click', showDetails);
        document.getElementById('addBlogSection').addEventListener('click', function () {
            insertTextSection(null);
        });
        document.getElementById('addBlogImage').addEventListener('click', function () {
            chooseImage(function (result) {
                var alt = window.prompt('Image description for accessibility:', '') || '';
                var section = makeEditableSection('<figure class="image"><img src="' + escapeHtml(result.url) + '" alt="' + escapeHtml(alt) + '"></figure>');
                section.querySelector('.blog-editor-replace-image').hidden = false;
                addInsertControl(section);
                section.scrollIntoView({ behavior: 'smooth', block: 'center' });
            });
        });
        document.getElementById('changeFeaturedImage').addEventListener('click', function () {
            if (featuredImageInput) featuredImageInput.click();
        });
        document.getElementById('manageBlogFaqs').addEventListener('click', function () {
            document.getElementById('faqs-section').scrollIntoView({ behavior: 'smooth', block: 'center' });
            var addButton = document.getElementById('btnAddFaq');
            if (addButton && !document.querySelector('#faqsList .faq-item')) addButton.focus();
        });
        document.getElementById('btnAddFaq').addEventListener('click', function () {
            window.setTimeout(function () {
                document.getElementById('faqs-section').scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 0);
        });
        if (slugInput) {
            slugInput.addEventListener('input', function () {
                slugEdited = true;
            });
        }

        if (featuredImageInput) {
            featuredImageInput.addEventListener('change', function () {
                var file = featuredImageInput.files && featuredImageInput.files[0];
                var image = document.querySelector('.blog-live-preview .blog-post-featured-image');
                if (!file || !image) return;
                image.src = URL.createObjectURL(file);
            });
        }

        form.addEventListener('input', updatePreview);
        form.addEventListener('change', updatePreview);
        form.addEventListener('submit', function (event) {
            if (editorStep.hidden) {
                event.preventDefault();
                showEditor();
                return;
            }

            syncContent();
            if (titleInput) titleInput.value = document.querySelector('.blog-live-preview .blog-post-header h1').innerText.trim();
            if (excerptInput) excerptInput.value = document.querySelector('.blog-live-preview .blog-post-excerpt')?.innerText.trim() || '';
            if (categoryInput) categoryInput.value = document.querySelector('.blog-live-preview .blog-eyebrow').innerText.trim();
            if (tagsInput) {
                tagsInput.value = document.querySelector('.blog-live-preview .blog-post-tags').innerText
                    .split(/[,\n]+/).map(function (tag) { return tag.trim(); }).filter(Boolean).join(', ');
            }
            if (!titleInput.value.trim() || !excerptInput.value.trim()) {
                event.preventDefault();
                if (errorBox) {
                    errorBox.hidden = false;
                    errorBox.textContent = !titleInput.value.trim()
                        ? 'Add an article title before saving.'
                        : 'Add an excerpt before saving.';
                }
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });

        setupVisiblePageControls();
        updatePreview();
        renderSections(source.value);
    });
})();
