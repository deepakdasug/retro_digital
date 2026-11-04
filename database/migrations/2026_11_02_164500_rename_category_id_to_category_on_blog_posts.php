<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('blog_posts', 'category_id') && !Schema::hasColumn('blog_posts', 'category')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->renameColumn('category_id', 'category');
            });
        }

        if (!Schema::hasColumn('blog_posts', 'category')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->string('category')->nullable();
            });
        } else {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->string('category')->nullable()->change();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('blog_posts', 'category') && !Schema::hasColumn('blog_posts', 'category_id')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->renameColumn('category', 'category_id');
            });
        }
    }
};
