<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('industry_contents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('industry_id')
                ->constrained('industries')
                ->cascadeOnDelete();

            $table->string('content_type');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->json('content')->nullable();

            $table->string('icon')->nullable();
            $table->string('image')->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industry_contents');
    }
};