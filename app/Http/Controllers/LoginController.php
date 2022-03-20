<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function login(){
        return view('login');
    }

    public function process(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('email','password'),$request->remember_me)){
            return back()->with('message','Email or Password Not Correct');
        }

        if(auth()->user()->user_type == 'staff'){
             return redirect('/task/' . Crypt::encrypt('unresolved'));
        }
        return redirect('/');
    }
}
