<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Modules\Subject\Models\Subject::class, 50);
        //factory(\App\Modules\Security\Models\RoleUser::class, 50)->create();
    }
}
