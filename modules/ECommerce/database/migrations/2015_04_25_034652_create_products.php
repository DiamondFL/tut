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
		Schema::create('product',function($t){
            $t->increments('id');
            $t->integer('groupId')->unsigned();
            $t->integer('styleId')->unsigned();
            $t->string('name',48);
            $t->integer('price');
            $t->string('picture');
            $t->text('intro');
            $t->text('details');
            $t->integer('discount')->default(0);
            $t->integer('views')->default(0);
            $t->integer('total')->default(0);
            $t->integer('recommended')->default(0);
            $t->integer('active')->default(1);
            $t->foreign('groupId')->references('id')->on('group');
            $t->foreign('styleId')->references('id')->on('style');
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
        Schema::table('product', function($table)
        {
            $table->string('picture')->after('price')->nullable()->change();
        });
	}

}
