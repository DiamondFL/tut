<?php

use Illuminate\Database\Seeder;

class TestDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Modules\Examination\Models\TestDetail::class, 300)->create();
    }
}
