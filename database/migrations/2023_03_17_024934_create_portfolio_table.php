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
        Schema::create('portfolio', function (Blueprint $table) {
            $table->id();
            $table->string('pf_name', 100);
            $table->text('pf_desc');
            $table->string('pf_meta_desc', 100)->nullable();
            $table->string('pf_meta_key', 100)->nullable();
            $table->enum('pf_status', ['Published', 'Draft']);
            $table->string('pf_thumbnail', 200)->nullable();
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
        Schema::dropIfExists('portfolio');
    }
};
