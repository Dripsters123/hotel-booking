<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hotel/home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/rooms', [RoomController::class, 'index'])->middleware(['auth', 'verified'])->name('rooms');
Route::get('/rooms/create', [RoomController::class, 'create'])->middleware(['auth', 'verified'])->name('rooms.create');
Route::post('/rooms', [RoomController::class, 'store'])->middleware(['auth', 'verified'])->name('rooms.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->middleware(['auth', 'verified'])->name('rooms.destroy');
Route::get('/rooms/{id}', [RoomController::class, 'show'])->middleware(['auth', 'verified'])->name('rooms.show');


Route::get('/reservation', [ReservationRequestController::class, 'create'])->middleware(['auth', 'verified'])->name('reservation.create');
Route::post('/reservation', [ReservationRequestController::class, 'store'])->middleware(['auth', 'verified'])->name('reservation.store');

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/admin/reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
    Route::post('/admin/reservations/{reservation}/update', [AdminReservationController::class, 'update'])->name('admin.reservations.update');
});

require __DIR__.'/auth.php';
