<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sample admin
		App\User::create([
			'name' => 'admin',
			'email' => 'am.mj03@gmail.com',
			'password' => bcrypt('secret'),
			'role' => 'admin'
		]);

		// sample admin
		App\User::create([
			'name' => 'Ardi',
			'email' => 'ardicell3@gmail.com',
			'password' => bcrypt('konter89'),
			'role' => 'admin'
		]);

		// sample customer
		App\User::create([
			'name' => 'customer',
			'email' => 'customer@gmail.com',
			'password' => bcrypt('secret'),
			'role' => 'customer'
		]);
    }
}
