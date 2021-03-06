<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	public function scopeGetEmptyUsers($query){
		$results = DB::select(DB::raw("SELECT u.id, u.firstname, u.lastname 
										FROM users AS u 
										WHERE u.workable_id = 0 
										AND u.id NOT IN (
											SELECT n.responsible FROM notaries AS n)
										AND u.id NOT IN(
											SELECT a.responsible FROM areas AS a)
								"));
		if(!empty($results)) {
			$response = array();
			foreach ($results as $user) {
					$response[$user->id] = $user->firstname . " " . $user->lastname;
			}	
		}
		return $response;
	}

	

	public function workable(){
		return $this->morphTo();
	}

	public function notaryResponsible(){
		return $this->hasOne('Notary');
	}

	public function areaResponsible(){
		return $this->hasOne('Area');
	}



	public function getRoles(){
		$roles = array(
			0 => 'guest',
			1 => 'basic',
			2 => 'medium',
			3 => 'admin'
		);
		return $roles;
	}

	public static $rules = array(
			'firstname'=>'required|alpha_spaces|min:2',
			'lastname'=>'alpha_spaces|min:2',
			'email'=>'required|email|unique:users',
			'username'=>'required|alpha_dash|unique:users',
			'password'=>'required|alpha_num|between:8,32|confirmed',
			'password_confirmation'=>'required|alpha_num|between:8,32'
		);
	
	public static $validemail = array('email'=>'required|email|exists:users');

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
	protected $hidden = array('password');

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
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function profiles()
	{
		return $this->hasMany('Profile');
	}
	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
	public function hasRole($rolename){
		/*
		$currentrole = $this->role_id; // returns a number 0, 1, 2, 3
		$key = array_search($rolename, $this->getRoles()); //returns the key of the role
		return $currentrole == $key;
		Aqui abajo ya va resumido.
		*/
		return $this->role_id == array_search($rolename, $this->getRoles());
	}

	public function getRole(){
		$roles = $this->getRoles();
		$role_id = $this->role_id;
		return $roles[$role_id];
	}
	public function confirm(){
		$this->confirmed = 1;
		$this->save();
	}
	public function isConfirmed(){
		return $this->confirmed;
	}
	public function attachRole($role){
		$this->role_id == array_search($rolename, $this->getRoles());
		$this->save();
	}
	

}
