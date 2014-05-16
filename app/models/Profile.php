<?php

class Profile extends Eloquent {

  // Protect against Mass Assignment 
  protected $fillable = [
    'location',
    'website',
    'bio',
  ];
  
  /**
   * TODO
   */
  public function user()
  {
    return $this->belongsTo('User');
  }
  
}