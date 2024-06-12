<!-- resources/views/hotel/edit.blade.php -->
<x-app-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Edit Room</h1>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mx-auto max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden p-6">
            <form action="{{ route('rooms.update', $room->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-400">Name:</label>
                    <input type="number" name="name" id="name" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-gray-300" value="{{ old('name', $room->name) }}" required min="0">
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 dark:text-gray-400">Price:</label>
                    <input type="number" name="price" id="price" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-gray-300" value="{{ old('price', $room->price) }}" required min="0">
                </div>
                <div class="mb-4">
                    <label for="image_url" class="block text-gray-700 dark:text-gray-400">Image URL:</label>
                    <input type="url" name="image_url" id="image_url" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-gray-300" value="{{ old('image_url', $room->image_url) }}" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 dark:text-gray-400">Description:</label>
                    <textarea name="description" id="description" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-gray-300" required>{{ old('description', $room->description) }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="availability" class="block text-gray-700 dark:text-gray-400">Availability:</label>
                    <select name="availability" id="availability" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-gray-300" required>
                        <option value="1" {{ $room->availability ? 'selected' : '' }}>Available</option>
                        <option value="0" {{ !$room->availability ? 'selected' : '' }}>Not Available</option>
                    </select>
                </div>
               
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update Room
                </button>
            </form>
        </div>
    </div>
    @endsection
</x-app-layout>
