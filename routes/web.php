<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\AccountController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [HomeController::class, 'home'])->name('home');;
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/category/{gender}/{category}', [HomeController::class, 'categorized']);
Route::get('/band/{id}', [HomeController::class, 'bandProducts']);

Route::get('/product/{id}', [HomeController::class, 'product'])->name('product');

Route::get('/recommendations', [HomeController::class, 'recommendations']);
Route::post('/setReview', [HomeController::class, 'setReview'])->name('setReview');

Route::middleware('customer')->group(function () {
    Route::get('/account_home', [AccountController::class, 'accountHome']);
    Route::get('/account_bill_info', [AccountController::class, 'accountBillInfo']);
    Route::get('/account_sales', [AccountController::class, 'accountBandSale']);
    Route::get('/account_orders', [AccountController::class, 'accountCustomerSalesOrder']);
    Route::get('/account_band_profile', [AccountController::class, 'accountBandProfile']);
    Route::post('/account_update_profile', [AccountController::class, 'accountProfileUpdate'])->name('account_update_profile');
    Route::post('/account_update_bill_info', [AccountController::class, 'accountProfileBillUpdate'])->name('account_update_bill_info');
});



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


