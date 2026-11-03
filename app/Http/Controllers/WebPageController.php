<?php

namespace App\Http\Controllers;

use App\Models\WebPage;

class WebPageController extends Controller
{
    public function show(WebPage $webPage)
    {
        // Only show published pages to the public, or authenticated admins
        if (!$webPage->is_published && !auth()->check()) {
            abort(404);
        }

        // Load the visible sections in order
        $webPage->load(['sections' => function ($query) {
            $query->where('is_visible', true)->orderBy('sort_order');
        }]);

        return view('web-page', compact('webPage'));
    }
}
