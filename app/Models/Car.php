<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CarModel;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

//    public $timestamps = false;
//
//    protected $dateFormat = 'h:m:s';

    protected $fillable = ['name','founded','description','image_path'];


//    protected $hidden = ['created_at','updated_at'];
//
    protected $visible = ['founded','name','description','image_path'];

    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }

    public function engines(){

        return $this->hasManyThrough(
            Engine::class,
            CarModel::class,
            'car_id',
            'model_id'
        );

    }

    public function productionDate()
    {
        return $this->hasOneThrough(
            CarProductionDate::class,
            CarModel::class,
            'car_id',
            'model_id'
        );
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }


}

