<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class obsViabilidad extends Model
{
    protected $table = "obs_viabilidades";

    protected $fillable = ['numero','contenido','viabilidad_id'];

    public function viabilidad()
    {
        return $this->belongsTo('App\viabilidades');
    }
}
