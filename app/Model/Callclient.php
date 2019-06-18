<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Callclient extends Model
{
    protected $fillable=['client_id','text','calldate'];
    protected $table='callclients';
    public $timestamps=false;
    public function clients(){
        return $this->belongsTo(Client::class,'client_id','id');
    }
}
