<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use DB;
use App\News;

class BlogController extends Controller
{
	function index(){
		$blog = DB::table('blogs')
    	->join('users', 'id_user', 'users.id')
    	->select('blogs.id', 'description', 'title', 'blog_content', 'blog_image', 'blogs.created_at', 'featured', 'blogs.blog_view', 'users.name', 'blogs.id_user')
    	// ->where('blogs.id', '<>', 1)
    	->get();
    	return response()->json($blog, 200);
	}

	function show($id){
    	return response()->json(Blog::findOrFail($id), 200);
    }

    function paginate(){
		$blog = DB::table('blogs')
    	->join('users', 'id_user', 'users.id')
    	->select('blogs.id', 'description', 'title', 'blog_content', 'blog_image', 'blogs.created_at', 'featured', 'blogs.blog_view', 'users.name', 'blogs.id_user')
    	// ->where('blogs.id', '<>', 0)
    	->orderBy('blogs.id', 'desc')
    	->paginate(6);
        
        for ($i=0; $i < count($blog); $i++) {
            $comment = DB::table('comment_blogs')
                ->where('id_blog', $blog[$i]->id)
                ->get();

            $commentdetail = DB::table('comment_detail_blogs')
                ->join('users', 'id_user', 'users.id')
                ->join('comment_blogs', 'id_comment_blog', 'comment_blogs.id')
                ->select('comment_detail_blogs.id', 'comment_detail_blogs.comment_detail_blog_content', 'comment_detail_blogs.id_comment_blog', 'comment_detail_blogs.id_user', 'comment_detail_blogs.created_at', 'users.name', 'users.user_image','comment_blogs.id_blog')
                ->where('comment_blogs.id_blog', $blog[$i]->id)
                ->get();

            $blog[$i]->countComment = $comment->count() + $commentdetail->count();

            $blog[$i]->countLikeBlog = DB::table('like_blogs')
            ->where('id_blog', $blog[$i]->id)
            ->count();
        }
    	return response()->json($blog, 200);
	}

	function create(Request $request){
    	$blog = new Blog();

    	if($request->hasImage){
    		$imageName = time().$request->blog_image->getClientOriginalName();
        	$request->blog_image->move(public_path('images/blog/'), $imageName);
        	$blog->blog_image = $imageName;
    	} else {
    		$blog->blog_image = $request->blog_image;
    	}

    	$blog->description = $request->description;
    	$blog->title = $request->title;
    	$blog->featured = filter_var((string)$request->featured, FILTER_VALIDATE_BOOLEAN)? 1 : 0;
    	$blog->blog_content = $request->blog_content;
    	$blog->id_user = $request->id_user;
    	
    	$status = $blog->save();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Thêm dữ liệu thành công' : "Thêm dữ liệu thất bại",
    		'blogs' => $blog
    	]);
    }

    function delete($id){
    	$blog = Blog::findOrFail($id);
    	if (file_exists('images/blog/' . $blog->blog_image)) {
            unlink('images/blog/' . $blog->blog_image);
        }

    	$status = $blog->delete();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại"
    	]);
    }

    function update(Request $request, $id){
    	$blog = Blog::findOrFail($id);

    	$blog->description = $request->description;
    	$blog->title = $request->title;
    	$blog->blog_content = $request->blog_content;

    	if($request->hasImage){
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                if (file_exists('images/blog/' . $blog->blog_image)) {
                    unlink('images/blog/' . $blog->blog_image);
                }
                $imageName = time().$request->blog_image->getClientOriginalName();
                $request->blog_image->move(public_path('images/blog/'), $imageName);
                $blog->blog_image = $imageName;
            }
    	}

    	$blog->featured = filter_var((string)$request->featured, FILTER_VALIDATE_BOOLEAN)? 1 : 0;
    	$status = $blog->save();
        
        
    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Cập nhật dữ liệu thành công' : "Cập nhật dữ liệu thất bại",
    		'blog' => $blog
    	]);
    }

    function updateUser(Request $request, $id){
        $blog = Blog::findOrFail($id);

        $blog->description = $request->description;
        $blog->title = $request->title;
        $blog->blog_content = $request->blog_content;

        if($request->hasImage){
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                if (file_exists('images/blog/' . $blog->blog_image)) {
                    unlink('images/blog/' . $blog->blog_image);
                }
                $imageName = time().$request->blog_image->getClientOriginalName();
                $request->blog_image->move(public_path('images/blog/'), $imageName);
                $blog->blog_image = $imageName;
            }
        }

        // $blog->featured = filter_var((string)$request->featured, FILTER_VALIDATE_BOOLEAN)? 1 : 0;
        $status = $blog->save();
        
        
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Cập nhật bài viết thành công' : "Cập nhật bài viết thất bại",
            'blog' => $blog
        ]);
    }

    function showWithComment($id){

        $blog = DB::table('blogs')
            ->join('users', 'id_user', 'users.id')
            ->select('blogs.id', 'blogs.title', 'blogs.description', 'blogs.id_user', 'blogs.blog_content', 'blogs.blog_image', 'blogs.featured', 'blogs.blog_view', 'blogs.created_at', 'users.name', 'users.user_image')
            ->where('blogs.id', $id)
            ->first();

        $comment = DB::table('comment_blogs')
            ->join('users', 'id_user', 'users.id')
            ->select('comment_blogs.id', 'comment_blogs.comment_blog_content', 'comment_blogs.id_user', 'comment_blogs.created_at', 'users.name', 'users.user_image')
            ->where('id_blog', $id)
            ->get();

        $commentdetail = DB::table('comment_detail_blogs')
            ->join('users', 'id_user', 'users.id')
            ->join('comment_blogs', 'id_comment_blog', 'comment_blogs.id')
            ->select('comment_detail_blogs.id', 'comment_detail_blogs.comment_detail_blog_content', 'comment_detail_blogs.id_comment_blog', 'comment_detail_blogs.id_user', 'comment_detail_blogs.created_at', 'users.name', 'users.user_image','comment_blogs.id_blog')
            ->where('comment_blogs.id_blog', $id)
            ->get();

        $countComment = $comment->count() + $commentdetail->count();

        return response()->json([
            'blog' => $blog,
            'comment' => $comment,
            'commentdetail' => $commentdetail,
            'countComment' => $countComment

        ], 200);
    }

    function new(){
        $blognew = DB::table('blogs')
            ->join('users', 'id_user', 'users.id')
            ->select('blogs.id', 'blogs.title', 'blogs.description', 'blogs.id_user', 'blogs.blog_content', 'blogs.blog_image', 'blogs.featured', 'blogs.blog_view', 'blogs.created_at', 'users.name', 'users.user_image')
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();

        for ($i=0; $i < count($blognew); $i++) {
            $comment = DB::table('comment_blogs')
                ->where('id_blog', $blognew[$i]->id)
                ->get();

            $commentdetail = DB::table('comment_detail_blogs')
                ->join('users', 'id_user', 'users.id')
                ->join('comment_blogs', 'id_comment_blog', 'comment_blogs.id')
                ->select('comment_detail_blogs.id', 'comment_detail_blogs.comment_detail_blog_content', 'comment_detail_blogs.id_comment_blog', 'comment_detail_blogs.id_user', 'comment_detail_blogs.created_at', 'users.name', 'users.user_image','comment_blogs.id_blog')
                ->where('comment_blogs.id_blog', $blognew[$i]->id)
                ->get();

            $blognew[$i]->countComment = $comment->count() + $commentdetail->count();

            $blognew[$i]->countLikeBlog = DB::table('like_blogs')
            ->where('id_blog', $blognew[$i]->id)
            ->count();
        }
        return response()->json($blognew, 200);
    }

    function bloghighlight(){
        $blog = DB::table('blogs')
        ->join('users', 'id_user', 'users.id')
        ->select('blogs.id', 'description', 'title', 'blog_content', 'blog_image', 'blogs.created_at', 'featured', 'blogs.blog_view', 'users.name', 'blogs.id_user')
        ->where('featured', true)
        ->orderBy('blogs.id', 'desc')
        ->take(6)
        ->get();
        
        for ($i=0; $i < count($blog); $i++) {
            $comment = DB::table('comment_blogs')
                ->where('id_blog', $blog[$i]->id)
                ->get();

            $commentdetail = DB::table('comment_detail_blogs')
                ->join('users', 'id_user', 'users.id')
                ->join('comment_blogs', 'id_comment_blog', 'comment_blogs.id')
                ->select('comment_detail_blogs.id', 'comment_detail_blogs.comment_detail_blog_content', 'comment_detail_blogs.id_comment_blog', 'comment_detail_blogs.id_user', 'comment_detail_blogs.created_at', 'users.name', 'users.user_image','comment_blogs.id_blog')
                ->where('comment_blogs.id_blog', $blog[$i]->id)
                ->get();

            $blog[$i]->countComment = $comment->count() + $commentdetail->count();

            $blog[$i]->countLikeBlog = DB::table('like_blogs')
            ->where('id_blog', $blog[$i]->id)
            ->count();
        }
        return response()->json($blog, 200);
    }

    function showWithId($id){
        $blog = DB::table('blogs')
        ->join('users', 'id_user', 'users.id')
        ->select('blogs.id', 'description', 'title', 'blog_content', 'blog_image', 'blogs.blog_view', 'blogs.created_at', 'featured', 'users.name', 'blogs.id_user', 'users.user_image')
        ->where('blogs.id', $id)
        ->first();

        return response()->json([
            'blog' => $blog
        ], 200);
    }

    function userBlogWithComment($id){
            $comment = DB::table('comment_blogs')
            ->join('users', 'id_user', 'users.id')
            ->select('comment_blogs.id', 'comment_blogs.comment_blog_content', 'comment_blogs.id_user', 'comment_blogs.created_at', 'users.name', 'users.user_image')
            ->where('id_blog', $id)
            ->get();

            $commentdetail = DB::table('comment_detail_blogs')
            ->join('users', 'id_user', 'users.id')
            ->join('comment_blogs', 'id_comment_blog', 'comment_blogs.id')
            ->select('comment_detail_blogs.id', 'comment_detail_blog_content', 'id_comment_blog', 'comment_detail_blogs.id_user', 'comment_detail_blogs.created_at', 'users.name', 'users.user_image')
            ->where('id_blog', $id)
            ->get();

        return response()->json([
            // 'discussion' => $discussion,
            'comment' => $comment,
            'commentdetail' => $commentdetail
        ], 200);
    }

    function incrementView($id){
        $blog = Blog::findOrFail($id);
        $blog->blog_view = $blog->blog_view + 1;

        $status = $blog->save();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Cập nhật dữ liệu thành công' : "Cập nhật dữ liệu thất bại",
            'blog' => $blog
        ]);
    }

    function mostView(){
        
        $blog = DB::table('blogs')
        ->join('users', 'id_user', 'users.id')
        ->select('blogs.id', 'description', 'title', 'blog_content', 'blog_image', 'blogs.created_at', 'featured', 'blogs.blog_view', 'users.name', 'blogs.id_user')
        ->orderBy('blogs.blog_view', 'desc')
        ->take(6)
        ->get();
        
        for ($i=0; $i < count($blog); $i++) {
            $comment = DB::table('comment_blogs')
                ->where('id_blog', $blog[$i]->id)
                ->get();

            $commentdetail = DB::table('comment_detail_blogs')
                ->join('users', 'id_user', 'users.id')
                ->join('comment_blogs', 'id_comment_blog', 'comment_blogs.id')
                ->select('comment_detail_blogs.id', 'comment_detail_blogs.comment_detail_blog_content', 'comment_detail_blogs.id_comment_blog', 'comment_detail_blogs.id_user', 'comment_detail_blogs.created_at', 'users.name', 'users.user_image','comment_blogs.id_blog')
                ->where('comment_blogs.id_blog', $blog[$i]->id)
                ->get();

            $blog[$i]->countComment = $comment->count() + $commentdetail->count();

            $blog[$i]->countLikeBlog = DB::table('like_blogs')
            ->where('id_blog', $blog[$i]->id)
            ->count();
        }
        return response()->json($blog, 200);

    }
}
