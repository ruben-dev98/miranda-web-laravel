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
        $rooms = Room::with(['photos', 'amenities'])->get();
        $formatRooms = formatListRooms($rooms);
        return view('rooms', ['rooms' => $formatRooms]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('room-details', ['room' => $room]);
    }
}
