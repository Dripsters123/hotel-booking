@php
    if (!Auth::check() || !Auth::user()->isAdmin()) {
        return redirect()->route('rooms')->withErrors(['You do not have permission to access this page.']);
    }
@endphp

<x-app-layout>
    

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Create a Room</h1>
        <div class="mx-auto max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden p-6">
            <form action="{{ route('rooms.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-400">Rooms Number:</label>
                    <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-gray-300">
                </div>
                <div class="mb-4">
    <label for="image_url" class="block text-gray-700 dark:text-gray-400">Image URL:</label>
    <input type="text" name="image_url" id="image_url" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-gray-300">
</div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 dark:text-gray-400">Description:</label>
                    <textarea name="description" id="description" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-gray-300"></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 dark:text-gray-400">Price:</label>
                    <input type="text" name="price" id="price" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-gray-300">
                </div>

                <div class="mb-4">
                    <label for="availability" class="block text-gray-700 dark:text-gray-400">Availability:</label>
                    <select name="availability" id="availability" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-lg dark:bg-gray-900 dark:text-gray-300">
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg w-full">Create Room</button>
                </div>
            </form>
        </div>
    </div>
    @endsection
</x-app-layout>
