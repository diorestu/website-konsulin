<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultation_requests', function (Blueprint $table): void {
            $table->id();
            $table->string('name', 120);
            $table->string('email', 180);
            $table->string('company', 180)->nullable();
            $table->string('service', 40);
            $table->text('message');
            $table->timestamp('consented_at');
            $table->string('status', 20)->default('new')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultation_requests');
    }
};
