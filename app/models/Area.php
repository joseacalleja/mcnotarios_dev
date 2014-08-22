<?php

class Area extends Eloquent {

	protected $table = 'areas';

	public function responsible(){
		return $this->belongsTo('User');
	}

	public function areaUsers(){
		return $this->hasMany('User');
	}

}
