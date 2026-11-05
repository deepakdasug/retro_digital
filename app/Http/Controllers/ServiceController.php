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
        $service = Service::where('slug', $slug)->firstOrFail();

        return view('service-page', [
            'service' => $service
        ]);
    }
    public function digitalMarketing()
    {
        return $this->show('digital-marketing');
    }
}