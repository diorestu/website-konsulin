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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('news_title', 100);
            $table->string('news_slug', 100);
            $table->text('news_desc');
            $table->string('news_meta_key', 300)->nullable();
            $table->string('news_meta_desc', 300)->nullable();
            $table->integer('news_uploadby')->unsigned();
            $table->enum('news_status', ['Published', 'Draft']);
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
        Schema::dropIfExists('news');
    }
};
