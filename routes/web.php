<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	    return view('admin.auth.login');
	})->middleware('guest');//si el usuario esta autnticado redirijir a otra ruta

Route::group(['prefix' => 'admin','middleware'=>'authenticate'], function(){

	Route::get('home', function () {
	    return view('welcome');
	});

	Route::resource('users','UserController');
	Route::get('user/{id}/destroy',[
		'uses'=>'UserController@destroy',
		'as'=>'admin.users.destroy'
	]);

	Route::resource('viabilidades','ViabilidadController');
	/*Route::get('user/{id}/destroy',[
		'uses'=>'UserController@destroy',
		'as'=>'admin.users.destroy'
	]);*/
});

Route::get('admin/auth/login',[
	'uses'=>'Auth\LoginController@showLoginForm',
	'as'  =>'admin.auth.login'
]);

Route::post('admin/auth/login',[
	'uses'=>'Auth\LoginController@login',
	'as'  =>'admin.auth.login'
]);

Route::get('admin/auth/logout',[
	'uses'=>'Auth\LoginController@logout',
	'as'  =>'admin.auth.logout'
]);