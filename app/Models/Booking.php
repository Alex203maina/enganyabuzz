<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id', 'full_name', 'telephone', 'id_number', 'nationality', 'payment_code', 'gender', 'pickup_station'
    ];

    // Define relationships
    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
        return $this->belongsTo(Trip::class);
    }
    
}
