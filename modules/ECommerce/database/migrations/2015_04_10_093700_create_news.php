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
        Schema::create('news',function($t){
            $t->increments('id');
            $t->integer('groupId')->unsigned();
            $t->integer('styleId')->unsigned();
            $t->string('title');
            $t->text('intro');
            $t->text('details');
            $t->integer('views');
            $t->tinyInteger('active');
            $t->timestamps();
            $t->foreign('groupId')->references('id')->on('group');
            $t->foreign('styleId')->references('id')->on('style');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

	}

}
