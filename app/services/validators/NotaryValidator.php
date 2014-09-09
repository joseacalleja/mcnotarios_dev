<?php  	namespace  app\Services\Validators;


/*made by jacr 05-sep-2014 ...recapitulation class
	*
	*
 	namespace  app\Services\Validators;
	*
	*******************
	* NotaryValidator *
	*******************
	*/
class NotaryValidator extends Validator {
	
	public static $rules = array(
		'number' => 'required',
		'description' => 'required|alpha_spaces|min:2',
		'responsible' => 'required|alpha_spaces|min:2',
		'cell_phone' => 'required|alpha_spaces',
		'office_phone' => 'required|alpha_spaces',
		'email' => 'required|email',
		'curp' => 'required',
		'rfc' => 'required',
		'legal_name' => 'required|alpha_num',
		'street' => 'required',
		// this may not required
		'int_number' => 'required',
		'ext_number' => 'required',
		'colony' => 'required|alpha_dash',
		// add_ubication may not required
		'add_ubication' => 'required|alpha_dash',
		'city' => 'required|alpha_spaces',
		'state' => 'required|alpha_spaces',
		'country' => 'required|alpha_spaces',
		'zip_code' => 'required',
		);

}