<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    function index(){
    	return response()->json(News::all()->take(6), 200);
    }

    function showAll(){
    	return response()->json(News::all(), 200);
    }

    function show($id){
    	return response()->json(News::findOrFail($id), 200);
    }

    function showedit($id){
    	return response()->json(News::findOrFail($id), 200);
    }

    function update(Request $request, $id){
    	$news = News::findOrFail($id);

    	$news->description = $request->description;
    	$news->title = $request->title;
    	$news->news_content = $request->news_content;

    	if($request->hasImage){
    		if (file_exists('images/news/' . $news->news_image)) {
	            unlink('images/news/' . $news->news_image);
	        }
    		$imageName = time().$request->news_image->getClientOriginalName();
        	$request->news_image->move(public_path('images/news/'), $imageName);
        	$news->news_image = $imageName;
    	}

    	$status = $news->save();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Cập nhật dữ liệu thành công' : "Cập nhật dữ liệu thất bại"
    	]);
    }

    function create(Request $request){
    	$news = new News();

    	if($request->hasImage){
    		$imageName = time().$request->news_image->getClientOriginalName();
        	$request->news_image->move(public_path('images/news/'), $imageName);
        	$news->news_image = $imageName;
    	} else {
    		$news->news_image = $request->news_image;
    	}

    	$news->description = $request->description;
    	$news->title = $request->title;
    	$news->news_content = $request->news_content;
    	
    	$status = $news->save();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Thêm dữ liệu thành công' : "Thêm dữ liệu thất bại"
    	]);
    }

    function delete($id){
    	$news = News::findOrFail($id);
    	if (file_exists('images/news/' . $news->news_image)) {
            unlink('images/news/' . $news->news_image);
        }

    	$status = $news->delete();

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại"
    	]);
    }
}
