<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;
use DB;

class LibraryController extends Controller
{
    public function index()
    {
    	$image = DB::table('libraries')->where('id_library', '1')->orderBy('id', 'desc')->take(16)->get();
    	$video = DB::table('libraries')->where('id_library', '2')->orderBy('id', 'desc')->take(16)->get();
    	$document = DB::table('libraries')->where('id_library', '3')->orderBy('id', 'desc')->take(16)->get();
    	return response()->json([
    		'image' => $image,
    		'video' => $video,
    		'document' => $document
    	], 200);
    }
}
