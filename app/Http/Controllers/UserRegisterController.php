<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\UserRegister;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Register::all();
        return view('admin.users' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        Alert::success('Added','User added successfully');
        return redirect()->back()->with('Your account has been Registered!');

    }
    

    /**
     * Display the specified resource.
     */
    public function show(UserRegister $userRegister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserRegister $userRegister)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserRegister $userRegister)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the user by ID and delete
        $user = Register::findOrFail($id);
        $user->delete();

        // Redirect with a success message
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
