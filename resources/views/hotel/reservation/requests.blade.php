<x-app-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Reservation Requests</h1>
        
        <!-- Display reservations here -->
        @foreach($reservations as $reservation)
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden mb-4">
                <div class="p-6">
                    <p class="text-gray-700 dark:text-gray-400">Name: {{ $reservation->name }}</p>
                    <p class="text-gray-700 dark:text-gray-400">Email: {{ $reservation->email }}</p>
                    <p class="text-gray-700 dark:text-gray-400">Phone Number: {{ $reservation->phone }}</p>
                    <p class="text-gray-700 dark:text-gray-400">From Date: {{ $reservation->start_date }}</p>
                    <p class="text-gray-700 dark:text-gray-400">To Date: {{ $reservation->end_date }}</p>

                    <!-- Accept and Decline buttons -->
                    <div class="mt-4">
                        <form action="{{ route('admin.reservations.accept', $reservation->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg mr-2">Accept</button>
                        </form>
                        <form action="{{ route('admin.reservations.decline', $reservation->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded-lg">Decline</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endsection
</x-app-layout>
