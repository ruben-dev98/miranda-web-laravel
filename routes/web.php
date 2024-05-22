<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RoomController::class, 'home'])->name('home');

Route::view('/about', 'about')->name('about');

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');

Route::get('/rooms-list', [RoomController::class, 'roomsList'])->name('roomList');

Route::get('/contact', [MessageController::class, 'create'])->name('contact');

Route::get('/offers', [RoomController::class, 'offers'])->name('offers');

Route::get('/room-details/{room}', [RoomController::class, 'show'])->name('roomDetails');
