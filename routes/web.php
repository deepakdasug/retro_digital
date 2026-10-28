<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\BlogController; 
use App\Http\Controllers\Admin\DashboardController; 
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\WebPageController as AdminWebPageController;
use App\Http\Controllers\WebPageController as FrontendWebPageController;
use App\Models\BlogPost; 

/*
|--------------------------------------------------------------------------
| 1. PUBLIC WEBSITE ROUTES (No login required)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $testimonials = \App\Models\Testimonial::latest()->get();
    return view('home', compact('testimonials'));
})->name('home');

Route::get('/about-us', fn () => view('about'))->name('about');
Route::get('/careers', fn () => view('careers'))->name('careers');
Route::get('/faqs', fn () => view('faqs'))->name('faqs');

// --- BLOG ROUTES ---
Route::get('/blog', function () {
    $posts = BlogPost::where('is_published', true)->latest('published_at')->get();
    return view('blog', compact('posts')); 
})->name('blog'); 

Route::get('/blog/{slug}', function ($slug) {
    $post = BlogPost::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return view('blog.show', compact('post')); 
})->name('blog.show');

// --- CONTACT ROUTES ---
Route::get('/contact', fn () => view('contact'))->name('contact.page');
Route::get('/contact-us', fn () => view('contact'))->name('contact.us');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

// --- LEGAL ROUTES ---
Route::get('/privacy-policy', fn () => view('legal', [
    'title' => 'Privacy Policy',
    'summary' => 'How information shared through a project enquiry may be used while discussing IT asset and data lifecycle services.',
    'notice' => 'Sample website copy for layout purposes. Retrotech should review and adapt this draft to its actual privacy practices before publishing.',
    'sections' => [
        ['heading' => '1. Information We Collect', 'body' => 'If you contact us about IT asset disposition, data destruction, remarketing, or another service, we may receive the details you submit, such as your name, work contact information, organization, asset types, approximate quantities, locations, and project timing. Please do not include passwords, sensitive personal information, or confidential data in a general website enquiry.'],
        ['heading' => '2. How We Use Enquiry Information', 'body' => 'We use enquiry details to respond to your request, understand the project at a high level, prepare follow-up questions, and coordinate a conversation about suitable services. If a project proceeds, additional information may be collected and handled under the project arrangements agreed with your organization.'],
        ['heading' => '3. Cookies and Website Usage', 'body' => 'This sample website may use basic technical information, such as browser or page activity, to keep the site working and understand which information visitors find useful. Any analytics or cookie tools used on the live site should be described here accurately, with choices explained where required.'],
        ['heading' => '4. Sharing Information', 'body' => 'Enquiry details may be shared with Retrotech personnel who need them to respond or plan a discussion. Information should not be sold. If service providers support website hosting, communications, or enquiry management, their role and safeguards should be documented in the final published policy.'],
        ['heading' => '5. Data Security and Retention', 'body' => 'We aim to use reasonable administrative and technical safeguards for information submitted through the website and keep it only for as long as needed to respond, maintain business records, or meet applicable requirements. Project data, equipment records, and data destruction evidence are handled according to the relevant project scope and agreements.'],
        ['heading' => '6. Your Requests', 'body' => 'You may contact us to ask about information you submitted through this website or request a correction. We may need to verify your identity and understand the request before responding. Any rights and response timelines should be confirmed for the locations where the website is used.'],
        ['heading' => '7. Third-Party Websites', 'body' => 'Our website may link to other websites or services. Those providers operate under their own privacy terms, and we encourage visitors to review them before sharing information.'],
        ['heading' => '8. Contact and Policy Updates', 'body' => 'For a privacy question, contact Retrotech using the details on the Contact page. This policy may be updated when website practices or services change; the published version should show its effective date.'],
    ],
]))->name('privacy-policy');

Route::get('/terms-and-conditions', fn () => view('legal', [
    'title' => 'Terms and Conditions',
    'summary' => 'General information about using this website and enquiring about Retrotech IT asset lifecycle services.',
    'notice' => 'Sample website copy for layout purposes. Retrotech should review this draft and have it checked for its business and applicable locations before publishing.',
    'sections' => [
        ['heading' => '1. About These Terms', 'body' => 'These sample terms describe general use of the Retrotech website. By visiting or using the site, you agree to use it lawfully and in a way that does not disrupt the site or prevent others from using it.'],
        ['heading' => '2. Website Information and Enquiries', 'body' => 'Service descriptions are general information to help organizations explore IT asset collection, inventory, data destruction, remarketing, and related services. Submitting an enquiry does not create a service contract, reserve capacity, or guarantee a particular outcome.'],
        ['heading' => '3. Project Scope and Service Agreements', 'body' => 'Any work involving equipment, data-bearing assets, collection, transport, processing, resale, or destruction should be governed by a separate written proposal or agreement. That document should define the assets, locations, responsibilities, security requirements, fees, timing, reporting, and any agreed service standards.'],
        ['heading' => '4. Your Responsibilities', 'body' => 'When submitting an enquiry, provide information you are authorized to share and do not use the website to transmit passwords, confidential business records, or personal data that is unnecessary for an initial discussion. Before any project begins, the customer and Retrotech should agree on asset lists, access, ownership, data handling, and required approvals.'],
        ['heading' => '5. Intellectual Property', 'body' => 'The Retrotech name, logo, website design, and original website content are owned by Retrotech or used with permission. You may view and share links to the site for ordinary business purposes, but may not copy, alter, or republish protected material without permission.'],
        ['heading' => '6. Third-Party Links and Availability', 'body' => 'Links to third-party websites are provided for convenience and are controlled by those providers. We aim to keep the website available and current, but features or content may change and uninterrupted access is not guaranteed.'],
        ['heading' => '7. No Website-Based Service Guarantee', 'body' => 'Website content is provided for general information and is not a substitute for a project assessment or written service agreement. Specific asset values, processing routes, timelines, and outcomes depend on the equipment and agreed project requirements.'],
        ['heading' => '8. Changes and Contact', 'body' => 'These terms may be revised as the website and services develop. The final published terms should identify their effective date and applicable governing provisions. For questions, contact Retrotech through the Contact page.'],
    ],
]))->name('terms');


/*
|--------------------------------------------------------------------------
| 2. ADMIN ROUTES (Authentication and admin role required)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Blog
    Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/admin/blog', [BlogController::class, 'store'])->name('admin.blog.store');
    Route::post('/admin/blog/upload-media', [BlogController::class, 'uploadMedia'])->name('admin.blog.upload_media');
    Route::get('/admin/blog/{post}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/admin/blog/{post}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/admin/blog/{post}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');

    // Testimonials
    Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.index');
    Route::get('/admin/testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::post('/admin/testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::get('/admin/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::put('/admin/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/admin/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');

    // --- WEB PAGES (New Admin Wizard) ---
    Route::get('/admin/web-pages', [AdminWebPageController::class, 'index'])->name('admin.web-pages.index');
    Route::get('/admin/web-pages/create', [AdminWebPageController::class, 'create'])->name('admin.web-pages.create');
    Route::post('/admin/web-pages', [AdminWebPageController::class, 'store'])->name('admin.web-pages.store');
    Route::get('/admin/web-pages/{webPage}/edit', [AdminWebPageController::class, 'edit'])->name('admin.web-pages.edit');
    Route::put('/admin/web-pages/{webPage}', [AdminWebPageController::class, 'update'])->name('admin.web-pages.update');
    Route::delete('/admin/web-pages/{webPage}', [AdminWebPageController::class, 'destroy'])->name('admin.web-pages.destroy');
});


/*
|--------------------------------------------------------------------------
| 3. DYNAMIC CATALOG ROUTES (Industries only)
|--------------------------------------------------------------------------
*/
Route::get('/{section}/{slug}', function (string $section, string $slug) {
    // Only allow 'industries' here
    abort_unless($section === 'industries', 404);

    $sectionData = config('footer_industries');
    $page = collect($sectionData['items'])->firstWhere('slug', $slug);
    
    abort_unless($page, 404);

    return view('catalog.show', ['section' => $sectionData, 'page' => $page]);
})->where('section', 'industries')->name('catalog.show');


/*
|--------------------------------------------------------------------------
| 4. DYNAMIC SERVICES ROUTE (Must be at the very bottom)
|--------------------------------------------------------------------------
*/
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');


/*
|--------------------------------------------------------------------------
| 5. DYNAMIC WEB PAGES (Frontend Renderer)
|--------------------------------------------------------------------------
*/
Route::get('/web/{webPage}', [FrontendWebPageController::class, 'show'])->name('web-pages.show');

// Restore this route so the existing header doesn't crash
Route::get('/tech-development/{slug}', function ($slug) {
    return redirect('/')->with('info', 'Tech Development page coming soon.');
})->name('tech-development.show');