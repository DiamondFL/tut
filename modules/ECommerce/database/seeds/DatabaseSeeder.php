<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$u = new User();
		$u -> email = 'admin@gmail.com';
		$u -> password = '123456';
		$u -> save();
	}

}
