<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
use App\User;
use App\viabilidad;

class AlertController extends Controller
{
    public function index(){

    	// $user = User::orderBy('id','DESC')->get();
    	return view('admin.alertas.index');

    	
    }
}
