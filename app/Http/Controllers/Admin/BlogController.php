<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function create()
    {
        $this->authorizeAdmin();

        return view('admin.blog.create', ['post' => null]);
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin();
        $data = $this->validatedPostData($request);
        $slug = $this->uniqueSlug($data['title']);
        $imagePath = $request->file('image')?->store('blog_images', 'public');
        $content = $this->processContent($request);
        $published = $request->boolean('is_published');

        BlogPost::create([
            'title' => $data['title'],
            'slug' => $slug,
            'excerpt' => $data['excerpt'],
            'image_path' => $imagePath,
            'content_blocks' => $content,
            'author_name' => $data['author_name'],
            'author_designation' => $data['author_designation'] ?? null,
            'is_published' => $published,
            'published_at' => $published ? now() : null,
        ]);

        return redirect()->route('admin.dashboard', ['tab' => 'blogs'])->with('success', 'Blog post created successfully.');
    }

    public function edit(BlogPost $post)
    {
        $this->authorizeAdmin();

        return view('admin.blog.create', compact('post'));
    }

    public function update(Request $request, BlogPost $post)
    {
        $this->authorizeAdmin();
        $data = $this->validatedPostData($request);
        $oldImagePath = $post->image_path;
        $newImagePath = $request->file('image')?->store('blog_images', 'public') ?? $oldImagePath;
        $oldBlockPaths = $this->contentImagePaths($post);
        $content = $this->processContent($request);
        $retainedBlockPaths = collect($oldBlockPaths)
            ->filter(fn (string $path) => str_contains($content[0]['content'], Storage::url($path)))
            ->all();
        $published = $request->boolean('is_published');

        $post->update([
            'title' => $data['title'],
            'slug' => $this->uniqueSlug($data['title'], $post),
            'excerpt' => $data['excerpt'],
            'image_path' => $newImagePath,
            'content_blocks' => $content,
            'author_name' => $data['author_name'],
            'author_designation' => $data['author_designation'] ?? null,
            'is_published' => $published,
            'published_at' => $published
                ? ($post->is_published && $post->published_at ? $post->published_at : now())
                : null,
        ]);

        if ($oldImagePath && $oldImagePath !== $newImagePath) {
            Storage::disk('public')->delete($oldImagePath);
        }

        foreach (array_diff($oldBlockPaths, $retainedBlockPaths) as $path) {
            Storage::disk('public')->delete($path);
        }

        return redirect()->route('admin.dashboard', ['tab' => 'blogs'])->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $post)
    {
        $this->authorizeAdmin();

        $paths = collect([$post->image_path])
            ->merge($this->contentImagePaths($post))
            ->filter()
            ->unique();

        $post->delete();

        foreach ($paths as $path) {
            Storage::disk('public')->delete($path);
        }

        return redirect()->route('admin.dashboard', ['tab' => 'blogs'])->with('success', 'Blog post deleted successfully.');
    }

    public function uploadMedia(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'upload' => ['nullable', 'file', 'max:102400', 'mimes:jpeg,png,jpg,gif,webp,svg,mp4,webm,ogg,mov'],
            'media' => ['nullable', 'file', 'max:102400', 'mimes:jpeg,png,jpg,gif,webp,svg,mp4,webm,ogg,mov'],
        ]);

        $file = $request->file('upload') ?? $request->file('media');

        if (!$file || !$file->isValid()) {
            return response()->json([
                'error' => [
                    'message' => 'Please select a valid image or video file (up to 100MB).'
                ]
            ], 422);
        }

        $mime = $file->getMimeType() ?: '';
        $isImage = str_starts_with($mime, 'image/');
        $folder = $isImage ? 'blog_images' : 'blog_videos';

        $path = $file->store($folder, 'public');
        $url = Storage::url($path);

        return response()->json([
            'url' => $url,
            'is_video' => !$isImage,
            'name' => $file->getClientOriginalName(),
        ]);
    }

    private function validatedPostData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['required', 'string', 'max:1000'],
            'content' => ['required', 'string', 'max:5000000'],
            'author_name' => ['required', 'string', 'max:255'],
            'author_designation' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'is_published' => ['sometimes', 'boolean'],
        ]);
    }

    private function processContent(Request $request): array
    {
        return [[
            'type' => 'html',
            'content' => $this->sanitizeEditorHtml($request->string('content')->toString()),
        ]];
    }

    private function contentImagePaths(BlogPost $post): array
    {
        $paths = collect($post->content_blocks ?? [])->pluck('image_path')->filter();
        preg_match_all('/<(?:img|video|source)\b[^>]*\bsrc\s*=\s*(["\'])(.*?)\1/i', $post->content_html, $matches);

        foreach ($matches[2] ?? [] as $source) {
            $urlPath = parse_url(html_entity_decode($source), PHP_URL_PATH) ?: '';
            if (str_starts_with($urlPath, '/storage/') && !in_array('..', explode('/', $urlPath), true)) {
                $paths->push(rawurldecode(substr($urlPath, strlen('/storage/'))));
            }
        }

        return $paths->unique()->values()->all();
    }

    private function sanitizeEditorHtml(string $html): string
    {
        $document = new \DOMDocument('1.0', 'UTF-8');
        $previousErrorMode = libxml_use_internal_errors(true);
        $document->loadHTML(
            '<?xml encoding="utf-8" ?><div id="blog-editor-root">' . $html . '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );
        libxml_clear_errors();
        libxml_use_internal_errors($previousErrorMode);

        $root = $document->getElementsByTagName('div')->item(0);
        if (!$root) {
            return e($html);
        }

        $this->sanitizeEditorNodes($root);
        $cleanHtml = '';
        foreach ($root->childNodes as $child) {
            $cleanHtml .= $document->saveHTML($child);
        }

        return $cleanHtml;
    }

    private function sanitizeEditorNodes(\DOMNode $parent): void
    {
        $allowedTags = [
            'p', 'br', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
            'strong', 'b', 'em', 'i', 'u', 's', 'sub', 'sup', 'mark',
            'pre', 'code', 'blockquote', 'hr',
            'a', 'ul', 'ol', 'li', 'input',
            'table', 'thead', 'tbody', 'tfoot', 'tr', 'th', 'td', 'caption',
            'figure', 'figcaption', 'img', 'video', 'source', 'span', 'div'
        ];
        $removeWithContents = ['script', 'style', 'iframe', 'object', 'embed', 'svg', 'math', 'applet'];

        foreach (iterator_to_array($parent->childNodes) as $node) {
            if (!$node instanceof \DOMElement) {
                continue;
            }

            $tag = strtolower($node->tagName);
            if (in_array($tag, $removeWithContents, true)) {
                $parent->removeChild($node);
                continue;
            }

            if (!in_array($tag, $allowedTags, true)) {
                $this->sanitizeEditorNodes($node);
                while ($node->firstChild) {
                    $parent->insertBefore($node->firstChild, $node);
                }
                $parent->removeChild($node);
                continue;
            }

            $allowedAttributes = match ($tag) {
                'a' => ['href', 'title', 'target', 'rel', 'id', 'name', 'class', 'style'],
                'figure' => ['class', 'style'],
                'figcaption' => ['class', 'style'],
                'img' => ['src', 'alt', 'width', 'height', 'class', 'style', 'title'],
                'video' => ['src', 'controls', 'autoplay', 'loop', 'muted', 'poster', 'width', 'height', 'class', 'style', 'preload'],
                'source' => ['src', 'type'],
                'table', 'thead', 'tbody', 'tfoot', 'tr' => ['class', 'style'],
                'th', 'td' => ['class', 'style', 'colspan', 'rowspan', 'scope'],
                'input' => ['type', 'disabled', 'checked'],
                'pre', 'code' => ['class', 'style'],
                'span', 'p', 'div', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'blockquote', 'mark' => ['class', 'style', 'id'],
                default => ['class', 'style'],
            };

            foreach (iterator_to_array($node->attributes) as $attribute) {
                $name = strtolower($attribute->name);
                $value = trim($attribute->value);
                if (!in_array($name, $allowedAttributes, true)) {
                    $node->removeAttribute($attribute->name);
                    continue;
                }

                if (in_array($name, ['href', 'src'], true) && !$this->isSafeEditorUrl($value)) {
                    $node->removeAttribute($attribute->name);
                    continue;
                }

                if ($name === 'style') {
                    $cleanStyle = $this->sanitizeInlineStyle($value);
                    if ($cleanStyle !== '') {
                        $node->setAttribute('style', $cleanStyle);
                    } else {
                        $node->removeAttribute('style');
                    }
                    continue;
                }

                if ($name === 'class') {
                    // Only allow safe alphanumeric and hyphenated class names
                    $classes = array_filter(preg_split('/\s+/', $value) ?: [], fn ($c) => preg_match('/^[a-zA-Z0-9_\-]+$/', $c));
                    if ($classes) {
                        $node->setAttribute('class', implode(' ', $classes));
                    } else {
                        $node->removeAttribute('class');
                    }
                }
            }

            if ($tag === 'a' && $node->getAttribute('target') === '_blank') {
                $node->setAttribute('rel', 'noopener noreferrer');
            }

            $this->sanitizeEditorNodes($node);
        }
    }

    private function sanitizeInlineStyle(string $style): string
    {
        if (preg_match('/(expression|javascript|behavior|vbscript)/i', $style)) {
            return '';
        }

        // Split properties by semicolon and keep safe CSS properties
        $safeProperties = [
            'color', 'background-color', 'font-size', 'font-family', 'text-align',
            'line-height', 'width', 'height', 'border', 'border-color', 'border-style',
            'border-width', 'padding', 'padding-left', 'padding-right', 'padding-top',
            'padding-bottom', 'margin', 'margin-left', 'margin-right', 'margin-top',
            'margin-bottom', 'vertical-align', 'float'
        ];

        $declarations = explode(';', $style);
        $cleanDeclarations = [];

        foreach ($declarations as $declaration) {
            $parts = explode(':', $declaration, 2);
            if (count($parts) === 2) {
                $prop = strtolower(trim($parts[0]));
                $val = trim($parts[1]);
                if (in_array($prop, $safeProperties, true) && !preg_match('/(url\(|expression\(|javascript:)/i', $val)) {
                    $cleanDeclarations[] = $prop . ': ' . $val;
                }
            }
        }

        return implode('; ', $cleanDeclarations);
    }

    private function isSafeEditorUrl(string $url): bool
    {
        if (str_starts_with($url, '/') && !str_starts_with($url, '//')) {
            return !in_array('..', explode('/', parse_url($url, PHP_URL_PATH) ?: ''), true);
        }

        if (preg_match('#^data:image/(png|jpe?g|gif|webp|svg\+xml);base64,[A-Za-z0-9+/=]+$#i', $url)) {
            return true;
        }

        $scheme = strtolower(parse_url($url, PHP_URL_SCHEME) ?: '');

        return in_array($scheme, ['http', 'https', 'mailto', 'tel'], true);
    }

    private function uniqueSlug(string $title, ?BlogPost $except = null): string
    {
        $base = Str::slug($title) ?: 'blog-post';
        $slug = $base;
        $counter = 1;

        while (BlogPost::where('slug', $slug)
            ->when($except, fn ($query) => $query->where('id', '!=', $except->getKey()))
            ->exists()) {
            $slug = $base . '-' . $counter++;
        }

        return $slug;
    }

    private function authorizeAdmin(): void
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
    }
}
