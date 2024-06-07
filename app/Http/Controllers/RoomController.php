<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('hotel.room', compact('rooms'));
    }

    public function create()
    {
        return view('hotel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string',
            'availability' => 'required|boolean',
        ]);

        Room::create($request->only(['name', 'price', 'description', 'availability']));

        return redirect()->route('rooms')->with('success', 'Room created successfully.');
    }
}
