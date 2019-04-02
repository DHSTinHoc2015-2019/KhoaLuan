<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LikeBlog;
use DB;

class LikeBlogController extends Controller
{
    function indexAdmin($id_user, $id_blog){
    	$countLikeBlog = DB::table('like_blogs')
    		->where('id_blog', $id_blog)
    		->count();

    	$isLikeBlog = DB::table('like_blogs')
    		->where('id_blog', $id_blog)
    		->where('id_user', $id_user)
    		->where('is_liked', true)
    		->count();

    	return response()->json([
    		'countLikeBlog' => $countLikeBlog,
    		'isLikeBlog' => $isLikeBlog == 1 ? true : false
    	]);
    }

    function change(Request $request){
    	$isLike = filter_var((string)$request->isLike, FILTER_VALIDATE_BOOLEAN)? true : false;
    	// $status = $request->isLike;
    	if($isLike){
    		// $message = 'doi thanh false => xoa luon';
    		$likeBlog= DB::table('like_blogs')
    		->where('id_blog', $request->id_blog)
    		->where('id_user', $request->id_user)
    		->where('is_liked', $isLike)
    		->first();
    		$status = LikeBlog::findOrFail($likeBlog->id)->delete();
    	} else {
    		// $message = 'doi thanh true => create';
    		$likeBlog = new LikeBlog();
    		$likeBlog->id_user = $request->id_user;
    		$likeBlog->id_Blog = $request->id_blog;
    		$likeBlog->is_liked = true;
    		$status = $likeBlog->save();
    	}

    	return response()->json([
    		'status' => $status,
    		'id_blog' => $request->id_blog
    	]);
    }
}
