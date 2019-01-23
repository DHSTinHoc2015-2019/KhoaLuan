<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    function UsersAll(){
    	$user = User::all();
    	return $user;
    }

    function getEdit($id){
    	$user = User::findOrFail($id);
    	return $user;
    }

    function postUpdate(Request $request, $id){
    	$user = User::findOrFail($id);
		$user->name = $request->name;
        // $user->hesoluong = $request->hesoluong;
        // $user->luongcoban = $request->luongcoban;
        $user->save();
    	return $user;
    }

    function UsersAll1(){
    	$user = User::all()->first();
    	return $user;
    }
}
