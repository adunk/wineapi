<?php

use Wineapi\Forms\RegistrationForm;

class RegistrationController extends \BaseController {

  /**
   * @var RegistrationForm
   */
	private $registrationForm;

	/**
	 * A $registraionForm object is a required dependency that holds our validation logic
	 * 
	 * @param RegistrationForm $registrationForm
	 */
	function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;
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
	  # Grab input
	  $input = Input::only('name', 'email', 'password', 'password_confirmation');
	  
	  # Validate
	  $this->registrationForm->validate($input);
	  
	  # Create a new user
    $user = User::create($input);
		
		# Log user into the system immediately
		Auth::login($user);
		
		return Redirect::home();
	}

}