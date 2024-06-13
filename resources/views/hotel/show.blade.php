<x-app-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8 flex">
        <!-- Comments Container -->
        <div class="w-1/3 pr-4">
            <h2 class="text-2xl font-bold">Comments</h2>
            @foreach($room->comments as $comment)
                <div class="mt-4">
                    <div class="text-gray-600">{{ $comment->body }}</div>
                    <div class="text-sm text-gray-400">Posted by {{ $comment->user->name }} on {{ $comment->created_at->format('M d, Y') }}</div>
                </div>
            @endforeach
            <form action="{{ route('comments.store', $room) }}" method="POST" class="mt-4">
                @csrf
                <textarea name="body" rows="4" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" placeholder="Write a comment..."></textarea>
                <button type="submit" class="mt-2 px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg">Post Comment</button>
            </form>
        </div>
        <!-- Room Details Container -->
        <div class="w-1/3 pl-4 pr-4">
            <h1 class="text-3xl font-bold text-center mb-8">{{ $room->name }}</h1>
            <div class="mx-auto max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <p class="text-gray-700 dark:text-gray-400 mb-4"><span class="font-bold">Description:</span> {{ $room->description }}</p>
                    <p class="text-gray-700 dark:text-gray-400 mb-4"><span class="font-bold">Price:</span> ${{ $room->price }}</p>
                    <p class="text-gray-700 dark:text-gray-400 mb-4"><span class="font-bold">Availability:</span> {{ $room->availability ? 'Available' : 'Not Available' }}</p>
                    <div class="flex justify-between mt-6">
                        <a href="{{ route('rooms.edit', $room->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Room</a>
                        <a href="{{ route('rooms.reserve', $room->id) }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Reserve Room</a>
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('rooms.addImage', $room->id) }}" class="inline-block bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Add Image</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Room Images Container -->
       <div class="w-1/3 pl-4">
            <h1 class="text-xl font-bold text-center">Rooms insides</h1>
            <div class="slideshow-container">
                @foreach($room->images as $index=>$image)
                    <div class="mySlides fade {{ $index == 0 ? 'block' : 'hidden' }}">
                        <img src="{{ $image->url }}" alt="Room image" class="max-w-100 h-auto max-h-64 object-cover">
                    </div>
                @endforeach
            </div>
            <br>
            <div class="flex justify-center space-x-2">
                @foreach($room->images as $index=>$image)
                    <span class="dot cursor-pointer" onclick="currentSlide({{ $index+1 }})"></span>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].classList.add("hidden");  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].classList.remove("bg-blue-500");
    }
    slides[slideIndex-1].classList.remove("hidden");  
    dots[slideIndex-1].classList.add("bg-blue-500");
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}

function currentSlide(n) {
    if (n > slides.length) {n = 1}
    else if (n < 1) {n = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].classList.add("hidden");  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].classList.remove("bg-blue-500");
    }
    slides[n-1].classList.remove("hidden");  
    dots[n-1].classList.add("bg-blue-500");
}
</script>

<style>
.mySlides {
  transition: opacity 2s ease-in-out;
}

.mySlides img {
  height: 300px;
  width: 500px;
  object-fit: cover;
}

.dot {
  @apply h-3 w-3 bg-gray-300 rounded-full cursor-pointer;
}

.dot:hover {
  @apply bg-blue-500;
}

.fade {
  @apply transition-all duration-1000 ease-in-out;
}
</style>
