<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password'];
	
  /**
   * Add to the "fillable" array
   *
   * @var array
   */
  protected $fillable = ['name', 'email', 'password'];

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
	
	/**
	 * Ensures that all passwords are hashed before being saved to the database
	 */
	public function setPasswordAttribute($password)
	{
  	$this->attributes['password'] = Hash::make($password);
	}
	
	/**
	 * Establish a user relationship with a profile
	 */
	public function profile()
	{
  	return $this->hasOne('Profile');
	}
	
	/**
	 * Helper function to determine if a currently logged in user matches a given $user object
	 *
	 * @returns boolean
	 */
  public function isCurrent()
  {
    if (Auth::id() != $this->id || Auth::guest()) {
      return FALSE;
    } else
    {
      return TRUE;
    }
  }
  
}
