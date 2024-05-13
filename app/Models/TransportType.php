<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportType extends Model
{
    use HasFactory;
    protected $table = 'transport_types'; // Set the table name
    public function transports()
    {
        return $this->hasMany(Transport::class, 'transport_type','transport_id');
    }

    protected $fillable = ['transport_name']; // Specify the fillable fields
}
