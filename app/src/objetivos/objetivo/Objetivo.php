<?php

namespace App\src\objetivos\objetivo;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    protected $table = "objetivos";
    protected $fillable = ['id_rol','nombre','habilitado'];

     public function Indicadores()
    {
        return $this->hasMany('App\src\objetivos\indicador\Indicador','id_objetivo','id');
    }
     public function Metas()
    {
        return $this->hasMany('App\src\objetivos\meta\Meta','id_objetivo','id');
    }
     public function Iniciativas()
    {
        return $this->hasMany('App\src\objetivos\iniciativa\Iniciativa','id_objetivo','id');
    }
     public function Rol()
    {
        return $this->hasOne('App\src\sistema\usuario\rol\Rol','id','id_rol');
    }

    public function scopeSearch($query,$buscar)
    {
        return $query->where('nombre','LIKE',"%$buscar%");
    }


}
