@extends('layout.app')

@section('trip')
<style>
.tooltip {
            position: relative;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%; /* Position above the icon */
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
}
</style>
<div id="services" class="content p-6 bg-gray-100">
    <h1 class="text-3xl font-semibold mb-4 text-primary">Trips</h1>
    <p class="mb-6">Here you can Add, update or remove a trip</p>

    <div class="overflow-x-auto">
        <table class="min-w-full max-w-5xl mx-auto bg-white border rounded-lg">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-4 text-left">Route</th>
                    <th class="py-3 px-4 text-left">Date</th>
                    <th class="py-3 px-4 text-left">Pricing</th>
                    <th class="py-3 px-4 text-left">Capacity</th>
                    <th class="py-3 px-4 text-left">Vehicles</th>
                    <th class="py-3 px-4 text-left">Pick up stations</th>
                    <th class="py-3 px-4 text-left">Description</th>
                    <th class="py-3 px-4 text-left">Background Photo</th>
                    <th class="py-3 px-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($trips as $trip)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-4 text-left">{{ $trip->route }}</td>
                        <td class="py-3 px-4 text-left">{{ $trip->date }}</td>
                        <td class="py-3 px-4 text-left">KSH {{ number_format($trip->pricing, 2) }}</td>
                        <td class="py-3 px-4 text-left">{{ $trip->capacity }}</td>
                        <td class="py-3 px-4 text-left">
                            {{ implode(', ', json_decode($trip->vehicles, true) ?? []) }}
                        </td>
                        <td class="py-3 px-4 text-left">{{ $trip->pickup_stations }}</td>
                        <td class="py-3 px-4 text-left w-45">{{ Str::limit($trip->description, 150) }}</td>
                        <td>
                        @if($trip->background_photo)
                            <img src="{{ asset('storage/' . $trip->background_photo) }}" alt="Background Photo" width="100">
                        @endif
                    </td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex item-center justify-center space-x-2">
                                <a href="{{ route('trips.edit', $trip->id) }}" class="text-blue-500 hover:text-blue-700 transform hover:scale-110">
                                <div class="tooltip">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" onmouseover="showTooltip('update')" onmouseout="hideTooltip()">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="tooltiptext" id="tooltip-update">Update</span>
                        </div>

                            <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this trip?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="tooltip">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" onmouseover="showTooltip('delete')" onmouseout="hideTooltip()">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <span class="tooltiptext" id="tooltip-delete">Delete</span>
                                </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('trips.create') }}" class="mt-4 inline-block bg-primary text-white py-2 px-4 rounded">Add New Trip</a>
</div>
<script>
        function showTooltip(action) {
            document.getElementById(`tooltip-${action}`).style.visibility = 'visible';
            document.getElementById(`tooltip-${action}`).style.opacity = '1';
        }

        function hideTooltip() {
            var tooltips = document.querySelectorAll('.tooltiptext');
            tooltips.forEach(function(tooltip) {
                tooltip.style.visibility = 'hidden';
                tooltip.style.opacity = '0';
            });
        }
</script>
@endsection
