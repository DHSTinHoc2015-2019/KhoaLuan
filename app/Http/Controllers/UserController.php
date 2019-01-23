<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all()->get());
    }

    public function login(Request $request)
    {
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

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $data = $request->only(['name', 'email', 'password']);
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->is_admin = 0;

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('tpack')->accessToken,
        ]);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }
}
