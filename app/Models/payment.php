<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    public $timestamps = false;

    // Specify the primary key for the table
    protected $primaryKey = 'payment_id';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'booking_id', 'amount', 'payment_method', 'status',
    ];
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'booking_id', 'reservation_id');
    }
   

}
