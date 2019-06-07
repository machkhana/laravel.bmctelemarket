<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Operatorhascity extends Model
{
    protected $fillable=['user_id','city_id'];
    protected $table='operatorhascities';
    public function cities(){
        return $this->belongsTo(City::class,'city_id', 'id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}