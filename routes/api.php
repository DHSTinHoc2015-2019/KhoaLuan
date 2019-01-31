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
Route::get('/introduction','IntroductionController@index');
Route::get('/news','NewsController@index');
Route::get('/news/paginate', 'NewsController@paginate');
Route::get('/news/all','NewsController@showAll');
Route::get('/news/readmore/{id}','NewsController@show');

Route::get('/blog','BlogController@index');
Route::get('/blog/paginate', 'BlogController@paginate');
Route::get('/blog/readmore/{id}','blogController@show');

Route::group(['middleware' => 'auth:api'], function(){
	Route::get('/hometpack/{id}', 'HomeTpackController@show');
	Route::post('/hometpack/update/{id}', 'HomeTpackController@update');
	Route::post('/hometpack/create', 'HomeTpackController@create');
	Route::get('/hometpack/delete/{id}', 'HomeTpackController@delete');

	Route::get('/news/edit/{id}','NewsController@showedit');
	Route::post('/news/update/{id}','NewsController@update');
	Route::post('/news/create','NewsController@create');
	Route::get('/news/delete/{id}','NewsController@delete');

	Route::post('/blog/create','BlogController@create');
	Route::get('/blog/delete/{id}','BlogController@delete');
	Route::get('/blog/show/{id}','BlogController@show');
	Route::post('/blog/update/{id}','BlogController@update');

	
	Route::post('/introduction/update','IntroductionController@update');
});

/*=========Demo============*/
Route::get('/userAll', 'UsersController@UsersAll');
Route::get('/userAll/edit/{id}', 'UsersController@getEdit');
Route::post('/userAll/update/{id}', 'UsersController@postUpdate');


Route::get('/demo1', 'UsersController@UsersAll1');