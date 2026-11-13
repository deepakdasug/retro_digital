<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\TechDevelopment;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services.index');
    }

    public function show(string $slug)
    {

        // Aliases for marketing services
        $marketingAliases = [
            'seo-services' => 'search-engine-optimization',
        ];
        $slug = $marketingAliases[$slug] ?? $slug;

        if ($slug === 'digital-marketing') {
            $service = Service::where('slug', 'digital-marketing')->first();
            return view('services.digital-marketing', compact('service'));
        }

        // 1. Find the service in marketing services
        $service = Service::where('slug', $slug)->first();
        if ($service) {
            return view('service-page', [
                'service' => $service
            ]);
        }

        // 2. Find in Tech Development (render directly without redirect)
        $techSlugs = [
            'web-development' => 'web-development',
            'mobile-app-development' => 'mobile-app-development',
            'custom-application' => 'custom-application',
            'salesforce-erpnext-services' => 'crm-development',
            'crm-development' => 'crm-development',
            'saas-application' => 'saas-application',
            'api-development' => 'api-development',
            'software-development' => 'software-development',
            'whatsapp-integration' => 'whatsapp-integration',
            'tech-development' => 'web-development',
        ];

        $targetSlug = $techSlugs[$slug] ?? $slug;

        $techDevelopment = TechDevelopment::with([
            'sections' => function ($query) {
                $query->where('is_visible', true)
                    ->orderBy('sort_order');
            }
        ])
            ->where('slug', $targetSlug)
            ->where('is_published', true)
            ->first();

        if ($techDevelopment) {
            return view('tech_development.show', compact('techDevelopment'));
        }

        abort(404);
    }

    public function digitalMarketing()
    {
        return $this->show('digital-marketing');
    }
}
