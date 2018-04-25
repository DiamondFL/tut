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
        Schema::create('chats', function($table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('receive_id')->unsigned();
            $table->text('message');
            $table->tinyInteger('is_active');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('receive_id')->references('id')->on('users');
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
        Schema::dropIfExists('chats');
	}

}
