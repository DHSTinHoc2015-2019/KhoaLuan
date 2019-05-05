<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rule;
use App\UserManual;

class RuleController extends Controller
{
    function index(){
    	$rule = Rule::all();
    	$usermanual = UserManual::all();
    	return response()->json([
    		'rule' =>$rule,
    		'usermanual' => $usermanual
    	], 200);
    }

    function show($id){
    	$rule = Rule::findOrFail($id);
    	return response()->json($rule, 200);
    }
}
