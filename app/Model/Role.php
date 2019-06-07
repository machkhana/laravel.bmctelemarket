<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{
    use HasRoles;
    protected $guard_name = 'web';
    protected $table='roles';
    protected $fillable=['name','guard_name'];
}
