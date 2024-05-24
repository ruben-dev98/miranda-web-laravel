<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::rooms();
        return view('rooms', ['rooms' => $rooms]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $check_in = isset($_GET['check_in']) ? $_GET['check_in'] : null;
        $check_out = isset($_GET['check_out']) ? $_GET['check_out'] : null;
        $roomsSwiper = Room::swiper();
        return view('roomDetails', ['room' => $room, 'check_in' => $check_in, 'check_out' => $check_out, 'rooms' => $roomsSwiper]);
    }

    public function roomsList()
    {
        $check_in = isset($_GET['check_in']) ? $_GET['check_in'] : null;
        $check_out = isset($_GET['check_out']) ? $_GET['check_out'] : null;
        $rooms = Room::checkAvailability($check_in, $check_out);
        return view('roomsList', ['rooms' => $rooms, 'check_in' => $check_in, 'check_out' => $check_out]);
    }

    public function home()
    {
        $roomsSwiper = Room::swiper();
        return view('index', ['rooms' => $roomsSwiper]);
    }

    public function offers()
    {
        $roomsSwiper = Room::swiper();
        $offersRooms = Room::offers();
        return view('offers', ['rooms' => $offersRooms, 'popularRooms' => $roomsSwiper]);
    }
}
