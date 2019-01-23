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

// Route::get('/', function () {
//     return view('tpack');
// });
Route::any('{all}', function () {
	// if (\Request::is('admin')) { 
	// 	// will match URL /companies/999 or /companies/create
	// 	return view('admin');
	// }
    return view('tpack');
})->where(['all' => '.*']);