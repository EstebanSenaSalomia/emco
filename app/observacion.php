<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class observacion extends Model
{
    protected $table = "observaciones";

    protected $fillable = ['observacion'];



       public function orden()
    {
        return $this->belongsTo('App\orden');
    }

       public function viabilidad()
    {
        return $this->belongsTo('App\viabilidad');
    }
}
