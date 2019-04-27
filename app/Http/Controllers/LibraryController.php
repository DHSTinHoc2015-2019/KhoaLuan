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

    public function createImage(Request $request){
        $library = new Library();
        if ($request->hasFile('file')) {
             
            $imageName = time().$request->file->getClientOriginalName();
            $request->file->move(public_path('images/library/images/'), $imageName);
            $library->file_name = $imageName;
        }

        $library->title = $request->title;
        $library->id_user = $request->id_user;
        $library->id_library = 1;

        $status = $library->save();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Đăng ảnh thành công' : "Đăng ảnh thất bại",
        ]);
    }

    public function createVideo(Request $request){
        $library = new Library();
        $library->title = $request->title;
        $library->id_user = $request->id_user;
        $library->file_name = $request->file_name;
        $library->id_library = 2;

        $status = $library->save();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Đăng video thành công' : "Đăng video thất bại",
        ]);
    }

    public function createDocument(Request $request){
        $library = new Library();
        if ($request->hasFile('file')) {
             
            $documentName = time().$request->file->getClientOriginalName();
            $request->file->move(public_path('images/library/documents/'), $documentName);
            $library->file_name = $documentName;
        }

        $library->title = $request->title;
        $library->id_user = $request->id_user;
        $library->id_library = 3;

        $status = $library->save();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Đăng tài liệu thành công' : "Đăng tài liệu thất bại",
        ]);
    }

    function getDataLibraryImage(){
        $library = DB::table('libraries')
            ->join('users', 'id_user', 'users.id')
            ->select('libraries.id', 'libraries.title', 'libraries.file_name', 'libraries.created_at', 'users.name', 'libraries.id_user')
        ->where('libraries.id_library', 1)
        ->get();
        return response()->json($library, 200);
    }

    function showLibrary($id){
        return response()->json(Library::findOrFail($id), 200);
    }

    function updateLibraryImage(Request $request, $id){
        $library = Library::findOrFail($id);
        if ($request->hasFile('file')) {
            if (file_exists('images/library/images/' . $library->file_name)) {
                unlink('images/library/images/' . $library->file_name);
            }
            $imageName = time().$request->file->getClientOriginalName();
            $request->file->move(public_path('images/library/images/'), $imageName);
            $library->file_name = $imageName;
        }
        $library->title = $request->title;

        $status = $library->save();
        
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Cập nhật hình ảnh thành công' : "Cập nhật hình ảnh thất bại",
        ]);
    }

    function deleteLibraryImage($id){
        $library = Library::findOrFail($id);

        if (file_exists('images/library/images/' . $library->file_name)) {
            unlink('images/library/images/' . $library->file_name);
        }

        $status = $library->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại"
        ]);
    }

    function getDataLibraryVideo(){
        $library = DB::table('libraries')
            ->join('users', 'id_user', 'users.id')
            ->select('libraries.id', 'libraries.title', 'libraries.file_name', 'libraries.created_at', 'users.name', 'libraries.id_user')
        ->where('libraries.id_library', 2)
        ->get();
        return response()->json($library, 200);
    }

    function updateLibraryVideo(Request $request, $id){
        $library = Library::findOrFail($id);
        $library->file_name = $request->file_name;
        $library->title = $request->title;

        $status = $library->save();
        
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Cập nhật hình ảnh thành công' : "Cập nhật hình ảnh thất bại",
        ]);
    }

    function deleteLibraryVideo($id){
        $library = Library::findOrFail($id);
        $status = $library->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại"
        ]);
    }

}
