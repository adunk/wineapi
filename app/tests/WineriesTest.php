<?php

class WineriesTest extends ApiTester {

  use Factory;
  
  /**
   * @test
   */
  public function it_fetches_wineries()
  {
    // Arrange
    $this->make('Winery', [
      'name' => 'St. Francis Winery',
    ]);
    
    // Act
    $this->getJson('api/v1/wineries');
    
    // Make assertions
    $this->assertResponseOk();
  }
  
  /**
   * @test
   */
  public function it_fetches_a_single_winery()
  {
    // Arrange
    $this->make('Winery', [
      'name' => 'St. Francis Winery',
    ]);
    
    // Act (This will need to be updated on account of auto-increatment when this table is truncated)
    $winery = $this->getJson('api/v1/wineries/64')->data;
    
    // Make assertions
    $this->assertResponseOk();
    $this->assertObjectHasAttributes($winery, 'winery', 'short', 'street_address_1', 'city', 'state', 'zip', 'country', 'email', 'phone', 'url');
  }
  
  /**
   * @test
   */
  public function it_404s_if_winery_not_found()
  {
    // Arrange
    $json = $this->getJson('api/v1/wineries/x');
    
    // Make assertions
    $this->assertResponseStatus(404);
    $this->assertObjectHasAttributes($json, 'error');
  }
  
  /**
   * @test
   */
  public function it_creates_new_winery_given_valid_parameters()
  {
    $this->getJson('api/v1/wineries', 'POST', $this->getStub());
    
    $this->assertResponseStatus(201);
  }
  
  /**
   * @test
   */
  public function it_422s_if_new_winery_fails_validation()
  {
    $this->getJson('api/v1/wineries', 'POST');
    
    $this->assertResponseStatus(422);
  }
  
  /**
   * Make stub winery to pass into our make() method.
   */
  protected function getStub()
  {
    return [
      'name' => 'Larson Family Winery',
	    'body' => $this->fake->paragraph,
	    'street_address_1' => $this->fake->streetAddress,
	    'city' => $this->fake->city,
	    'state' => $this->fake->stateAbbr,
	    'zip' => $this->fake->postcode,
	    'country' => $this->fake->country,
	    'email' => $this->fake->email,
	    'phone' => $this->fake->phoneNumber,
	    'url' => $this->fake->url,
    ];
  }
  
}
