<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
use App\User;
use App\viabilidad;
use App\Alert;

class AlertController extends Controller
{
    public function index(Request $request){

    	$alert = Alert::search($request->buscar)->orderBy('id','DESC')->get();
    	return view('admin.alertas.index')->with('alerts',$alert);

    }

    public function destroy($id){

    	$alert = Alert::find($id);
    	$alert->delete();

    	flash('Avance eliminado')->success()->important();
        return redirect()->route('admin.alert');
    }

}
