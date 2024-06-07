<x-app-layout>
    @extends('layouts.app')

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Rooms</h1>
        <div class="flex flex-wrap -mx-4">
            @foreach ($rooms as $room)
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                    <div class="p-6">
                        <h5 class="text-xl font-bold mb-2">Name: {{ $room->name }}</h5>
                        <p class="text-gray-700 dark:text-gray-400 mb-4">Description: {{ $room->description }}</p>
                        <p class="text-gray-700 dark:text-gray-400 mb-4">Price: ${{ $room->price }}</p>
                        <p class="text-gray-700 dark:text-gray-400 mb-4">Availability: {{ $room->availability ? 'Available' : 'Not Available' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
</x-app-layout>
