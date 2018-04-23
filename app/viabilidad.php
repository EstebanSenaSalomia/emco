<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class viabilidad extends Model
{
    protected $table = "viabilidad";

    protected $fillable = ['observacion','orden_id'];


      public function orden()
    {
        return $this->belongsTo('App\orden');
    }

    public function observacion(){

        return $this->hasMany('App\observacion');
    }
}
