<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    // CRUD operations
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
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'availability' => 'required|boolean',
            'image_url' => 'required|url',
        ]);

        $roomData = $request->only(['name', 'price', 'description', 'availability', 'image_url']);
        $roomData['description'] = htmlspecialchars($roomData['description']);

        Room::create($roomData);

        return redirect()->route('rooms')->with('success', 'Room created successfully.');
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
            'name' => 'required|string|min:1|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|regex:/^[a-zA-Z0-9\s]+$/',
            'image_url' => 'required|url',
        ]);

        $room = Room::findOrFail($id);
        $room->update($request->all());

        return redirect()->route('rooms')->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('rooms')->with('success', 'Room deleted successfully.');
    }

    // Reservation operations
    public function reserve($id)
    {
        $room = Room::findOrFail($id);
        return view('hotel.reservation.reservation', compact('room'));
    }

    public function cancel($id)
    {
        $room = Room::findOrFail($id);
        $room->availability = 1; // 1 means available
        $room->save();

        // Remove the room from the session
        $acceptedRooms = session('accepted_rooms', []);
        $acceptedRooms = array_filter($acceptedRooms, function ($room) use ($id) {
            return $room['room']->id != $id;
        });
        session(['accepted_rooms' => $acceptedRooms]);

        return redirect()->back()->with('success', 'Reservation cancelled successfully.');
    }

    // Image operations
    public function addImage($id)
    {
        $room = Room::findOrFail($id);
        return view('hotel.addImage', compact('room'));
    }

    public function storeImage(Request $request, $id)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $room = Room::find($id);

        if ($room) {
            $room->images()->create([
                'url' => $request->url,
            ]);

            return redirect()->route('rooms.show', $room->id);
        } else {
            return redirect()->back()->withErrors(['room' => 'Room not found']);
        }
    }

    // Search operation
    public function search(Request $request)
    {
        $search = $request->get('search');
        $rooms = Room::where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%')
                      ->get();
        return view('hotel.room', compact('rooms'));
    }
}
