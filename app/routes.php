<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
| 
@tittle Wedding Invite RSVP System
@author Jose Antonio Calleja Esnal
@startdate 20 June 2014



*/

//Route::get('area/new','AreasController@postNewArea');
Route::get('area/assign',function(){
	$user = User::find(2);
	$area = Area::find(1);
	$area->areaUsers()->save($user);

});

/**
 * Limite de acceso en Filtros
 * niveles de acceso:
 * auth.admin - 3
 * auth.medium - 2
 * auth.basic -1
 * guest() - 0
 */

//Route::group(array('before' => 'auth|auth.admin'), function() {
//	Route::controller('admin','AdminController');

	/*	Route::get('user/new',array('uses' => 'UsersController@getRegister','as' => 'user.new')); */
	/*Route::get('user/super/edit/',array('uses' => 'UsersController@getEditadmin'));
	Route::get('user/super/edit/{id}',array('uses' => 'UsersController@getEditadmin'));*/
//});


Route::group(array('prefix'=> 'admin', 'before' => 'auth|auth.admin'), function() {
	Route::controller('notary','NotariesController');	
	Route::controller('area','AreasController');
	Route::controller('/','AdminController');
});


/**
 * Aquí empieza todo
 */
Route::get('/', function() {
    return Redirect::to('user/home');
});

/**
 * Si intentan hacer login desde /login, los redirigimos a la página correcta
 */
Route::get('login', function() { return Redirect::to('user/login'); });

/**
 * Aquí se cargan los controladores RESTful
 */
Route::controller('user','UsersController');
Route::controller('password','RemindersController');
//Route::controller('store','StoresController');
//Route::get('user', function() { return Redirect::to('user/home'); });
//Route::controller('admin','AdminController');
/*
 * View Composer 
 * Crea un objeto $user que es usado siempre que se invoca la plantilla layout/main.blade.php
 */
View::composer(array('layout.main', 'users.home'), function($view) {
    $view->with('user',  Auth::user());
});

