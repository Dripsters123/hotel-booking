<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hotel/home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/rooms', [RoomController::class, 'index'])->middleware(['auth', 'verified'])->name('rooms');
Route::get('/rooms/create', [RoomController::class, 'create'])->middleware(['auth', 'verified'])->name('rooms.create');
Route::post('/rooms', [RoomController::class, 'store'])->middleware(['auth', 'verified'])->name('rooms.store');

Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->middleware(['auth', 'verified'])->name('rooms.edit');
Route::patch('/rooms/{id}', [RoomController::class, 'update'])->middleware(['auth', 'verified'])->name('rooms.update');

Route::get('/rooms/{id}/reserve', [RoomController::class, 'reserve'])->middleware(['auth', 'verified'])->name('rooms.reserve');
Route::post('/reservations', [ReservationController::class, 'store'])->middleware(['auth', 'verified'])->name('reservations.store');
Route::get('/requests', [ReservationController::class, 'index'])->middleware(['auth', 'verified'])->name('requests.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->middleware(['auth', 'verified'])->name('rooms.destroy');
Route::get('/rooms/{id}', [RoomController::class, 'show'])->middleware(['auth', 'verified'])->name('rooms.show');

Route::middleware('auth')->group(function () {
    Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('admin.reservations.index');
    Route::post('/admin/reservations/{id}/accept', [ReservationController::class, 'accept'])->name('admin.reservations.accept');
    Route::post('/admin/reservations/{id}/decline', [ReservationController::class, 'decline'])->name('admin.reservations.decline');
});

require __DIR__.'/auth.php';