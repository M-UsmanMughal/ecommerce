<?php

namespace App\Http\Controllers;

use App\Models\Cetagore;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CetagoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255', // Corrected 'text' to 'string'
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean'
        ]);
    
        // Handle the file upload
        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images'), $imageName);
    
        // Save the data
        Cetagore::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'photo' => $imageName,
            'status' => $data['status'],
        ]);
    
        // Redirect with success message
        Alert::success('Added','Cetagory added successfully');
        return redirect()->route('admin.dashboard')->with('success', 'Category added successfully');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Cetagore $cetagore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
       
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cetagore $cetagory)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);
    
        // Handle photo upload
        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $data['photo'] = $imageName;
        }
    
        // Update the category
        $cetagory->update($data);
    
        return redirect()->back()->with('success', 'Cetagory updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cetagory = Cetagore::findOrFail($id);
    
        // Optionally delete the photo file
        $imagePath = public_path('images/' . $cetagory->photo);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        $cetagory->delete();
    
        return redirect()->route('admin.dashboard')->with('success', 'Category deleted successfully');
    }
    
}
