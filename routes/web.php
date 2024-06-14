<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', function () {
    return view('hotel/home');
})->middleware(['auth', 'verified'])->name('home');

// Room Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Display a list of rooms
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');

    // Create a new room
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');

    // Edit an existing room
    Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::patch('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');

    // Delete a room
    Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');

    // Show a single room
    Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('rooms.show');

    // Reserve a room
    Route::get('/rooms/{id}/reserve', [RoomController::class, 'reserve'])->name('rooms.reserve');

    // Cancel a room reservation
    Route::post('/rooms/{id}/cancel', [RoomController::class, 'cancel'])->name('rooms.cancel');

    // Add and store images for a room
    Route::get('/rooms/{id}/addImage', [RoomController::class, 'addImage'])->name('rooms.addImage');
    Route::post('/rooms/{id}/storeImage', [RoomController::class, 'storeImage'])->name('rooms.storeImage');

    // Search rooms
    Route::get('/search', [RoomController::class, 'search'])->name('rooms.search');
    Route::get('/searchAcceptedRooms', [ReservationController::class, 'searchAcceptedRoomsByNameAndDescription'])->name('rooms.searchAccepted');

    // Comment Routes for Rooms
    Route::get('/rooms/{room}/comments/create', [CommentController::class, 'create'])->name('comments.create');
    Route::post('/rooms/{room}/comments', [CommentController::class, 'store'])->name('comments.store');
});

// Reservation Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Store a new reservation
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

    // List all reservation requests
    Route::get('/requests', [ReservationController::class, 'index'])->name('requests.index');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    // Edit profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Delete profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes for Reservations
Route::middleware('auth')->group(function () {
    // List all reservations for admin
    Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('admin.reservations.index');

    //Accept and decline routes
    Route::post('/admin/reservations/{id}/accept', [ReservationController::class, 'accept'])->name('admin.reservations.accept');
    Route::post('/admin/reservations/{id}/decline', [ReservationController::class, 'decline'])->name('admin.reservations.decline');
});

require __DIR__.'/auth.php';
