<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNews extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('eco_news',function($table){
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->integer('style_id')->unsigned();
            $table->string('title');
            $table->text('intro');
            $table->text('details');
            $table->integer('views');
            $table->tinyInteger('is_active');
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('eco_groups');
            $table->foreign('style_id')->references('id')->on('styles');
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
        Schema::dropIfExists('eco_news');
	}

}
