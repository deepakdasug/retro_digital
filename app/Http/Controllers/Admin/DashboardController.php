<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\BlogPost;
class DashboardController extends Controller
{
    public function index()
    {
        $this->authorizeAdmin();

        $contacts = Contact::latest()->get();
        $blogs = BlogPost::latest()->get();
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
        ));
    }

    private function authorizeAdmin(): void
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
    }


}
