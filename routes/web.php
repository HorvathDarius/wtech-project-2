<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::get('/add', function () {
    return view('addProduct');
});

Route::get('/admin', function () {
    return view('adminPage');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/empty', function () {
    return view('cartFallback');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/edit', function () {
    return view('editProduct');
});

Route::get('/', function () {
    return view('landingPage');
});

Route::get('/history', function () {
    return view('orderHistoryPage');
});

Route::get('/order', function () {
    return view('orderPage');
});

Route::get('/success', function () {
    return view('orderSuccess');
});

Route::get('/product', function () {
    return view('productPage');
});

Route::get('/amps', function () {
    return view('productsAmps');
});

Route::get('/basses', function () {
    return view('productsBasses');
});

Route::get('/guitars', function () {
    return view('productsGuitars');
});

Route::get('/user', function () {
    return view('userPage');
});