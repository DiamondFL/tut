<?php

use Illuminate\Database\Seeder;

class MultiChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\MultipleChoice::class, 200)->create();
    }
}
