<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Country extends Model
{
    public $timestamps = false;
    protected $fillable = ['country_name'];
    protected $primaryKey = 'country_id';
    protected $table = 'countries';
    // Define the relationship with the routes
    public function routes()
    {
        return $this->hasMany(routes::class);
    }
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}

