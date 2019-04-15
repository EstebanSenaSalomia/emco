<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class viabilidad extends Model
{
    protected $table = "viabilidades";

    protected $fillable = ['numero_vb','numero_pre','numero_ot','nombre','direccion','estado','red','asignacion','fecha_reque','localidad','tipo_trabajo','user_id'];

    protected $dates = [
      'fecha_reque'
    ];

    
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    
     public function images()//nombre de la tabla que se va a relacionar en plural 
    {
        return $this->hasMany('App\image');
    }
    
     public function comentarios()//nombre de la tabla que se va a relacionar en plural 
    {
        return $this->hasMany('App\Comentario');
    }

     public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre','LIKE','%'.$nombre.'%');
    }
}
