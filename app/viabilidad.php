<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class viabilidad extends Model
{
    protected $table = "viabilidades";

    protected $fillable = ['numero','nombre','red','localidad','direccion','user_id','estado'];


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
     public function scopeSearch($query, $numero)
    {
        return $query->where('numero','LIKE','%'.$numero.'%');
    }
}
