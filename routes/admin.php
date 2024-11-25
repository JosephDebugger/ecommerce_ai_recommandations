
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\DashController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\BandController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\SalesController;



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
Route::name('sales.')->prefix('sales')->group(function () {
    Route::get('/getSales', [SalesController::class, 'getSales'])->name('getSales');
    Route::get('/saleInvoice/{id}', [SalesController::class, 'saleInvoice'])->name('saleInvoice');
    
});

Route::get('bands/bandAssign', [BandController::class, 'bandAssign'])->name('bandAssign');

Route::resource('brands', BrandController::class);
Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);
Route::resource('bands', BandController::class);
Route::resource('banners', BannerController::class);

Route::get('/company-setting', [CompanyController::class, 'getSettings'])->name('getSettings');
Route::post('/company-setting/{id}', [CompanyController::class, 'updateSettings'])->name('updateSettings');
