<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
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

    public function viabilidad()
    {
        return $this->belongsToMany('App\viabilidad');
    }
    
    public function comentarios()
    {
        return $this->hasMany('App\comentario');
    }

     public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function scopeSearch($query, $buscar)
    {
        return $query->where('name','LIKE','%'.$buscar.'%')
        ->orWhere('cedula','LIKE','%'.$buscar.'%')
        ->orWhere('type','LIKE','%'.$buscar.'%')
        ->orWhere('empresa','LIKE','%'.$buscar.'%')
        ;
    }

    public function admin()
    {
        return $this->type === 'admin';
    }
    
    public function gestor()
    {
        return $this->type === 'admin' or $this->type === 'gestor';
    }

      /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
