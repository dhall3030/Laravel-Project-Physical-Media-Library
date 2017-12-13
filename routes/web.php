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


Route::get('/getjson', function () {
    return view('test');
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


	//Route::get('admin-dashboard', 'AdminController@index');




});
//End Standard user routes


//Media routes 

Route::group(['middleware' => ['web','auth']], function () {


	
	Route::get('/media', 'MediaController@getMedia');
	Route::post('media', ['as' => 'media', 'uses' =>'MediaController@getMedia']);

	Route::get('create-media', 'MediaController@createMedia');
	Route::post('create-media', ['as' => 'create-media', 'uses' =>'MediaController@createMedia']);

	Route::get('update-media/{media_id}', 'MediaController@updateMedia');
	Route::post('update-media/{media_id}', ['as' => 'update-media', 'uses' =>'MediaController@updateMedia']);

	Route::get('get-profile/{media_id}', 'MediaController@getMediaProfile');

	Route::get('delete-media/{media_id}', 'MediaController@deleteMedia'); 

	Route::get('upload-multiple/{media_id}', 'MediaController@uploadMultiple');
	Route::post('upload-multiple/{media_id}', ['as' => 'upload-multiple', 'uses' => 'MediaController@uploadMultiple']);



});

