<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $fillable=['name'];
    protected $table='cities';

    public function clients(){
        return $this->belongsTo(Clients::class, 'id', 'city_id');
    }
}
