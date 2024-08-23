@extends('layout.app')

@section('vehicles')
<style>
    .tooltip {
        position: relative;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 100px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 5px;
        padding: 5px;
        position: absolute;
        z-index: 1;
        bottom: 125%; /* Position above the icon */
        left: 50%;
        margin-left: -50px;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
        opacity: 1;
    }

    .vehicle-img {
        max-width: 200px;
        max-height: 200px;
        border-radius: 8px;
    }

    .table-responsive {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
        color: #333;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .btn-sm {
        margin: 2px;
    }
</style>

<div class="container mt-5">
    <h1 class="text-3xl font-semibold mb-4 text-primary">Vehicles</h1>
    <p class="mb-6">Manage your vehicle listings here.</p>

    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('vehicles.create') }}" class="mt-4 inline-block bg-primary text-white py-2 px-4 rounded">Add Vehicle</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Background Photo</th>
                    <th>Name</th>
                    <th>Number Plate</th>
                    <th>Capacity</th>
                    <th>Driver Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <td>
                            @if($vehicle->background_photo)
                                <img src="{{ asset('storage/' . $vehicle->background_photo) }}" alt="{{ $vehicle->name }}" class="vehicle-img img-thumbnail">
                            @else
                                <img src="{{ asset('images/default_vehicle.jpg') }}" alt="Default Image" class="vehicle-img img-thumbnail">
                            @endif
                        </td>
                        <td>{{ $vehicle->name }}</td>
                        <td>{{ $vehicle->number_plate }}</td>
                        <td>{{ $vehicle->capacity }}</td>
                        <td>{{ $vehicle->driver_phone }}</td>
                        <td class="text-center">
                            <div class="flex item-center justify-center space-x-2">
                                <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" class="text-blue-500 hover:text-blue-700 transform hover:scale-110 tooltip">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="tooltiptext">Edit</span>
                                </a>
                                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="tooltip" onsubmit="return confirm('Are you sure you want to delete this vehicle?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transform hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        <span class="tooltiptext">Delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>


@endsection
