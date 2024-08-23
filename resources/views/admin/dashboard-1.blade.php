@extends('layout.app')

@section('dashboard')
<div id="dashboard" class="content section">
    <h1 class="text-3xl font-semibold mb-4 text-primary">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="dashboard-card">
            <h3 class="text-lg font-semibold text-primary">Total Bookings</h3>
            <p class="text-2xl font-bold">{{ $totalBookings }}</p>
        </div>
        <div class="dashboard-card">
            <h3 class="text-lg font-semibold text-primary">Trips</h3>
            <p class="text-2xl font-bold">{{ $totalTrips }}</p>
        </div>
        <div class="dashboard-card">
            <h3 class="text-lg font-semibold text-primary">Earnings</h3>
            <p class="text-2xl font-bold">Ksh {{ number_format($totalEarnings, 2) }}</p>
        </div>

        <div class="dashboard-card">
            <h3 class="text-lg font-semibold text-primary">Our Vehicles</h3>
            <p class="text-2xl font-bold">{{ $totalVehicles }}</p>
        </div>
        <div class="dashboard-card">
            <h3 class="text-lg font-semibold text-primary">Upcoming Reservations</h3>
            <p class="text-2xl font-bold"></p>
            <p class="text-sm text-muted-foreground">Reservations for the next week.</p>
        </div>
    </div>
</div>
@endsection
