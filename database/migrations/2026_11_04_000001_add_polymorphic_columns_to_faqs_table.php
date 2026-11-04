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
        Schema::table('faqs', function (Blueprint $table) {
            if (!Schema::hasColumn('faqs', 'model_type')) {
                $table->string('model_type')->nullable()->after('id');
            }

            if (!Schema::hasColumn('faqs', 'model_id')) {
                $table->unsignedBigInteger('model_id')->nullable()->after('model_type');
                $table->index(['model_type', 'model_id']);
            }

            if (!Schema::hasColumn('faqs', 'order')) {
                $table->integer('order')->default(0)->after('answer');
            }

            $table->text('question')->change();
            $table->longText('answer')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
            if (Schema::hasColumn('faqs', 'model_type') && Schema::hasColumn('faqs', 'model_id')) {
                $table->dropIndex(['model_type', 'model_id']);
                $table->dropColumn(['model_type', 'model_id']);
            }

            if (Schema::hasColumn('faqs', 'order')) {
                $table->dropColumn('order');
            }

            $table->string('question')->change();
            $table->text('answer')->change();
        });
    }
};
