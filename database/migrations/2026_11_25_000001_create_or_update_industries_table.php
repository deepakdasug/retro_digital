<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('industries')) {
            Schema::create('industries', function (Blueprint $table) {
                $table->id();

                // Identity & listing
                $table->string('name');
                $table->string('slug')->unique();
                $table->string('icon')->nullable();
                $table->string('short_description')->nullable();
                $table->text('description')->nullable();

                // Section 1: Hero
                $table->string('hero_eyebrow', 120)->nullable();
                $table->string('hero_title')->nullable();
                $table->text('hero_description')->nullable();
                $table->string('hero_image')->nullable();
                $table->string('hero_cta_text', 80)->nullable();
                $table->string('hero_cta_link', 500)->nullable();
                $table->string('hero_secondary_text', 80)->nullable();
                $table->string('hero_secondary_link', 500)->nullable();
                $table->string('hero_index_label', 120)->nullable();

                // Section 2: Intro / Overview
                $table->string('intro_eyebrow', 120)->nullable();
                $table->string('intro_heading')->nullable();
                $table->longText('intro_description')->nullable();
                $table->string('intro_link_text', 100)->nullable();
                $table->string('intro_link_url', 500)->nullable();
                $table->string('intro_image')->nullable();
                $table->string('intro_note_title', 150)->nullable();
                $table->string('intro_note_text', 300)->nullable();

                // Section 3: Key Features
                $table->string('features_eyebrow', 120)->nullable();
                $table->string('features_heading')->nullable();
                $table->text('features_description')->nullable();
                $table->json('features')->nullable();

                // Section 4: Reasons / Solutions
                $table->string('reasons_eyebrow', 120)->nullable();
                $table->string('reasons_heading')->nullable();
                $table->text('reasons_description')->nullable();
                $table->json('reasons')->nullable();

                // Section 5: Compliance / Spotlight
                $table->string('spotlight_eyebrow', 120)->nullable();
                $table->string('spotlight_heading')->nullable();
                $table->text('spotlight_description')->nullable();
                $table->string('spotlight_image')->nullable();

                // Section 6: FAQs
                $table->string('faq_eyebrow', 120)->nullable();
                $table->string('faq_heading')->nullable();
                $table->text('faq_description')->nullable();
                $table->json('faqs')->nullable();

                // Section 7: Closing CTA
                $table->string('cta_eyebrow', 120)->nullable();
                $table->string('cta_heading')->nullable();
                $table->text('cta_description')->nullable();
                $table->string('cta_primary_text', 80)->nullable();
                $table->string('cta_primary_link', 500)->nullable();
                $table->string('cta_whatsapp_text', 80)->nullable();
                $table->string('cta_whatsapp_link', 500)->nullable();

                // SEO & Schema
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->text('meta_keywords')->nullable();
                $table->string('canonical_url', 2048)->nullable();
                $table->string('og_image')->nullable();
                $table->longText('schema_markup')->nullable();

                $table->boolean('is_published')->default(false);
                $table->unsignedInteger('sort_order')->default(0);

                $table->timestamps();
            });

            return;
        }

        Schema::table('industries', function (Blueprint $table) {
            if (! Schema::hasColumn('industries', 'icon')) {
                $table->string('icon')->nullable()->after('slug');
            }
            if (! Schema::hasColumn('industries', 'hero_eyebrow')) {
                $table->string('hero_eyebrow', 120)->nullable()->after('description');
            }
            if (! Schema::hasColumn('industries', 'hero_cta_text')) {
                $table->string('hero_cta_text', 80)->nullable()->after('hero_image');
            }
            if (! Schema::hasColumn('industries', 'hero_cta_link')) {
                $table->string('hero_cta_link', 500)->nullable()->after('hero_cta_text');
            }
            if (! Schema::hasColumn('industries', 'hero_secondary_text')) {
                $table->string('hero_secondary_text', 80)->nullable()->after('hero_cta_link');
            }
            if (! Schema::hasColumn('industries', 'hero_secondary_link')) {
                $table->string('hero_secondary_link', 500)->nullable()->after('hero_secondary_text');
            }
            if (! Schema::hasColumn('industries', 'hero_index_label')) {
                $table->string('hero_index_label', 120)->nullable()->after('hero_secondary_link');
            }

            if (! Schema::hasColumn('industries', 'intro_eyebrow')) {
                $table->string('intro_eyebrow', 120)->nullable()->after('hero_index_label');
            }
            if (! Schema::hasColumn('industries', 'intro_link_text')) {
                $table->string('intro_link_text', 100)->nullable()->after('intro_description');
            }
            if (! Schema::hasColumn('industries', 'intro_link_url')) {
                $table->string('intro_link_url', 500)->nullable()->after('intro_link_text');
            }
            if (! Schema::hasColumn('industries', 'intro_note_title')) {
                $table->string('intro_note_title', 150)->nullable()->after('intro_image');
            }
            if (! Schema::hasColumn('industries', 'intro_note_text')) {
                $table->string('intro_note_text', 300)->nullable()->after('intro_note_title');
            }

            if (! Schema::hasColumn('industries', 'features_eyebrow')) {
                $table->string('features_eyebrow', 120)->nullable()->after('intro_note_text');
            }
            if (! Schema::hasColumn('industries', 'features_heading')) {
                $table->string('features_heading')->nullable()->after('features_eyebrow');
            }
            if (! Schema::hasColumn('industries', 'features_description')) {
                $table->text('features_description')->nullable()->after('features_heading');
            }
            if (! Schema::hasColumn('industries', 'features')) {
                $table->json('features')->nullable()->after('features_description');
            }

            if (! Schema::hasColumn('industries', 'reasons_eyebrow')) {
                $table->string('reasons_eyebrow', 120)->nullable()->after('features');
            }
            if (! Schema::hasColumn('industries', 'reasons_heading')) {
                $table->string('reasons_heading')->nullable()->after('reasons_eyebrow');
            }
            if (! Schema::hasColumn('industries', 'reasons_description')) {
                $table->text('reasons_description')->nullable()->after('reasons_heading');
            }
            if (! Schema::hasColumn('industries', 'reasons')) {
                $table->json('reasons')->nullable()->after('reasons_description');
            }

            if (! Schema::hasColumn('industries', 'spotlight_eyebrow')) {
                $table->string('spotlight_eyebrow', 120)->nullable()->after('reasons');
            }
            if (! Schema::hasColumn('industries', 'spotlight_heading')) {
                $table->string('spotlight_heading')->nullable()->after('spotlight_eyebrow');
            }
            if (! Schema::hasColumn('industries', 'spotlight_description')) {
                $table->text('spotlight_description')->nullable()->after('spotlight_heading');
            }
            if (! Schema::hasColumn('industries', 'spotlight_image')) {
                $table->string('spotlight_image')->nullable()->after('spotlight_description');
            }

            if (! Schema::hasColumn('industries', 'faq_eyebrow')) {
                $table->string('faq_eyebrow', 120)->nullable()->after('spotlight_image');
            }
            if (! Schema::hasColumn('industries', 'faq_heading')) {
                $table->string('faq_heading')->nullable()->after('faq_eyebrow');
            }
            if (! Schema::hasColumn('industries', 'faq_description')) {
                $table->text('faq_description')->nullable()->after('faq_heading');
            }
            if (! Schema::hasColumn('industries', 'faqs')) {
                $table->json('faqs')->nullable()->after('faq_description');
            }

            if (! Schema::hasColumn('industries', 'cta_eyebrow')) {
                $table->string('cta_eyebrow', 120)->nullable()->after('faqs');
            }
            if (! Schema::hasColumn('industries', 'cta_heading')) {
                $table->string('cta_heading')->nullable()->after('cta_eyebrow');
            }
            if (! Schema::hasColumn('industries', 'cta_description')) {
                $table->text('cta_description')->nullable()->after('cta_heading');
            }
            if (! Schema::hasColumn('industries', 'cta_primary_text')) {
                $table->string('cta_primary_text', 80)->nullable()->after('cta_description');
            }
            if (! Schema::hasColumn('industries', 'cta_primary_link')) {
                $table->string('cta_primary_link', 500)->nullable()->after('cta_primary_text');
            }
            if (! Schema::hasColumn('industries', 'cta_whatsapp_text')) {
                $table->string('cta_whatsapp_text', 80)->nullable()->after('cta_primary_link');
            }
            if (! Schema::hasColumn('industries', 'cta_whatsapp_link')) {
                $table->string('cta_whatsapp_link', 500)->nullable()->after('cta_whatsapp_text');
            }

            if (! Schema::hasColumn('industries', 'schema_markup')) {
                $table->longText('schema_markup')->nullable()->after('og_image');
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industries');
    }
};
