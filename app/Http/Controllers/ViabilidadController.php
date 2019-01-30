<?php

namespace App\Http\Controllers;

use App\viabilidad;
use App\User;
use App\Image;
use App\Comentario;
use App\Alert;
use Illuminate\Http\Request;
use App\Http\Requests\ViabilidadRequests;
use App\Http\Requests\UploadRequests;
use App\Http\Requests\ViabilidadEditRequests;
use laracasts\flash;
use Carbon\Carbon;
use Excel;
use Illuminate\Support\Facades\Auth;


class ViabilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        
    }

    public function index(Request $request)
    {
        Carbon::setLocale('es');
        $date = Carbon::today();//solo trae la fecha
        $ultimo = new Carbon("last day of this month");
        $viabilidad = viabilidad::search($request->search)->orderBy('id','DESC')->paginate(70);
        

        //dd($viabilidad);
        //dd(Auth::User()->admin() or Auth::User()->gestor());
        return view('admin.viabilidad.index')
        ->with('viabilidades',$viabilidad)
        ->with('date',$date)
        ->with('ultimo',$ultimo);
        
    }

    public function showindex(Request $request)
    {
        Carbon::setLocale('es');
        $date = Carbon::today();//solo trae la fecha
        $ultimo = new Carbon("last day of this month");
        // $date = Carbon::create(2018,12 ,30, 14, 15, 16); para ejemplos
        // $date->toDateString();
        
        if (Auth::user()->type != 'supervisor') {
              $viabilidad = viabilidad::asignacion($request->user_id)->orderBy('id','DESC')->paginate(50);
        }
        else{
                $viabilidad = viabilidad::whereHas('user' , function ($query) {
                $query->where([
                    ['estado','Activa'],
                    ['user_id',Auth::user()->id]
                ]);
                })->orderBy('id','DESC')->paginate(30);
                //WhereHas permite llamar la tabla a la cual esta relacionada (many to many)
        } 
        $users = User::orderBy('name','ASC')->pluck('name','id');

        return view('admin.asignacion.index')
        ->with('viabilidades',$viabilidad)
        ->with('date',$date)
        ->with('ultimo',$ultimo)
        ->with('users',$users);
        
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
        $viabilidad->save();
        $viabilidad->user()->sync($request->users);
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
         $my_users = $viabilidad->user->pluck('id')->ToArray();
         $users = User::orderBy('name','ASC')->pluck('name','id');
         
         return view('admin.viabilidad.edit')
         ->with('viabilidades',$viabilidad)
         ->with('users',$users)
         ->with('my_users',$my_users);
         
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
        $viabilidad->user()->sync($request->users);
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


    public function eliminar($id)
    {
        $viabilidad = viabilidad::find($id);
        $imagess = Image::where('viabilidad_id',$id)->get();//con get aplicamos elocuent el cual me permite iterar con el foreach
        foreach ($imagess as $image) {
            $ruta =  public_path().'/images/viabilidades/'.$image->name;
            \File::delete($ruta);
        }
        $images = Image::where('viabilidad_id',$id);//volvemos hacer una instancia para poder eliminar la imagen en la base de datos
        $coment = Comentario::where('viabilidad_id',$id);
        $alert = Alert::where('viabilidad_id',$id);

        $alert->delete();
        $coment->delete();
        $images->delete();
        $viabilidad->delete();
        flash('La viabilidad '.'<strong>'.$viabilidad->nombre.'</strong>'." se ha eliminado correctamente")->success()->important();
        return redirect('admin/viabilidad');

    }

    public function exportar(){
        $viabilidad = viabilidad::join('user_viabilidad','user_viabilidad.viabilidad_id', '=','viabilidades.id')
        ->join('users','users.id','=','user_viabilidad.user_id')
        ->select('users.name AS Responsable','numero_vb','numero_pre','numero_ot','nombre','direccion','red','fecha_reque','localidad','tipo_trabajo','estado','contacto','contacto_num')->get();
        return Excel::create('Proyectos',function($excel) use ($viabilidad){
            $excel->sheet('mysheet',function($sheet) use ($viabilidad){
                $sheet->fromArray($viabilidad);
            });
        })->download('xls');
    }

    public function importar(UploadRequests $request){
        $exten = $request->importar->extension();
        
        if($exten="xls"  or $exten="xlsx"){

        if($request->hasFile('importar')){
            
            $path = $request->file('importar')->getRealPath(); 
            $data = Excel::load($path,function($reader){})->get();
           
            if(!empty($data) && $data->count()){ 
                foreach($data as $key => $value){
                    $viabilidad = new viabilidad();
                    $viabilidad->numero_vb = $value->numero_vb;
                    $viabilidad->numero_pre = $value->numero_pre;
                    $viabilidad->numero_ot = $value->numero_ot;
                    $viabilidad->nombre = $value->nombre;
                    $viabilidad->direccion = $value->direccion;
                    $viabilidad->localidad = $value->localidad;
                    $viabilidad->red = $value->red;
                    $viabilidad->fecha_reque = $value->fecha_reque;
                    $viabilidad->tipo_trabajo = $value->tipo_trabajo;
                    $viabilidad->contacto = $value->contacto;
                    $viabilidad->contacto_num = $value->contacto_num;
                    $viabilidad->save();                    
                }
                flash('Los datos se cargaron con exito')->success()->important();
                return redirect('admin/viabilidad');    
            }    
        }
    }else 
        flash('Solo se permiten archivos con extensión xls o xlsx ')->warning()->important();
        return redirect('admin/viabilidad'); 
    }

   
}
