<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChat extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('chat', function($t){
            $t->increments('id');
            $t->integer('userId')->unsigned();
            $t->integer('receiveId')->unsigned();
            $t->text('message');
            $t->tinyInteger('active');
            $t->foreign('userId')->references('id')->on('users');
            $t->foreign('receiveId')->references('id')->on('users');
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

	}

}
