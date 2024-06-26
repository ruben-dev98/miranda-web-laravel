<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Exception;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
                'full_name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'messages' => 'required'
            ]);
            
            Message::create($request->all());
            session()->flash('success', 1);
            session()->flash('message', 1);
            return view('contact');
    }
}
