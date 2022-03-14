<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterStaff extends Controller
{
    public function show(){
        return view('register');
    }

    // public function store_staff(Request $request){
    //     $request->validate
    // }
}
