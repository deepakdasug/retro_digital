<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('web_page_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('web_page_id')->constrained()->cascadeOnDelete();
            $table->string('section_type');    // hero, about, faqs, features, etc.
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->json('content')->nullable(); // flexible per-section data
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('web_page_sections');
    }
};