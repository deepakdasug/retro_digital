<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('industry_contents');
        Schema::dropIfExists('industries');
    }

    public function down(): void
    {
        // Removed industry page data cannot be reconstructed by a rollback.
    }
};
