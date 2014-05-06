<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class WinesTableSeeder extends Seeder {

	public function run()
	{
	  Eloquent::unguard();
	  
		$faker = Faker\Factory::create();

		foreach(range(1, 10) as $index)
		{
			Wine::create([
        'name' => $faker->name,
        'body' => $faker->text,
			]);
		}
	}

}