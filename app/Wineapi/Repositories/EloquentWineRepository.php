<?php namespace Wineapi\Repositories;

use Wine;
use Winery;

class EloquentWineRepository implements WineRepository {

	/**
	 * 
	 */
	public function getAll($wineryId)
	{
  	return $wineryId ? Winery::findOrFail($wineryId)->wines : Wine::all();
	}
	
	/**
	 *
	 */
  public function find($wineryId)
  {
    return Wine::findOrFail($wineryId);
  }
  
}