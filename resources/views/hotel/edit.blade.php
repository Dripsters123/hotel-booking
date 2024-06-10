<!-- resources/views/hotel/edit.blade.php -->
<x-app-layout>

@section('content')
<div class="container">
    <h1>Edit Room</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $room->name) }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $room->price) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $room->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="availability">Availability:</label>
            <select class="form-control" id="availability" name="availability" required>
                <option value="1" {{ $room->availability ? 'selected' : '' }}>Available</option>
                <option value="0" {{ !$room->availability ? 'selected' : '' }}>Not Available</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image_url">Image URL:</label>
            <input type="url" class="form-control" id="image_url" name="image_url" value="{{ old('image_url', $room->image_url) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Room</button>
    </form>
</div>
@endsection
</x-app-layout>