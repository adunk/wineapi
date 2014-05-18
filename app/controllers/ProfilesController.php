<?php

use Wineapi\Forms\ProfileForm;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfilesController extends \BaseController {
  
  # Contains validation properties for profiles
  private $profileForm;
  
  public function __construct(ProfileForm $profileForm)
  {
    $this->profileForm = $profileForm;
    
    # Setup authentication filters (see app/filters.php)
    $this->beforeFilter('currentUser', ['only' => ['edit', 'update']]);
    $this->beforeFilter('auth', ['only' => ['create', 'store']]);
  }
  
  /**
	 * Display the specified resource.
	 *
	 * @param int $userId
	 * @return Response
	 */
	public function show($userId)
	{
	  # Try to load a user from the wildcard argument. Otherwise, throw a 404
	  try {
	    $user = User::with('profile')->whereId($userId)->firstOrFail();
	    
	    # Handles what to do if a user hasn't created a profile yet
	    if (!$user->profile)
	    {
	      if (Auth::id() == $userId)
	      {
  	      return Redirect::route('profiles.create');
	      } else {
  	      return Response::view('errors.missing', array(), 404);
	      }
	    }
	    
	  } catch (ModelNotFoundException $e) {
  	  return Response::view('errors.missing', array(), 404);
	  }
	  
    return View::make('profiles.show')->withUser($user);
	}
	
	/**
	 * Show the form to create a new profile
	 *
	 * @return response
	 */
	public function create()
	{
	  $user = Auth::user();
    $profile = $user->profile;
    
    if ($profile)
    {
      return Redirect::route('profiles.show', $user->id);
    } else
    {
      return View::make('profiles.create');
    }
	}
	
	/**
	 * Store a new profile to the database
	 */
  public function store()
  {
    # Grab input
    $input = Input::only('location', 'website', 'bio');
    
    # Validate
    $this->profileForm->validate($input);
    
    # Save profile to the current user
    $profile = new Profile($input);
    $user = User::find(Auth::id());
    $user->profile()->save($profile);
    
    return Redirect::route('profiles.show', $user->id)->withFlashMessage('Profile created.');
  }
	
	/**
	 * Show form to edit an existing profile
	 *
	 * @param $userId int
	 * @return response
	 */
  public function edit($userId)
  {
    $user = User::whereId($userId)->firstOrFail();
    
    return View::make('profiles.edit')->withUser($user);
  }
  
  /**
   * Update existing profile in the database
   *
   * @param $userId int
   * @return response
   */
  public function update($userId)
  {
    # Grab inputs
    $input = Input::only('location', 'website', 'bio');
    
    # Validate
    $this->profileForm->validate($input);
    
    # Find the given user by ID and update their profile
    $user = User::whereId($userId)->firstOrFail();
    $user->profile->fill($input)->save();
    
    return Redirect::route('profiles.show', $user->id)->withFlashMessage('Profile updated.');
  }
}
