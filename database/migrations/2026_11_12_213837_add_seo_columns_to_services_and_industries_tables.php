<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $seoColumns = [
        'meta_title',
        'meta_description',
        'canonical_url',
        'og_image',
        'robots_index',
        'robots_follow',
    ];

    public function up(): void
    {
        $tables = ['services', 'industries', 'tech_developments'];

        foreach ($tables as $table) {
            if (! Schema::hasTable($table)) {
                \Log::info("[seo-migration] Skipping {$table}: table does not exist.");
                continue;
            }

            $existing = Schema::getColumnListing($table);
            $missing  = array_values(array_diff($this->seoColumns, $existing));

            if (empty($missing)) {
                \Log::info("[seo-migration] Skipping {$table}: all SEO columns already exist.");
                continue;
            }

            Schema::table($table, function (Blueprint $t) use ($missing) {
                if (in_array('meta_title', $missing, true)) {
                    $t->string('meta_title')->nullable();
                }
                if (in_array('meta_description', $missing, true)) {
                    $t->string('meta_description', 320)->nullable();
                }
                if (in_array('canonical_url', $missing, true)) {
                    $t->string('canonical_url')->nullable();
                }
                if (in_array('og_image', $missing, true)) {
                    $t->string('og_image')->nullable();
                }
                if (in_array('robots_index', $missing, true)) {
                    $t->boolean('robots_index')->default(true);
                }
                if (in_array('robots_follow', $missing, true)) {
                    $t->boolean('robots_follow')->default(true);
                }
            });

            \Log::info("[seo-migration] Updated {$table}: added " . implode(', ', $missing));
        }
    }

    public function down(): void
    {
        $tables = ['services', 'industries', 'tech_developments'];

        foreach ($tables as $table) {
            if (! Schema::hasTable($table)) {
                continue;
            }

            $existing = Schema::getColumnListing($table);
            $toDrop   = array_values(array_intersect($this->seoColumns, $existing));

            if (empty($toDrop)) {
                continue;
            }

            Schema::table($table, function (Blueprint $t) use ($toDrop) {
                $t->dropColumn($toDrop);
            });

            \Log::info("[seo-migration] Rolled back {$table}: dropped " . implode(', ', $toDrop));
        }
    }
};