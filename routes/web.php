<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Order_Menu;

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
Route::get('/book_order', function(){
    return view('book_order');
});
Route::get('/add-item', function(){
    return view('add-item');
});
Route::get('/item-list', function(){
    return view('item_list');
});


Route::get('/profile', [RestaurantController::class, 'profile'])->name('res.profile');
Route::post('login', [RestaurantController::class, 'login'])->name('res.login');

Route::post('/logout', [RestaurantController::class, 'destroy']);
Route::post('signup', [RestaurantController::class, 'signup'])->name('res.signup');
Route::post('adduser', [RestaurantController::class, 'adduser'])->name('res.adduser');
Route::get('/list', [RestaurantController::class, 'list'])->name('res.list');
Route::get('/delete_user/{userid}', [RestaurantController::class, 'delete_user'])->name('res.delete_user');
Route::get('/edit_profile/{userid}', [RestaurantController::class, 'edit_profile'])->name('res.edit_profile');
Route::put('/update_profile/{userid}', [RestaurantController::class, 'update_profile'])->name('res.update_profile');
Route::post('/add-item', [RestaurantController::class, 'add_item'])->name('res.add-item');
Route::get('/item-list', [RestaurantController::class, 'item_list'])->name('res.item-list');
Route::get('/delete_item/{itemid}', [RestaurantController::class, 'delete_item'])->name('res.delete_item');
Route::get('/edit_item/{userid}', [RestaurantController::class, 'edit_item'])->name('res.edit_item');
Route::put('/update_item/{userid}', [RestaurantController::class, 'update_item'])->name('res.update_item');

Route::get('/book_order', [RestaurantController::class, 'book_order'])->name('res.book_order');
Route::post('/save_order', [RestaurantController::class, 'save_order'])->name('res.save_order');

