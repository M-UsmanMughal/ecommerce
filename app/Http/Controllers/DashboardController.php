<?php

namespace App\Http\Controllers;

use App\Models\Cetagore;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $cetagories = Cetagore::all();
        return view('admin.dashboard' , compact('cetagories'));
    }
   
}
