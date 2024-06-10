<?php

namespace App\Http\Controllers;

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

        // You may add other logic here if needed.

        return redirect()->back()->with('success', 'Reservation accepted successfully!');
    }

    public function decline(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'declined';
        $reservation->save();

        // You may add other logic here if needed.

        return redirect()->back()->with('success', 'Reservation declined successfully!');
    }
}
