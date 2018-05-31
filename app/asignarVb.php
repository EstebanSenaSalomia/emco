<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asignarvb extends Model
{
      protected $table = "asignarvb";

 	  protected $fillable = ['user_id','fecha_reque','prioridad'];


 public function viabilidades()
    {
    	return $this->belongsToMany('App\viabilidad')->withTimestamps();
    }
    

}

