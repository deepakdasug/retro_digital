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

        $layout = config(
            'page_layouts.' . $service->page_section . '.pages.' . $service->slug . '.show',
            config('page_layouts.' . $service->page_section . '.show', 'services.show')
        );

        return view($layout, compact('service'));
    }
}
