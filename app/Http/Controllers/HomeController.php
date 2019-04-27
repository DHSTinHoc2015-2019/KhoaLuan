<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blog;
use App\Library;
use App\Contact;
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
    	// ->select(DB::raw('count(id) as countblogs'), DB::raw('CONVERT(created_at, date) as dateblogs'))
    	// ->whereRaw('TO_DAYS(NOW()) - TO_DAYS(created_at) <= ?', [30])
    	// ->groupBy(DB::raw('CONVERT(created_at, date)'))
    	// ->orderByRaw('CONVERT(created_at, date)')
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
}
