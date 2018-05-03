<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class obsOrden extends Model
{
    protected $table = "obs_ordenes";

    protected $fillable = ['numero','contenido','orden_id'];

    public function orden()
    {
        return $this->belongsTo('App\orden');
    }
}
