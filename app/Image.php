<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";

    protected $fillable = ['name','viabilidad_id','user_id'];

    public function viabilidad()
    {
        return $this->belongsTo('App\viabilidad');
    }
      public function user()
    {
        return $this->belongsTo('App\User');
    }
}
