<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
	  Eloquent::unguard();
	  
	  User::create([
	    'name' => 'Andrew Dunkle',
	    'email' => 'andrew.dunkle@me.com',
	    'password' => Hash::make('1234'),
	  ]);
	}

}