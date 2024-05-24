<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Error;
use Exception;
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
            'full_name' => 'required|email|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|number',
            'special_request' => 'string|max:3000',
            'room_id' => 'required|integer'
        ]);

        if(Room::isAvailable($request->room_id, $request->check_in, $request->check_out) !== null) {
            return back()->with('error', 1);
        }
        Booking::create($request->all());
        return view('roomDetails', ['room' => $request->room_id])->with('success', 1)->with('booking', 1);
    }
}
