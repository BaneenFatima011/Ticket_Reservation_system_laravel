<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    

    
    protected $fillable = ['company_name']; // Allow mass assignment for company_name

    // Define the primary key for the table
    protected $primaryKey = 'company_id';

    // Disable timestamps for this model
    public $timestamps = false;

    // Define the relationship with the Transport model
    public function transports()
    {
   
        return $this->hasMany(Transport::class, 'company_id','company_id');
    }
}
