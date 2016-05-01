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
		//Route::get('view',['as' => 'admin.department.view','uses' => 'DepartmentController@getView']);
		Route::get('add',['as' => 'admin.department.getAdd','uses' => 'DepartmentController@getAdd']);
		Route::post('add',['as' => 'admin.department.postAdd','uses' => 'DepartmentController@postAdd']);
		Route::get('delete/{id}',['as' => 'admin.department.getDelete','uses' => 'DepartmentController@getDelete']);
		Route::get('edit/{id}',['as' => 'admin.department.getEdit','uses' => 'DepartmentController@getEdit']);
		Route::post('edit/{id}',['as' => 'admin.department.postEdit','uses' => 'DepartmentController@postEdit']);
	});

	Route::group(['prefix' => 'employee'],function(){
		Route::get('list',['as' => 'admin.employee.list','uses' => 'EmployeeController@getList']);
		Route::get('add',['as' => 'admin.employee.getAdd','uses' => 'EmployeeController@getAdd']);
		Route::post('add',['as' => 'admin.employee.postAdd','uses' => 'EmployeeController@postAdd']);
		Route::get('delete/{id}',['as' => 'admin.employee.getDelete','uses' => 'EmployeeController@getDelete']);
		Route::get('edit/{id}',['as' => 'admin.employee.getEdit','uses' => 'EmployeeController@getEdit']);
		Route::post('edit/{id}',['as' => 'admin.employee.postEdit','uses' => 'EmployeeController@postEdit']);
	});
});
