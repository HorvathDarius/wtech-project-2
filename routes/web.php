<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductGuitarsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/register', [RegisteredUserController::class, 'create'])->name('registerView');

Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('loginView');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/guitars', [ProductGuitarsController::class, 'index'])->name('productsGuitars');

Route::get('/guitars/{product_link_name}', [ProductGuitarsController::class, 'showProduct'])->name('showGuitar');

Route::get('/add', function () {
    return view('addProduct');
})->name('addProduct');

Route::get('/admin', function () {
    return view('adminPage');
})->name('adminPage')->middleware(['auth']);


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{id}', [CartController::class, 'deleteShoppingCartProduct'])->name('cart.removeItem');

Route::get('/empty', function () {
    return view('cartFallback');
})->name('cartFallback');


Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/checkout', [OrderController::class, 'create'])->name('order.create');
Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::put('/order/{id}', [OrderController::class, 'update'])->name('order.update');

Route::get('/edit', function () {
    return view('editProduct');
})->name('editProduct');

Route::get('/', function () {
    return view('landingPage');
})->name('dashboard');

Route::get('/success', function () {
    return view('orderSuccess');
})->name('orderSuccess');

Route::get('/product', function () {
    return view('productPage');
})->name('productPage');

Route::get('/productGuitar', 'ProductGuitarsController@index')->name('productGuitar.index');

Route::get('/amps', function () {
    return view('productsAmps');
})->name('productsAmps');

Route::get('/basses', function () {
    return view('productsBasses');
})->name('productsBasses');

Route::get('/user/{id}', [ProfileController::class, 'show'])->name('userPage')->middleware(['auth']);