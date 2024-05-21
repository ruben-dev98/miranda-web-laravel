<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomsSwiper = Room::swiper();
        $rooms = Room::offers();
        $formatRooms = formatListRooms($rooms);
        $formatRoomsSwiper = formatListRooms($roomsSwiper);
        return view('offers', ['rooms' => $formatRooms, 'popularRooms' => $formatRoomsSwiper]);
    }
}
