<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RoomController::class, 'home'])->name('home');

Route::view('/about', 'about')->name('about');

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');

Route::get('/rooms-list', [RoomController::class, 'roomsList'])->name('roomList');

Route::get('/contact', [MessageController::class, 'create'])->name('contact');
Route::post('/contact', [MessageController::class, 'store'])->name('store-contact');

Route::get('/offers', [RoomController::class, 'offers'])->name('offers');

Route::get('/room/{room}', [RoomController::class, 'show'])->name('roomDetails');
Route::post('/room', [BookingController::class, 'store'])->name('createBooking');

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', [OrderController::class, 'index'])->name('dashboard');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order_details');

    Route::get('/order', [OrderController::class, 'create'])->name('order_create');
    Route::post('/order', [OrderController::class, 'store'])->name('order_details');
    
    Route::put('/order/edit/{order}', [OrderController::class, 'edit'])->name('order_edit');
    Route::put('/order/edit/{order}', [OrderController::class, 'update'])->name('order_update');

    Route::delete('/order/{order}', [OrderController::class, 'destroy'])->name('order_delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
