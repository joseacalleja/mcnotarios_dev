<?php namespace  app\Services\Validators;

/*made by jacr 05-sep-2014 ...recapitulation class
	*****************
	* UserValidator *
	*****************
	*/
class UserValidator extends Validator {
	
	public static $rules = array(
			'firstname'=>'required|alpha_spaces|min:2',
			'lastname'=>'alpha_spaces|min:2',
			'email'=>'required|email|unique:users',
			'username'=>'required|alpha_dash|unique:users',
			'password'=>'required|alpha_num|between:8,32|confirmed',
			'password_confirmation'=>'required|alpha_num|between:8,32',
		);		
}