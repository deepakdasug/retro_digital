<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services.index');
    }

    public function show(string $slug)
    {
        if ($slug === 'digital-marketing') {
            $service = Service::where('slug', 'digital-marketing')->first();
            return view('services.digital-marketing', compact('service'));
        }
        // Find the service by its URL slug (e.g., /services/search-engine-optimization)
        $service = Service::where('slug', $slug)->first();

        if (!$service) {
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

            if (isset($techSlugs[$slug])) {
                return redirect()->route('tech-development.show', ['slug' => $techSlugs[$slug]], 301);
            }

            abort(404);
        }

        return view('service-page', [
            'service' => $service
        ]);
    }
    public function digitalMarketing()
    {
        return $this->show('digital-marketing');
    }
}