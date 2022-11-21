<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);
        if(!Auth::attempt($login))
        {
            return response(["message"=>"Invalid login credentials"]);
        }
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response(['user'=>Auth::user(),'access_token'=> $accessToken]);
    }
    public function index(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function logout(Request $request){
       $token = $request->user()->token();
       $token->revoke();
       return response('Logged out', 200);
    }
}
