<?php

namespace App\Http\Controllers;

use App\Models\Room;
require_once __DIR__ . '/../../../helpers/format.php';

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $check_in = isset($_GET['check_in']) ? $_GET['check_in'] : null;
        $check_out = isset($_GET['check_out']) ? $_GET['check_out'] : null;
        if($check_in !== null && $check_out !== null) {
            $rooms = Room::with(['photos', 'amenities'])->doesntHave('bookings')->get();
        } else {
            $rooms = Room::with(['photos', 'amenities'])->get();
        }
        
        $formatRooms = formatListRooms($rooms);
        return $check_in !== null ? view('roomsList', ['rooms' => $formatRooms, 'check_in' => $check_in, 'check_out' => $check_out]) : view('rooms', ['rooms' => $formatRooms]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $formatRoom = formatRoom($room);
        $check_in = isset($_GET['check_in']) ? $_GET['check_in'] : null;
        $check_out = isset($_GET['check_out']) ? $_GET['check_out'] : null;
        $rooms = Room::swiper();
        $formatRooms = formatListRooms($rooms);
        return view('roomDetails', ['room' => $formatRoom, 'check_in' => $check_in, 'check_out' => $check_out, 'rooms' => $formatRooms]);
    }
}
