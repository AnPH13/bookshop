<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                if(Auth::user()->status == 1)
                    return redirect()->route('user.index');
                else
                    return redirect()->route('home.index');
            }
        } else {
            return back()->withInput();
        }
    }
    public function register(Request $request)
    {
        // nếu gọi bằng phương thức get trả về view login
        if ($request->getMethod() == 'GET') {
            return view('register')->with(['active' => 'none']);
        }
        $data = addWithParams('users',[
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $data1 = addWithParams('user_details',[
            'name' => $request->name,
            'avatar' => $name ?? '',
            'birthday' => $request->birthday,
            'number_phone' => $request->number_phone,
            'gender' => $request->gender == 'on' ? 1 : 0,
        ]);
        if($data && $data1){
            return redirect()->route('login');
        }
        return back()->withErrors(['msg'=>$data]);

    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('login');
        }
        return back();
    }
}
