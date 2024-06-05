<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room; // Assuming your Room model is in the Models directory

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all(); // Fetch all rooms from the database
        return view('hotel.room', compact('rooms'));
    }
}

