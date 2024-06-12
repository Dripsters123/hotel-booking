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
            'name' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'availability' => 'required|boolean',
            'image_url' => 'required|url',
        ]);
    
        Room::create($request->only(['name', 'price', 'description', 'availability', 'image_url']));
    
        return redirect()->route('rooms')->with('success', 'Room created successfully.');
    }
    
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('rooms')->with('success', 'Room deleted successfully.');
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('hotel.show', compact('room'));
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('hotel.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'availability' => 'required|boolean',
            'image_url' => 'required|url',
        ]);

        $room = Room::findOrFail($id);
        $room->update($request->only(['name', 'price', 'description', 'availability', 'image_url']));

        return redirect()->route('rooms')->with('success', 'Room updated successfully.');
    }

    public function reserve($id)
    {
        $room = Room::findOrFail($id);
        return view('hotel.reservation.reservation', compact('room'));
    }
}
