<x-app-layout>
    @section('content')
    <form action="{{ route('rooms.search') }}" method="GET" class="flex justify-end mr-auto mr-20 mt-4" >
    <input type="text" name="search" required class="rounded w-1/4"/>
    <button type="submit">Search</button>
</form>


    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-black text-center">All Rooms</h1>
        <div class="flex flex-wrap -mx-4">
            @foreach ($rooms as $room)
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    
                    <div class="p-6" style="{{ $room->availability == 0 ? 'background-color: #7E191B;' : '' }}">
                        <h5 class="text-xl font-bold mb-2" style="color: {{ $room->availability == 0 ? 'white' : 'green' }};">{{ $room->name }}</h5>
                        <img src="{{ $room->image_url }}" alt="Room Image" class="w-full h-auto mb-4">
                        <div class="flex justify-between items-center">
                            <p class="text-white-700 dark:text-black-400" style="color: {{ $room->availability == 0 ? 'white' : 'green' }};">Price: ${{ $room->price }}</p>
                             <p class="text-white-700 dark:text-black-400" style="color: {{ $room->availability == 0 ? 'white' : 'green' }};">Description:{{ $room->description }}</p>
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
