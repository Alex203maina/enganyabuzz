<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $totalBookings = DB::table('bookings')->count();
        $totalTrips = DB::table('trips')->count();
        $totalVehicles = DB::table('vehicles')->count();
        $totalEarnings = DB::table('bookings')->sum('amount_paid');

        return view('admin.dashboard-1', compact('totalBookings', 'totalTrips', 'totalVehicles', 'totalEarnings'));
    }

    public function showDashboard()
    {
        return view('admin.dashboard-1');
    }
}
