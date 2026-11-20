<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('web_page_sections');
        Schema::dropIfExists('web_pages');
    }

    public function down(): void
    {
        // Removed page data cannot be reconstructed by a rollback.
    }
};
