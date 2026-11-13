<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Service;
use App\Models\Industry;
use App\Models\TechDevelopment;
use App\Models\Post; // Uncomment if you have a blog

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap.xml file dynamically';

    public function handle(): void
    {
        $sitemap = Sitemap::create();

        // 1. Add your static pages
        $sitemap->add(Url::create(url('/'))->setPriority(1.0));
        $sitemap->add(Url::create(url('/services'))->setPriority(0.9));
        $sitemap->add(Url::create(url('/industries'))->setPriority(0.9));
        $sitemap->add(Url::create(url('/contact'))->setPriority(0.5));

        // 2. Add dynamic service pages
        Service::where('robots_index', true)->get()
            ->each(fn (Service $service) => $sitemap->add(
                Url::create(url("/services/{$service->slug}"))
                    ->setLastModificationDate($service->updated_at)
                    ->setPriority(0.8)
            ));

        // 3. Add dynamic industry pages
        Industry::where('robots_index', true)->get()
            ->each(fn (Industry $industry) => $sitemap->add(
                Url::create(url("/industries/{$industry->slug}"))
                    ->setLastModificationDate($industry->updated_at)
                    ->setPriority(0.7)
            ));

        // 4. Add dynamic tech-development pages
        TechDevelopment::where('robots_index', true)->get()
            ->each(fn (TechDevelopment $tech) => $sitemap->add(
                Url::create(url("/tech-development/{$tech->slug}"))
                    ->setLastModificationDate($tech->updated_at)
                    ->setPriority(0.7)
            ));

        // 5. Add blog posts (if applicable)
        // Post::where('published', true)->get()
        //     ->each(fn (Post $post) => $sitemap->add(
        //         Url::create(url("/blog/{$post->slug}"))
        //             ->setLastModificationDate($post->updated_at)
        //             ->setPriority(0.6)
        //     ));

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully at: ' . public_path('sitemap.xml'));
    }
}