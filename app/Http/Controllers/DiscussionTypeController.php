<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DiscussionType;

class DiscussionTypeController extends Controller
{
    function index(){
    	return response()->json(DiscussionType::all(), 200);
    }

    function show($id){
    	return response()->json(DiscussionType::findOrFail($id), 200);
    }

    function create(Request $request){
    	$discussiontype = new DiscussionType();
    	$discussiontype->name_discussion_type = $request->name_discussion_type;

    	$status = $discussiontype->save();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Thêm dữ liệu thành công' : "Thêm dữ liệu thất bại"
    	]);
    }

    function update(Request $request, $id){
    	$discussiontype = DiscussionType::findOrFail($id);
    	$discussiontype->name_discussion_type = $request->name_discussion_type;

    	$status = $discussiontype->save();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Cập nhật dữ liệu thành công' : "Cập nhật dữ liệu thất bại"
    	]);
    }

    function delete($id){
    	$discussiontype = DiscussionType::findOrFail($id);

    	$status = $discussiontype->delete();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại",
    		'id' => $id
    	]);
    }
}
