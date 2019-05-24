<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    protected $table='clients';
    protected $fillable=[
        'user_id',
        'firstname',
        'lastname',
        'mobile',
        'email',
        'idnumber',
        'banknumber',
        'birthday',
        'city_id',
        'address',
        'interes',
        'work_place',
        'family_status',
        'card_id',
        'position_id',
        'agremeent_start',
        'agremeent_end'];

    public function users(){
        $this->belongsTo(User::class, 'user_id','id');
    }

    public function cities(){
        $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function hasintereses(){
        return DB::table('hasintereses')->select('interes_id')->where('client_id',$this->id);
    }

    public function selectedintereses(){
        return DB::table('intereses')->where('id',$this->hasintereses());
    }
}
