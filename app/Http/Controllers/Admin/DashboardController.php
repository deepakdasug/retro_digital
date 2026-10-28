<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\BlogPost;
use App\Models\Service;
use App\Models\TechDevelopment;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $this->authorizeAdmin();

        $contacts = Contact::latest()->get();
        $blogs = BlogPost::latest()->get();
        $services = Service::latest()->get();
        $techDevelopments = TechDevelopment::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $testimonialsCount = $testimonials->count();
        $averageRating = $testimonialsCount ? number_format((float) $testimonials->avg('rating'), 1) : '0.0';
        $fiveStarCount = $testimonials->filter(fn ($t) => (float) $t->rating >= 5.0)->count();

        // Build unified collection of recently added web pages
        $webpages = collect();

        foreach ($services as $srv) {
            $webpages->push((object) [
                'id'          => $srv->id,
                'title'       => $srv->title,
                'slug'        => $srv->slug,
                'category'    => 'Marketing Service',
                'url'         => route('services.show', $srv->slug),
                'description' => $srv->short_description ?: $srv->meta_description,
                'hero_image'  => $srv->hero_image,
                'icon'        => $srv->icon_svg ?: 'globe',
                'created_at'  => $srv->created_at ?: now(),
                'updated_at'  => $srv->updated_at ?: now(),
                'status'      => 'Active',
                'model_type'  => 'service',
            ]);
        }

        foreach ($techDevelopments as $tech) {
            $webpages->push((object) [
                'id'          => $tech->id,
                'title'       => $tech->name ?: $tech->hero_title,
                'slug'        => $tech->slug,
                'category'    => 'Tech Development',
                'url' => \Illuminate\Support\Facades\Route::has('tech-development.show') 
         ? route('tech-development.show', ['slug' => $tech->slug]) 
         : url('/tech-development/' . $tech->slug),
                'description' => $tech->short_description ?: $tech->meta_description,
                'hero_image'  => $tech->hero_image,
                'icon'        => 'code',
                'created_at'  => $tech->created_at ?: now(),
                'updated_at'  => $tech->updated_at ?: now(),
                'status'      => $tech->is_published ? 'Published' : 'Draft',
                'model_type'  => 'tech-development',
            ]);
        }

        $webpages = $webpages->sortByDesc('updated_at')->values();
        $webpagesCount = $webpages->count();

        $contactsThisMonth = Contact::where('created_at', '>=', now()->startOfMonth())->count();
        $contactsThisWeek = Contact::where('created_at', '>=', now()->startOfWeek())->count();
        $publishedBlogs = $blogs->where('is_published', true)->count();
        $draftBlogs = $blogs->where('is_published', false)->count();
        $contactServices = $contacts->groupBy(fn ($contact) => $contact->service ?: 'General enquiry')
            ->map->count()->sortDesc();
        $contactSources = $contacts->groupBy(fn ($contact) => $contact->referral_source ?: 'Not specified')
            ->map->count()->sortDesc();
        $companyEnquiries = $contacts->filter(fn ($contact) => filled($contact->company_name))->count();
        $enquiriesWithWebsite = $contacts->filter(fn ($contact) => filled($contact->website_url))->count();
        $enquiriesWithMessage = $contacts->filter(fn ($contact) => filled($contact->message))->count();
        $enquiriesWithoutCompany = $contacts->count() - $companyEnquiries;
        $blogsThisMonth = $blogs->filter(fn ($blog) => $blog->created_at?->gte(now()->startOfMonth()))->count();
        $latestContact = $contacts->first();
        $latestBlog = $blogs->first();
        $blogAuthors = $blogs->groupBy(fn ($blog) => $blog->author_name ?: 'Unknown author')->map->count()->sortDesc();
        $blogContentCount = $blogs->filter(fn ($blog) => filled(strip_tags($blog->content_html)))->count();
        $blogsWithoutImage = $blogs->filter(fn ($blog) => blank($blog->image_path))->count();
        $blogsWithoutBody = $blogs->count() - $blogContentCount;
        $averageArticleWords = $blogs->count()
            ? (int) round($blogs->sum(fn ($blog) => str_word_count(strip_tags($blog->content_html))) / $blogs->count())
            : 0;
        $blogsUpdatedThisWeek = $blogs->filter(fn ($blog) => $blog->updated_at?->gte(now()->startOfWeek()))->count();
        $recentActivityCount = $contactsThisWeek + $blogsUpdatedThisWeek;
        $recentContacts = $contacts->take(8);
        $recentBlogs = $blogs->take(8);
        $serviceCategoryCount = $contactServices->count();
        $publicationRate = $blogs->count() ? round($publishedBlogs / $blogs->count() * 100) : 0;
        $dailyChart = function (int $days) use ($contacts, $blogs): array {
            $points = collect(range($days - 1, 0))->map(function (int $daysAgo) use ($contacts, $blogs): array {
                $date = now()->subDays($daysAgo);
                $key = $date->toDateString();

                return [
                    'label' => $date->format('M j'),
                    'contacts' => $contacts->filter(fn ($contact) => $contact->created_at?->toDateString() === $key)->count(),
                    'blogs' => $blogs->filter(fn ($blog) => $blog->created_at?->toDateString() === $key)->count(),
                ];
            });

            return ['labels' => $points->pluck('label')->all(), 'contacts' => $points->pluck('contacts')->all(), 'blogs' => $points->pluck('blogs')->all()];
        };
        $monthlyPoints = collect(range(5, 0))->map(function (int $monthsAgo) use ($contacts, $blogs): array {
            $month = now()->startOfMonth()->subMonths($monthsAgo);
            $key = $month->format('Y-m');

            return [
                'label' => $month->format('M Y'),
                'contacts' => $contacts->filter(fn ($contact) => $contact->created_at?->format('Y-m') === $key)->count(),
                'blogs' => $blogs->filter(fn ($blog) => $blog->created_at?->format('Y-m') === $key)->count(),
            ];
        });
        $overviewChartData = [
            '7d' => $dailyChart(7),
            '30d' => $dailyChart(30),
            '6m' => ['labels' => $monthlyPoints->pluck('label')->all(), 'contacts' => $monthlyPoints->pluck('contacts')->all(), 'blogs' => $monthlyPoints->pluck('blogs')->all()],
        ];

        return view('admin.dashboard', compact(
            'contacts',
            'blogs',
            'services',
            'techDevelopments',
            'webpages',
            'webpagesCount',
            'contactsThisMonth',
            'contactsThisWeek',
            'publishedBlogs',
            'draftBlogs',
            'contactServices',
            'contactSources',
            'companyEnquiries',
            'enquiriesWithWebsite',
            'enquiriesWithMessage',
            'enquiriesWithoutCompany',
            'blogsThisMonth',
            'blogAuthors',
            'blogContentCount',
            'blogsWithoutImage',
            'blogsWithoutBody',
            'averageArticleWords',
            'blogsUpdatedThisWeek',
            'recentActivityCount',
            'recentContacts',
            'recentBlogs',
            'serviceCategoryCount',
            'publicationRate',
            'overviewChartData',
            'latestContact',
            'latestBlog',
            'testimonials',
            'testimonialsCount',
            'averageRating',
            'fiveStarCount',
        ));
    }

    public function storeWebpage(Request $request)
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'required|string|max:255|unique:services,slug',
            'short_description' => 'nullable|string|max:500',
            'meta_description'  => 'nullable|string|max:500',
            'hero_image'        => 'nullable|string|max:1000',
        ]);

        $title = $validated['title'];
        $slug = Str::slug($validated['slug']);
        $shortDesc = $validated['short_description'] ?: "Professional {$title} services designed to accelerate your business growth.";
        $metaDesc = $validated['meta_description'] ?: "Expert {$title} solutions by Retrotech.";
        $heroImage = $validated['hero_image'] ?: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80';

        Service::create([
            'title'             => $title,
            'slug'              => $slug,
            'short_description' => $shortDesc,
            'meta_description'  => $metaDesc,
            'hero_image'        => $heroImage,
            'icon_svg'          => 'globe',
            'content'           => [
                'hero' => [
                    'badge'    => 'Professional ' . $title,
                    'subtitle' => $shortDesc,
                    'cta'      => 'Get Started',
                ],
                'topics'   => ['Strategy', 'Implementation', 'Optimization', 'Support', 'Analytics', 'Growth'],
                'about'    => [
                    'heading'   => "Strategic {$title} engineered for real business growth.",
                    'paragraph' => $shortDesc,
                    'features'  => [
                        ['bolt', 'Proven Strategy', 'Data-backed implementation designed for outcomes.', 'Higher conversion and engagement.'],
                        ['chart', 'Measurable Growth', 'Transparent analytics and performance tracking.', 'Real business impact.'],
                        ['pen', 'Tailored Execution', 'Custom solutions matched to your brand identity.', 'Distinct market advantage.'],
                        ['shield', 'Enterprise Security', 'Strict adherence to best practices and data privacy.', 'Peace of mind.'],
                    ],
                ],
                'rows'     => [],
                'projects' => [],
                'workflow' => [
                    ['bolt', 'Discovery & Planning', 'Understand business objectives, audience and technical scope.'],
                    ['list', 'Strategy & Architecture', 'Develop the roadmap and creative specifications.'],
                    ['pen', 'Execution & Build', 'Develop, test and refine assets and workflows.'],
                    ['chart', 'Launch & Optimization', 'Deploy smoothly and monitor performance metrics.'],
                ],
                'faqs'     => [
                    ['How do we get started?', 'Contact our team using the form on this page or email info@retrotechdigital.com.'],
                    ['How long until we see results?', 'Most clients see initial impact within 30–60 days, compounding over time.'],
                ],
                'related'  => [],
            ],
        ]);

        return redirect()->to(route('admin.dashboard') . '?tab=webpage')->with('success', "Webpage '{$title}' created successfully!");
    }

    private function authorizeAdmin(): void
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
    }
}
