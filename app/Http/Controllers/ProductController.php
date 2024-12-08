<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products' , compact('products'));
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
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255', 
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'price' => 'required|',
        'status' => 'required|boolean'
    ]);

    // Handle the file upload
    $imageName = time() . '.' . $request->photo->extension();
    $request->photo->move(public_path('images'), $imageName);

    // Save the data
    Product::create([
        'name' => $data['name'],
        'description' => $data['description'],
        'photo' => $imageName,
        'price' => $data['price'],
        'status' => $data['status'],
    ]);

    Alert::success('Added','Product added successfully');
    return redirect()->back()->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        return response()->json($product);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
{
   //
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Handle photo upload if a new one is provided
        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $data['photo'] = $imageName; // Update photo in data array
        }
    
        // Update product in the database
        $product->update($data);
    
        return redirect()->back()->with('success', 'Product updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
    
        // Optionally delete the photo file
        $imagePath = public_path('images/' . $product->photo);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        $product->delete();
    
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
