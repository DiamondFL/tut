<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContact extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact', function($t){
            $t->increments('id');
            $t->integer('userId')->unsigned();
            $t->string('title');
            $t->text('message');
            $t->tinyInteger('active');
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
