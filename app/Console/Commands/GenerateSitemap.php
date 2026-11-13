<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Service;
use App\Models\Industry;
use App\Models\TechDevelopment;
use App\Models\BlogPost;
use App\Models\WebPage;
use App\Support\SeoCanonical;
use Illuminate\Support\Str;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate {--path= : Write the sitemap to a specific path}';
    protected $description = 'Generate the sitemap.xml file dynamically';

    public function handle(): void
    {
        $sitemap = Sitemap::create();

        foreach ([
            'home' => 1.0,
            'about' => 0.6,
            'careers' => 0.4,
            'faqs' => 0.6,
            'services.index' => 0.9,
            'industries.index' => 0.9,
            'blog' => 0.8,
            'contact.page' => 0.5,
        ] as $routeName => $priority) {
            $sitemap->add(Url::create(route($routeName))->setPriority($priority));
        }

        Service::where('robots_index', true)->get()
            ->each(function (Service $service) use ($sitemap): void {
                $fallback = route('services.show', $service->slug);
                $canonical = SeoCanonical::resolve(
                    $service->canonical_url,
                    $fallback
                );

                if (! SeoCanonical::usesSameHost($canonical, $fallback)) {
                    return;
                }

                $sitemap->add(Url::create($canonical)
                    ->setLastModificationDate($service->updated_at)
                    ->setPriority(0.8));
            });

        Industry::where('is_published', true)
            ->where('robots_index', true)
            ->get()
            ->each(function (Industry $industry) use ($sitemap): void {
                $fallback = route('industries.show', $industry->slug);
                $canonical = SeoCanonical::resolve(
                    $industry->canonical_url,
                    $fallback,
                    ['/industries']
                );

                if (! SeoCanonical::usesSameHost($canonical, $fallback)) {
                    return;
                }

                $sitemap->add(Url::create($canonical)
                    ->setLastModificationDate($industry->updated_at)
                    ->setPriority(0.7));
            });

        TechDevelopment::where('is_published', true)
            ->where('robots_index', true)
            ->get()
            ->each(function (TechDevelopment $tech) use ($sitemap): void {
                $fallback = route('services.show', $tech->slug);
                $canonical = SeoCanonical::resolve(
                    $tech->canonical_url,
                    $fallback,
                    ['/technology', '/tech-development']
                );

                if (! SeoCanonical::usesSameHost($canonical, $fallback)) {
                    return;
                }

                $sitemap->add(Url::create($canonical)
                    ->setLastModificationDate($tech->updated_at)
                    ->setPriority(0.7)
                );
            });

        WebPage::where('is_published', true)->get()
            ->each(fn (WebPage $webPage) => $sitemap->add(
                Url::create(route('web-pages.show', $webPage->slug))
                    ->setLastModificationDate($webPage->updated_at)
                    ->setPriority(0.6)
            ));

        BlogPost::where('is_published', true)->get()
            ->each(function (BlogPost $post) use ($sitemap): void {
                if (Str::contains(Str::lower($post->robots_meta ?? 'index, follow'), 'noindex')) {
                    return;
                }

                $fallback = route('blog.show', $post->slug);
                $canonical = SeoCanonical::resolve($post->canonical_url, $fallback);
                if (! SeoCanonical::usesSameHost($canonical, $fallback)) {
                    return;
                }

                $sitemap->add(Url::create($canonical)
                    ->setLastModificationDate($post->updated_at)
                    ->setPriority(0.6));
            });

        $path = $this->option('path') ?: public_path('sitemap.xml');
        $sitemap->writeToFile($path);

        $this->info('Sitemap generated successfully at: ' . $path);
    }
}