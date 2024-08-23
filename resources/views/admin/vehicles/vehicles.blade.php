@extends('layout.app')

@section('vehicles')
<div id="calendar" class="content p-6 bg-gray-50 rounded-lg shadow-lg">
                <h1 class="text-3xl font-semibold mb-4 text-primary">Calendar</h1>
                <p class="mb-6 text-gray-600">View your bookings and manage your schedule.</p>
                <div class="bg-white rounded-lg shadow-md p-4">
                    <div id="calendar"></div>
                </div>
            </div>
@endsection