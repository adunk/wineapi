<?php

use Wineapi\Transformers\WineTransformer;

class WinesController extends ApiController {
  
  /**
   * @var Wineapi\Transformers\WineTransformer
   */
  protected $wineTransformer;
  
  /**
   * Inject the $wineTransformer as a dependency
   */
  public function __construct(\Wineapi\Transformers\WineTransformer $wineTransformer)
  {
    $this->wineTransformer = $wineTransformer;
    
    // Basic authentication on POST requests
    $this->beforeFilter('auth.basic', ['on' => 'post']);
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @param $wineryId NULL
	 * @return Response
	 */
	public function index($wineryId = NULL)
	{
		$wines = $this->getWines($wineryId);
		
    return $this->respond([
      'data' => $this->wineTransformer->transformCollection($wines->all()),
    ]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return 'Save a new wine to the database';
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return 'Return a specific wine with ID of ' . $id;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return 'Update the database record of a wine with ID of ' . $id;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return 'Delete a wine in the database with ID of ' . $id;
	}
	
	/**
	 * Helper function to get wines by winery id (if set)
	 *
	 * @param $wineryId int
	 * @returns @wines array
	 */
	protected function getWines($wineryId)
	{
  	return $wineryId ? Winery::findOrFail($wineryId)->wines : Wine::all();
	}

}