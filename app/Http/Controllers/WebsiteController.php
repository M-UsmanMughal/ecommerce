<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        return view('index');
    }
    public function shop()
    {
        $products = Product::all(); 
        return view('shop', compact('products'));
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    public function feature(){
        return view('feature');
    }
}
