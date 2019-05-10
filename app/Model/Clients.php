<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table='clients';
    protected $fillable=['firstname','lastname','mobile','email','idnumber','banknumber','birthday','city_id','address','interes','work_place','family_status','card_id','position_id','agremeent_start','agremeent_end','created_at'];

    public function user(){
        $this->belongsTo(User::class, 'user_id','id');
    }

    public function city(){
        $this->belongsTo(Cities::class, 'city_id', 'id');
    }

}
