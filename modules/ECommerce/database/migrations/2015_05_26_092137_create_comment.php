<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('comment', function($t){
            $t->increments('id');
            $t->integer('userId')->unsigned();
            $t->integer('groupId')->unsigned();
            $t->integer('oopId')->unsigned();
            $t->text('comment');
            $t->foreign('groupId')->references('id')->on('group');
            $t->foreign('userId')->references('id')->on('users');
            $t->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
