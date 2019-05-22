<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hasinteres extends Model
{
    protected $table="hasintereses";
    protected $fillable=['interes_id','clients_id'];

}
