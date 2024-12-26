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
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/category/{gender}/{category}', [HomeController::class, 'categorized'])->name('category');
Route::get('/band/{id}', [HomeController::class, 'bandProducts']);
Route::get('/product/{id}', [HomeController::class, 'product'])->name('product');
Route::get('/recommendations', [HomeController::class, 'recommendations']);
Route::get('/searchProducts/{name}', [HomeController::class, 'searchProducts'])->name('searchProducts');
Route::post('/setRating', [HomeController::class, 'setRating'])->name('setRating');
Route::get('/addReview', [HomeController::class, 'addReview'])->name('addReview');
Route::post('/save-user-msg', [HomeController::class, 'saveUserMsg'])->name('save-user-msg');

Route::middleware('customer')->group(function () {
    Route::get('/account_home', [AccountController::class, 'accountHome']);
    Route::get('/account_bill_info', action: [AccountController::class, 'accountBillInfo']);
    Route::get('/account_sales', [AccountController::class, 'accountBandSale']);
    Route::get('/account_orders', [AccountController::class, 'accountCustomerSalesOrder']);
    Route::get('/account_chats', [AccountController::class, 'accountCustomerChats']);
    Route::post('/account_send_msg', [AccountController::class, 'accountSendMsg'])->name('accountSendMsg');
    Route::get('/account_band_profile', [AccountController::class, 'accountBandProfile']);
    Route::post('/account_update_profile', [AccountController::class, 'accountProfileUpdate'])->name('account_update_profile');
    Route::post('/account_update_bill_info', [AccountController::class, 'accountProfileBillUpdate'])->name('account_update_bill_info');
    Route::get('/account_band_bill_withraw_view', [AccountController::class, 'accountBandBillWithrawView'])->name('accountBandBillWithraw');
    Route::post('/account_band_bill_withraw', [AccountController::class, 'accountBandBillWithrawStore'])->name('accountBandBillWithrawStore');
    Route::get('/account_band_bill_withraw_history', [AccountController::class, 'withdrawHistory'])->name('withdrawHistory');

    
    Route::name('cart.')->prefix('cart')->group(function () {
        Route::get('/checkout/{name}/{qty}', [HomeController::class, 'checkout'])->name('checkout'); 
        Route::post('checkoutProducts', [HomeController::class, 'checkoutProducts'])->name('checkoutProducts'); 
    });
});


//payment getway

Route::get('payment',[\App\Http\Controllers\paymentController::class,'payment'])->name('payment');

//You need declear your success & fail route in "app\Middleware\VerifyCsrfToken.php"
Route::post('success',[\App\Http\Controllers\paymentController::class,'success'])->name('success');
Route::post('fail',[\App\Http\Controllers\paymentController::class,'fail'])->name('fail');
Route::get('cancel',[\App\Http\Controllers\paymentController::class,'cancel'])->name('cancel');


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


require __DIR__ . '/customer-auth.php';
require __DIR__ . '/auth.php';


