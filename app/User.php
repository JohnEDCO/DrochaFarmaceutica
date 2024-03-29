<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id_rol','habilitado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * Relación con la tabla foods_roles
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Rol()
    {
        return $this->hasOne('App\src\sistema\usuario\rol\Rol','id','id_rol');
    }
    
    public function scopeSearch($query,$buscar)
    {
        return $query->where('name','LIKE',"%$buscar%");
    }
}
