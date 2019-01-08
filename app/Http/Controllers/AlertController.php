<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
use App\User;
use App\viabilidad;
use App\Alert;

class AlertController extends Controller
{
    public function index(){

    	$alert = Alert::orderBy('id','ASC')->paginate(10);
    	return view('admin.alertas.index')->with('alerts',$alert);

    }

    public function destroy($id){

    	$alert = Alert::find($id);
    	$alert->delete();

    	flash('Avance eliminado')->success()->important();
        return redirect()->route('admin.alert');
    }

}
