<?php

	/*
	*
	* lets include the use of ubication of validator as a service
	*
	*
use App\Services\Validators\NotaryValidator;
	*/

class NotariesController extends \BaseController {

	protected $layout = "layouts.main";

	public function getIndex(){
		$notaries = Notary::all();
		//$notaries = Notary::with('responsible')->get();
		//$notaries->load('responsible');
		$this->layout->content = View::make('admin.notaries.index', compact('notaries'));
		$this->layout->title = Lang::get('notaries.notaries--title');
	}
	
	public function getEdit($notary_id = null){
		if (is_null($notary_id)){ return Redirect::to('admin/notary')->withAlert(Lang::get('notaries.error--emptyedit')); }
		
		$notary = Notary::find($notary_id);
		$userlist = User::getEmptyUsers();
		// lets get the responsible user object
		$responsible_user = User::find($notary->responsible);
		// now we need to append it to the userlist, 
		//$userlistarray = json_decode($userlist, true); //first convert to array
		//$data = array($responsible_user->id => $responsible_user->firstname . " ". $responsible_user->lastname);
		//array_push($userlist, $data);
		$userlist[$responsible_user->id] = $responsible_user->firstname . " ". $responsible_user->lastname;
		//$userlistarray[$responsible_user->id] = ;
		//$userlist = json_encode($userlistarray); //convert back to JSON
		//if($userlist == "{}"){
		//	return Redirect::to('admin/area')->withAlert(Lang::get('areas.no-empty--users'));
		//}
		
		$this->layout->title= Lang::get('notaries.edit--title');
		$this->layout->content = View::make('admin.notaries.edit')->withNotary($notary)->withUserlist($userlist);
	
	}

	public function postEdit($notary_id = null){
		if (is_null($notary_id)){ return Redirect::to('admin/notary')->withAlert(Lang::get('notaries.error--emptyedit')); }
		/*
		$input = Input::all();
		$validation = Validator::make($input, array(
			'number' => 'required',
			'description' => 'required',
			'responsible' => 'required',
			'cell_phone' => 'required',
			'office_phone' => 'required',
			'email' => 'required',
			'curp' => 'required',
			'rfc' => 'required',
			'legal_name' => 'required',
			'street' => 'required',
			// this may not required
			'int_number' => 'required',
			'ext_number' => 'required',
			'colony' => 'required',
			// add_ubication may not required
			'add_ubication' => 'required',
			'city' => 'required',
			'state' => 'required',
			'country' => 'required',
			'zip_code' => 'required'

		));
		*/
		/*
		*
		* lets try .. the new one that its place on app/services/validators/Validator.php
		*
		*/
		$validation = New NotaryValidator(Input::all());
//		if ($validation->passes()){
		if ($validation->fails())
		{
			return Redirect::to('admin/notary')->withAlert(Lang::get('notaries.error--edit'));
		}			
		$notary = Notary::find($notary_id);
		$notary->number = Input::get('number');
		$notary->description = Input::get('description');
		$notary->responsible = Input::get('responsible');
		$notary->cell_phone = Input::get('cell_phone');
		$notary->office_phone = Input::get('office_phone');
		$notary->email = Input::get('email');
		$notary->curp = Input::get('curp');
		$notary->rfc = Input::get('rfc');
		$notary->legal_name = Input::get('legal_name');
		$notary->street = Input::get('street');
		// this may not required
		$notary->int_number = Input::get('int_number');
		$notary->ext_number = Input::get('ext_number');
		$notary->colony = Input::get('colony');
		// this may not required
		$notary->add_ubication = Input::get('add_ubication');
		$notary->city = Input::get('city');
		$notary->state = Input::get('state');
		$notary->country = Input::get('country');
		$notary->zip_code = Input::get('zip_code');
		$notary->save();


		$user = User::find($notary->responsible);
		$notary->notaryUsers()->save($user);
		return Redirect::to('admin/notary')->withSuccess(Lang::get('notaries.success--edit'));
	}

	public function getNew(){
		$userlist = User::getEmptyUsers();
		if($userlist == "{}"){
			return Redirect::to('admin/notary')->withAlert(Lang::get('notaries.no-empty--users'));
		}
		$this->layout->title = Lang::get('notaries.new--title');
		$this->layout->content=View::make('admin.notaries.new')->withUserlist($userlist);
	}
	public function postNew(){
		/*		
		$input = Input::all();
		$validation = Validator::make($input, array(
			'number' => 'required',
			'description' => 'required',
			'responsible' => 'required',
			'cell_phone' => 'required',
			'office_phone' => 'required',
			'email' => 'required',
			'curp' => 'required',
			'rfc' => 'required',
			'legal_name' => 'required',
			'street' => 'required',
			// this may not required
			'int_number' => 'required',
			'ext_number' => 'required',
			'colony' => 'required',
			// add_ubication may not required
			'add_ubication' => 'required',
			'city' => 'required',
			'state' => 'required',
			'country' => 'required',
			'zip_code' => 'required'

		));
		*/
		/*
		* lets try .. the new one that its place on app/services/validators/Validator.php
		*/
		$validation = New NotaryValidator(Input::all());
		if ($validation->fails())
		{
			return Redirect::to('admin/notary')->withAlert(Lang::get('notaries.error--add'));
		}

		$notary = new Notary;
		$notary->number = Input::get('number');
		$notary->description = Input::get('description');
		$notary->responsible = Input::get('responsible');
		$notary->cell_phone = Input::get('cell_phone');
		$notary->office_phone = Input::get('office_phone');
		$notary->email = Input::get('email');
		$notary->curp = Input::get('curp');
		$notary->rfc = Input::get('rfc');
		$notary->legal_name = Input::get('legal_name');
		$notary->street = Input::get('street');
		// this may not required
		$notary->int_number = Input::get('int_number');
		$notary->ext_number = Input::get('ext_number');
		$notary->colony = Input::get('colony');
		// this may not required
		$notary->add_ubication = Input::get('add_ubication');
		$notary->city = Input::get('city');
		$notary->state = Input::get('state');
		$notary->country = Input::get('country');
		$notary->zip_code = Input::get('zip_code');
		$notary->save();
		return Redirect::to('admin/notary')->withSuccess(Lang::get('notaries.success--add'));
	}
}

