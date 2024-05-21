<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\RoomController;
use App\Models\Room;
use Illuminate\Support\Facades\Route;
require_once __DIR__ . '/../helpers/format.php';

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/about', 'about')->name('about');

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');

Route::get('/rooms-list', [RoomController::class, 'index'])->name('roomList');

Route::get('/contact', [MessageController::class, 'create'])->name('contact');

Route::get('/offers', [OffersController::class, 'index'])->name('offers');

Route::get('/room-details/{room}', [RoomController::class, 'show'])->name('roomDetails');
