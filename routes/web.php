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
    return view('home-page');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//custom User routes

Route::get('/register', 'UserController@register');
Route::post('/register', ['as' => 'register-user', 'uses' => 'UserController@register']);

Route::get('/login', function()
{
	
	return view('user.login');
	
});


Route::post('/login', ['as' => 'login', 'uses' => 'UserController@authenticate']);

Route::get('/logout', 'UserController@logout');

// End custom User routes



//Admin user routes

Route::group(['middleware' => ['web','auth','role:user.admin']], function () {


	Route::get('admin-dashboard', 'AdminController@index');




});
//End admin user routes


//Standard user routes

Route::group(['middleware' => ['web','auth','role:user.standard']], function () {


	Route::get('admin-dashboard', 'AdminController@index');




});
//End Standard user routes

