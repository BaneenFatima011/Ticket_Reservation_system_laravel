<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'reservations';

    // Specify the primary key for the table
    protected $primaryKey = 'reservation_id';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'reservation_id', 'passenger_id', 'seat_id', 'bus_id', 'status', 'ROUTE_ID'
    ];
    
   
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'booking_id', 'reservation_id');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class, 'booking_id', 'reservation_id');
    }
    public function seat()
    {
        return $this->belongsTo(Seat::class, 'seat_id', 'seat_id');
    }
    public function transport()
    {
        return $this->belongsTo(Transport::class, 'transport_id', 'bus_id');
    }
    public function route()
    {
        return $this->belongsTo(routes::class, 'route_id', 'route_id');
    }
    public function passenger()
    {
        return $this->belongsTo(passenger::class, 'passenger_id', 'passenger_id');
    }


}

