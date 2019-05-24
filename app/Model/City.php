<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable=['name'];
    protected $table='cities';

    public function clients(){
        return $this->hasMany(Client::class, 'id', 'city_id');
    }
}