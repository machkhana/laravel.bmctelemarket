<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClientHasFamily extends Model
{
    protected $table='clienthasfamily';
    protected $fillable=['client_id','wife','childrens'];

    public function clients(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
