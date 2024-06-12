<x-app-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-center">My Rooms</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach (session('accepted_rooms', []) as $room)
                @if($room['room'])
                    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                        <div class="p-4">
                            <h5 class="text-lg font-bold mb-2">{{ $room['room']->name }}</h5>
                            <img src="{{ $room['room']->image_url }}" alt="Room Image" class="w-full h-auto mb-2">
                            <p class="text-gray-700 dark:text-gray-400 text-sm">Price: ${{ $room['room']->price }}</p>
                            <p class="text-gray-700 dark:text-gray-400 text-sm">Description: {{ $room['room']->description }}</p>
                            <p class="text-gray-700 dark:text-gray-400 text-sm">Reservation Start Date: {{ $room['start_date'] }}</p>
                            <p class="text-gray-700 dark:text-gray-400 text-sm">Reservation End Date: {{ $room['end_date'] }}</p>
                            
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    @endsection
</x-app-layout>
