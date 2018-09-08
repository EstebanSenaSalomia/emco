<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class viabilidad extends Model
{
    protected $table = "viabilidades";

    protected $fillable = ['numero_vb','numero_pre','numero_ot','nombre','direccion','estado','red','asignacion','fecha_reque','localidad','tipo_trabajo'];


    public function obs_viabilidad(){

        return $this->hasMany('App\obsViabilidad');
    }

    public function asignarvb()
    {
      return $this->belongsToMany('App\asignarvb');
    }
    
     public function orden() 
    {
      return $this->hasOne('App\orden');
    }
     public function scopeSearch($query, $numero_vb)
    {
        return $query->where('numero_vb','LIKE','%'.$numero_vb.'%');
    }
}
