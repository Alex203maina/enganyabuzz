<?php


namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Vehicle; // Make sure you have the Vehicle model
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TripController extends Controller
{
    public function index()
    {
        // Fetch trips with the count of bookings left
        $trips = Trip::withCount('bookings as slots_left')
            ->select('id', 'route', 'background_photo', 'capacity', 'description', 'pricing')
            ->get();
        
        return view('main.trips-show', ['trips' => $trips]);
    }
    

    public function create()
    {
        $vehicles = Vehicle::all(); // Fetch all vehicles
        return view('admin.trip.create', ['vehicles' => $vehicles]);
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'route' => 'required|string|max:255',
            'date' => 'required|date',
            'pricing' => 'required|numeric',
            'capacity' => 'required|integer',
            'vehicles' => 'required|array',
            'vehicles.*' => 'integer|exists:vehicles,id',
            'pickup_stations' => 'required|string|max:255',
            'description' => 'required|string',
            'background_photo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        $photoPath = $request->file('background_photo')->store('photos', 'public');
    
        // Handle the image upload
        if ($request->hasFile('background_photo')) {
            $imagePath = $request->file('background_photo')->store('public/background_photo');
            $validated['background_photo'] = basename($imagePath);
        }
    
        // Retrieve vehicle names based on the selected vehicle IDs
        $vehicleNames = Vehicle::whereIn('id', $validated['vehicles'])->pluck('name')->toArray();
    
        // Store the trip
        $trip = Trip::create([
            'route' => $validated['route'],
            'date' => $validated['date'],
            'pricing' => $validated['pricing'],
            'capacity' => $validated['capacity'],
            'vehicles' => json_encode($vehicleNames), // Store as JSON
            'pickup_stations' => $validated['pickup_stations'],
            'description' => $validated['description'],
            'background_photo' => $photoPath,
        ]);
    
        return redirect()->route('admin.trip.index')->with('success', 'Trip created successfully!');
    }
    
    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        $vehicles = Vehicle::all(); // Fetch all vehicles from the database
    
        return view('admin.trip.edit', compact('trip', 'vehicles'));
    }

    public function update(Request $request, $id)
{
    $trip = Trip::findOrFail($id);
    
    $request->validate([
        'route' => 'required|string|max:255',
        'date' => 'required|date',
        'pricing' => 'required|numeric',
        'capacity' => 'required|integer',
        'vehicles' => 'nullable|array',
        'vehicles.*' => 'integer|exists:vehicles,id',
        'pickup_stations' => 'required|string|max:255',
        'description' => 'required|string',
        'background_photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);
    
    if ($request->hasFile('background_photo')) {
        // Delete the old photo
        if ($trip->background_photo) {
            Storage::disk('public')->delete($trip->background_photo);
        }

        // Store the new photo
        $file = $request->file('background_photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('photos', $filename, 'public');
        $trip->background_photo = $filePath;
    }

    // Retrieve vehicle names based on the selected vehicle IDs
    $vehicleNames = $request->has('vehicles')
        ? Vehicle::whereIn('id', $request->vehicles)->pluck('name')->toArray()
        : json_decode($trip->vehicles, true);

    $trip->update([
        'route' => $request->route,
        'date' => $request->date,
        'pricing' => $request->pricing,
        'capacity' => $request->capacity,
        'pickup_stations' => $request->pickup_stations,
        'description' => $request->description,
        'vehicles' => json_encode($vehicleNames), // Store as JSON
    ]);

    return redirect()->route('admin.trip.index')->with('success', 'Trip updated successfully.');
}

    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();

        return redirect()->route('admin.trip.index')->with('success', 'Trip deleted successfully.');
    }

    public function count()
    {
        $tripCount = Trip::count();
        return view('admin.dashboard-1', ['tripCount' => $tripCount]);
    }
    public function showAll()
    {
        $trips = Trip::all();
        return view('admin.trip.index', ['trips' => $trips]);
    }
    
}
