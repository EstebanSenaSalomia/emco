<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Image;
use laracasts\flash;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        // $validator = Validator::make($request->all(), [
        //     'image.*' => 'required|image',
        // ]);

        $files = $request->file('image');
        $con = 1;

      foreach ($files as $file) {
            $name = 'sov_' . time() .$con++.'.'.$file->getClientOriginalExtension();
            $path =  public_path().'/images/viabilidades/';
            $file->move($path,$name);
            $image = new Image();
            $image->name=$name;
            $image->viabilidad_id = $request->viabilidad_id;
            $image->save();
        }  
        
        flash('Imagenes cargadas correctamente')->success()->important();
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

        return response()->json([

            'message' => 'La imagen fue elimanda correctamente'

        ]);
    }
}
