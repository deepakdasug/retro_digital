<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            if (!Schema::hasColumn('blog_posts', 'title')) {
                $table->string('title')->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'slug')) {
                $table->string('slug')->nullable()->unique();
            }
            if (!Schema::hasColumn('blog_posts', 'image_path')) {
                $table->string('image_path')->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'excerpt')) {
                $table->text('excerpt')->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'content_blocks')) {
                $table->json('content_blocks')->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'author_name')) {
                $table->string('author_name')->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'author_designation')) {
                $table->string('author_designation')->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'is_published')) {
                $table->boolean('is_published')->default(false);
            }
            if (!Schema::hasColumn('blog_posts', 'published_at')) {
                $table->timestamp('published_at')->nullable();
            }
            if (Schema::hasColumn('blog_posts', 'post_status')) {
                $table->string('post_status', 20)->default('draft')->change();
            }
        });
    }

    public function down(): void
    {
        // Keep repaired columns and existing records intact on rollback.
    }
};