<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->boolean('is_admin')->default(false);
        });
        Schema::create('services', function (Blueprint $table): void {
            $table->id();
            $table->string('slug', 40)->unique();
            $table->string('name');
            $table->text('summary');
            $table->text('description');
            $table->json('scope');
            $table->json('preparation');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true)->index();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->json('related_services');
            $table->timestamps();
        });
        Schema::create('site_settings', function (Blueprint $table): void {
            $table->string('key')->primary();
            $table->json('value');
            $table->timestamps();
        });
        foreach (config('konsulin.services') as $index => $service) {
            $seo = config('seo.services.'.$service['id']);
            DB::table('services')->insert([
                'slug' => $service['id'], 'name' => $service['name'], 'summary' => $service['summary'],
                'description' => $service['description'], 'scope' => json_encode($service['scope']),
                'preparation' => json_encode($service['preparation']), 'sort_order' => $index + 1, 'is_active' => true,
                'seo_title' => $seo['title'], 'seo_description' => $seo['title'].'. '.$service['summary'].' Hubungi Konsulin.',
                'related_services' => json_encode($seo['related']), 'created_at' => now(), 'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
        Schema::dropIfExists('services');
        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn('is_admin');
        });
    }
};
