<?php

namespace App\Model;

use App\OperatorHasCity;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable=['name'];
    protected $table='cities';

    public function clients(){
        return $this->belongsTo(Client::class, 'id', 'city_id');
    }
    public function operators(){
        return $this->belongsTo(OperatorHasCity::class,'id','city_id');
    }
}
