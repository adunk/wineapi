<?php

use Wineapi\Transformers\WineTransformer;
use Wineapi\Repositories\WineRepository;

class WinesController extends ApiController {
  
  /**
   * @var Wineapi\Transformers\WineTransformer
   */
  protected $wineTransformer;
  
  /**
   * @var Wineapi\Repositories\DbWinesRepository
   */
  protected $wine;
  
  /**
   * Inject $wineTransformer and $wines as a dependencies
   */
  public function __construct(WineTransformer $wineTransformer, WineRepository $wine)
  {
    $this->wineTransformer = $wineTransformer;
    
    $this->wine = $wine;
    
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
		$wines = $this->wine->getAll($wineryId);
		
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
	public function show($wineryId)
	{
	  $wine = $this->wine->find($wineryId);
	  
		// Response if query successful
		return $this->respond([
		  'data' => $this->wineTransformer->transform($wine),
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

}
