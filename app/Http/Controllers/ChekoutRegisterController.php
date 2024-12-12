<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChekoutRegisterController extends Controller
{
    public function chekoutRegister(){
        return view('chekout-register');
    }

    public function chekoutRegisterAuth(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = Register::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return view('chekout')->with('Your account has been Registered!');

    }
}
