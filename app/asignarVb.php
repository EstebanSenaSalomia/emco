<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asignarVb extends Model
{
    protected $table = "asignacionVb";

    protected $fillable = ['viabilidad_id','user_id'];

    public function users(){

            return $this->hasMany('App\User');
        }
    public function viabilidades(){

        return $this->hasMany('App\viabilidad');
    }   
}
