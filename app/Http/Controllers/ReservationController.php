<?php

namespace App\Http\Controllers;
use App\Http\Controllers\RoomController;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'room_id' => 'required|exists:rooms,id',
        ]);

        $reservation = new Reservation();
        $reservation->fill($request->all()); // Using fill() method to mass assign attributes
        $reservation->status = 'pending'; // Set default status
        $reservation->save();

        return redirect()->route('rooms.show', $request->room_id)->with('success', 'Reservation made successfully!');
    }

    public function index()
    {
        $reservations = Reservation::all();
        return view('hotel.reservation.requests', compact('reservations'));
    }

public function accept(Request $request, $id)
{
    $reservation = Reservation::findOrFail($id);
    $reservation->status = 'accepted';
    $reservation->save();

    // Get the room associated with the reservation
    $room = Room::find($reservation->room_id);

    // Check if the room exists
    if ($room) {
        // Update the room availability to false (0)
        $room->availability = 0; // 0 means not available
        $room->save();

        // Add the accepted room and reservation dates to the session
        $acceptedRooms = session('accepted_rooms', []);
        $acceptedRooms[] = ['room' => $room, 'start_date' => $reservation->start_date, 'end_date' => $reservation->end_date];
        session(['accepted_rooms' => $acceptedRooms]);
    }

    // Delete the reservation
    $reservation->delete();

    return redirect()->back()->with('success', 'Reservation accepted successfully!');
}




public function decline(Request $request, $id)
{
    $reservation = Reservation::findOrFail($id);
    $reservation->status = 'declined';
    $reservation->save();

    // Delete the reservation
    $reservation->delete();

    return redirect()->back()->with('success', 'Reservation declined successfully!');
}
}
