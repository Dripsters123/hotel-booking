<?php

use App\Http\Controllers\RoomController;
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

require __DIR__.'/auth.php';
