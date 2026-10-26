<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'            => 'required|string|max:100',
            'email'           => 'required|email|max:150',
            'phone'           => 'required|string|max:25',
            'company_name'    => 'nullable|string|max:150',
            'company_address' => 'nullable|string|max:500',
            'website_url'     => 'nullable|string|max:255',
            'referral_source' => 'nullable|string|max:100',
            'service'         => 'nullable|string|max:100',
            'message'         => 'nullable|string|max:2000',
            'agree'           => 'sometimes|accepted',
        ]);

        Contact::create($data);

        return back()->with('success', 'Thank you! Your message has been received.');
    }
}