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

/*=========Login-Resgister============*/
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('demolike/{like}', 'DemoLikeController@index');

/*=========Homepage============*/
Route::get('listhometpack', 'HomeTpackController@index');

Route::group(['middleware' => 'auth:api'], function(){
	Route::get('/hometpack/{id}', 'HomeTpackController@show');
	Route::post('/hometpack/update/{id}', 'HomeTpackController@update');
	Route::post('/hometpack/create', 'HomeTpackController@create');
	Route::get('/hometpack/delete/{id}', 'HomeTpackController@delete');
});

/*=========Demo============*/
Route::get('/userAll', 'UsersController@UsersAll');
Route::get('/userAll/edit/{id}', 'UsersController@getEdit');
Route::post('/userAll/update/{id}', 'UsersController@postUpdate');


Route::get('/demo1', 'UsersController@UsersAll1');