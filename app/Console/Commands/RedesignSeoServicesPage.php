<?php

namespace App\Console\Commands;

use Database\Seeders\SeoServicePageSeeder;
use Illuminate\Console\Command;

class RedesignSeoServicesPage extends Command
{
    protected $signature = 'seo:services-redesign';

    protected $description = 'Replace the SEO services page with its authored 12-section layout';

    public function handle(): int
    {
        app(SeoServicePageSeeder::class)->redesign();
        $this->info('SEO services page redesigned with 12 editable sections.');

        return self::SUCCESS;
    }
}
