<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class observacion extends Model
{
    //


       public function orden()
    {
        return $this->belongsTo('App\orden');
    }

       public function viabilidad()
    {
        return $this->belongsTo('App\viabilidad');
    }
}
