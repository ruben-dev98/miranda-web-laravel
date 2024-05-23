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
        try {

            $request->validate([
                'check_in' => 'required',
                'check_out' => 'required',
                'full_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'special_request',
                'room_id' => 'required'
            ]);

            if(Room::isAvailable($request->room_id, $request->check_in, $request->check_out) !== null) {
                return back()->with('error', 1);
            }
            $booking = Booking::create($request->all());
            $booking->save();
            return redirect()->route('home')->with('success', 1)->with('booking', 1);
        } catch(Exception $e) {
            return back()->with('error', 1);
        }
    }
}
