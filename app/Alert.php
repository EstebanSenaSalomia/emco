<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $table = "alerts";

    protected $fillable = ['user_id','viabilidad_id'];


      public function user()
    {
        return $this->belongsTo('App\user');
    }

       public function viabilidad()
    {
         return $this->belongsTo('App\viabilidad');
    }

       public function comentario()
    {
         return $this->belongsTo('App\Comentario');
    }

      public function scopeSearch($query, $buscar)
    {
      return $query->whereHas('viabilidad' , function ($query)use($buscar) {
          $query->where('nombre', 'like','%'.$buscar.'%');
      });
    }
}
