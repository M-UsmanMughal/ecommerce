<?php

namespace App\Http\Controllers;

use App\Models\Cetagore;
use App\Models\Ordar;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $cetagories = Cetagore::all();
        return view('admin.dashboard', compact('cetagories'));
    }

    public function ordar()
    {
        $ordars = Ordar::all();
        return view('admin.ordar ', compact('ordars'));
    }
}
