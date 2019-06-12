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

    public function clients(){
        return $this->belongsTo(Client::class, 'id', 'city_id');
    }
    public function operators(){
        return $this->belongsTo(Operatorhascity::class,'id','city_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'id','city_id');
    }
}
