<?php

// Route::get('/', function () {
//     return view('tpack');
// });
Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');
Route::any('{all}', function () {
    return view('tpack');
})->where(['all' => '.*']);
// Route::any('/', function () {
//     return view('tpack');
// });


// Route::any('{all}', function () {
// 	if (\Request::is('admin')) { 
// 		return view('admin');
// 	}
//     return view('tpack');
// })->where(['all' => '.*']);

// Route::get('/readrss', 'UsersController@demorss');
