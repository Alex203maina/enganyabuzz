<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';

    protected $fillable = [
        'name',
        'number_plate',
        'capacity',
        'driver_phone',
        'background_photo',
    ];

    // Define the many-to-many relationship with trips
    public function trips()
    {
        return $this->belongsToMany(Trip::class, 'trip_vehicle', 'vehicle_id', 'trip_id');
    }
}
