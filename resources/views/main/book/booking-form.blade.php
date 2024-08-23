<!-- resources/views/booking-form.blade.php -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
.alert-success {
    background-color: green;
    color: white;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 20px;
    width: 100%;
    height:200px;
}
    </style>
</head>
<body>
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="trip-details">
        <div class="main-details">
            <h3>{{ $trip->route }}</h3>
            <p>Departure Date: <strong>{{ $trip->date }}</strong></p>
            <p class="price">KSH {{ number_format($trip->pricing) }}</p>
        </div>
        <div class="d-flex">
            <div class="trip-info">
                <!-- Trip Information as per your design -->
            </div>
            <div class="passenger-details">
                <h4>Passenger Details</h4>
                <form action="{{ route('main.confirm-booking') }}" method="POST">
                    @csrf
                    <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="full_name">Full Name:</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="telephone">Telephone:</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="id_number">ID/Passport:</label>
                            <input type="text" class="form-control" id="id_number" name="id_number" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="nationality">Nationality:</label>
                            <input type="text" class="form-control" id="nationality" name="nationality" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="payment_code">Pay:</label>
                            <input type="text" class="form-control" id="nationality" name="nationality" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="gender">Gender:</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="pickup_station">Choose Pickup Station:</label>
                            <select class="form-control" id="pickup_station" name="pickup_station" required>
                                <option value="" disabled selected>Select Pickup Station</option>
                                <option value="cbd-archives">CBD - Archives</option>
                                <option value="kahawa-west">Kahawa West</option>
                                <option value="donholm">Donholm</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-custom btn-block">Proceed to Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
