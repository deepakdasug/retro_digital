<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\BlogPost;
use App\Models\Service;
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
            'blog' => 0.8,
            'contact.page' => 0.5,
        ] as $routeName => $priority) {
            $sitemap->add(Url::create(route($routeName))->setPriority($priority));
        }

        Service::all()->each(function (Service $page) use ($sitemap): void {
            $url = route('webpages.show', ['section' => $page->page_section, 'slug' => $page->slug]);
            $sitemap->add(Url::create($url)->setLastModificationDate($page->updated_at)->setPriority(0.75));
        });



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
