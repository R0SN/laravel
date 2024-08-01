<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function verifyUser(Request $request){
        $data = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        if (Auth::attempt($data)){
            return redirect()->route('backend.dashboard');
        } else {
            return redirect()->route('login')->withErrors(['email' =>'Credential Not match']);
        }
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}