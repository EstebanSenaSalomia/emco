<?php

namespace App\Http\Controllers;

use App\User;
use App\viabilidad;
use App\asignarvb;
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
         $viabilidad = viabilidad::where('estado','0')->orderBy('id','ASC')->pluck('numero','id');
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
         $asignarvb = new asignarvb();
         $asignarvb->user_id = $request->user_id;
         // dd($request->viabilidad_id);
         $asignarvb->save();
         $asignarvb->viabilidades()->sync($request->viabilidad_id);

         foreach ($request->viabilidad_id as $via) {
             $viabilidad = new viabilidad::find($via);
             $viabilidad->estado =1;
             $viabilidad->update(); 
         }
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
