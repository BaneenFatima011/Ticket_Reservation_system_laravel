<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class passenger extends Model
{
    use HasFactory;
    protected $table = 'passengers';

    // Specify the primary key for the table
    protected $primaryKey = 'passenger_id';
  
    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'passenger_id', 'name', 'age', 'CNIC', 'phone', 'email','password',
    ];
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'passenger_id', 'passenger_id');
    }
    
}
