<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Clientstatus extends Model
{
    protected $table="clientstatuses";
    protected $fillable=['statusname'];
    public $timestamps=false;
}
