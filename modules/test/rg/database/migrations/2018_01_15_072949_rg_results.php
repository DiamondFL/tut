<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RgResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rg_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rg_test_id');
            $table->integer('user_id');
            $table->tinyInteger('score');
            $table->integer('rg_results_id');
            $table->tinyInteger('is_active')->default(0);
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
        Schema::dropIfExists('rg_results');
    }
}
