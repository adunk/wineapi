<?php

class Winery extends \Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'wineries';
	
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['created_at', 'updated_at'];
	
  /**
   * Add to the "fillable" array
   *
   * @var array
   */
	protected $fillable = [
	  'name',
	  'body',
	  'street_address_1',
	  'street_address_2',
	  'city',
	  'state',
	  'zip',
	  'country',
	  'email',
	  'phone',
	  'url',
	];
	
	/**
	 * Defining a one to many relationship with Wines
	 */
	public function wines()
	{
  	return $this->hasMany('Wine');
	}
}