@if (session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
    

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var successAlert = document.getElementById('success-alert');

            if (successAlert) {
                setTimeout(function() {
                    var bsAlert = new bootstrap.Alert(successAlert);
                    bsAlert.close(); // Programmatically close the alert
                }, 3000); // 3 seconds
            }
        });
    </script>
@endif

@extends('layout.home')

@section('booking-form')
<head>  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
   body {
    background-color: #f4f4f4;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.trip-details {
    background: #ffffff;
    padding: 20px;
    margin: 20px 0;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.main-details {
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    text-align: center;
}

.main-details h2 {
    margin: 0;
    font-size: 2em;
    color: #343a40;
}

.main-details p {
    margin: 10px 0;
    font-size: 1.2em;
    color: #495057;
}

.main-details .price {
    font-size: 1.5em;
    font-weight: bold;
    color: #ffcc33;
}

.trip-info {
    background-color: #f7f7f7;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.trip-info h3 {
    font-size: 1.6em;
    color: #2c3e50;
    margin-bottom: 20px;
    font-weight: bold;
}

.trip-info .row {
    margin-bottom: 20px;
}

.trip-info .row .col-md-5 {
    margin-right: 10px;
}

.trip-info .row .col-md-6 {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.trip-info .row .col-md-6 img {
    margin-right: 10px;
    height: 30px;
}

.trip-info .highlight {
    font-size: 1.1em;
    color: #6c757d;
    font-weight: 600;
}

.pickup-stations {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.pickup-stations div {
    background-color: #e9ecef;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 1em;
    color: #495057;
}

.passenger-details {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.passenger-details h4 {
    font-size: 1.6em;
    color: #2c3e50;
    margin-bottom: 20px;
    font-weight: bold;
}

.form-control {
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ced4da;
    font-size: 1em;
}

.form-control:focus {
    border-color: #ffcc33;
    box-shadow: 0 0 5px rgba(255, 204, 51, 0.5);
}

.btn-custom {
    background-color: #ffcc33;
    color: #fff;
    padding: 10px 20px;
    border-radius: 50px;
    font-size: 1.1em;
    font-weight: 600;
    transition: background-color 0.3s ease;
    border: none;
    width: 100%;
}

.btn-custom:hover {
    background-color: #e0a800;
}

.trip-images {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 20px;
}

.trip-images .col-4 {
    flex: 1 1 calc(33.333% - 20px);
    max-width: calc(33.333% - 20px);
}

.trip-images img {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    height: auto;
    margin-bottom: 5px;
}

.trip-images p {
    text-align: center;
    font-size: 0.9em;
    color: #6c757d;
}

.text-danger {
    font-size: 1em;
    color: #dc3545;
    font-weight: 600;
}
.alert-success {
    background-color: #28a745; /* Green background */
    color: #fff; /* White text */
    border-radius: 8px; /* Rounded corners */
    padding: 15px 20px; /* Padding around content */
    width: 100%; /* Full width */
    position: relative; /* Relative positioning for the close button */
    margin-bottom: 15px; /* Space below the alert */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    font-size: 16px; /* Larger font size for better readability */
}
.payment-method {
    font-family: Arial, sans-serif;
    line-height: 1.6;
}

.payment-method .highlight {
    color: #007bff; /* Blue color for highlight */
}

.payment-method .mpesa-img {
    height: 30px;
    vertical-align: middle; /* Align image with text */
    margin-right: 10px; /* Space between image and text */
}

.payment-method strong {
    color: #333; /* Darker color for strong text */
}

.payment-procedure {
    margin-top: 10px;
    padding-left: 20px; /* Indent list */
    list-style-type: disc; /* Disc bullets */
}

.payment-procedure li {
    margin-bottom: 5px; /* Space between list items */
}
@media only screen and (max-width: 908px) {
    .row {
        flex-direction: column;
    }

    .col-md-8, .col-md-4, .col-sm-12 {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
    }

    .pickup-stations div {
        display: inline-block;
        margin-right: 10px;
    }

    .payment-method img {
        max-width: 100%;
        height: auto;
    }

    .btn-custom {
        width: 100%;
        padding: 10px;
        font-size: 16px;
    }
}

@media only screen and (max-width: 480px) {
    .trip-info h3, .passenger-details h4 {
        font-size: 16px;
    }

    .trip-info p, .passenger-details p {
        font-size: 14px;
    }

    .price {
        font-size: 20px;
    }
}
  </style>
  </head>
  <div class="container">
    <div class="trip-details">
        <div class="main-details text-center">
            <h2>{{ $trip->route }}</h2>
            <p>Departure Date: <strong>{{ \Carbon\Carbon::parse($trip->date)->format('jS F Y') }}</strong></p>
            <p class="price">KSH {{ number_format($trip->pricing) }}</p>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="trip-info">
                    <h3>Trip Information</h3>
                    <div class="row">
                        <div class="col-6">
                            <p><strong class="highlight"><i class="fa-solid fa-road"></i> Route:</strong><br>{{ $trip->route }}</p>
                        </div>
                        <div class="col-6">
                            <p><strong class="highlight"><i class="fa-regular fa-clock"></i> Time:</strong><br>8:00AM</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p><strong class="highlight"><i class="fa-solid fa-location-dot"></i> Pickup Station:</strong></p>
                            <div class="pickup-stations">
                                @foreach($pickupStations as $station)
                                    <div>{{ $station }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="payment-method">
                                <strong class="highlight">
                                    <i class="fa-solid fa-dollar-sign"></i> Payment Method:
                                </strong><br>
                                <img src="../assets/img/mpesa-img.png" alt="MPESA" class="mpesa-img">
                                <br>
                                <strong>Payment Procedure:</strong>
                                <ul class="payment-procedure">
                                    <li>Go to your MPESA menu on your mobile phone.</li>
                                    <li>Select "Lipa na MPESA".</li>
                                    <li>Select "Paybill".</li>
                                    <li>Enter the Business Number: <strong>111222</strong></li>
                                    <li>Enter the Account Number: <strong>Your Name</strong></li>
                                    <li>Enter the trip amount</li>
                                    <li>Enter your MPESA PIN and confirm the transaction.</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    <p><strong class="highlight"><i class="fa-solid fa-calendar-days"></i> Deadline:</strong><br>{{ \Carbon\Carbon::parse($trip->deadline)->format('jS F Y') }}</p>
                    <p><strong class="highlight"><i class="fa-solid fa-bus"></i> Bus Type:</strong> {{ $trip->bus_type }}</p>
                    <div class="trip-name">
                            {{ implode(', ', json_decode($trip->vehicles, true) ?? []) }}
                    </div>

                    <p class="text-danger mt-3"><strong>Note:</strong> Customers at the other pickup locations are reminded to arrive before 7:30 AM, as the last pickup will occur at Archives CBD at exactly 8:00 am.</p>
                </div>
            </div>
            <div class="col-md-4 w-64">
                <div class="passenger-details">
                    <h4>Passenger Details</h4>
                    <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                      <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                      <div class="row">
                          <div class="col-md-6 col-sm-12 form-group">
                              <label for="full_name">Full Name:</label>
                              <input type="text" class="form-control" id="full_name" name="full_name" required>
                          </div>
                          <div class="col-md-6 col-sm-12 form-group">
                              <label for="telephone">Telephone:</label>
                              <input type="tel" class="form-control" id="telephone" name="telephone" required>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 col-sm-12 form-group">
                              <label for="id_number">ID/Passport:</label>
                              <input type="text" class="form-control" id="id_number" name="id_number" required>
                          </div>
                          <div class="col-md-6 col-sm-12 form-group">
                              <label for="nationality">Nationality:</label>
                              <input type="text" class="form-control" id="nationality" name="nationality" required>
                          </div>
                          <div class="col-md-6 col-sm-12 form-group">
                              <label for="payment_code">Payment Code:</label>
                              <input type="text" class="form-control" id="payment_code" name="payment_code" required>
                          </div>
                          <div class="col-md-6 col-sm-12 form-group">
                              <label for="location">Location:</label>
                              <input type="text" class="form-control" id="location" name="location" required>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 col-sm-12 form-group">
                              <label for="gender">Gender:</label>
                              <select class="form-control" id="gender" name="gender" required>
                                  <option value="" disabled selected>Select Gender</option>
                                  <option value="male">Male</option>
                                  <option value="female">Female</option>
                                  <option value="other">Other</option>
                              </select>
                          </div>
                          <div class="col-md-6 col-sm-12 form-group">
                              <label for="pickup_station">Choose Pickup Station:</label>
                              <select class="form-control" id="pickup_station" name="pickup_station" required>
                                  <option value="" disabled selected>Select Pickup Station</option>
                                  @foreach($pickupStations as $station)
                                      <option value="{{ $station }}">{{ $station }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      
                      <button type="submit" class="btn btn-custom btn-block">Book Now</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
