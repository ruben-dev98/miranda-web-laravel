<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\RoomController;
use App\Models\Room;
use Illuminate\Support\Facades\Route;
require_once __DIR__ . '/../helpers/format.php';

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function() {
    return view('about');
});

Route::get('/rooms', [RoomController::class, 'index']);

Route::get('/rooms-grid', [RoomController::class, 'index']);

Route::get('/contact', [MessageController::class, 'create']);

Route::get('/offers', [OffersController::class, 'index']);

Route::get('/room-details/{room}', [RoomController::class, 'show']);
