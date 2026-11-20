<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('tech_development_sections');
        Schema::dropIfExists('tech_developments');
        Schema::dropIfExists('services');
    }

    public function down(): void
    {
        // These retired page tables contained user content and are intentionally not recreated.
    }
};
