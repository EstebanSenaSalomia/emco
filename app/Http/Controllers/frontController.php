<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\viabilidad;
use App\User;
use App\Comentario;
use laracasts\flash;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function verTerreno($id)
    {
        Carbon::setLocale('es');
        $date = Carbon::now();
    	$terreno = viabilidad::find($id);
        $comentario = Comentario::where('viabilidad_id',$id)->orderBy('id','ASC')->paginate(25);
        $comentario->each(function($comentario){
            $comentario->user;
        });
        
    	return view('front.terreno')
        ->with('terreno',$terreno)
        ->with('comentario',$comentario)
        ->with('date',$date);
    }


    public function storeComentario(Request $request)
    {

        $comentario = new Comentario();
        $comentario->contenido = $request->comentario;
        $comentario->user_id = \Auth::user()->id;
        $comentario->viabilidad_id = $request->viabilidad_id;
        $comentario->save();

        flash('Comentario registrado correctamente')->success()->important();
        return redirect()->route('terreno.index',['id'=>$request->viabilidad_id]);
    }

    public function verComentarios()
    {
        // $comentario = Comentario::orderBy('id','DESC');
        // dd($comentario);
        // return view('front.terreno')->with('comentario',$comentario);
    }
	
}
