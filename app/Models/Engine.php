<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    use HasFactory;

    protected $table = 'engines';

    protected $primaryKey = 'id';

    protected $fillable = ["model_id","engine_name"];
}
