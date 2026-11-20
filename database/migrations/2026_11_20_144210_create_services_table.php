<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            // ⛳ ADD COLUMNS HERE — copy from add_details_to_services_table
            //     and add_seo_columns_to_services_and_industries_tables
            //     e.g.  $table->text('description')->nullable();
            //           $table->string('icon')->nullable();
            //           $table->string('meta_title')->nullable();
            //           $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};