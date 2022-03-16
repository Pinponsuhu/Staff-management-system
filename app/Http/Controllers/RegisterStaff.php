<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use App\Rules\alpha_space;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterStaff extends Controller
{
    public function show(){
        return view('register');
    }

    public function store_staff(Request $request){
        $request->validate([
            'picture' => 'required|mimes:png,jpg,jpeg|max:1024',
            'surname' => 'required|alpha',
            'othernames' => ['required',new alpha_space],
            'id_number' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'user_type' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric|digits:11',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $staff = new Staff;
        $destination = 'public/staffs';

        $path = $request->file('picture')->store($destination);

        $staff->picture = str_replace('public/staffs/','',$path);
        $staff->surname = $request->surname;
        $staff->othernames = $request->othernames;
        $staff->id_number = $request->id_number;
        $staff->date_of_birth = $request->date_of_birth;
        $staff->gender = $request->gender;
        $staff->department = $request->department;
        $staff->phone_number = $request->phone_number;
        $staff->email = $request->email;
        $staff->save();

        $user = new User;

        $user->picture = str_replace('public/staffs/','',$path);
        $user->surname = $request->surname;
        $user->othernames = $request->othernames;
        $user->id_number = $request->id_number;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->department = $request->department;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->password = Hash::make($request->password);
        $user->save();
    }
}
