<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

Route::get('/', function () {
    return view('index');
});
Route::get('/signup', function(){
    return view('signup');
});
Route::get('/adduser', function(){
    return view('adduser');
});
Route::get('/login', function(){
    return view('login');
});
Route::get('/profile', function(){
    return view('profile');
});

Route::post('login', [RestaurantController::class, 'login'])->name('res.login');
Route::post('signup', [RestaurantController::class, 'signup'])->name('res.signup');
Route::post('adduser', [RestaurantController::class, 'adduser'])->name('res.adduser');
Route::get('/list', [RestaurantController::class, 'list'])->name('res.list');