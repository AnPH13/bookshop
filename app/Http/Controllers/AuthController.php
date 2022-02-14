<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // nếu gọi bằng phương thức get trả về view login
        if ($request->getMethod() == 'GET') {
            return view('login');
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()){
                return redirect()->route('user.index');
            }
        } else {
            return back()->withInput();
        }
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('login');
        }
        return back();
    }
}
