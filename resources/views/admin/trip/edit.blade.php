@extends('layout.app')

@section('trip')
<div class="content p-6 bg-gray-100">
    <h1 class="text-3xl font-semibold mb-4 text-primary">Edit Trip</h1>
    
    <form action="{{ route('trips.update', $trip->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="route" class="block text-gray-700">Route:</label>
            <input type="text" name="route" id="route" class="w-full border rounded px-3 py-2" value="{{ $trip->route }}">
        </div>

        <div class="mb-4">
            <label for="date" class="block text-gray-700">Date:</label>
            <input type="date" name="date" id="date" class="w-full border rounded px-3 py-2" value="{{ $trip->date }}">
        </div>

        <div class="mb-4">
            <label for="pricing" class="block text-gray-700">Pricing:</label>
            <input type="number" step="0.01" name="pricing" id="pricing" class="w-full border rounded px-3 py-2" value="{{ $trip->pricing }}">
        </div>

        <div class="mb-4">
            <label for="capacity" class="block text-gray-700">Capacity:</label>
            <input type="number" name="capacity" id="capacity" class="w-full border rounded px-3 py-2" value="{{ $trip->capacity }}">
        </div>

        <div class="mb-4">
            <label for="vehicles" class="block text-lg font-medium text-gray-700">Vehicles:</label>
            <select name="vehicles[]" id="vehicles" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-primary" multiple>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}" 
                        @if(is_array($trip->vehicles) && in_array($vehicle->id, $trip->vehicles)) selected @endif>
                        {{ $vehicle->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-gray-600">Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.</small>
        </div>

        <div class="mb-4">
            <label for="pick_up_stations" class="block text-gray-700">Pick up stations:</label>
            <input type="text" name="pickup_stations" id="pickup_stations" class="w-full border rounded px-3 py-2" value="{{ $trip->pickup_stations }}">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description:</label>
            <textarea name="description" id="description" class="w-full border rounded px-3 py-2">{{ $trip->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="background_photo" class="block text-gray-700">Background Photo:</label>
            <input type="file" name="background_photo" id="background_photo" class="w-full border rounded px-3 py-2">
            @if ($trip->background_photo)
                <img src="{{ asset('storage/' . $trip->background_photo) }}" alt="Trip Photo" class="w-20 h-20 object-cover rounded mt-2">
            @endif
        </div>

        <button type="submit" class="bg-primary text-white py-2 px-4 rounded">Update Trip</button>
    </form>
</div>
@endsection
