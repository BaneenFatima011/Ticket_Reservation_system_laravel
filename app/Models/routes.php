<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class routes extends Model
{
    use HasFactory;
    protected $table = 'routes';
    public $timestamps = false;

    // Specify the primary key for the table
    protected $primaryKey = 'route_id';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'route_id', 'bus_id', 'origin', 'destination', 'distance', 'duration', 'arrival_time', 'departure_time','price'
    ];

    // Disable timestamps for the model
    
    public function transport()
    {
        return $this->belongsTo(Transport::class, 'bus_id', 'bus_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function originCity()
    {
        return $this->belongsTo(City::class, 'origin');
    }

    public function destinationCity()
    {
        return $this->belongsTo(City::class, 'destination');
    }
    public function reservations()
    {
        return $this->belongsTo(Reservation::class,'route_id','route_id');
    }
}
