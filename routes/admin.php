<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\CustomersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Admin Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // Product Management Routes
    Route::resource('products', ProductController::class, ['as' => 'admin']);
    
    // Order Management Routes
    Route::resource('orders', OrdersController::class, ['as' => 'admin']);
    
    // Customer Management Routes
    Route::resource('customers', CustomersController::class, ['as' => 'admin']);
    
    // Category Management Routes
    Route::resource('categories', CategoryController::class, ['as' => 'admin']);
    
    // Discount Management Routes
    Route::resource('discounts', DiscountController::class, ['as' => 'admin']);
    
    // Coupon Management Routes
    Route::resource('coupons', CouponController::class, ['as' => 'admin']);
    
    // Settings Management Routes
    Route::resource('settings', SettingsController::class, ['as' => 'admin']);
    
    // User Management Routes
    Route::resource('users', UserController::class, ['as' => 'admin']);
    
    // Role Management Routes
    Route::resource('roles', RoleController::class, ['as' => 'admin']);
    
    // Permission Management Routes
    Route::resource('permissions', PermissionController::class, ['as' => 'admin']);
    
    // Newsletter Management Routes
    Route::resource('newsletters', \App\Http\Controllers\Admin\NewsletterController::class, ['as' => 'admin'])->except(['create', 'store', 'edit', 'update']);
    Route::get('newsletters/export', [\App\Http\Controllers\Admin\NewsletterController::class, 'export'])->name('admin.newsletters.export');
});