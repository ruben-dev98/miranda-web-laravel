<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/rooms', [RoomController::class, 'index']);

Route::get('/rooms-grid', [RoomController::class, 'index']);

Route::get('/contact', [MessageController::class, 'create']);

Route::get('/offers', function() {
    return view('offers'); 
});

Route::get('/room-details/{room}', [RoomController::class, 'show']);
