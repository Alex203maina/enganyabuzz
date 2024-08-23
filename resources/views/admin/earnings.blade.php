@extends('layout.app')

@section('earnings')
<div id="earnings" class="content">
    <h1 class="text-3xl font-semibold mb-6 text-primary">Earnings</h1>
    <p class="mb-4 text-gray-600">View your earnings per trip, the expected earnings, and the total earnings at the bottom.</p>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
            <thead class="bg-gray-100 border-b border-gray-400">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold">Trip ID</th>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold">Route</th>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold">Total Earnings</th>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold">Expected Earnings</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($tripEarnings as $trip)
                <tr>
                    <td class="px-6 py-4 text-gray-700">{{ $trip->id }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $trip->route }}</td>
                    <td class="px-6 py-4 text-gray-700">KSH{{ number_format($trip->earnings, 2) }}</td>
                    <td class="px-6 py-4 text-gray-700">KSH{{ number_format($trip->expected_earnings, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="bg-gray-100 border-t border-gray-400">
                <tr>
                    <td colspan="2" class="px-6 py-3 text-left text-gray-700 font-semibold">Total Earnings</td>
                    <td class="px-6 py-3 text-gray-700 font-semibold">KSH{{ number_format($totalEarnings, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
