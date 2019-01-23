<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeTpack;

class HomeTpackController extends Controller
{
    function index(){
    	return response()->json(HomeTpack::all(), 200);
    }

    function show($id){
    	return response()->json(HomeTpack::findOrFail($id), 200);
    }

    function update(Request $request, $id){
    	$hometpack = HomeTpack::findOrFail($id);
    	$hometpack->text = $request->text;
    	$hometpack->title = $request->title;
    	$hometpack->content = $request->content;

    	$status = $hometpack->save();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Cập nhật dữ liệu thành công' : "Cập nhật dữ liệu thất bại"
    	]);
    }

    function create(Request $request){
    	$hometpack = new HomeTpack();
    	$hometpack->text = $request->text;
    	$hometpack->title = $request->title;
    	$hometpack->content = $request->content;
    	$status = $hometpack->save();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Thêm dữ liệu thành công' : "Thêm dữ liệu thất bại"
    	]);
    }

    function delete($id){
    	$hometpack = HomeTpack::findOrFail($id);
    	$status = $hometpack->delete();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại"
    	]);
    }
}
