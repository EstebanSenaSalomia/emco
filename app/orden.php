<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orden extends Model
{
    protected $table = "ordenes";

    protected $fillable = ['nombre','direccion','red'];


    public function observaciones(){

        return $this->hasMany('App\observacion');
    }

       public function user()
    {
        return $this->belongsTo('App\User');
    }
}
