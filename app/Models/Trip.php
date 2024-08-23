<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $table = 'trips';

    protected $fillable = [
        'route',
        'date',
        'pricing',
        'capacity',
        'vehicles',
        'pickup_stations',
        'description',
        'background_photo',
    ];

    protected $casts = [
        'vehicles' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Define the many-to-many relationship with vehicles
    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'trip_vehicle', 'trip_id', 'vehicle_id');
    }
    
}
