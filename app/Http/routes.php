<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin'],function(){
	Route::group(['prefix' => 'department'],function(){
		Route::get('list',['as' => 'admin.department.list','uses' => 'DepartmentController@getList']);
		Route::get('add',['as' => 'admin.department.getAdd','uses' => 'DepartmentController@getAdd']);
		Route::post('add',['as' => 'admin.department.postAdd','uses' => 'DepartmentController@postAdd']);
	});
});