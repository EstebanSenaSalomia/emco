<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequests;
use App\Http\Requests\UserEditRequests;
use laracasts\flash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','ASC')->paginate(10);
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequests $request)
    {
    //dd($request->all());
        $user = new User($request->all());//all sirve para traer los datos oragnizados
        $user->password = bcrypt($request->password);
        //dd($user);
        $user->save();
        flash('Felicidades el usuario '.'<strong>'.$user->name.'</strong>'." se ha creado exitosamente")->success()->important();
        return redirect('admin/users/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
         return view('admin.users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequests $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        flash('Felicidades el usuario '.'<strong>'.$user->name.'</strong>'." se ha modificado correctamente")->success()->important();
         return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        flash('El usuario '.'<strong>'.$user->name.'</strong>'." se ha eliminado exitosamente")->info()->important();
         return redirect('admin/users');
    }
}
