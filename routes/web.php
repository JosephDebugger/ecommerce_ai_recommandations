<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\HomeController;


Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [HomeController::class, 'home'])->name('home');;
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/mens', [HomeController::class, 'mens']);
Route::get('/womens', [HomeController::class, 'womens']);
Route::get('/product/{id}', [HomeController::class, 'product'])->name('product');

Route::get('/recommendations', [HomeController::class, 'recommendations']);
Route::post('/setReview', [HomeController::class, 'setReview'])->name('setReview');

// Route::middleware('auth:web')->group(function () {
 
// });

// Route::middleware('auth:customer')->group(function () {
//     Route::name('cart.')->prefix('cart')->group(function () {
//         Route::get('/checkout/{name}/{qty}', [HomeController::class, 'checkout'])->name('checkout'); 

//     });
// });
// Route::name('cart.')->prefix('cart')->middleware('auth:customer')->group(function () {
//         Route::get('/checkout/{name}/{qty}', [HomeController::class, 'checkout'])->name('checkout'); 
// });

Route::name('cart.')->prefix('cart')->group(function () {
    Route::get('/checkout/{name}/{qty}', [HomeController::class, 'checkout'])->name('checkout'); 
    Route::post('checkoutProducts', [HomeController::class, 'checkoutProducts'])->name('checkoutProducts'); 
});
require __DIR__ . '/customer-auth.php';
require __DIR__ . '/auth.php';


