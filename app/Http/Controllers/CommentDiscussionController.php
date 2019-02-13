<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentDiscussion;
use App\CommentDetailDiscussion;
use DB;

class CommentDiscussionController extends Controller
{
    function create(Request $request){
    	$commentDiscussion = new CommentDiscussion();
    	$commentDiscussion->comment_discussion_content = $request->comment_discussion_content;
    	$commentDiscussion->id_discussion = $request->id_discussion;
    	$commentDiscussion->id_user = $request->id_user;

    	$status = $commentDiscussion->save();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Thêm dữ liệu thành công' : "Thêm dữ liệu thất bại",
    		'id_discussion' => $request->id_discussion
    	]);
    }

    function update(Request $request){
    	$commentDiscussion = CommentDiscussion::findOrFail($request->id_comment);
    	$commentDiscussion->comment_discussion_content = $request->comment_discussion_content;
    	$commentDiscussion->id_discussion = $request->id_discussion;
    	$commentDiscussion->id_user = $request->id_user;

        $status = $commentDiscussion->save();
    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Cập nhật dữ liệu thành công' : "Cập nhật dữ liệu thất bại",
    		'id_discussion' => $request->id_discussion
    	]);
    }

    function delete($id){
    	$commentDiscussion = CommentDiscussion::findOrFail($id);
    	$arrCommentDetail = DB::table('comment_detail_discussions')->where('id_comment_discussion', $id)->get();
    	try {
		    foreach ($arrCommentDetail as $value) {
	    		$commentDetail = CommentDetailDiscussion::findOrFail($value->id);
	    		$commentDetail->delete();
	    	}
		} catch (Exception $e) {}
    	
    	$status = $commentDiscussion->delete();
    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại"
    	]);
    }
}
