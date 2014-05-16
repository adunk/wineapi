<?php namespace Wineapi\Repositories;

interface WineRepository {

  /**
   *
   */
	public function getAll($id);
	
	/**
	 *
	 */
  public function find($id);
}