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
        Schema::create('slider', function (Blueprint $table) {
            $table->id();
            $table->string('sl_title', 100);
            $table->string('sl_subtitle', 100)->nullable();
            $table->string('sl_desc', 300)->nullable();
            $table->string('sl_btn_caption', 100)->nullable();
            $table->string('sl_btn_link', 100)->nullable();
            $table->string('sl_images', 200)->nullable();
            $table->enum('sl_status', ['Published', 'Draft']);
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
        Schema::dropIfExists('slider');
    }
};
