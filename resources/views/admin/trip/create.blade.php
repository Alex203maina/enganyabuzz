@extends('layout.app')

@section('trip')
<div class="content p-8 bg-gray-50 rounded shadow-md">
    <h1 class="text-4xl font-bold mb-6 text-primary">Add New Trip</h1>
    
    <form action="{{ route('trips.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label for="route" class="block text-lg font-medium text-gray-700">Route:</label>
            <input type="text" name="route" id="route" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-primary" required>
        </div>

        <div class="mb-6">
            <label for="date" class="block text-lg font-medium text-gray-700">Date:</label>
            <input type="date" name="date" id="date" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-primary" required>
        </div>

        <div class="mb-6">
            <label for="pricing" class="block text-lg font-medium text-gray-700">Pricing:</label>
            <input type="number" step="0.01" name="pricing" id="pricing" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-primary" required>
        </div>

        <div class="mb-6">
            <label for="capacity" class="block text-lg font-medium text-gray-700">Capacity:</label>
            <input type="number" name="capacity" id="capacity" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-primary" required>
        </div>
        <div class="mb-6">
            <label for="vehicles" class="block text-lg font-medium text-gray-700">Vehicles:</label>
            <select name="vehicles[]" id="vehicles" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-primary" multiple>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                @endforeach
            </select>
            <small class="text-gray-600">Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.</small>
        </div>


        <div class="mb-6">
            <label for="pickup_stations" class="block text-lg font-medium text-gray-700">Pick up Stations:</label>
            <input type="text" name="pickup_stations" id="pickup_stations" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-primary" required>
        </div>

        <div class="mb-6">
            <label for="description" class="block text-lg font-medium text-gray-700">Description:</label>
            <textarea name="description" id="description" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-primary" required></textarea>
        </div>

        <div class="mb-6">
            <label for="background_photo" class="block text-lg font-medium text-gray-700">Background Photo:</label>
            <input type="file" name="background_photo" id="background_photo" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-primary" accept="image/*">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Add Trip</button>
        </div>
    </form>
</div>
@endsection
