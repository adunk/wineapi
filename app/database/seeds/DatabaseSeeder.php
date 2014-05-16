<?php

class DatabaseSeeder extends Seeder {
  /**
   * @var array
   */
  private $tables = [
    'users',
    'wineries',
    'wines',
    'profiles',
  ];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	  // Call helper function to clean the database
	  $this->cleanDatabase();
	  
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('WineriesTableSeeder');
		$this->call('WinesTableSeeder');
		$this->call('ProfilesTableSeeder');
	}
	
	/**
	 * Helper function to truncate all tables in the database before seeding them
	 */
	private function cleanDatabase()
	{
	  // This prevents foreign key locks
    DB::statement('SET FOREIGN_KEY_CHECKS=0');	
  	foreach ($this->tables as $name)
  	{
    	DB::table($name)->truncate();
  	}
  	DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}

}
