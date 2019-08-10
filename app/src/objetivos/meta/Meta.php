<?php

namespace App\src\objetivos\meta;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $table = "metas";
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
