<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('industries', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            $table->string('short_description')->nullable();
            $table->text('description')->nullable();

            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable();

            $table->string('intro_heading')->nullable();
            $table->text('intro_description')->nullable();
            $table->string('intro_image')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('canonical_url', 2048)->nullable();
            $table->string('og_image')->nullable();

            $table->boolean('is_published')->default(false);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industries');
    }
};