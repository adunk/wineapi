<?php

use Faker\Factory as Faker;

abstract class ApiTester extends TestCase {
  
  /**
   * Holds our $faker class object
   */
  protected $fake;
  
  /**
   * Instantiate object
   */
  public function __construct()
  {
    $this->fake = Faker::create();
  }
  
  /**
   * This method basically calls all our migrations in a seperate test database
   * @link https://laracasts.com/series/incremental-api-development/episodes/10
   */
  public function setUp()
  {
    parent::setUp();
    
    $this->app['artisan']->call('migrate');
  }
  
  /**
   * Get JSON output from API
   *
   * @param $uri
   * @param $method string
   * @param $parameters array (optional)
   * @returns mixed JSON encoded response
   */
  protected function getJson($uri, $method = 'GET', $parameters = [])
  {
    return json_decode($this->call($method, $uri, $parameters)->getContent());
  }
  
  /**
   * This tests that a given object has the required attributes given as arguments.
   * It is assumed that the $object is the first argument supplied.
   */
  protected function assertObjectHasAttributes()
  {
    $args = func_get_args();
    $object = array_shift($args);
    
    foreach ($args as $attribute)
    {
      $this->assertObjectHasAttribute($attribute, $object);
    }
  }
}