<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MiniTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mini_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('lesson_id');
            $table->text('questions');
            $table->string('reply1');
            $table->string('reply2');
            $table->string('reply3');
            $table->string('reply4');
            $table->unsignedTinyInteger('answer');
            $table->tinyInteger('is_active');
            $table->unsignedTinyInteger('created_by');
            $table->unsignedTinyInteger('updated_by');
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
        Schema::dropIfExists('mini_tests');
    }
}
