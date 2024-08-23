<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehiclesController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $vehicles = Vehicle::all(); // Assuming you have a Vehicle model
        return view('admin.vehicles.create', compact('vehicles'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number_plate' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'driver_phone' => 'required|string|max:255',
            'background_photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('background_photo')) {
            $photoPath = $request->file('background_photo')->store('photos', 'public');
        }

        Vehicle::create([
            'name' => $request->name,
            'number_plate' => $request->number_plate,
            'capacity' => $request->capacity,
            'driver_phone' => $request->driver_phone,
            'background_photo' => $photoPath,
        ]);

        return redirect()->route('admin.vehicles.index')->with('success', 'Vehicle added successfully.');
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number_plate' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'driver_phone' => 'required|string|max:255',
            'background_photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $vehicle = Vehicle::findOrFail($id);

        if ($request->hasFile('background_photo')) {
            if ($vehicle->background_photo) {
                Storage::disk('public')->delete($vehicle->background_photo);
            }

            $photoPath = $request->file('background_photo')->store('photos', 'public');
            $vehicle->background_photo = $photoPath;
        }

        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        if ($vehicle->background_photo) {
            Storage::disk('public')->delete($vehicle->background_photo);
        }
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}
