<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UshColorProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ush_color_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ush_product_id')->unsigned()->index();
            $table->integer('ush_color_id')->unsigned()->index();
            $table->string('img');
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
        Schema::dropIfExists('ush_color_products');
    }
}
