<x-app-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-wrap -mx-4">
            <!-- Room Details and Comments -->
            <div class="w-full md:w-2/3 px-4 mb-8">
                <!-- Room Details Container -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden mb-4">
                    <div class="p-4 md:p-6">
                        <h1 class="text-3xl font-bold text-center mb-4">{{ $room->name }}</h1>
                        <p class="text-gray-700 dark:text-gray-400 mb-2"><span class="font-bold">Description:</span> {{ $room->description }}</p>
                        <p class="text-gray-700 dark:text-gray-400 mb-2"><span class="font-bold">Price:</span> ${{ $room->price }}</p>
                        <p class="text-gray-700 dark:text-gray-400 mb-2"><span class="font-bold">Availability:</span> {{ $room->availability ? 'Available' : 'Not Available' }}</p>
                        <div class="flex justify-between space-x-2 mt-4">
                            <a href="{{ route('rooms.edit', $room->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 md:px-4 rounded text-sm md:text-base">Edit Room</a>
                            <a href="{{ route('rooms.reserve', $room->id) }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 md:px-4 rounded text-sm md:text-base">Reserve Room</a>
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('rooms.addImage', $room->id) }}" class="inline-block bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-3 md:px-4 rounded text-sm md:text-base">Add Image</a>
                                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 md:px-4 rounded text-sm md:text-base">Delete Room</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Comments Container -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden mb-4">
                    <div class="p-4 md:p-6">
                        <h2 class="text-2xl font-bold">Comments</h2>
                        <div class="mt-4 h-72 overflow-y-scroll">
                            @foreach($room->comments as $comment)
                                <div class="mt-4">
                                    <div class="text-gray-600">{{ $comment->body }}</div>
                                    <div class="text-sm text-gray-400">Posted by {{ $comment->user->name }} on {{ $comment->created_at->format('M d, Y') }}</div>
                                </div>
                            @endforeach
                        </div>
                        <form action="{{ route('comments.store', $room) }}" method="POST" class="mt-4">
                            @csrf
                            <textarea name="body" rows="4" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" placeholder="Write a comment..."></textarea>
                            <button type="submit" class="mt-2 px-3 md:px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg text-sm md:text-base">Post Comment</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Room Images Container -->
            <div class="w-full md:w-1/3 px-4 mb-8">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                    <div class="p-4 md:p-6">
                        <h1 class="text-xl font-bold text-center">Room Images</h1>
                        <div class="slideshow-container mt-4">
                            @foreach($room->images as $index => $image)
                                <div class="mySlides fade {{ $index == 0 ? 'block' : 'hidden' }}">
                                    <img src="{{ $image->url }}" alt="Room image" class="max-w-full h-auto max-h-64 object-cover mx-auto">
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="flex justify-center space-x-2 mt-4">
                            @foreach($room->images as $index => $image)
                                <span class="dot cursor-pointer" onclick="currentSlide({{ $index+1 }})"></span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
<script src="{{ asset('js/slideshow.js') }}"></script>