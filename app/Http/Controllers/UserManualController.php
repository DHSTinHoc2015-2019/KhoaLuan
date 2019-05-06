<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserManual;
class UserManualController extends Controller
{
    function show($id){
    	$usermanual = UserManual::findOrFail($id);
    	return response()->json($usermanual, 200);
    }

    function getList(){
        $usermanual = UserManual::all();
        return response()->json($usermanual, 200);
    }

    function create(Request $request){
        $usermanual = new UserManual();
        $usermanual->title = $request->title;
        $usermanual->user_manual_content = $request->user_manual_content;
        $status = $usermanual->save();
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Thêm dữ liệu thành công' : "Thêm dữ liệu thất bại",
        ]);
    }

    function update(Request $request, $id){
        $usermanual = UserManual::findOrFail($id);
        $usermanual->title = $request->title;
        $usermanual->user_manual_content = $request->user_manual_content;
        $status = $usermanual->save();
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Cập nhật dữ liệu thành công' : "Cập nhật dữ liệu thất bại",
        ]);
    }

    function delete($id){
        $usermanual = UserManual::findOrFail($id);
        $status = $usermanual->delete();
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại",
        ]);
    }
}
