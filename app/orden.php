<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orden extends Model
{
    protected $table = "ordenes";

    protected $fillable = ['numero','viabilidad_id'];


    public function obs_orden(){

        return $this->hasMany('App\obsOrden');
    }

       public function viabilidad()
    {
        return $this->belongsTo('App\viabilidad');
    }

  
}
