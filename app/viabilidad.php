<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class viabilidad extends Model
{
    protected $table = "viabilidades";

<<<<<<< HEAD
    protected $fillable = ['numero_vb','numero_pre','numero_ot','nombre','direccion','estado','red','asignacion','fecha_reque','localidad','tipo_trabajo','user_id'];
=======
    protected $fillable = ['numero_vb','numero_pre','numero_ot','nombre','direccion','estado','red','asignacion','fecha_reque','localidad','tipo_trabajo','contacto','contacto_num'];
>>>>>>> 2df378eac9d47a4696da71a1304ebee78a1aa496

    protected $dates = [
      'fecha_reque'
    ];

    
    public function user()
    {
<<<<<<< HEAD
      return $this->belongsTo('App\User');
=======
      return $this->belongsToMany('App\User');
>>>>>>> 2df378eac9d47a4696da71a1304ebee78a1aa496
    }
    
     public function images()//nombre de la tabla que se va a relacionar en plural 
    {
        return $this->hasMany('App\Image');
    }
    
     public function comentarios()//nombre de la tabla que se va a relacionar en plural 
    {
        return $this->hasMany('App\Comentario');
    }

     public function scopeSearch($query, $search)
    {
        return $query->where('nombre','LIKE','%'.$search.'%')
        
        ->orWhere('numero_vb','LIKE','%'.$search.'%')
        ->orWhere('direccion','LIKE','%'.$search.'%')
        ->orWhere('red','LIKE','%'.$search.'%')
        ->orWhere('estado','LIKE','%'.$search.'%')
        ->orWhere('tipo_trabajo','LIKE','%'.$search.'%');
    }

    public function scopeAsignacion($query, $buscar)
    {
        return $query->whereHas('user' , function ($query)use($buscar) {

          $query->where('user_id', '=' ,$buscar);
      });

    }
}
