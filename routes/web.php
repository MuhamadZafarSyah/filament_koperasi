<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialiteController;
use App\Models\News;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'onlyUser'])->group(function () {
    Route::get('/', function () {
        return view('welcome', [
            'news' => News::orderBy('id', 'desc')->get(),
            'Product' => Product::orderBy('id', 'desc')->get(),
        ]);
    });

    // Product
    Route::get('/category/{product:category_slug}', [ProductController::class, 'index']);
    Route::get('/product/{product:id}', [ProductController::class, 'show']);

    // Search Product
    Route::get('/s', [ProductController::class, 'search']);

    // User
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile/update', [ProfileController::class, 'update']);

    // Add to Cart
    Route::get('/my-cart', [CartController::class, 'index']);
    Route::post('/my-cart/{id}', [CartController::class, 'store']);
    Route::delete('/my-cart/{id}', [CartController::class, 'destroy']);

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index']);
});

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/auth', [AuthController::class, 'index']);
    Route::post('/auth', [AuthController::class, 'handleAuth']);
    // Route::post('/logout', [AuthController::class, 'logout']);


    Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);
    Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);
});

// Route::get('/lalal', function(){
//    Artisan::call('storage:link') ;
// });

Route::get('/download', [PDFController::class, 'downloadPDF'])->name('download.laporan');

// Route::get('/register', [CheckoutController::class, 'index']);
