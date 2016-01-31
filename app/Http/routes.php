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
Route::get('login','WelcomeController@login');

// Auth routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::controllers([
	'password' => 'Auth\PasswordController',
]);

// Registration routes...
Route::get('auth/register', 'Auth\RegisterController@student');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/register/student','Auth\RegisterController@student');
Route::get('auth/register/company','Auth\RegisterController@company');


//Route::get('test', 'TaskController@index');

Route::get('project', 'ProjectController@index');
Route::get('profile',['as' => 'profile','uses' => 'ProfileController@index']);
Route::get('search','SearchController@index');
Route::get('search','SearchController@index');
Route::get('resume','ProfileController@resume');
Route::get('lazy','WelcomeController@lazy');
Route::post('project/update','ProjectController@upload');


/*Route::get('file','fileSystemController@store');*/
Route::get('project/compile','ProjectController@compile');
Route::get('project/{id?}', 'ProjectController@decide');



Route::get('company',        					['as' => 'company.login',          'uses' => 'Company\AuthController@login']);
Route::post('company/doLogin',   				['as' => 'company.doLogin',    	   'uses' => 'Company\AuthController@doLogin']);
Route::get('company/signup',      				['as' => 'company.signup',         'uses' => 'Company\AuthController@signup']);
Route::get('company/doSignup',    				['as' => 'company.doSignup',       'uses' => 'Company\AuthController@doSignup']);
Route::get('company/doLogout',    				['as' => 'company.doLogout',       'uses' => 'Company\AuthController@doLogout']);

Route::get('company/project',   				['as' => 'project',                'uses' => 'Company\ProjectController@index']);
Route::get('company/project/create/{id}',  		['as' => 'project.create',         'uses' => 'Company\ProjectController@create']);
Route::post('company/project/store',   			['as' => 'project.store',          'uses' => 'Company\ProjectController@store']);
Route::get('company/project/delete/{id}',   	['as' => 'project.delete',         'uses' => 'Company\ProjectController@delete']);
Route::get('company/project/edit/{id}',    		['as' => 'project.edit',           'uses' => 'Company\ProjectController@edit']);
Route::get('company/project/task/{id}',			['as' => 'project.view',           'uses' => 'Company\ProjectController@view']);


Route::get('company/project/task',   			['as' => 'task',            	   'uses' => 'Task\TaskController@index']);
Route::get('company/project/task/create/{id}',  ['as' => 'task.create',            'uses' => 'Task\TaskController@create']);
Route::post('company/project/task/store/{id}',  ['as' => 'task.store',             'uses' => 'Task\TaskController@store']);
Route::get('company/project/task/delete/{id}',  ['as' => 'task.delete',            'uses' => 'Task\TaskController@delete']);
Route::get('company/project/task/edit/{id}',   	['as' => 'task.edit',              'uses' => 'Task\TaskController@edit']);

Route::post('profile','ProfileController@store');
Route::get('profile/resumeStore', ['as' => 'profile.resumeStore',    'uses' => 'ProfileController@resumeStore']);
Route::get('text','ProfileController@analysis');



