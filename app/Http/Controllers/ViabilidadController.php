<?php

namespace App\Http\Controllers;

use App\viabilidad;
use Illuminate\Http\Request;
use App\Http\Requests\ViabilidadRequests;
use App\Http\Requests\ViabilidadEditRequests;
use laracasts\flash;
use Carbon\Carbon;

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
    
        $viabilidad = viabilidad::search($request->numero)->orderBy('id','DESC')->paginate(10);
        //dd($viabilidad);
        return view('admin.viabilidad.index')->with('viabilidades',$viabilidad);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.viabilidad.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ViabilidadRequests $request)
    {
        $viabilidad = new viabilidad();//all sirve para traer los datos oragnizados
        $viabilidad->numero = $request->numero;
        $viabilidad->nombre = $request->nombre;
        $viabilidad->direccion = $request->direccion;
        $viabilidad->red = $request->red;
        $viabilidad->fecha_reque = $request->fecha_reque;
        //dd($viabilidad);
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
         $viabilidad = viabilidad::find($id);
         return view('admin.viabilidad.edit')->with('viabilidades',$viabilidad);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $viabilidad = viabilidad::find($id);
        $viabilidad->delete();

        flash('La viabilidad '.'<strong>'.$viabilidad->nombre.'</strong>'." se ha eliminado exitosamente")->info()->important();
         return redirect('admin/viabilidad');
    }
   
}
