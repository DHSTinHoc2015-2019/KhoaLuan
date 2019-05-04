<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Mail\SendEmail;
use App\Mail\SendEmailResetPassword;
use Mail;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $user = DB::table('users')->get();
        return response()->json($user, 200);
        // return response()->json("aaaaaaaa", 200);
    }

    public function login(Request $request){
        $status = 401;
        $response = ['error' => 'Unauthorised'];

        $login = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $payload[$login] = $request->email;
        $payload['password'] = $request->password;
        // if (Auth::attempt($request->only(['email', 'password']))) {
         if (Auth::attempt($payload)) {
            $status = 200;
            $response = [
                'user' => Auth::user(),
                'token' => Auth::user()->createToken('tpack')->accessToken,
            ];
        }

        return response()->json($response, $status);
    }

    public function show(User $user){
        return response()->json($user);
    }

    protected function getToken(){
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->activation_code = $this->getToken();
        $user->is_admin = 0;
        $status = $user->save();

        config(['mail.driver' => 'smtp', 'mail.host' => 'smtp.gmail.com', 'mail.port' => 587, 'mail.username' => 'tranquangtanqt1190@gmail.com', 'mail.password' => 'oxksatmagyoegxdb', 'mail.encryption' => null]);
        
        $newuser = DB::table('users')->where('email', $user->email)->first();
        $name = $newuser->name;
        $link_active = url("/active/{$newuser->id}/{$user->activation_code}/");
        $to_email = $newuser->email;
        $mailable = new SendEmail($name, $link_active, $newuser->activation_code, $newuser->id);
        Mail::to($to_email)->send($mailable);

        // remove key password in data
        unset($user['activation_code']);
        return response()->json([
            'user' => $user,
            'token' => $user->createToken('tpack')->accessToken,
        ], 200);
    }

    public function activateUser($id, $activation_code){
        $status = false;
        $user = User::findOrFail($id);
        if($user->activation_code == $activation_code){
            $user->email_verified_at = date("Y-m-d");
            $status = $user->save();
            // $status = false;
        }

        return response()->json([
            'user' => $user,
            'status' => $status
        ], 200);
    }

    function showWithId($id){
        $user = User::findOrFail($id);
        return response()->json($user, 200);
    }

    function changePassword($id, Request $request){
        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $status = $user->save();
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Đổi mật khẩu thành công' : "Đổi mật khẩu thất bại"
        ], 200);
    }

    function findEmailResetPassword($email){
        $user = DB::table('users')->where('email', $email)->first();
        if (empty((array) $user)) {
            
        } else {
            config(['mail.driver' => 'smtp', 'mail.host' => 'smtp.gmail.com', 'mail.port' => 587, 'mail.username' => 'tranquangtanqt1190@gmail.com', 'mail.password' => 'oxksatmagyoegxdb', 'mail.encryption' => null]);
            $token_reset = $this->getTokenResetPassword();
            DB::table('password_resets')->insert([
                'email' => $email,
                'token_reset' => $token_reset,
                'created_at' => date("Y-m-d"),
            ]);
            $to_email = $email;
            $mailable = new SendEmailResetPassword($token_reset);
            Mail::to($to_email)->send($mailable);
        }
        return response()->json($user, 200);
    }

    protected function getTokenResetPassword(){
        return strtoupper(substr(hash_hmac('sha256', str_random(6), config('app.key')),0, 6));
    }

    function checkResetPassword($email, Request $request){
        $status = false;
        $password_reset = DB::table('password_resets')->where('email', $email)->first();
        if($password_reset->token_reset == $request->token_reset){
            $status = true;
            $token = $this->getToken();
            DB::table('password_resets')->where('email', $email)->update(['token' => $token]);
            return response()->json([
                'status' => $status,
                'token' => $token
            ], 200);
        }
        return response()->json([
            'status' => $status
        ], 200);
    }

    function checkTokenPassword($email, $token){
        $status = false;
        $password_reset = DB::table('password_resets')->where('email', $email)->first();
        if($password_reset->token == $token){
            $status = true;
            return response()->json([
                'status' => $status,
            ], 200);
        }
        return response()->json([
            'status' => $status
        ], 200);
    }
    
    function changeForgetPassword(Request $request){
        DB::table('users')->where('email', $request->email)->update(['password' => bcrypt($request->password)]);
        $status = 401;
        $response = ['error' => 'Unauthorised'];

        $login = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $payload[$login] = $request->email;
        $payload['password'] = $request->password;
        // if (Auth::attempt($request->only(['email', 'password']))) {
        if (Auth::attempt($payload)) {
            $status = 200;
            $response = [
                'user' => Auth::user(),
                'token' => Auth::user()->createToken('tpack')->accessToken,
            ];
        }
        DB::table('password_resets')->where('email', $request->email)->delete();
        return response()->json($response, $status);
        // return response()->json([
        //     'status' => $status
        // ], 200);
    }

    function create(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = filter_var((string)$request->is_admin, FILTER_VALIDATE_BOOLEAN)? 1 : 0;
        $user->display_name = $request->display_name;
        $user->birthday =  $request->birthday;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->introduce_yourself = $request->introduce_yourself;
        $user->password = bcrypt($request->password);

        if ($request->hasFile('file')) {
            $imageName = time().$request->file->getClientOriginalName();
            $request->file->move(public_path('images/users/'), $imageName);
            $user->user_image = $imageName;
        }

        $user->email_verified_at = date("Y-m-d");

        $status = $user->save();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Thêm tài khoản thành công' : "Thêm tài khoản thất bại",
        ]);
    }

    public function showid($id){
        $user = User::findOrFail($id);
        return response()->json([
            'user' => $user
        ], 200);
    }

    public function edit(Request $request, $id){
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = filter_var((string)$request->is_admin, FILTER_VALIDATE_BOOLEAN)? 1 : 0;
        $user->display_name = $request->display_name;
        $user->birthday =  $request->birthday;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->introduce_yourself = $request->introduce_yourself;

        if ($request->hasFile('file')) {
            $imageName = time().$request->file->getClientOriginalName();
            $request->file->move(public_path('images/users/'), $imageName);
            if (file_exists('images/users/' . $user->user_image)) {
                unlink('images/users/' . $user->user_image);
            }
            $user->user_image = $imageName;
        }

        $status = $user->save();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Chỉnh sửa tài khoản thành công' : "Chỉnh sửa tài khoản thất bại",
        ]);
    }

     public function delete($id){
        $user = User::findOrFail($id);

        if (file_exists('images/users/' . $user->user_image)) {
            unlink('images/users/' . $user->user_image);
        }

        $status = $user->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Xóa dữ liệu thành công' : "Xóa dữ liệu thất bại"
        ]);
    }
}
