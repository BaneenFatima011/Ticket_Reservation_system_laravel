<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'city_id';
    protected $table = 'cities';
    protected $fillable = ['city_name', 'country_id'];

    // Define the relationship with the country
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id','country_id');
    }
    public function originRoutes()
    {
        return $this->hasMany(Routes::class, 'origin');
    }

    public function destinationRoutes()
    {
        return $this->hasMany(Routes::class, 'destination');
    }
}
