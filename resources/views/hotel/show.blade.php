<x-app-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">{{ $room->name }}</h1>
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <p class="text-gray-700 dark:text-gray-400 mb-4">Description: {{ $room->description }}</p>
                <p class="text-gray-700 dark:text-gray-400 mb-4">Price: ${{ $room->price }}</p>
                <p class="text-gray-700 dark:text-gray-400 mb-4">Availability: {{ $room->availability ? 'Available' : 'Not Available' }}</p>
                <a href="{{ route('rooms.edit', $room->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Room</a>
                <a href="{{ route('rooms.reserve', $room->id) }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-4">Reserve Room</a>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
