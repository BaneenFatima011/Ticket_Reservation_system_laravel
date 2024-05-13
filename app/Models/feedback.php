<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    public $timestamps = false;

  
    protected $primaryKey = 'feedback_id';

    
    protected $fillable = [
        'feedback_id', 'passenger_id', 'booking_id', 'rating', 'comments',
    ];
    public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'passenger_id', 'passenger_id');
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'booking_id', 'reservation_id');
    }
    
}
