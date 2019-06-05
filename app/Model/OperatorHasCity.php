<?php

namespace App;

use App\Model\City;
use Illuminate\Database\Eloquent\Model;

class OperatorHasCity extends Model
{
    protected $table='operator_has_cities';
    protected $fillable=['user_id','city_id'];

    public function city(){
        return $this->belongsTo(City::class,'user_id','id');
    }
}
