<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    // Disable timestamps for this model
    public $timestamps = false;
    
    // Define the relationship with the Routes model
    public function routes()
    {
        return $this->hasMany(Routes::class, 'bus_id', 'bus_id');
    }

    // Define the relationship with the TransportType model
    public function transportType()
    {
        return $this->belongsTo(TransportType::class, 'transport_type','transport_id');
    }
    public function company()
{
    return $this->belongsTo(Company::class, 'company_id','company_id');
}
public function seats()
{
    return $this->hasMany(Seat::class, 'bus_id');
}



    // Specify the table name
    protected $table = 'transports';

    // Specify the primary key for the table
    protected $primaryKey = 'bus_id';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
         'capacity', 'model', 'transport_type','company_id',
    ];
}
