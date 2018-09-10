<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asignarvb;
use App\viabilidad;

class FrontController extends Controller
{
    public function verTerreno($id)
    {
    	$terreno = viabilidad::find($id);
    	
    	return view('front.terreno')->with('terreno'.$terreno);
    }
	
}
