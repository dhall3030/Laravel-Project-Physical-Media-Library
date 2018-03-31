<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



// Route::group(['middleware' => 'auth:api'], function () {
//     Route::resource('media', 'APIController');
// });


Route::group(['middleware' => ['cors','auth:api']], function () {
    
	

	Route::get('userDetails', 'ApiUserController@userDetails');


	//media routes
	Route::resource('media', 'ApiMediaController');

	Route::get('getMedia/{user_id}', 'ApiMediaController@getMedia');
	    

	//media types
	Route::resource('media-types', 'ApiMediaTypesController');	   

});


Route::group(['middleware' => 'cors'], function () {



	//user routes
	Route::post('userLogin', 'ApiUserController@userLogin');
	Route::post('userRegister', 'ApiUserController@userRegister');




});




