<?php

namespace App\Http\Controllers;

use App\User;
use App\viabilidad;
use App\asignarvb;
use Illuminate\Http\Request;
use Alert;
use Carbon\Carbon;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $asignarvb = asignarvb::orderBy('id','ASC')->paginate(15);
        $asignarvb->each(function($asignarvb){
            $asignarvb->user;
        });
         // $asignarvb = asignarvb::orderBy('id','DESC')->paginate(5);
        Carbon::setLocale('es');
        $date = Carbon::now();
        // $date = $date->format('l jS \\of F Y h:i:s A');

        return view('admin.asignacion.index')
        ->with('asignarvbs',$asignarvb)
        ->with('carbon',$date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
         $viabilidad = viabilidad::where('asignacion','0')->orderBy('id','ASC')->pluck('numero_vb','id');
         $user = User::where('asignacion','0')->orderBy('name','ASC')->pluck('name','id');
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
         $asignarvb = new asignarvb($request->all());

         
         //-----------------Este codigo sirve para validar si existe un registro-------------//
         // $asignarvb = asignarvb::where('user_id', '=', '$request->user_id');
         // if(count($asignarvb) > 1){
         //      echo "hay datos";
         //      dd(count($asignarvb));
         //     }
         //      else echo "No data"; 
          //-----------------Este codigo sirve para validar si existe un registro-------------//

          $asignarvb->save();
          $asignarvb->viabilidades()->sync($request->viabilidad_id);

         foreach ($request->viabilidad_id as $via) {
             $viabilidad = viabilidad::find($via);
             $viabilidad->asignacion =1;
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
        // $asignarvb = asignarvb::find($id);
        // $asignarvb->viabilidades()->detach();
    }
}
