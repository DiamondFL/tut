<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MiniResuls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mini_results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('lesson_id');
            $table->tinyInteger('score')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mini_results');
    }
}
