<?php

	Route::group(['middleware' => 'auth'], function () {
		Route::resource('/sala', 'SalaController', ['except' => 'show']);
		Route::resource('/exposicion', 'ExposicionController', ['except' => 'show']);
		Route::resource('/sesion', 'SesionController',['except' => 'show']);
		Route::resource('/usuario','UserController',['except' => 'show']);
		Route::resource('/expositor', 'ExpositorController',['except' => 'show']);
	});

	Auth::routes();

	Route::get('/', 'HomeController@index')->name('home');
