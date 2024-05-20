<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/rooms', function() {

});

Route::get('/rooms-grid', function() {

});

Route::get('/contact', function() {

});

Route::get('/room-details/{room}', function(Room $room) {
    return view('roomDetails', [$room]);
});
