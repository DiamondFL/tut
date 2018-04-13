<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users',function($table){
            $table->increments('id');
            $table->string('email',50);
            $table->string('fullName',30);
            $table->string('password',60);
            $table->string('password_temp',60);
            $table->string('code',60);
            $table->string('remember_token',60);
            $table->string('active',60);
            $table->tinyInteger('level');
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
		//
	}

}
