<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products',function($table){
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->integer('style_id')->unsigned();
            $table->string('name',48);
            $table->integer('price')->nullable();
            $table->string('picture');
            $table->text('intro');
            $table->text('details');
            $table->integer('discount')->default(0);
            $table->integer('views')->default(0);
            $table->integer('total')->default(0);
            $table->integer('recommended')->default(0);
            $table->integer('is_active')->default(1);
            $table->foreign('group_id')->references('id')->on('eco_groups');
            $table->foreign('style_id')->references('id')->on('styles');
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
        Schema::dropIfExists('products');
	}

}
