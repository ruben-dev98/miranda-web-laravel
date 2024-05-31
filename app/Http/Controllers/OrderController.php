<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Order::types();
        $rooms = Room::rooms();
        $orders = Order::currentUserOrders();
        return view('orders.dashboard', ['orders' => $orders, 'rooms' => $rooms, 'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'integer|required',
            'type' => 'string|required',
            'description' => 'string|required'
        ]);
        Order::create(['user_id' => Auth::id(), ...$request->all()]);
        session()->flash('success', 1);
        session()->flash('store', 1);
        return Redirect::route('dashboard');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'type' => 'string|required',
            'description' => 'string|required'
        ]);
        $order = Order::findOrFail($request->id);
        $order->type = $request->type;
        $order->description = $request->description;
        $order->save();
        session()->flash('success', 1);
        session()->flash('update', 1);
        return Redirect::route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        session()->flash('success', 1);
        session()->flash('destroy', 1);
        return Redirect::route('dashboard');
    }
}
