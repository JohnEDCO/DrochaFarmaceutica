<?php

namespace App\src\sistema\usuario\rol;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "roles";
    protected $fillable = ['nombre','habilitado'];

     public function User()
    {
        return $this->hasOne('App\User');
    }

    public function scopeSearch($query,$buscar)
    {
        return $query->where('nombre','LIKE',"%$buscar%");
    }
}
