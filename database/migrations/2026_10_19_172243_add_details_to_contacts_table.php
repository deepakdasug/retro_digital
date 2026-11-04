<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('company_name')->nullable()->after('phone');
            $table->text('company_address')->nullable()->after('company_name');
            $table->string('website_url')->nullable()->after('company_address');
            $table->string('referral_source')->nullable()->after('website_url');
            $table->string('service')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn([
                'company_name',
                'company_address',
                'website_url',
                'referral_source',
            ]);
            $table->string('service')->nullable(false)->change();
        });
    }
};
