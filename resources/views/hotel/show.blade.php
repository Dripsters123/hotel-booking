<x-app-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">{{ $room->name }}</h1>
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <p class="text-gray-700 dark:text-gray-400 mb-4">Description: {{ $room->description }}</p>
                <p class="text-gray-700 dark:text-gray-400 mb-4">Price: ${{ $room->price }}</p>
                <p class="text-gray-700 dark:text-gray-400 mb-4">Availability: {{ $room->availability ? 'Available' : 'Not Available' }}</p>
              
              
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
