<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{ 
	  User::create([
	    'name' => 'Andrew Dunkle',
	    'email' => 'andrew.dunkle@me.com',
	    'password' => Hash::make('1234'),
	  ]);
	  
	  User::create([
	    'name' => 'Molly Dunkle',
	    'email' => 'molly.dunkle@me.com',
	    'password' => Hash::make('4321'),
	  ]);
	}

}