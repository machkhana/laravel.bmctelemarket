<?php

namespace App\Model;

use App\OperatorHasCity;
use App\User;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable=['name'];
    protected $table='cities';
    public $timestamps = false;

    public function client(){
        return $this->belongsTo(Client::class, 'id', 'city_id');
    }
    public function operatorhascity(){
        return $this->hasMany(Operatorhascity::class,'id','city_id');
    }
}
