<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
      
    }
    public function authenticate(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid Credentials']);
      
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
