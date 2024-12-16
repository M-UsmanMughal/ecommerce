<?php

namespace App\Http\Controllers;

use App\Models\Ordar;
use Illuminate\Http\Request;

class OrderController extends Controller
{
 
    public function index()
    {
       return view('admin.ordar');
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
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ordar $ordar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ordar $ordar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ordar $ordar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordar $ordar)
    {
        //
    }
}
