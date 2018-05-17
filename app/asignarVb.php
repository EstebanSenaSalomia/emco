<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asignarVb extends Model
{
    protected $table = "viabilidades";

    protected $fillable = ['viabilidad_id','user_id'];
}
