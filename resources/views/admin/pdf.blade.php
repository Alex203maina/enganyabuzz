<!DOCTYPE html>
<html>
<head>
    <title>Bookings</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; margin: 0; padding: 0; }
        .container { width: 100%; padding: 20px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header img { width: 100px; }
        .header h1, .header h2 { margin: 0; }
        .header .date-time { font-size: 0.9em; color: #555; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f7f7f7; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #ddd; }
        .table-header { background-color: #333; color: #fff;color:blue; }
        .number-column { width: 30px;  }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Enganya</h1>
            <h2>Bookings Report</h2>
        </div>

        <h2>Bookings for {{ $trip ? $trip->route : 'All Trips' }}</h2>
        <h2>Taking place on {{ $trip ? $trip->date :'all dates'}}</h2>
        <table>
            <thead>
                <tr class="table-header">
                    <th class="number-column">#</th>
                    <th>Trip Name</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>balance</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $index => $booking)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $booking->trip->route }}</td>
                    <td>{{ $booking->full_name }}</td>
                    <td>{{ $booking->telephone }}</td>
                    <td>{{ $booking->location }}</td>
                    <td>{{ $booking->balance }}</td>
                    <td>
            <span style="
                color: 
                @if ($booking->payment_status === 'Pending')
                    blue
                @elseif ($booking->payment_status === 'Incomplete')
                    red
                @elseif ($booking->payment_status === 'Complete')
                    green
                @else
                    black
                @endif
            ">
                {{ $booking->payment_status }}
            </span>
        </td>                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="date-time">Generated on: {{ date('Y-m-d H:i:s') }}</div>

</body>
</html>
