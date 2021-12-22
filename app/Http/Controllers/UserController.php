<?php

namespace almagest\Http\Controllers;

use Illuminate\Http\Request;
use almagest\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user=Auth::user();
            if ($user->Admin()) {
                return view('admin.panelControl',['users'=>$users]);
            }
            if(!auth()->check() || !$user->Admin()){
                return view('usuarios.inicio',['users'=>$users]);
            }
    }

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

    protected function empresa($id) {
        $user = User::findOrFail($id);
        $company = Company::findOrFail($user->company_id);
        return view('usuarios.empresa', ['company' => $company]);
    }


}
