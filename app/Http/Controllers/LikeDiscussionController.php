<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LikeDiscussion;
use DB;

class LikeDiscussionController extends Controller
{
    function indexAdmin($id_user, $id_discussion){
    	$countLikeDiscussion = DB::table('like_discussions')
    		->where('id_discussion', $id_discussion)
    		->count();

    	$isLikeDiscussion = DB::table('like_discussions')
    		->where('id_discussion', $id_discussion)
    		->where('id_user', $id_user)
    		->where('is_liked', true)
    		->count();

    	return response()->json([
    		'countLikeDiscussion' => $countLikeDiscussion,
    		'isLikeDiscussion' => $isLikeDiscussion == 1 ? true : false
    	]);
    }

    function change(Request $request){
    	$isLike = filter_var((string)$request->isLike, FILTER_VALIDATE_BOOLEAN)? true : false;
    	// $status = $request->isLike;
    	if($isLike){
    		// $message = 'doi thanh false => xoa luon';
    		$likeDiscussion = DB::table('like_discussions')
    		->where('id_discussion', $request->id_discussion)
    		->where('id_user', $request->id_user)
    		->where('is_liked', $isLike)
    		->first();
    		$status = LikeDiscussion::findOrFail($likeDiscussion->id)->delete();
    	} else {
    		// $message = 'doi thanh true => create';
    		$likeDiscussion = new LikeDiscussion();
    		$likeDiscussion->id_user = $request->id_user;
    		$likeDiscussion->id_discussion = $request->id_discussion;
    		$likeDiscussion->is_liked = true;
    		$status = $likeDiscussion->save();
    	}

    	return response()->json([
    		'status' => $status,
    		// 'message' => $message,
    		'id_discussion' => $request->id_discussion
    		// 'likeDiscussion' => $likeDiscussion
    	]);
    }
}
