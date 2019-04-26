<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;
use DB;

class LibraryController extends Controller
{
    public function imagePaginate(){
        $image = DB::table('libraries')->where('id_library', '1')->orderBy('id', 'desc')->paginate(16);

        return response()->json($image);
    }

    public function videoPaginate(){
        $video = DB::table('libraries')->where('id_library', '2')->orderBy('id', 'desc')->paginate(10);

        return response()->json($video);
    }

    public function documentPaginate(){
        $document = DB::table('libraries')->where('id_library', '3')->orderBy('id', 'desc')->paginate(10);

        return response()->json($document);
    }
}
