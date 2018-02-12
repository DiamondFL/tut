<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UshProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ush_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('rate')->default(0);
            $table->integer('no_rate')->default(0);
            $table->integer('ush_category_id')->unsigned()->nullable()->index();
            $table->integer('ush_group_id')->unsigned()->nullable()->index();
            $table->integer('ush_seasonal_id')->unsigned()->nullable()->index();
            $table->integer('ush_feature_id')->unsigned()->nullable()->index();
            $table->integer('ush_material_id')->unsigned()->nullable()->index();
            $table->integer('ush_brand_id')->unsigned()->nullable()->index();
            $table->integer('ush_weight_id')->unsigned()->nullable()->index();
            $table->integer('ush_price_id')->unsigned()->nullable()->index();
            $table->integer('ush_fit_id')->unsigned()->nullable()->index();
            $table->integer('ush_specialty_size_id')->unsigned()->nullable()->index();
            $table->string('img')->nullable();
            $table->string('img_plus')->nullable();
            $table->integer('price')->nullable()->default(0);
            $table->tinyInteger('minimum_order')->nullable()->default(0);
            $table->tinyInteger('items')->nullable()->default(0);
            $table->text('content');
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
        Schema::dropIfExists('ush_products');
    }
}
