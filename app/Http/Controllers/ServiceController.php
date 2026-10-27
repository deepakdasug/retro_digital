<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show(string $slug)
    {
        // Find the service by its URL slug (e.g., /services/search-engine-optimization)
        $service = Service::where('slug', $slug)->firstOrFail();

        return view('service-page', [
            'service' => $service
        ]);
    }
}