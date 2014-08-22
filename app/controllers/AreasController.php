<?php

class AreasController extends \BaseController {

	protected $layout = "layouts.main";

	public function postNewArea(){
		$area = new Area;
		$area->number='obras';
		$area->description='prueba';
		$area->responsible=2;
		$area->cell_phone='';
		$area->office_phone='';
		$area->email='';
		$area->ubication='';
		$area->save();
		$this->layout->content='grabado ok';
	}
}
