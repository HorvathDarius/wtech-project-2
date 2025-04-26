<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProductGuitarsController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])->name('registerView');

Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('loginView');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/guitars', [ProductGuitarsController::class, 'index'])->name('productsGuitars');


Route::get('/add', function () {
    return view('addProduct');
})->name('addProduct');

Route::get('/admin', function () {
    return view('adminPage');
})->name('adminPage');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/empty', function () {
    return view('cartFallback');
})->name('cartFallback');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/edit', function () {
    return view('editProduct');
})->name('editProduct');

Route::get('/', function () {
    return view('landingPage');
})->name('/');

Route::get('/history', function () {
    return view('orderHistoryPage');
})->name('orderHistory');

Route::get('/order', function () {
    return view('orderPage');
})->name('orderPage');

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

// Route::get('/guitars', function () {
//     return view('productsGuitars');
// })->name('productsGuitars');

Route::get('/user', function () {
    return view('userPage');
})->name('userPage');

