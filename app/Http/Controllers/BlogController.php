<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use DB;

class BlogController extends Controller
{
    function showAll(){
    	$blog = DB::table('blogs')
    	->join('users', 'id_user', 'users.id')
    	->select('blogs.id', 'description', 'title', 'blog_content', 'blog_image', 'blogs.created_at', 'featured', 'users.name', 'blogs.id_user')
    	->get();
    	return response()->json($blog, 200);
    }
}
