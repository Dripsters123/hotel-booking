<x-app-layout>
   
    @section('content')
    
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">My Rooms</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach (session('accepted_rooms', []) as $room)
                @if($room['room'])
                    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                        <div class="p-4">
                            <h5 class="text-lg font-bold mb-2">{{ $room['room']->name }}</h5>
                            <img src="{{ $room['room']->image_url }}" alt="Room Image" class="w-full h-auto mb-2">
                            <p class="text-gray-700 dark:text-gray-400 text-lg">Price: ${{ $room['room']->price }}</p>
                            <p class="text-gray-700 dark:text-gray-400 text-lg">Description: {{ $room['room']->description }}</p>
                            <p class="text-gray-700 dark:text-gray-400 text-lg">Reservation Start Date: {{ $room['start_date'] }}</p>
                            <p class="text-gray-700 dark:text-gray-400 text-lg">Reservation End Date: {{ $room['end_date'] }}</p>
                        </div>
                        <div class="flex justify-between items-end p-4">
                            <form action="{{ route('rooms.cancel', $room['room']->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Cancel Reservation
                                </button>
                            </form>
                            <a href="{{ route('rooms.show', $room['room']->id) }}" class="text-blue-500 hover:text-blue-700">More Details</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    @endsection
</x-app-layout>
