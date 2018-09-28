<?php
Route::get('/', function () {
	    return view('admin.auth.login');
	})->middleware('guest');//si el usuario esta autnticado redirijir a otra ruta

Route::group(['prefix' => 'admin','middleware'=>'authenticate'], function(){

	Route::get('home', function () {
	    return view('welcome');
	});		
Route::group(['middleware'=>'admin'],function(){
	Route::resource('users','UserController');
	Route::get('user/{id}/destroy',[
		'uses'=>'UserController@destroy',
		'as'=>'admin.users.destroy'
	]);
	Route::get('user/{id}/active',[
		'uses'=>'UserController@active',
		'as'=>'admin.users.active'
	]);
});
	Route::resource('asignacion','AsignacionController');
	Route::get('asignacion/{id}/destroy',[
		'uses'=>'UserController@destroy',
		'as'=>'admin.users.destroy'
	]);

Route::group(['middleware'=>'gestor'],function(){
	Route::resource('viabilidad','ViabilidadController');
	Route::get('viabilidad/{id}/destroy',[
		'uses'=>'ViabilidadController@destroy',
		'as'=>'admin.viabilidad.destroy'
	]);
	Route::get('viabilidad/{id}/active',[
		'uses'=>'viabilidadController@active',
		'as' => 'admin.viabilidad.active'
	]);
});

Route::group(['prefix'=>'terreno'],function(){

	Route::get('index',[
		'uses'=>'ViabilidadController@index',
		'as'=>'admin.viabilidad.index']);

	Route::get('index/{id}',[
		'uses'=>'FrontController@verTerreno',
		'as'  =>'terreno.index'
	]);
	Route::post('comentario',[
		'uses'=>'FrontController@storeComentario',
		'as'  =>'terreno.comentario'
	]);

	Route::resource('images','ImageController');
	Route::get('image/{id}/destroy',[
		'uses' => 'ImageController@destroy',
		'as'   => 'terreno.images.destroy'
	]);
});

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