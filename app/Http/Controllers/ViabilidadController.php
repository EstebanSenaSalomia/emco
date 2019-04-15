<?php

namespace App\Http\Controllers;

use App\viabilidad;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ViabilidadRequests;
use App\Http\Requests\ViabilidadEditRequests;
use laracasts\flash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ViabilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(Request $request)
    {
    
        $viabilidad = viabilidad::search($request->nombre)->orderBy('id','DESC')->paginate(10);
        //dd($viabilidad);
        //dd(Auth::User()->admin() or Auth::User()->gestor());
        return view('admin.viabilidad.index')->with('viabilidades',$viabilidad);
    }

    public function showindex(Request $request)
    {
       
        $viabilidad = viabilidad::search($request->nombre)->orderBy('id','DESC')->paginate(10);
        return view('admin.asignacion.index')->with('viabilidades',$viabilidad);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name','ASC')->pluck('name','id');
        return view('admin.viabilidad.create')
        ->with('user',$users);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ViabilidadRequests $request)
    {
        $viabilidad = new viabilidad($request->all());//all sirve para traer los datos oragnizados
        // $viabilidad->numero = $request->numero;
        // $viabilidad->nombre = $request->nombre;
        // $viabilidad->direccion = $request->direccion;
        // $viabilidad->red = $request->red;
        // $viabilidad->fecha_reque = $request->fecha_reque;
        $viabilidad->save();
        flash('Viabilidad '.'<strong>'.$viabilidad->nombre.'</strong>'." creada correctamente")->success()->important();
        return redirect('admin/viabilidad/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $users = User::orderBy('name','ASC')->pluck('name','id');
         $viabilidad = viabilidad::find($id);
         $viabilidad->user;
         return view('admin.viabilidad.edit')
         ->with('viabilidades',$viabilidad)
         ->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ViabilidadEditRequests $request, $id)
    {
        $viabilidad = viabilidad::find($id);
        $viabilidad->fill($request->all());
        $viabilidad->update();
        flash('La Viabilidad '.'<strong>'.$viabilidad->nombre.'</strong>'." se ha modificado correctamente")->success()->important();
         return redirect('admin/viabilidad');
    }

    public function active($id){

        $viabilidad = viabilidad::find($id);
        $viabilidad->estado='Activa';
        $viabilidad->update();

        flash('La viabilidad '.'<strong>'.$viabilidad->nombre.'</strong>'." se ha reinyectado correctamente")->info()->important();
        return redirect('admin/viabilidad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $viabilidad = viabilidad::find($id);
        $viabilidad->estado = "Terminada";
        $viabilidad->update();

        flash('La viabilidad '.'<strong>'.$viabilidad->nombre.'</strong>'." se ha cerrado correctamente")->info()->important();
         return redirect('admin/viabilidad');
    }
   
}
