<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Photo;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::with(['photos', 'amenities'])->get();
        return view('rooms', ['rooms' => $rooms]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('room-details', ['room' => $room]);
    }
}
