<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::swiper();
        $formatRooms = formatListRooms($rooms);
        return view('index', ['rooms' => $formatRooms]);
    }
}
