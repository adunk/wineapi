<?php

class UsersController extends \BaseController {
  /**
   * Properties
   */
  protected $_user;
  
  /**
   * Instantiate class
   */
  public function __construct(User $user) {
    $this->_user = $user;
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    return 'Show all users';
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return 'Show user with ID of ' . $id;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return 'Show form to edit user with ID of ' . $id;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return 'Update the database record of user with ID of ' . $id;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return 'Delete the database record of user with ID of ' . $id;
	}

}