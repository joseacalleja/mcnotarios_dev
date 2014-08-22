<?php

class Area extends Eloquent {

	protected $table = 'areas';

	public function responsible(){
		return $this->belongsTo('User');
	}

	public function areaUsers(){
		// this function workable is in the User object
		return $this->morphOne('User', 'workable');
	}


}
