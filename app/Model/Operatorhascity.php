<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Operatorhascity extends Model
{
    protected $fillable=['user_id','city_id'];
    protected $table='operatorhascities';

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
