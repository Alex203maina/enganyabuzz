<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Vehicle; // Make sure you have the Vehicle model
use App\Models\Booking;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch trips from the database
        $trips = Trip::all(); // Adjust as needed for your query

        // Pass trips to the view
        return view('main.index', compact('trips'));
    }

    public function about()
    {
        return view('main.about-us');
    }

    public function destination()
    {
        $trips = Trip::all(); // Fetch trips for the destination section
        return view('main.trips-show', compact('trips'));
    }

    public function gallery()
    {
        return view('main.gallery');
    }

    public function contact()
    {
        return view('main.contact');
    }
}

