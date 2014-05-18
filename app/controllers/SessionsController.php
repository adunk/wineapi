<?php

/**
 * @watch https://laracasts.com/lessons/auth-essentials
 */

use Wineapi\Forms\LoginForm;

class SessionsController extends \BaseController {

  /**
   * @var LoginForm
   */
	private $loginForm;

	/**
	 * A $loginForm object is a required dependency that holds our validation logic
	 * 
	 * @param RegistrationForm $registrationForm
	 */
	function __construct(LoginForm $loginForm)
	{
		$this->loginForm = $loginForm;
	}

	/**
	 * Show the login form to create a new session
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created session in storage (effectively logs a user in)
	 *
	 * @return Response
	 */
	public function store()
	{
	  # Validate input
		$this->loginForm->validate($input = Input::only('email', 'password'));
		
		# Attemp to login a user in
		if (Auth::attempt($input)) return Redirect::intended('/')->with('flash_message', 'You have been logged in.');
		
		return Redirect::back()->withInput()->withFlashMessage('Invalid login credentials.');
	}

	/**
	 * Destroy a session (effectively logging a user out)
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		
		return Redirect::home()->with('flash_message', 'You have been logged out.');
	}
}
