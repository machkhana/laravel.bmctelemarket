<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table='clients';
    protected $fillable=['firstname','lastname','mobile','email','idnumber','banknumber','birthday','city_id','address','interes','work_place','family_status','card_id','position_id','agremeent_start','agremeent_end','created_at'];

//    public function getUrlAttribute(){
//        return route('clients.show', $this->id);
//    }

    public function users(){
        $this->belongsTo(User::class, 'user_id','id');
    }

    public function cities(){
        $this->belongsTo(City::class, 'city_id', 'id');
    }
}
