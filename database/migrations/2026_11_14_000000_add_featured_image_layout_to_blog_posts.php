<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            if (!Schema::hasColumn('blog_posts', 'featured_image_width')) {
                $table->string('featured_image_width', 4)->nullable();
            }

            if (!Schema::hasColumn('blog_posts', 'featured_image_alignment')) {
                $table->string('featured_image_alignment', 10)->nullable();
            }
        });
    }

    public function down(): void
    {
        $columns = array_filter([
            Schema::hasColumn('blog_posts', 'featured_image_width') ? 'featured_image_width' : null,
            Schema::hasColumn('blog_posts', 'featured_image_alignment') ? 'featured_image_alignment' : null,
        ]);

        if ($columns) {
            Schema::table('blog_posts', function (Blueprint $table) use ($columns) {
                $table->dropColumn($columns);
            });
        }
    }
};
