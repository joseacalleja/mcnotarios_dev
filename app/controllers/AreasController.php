<?php

class AreasController extends \BaseController {

	protected $layout = "layouts.main";

	public function getIndex(){
		$areas = Area::all();
		//$areas = Area::with('responsible')->get();
		//$areas->load('responsible');
		$this->layout->content = View::make('admin.areas.index', compact('areas'));
		$this->layout->title = Lang::get('areas.areas--title');
	}
	public function getEdit($area_id = null){
		if (is_null($area_id)){ return Redirect::to('admin/area')->withAlert(Lang::get('areas.error--emptyedit')); }
		
		$area = Area::find($area_id);
		$userlist = User::getEmptyUsers();
		// lets get the responsible user object
		$responsible_user = User::find($area->responsible);
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
		
		$this->layout->title= Lang::get('areas.edit--title');
		$this->layout->content = View::make('admin.areas.edit')->withArea($area)->withUserlist($userlist);
	
	}

	public function postEdit($area_id = null){
		if (is_null($area_id)){ return Redirect::to('admin/area')->withAlert(Lang::get('areas.error--emptyedit')); }
		$input = Input::all();
		$validation = Validator::make($input, array(
			'number' => 'required',
			'description' => 'required',
			'responsible' => 'required',
			'cell_phone' => 'required',
			'office_phone' => 'required',
			'email' => 'required',
			'ubication' => 'required'

		));
		if ($validation->passes()){
		$area = Area::find($area_id);
		$area->number = Input::get('number');
		$area->description = Input::get('description');
		$area->responsible = Input::get('responsible');
		$area->cell_phone = Input::get('cell_phone');
		$area->office_phone = Input::get('office_phone');
		$area->email = Input::get('email');
		$area->ubication = Input::get('ubication');
		$area->save();


		$user = User::find($area->responsible);
		$area->areaUsers()->save($user);
		return Redirect::to('admin/area')->withSuccess(Lang::get('areas.success--edit'));
		}
		return Redirect::to('admin/area')->withAlert(Lang::get('areas.error--edit'));
	}

	public function getNew(){
		$userlist = User::getEmptyUsers();
		if($userlist == "{}"){
			return Redirect::to('admin/area')->withAlert(Lang::get('areas.no-empty--users'));
		}
		$this->layout->title = Lang::get('areas.new--title');
		$this->layout->content=View::make('admin.areas.new')->withUserlist($userlist);
	}
	public function postNew(){
		$input = Input::all();
		$validation = Validator::make($input, array(
			'number' => 'required',
			'description' => 'required',
			'responsible' => 'required',
			'cell_phone' => 'required',
			'office_phone' => 'required',
			'email' => 'required',
			'ubication' => 'required'

		));
		if ($validation->passes()){
		$area = new Area;
		$area->number = Input::get('number');
		$area->description = Input::get('description');
		$area->responsible = Input::get('responsible');
		$area->cell_phone = Input::get('cell_phone');
		$area->office_phone = Input::get('office_phone');
		$area->email = Input::get('email');
		$area->ubication = Input::get('ubication');
		$area->save();
		return Redirect::to('admin/area')->withSuccess(Lang::get('areas.success--add'));
		}
		return Redirect::to('admin/area')->withAlert(Lang::get('areas.error--add'));
	}
}

