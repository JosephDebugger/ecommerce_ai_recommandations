<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\admin\DashController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\BandController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\BannerController;

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

Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashController::class, 'index'])->name('dashboard');

    Route::post('/storeProduct', [ProductController::class, 'storeProduct'])->name('storeProduct');
    Route::get('/view-editProduct/{id}', [ProductController::class, 'getProduct'])->name('getProduct');
    Route::post('/updateProduct', [ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::delete('/productDestroy/{id}', [ProductController::class, 'productDestroy'])->name('productDestroy');

    // Product route group with name and prefix applied
    Route::name('inventory.')->prefix('inventory')->group(function () {
        Route::get('/products', [ProductController::class, 'products'])->name('products'); 
        Route::get('/view-addProduct', [ProductController::class, 'viewAddProduct'])->name('viewAddProduct');
        Route::get('/get_sub_cat/{id}', [ProductController::class, 'getGetSubCategory'])->name('getGetSubCategory');
    });

    Route::resource('brands', BrandController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('bands', BandController::class);
    Route::resource('banners', BannerController::class);

    Route::get('/company-setting', [CompanyController::class, 'getSettings'])->name('getSettings');
    Route::post('/company-setting/{id}', [CompanyController::class, 'updateSettings'])->name('updateSettings');
});

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

