<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProfilesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		
		// Create an array of user ids to establish the user<->profile relationship
		$userIds = User::lists('id');
		
		Profile::create([
		  'location' => $faker->sentence($nbWords = 3),
		  'bio' => $faker->paragraph,
		  'website' => $faker->url,
		  'user_id' => $faker->randomElement($userIds),
		]);
		
		Profile::create([
		  'location' => $faker->sentence($nbWords = 3),
		  'bio' => $faker->paragraph,
		  'website' => $faker->url,
		  'user_id' => $faker->randomElement($userIds),
		]);
	}

}