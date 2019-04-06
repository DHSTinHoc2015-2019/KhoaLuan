<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use DB;

class ContactController extends Controller
{
	function index(){
		$contact = DB::table('contacts')->get();
		return response()->json($contact, 200);
	}
    function create(Request $request){
    	$contact = new Contact();
    	$contact->name = $request->name;
    	$contact->email = $request->email;
    	$contact->phone = $request->phone;
    	$contact->company = $request->company;
    	$contact->content = $request->content;

    	$status = $contact->save();
    	// $status = true;
    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Bạn đã gửi phản hồi thành công' : "Gửi phản hồi thất bại"
    	], 200);
    }

   function delete($id){
    	$contact = Contact::findOrFail($id);

    	// $status = $contact->delete();
    	$status = true;

    	return response()->json([
    		'status' => $status,
    		'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại"
    	]);
    }
}
