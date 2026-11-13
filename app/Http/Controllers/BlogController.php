<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of published blog posts from the database.
     */
    public function index(Request $request)
    {
        $query = BlogPost::query()
            ->where('is_published', true);

        // Optional search filter
        if ($request->filled('q')) {
            $searchTerm = '%' . trim($request->input('q')) . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', $searchTerm)
                  ->orWhere('excerpt', 'like', $searchTerm)
                  ->orWhere('category', 'like', $searchTerm)
                  ->orWhere('author_name', 'like', $searchTerm);
            });
        }

        // Optional category filter
        if ($request->filled('category') && $request->input('category') !== 'all') {
            $query->where('category', $request->input('category'));
        }

        $allPosts = $query->latest('published_at')
            ->orderBy('id', 'desc')
            ->get();

        // High-level thematic divisions
        $itadCategories = [
            'Enterprise ITAD',
            'Data Security',
            'Infrastructure',
            'Sustainability & ESG',
            'Asset Recovery',
        ];

        // Attach pillar to each post
        $allPosts->each(function ($post) use ($itadCategories) {
            $post->pillar = in_array($post->category, $itadCategories) ? 'itad' : 'software';
        });

        // Structured category list with counts and pillar assignment
        $categories = $allPosts->groupBy('category')->map(function ($group, $category) use ($itadCategories) {
            return [
                'name' => $category,
                'slug' => \Illuminate\Support\Str::slug($category),
                'count' => $group->count(),
                'pillar' => in_array($category, $itadCategories) ? 'itad' : 'software',
            ];
        })->values();

        $totalCount = $allPosts->count();
        $itadCount = $allPosts->where('pillar', 'itad')->count();
        $softwareCount = $allPosts->where('pillar', 'software')->count();

        // Spotlight featured post (first item or specifically marked featured)
        $featuredPost = $allPosts->first();
        $gridPosts = $allPosts->count() > 1 ? $allPosts->slice(1) : collect();

        return view('blog', [
            'posts' => $allPosts,
            'featuredPost' => $featuredPost,
            'gridPosts' => $gridPosts,
            'categories' => $categories,
            'totalCount' => $totalCount,
            'itadCount' => $itadCount,
            'softwareCount' => $softwareCount,
            'activeCategory' => $request->input('category', 'all'),
            'searchQuery' => $request->input('q', ''),
        ]);
    }

    /**
     * Display a single blog post with attached FAQs and related articles.
     */
    public function show(string $slug)
    {
        $post = BlogPost::with('faqs')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Related posts in same category or latest
        $relatedPosts = BlogPost::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->when($post->category, function ($q) use ($post) {
                $q->where('category', $post->category);
            })
            ->latest('published_at')
            ->take(3)
            ->get();

        if ($relatedPosts->isEmpty()) {
            $relatedPosts = BlogPost::where('is_published', true)
                ->where('id', '!=', $post->id)
                ->latest('published_at')
                ->take(3)
                ->get();
        }

        return view('blog.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
        ]);
    }
}

