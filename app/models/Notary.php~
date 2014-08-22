<?php

class Notary extends Eloquent {

	protected $table = 'notaries';

	public function responsible(){
		return $this->belongsTo('User');
	}

	public function notaryUsers(){
		return $this->morphOne('User', 'workable');
	}

}
