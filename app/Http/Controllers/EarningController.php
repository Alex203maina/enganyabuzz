<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EarningController extends Controller
{
    public function index()
    {
        // Calculate earnings for each trip
        $tripEarnings = DB::table('trips')
                          ->join('bookings', 'trips.id', '=', 'bookings.trip_id')
                          ->select('trips.id', 'trips.route', 'trips.capacity', 'trips.pricing', DB::raw('SUM(bookings.amount_paid) as earnings'))
                          ->groupBy('trips.id', 'trips.route', 'trips.capacity', 'trips.pricing')
                          ->get();

        // Calculate total earnings across all trips
        $totalEarnings = $tripEarnings->sum('earnings');

        // Calculate expected total earnings for each trip
        $tripEarnings = $tripEarnings->map(function ($trip) {
            $trip->expected_earnings = $trip->capacity * $trip->pricing;
            return $trip;
        });

        // Pass the data to the view
        return view('admin.earnings', compact('tripEarnings', 'totalEarnings'));
    }
}
