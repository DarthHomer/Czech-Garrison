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

Route::group(['prefix' => 'admin'], function()
{

	// Troopings routes	
	Route::get('troopings', ['as' => 'troopings.index', 'uses' => 'TroopingsController@index']);
	Route::get('troopings/create', ['as' => 'troopings.create', 'uses' => 'TroopingsController@create']);
	Route::post('troopings', ['as' => 'troopings.store', 'uses' => 'TroopingsController@store']);
	Route::get('troopings/{trooping}/edit', ['as' => 'troopings.edit', 'uses' => 'TroopingsController@edit']);
	Route::put('troopings/{trooping}', ['as' => 'troopings.update', 'uses' => 'TroopingsController@update']);
	Route::delete('trooping/{trooping}', ['as' => 'troopings.destroy', 'uses' => 'TroopingsController@destroy']);

});
