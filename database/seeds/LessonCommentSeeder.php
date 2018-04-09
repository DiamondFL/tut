<?php

use Illuminate\Database\Seeder;

class LessonCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Tutorial\Models\LessonComment::class, 999)->create();
    }
}
