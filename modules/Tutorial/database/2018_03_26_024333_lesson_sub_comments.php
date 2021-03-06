<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LessonSubComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_sub_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lesson_comment');
            $table->text('content');
            $table->unsignedInteger('create_by')->nullable();
            $table->tinyInteger('is_active');
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
        Schema::dropIfExists('lesson_sub_comments');
    }
}
