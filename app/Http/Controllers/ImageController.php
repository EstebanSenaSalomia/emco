<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Image;
use App\Alert;
use laracasts\flash;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)

    {   
        $reglas = array('image.*' => 'required');//aqui capturamos las reglas de validacion
        $messages = [//personalizacion el mensaje
            'image.*.mimes' => 'Has seleccionado un archivo con extension no valida',//el * captura todos los valores de la matriz
        ];
        $validacion = Validator::make($request->all(),$reglas,$messages);
        if ($validacion->fails())
        {
            return redirect()->route('terreno.index',['id'=>$request->viabilidad_id])
            ->withErrors($validacion);
        }

        $files = $request->file('image');
        $con = 1;

      foreach ($files as $file) {
            $name = 'stc_' . time() .$con++.'.'.$file->getClientOriginalExtension();
            $path =  public_path().'/images/viabilidades/';
            $file->move($path,$name);
            $image = new Image();
            $image->name=$name;
            $image->viabilidad_id = $request->viabilidad_id;
            $image->user_id = \Auth::user()->id;
            $image->save();
        }

        $alert = new Alert();
        $alert->user_id = \Auth::user()->id;
        $alert->viabilidad_id = $request->viabilidad_id;
        $alert->comentario_id = null;
        $alert->save();  
        
        flash('Archivos cargados correctamente')->success()->important();
        return redirect()->route('terreno.index',['id'=>$request->viabilidad_id]);
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
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $image = Image::find($id);
            $image->delete();
        }
         $ruta =  public_path().'/images/viabilidades/'.$image->name;
         \File::delete($ruta); //borrar imagen del Sov

        return response()->json([

            'message' => 'La imagen fue elimanda correctamente'

        ]);
    }
}
