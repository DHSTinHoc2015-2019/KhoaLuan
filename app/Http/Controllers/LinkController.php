<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;

class LinkController extends Controller
{
    function create(Request $request){
    	$link = new Link();
    	$link->name = $request->name;
    	$link->link = $request->link;
    	$status = $link->save();
    	return response()->json([
            'status' => $status,
            'message' => $status ? 'Thêm dữ liệu thành công' : "Thêm dữ liệu thất bại",
        ]);
    }

    function delete($id){
    	$link = Link::findOrFail($id);
    	$status = $link->delete();
    	return response()->json([
            'status' => $status,
            'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại",
        ]);
    }
}
