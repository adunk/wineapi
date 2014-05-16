<?php

class Wine extends \Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'wines';

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
	  'vintage',
	  'body',
	  'winery_id',
	];
	
	/**
	 * Defining an inverse relationship with Wineries
	 */
  public function winery()
  {
    return $this->belongsTo('Winery');
  }
}