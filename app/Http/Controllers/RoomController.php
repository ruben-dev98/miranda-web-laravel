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
        $formatRooms = Room::rooms();
        return view('rooms', ['rooms' => $formatRooms]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $formatRoom = Room::formatRoom($room);
        $check_in = isset($_GET['check_in']) ? $_GET['check_in'] : null;
        $check_out = isset($_GET['check_out']) ? $_GET['check_out'] : null;
        $formatRooms = Room::swiper();
        return view('roomDetails', ['room' => $formatRoom, 'check_in' => $check_in, 'check_out' => $check_out, 'rooms' => $formatRooms]);
    }

    public function roomsList()
    {
        $check_in = isset($_GET['check_in']) ? $_GET['check_in'] : null;
        $check_out = isset($_GET['check_out']) ? $_GET['check_out'] : null;
        $formatRooms = Room::checkAvailability($check_in, $check_out);
        return view('roomsList', ['rooms' => $formatRooms, 'check_in' => $check_in, 'check_out' => $check_out]);
    }

    public function home()
    {
        $formatRooms = Room::swiper();
        return view('index', ['rooms' => $formatRooms]);
    }

    public function offers()
    {
        $formatRoomsSwiper = Room::swiper();
        $formatRooms = Room::offers();
        return view('offers', ['rooms' => $formatRooms, 'popularRooms' => $formatRoomsSwiper]);
    }
}
