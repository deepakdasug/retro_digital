<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Details
            $table->text('short_description')->nullable()->after('title');
            $table->longText('description')->nullable()->after('short_description');
            $table->string('icon')->nullable()->after('description');
            $table->string('image')->nullable()->after('icon');

            // SEO
            $table->string('meta_title')->nullable()->after('image');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('meta_keywords')->nullable()->after('meta_description');
            $table->string('og_image')->nullable()->after('meta_keywords');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'short_description',
                'description',
                'icon',
                'image',
                'meta_title',
                'meta_description',
                'meta_keywords',
                'og_image',
            ]);
        });
    }
};