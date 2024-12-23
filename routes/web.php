<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;


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

// Home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories-details');

Route::get('/details/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');
Route::POST('/details/{id}', [App\Http\Controllers\DetailController::class, 'add'])->name('detail-add'); // membuat cart baru (Menambah Cart)

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::DELETE('/cart/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('cart-delete');

Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout');
Route::post('/checkout/callback', [App\Http\Controllers\CheckoutController::class, 'callback'])->name('midtrans-callback');

Route::get('/success', [App\Http\Controllers\CartController::class, 'success'])->name('success');

// Auth
Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'success'])->name('register-success');

// Dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard/products', [App\Http\Controllers\DashboardProductController::class, 'index'])
    ->name('dashboard-product');
Route::get('/dashboard/products/create', [App\Http\Controllers\DashboardProductController::class, 'create'])
    ->name('dashboard-product-create');
Route::post('/dashboard/products', [App\Http\Controllers\DashboardProductController::class, 'store'])
    ->name('dashboard-product-store');
Route::get('/dashboard/products/{id}', [App\Http\Controllers\DashboardProductController::class, 'details'])
    ->name('dashboard-product-details');

// Route::post('/dashboard/products/{id}', [App\Http\Controllers\DashboardProductController::class, 'update'])
//     ->name('dashboard-product-update');
// Route::post('/dashboard/products/gallery/upload', [App\Http\Controllers\DashboardProductController::class, 'uploadGallery'])
//     ->name('dashboard-products-gallery-upload');
// Route::get('/dashboard/products/gallery/delete/{id}', [App\Http\Controllers\DashboardProductController::class, 'deleteGallery'])
//     ->name('dashboard-products-gallery-delete');

Route::get('/dashboard/transactions', [App\Http\Controllers\DashboardTransactionController::class, 'index'])
    ->name('dashboard-transaction');
Route::get('/dashboard/transactions/{id}', [App\Http\Controllers\DashboardTransactionController::class, 'details'])
    ->name('dashboard-transaction-details');


Route::get('/dashboard/settings', [App\Http\Controllers\DashboardSettingController::class, 'store'])
    ->name('dashboard-settings-store');
Route::get('/dashboard/account', [App\Http\Controllers\DashboardSettingController::class, 'account'])
    ->name('dashboard-settings-account');


Route::group(['middleware' => ['auth']], function(){
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::DELETE('/cart/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('cart-delete');

    Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/products', [App\Http\Controllers\DashboardProductController::class, 'index'])
        ->name('dashboard-product');
        
    Route::get('/dashboard/products/create', [App\Http\Controllers\DashboardProductController::class, 'create'])
        ->name('dashboard-product-create');
    Route::get('/dashboard/products/{id}', [App\Http\Controllers\DashboardProductController::class, 'details'])
        ->name('dashboard-products-details');

    Route::post('/dashboard/products/{id}', [App\Http\Controllers\DashboardProductController::class, 'update'])
        ->name('dashboard-product-update');

    Route::post('/dashboard/products/gallery/upload', [App\Http\Controllers\DashboardProductController::class, 'uploadGallery'])
        ->name('dashboard-products-gallery-upload');
    Route::get('/dashboard/products/gallery/delete/{id}', [App\Http\Controllers\DashboardProductController::class, 'deleteGallery'])
        ->name('dashboard-products-gallery-delete');



    Route::get('/dashboard/transactions', [App\Http\Controllers\DashboardTransactionController::class, 'index'])
        ->name('dashboard-transaction');
    Route::get('/dashboard/transactions/{id}', [App\Http\Controllers\DashboardTransactionController::class, 'details'])
        ->name('dashboard-transaction-details');
    Route::post('/dashboard/transactions/{id}', [App\Http\Controllers\DashboardTransactionController::class, 'update'])
        ->name('dashboard-transaction-update');


    Route::get('/dashboard/settings', [App\Http\Controllers\DashboardSettingController::class, 'store'])
        ->name('dashboard-settings-store');
    Route::get('/dashboard/account', [App\Http\Controllers\DashboardSettingController::class, 'account'])
        ->name('dashboard-settings-account');
        
    Route::post('/dashboard/account/{redirect}', [App\Http\Controllers\DashboardSettingController::class, 'update'])
    ->name('dashboard-settings-redirect');
});

// Admin
Route::prefix('admin')
    ->namespace('App\Http\Controllers\Admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('admin-dashboard');
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('product', 'ProductController');
        Route::resource('product-gallery', 'ProductGalleryController');
    });

Auth::routes();
