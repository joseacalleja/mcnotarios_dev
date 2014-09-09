<?php namespace  app\Services\Validators;

/*made by jacr 05-sep-2014 ...recapitulation class
	*****************
	* AreaValidator *
	*****************
	*/
class AreaValidator extends Validator {
	
	public static $rules = array(
		'number' => 'required',
		'description' => 'required|alpha_spaces|min:2',
		'responsible' => 'required|alpha_spaces|min:2',
		'cell_phone' => 'required|alpha_spaces',
		'office_phone' => 'required|alpha_spaces',
		'email' => 'required|email',
		// ubication may not required
		'ubication' => 'required|alpha_dash',
		);

}