<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password','type','telefono'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ordenes(){

        return $this->hasMany('App\orden');
    }

    public function viabilidades(){

        return $this->hasMany('App\viabilidad');
    }
    public function scopeSearch($query, $name)
    {

        return $query->where('name','LIKE','%'.$name.'%');
    }
}
