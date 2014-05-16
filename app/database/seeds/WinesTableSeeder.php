<?php

use Faker\Factory as Faker;

class WinesTableSeeder extends Seeder {

	public function run()
	{
	  
	  $faker = Faker::create();
	  
	  // Create an array of winery ids to map to a wine as a foreign key
	  $wineryIds = Winery::lists('id');
	  
	  Wine::create([
	    'name' => 'Morning Sun',
	    'vintage' => '2010',
	    'body' => 'This 2010 vintage is full and round, with layers of dark beautiful fruit. The elegance of raspberry, sweet dried cranberries, light smoke, plums, dark cherries, cassis and white pepper soften the tannins, while enhancing it’s rich texture and spicy finish.',
	    'winery_id' => $faker->randomElement($wineryIds),
	  ]);
	  
	  Wine::create([
	    'name' => 'Chardonnay',
	    'vintage' => '2012',
	    'body' => 'Subtle flavors of pineapple and peach marry with soft oak to produce a rich and elegant finish.',
	    'winery_id' => $faker->randomElement($wineryIds),
	  ]);
	  
	  Wine::create([
	    'name' => 'Primitivo',
	    'vintage' => '2008',
	    'body' => 'Primitivo is a varietal akin to Zinfandel and has bright fruit flavors that are forward on your palate and are spicy and reminiscent of wild strawberries. The Wine finishes with a rich fullness.',
	    'winery_id' => $faker->randomElement($wineryIds),
	  ]);
	  
	  Wine::create([
	    'name' => 'Terra',
	    'vintage' => '2010',
	    'body' => 'This wine is a wonderful expression of the varied fruit and mineral flavors of the different sections of the vineyard.',
	    'winery_id' => $faker->randomElement($wineryIds),
	  ]);
	  
	  Wine::create([
	    'name' => 'Los Chamizal',
	    'vintage' => '2009',
	    'body' => 'Aromas of black pepper, spice and mocha perfectly complement the bold fruit essences of raspberry apparent in this full flavored wine. Creamy oak flavors on the mid-palate lead to a long finish.',
	    'winery_id' => $faker->randomElement($wineryIds),
	  ]);

	  Wine::create([
	    'name' => 'Rocky Terrace',
	    'vintage' => '2010',
	    'body' => 'Inviting aromas of blackberry and anise highlight the fruit tones in this intensely flavored Zinfandel. The wine is tightly structured and finishes with a touch of chocolate on the palate.',
	    'winery_id' => $faker->randomElement($wineryIds),
	  ]);
	  
	  Wine::create([
	    'name' => 'Cabernet Franc',
	    'vintage' => '2009',
	    'body' => 'Our Cabernet Franc is intense and deep in color. The steep terraces face to the southeast and with open canopies develop fruit that is full-flavored without tight tannins. Its black fruit and black pepper aromas complement its elegant finish. This wine is made from 100% Cabernet Franc grapes',
	    'winery_id' => $faker->randomElement($wineryIds),
	  ]);
	  
	  Wine::create([
	    'name' => 'Cabernet Sauvignon',
	    'vintage' => '2009',
	    'body' => 'Our Cabernet Sauvignon is a dark rich wine with black cherry and cassis flavors carried in a long finish.',
	    'winery_id' => $faker->randomElement($wineryIds),
	  ]);
	  
	  Wine::create([
	    'name' => 'Cabernet Sauvignon',
	    'vintage' => '2010',
	    'body' => 'This is a complex wine of structure and full flavors. Black cherry, cassis flavors, 
a touch of French oak all blend together with subtle tannins on the finish.',
	    'winery_id' => $faker->randomElement($wineryIds),
	  ]);
	}

}