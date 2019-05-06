<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rule;
use App\UserManual;

class RuleController extends Controller
{
    function index(){
    	$rule = Rule::all();
    	$usermanual = UserManual::all();
    	return response()->json([
    		'rule' =>$rule,
    		'usermanual' => $usermanual
    	], 200);
    }

    function show($id){
    	$rule = Rule::findOrFail($id);
    	return response()->json($rule, 200);
    }

    function getList(){
        $rule = Rule::all();
        return response()->json($rule, 200);
    }

    function create(Request $request){
        $rule = new Rule();
        $rule->title = $request->title;
        $rule->rule_content = $request->rule_content;
        $status = $rule->save();
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Thêm dữ liệu thành công' : "Thêm dữ liệu thất bại",
        ]);
    }

    function update(Request $request, $id){
        $rule = Rule::findOrFail($id);
        $rule->title = $request->title;
        $rule->rule_content = $request->rule_content;
        $status = $rule->save();
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Cập nhật dữ liệu thành công' : "Cập nhật dữ liệu thất bại",
        ]);
    }

    function delete($id){
        $rule = Rule::findOrFail($id);
        $status = $rule->delete();
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại",
        ]);
    }
}
