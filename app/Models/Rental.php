<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'last_name', 'second_last_name', 'rut',
        'email', 'vehicle_id', 'rental_start', 'rental_end'
    ];


    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
