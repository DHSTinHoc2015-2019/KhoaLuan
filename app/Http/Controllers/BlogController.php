<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use DB;

class BlogController extends Controller
{
	function index(){
		$blog = DB::table('blogs')
    	->join('users', 'id_user', 'users.id')
    	->select('blogs.id', 'description', 'title', 'blog_content', 'blog_image', 'blogs.created_at', 'featured', 'users.name', 'blogs.id_user')
    	->where('blogs.id', '<>', 1)
    	->get();
    	return response()->json($blog, 200);
	}

	function show($id){
    	return response()->json(Blog::findOrFail($id), 200);
    }

    function paginate(){
		$blog = DB::table('blogs')
    	->join('users', 'id_user', 'users.id')
    	->select('blogs.id', 'description', 'title', 'blog_content', 'blog_image', 'blogs.created_at', 'featured', 'users.name', 'blogs.id_user')
    	->where('blogs.id', '<>', 0)
    	->orderBy('blogs.id', 'desc')
    	->paginate(6);
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
    		if (file_exists('images/blog/' . $blog->blog_image)) {
	            unlink('images/blog/' . $blog->blog_image);
	        }
    		$imageName = time().$request->blog_image->getClientOriginalName();
        	$request->blog_image->move(public_path('images/blog/'), $imageName);
        	$blog->blog_image = $imageName;
    	}

    	$blog->featured = filter_var((string)$request->featured, FILTER_VALIDATE_BOOLEAN)? 1 : 0;
    	$status = $blog->save();
    	// $status = true;

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Cập nhật dữ liệu thành công' : "Cập nhật dữ liệu thất bại",
    		'blog' => $blog
    	]);
    }
}
