<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blog;
use App\Library;
use App\Contact;
use App\News;
use App\Home;
use DB;

class HomeController extends Controller
{
    function index(){
    	$sumuser = User::all()->count();
    	$sumblog = Blog::all()->count();
    	$sumdocument = DB::table('libraries')->where('id_library', '3')->count();
    	$sumfeedback = Contact::all()->count();

    	$blog30days = DB::table('blogs')
    	// ->select(DB::raw('count(id) as countblogs'), DB::raw('CONVERT(created_at, date) as dateblogs'))
    	// ->whereRaw('TO_DAYS(NOW()) - TO_DAYS(created_at) <= ?', [30])
    	// ->groupBy(DB::raw('CONVERT(created_at, date)'))
    	// ->orderByRaw('CONVERT(created_at, date)')
    	->select(DB::raw('count(id) as countblogs'), DB::raw('DATE_FORMAT(created_at, "%d/%m") as dateblogs'))
    	->whereRaw('TO_DAYS(NOW()) - TO_DAYS(created_at) <= ?', [30])
    	->groupBy(DB::raw('DATE_FORMAT(created_at, "%d/%m")'))
    	->orderByRaw('created_at')
    	->get();

    	$discussion30days = DB::table('discussions')
    	->select(DB::raw('count(id) as countdiscussions'), DB::raw('DATE_FORMAT(created_at, "%d/%m") as datediscussions'))
    	->whereRaw('TO_DAYS(NOW()) - TO_DAYS(created_at) <= ?', [30])
    	->groupBy(DB::raw('DATE_FORMAT(created_at, "%d/%m")'))
    	->orderByRaw('created_at')
    	->get();
    	return response()->json([
    		'sumuser' => $sumuser,
    		'sumblog' => $sumblog,
    		'sumdocument' => $sumdocument,
    		'sumfeedback' => $sumfeedback,
    		'blog30days' => $blog30days,
    		'discussion30days' => $discussion30days,
    	], 200);
    }

    function search($keyword){
        $news = DB::table('news')
        ->select('id', 'description', 'title', 'news_image', 'created_at', 'featured')
        ->where('title', 'like', '%' . $keyword . '%')
        ->orderBy('id', 'desc')
        ->get();

        $blogs = DB::table('blogs')
        ->join('users', 'id_user', 'users.id')
        ->select('blogs.id', 'description', 'title', 'blog_content', 'blog_image', 'blogs.created_at', 'featured', 'blogs.blog_view', 'blogs.blog_like', 'users.name', 'blogs.id_user')
        ->where('title', 'like', '%' . $keyword . '%')
        ->orderBy('id', 'desc')
        ->get();

        $discussions = DB::table('discussions')
            ->join('users', 'id_user', 'users.id')
            ->select('discussions.id', 'discussions.title', 'discussions.discussion_content', 'discussions.id_user', 'discussions.id_discussion_type', 'discussions.created_at', 'users.name', 'discussion_view', 'discussion_like')
            ->where('title', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'news' => $news,
            'blogs' => $blogs,
            'discussions' => $discussions,
        ], 200);
    }

    function listInfo(){
        $homes = DB::table('homes')->get()->first();
        $links = DB::table('links')->get();
        return response()->json([
            'homes' => $homes,
            'links' => $links
        ], 200);
    }
}
