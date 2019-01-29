<?php

// Route::get('/', function () {
//     return view('tpack');
// });
Route::any('{all}', function () {
    return view('tpack');
})->where(['all' => '.*']);


// Route::any('{all}', function () {
// 	if (\Request::is('admin')) { 
// 		return view('admin');
// 	}
//     return view('tpack');
// })->where(['all' => '.*']);