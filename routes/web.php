<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CetagoreController;
use App\Http\Controllers\ChekoutAuthController;
use App\Http\Controllers\ChekoutRegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

Route::get('/', [WebsiteController::class, 'index'])->name('index');
Route::get('/shop', [WebsiteController::class, 'shop'])->name('shop');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::get('/feature', [WebsiteController::class, 'feature'])->name('feature');
Route::get('/chekoutPage', [WebsiteController::class, 'chekoutPage'])->name('chekoutPage');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/chekout-login', [ChekoutAuthController::class, 'chekoutLogin'])->name('chekout-login');
Route::get('/chekoutRegister', [ChekoutRegisterController::class, 'chekoutRegister'])->name('chekoutRegister');

Route::name('admin.')->group(function () {
  Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
  Route::post('/checkout-login-auth', [ChekoutAuthController::class, 'checkoutLoginAuth'])->name('checkout-login-auth');
  Route::post('/chekoutRegisterAuth', [ChekoutRegisterController::class, 'chekoutRegisterAuth'])->name('chekoutRegisterAuth');
  Route::middleware(['auth'])->group(function () {
    Route::get('/logout', action: [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [DashboardController::class, 'products'])->name('products');
    Route::get('/ordar', [DashboardController::class, 'ordar'])->name('ordar');
    Route::resource('/cetagories', CetagoreController::class);
    Route::resource('/products', ProductController::class);
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::resource('/order', OrderController::class);
    Route::resource('/users', UserRegisterController::class);
    Route::resource('/setting', SettingController::class);
  });

  Route::post('/chekoutPage', [ChekoutRegisterController::class, "chekoutRegisterAuth"])->name('chekoutRegisterAuth');
});
