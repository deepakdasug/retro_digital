<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            // Taxonomy & Organization
            if (!Schema::hasColumn('blog_posts', 'category')) {
                $table->string('category')->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'tags')) {
                $table->json('tags')->nullable();
            }

            // On-Page & Technical SEO Fields
            if (!Schema::hasColumn('blog_posts', 'meta_title')) {
                $table->string('meta_title')->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'meta_description')) {
                $table->text('meta_description')->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'focus_keyword')) {
                $table->string('focus_keyword')->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'canonical_url')) {
                $table->string('canonical_url')->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'robots_meta')) {
                $table->string('robots_meta')->default('index, follow');
            }
            if (!Schema::hasColumn('blog_posts', 'schema_markup')) {
                $table->json('schema_markup')->nullable();
            }

            // Publishing state (is_published already exists)
            if (!Schema::hasColumn('blog_posts', 'post_status')) {
                $table->enum('post_status', ['draft', 'published'])->default('draft');
            }

            // Engagement & UX
            if (!Schema::hasColumn('blog_posts', 'comment_status')) {
                $table->boolean('comment_status')->default(true);
            }
            if (!Schema::hasColumn('blog_posts', 'reading_time')) {
                $table->unsignedInteger('reading_time')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $columns = [
                'tags', 'meta_title', 'meta_description',
                'focus_keyword', 'canonical_url', 'robots_meta', 'schema_markup', 
                'post_status', 'comment_status', 'reading_time'
            ];
            if (Schema::hasColumn('blog_posts', 'category')) {
                $columns[] = 'category';
            } elseif (Schema::hasColumn('blog_posts', 'category_id')) {
                $columns[] = 'category_id';
            }

            $table->dropColumn($columns);
        });
    }
};