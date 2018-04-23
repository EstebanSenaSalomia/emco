<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orden extends Model
{
    protected $table = "ordenes";

    protected $fillable = ['nombre','direccion','red'];


     public function viabilidad()
    {
        return $this->hasOne('App\viabilidad');
    }
}
