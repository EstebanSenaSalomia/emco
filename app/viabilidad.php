<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class viabilidad extends Model
{
    protected $table = "viabilidad";

    protected $fillable = ['observacion','orden_id'];


    public function observacion(){

        return $this->hasMany('App\observacion');
    }

       public function user()
    {
        return $this->belongsTo('App\User');
    }
}
