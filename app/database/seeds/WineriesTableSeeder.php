<?php

class WineriesTableSeeder extends Seeder {

	public function run()
	{
	  Eloquent::unguard();
	  
	  Winery::create([
	    'name' => 'Gundlach Bundschu',
	    'body' => 'For six generations and over 150 years, our family has farmed our estate vineyard at the crossroads of the Sonoma Valley, Carneros and Napa Valley appellations. Today, we focus on making small lots of ultra-premium wines from this distinctive and historic property.',
	    'street_address_1' => '2000 Denmark Street',
	    'city' => 'Sonoma',
	    'state' => 'CA',
	    'zip' => '95476',
	    'country' => 'USA',
	    'email' => 'info@gunbun.com',
	    'phone' => '7079385277',
	    'url' => 'http://www.gunbun.com/',
	  ]);
	}

}