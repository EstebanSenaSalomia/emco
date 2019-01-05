<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = "comentarios";

    protected $fillable = ['user_id','viabilidad_id','contenido'];


      public function user()
    {
        return $this->belongsToMany('App\user');
    }

       public function viabilidad()
    {
         return $this->belongsTo('App\viabilidad');
    }
}
