<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display the public FAQs page with dynamic database records.
     */
    public function index(Request $request)
    {
        try {
            $allFaqs = Faq::query()
                ->where('is_published', true)
                ->orderBy('sort_order', 'asc')
                ->orderBy('id', 'asc')
                ->get();

            // Extract unique non-empty categories
            $categories = $allFaqs->pluck('category')
                ->filter()
                ->unique()
                ->values();

            $featuredFaqs = $allFaqs->where('is_featured', true)->values();

        } catch (\Throwable $e) {
            $allFaqs = collect();
            $categories = collect();
            $featuredFaqs = collect();
        }

        return view('faqs', [
            'faqs' => $allFaqs,
            'categories' => $categories,
            'featuredFaqs' => $featuredFaqs,
        ]);
    }
}

