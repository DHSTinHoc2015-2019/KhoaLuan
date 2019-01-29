<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Introduction;

class IntroductionController extends Controller
{
    function index(){
    	return response()->json(Introduction::all()->first(), 200);
    }

    function update(Request $request){
    	$intro = Introduction::findOrFail(1);
    	$intro->introduction_content = $request->contentpost;
    	// $intro->introduction_content = $request->introduction_content;
    	$status = $intro->save();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Cập nhật dữ liệu thành công' : "Cập nhật dữ liệu thất bại"
    	]);
    }
}
