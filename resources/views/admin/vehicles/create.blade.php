@extends('layout.app')

@section('vehicles')
<style>
    .form-container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
        display: block;

    }

    .form-control {
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 10px;
        font-size: 1rem;
        transition: border-color 0.2s;
        width: 100%;

    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        transition: background-color 0.2s, transform 0.2s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .btn-primary:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    h1 {
        color: #343a40;
    }
</style>

<div class="container mt-5">
    <div class="form-container">
        <h1 class="mb-4">Add New Vehicle</h1>
        <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Vehicle Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="number_plate">Number Plate</label>
                <input type="text" class="form-control" id="number_plate" name="number_plate" required>
            </div>
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div>
            <div class="form-group">
                <label for="driver_phone">Driver Phone</label>
                <input type="text" class="form-control" id="driver_phone" name="driver_phone" required>
            </div>
            <div class="form-group">
                <label for="background_photo">Background Photo</label>
                <input type="file" class="form-control" id="background_photo" name="background_photo">
            </div>
            <button type="submit" class="btn btn-primary">Add Vehicle</button>
        </form>
    </div>
</div>
@endsection
