<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoLikeController extends Controller
{
    function index($like){
    	$response = [];
    	if ($like) {
    		$rs = false;
    	}
    	else $rs = true;
    	$response = ['rs' => $rs];
    	return response()->json($response);
    }
}
