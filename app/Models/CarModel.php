<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class CarModel extends Model
{
    use HasFactory;


    protected $table = 'car_models';

    protected $primaryKey = 'id';

    // A car model belongs a car
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
