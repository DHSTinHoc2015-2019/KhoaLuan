<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentDetailDiscussion;

class CommentDetailDiscussionController extends Controller
{
    function create(Request $request){
    	$commentDetailDiscussion = new CommentDetailDiscussion();
    	$commentDetailDiscussion->comment_detail_discussion_content = $request->comment_detail_discussion_content;
    	$commentDetailDiscussion->id_comment_discussion = $request->id_comment_discussion;
    	$commentDetailDiscussion->id_user = $request->id_user;

    	$status = $commentDetailDiscussion->save();
    	// $status = true;

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Thêm dữ liệu thành công' : "Thêm dữ liệu thất bại",
    		'id_discussion' => $request->id_discussion
    	]);
    }

    function update(Request $request){
    	$commentDetailDiscussion = CommentDetailDiscussion::findOrFail($request->id_comment_detail);
    	$commentDetailDiscussion->comment_detail_discussion_content = $request->comment_detail_discussion_content;
    	// $commentDetailDiscussion->id_comment_discussion = $request->id_comment_discussion;
    	$commentDetailDiscussion->id_user = $request->id_user;

    	$status = $commentDetailDiscussion->save();
    	// $status = true;
    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Cập nhật dữ liệu thành công' : "Cập nhật dữ liệu thất bại",
    		'id_discussion' => $request->id_discussion
    	]);
    }

    function delete($id){
    	$commentDetailDiscussion = CommentDetailDiscussion::findOrFail($id);

    	$status = $commentDetailDiscussion->delete();
    	// $status = true;

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại"
    	]);
    }
}
