<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoomController;
use App\Models\Room;
use Illuminate\Support\Facades\Route;
require_once __DIR__ . '/../helpers/format.php';

Route::get('/', function () {
    $rooms = Room::swiper();
    $formatRooms = formatListRooms($rooms);
    return view('index', ['rooms' => $formatRooms]);
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/rooms', [RoomController::class, 'index']);

Route::get('/rooms-grid', [RoomController::class, 'index']);

Route::get('/contact', [MessageController::class, 'create']);

Route::get('/offers', function() {
    $roomsSwiper = Room::swiper();
    $rooms = Room::offers();
    $formatRooms = formatListRooms($rooms);
    $formatRoomsSwiper = formatListRooms($roomsSwiper);
    return view('offers', ['rooms' => $formatRooms, 'popularRooms' => $formatRoomsSwiper]); 
});

Route::get('/room-details/{room}', [RoomController::class, 'show']);
