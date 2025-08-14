<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Include admin routes
require __DIR__.'/admin.php';

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

// User-facing routes
Route::get('/', [\App\Http\Controllers\Shop\ShopController::class, 'home'])->name('home');
Route::get('/shop', [\App\Http\Controllers\Shop\ShopController::class, 'index'])->name('shop');
Route::get('/product/{id}', [\App\Http\Controllers\Shop\ShopController::class, 'show'])->name('product.show');
Route::get('/category/{slug}', [\App\Http\Controllers\Shop\ShopController::class, 'category'])->name('category.show');

Route::get('/categories', function () {
    return view('shop.categories');
})->name('categories');

Route::get('/about', function () {
    return view('shop.about');
})->name('about');

Route::get('/contact', function () {
    return view('shop.contact');
})->name('contact');

Route::get('/wishlist', function () {
    return view('shop.wishlist');
})->name('wishlist');

Route::get('/cart', function () {
    return view('shop.cart');
})->name('cart');

Route::get('/deals', function () {
    // In a real application, you would fetch deals from the database
    // For now, we'll just return a placeholder view
    return view('shop.deals');
})->name('deals');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Newsletter Routes
Route::post('/newsletter/subscribe', [\App\Http\Controllers\Shop\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe/{email}', [\App\Http\Controllers\Shop\NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');

// Admin Routes are now in routes/admin.php

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
