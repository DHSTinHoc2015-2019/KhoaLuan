<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserManual;
class UserManualController extends Controller
{
    function show($id){
    	$usermanual = UserManual::findOrFail($id);
    	return response()->json($usermanual, 200);
    }
}
