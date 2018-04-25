<?php


class DatabaseSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        config(['session.driver' => 'array']);
        config(['cache.default' => 'array']);
        $this->call(UserSeeder::class);
        $this->command->info('Users Table Seeded.');
//        $this->call(RoleSeeder::class);
//        $this->command->info('Role Table Seeded.');
//        $this->call(PermissionSeeder::class);
//        $this->command->info('PermissionSeeder Table Seeded.');
//        $this->call(NewsSeeder::class);
//        $this->command->info('News Table Seed');
//        $this->call(SubjectSeeder::class);
//        $this->command->info('Subject');
//        $this->call(CourseSeeder::class);
//        $this->command->info('Course Table Seed');
//        $this->call(TestSeeder::class);
//        $this->command->info('Test Table Seed');
//
//        $this->call(MultiChoiceSeeder::class);
//        $this->command->info('MultiChoice Table Seed');
//
//        $this->call(TestDetailSeeder::class);
//        $this->command->info('DetailSeeder Table Seed');
//        $this->call(ItemSeeder::class);


        $this->call(TutorialSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(LessonCommentSeeder::class);
    }
}
