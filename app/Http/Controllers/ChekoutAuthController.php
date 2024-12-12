<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChekoutAuthController extends Controller
{
   public function chekoutLogin(){
    return view('chekout-login');
   }

   public function checkoutLoginAuth(Request $request)
   {
       // Validate user input
       $validatedData = $request->validate([
           'email' => 'required|email',
           'password' => 'required|min:8',
       ]);
   
       // Check if the email exists in the database
       $emailExists = \App\Models\Register::where('email', $validatedData['email'])->exists();
   
       if (!$emailExists) {
           return redirect()->back()->withErrors(['email' => 'This email is not registered.']);
       }
   
       // Attempt to authenticate the user
       
       if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
          $request->session()->regenerate(); // Regenerate session for security
          return redirect()->route('chekout'); // Redirect to the checkout page
         }
   
       return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
   }
   
   
}
