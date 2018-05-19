<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class viabilidad extends Model
{
    protected $table = "viabilidades";

    protected $fillable = ['numero','nombre','red','localidad','direccion','user_id'];


    public function obs_viabilidad(){

        return $this->hasMany('App\obsViabilidad');
    }

    //  public function user()
    // {
    //     return $this->belongsToMany('App\User')->withTimestamps();
    // }


     public function orden() {

     	 return $this->hasOne('App\orden');
    }
     public function asignarVb()
    {
        return $this->belongsTo('App\asignarVb');
    }
     public function scopeSearch($query, $numero)
    {
        return $query->where('numero','LIKE','%'.$numero.'%');
    }
}
