<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Log;
use Socialite;
use Auth;

class SocialAuthController extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);
        auth()->login($user);

        // $response = [
        //     'user' => Auth::user(),
        //     'token' => Auth::user()->createToken('tpack')->accessToken,
        // ];
    	// return response()->json($response, 200);
        // $response = [
        //     'social' => $social,
        // ];

        // return response()->json($response, 200);
        return redirect()->to('/home');
    }
}
