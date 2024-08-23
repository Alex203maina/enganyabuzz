<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Trip;
use PDF;
use App\Services\SmsService;

class BookingsController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all trips
        $trips = Trip::all(); 
    
        // Fetch bookings with optional filter by trip ID
        $bookings = Booking::with('trip')
            ->when($request->trip, function ($query, $tripId) {
                return $query->where('trip_id', $tripId);
            })
            ->get();
    
        // Calculate balance for each booking
        foreach ($bookings as $booking) {
            // Ensure the trip relationship is loaded
            if ($booking->trip) {
                $tripPricing = $booking->trip->pricing; // Get trip pricing
                $booking->balance = $tripPricing - $booking->amount_paid; // Calculate balance
            } else {
                $booking->balance = null; // Handle case where trip is not found
            }
        }
    
        return view('admin.bookings', compact('bookings', 'trips'));
    }
     
 
    public function download(Request $request)
    {
        $tripId = $request->input('trip_id');
        
        // Get all bookings for the trip
        $bookings = Booking::with('trip')
            ->when($tripId, function ($query) use ($tripId) {
                $query->where('trip_id', $tripId);
            })
            ->get();
        
        // Get the trip details
        $trip = Trip::find($tripId);
        
        // Calculate the balance for each booking
        foreach ($bookings as $booking) {
            $booking->balance = $trip->pricing - $booking->amount_paid;
        }
        
        // Generate the PDF
        $pdf = PDF::loadView('admin.pdf', compact('bookings', 'trip'));
        return $pdf->download('admin.pdf');
    }
    



    public function create()
    {
        $bookings = Booking::all(); // Fetch all vehicles
        return view('main.create', ['bookings' => $bookings]);
    }

    public function store(Request $request)
{
    $request->validate([
        'trip_id' => 'required|exists:trips,id',
        'full_name' => 'required|string|max:255',
        'telephone' => 'required|string|max:20',
        'id_number' => 'required|string|max:20',
        'nationality' => 'required|string|max:50',
        'payment_code' => 'required|string|max:50',
        'gender' => 'required|string|max:10',
        'pickup_station' => 'required|string|max:255',
        'location' => 'nullable|string|max:255',

    ]);

    Booking::create($request->all());

    return redirect()->back()->with('success', 'Your booking has been successfully placed! we will send you a sms to confirm you booking');
}
// In your controller or model where you handle booking status updates:
private function updateBookingStatus($booking, $paymentCode, $amountPaid)
{
    $trip = $booking->trip; // Assuming you have a relation to get trip details

    // Initialize status as 'Pending'
    $status = 'Pending';
    $statusType = 'info'; // Default status type

    // Check if payment code matches
    if ($paymentCode == $booking->payment_code) {
        // Check if amount paid matches the trip amount
        if ($amountPaid == $trip->pricing) {
            $status = 'Complete'; // Set status to Complete if both match
            $statusType = 'success'; // Green for complete
            $booking->amount_paid = $amountPaid; // Update the amount paid
        } else {
            $status = 'Incomplete'; // Set status to Incomplete if amount does not match
            $statusType = 'danger'; // Red for incomplete
            $booking->amount_paid = $amountPaid; // Record the amount paid
        }
    } else {
        // Reset amount paid if payment code does not match
        $booking->amount_paid = null;
        $status = 'Payment code mismatch'; // Provide specific mismatch message
        $statusType = 'danger'; // Red for mismatch
    }

    // Update the booking status
    $booking->payment_status = $status;
    $booking->save();

    // Return status message and type
    return [
        'message' => $status === 'Payment code mismatch' ? 'Payment code mismatch' : 'Booking status updated successfully',
        'type' => $statusType
    ];
}

public function showForm($trip_id)
{
    $trip = Trip::findOrFail($trip_id);
    return view('main.booking-form', compact('trip'));
}

public function confirmBooking(Request $request)
{
    // Validate the request
    $request->validate([
        'booking_id' => 'required|exists:bookings,id',
        'payment_code' => 'required|string|max:50',
        'amount' => 'required|numeric',
    ]);

    // Retrieve the booking
    $booking = Booking::findOrFail($request->input('booking_id'));

    // Update the booking status and get the message and type
    $result = $this->updateBookingStatus($booking, $request->input('payment_code'), $request->input('amount'));

    return redirect()->back()->with('status', $result['message'])->with('status_type', $result['type']);
}
public function showBookingForm($id)
{
    // Retrieve the selected trip details along with vehicles
    $trip = Trip::with('vehicles')->findOrFail($id);

    // Retrieve the pickup stations for the selected trip
    $pickupStations = explode(',', $trip->pickup_stations);

    return view('main.booking-form', compact('trip', 'pickupStations'));
}
public function sendBulkSms(Request $request)
{
    // Fetch all bookings
    $bookings = Booking::all();

    foreach ($bookings as $booking) {
        $trip = $booking->trip;
        $amountPaid = $booking->amount_paid;
        $requiredAmount = $trip->pricing;

        // Determine the message based on payment status
        if ($booking->payment_status === 'Complete') {
            $message = "Dear {$booking->full_name}, your payment for the trip on {$trip->date} is complete. Thank you!";
        } elseif ($booking->payment_status === 'Incomplete') {
            $balance = $requiredAmount - $amountPaid;
            $message = "Dear {$booking->full_name}, you have an outstanding balance of $balance for your trip on {$trip->date}. Please pay by {$trip->date}.";
        } else {
            $message = "Dear {$booking->full_name}, your booking for the trip on {$trip->date} is pending. Please complete your payment of $requiredAmount by {$trip->date}.";
        }

        // Send the SMS
        SmsService::sendSms($booking->phone, $message);
    }

    return redirect()->back()->with('success', 'Bulk SMS sent successfully!');
}
// In your AdminController or relevant controller
public function sendSms(Request $request)
{
    $bookingId = $request->input('booking_id');
    $smsContent = $request->input('sms_content');

    // Fetch booking details using $bookingId
    $booking = Booking::find($bookingId);

    // Send SMS logic here (integration with SMS API)
    // e.g., using Twilio, Nexmo, or any other SMS gateway

    // After sending SMS, redirect back with a success message
    return redirect()->back()->with('status', 'SMS sent successfully!')->with('status_type', 'success');
}
public function filterBookings(Request $request)
{
    $tripId = $request->input('trip');
    
    // Fetch bookings, filter by trip if provided
    $bookings = Booking::with('trip') // Ensure the trip relationship is loaded
        ->when($tripId, function ($query) use ($tripId) {
            return $query->where('trip_id', $tripId);
        })
        ->get();
    
    // Fetch all trips for the view
    $trips = Trip::all();

    // Calculate balance for each booking
    foreach ($bookings as $booking) {
        if ($booking->trip) {
            $tripPricing = $booking->trip->pricing;
            $booking->balance = $tripPricing - $booking->amount_paid;
        } else {
            $booking->balance = null; // Handle missing trip data
        }
    }

    return view('admin.bookings', compact('bookings', 'trips'));
}
}
