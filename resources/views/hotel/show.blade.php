<!-- resources/views/hotel/show.blade.php -->
<x-app-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">{{ $room->name }}</h1>
        <div class="mx-auto max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <p class="text-gray-700 dark:text-gray-400 mb-4"><span class="font-bold">Description:</span> {{ $room->description }}</p>
                <p class="text-gray-700 dark:text-gray-400 mb-4"><span class="font-bold">Price:</span> ${{ $room->price }}</p>
                <p class="text-gray-700 dark:text-gray-400 mb-4"><span class="font-bold">Availability:</span> {{ $room->availability ? 'Available' : 'Not Available' }}</p>
                <div class="flex justify-between mt-6">
                    <a href="{{ route('rooms.edit', $room->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Room</a>
                    <a href="{{ route('rooms.reserve', $room->id) }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Reserve Room</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
