<?php

namespace App\Http\Controllers;

use App\Models\Industry;

class IndustryController extends Controller
{
    public function show(string $slug)
    {
        $industry = Industry::published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('industries.layout', compact('industry'));
    }
}
