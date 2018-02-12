<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('code', 20)->unique()->nullable();
            $table->string('email', 50)->unique();
            $table->string('phone_number', 15)->unique()->nullable();
            $table->boolean('sex')->default(1);
            $table->string('password');
            $table->dateTime('birthday')->nullable();
            $table->text('address')->nullable();
            $table->text('avatar')->nullable();
            $table->rememberToken();
            $table->tinyInteger('active')->default(1);
            $table->dateTime('last_login')->nullable();
            $table->dateTime('last_logout')->nullable();
            $table->string('slack_webhook_url')->nullable();
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
        Schema::dropIfExists('users');
    }
}
