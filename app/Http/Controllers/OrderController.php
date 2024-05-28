<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Order::types();
        $rooms = Room::rooms();
        $orders = Order::orders();
        return view('orders.dashboard', ['orders' => $orders, 'rooms' => $rooms, 'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'integer|required',
            'room_id' => 'integer|required',
            'type' => 'string|required',
            'description' => 'string|required'
        ]);
        Order::create($request->all());
        $types = Order::types();;
        $rooms = Room::rooms();
        $orders = Order::orders();
        return view('orders.dashboard', ['orders' => $orders, 'rooms' => $rooms, 'types' => $types]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.order', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->type = $request->type;
        $order->description = $request->description;
        $order->save();
        $types = Order::types();
        $rooms = Room::rooms();
        $orders = Order::orders();
        return view('orders.dashboard', ['orders' => $orders, 'rooms' => $rooms, 'types' => $types]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        $types = Order::types();
        $rooms = Room::rooms();
        $orders = Order::orders();
        return view('orders.dashboard', ['orders' => $orders, 'rooms' => $rooms, 'types' => $types]);
    }
}
