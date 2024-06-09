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
        'image_url' => 'required|url', // Add this line to validate the image URL
    ]);

    Room::create($request->only(['name', 'price', 'description', 'availability', 'image_url'])); // Include image_url in creation

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


}
