<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. query the Roles by the slug
		    $adminRole = \HttpOz\Roles\Models\Role::findBySlug('user.admin');
		    $standardRole = \HttpOz\Roles\Models\Role::findBySlug('user.standard');

		    // 2a. Create admin
		    $admin = \App\User::create([
		        'name' => 'Dorian',
		        'email' => 'dorian@selfip.net',
		        'phone' => '000 000 0000',
		        'password' => bcrypt('password'),
		        //'api_token' => uniqid()
		        'api_token' => str_random(60)
		    ]);

		    // 2b. Create forum moderator
		    $standardUser = \App\User::create([
		        'name' => 'John Doe',
		        'phone' => '000 000 0000',
		        'email' => 'john@github.com',
		        'password' => bcrypt('password'),
		        //'api_token' => uniqid()
		        'api_token' => str_random(60)
		    ]);

		    // 3. Attach a role to the user object / assign a role to a user
		    $admin->attachRole($adminRole);
		    $standardUser->attachRole($standardRole);
    }
}
