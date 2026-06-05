<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webpage', function (Blueprint $table) {
            $table->id();
            $table->string('wp_title', 200);
            $table->string('wp_subtitle', 100)->nullable();
            $table->string('wp_url', 100);
            $table->string('wp_text1', 300)->nullable();
            $table->string('wp_text2', 300)->nullable();
            $table->string('wp_text3', 300)->nullable();
            $table->string('wp_meta_desc', 100)->nullable();
            $table->string('wp_meta_key', 100)->nullable();
            $table->enum('wp_status', ['Published', 'Draft']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webpage');
    }
};
