<?php

use Wineapi\Forms\RegistrationForm;

class RegistrationController extends \BaseController {

  /**
   * @var RegistrationForm
   */
	private $_registrationForm;

	/**
	 * A $registraionForm object is a required dependency that holds our validation logic
	 * 
	 * @param RegistrationForm $registrationForm
	 */
	function __construct(RegistrationForm $registrationForm)
	{
		$this->_registrationForm = $registrationForm;
	}

	/**
	 * Show the form to register a new account
	 *
	 * @return Response
	 */
	public function create()
	{ 
		return View::make('registration.create');
	}

	/**
	 * Store a newly created account in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	  $input = Input::only('name', 'email', 'password', 'password_confirmation');
	  
	  $this->_registrationForm->validate($input);
	  
    $user = User::create($input);
		
		Auth::login($user);
		
		return Redirect::home();
	}

}