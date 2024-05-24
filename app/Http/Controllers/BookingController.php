<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'check_in' => 'required|date|after:date',
            'check_out' => 'required|date|after:check_in',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|integer',
            'special_request' => 'max:3000',
            'room_id' => 'required|integer'
        ]);
        $optionsToView = ['room' => Room::room($request->room_id), 'check_in' => '', 'check_out' => '', 'rooms' => Room::swiper()];
        if(Room::isAvailable($request->room_id, $request->check_in, $request->check_out) !== null) {
            session()->flash('error', 1);
            return view('roomDetails', $optionsToView);
        }
        Booking::create($request->all());
        session()->flash('success', 1);
        session()->flash('booking', 1);
        return view('roomDetails', $optionsToView);
    }
}
