<?php

namespace almagest\Http\Controllers;

use Illuminate\Http\Request;
use almagest\User;
use Auth;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $user=Auth::user();
            if(!auth()->check() || !$user->Admin()){
                return view('usuarios.inicio',['users'=>$users]);
            }
            if ($user->Admin()) {
                return view('admin.panelControl',['users'=>$users]);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //return view('admin.edit',['user'=>User::findOrFail($id)]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    protected function activar($id){
        $user = User::find($id);
        if(!$user)
            return redirect("/");
        $user->actived=true;
        $user->save();
            return redirect()->route('admin.panelControl');
    }
    protected function desactivar($id){
        $user = User::find($id);
        if(!$user)
            return redirect("/");
        $user->actived=false;
        $user->save();
            return redirect()->route('admin.panelControl');
    }

    public function editar($id) {
        $user = User::find($id);
        return view('admin.editar', ['user' => $user]);
    }   
    protected function actualizar(Request $request,$id) {
        $users = User::findOrFail($id);
        $users->firstname = $request->firstname;
        $users->secondname = $request->secondname;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->save();
        return redirect()->route('admin.panelControl');
    }
    public function eliminar($id)
    {
        $user = User::find($id);
        if(!$user)
            return redirect("/");
        $user->deleted=true;
        $user->save();
        return redirect()->route('admin.panelControl');
    }
}
