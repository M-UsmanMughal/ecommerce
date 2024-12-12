<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting' , compact('setting') );
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
        // Validate the request
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'github_link' => 'required|string|max:255',
            'linkedin_link' => 'required|string|max:255',
            'about_photo_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_photo_2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string|max:255',
            'about_description' => 'nullable|string',
        ]);
    
        // Handle file uploads
        $logoName = time() . '.' . $request->logo->extension();
        $aboutPhoto1Name = time() . '_1.' . $request->about_photo_1->extension();
        $aboutPhoto2Name = time() . '_2.' . $request->about_photo_2->extension();
    
        $request->logo->move(public_path('images'), $logoName);
        $request->about_photo_1->move(public_path('images'), $aboutPhoto1Name);
        $request->about_photo_2->move(public_path('images'), $aboutPhoto2Name);
    
        // Update the validated data with file names
        $data['logo'] = $logoName;
        $data['about_photo_1'] = $aboutPhoto1Name;
        $data['about_photo_2'] = $aboutPhoto2Name;
    
        // Create the settings record
        $setting = Setting::create([
            'title' => $data['title'],
            'logo' => $data['logo'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'github_link' => $data['github_link'],
            'linkedin_link' => $data['linkedin_link'],
            'about_photo_1' => $data['about_photo_1'],
            'about_photo_2' => $data['about_photo_2'],
            'address' => $data['address'],
            'about_description' => $data['about_description'] ?? null, // Handle nullable field
        ]);


    
        // Check if the operation was successful
        if ($setting) {
            Alert::success('Update', 'Updated Successfully');
            return redirect()->back()->with('success', 'Setting updated successfully!');
        } else {
            Alert::error('Update', 'Failed to update');
            return redirect()->back()->withErrors(['error' => 'Failed to update settings.']);
        }

    }
    

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:settings,email,' . $setting->id,
            'github_link' => 'required|string|max:255',
            'linkedin_link' => 'required|string|max:255',
            'about_photo_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_photo_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string|max:255',
            'about_description' => 'nullable|string',
        ]);
    
        // Process files
        if ($request->hasFile('logo')) {
            $logoName = time() . '_logo.' . $request->logo->extension();
            $request->logo->move(public_path('images'), $logoName);
            $validatedData['logo'] = $logoName; // Save the correct logo name in the array
        }
        
        if ($request->hasFile('about_photo_1')) {
            $aboutPhoto1Name = time() . '_about1.' . $request->about_photo_1->extension();
            $request->about_photo_1->move(public_path('images'), $aboutPhoto1Name);
            $validatedData['about_photo_1'] = $aboutPhoto1Name; // Save the correct name
        }
        
        if ($request->hasFile('about_photo_2')) {
            $aboutPhoto2Name = time() . '_about2.' . $request->about_photo_2->extension();
            $request->about_photo_2->move(public_path('images'), $aboutPhoto2Name);
            $validatedData['about_photo_2'] = $aboutPhoto2Name; // Save the correct name
        }
        
        // Update setting
        $setting->update($validatedData);
    
        // Redirect with success message
        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
    
}
