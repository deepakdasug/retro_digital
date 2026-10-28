<?php

namespace App\Http\Controllers;

use App\Models\Industry;

class IndustryController extends Controller
{
    // Display all published industries
    public function index()
    {
        $industries = Industry::where('is_published', true)
            ->orderBy('sort_order')
            ->get();

        return view('industries.index', compact('industries'));
    }

    // Display one industry and its dynamic content
    public function show(string $slug)
    {
        $industry = Industry::where('slug', $slug)
            ->where('is_published', true)
            ->with(['contents' => function ($query) {
                $query->where('is_visible', true)
                    ->orderBy('sort_order');
            }])
            ->firstOrFail();

        return view('industries.show', compact('industry'));
    }
}
