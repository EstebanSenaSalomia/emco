<?php

namespace App\Http\Controllers;

use App\User;
use App\viabilidad;
use App\asignarVb;
use Illuminate\Http\Request;
use Alert;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $viabilidad = viabilidad::orderBy('id','ASC')->pluck('numero','id');
        $user = User::orderBy('name','ASC')->pluck('name','id');
        return view('admin.asignacion.create')
                    ->with('users',$user)
                    ->with('viabilidades',$viabilidad);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $asignarVb = new asignarVb($request->all());
        $asignarVb->
        //$asignarVb->viabilidades($request->viabilidad_id);
        $asignarVb->save();
   
    //     $article = new Article($request->all());
    //     $article->user_id = \Auth::user()->id;
    //     $article->save();

    //     $article->tags()->sync($request->tags);

    //     Alert::success('Articulo Creado exitosamente', 'Felicitaciones')->persistent("cerrar");
    //     return redirect('admin/articles/');
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
