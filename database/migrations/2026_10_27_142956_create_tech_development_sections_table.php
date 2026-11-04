<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tech_development_sections', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tech_development_id')
                ->constrained('tech_developments')
                ->cascadeOnDelete();

            $table->string('section_type');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->json('content')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tech_development_sections');
    }
};
