<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CetagoreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

 Route::get('/', [WebsiteController::class, 'index'])->name('index');
 Route::get('/shop', [WebsiteController::class, 'shop'])->name('shop');
 Route::get('/about', [WebsiteController::class, 'about'])->name('about');
 Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
 Route::get('/feature', [WebsiteController::class, 'feature'])->name('feature');

 Route::get('/login', [AuthController::class, 'login'])->name('login');

 Route::name('admin.')->group(function () {
   Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
   Route::middleware(['auth'])->group(function() {
    Route::get('/logout', action: [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [DashboardController::class, 'products'])->name('products');
    Route::resource('/cetagories' , CetagoreController::class);
    Route::resource('/products' , ProductController::class);
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

    
});
});   

