<?php

namespace AppApp\src\objetivos\indicador;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $table = "indicadores";
    protected $fillable = ['id_objetivo','nombre'];

     public function Objetivo()
    {
        return $this->hasOne('App\src\objetivos\objetivo\Objetivo');
    }

    public function scopeSearch($query,$buscar)
    {
        return $query->where('nombre','LIKE',"%$buscar%");
    }
}
