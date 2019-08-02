<?php

namespace App\src\objetivos\objetivo;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    protected $table = "objetivos";
    protected $fillable = ['id_rol','nombre','habilitado'];

     public function Perspectivas()
    {
        return $this->hasMany('App\src\objetivos\perspectiva\Perspectiva');
    }

    public function scopeSearch($query,$buscar)
    {
        return $query->where('nombre','LIKE',"%$buscar%");
    }


}
