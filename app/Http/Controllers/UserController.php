<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Mail;
use DB;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all()->get());
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
   
}
