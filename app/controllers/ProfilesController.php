<?php

use Wineapi\Forms\ProfileForm;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfilesController extends \BaseController {

  protected $profileForm;
  
  public function __construct(ProfileForm $profileForm)
  {
    $this->profileForm = $profileForm;
    
    $this->beforeFilter('currentUser', ['only' => ['edit', 'update']]);
  }
  
  /**
	 * Display the specified resource.
	 *
	 * @param int $userId
	 * @return Response
	 */
	public function show($userId)
	{
	  // Try and load a user from the wildcard argument. Otherwise, throw a 404
	  try {
	    $user = User::with('profile')->whereId($userId)->firstOrFail();
	  } catch(ModelNotFoundException $e) {
  	  return Response::view('errors.missing', array(), 404);
	  }
	  
	  // TODO Should probobly do some sort of validation that a profile exists for a given user
	  // OR require that every user must have a profile.
	  
    return View::make('profiles.show')->withUser($user);
	}
	
	/**
	 *
	 */
  public function edit($userId)
  {
    $user = User::whereId($userId)->firstOrFail();
    
    return View::make('profiles.edit')->withUser($user);
  }
  
  /**
   *
   */
  public function update($userId)
  {
    $user = User::whereId($userId)->firstOrFail();
    
    $input = Input::only('location', 'website', 'bio');
    
    $this->profileForm->validate($input);
    
    $user->profile->fill($input)->save();
    
    return Redirect::route('profiles.show', $user->id)->withFlashMessage('Profile updated.');
  }
}