<?php

namespace App\src\objetivos\objetivo;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    protected $table = "objetivos";
    protected $fillable = ['id_rol','nombre','habilitado'];

     public function Indicadores()
    {
        return $this->hasMany('App\src\objetivos\indicador\Indicador');
    }
     public function Metas()
    {
        return $this->hasMany('App\src\objetivos\meta\Meta');
    }
     public function Iniciativas()
    {
        return $this->hasMany('App\src\objetivos\iniciativa\Iniciativa');
    }
     public function Rol()
    {
        return $this->hasOne('App\src\sistema\usuario\rol\Rol');
    }

    public function scopeSearch($query,$buscar)
    {
        return $query->where('nombre','LIKE',"%$buscar%");
    }


}
