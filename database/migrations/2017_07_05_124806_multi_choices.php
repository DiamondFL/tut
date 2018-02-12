<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MultiChoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi_choices', function (Blueprint $table) {
            $table->increments('id');
            $table->text('question');
            $table->string('reply1')->nullable();
            $table->string('reply2')->nullable();
            $table->string('reply3')->nullable();
            $table->string('reply4')->nullable();
            $table->string('reply5')->nullable();
            $table->integer('answer');
            $table->tinyInteger('level')->default(1);
            $table->tinyInteger('knowledge');
            $table->tinyInteger('professional');
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
        Schema::dropIfExists('multi_choices');
    }
}
    