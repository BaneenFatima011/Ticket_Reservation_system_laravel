<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class credential extends Model
{
    use HasFactory;
    protected $table = 'credentials';

    // Disable auto-incrementing for the primary key
    public $incrementing = false;

    // Specify the primary key for the table
    protected $primaryKey = 'id';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'id', 'name', 'password', 'role',
    ];
}
