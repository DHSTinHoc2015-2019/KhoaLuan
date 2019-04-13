<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use DB;

class DiscussionController extends Controller
{
    
    function index(){
    	$discussion = DB::table('discussions')
    		->join('users', 'id_user', 'users.id')
    		->select('discussions.id', 'discussions.title', 'discussions.discussion_content', 'discussions.id_user', 'discussions.id_discussion_type', 'discussions.created_at', 'users.name', 'discussion_view', 'discussion_like as countLikeDiscussion')
    		->orderBy('id', 'desc')
    		->get();
    	return response()->json($discussion, 200);
    }

    function show($id){
        $discussion = DB::table('discussions')
            ->join('users', 'id_user', 'users.id')
            ->select('discussions.id', 'discussions.title', 'discussions.discussion_content', 'discussions.id_user', 'discussions.id_discussion_type', 'discussions.created_at', 'users.name')
            ->where('discussions.id', $id)
            ->first();
        return response()->json($discussion, 200);
    }

    //Hiển thị toàn bộ discussion theo loại thảo luận (discussion_types)
    function showWithType($id_discussion_type){
    	$discussion = DB::table('discussions')
    		->join('users', 'id_user', 'users.id')
    		->join('discussion_types', 'id_discussion_type', 'discussion_types.id')
    		->select('discussions.id', 'discussions.title', 'discussions.discussion_content', 'discussions.id_user', 'discussions.id_discussion_type', 'discussions.created_at', 'users.name', 'discussion_types.name_discussion_type', 'discussions.discussion_view', 'discussions.discussion_like')
    		// ->where('discussions.id', '<>', 1)
    		->where('discussions.id_discussion_type', $id_discussion_type)
    		->get();
    	return response()->json($discussion, 200);
    }

    function paginate($id_discussion_type){
        $discussion = DB::table('discussions')
            ->join('users', 'id_user', 'users.id')
            ->join('discussion_types', 'id_discussion_type', 'discussion_types.id')
            ->select('discussions.id', 'discussions.title', 'discussions.discussion_content', 'discussions.id_user', 'discussions.id_discussion_type', 'discussions.created_at', 'users.name', 'discussion_types.name_discussion_type', 'discussions.discussion_view', 'discussions.discussion_like as countLikeDiscussion')
            // ->where('discussions.id', '<>', 1)
            ->where('discussions.id_discussion_type', $id_discussion_type)
            ->orderBy('discussions.id', 'desc')
            ->paginate(10);
        return response()->json($discussion, 200);
    }

    function userDiscussionWithType($id_type, $id_discussion){
        $discussion = DB::table('discussions')
            ->join('users', 'id_user', 'users.id')
            ->join('discussion_types', 'id_discussion_type', 'discussion_types.id')
            ->select('discussions.id', 'discussions.title', 'discussions.discussion_content', 'discussions.discussion_view', 'discussions.id_user', 'discussions.id_discussion_type', 'discussions.created_at', 'users.name', 'discussion_types.name_discussion_type')
            // ->where('discussions.id', '<>', 1)
            ->where('discussions.id_discussion_type', $id_type)
            ->where('discussions.id', $id_discussion)
            ->first();

            $comment = DB::table('comment_discussions')
            ->join('users', 'id_user', 'users.id')
            ->select('comment_discussions.id', 'comment_discussions.comment_discussion_content', 'comment_discussions.id_user', 'comment_discussions.created_at', 'users.name', 'users.user_image')
            ->where('id_discussion', $id_discussion)
            ->get();

            $commentdetail = DB::table('comment_detail_discussions')
            ->join('users', 'id_user', 'users.id')
            ->join('comment_discussions', 'id_comment_discussion', 'comment_discussions.id')
            ->select('comment_detail_discussions.id', 'comment_detail_discussion_content', 'id_comment_discussion', 'comment_detail_discussions.id_user', 'comment_detail_discussions.created_at', 'users.name', 'users.user_image')
            ->where('id_discussion', $id_discussion)
            ->get();

        return response()->json([
            'discussion' => $discussion,
            'comment' => $comment,
            'commentdetail' => $commentdetail
        ], 200);
    }

    function showAll(){
    	$discussion = DB::table('discussions')
    		->join('users', 'id_user', 'users.id')
    		->join('discussion_types', 'id_discussion_type', 'discussion_types.id')
    		->select('discussions.id', 'discussions.title', 'discussions.discussion_content', 'discussions.discussion_view', 'discussions.id_user', 'discussions.id_discussion_type', 'discussions.created_at', 'users.name', 'discussion_types.name_discussion_type')
    		// ->where('discussions.id', '<>', 1)
    		// ->orderBy('discussions.id', 'desc')
    		->get();
    	return response()->json($discussion, 200);
    }

    function create(Request $request){
    	$discussion = new Discussion();
    	$discussion->title = $request->title;
    	$discussion->discussion_content = $request->discussion_content;
    	$discussion->id_user = $request->id_user;
    	$discussion->id_discussion_type = $request->id_discussion_type;

    	$status = $discussion->save();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Thêm dữ liệu thành công' : "Thêm dữ liệu thất bại"
    	]);
    }

    function update(Request $request, $id){
    	$discussion = Discussion::findOrFail($id);
    	$discussion->title = $request->title;
    	$discussion->discussion_content = $request->discussion_content;
    	// $discussion->id_user = $request->id_user;
    	$discussion->id_discussion_type = $request->id_discussion_type;

    	$status = $discussion->save();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Cập nhật dữ liệu thành công' : "Cập nhật dữ liệu thất bại"
    	]);
    }

    function delete($id){
    	$discussion = Discussion::findOrFail($id);

    	$status = $discussion->delete();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại",
    		'id' => $id
    	]);
    }

    function showWithComment($id){
        $discussion = DB::table('discussions')
            ->join('users', 'id_user', 'users.id')
            ->select('discussions.id', 'discussions.title', 'discussions.discussion_content', 'discussions.id_user', 'discussions.id_discussion_type', 'discussions.created_at', 'users.name', 'users.user_image')
            ->where('discussions.id', $id)
            ->first();

        $comment = DB::table('comment_discussions')
            ->join('users', 'id_user', 'users.id')
            ->select('comment_discussions.id', 'comment_discussions.comment_discussion_content', 'comment_discussions.id_user', 'comment_discussions.created_at', 'users.name', 'users.user_image')
            ->where('id_discussion', $id)
            ->get();

        $commentdetail = DB::table('comment_detail_discussions')
            ->join('users', 'id_user', 'users.id')
            ->join('comment_discussions', 'id_comment_discussion', 'comment_discussions.id')
            ->select('comment_detail_discussions.id', 'comment_detail_discussion_content', 'id_comment_discussion', 'comment_detail_discussions.id_user', 'comment_detail_discussions.created_at', 'users.name', 'users.user_image')
            ->where('id_discussion', $id)
            ->get();

        $countComment = $comment->count() + $commentdetail->count();

        return response()->json([
            'discussion' => $discussion,
            'comment' => $comment,
            'commentdetail' => $commentdetail,
            'countComment' => $countComment

        ], 200);
    }

    function newDiscussion(){
        $newdiscussion = DB::table('discussions')
            ->join('users', 'id_user', 'users.id')
            ->select('discussions.id', 'discussions.title', 'discussions.discussion_content', 'discussions.id_user', 'discussions.id_discussion_type', 'discussions.created_at', 'users.name', 'users.user_image', 'discussions.discussion_view', 'discussions.discussion_like as countLikeDiscussion')->orderBy('id', 'desc')->take(10)->get();
        
        return response()->json([
            'newdiscussion' => $newdiscussion
        ], 200);
    }
}
