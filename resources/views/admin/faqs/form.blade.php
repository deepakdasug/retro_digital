<article class="admin-insight-panel" style="padding: 2rem;">
    @if ($errors->any())
        <div class="admin-dashboard-error" role="alert" style="margin-bottom: 1.5rem;">
            <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i>
            <div>
                <strong>Please fix the following errors:</strong>
                <ul style="margin: 0.5rem 0 0; padding-left: 1.25rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ $action }}" method="POST">
        @csrf
        @if ($method !== 'POST')
            @method($method)
        @endif

        <div style="margin-bottom: 1.5rem;">
            <label for="question" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #1f2937;">Question <span style="color: #dc2626;">*</span></label>
            <input id="question" type="text" name="question" value="{{ old('question', $faq->question) }}" maxlength="255" required
                   style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;">
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label for="answer" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #1f2937;">Answer <span style="color: #dc2626;">*</span></label>
            <textarea id="answer" name="answer" rows="6" required
                      style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; resize: vertical;">{{ old('answer', $faq->answer) }}</textarea>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.25rem; margin-bottom: 1.5rem;">
            <div>
                <label for="category" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #1f2937;">Category</label>
                <input id="category" type="text" name="category" value="{{ old('category', $faq->category) }}" maxlength="100"
                       style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;">
            </div>
            <div>
                <label for="subcategory" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #1f2937;">Subcategory</label>
                <input id="subcategory" type="text" name="subcategory" value="{{ old('subcategory', $faq->subcategory) }}" maxlength="100"
                       style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;">
            </div>
            <div>
                <label for="sort_order" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #1f2937;">Display order</label>
                <input id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', $faq->sort_order ?? 0) }}" min="0"
                       style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;">
            </div>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 1.5rem;">
            <label style="display: inline-flex; align-items: center; gap: 0.5rem; color: #374151;">
                <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $faq->is_published))>
                Published
            </label>
            <label style="display: inline-flex; align-items: center; gap: 0.5rem; color: #374151;">
                <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $faq->is_featured))>
                Featured
            </label>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.25rem; margin-bottom: 2rem;">
            <div>
                <label for="meta_title" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #1f2937;">SEO title</label>
                <input id="meta_title" type="text" name="meta_title" value="{{ old('meta_title', $faq->meta_title) }}" maxlength="255"
                       style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;">
            </div>
            <div>
                <label for="meta_description" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #1f2937;">SEO description</label>
                <textarea id="meta_description" name="meta_description" rows="2" maxlength="500"
                          style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; resize: vertical;">{{ old('meta_description', $faq->meta_description) }}</textarea>
            </div>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 1rem; border-top: 1px solid #e5e7eb; padding-top: 1.5rem;">
            <button type="submit" class="admin-action-button" style="cursor: pointer; border: none;">
                <i class="fa-solid fa-floppy-disk" aria-hidden="true"></i> {{ $method === 'POST' ? 'Save FAQ' : 'Save Changes' }}
            </button>
            <a href="{{ route('admin.faqs.index') }}" class="admin-secondary-button" style="text-decoration: none;">Cancel</a>
        </div>
    </form>
</article>
