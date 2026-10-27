<?php

namespace App\Http\Controllers;

use App\Models\TechDevelopment;
use Illuminate\View\View;

class TechDevelopmentController extends Controller
{
    public function show(string $slug): View
    {
        if ($slug === 'salesforce-erpnext-services') {
            $slug = 'crm-development';
        }
        if ($slug === 'tech-development') {
            $slug = 'web-development';
        }

        $techDevelopment = TechDevelopment::with([
            'sections' => function ($query) {
                $query->where('is_visible', true)
                      ->orderBy('sort_order');
            }
        ])
        ->where('slug', $slug)
        ->where('is_published', true)
        ->firstOrFail();

        return view('tech_development.show', compact('techDevelopment'));
    }
}
