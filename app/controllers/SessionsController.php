<?php

use Wineapi\Forms\LoginForm;

class SessionsController extends \BaseController {

  /**
   * @var LoginForm
   */
	private $_loginForm;

	/**
	 * A $loginForm object is a required dependency that holds our validation logic
	 * 
	 * @param RegistrationForm $registrationForm
	 */
	function __construct(LoginForm $loginForm)
	{
		$this->_loginForm = $loginForm;
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
		$this->_loginForm->validate($input = Input::only('email', 'password'));
		
		if (Auth::attempt($input)) {
  	  return Redirect::intended('/');	
		}
		
		return Redirect::back()->withInput()->withFlashMessage('Invalid login credentials.');
	}

	/**
	 * Destroy a session (effectively logging a user out)
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id = NULL)
	{
		Auth::logout();
		
		return Redirect::home();
	}

}