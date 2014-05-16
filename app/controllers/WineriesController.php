<?php

use Wineapi\Transformers\WineryTransformer;

class WineriesController extends ApiController {
  
  /**
   * @var Wineapi\Transformers\WineryTransformer
   */
  protected $wineryTransformer;
  
  /**
   * Inject the $wineryTransformer as a dependency
   */
  public function __construct(\Wineapi\Transformers\WineryTransformer $wineryTransformer)
  {
    $this->wineryTransformer = $wineryTransformer;
    
    // Basic authentication on POST requests
    $this->beforeFilter('auth.basic', ['on' => 'post']);
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  $limit = Input::get('limit', 5);
	  $wineries = Winery::paginate($limit);
	  
	  return $this->respondWithPagination($wineries, [
	    'data' => $this->wineryTransformer->transformCollection($wineries->all()),
	  ]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	  // We assume that if 'name' or 'body was not provided basic validation has failed
	  if (! Input::get('name'))
	  {
	    return $this->respondFailedValidation('Invalid request. Winery name not provided.');
	  }
	  
	  // Create a new winery with the provided fields
	  Winery::create(Input::all());
	  
	  // Return a successful response code
	  return $this->respondCreated('New winery successfully created.');
	  
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	  // Query database for Winery ID
		$winery = Winery::find($id);
		
		// Response if winery not found
		if (!$winery) {
		  return $this->respondNotFound('Winery does not exist.');
		}
		
		// Response if query successful
		return $this->respond([
		  'data' => $this->wineryTransformer->transform($winery),
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return 'Update the database record of a winery with ID of ' . $id;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return 'Delete a winery in the database with ID of ' . $id;
	}

}
