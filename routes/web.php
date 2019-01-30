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

	Route::get('user/export','UserController@exportar')->name('admin.user.export');
});
	Route::get('asignacion/index',[
		'uses'=>'ViabilidadController@showindex',
		'as'  =>'asignacion.index'
	]);
	
Route::group(['middleware'=>'gestor'],function(){
	Route::resource('viabilidad','ViabilidadController');
	Route::get('viabilidad/{id}/destroy',[
		'uses'=>'ViabilidadController@destroy',
		'as'=>'admin.viabilidad.destroy'
	]);
	Route::get('viabilidad/{id}/eliminar',[
		'uses'=>'ViabilidadController@eliminar',
		'as'=>'admin.viabilidad.eliminar'
	]);
	
	Route::get('viabilidad/{id}/active',[
		'uses'=>'viabilidadController@active',
		'as' => 'admin.viabilidad.active'
	]);
	Route::get('export','ViabilidadController@exportar')
	->name('admin.exportar');

	Route::post('import',[
		'uses' => 'ViabilidadController@importar',
		'as'=>'admin.importar'
	]);

	Route::get('alert',[
		'uses' => 'AlertController@index',
		'as'=>'admin.alert'
	]);
	
	Route::get('alert/{id}/eliminar',[
		'uses'=>'AlertController@destroy',
		'as'=>'admin.alert.eliminar'
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

	Route::get('download/{id}','ImageController@download')->name('image.download');
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

Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.cambio');

Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')
->name('password.email');

Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset','Auth\ResetPasswordController@reset')->name('password.send');
