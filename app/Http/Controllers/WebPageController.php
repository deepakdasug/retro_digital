<?php

namespace App\Http\Controllers;

use App\Models\WebPage;

class WebPageController extends Controller
{
    public function show(WebPage $webPage)
    {
        // Only show published pages to the public
        if (!$webPage->is_published) {
            abort(404);
        }

        // Load the visible sections in order
        $webPage->load(['sections' => function ($query) {
            $query->where('is_visible', true)->orderBy('sort_order');
        }]);

        return view('web-page', compact('webPage'));
    }
}