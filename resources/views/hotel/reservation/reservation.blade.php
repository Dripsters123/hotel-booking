<x-app-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Make a Reservation</h1>
        <form action="{{ route('reservations.store') }}" method="POST" class="w-full max-w-lg mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
            @csrf
            <input type="hidden" name="room_id" value="{{ $room->id }}">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 dark:text-gray-400 font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
                @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            @auth <!-- Check if user is authenticated -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 dark:text-gray-400 font-bold mb-2">Email:</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ auth()->user()->email }}" >
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 dark:text-gray-400 font-bold mb-2">Phone Number:</label>
                    <input type="text" id="phone" name="phone" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ auth()->user()->phone_number }}" >
                </div>
            @endauth

            <div class="mb-4">
                <label for="start_date" class="block text-gray-700 dark:text-gray-400 font-bold mb-2">From Date:</label>
                <input type="date" id="start_date" name="start_date" class="w-full p-2 border border-gray-300 rounded-lg @error('start_date') border-red-500 @enderror" value="{{ old('start_date') }}" required>
                @error('start_date')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="end_date" class="block text-gray-700 dark:text-gray-400 font-bold mb-2">To Date:</label>
                <input type="date" id="end_date" name="end_date" class="w-full p-2 border border-gray-300 rounded-lg @error('end_date') border-red-500 @enderror" value="{{ old('end_date') }}" required>
                @error('end_date')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700">Submit Reservation</button>
            </div>
        </form>
    </div>
    @endsection
</x-app-layout>
