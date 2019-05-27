<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable=['pos_name'];
    protected $table='positions';

    public function clients(){
        $this->hasOne(Client::class, 'id', 'position_id');
    }
}
