<?php

namespace App\src\objetivos\perspectiva;

use Illuminate\Database\Eloquent\Model;

class perspectiva extends Model
{
    protected $table = "perspectivas";
    protected $fillable = ['id_objetivo','indicador','meta','iniciativa'];

    /**
     * Relación con la tabla foods_roles
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Objetivo()
    {
        return $this->hasOne('App\src\objetivos\objetivo\Objetivo','id','id_objetivo');
    }

    public function scopeSearch($query,$buscar)
    {
        return $query->where('indicador','LIKE',"%$buscar%");
    }    
}
