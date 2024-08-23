@if (session('status'))
    @php
        $status = session('status_type', 'info'); // Default to 'info'
    @endphp

    <div class="alert alert-{{ $status }} alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<style>
.alert {
    border-radius: 5px;
    padding: 15px;
    width: 100%;
    margin-bottom: 20px;
}

.alert-info {
    background-color: #d9edf7; /* Light blue */
    color: #31708f; /* Dark blue */
}

.alert-danger {
    background-color: #f8d7da; /* Light red */
    color: #721c24; /* Dark red */
}

.alert-success {
    background-color: #d4edda; /* Light green */
    color: #155724; /* Dark green */
}

.alert .btn-close {
    background-color: #ffffff; /* White close button */
    color: #000000; /* Black text */
}


</style>
@extends('layout.app')

@section('bookings')
<div id="bookings" class="content p-6 bg-gray-50 rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold mb-4 text-primary">My Bookings</h1>
    <p class="mb-6 text-gray-600">View and manage your booked services.</p>

    <!-- Filter by Trip -->
    <form action="{{ route('booking.filter') }}" method="POST" class="mb-4">
    @csrf
    <div class="flex items-center">
        <label for="trip" class="mr-2 text-gray-700">Filter by Trip:</label>
        <select name="trip" id="trip" class="border-gray-300 rounded-md">
            <option value="">All Trips</option>
            @foreach ($trips as $trip)
                <option value="{{ $trip->id }}" style="color:black;">
                    {{ $trip->route }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="ml-2 bg-primary text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200">
            Filter
        </button>
    </div>
</form>

    <!-- Download Button -->
    <form method="POST" action="{{ route('bookings.download') }}" class="mb-4">
        @csrf
        <input type="hidden" name="trip_id" value="{{ request('trip') }}">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">
            Download PDF
        </button>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead class="bg-primary text-white border-b border-gray-300">
                <tr>
                    <th class="px-4 py-3 text-left">Trip Name</th>
                    <th class="px-4 py-3 text-left">Customer Name</th>
                    <th class="px-4 py-3 text-left">Phone</th>
                    <th class="px-4 py-3 text-left">Location</th>
                    <th class="px-4 py-3 text-left">payment code</th>
                    <th class="px-4 py-3 text-left">Time</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-2 border-b border-gray-200">Balance</th>

                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach ($bookings as $booking)
<tr>
    <td class="px-4 py-3 text-gray-700">{{ $booking->trip->route }}</td>
    <td class="px-4 py-3 text-gray-700">{{ $booking->full_name }}</td>
    <td class="px-4 py-3 text-gray-700">{{ $booking->telephone }}</td>
    <td class="px-4 py-3 text-gray-700">{{ $booking->location }}</td>
    <td class="px-4 py-3 text-gray-700">{{ $booking->payment_code }}</td>
    <td class="px-4 py-3 text-gray-700">{{ $booking->created_at ? $booking->created_at->format('H:i A') : 'N/A' }}</td>
    <td class="px-4 py-3
        @if($booking->payment_status === 'Complete')
            text-green-500 font-medium
        @elseif($booking->payment_status === 'Incomplete')
            text-red-500 font-medium
        @elseif($booking->payment_status === 'Pending')
            text-blue-500 font-medium
        @else
            text-gray-500 font-medium
        @endif
    ">
    {{ $booking->payment_status }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
        @if (isset($booking->balance))
            {{ number_format($booking->balance, 2) }} <!-- Format as needed -->
        @else
            N/A
        @endif
    </td>
    <td class="px-4 py-3 text-gray-700">
        <button onclick="openConfirmModal({{ $booking->id }})" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">
            Confirm Booking
        </button>
        <button onclick="openSmsModal({{ $booking->id }})" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200">
            Send SMS
        </button>
    </td>
</tr>
@endforeach


            </tbody>
        </table>
    </div>
</div>
<!-- Confirm Booking Modal -->
<div id="confirmModal" class="fixed inset-0 items-center justify-center bg-gray-800 bg-opacity-75 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
        <h2 class="text-xl font-semibold mb-4">Confirm Booking</h2>
        <form id="confirmForm" method="POST" action="{{ route('admin.confirm.booking') }}">
            @csrf
            <input type="hidden" name="booking_id" id="booking_id">
            <div class="mb-4">
                <label for="payment_code" class="block text-gray-700 mb-2">Payment Code:</label>
                <input type="text" name="payment_code" id="payment_code" class="border border-gray-300 rounded-md p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="amount" class="block text-gray-700 mb-2">Amount:</label>
                <input type="number" name="amount" id="amount" class="border border-gray-300 rounded-md p-2 w-full" required>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">Confirm</button>
                <button type="button" onclick="closeConfirmModal()" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-200">Cancel</button>
            </div>
        </form>
    </div>
</div>
<!-- Send SMS Modal -->
<div id="smsModal" class="fixed inset-0 items-center justify-center bg-gray-800 bg-opacity-75 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
        <h2 class="text-xl font-semibold mb-4">Send SMS</h2>
        <form id="smsForm" method="POST" action="{{ route('admin.send.sms') }}">
            @csrf
            <input type="hidden" name="booking_id" id="sms_booking_id">
            <div class="mb-4">
                <label for="sms_content" class="block text-gray-700 mb-2">Message:</label>
                <textarea name="sms_content" id="sms_content" class="border border-gray-300 rounded-md p-2 w-full" required></textarea>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200">Send</button>
                <button type="button" onclick="closeSmsModal()" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-200">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openSmsModal(bookingId) {
    // Assuming there's an input field or modal to enter the SMS content
    document.getElementById('sms_booking_id').value = bookingId;
    document.getElementById('smsModal').classList.remove('hidden');
}

function closeSmsModal() {
    document.getElementById('smsModal').classList.add('hidden');
}

    function openConfirmModal(bookingId) {
        document.getElementById('booking_id').value = bookingId;
        document.getElementById('confirmModal').classList.remove('hidden');
    }

    function closeConfirmModal() {
        document.getElementById('confirmModal').classList.add('hidden');
    }
</script>

    @endsection
