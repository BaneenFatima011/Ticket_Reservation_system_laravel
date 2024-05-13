<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seat extends Model
{
    
    public $timestamps = false;
    use HasFactory;
    protected $table = 'seats';

    // Specify the primary key for the table
    protected $primaryKey = 'seat_id';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'seat_id', 'bus_id', 'seat_number', 'availability','route_id'
    ];
    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
}
