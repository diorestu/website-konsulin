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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('nama_com', 100);
            $table->string('brand_com', 100);
            $table->string('alamat_com1', 200);
            $table->string('alamat_com2', 200)->nullable();
            $table->string('alamat_com3', 200)->nullable();
            $table->string('alamat_com4', 200)->nullable();
            $table->string('alamat_com5', 200)->nullable();
            $table->string('social_fb', 200)->nullable();
            $table->string('social_tw', 200)->nullable();
            $table->string('social_yt', 200)->nullable();
            $table->string('social_lk', 200)->nullable();
            $table->string('social_ig', 200)->nullable();
            $table->string('email_com1', 100);
            $table->string('email_com2', 100)->nullable();
            $table->string('email_com3', 100)->nullable();
            $table->string('email_com4', 100)->nullable();
            $table->string('email_com5', 100)->nullable();
            $table->string('phone_com1', 50);
            $table->string('phone_com2', 50)->nullable();
            $table->string('phone_com3', 50)->nullable();
            $table->string('phone_com4', 50)->nullable();
            $table->string('phone_com5', 50)->nullable();
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
        Schema::dropIfExists('companies');
    }
};
