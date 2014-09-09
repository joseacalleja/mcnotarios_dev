<?php 	namespace  App\Services\Validators;

/*made by jacr 05-sep-2014 ...recapitulation class
	*
	*
	namespace  App\Services\Validators;
	*
	*/
abstract class Validator {
	
	protected $input;

	public $messages;

	public static $rules;

	public function __construct($input)
	{
		$this->input = $input;  // ?: \Input::all();
	}

	public function fails()
	{
		$validation = \Validator::make($this->input, static::$rules);
		if ($validation->fails())
		{
			$this->messages = $validation->messages();
			 return true;
		}
		return false;
	}

	public function messages()
	{
		return $this->messages;
	}
}