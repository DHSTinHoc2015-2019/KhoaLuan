<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentDetailBlog;

class CommentDetailBlogController extends Controller
{
    function create(Request $request){
    	$commentDetailBlog = new CommentDetailBlog();
    	$commentDetailBlog->comment_detail_blog_content = $request->comment_detail_blog_content;
    	$commentDetailBlog->id_comment_blog = $request->id_comment_blog;
    	$commentDetailBlog->id_user = $request->id_user;

    	$status = $commentDetailBlog->save();
    	// $status = true;

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Thêm dữ liệu thành công' : "Thêm dữ liệu thất bại",
    		'id_blog' => $request->id_blog
    	]);
    }

    function update(Request $request){
    	$commentDetailBlog = CommentDetailBlog::findOrFail($request->id_comment_detail);
    	$commentDetailBlog->comment_detail_blog_content = $request->comment_detail_blog_content;
    	$commentDetailBlog->id_user = $request->id_user;

    	$status = $commentDetailBlog->save();
    	// $status = true;
    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Cập nhật dữ liệu thành công' : "Cập nhật dữ liệu thất bại",
    		'id_blog' => $request->id_blog
    	]);
    }

    function delete($id){
    	$commentDetailBlog = CommentDetailBlog::findOrFail($id);

    	$status = $commentDetailBlog->delete();
    	// $status = true;

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại"
    	]);
    }
}
