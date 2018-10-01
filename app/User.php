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
        'name','email','cedula','password','type','telefono','empresa'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
/*
    public function viabilidades(){

        return $this->hasMany('App\viabilidad');
    }
*/
    //  public function viabilidad()
    // {
    //     return $this->belongsToMany('App\viabilidad');
    // }

    public function asignarVb()
    {
        return $this->hasOne('App\asignarVb');
    }
    
    public function comentarios()
    {
        return $this->hasMany('App\comentario');
    }

     public function users()
    {
        return $this->hasMany('App\Image');
    }


    public function scopeSearch($query, $cedula)
    {
        return $query->where('cedula','LIKE','%'.$cedula.'%');
    }

    public function admin()
    {
        return $this->type === 'admin';
    }
    
    public function gestor()
    {
        return $this->type === 'admin' or $this->type === 'gestor';
    }
}
