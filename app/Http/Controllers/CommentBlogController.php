<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentBlog;
use App\CommentDetailBlog;
use DB;
class CommentBlogController extends Controller
{
    function create(Request $request){
    	$commentBlog = new CommentBlog();
    	$commentBlog->comment_blog_content = $request->comment_blog_content;
    	$commentBlog->id_blog = $request->id_blog;
    	$commentBlog->id_user = $request->id_user;

    	$status = $commentBlog->save();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Thêm dữ liệu thành công' : "Thêm dữ liệu thất bại",
    		'id_blog' => $request->id_blog
    	]);
    }

    function update(Request $request){
    	$commentBlog = CommentBlog::findOrFail($request->id_comment);
    	$commentBlog->comment_blog_content = $request->comment_blog_content;
    	$commentBlog->id_blog = $request->id_blog;
    	$commentBlog->id_user = $request->id_user;

        $status = $commentBlog->save();
    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Cập nhật dữ liệu thành công' : "Cập nhật dữ liệu thất bại",
    		'id_blog' => $request->id_blog
    	]);
    }

    function delete($id){
    	$commentBlog = CommentBlog::findOrFail($id);
    	$arrCommentDetail = DB::table('comment_detail_blogs')->where('id_comment_blog', $id)->get();
    	try {
		    foreach ($arrCommentDetail as $value) {
	    		$commentDetail = CommentDetailBlog::findOrFail($value->id);
	    		$commentDetail->delete();
	    	}
		} catch (Exception $e) {}
    	
    	$status = $commentBlog->delete();
    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại"
    	]);
    }
}
