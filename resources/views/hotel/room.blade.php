<x-app-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Rooms</h1>
        <div class="flex flex-wrap -mx-4">
            @foreach ($rooms as $room)
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6" style="{{ $room->availability == 0 ? 'background-color: red;' : '' }}">
                        <h5 class="text-xl font-bold mb-2">{{ $room->name }}</h5>
                        <img src="{{ $room->image_url }}" alt="Room Image" class="w-full h-auto mb-4">
                        <div class="flex justify-between items-center">
                            <p class="text-gray-700 dark:text-gray-400">Price: ${{ $room->price }}</p>
                            <a href="{{ route('rooms.show', $room->id) }}" class="text-blue-500 hover:underline">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
</x-app-layout>
