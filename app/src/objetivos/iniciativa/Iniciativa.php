<?php

namespace App\src\objetivos\iniciativa;

use Illuminate\Database\Eloquent\Model;

class Iniciativa extends Model
{
    protected $table = "iniciativas";
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
