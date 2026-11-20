<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function show(string $section, string $slug)
    {
        $service = Service::with(['sections' => fn ($query) => $query->where('is_active', true)->orderBy('sort_order')])
            ->where('page_section', $section)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('services.show', compact('service'));
    }
}
