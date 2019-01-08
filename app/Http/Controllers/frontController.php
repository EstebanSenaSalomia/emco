<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\viabilidad;
use App\User;
use App\Image;
use App\Comentario;
use laracasts\flash;
use App\Alert;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function verTerreno($id)
    {
        
        Carbon::setLocale('es');
        $date = Carbon::today();//solo trae la fecha
        $ultimo = new Carbon("last day of this month");
        // $first = Carbon::create(1995, 10, 6,0,0,0);
      
        //$date = $date->format('l jS \\of F Y h:i:s A');
        $users = User::orderBy('name','ASC')->pluck('name','id');
        $viabilidad = viabilidad::find($id);
        // dd($first,$viabilidad->fecha_reque);
        // dd($viabilidad->fecha_reque->greaterThan($date));
        $viabilidad->each(function($viabilidad){
            $viabilidad->images;
            $viabilidad->user;
        });
        $comentario = Comentario::where('viabilidad_id',$id)->orderBy('id','ASC')->get();
        $comentario->each(function($comentario){
            $comentario->user;
        });
        
    	return view('front.terreno')
        ->with('viabilidades',$viabilidad)
        ->with('comentario',$comentario)
        ->with('users',$users)
        ->with('date',$date)
        ->with('ultimo',$ultimo);
        
    }

    public function storeComentario(Request $request)
    {

        $comentario = new Comentario();
        $comentario->contenido = $request->comentario;
        $comentario->user_id = \Auth::user()->id;
        $comentario->viabilidad_id = $request->viabilidad_id;
        $comentario->save();
        $alert = new Alert();
        $alert->user_id = \Auth::user()->id;
        $alert->viabilidad_id = $request->viabilidad_id;
        $alert->comentario_id = $comentario->id;
        $alert->save();

        flash('Comentario registrado correctamente')->success()->important();
        return redirect()->route('terreno.index',['id'=>$request->viabilidad_id]);
    }

}
