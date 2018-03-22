<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UshProductDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ush_product_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ush_product_id')->unsigned()->index();
            $table->tinyInteger('size');
//            $table->mediumInteger('qty')->default(0);
            $table->tinyInteger('exchange_rate')->default(0);
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
        Schema::dropIfExists('ush_product_details');
    }
}
