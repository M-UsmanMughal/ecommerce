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

    
    public function chekoutRegisterAuth(Request $request)
    {
        // Validate the user input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|string|email|max:255|unique:registration,email',
            'password' => 'required|string|min:8',
        ]);
    
        // Check if the user is already registered (optional for edge cases)
        $existingUser = Register::where('email', $request->email)->first();
        if ($existingUser) {
            return redirect()->back()->withErrors(['email' => 'This email is already registered.']);
        }
    
        // Register the user
        $user = Register::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
      
        return redirect()->route('chekoutPage')->with('success', 'Your account has been registered successfully!');
    }
    
}
