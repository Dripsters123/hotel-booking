<x-app-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Add Image</h1>
        <div class="mx-auto max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <form method="POST" action="{{ route('rooms.storeImage', $room->id) }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="image-url">
                            Image URL
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image-url" type="text" placeholder="Enter image URL" name="url">
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Add Image
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
