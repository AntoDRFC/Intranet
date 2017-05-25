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

Route::group(['middleware' => 'auth'], function()
{
	Route::get('/', function () {
	    return view('welcome');
	});

	Route::resource('types', 'TypeController', ['except' => [
	    'show'
	]]);

	Route::resource('clients', 'ClientController', ['except' => [
	    'show'
	]]);

	Route::resource('client-details', 'ClientDetailController', ['only' => [
	    'store', 'edit', 'update', 'destroy'
	]]);

	Route::get('client-details/create/{id?}', 'ClientDetailController@Create')->name('client-details.create');

	Route::get('/client/details/{id}', 'ClientController@Details');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
