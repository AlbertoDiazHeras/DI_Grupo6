<?php

namespace almagest\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use almagest\User;
use almagest\Company;
use almagest\Product;

class InformesController extends Controller
{
    public function general() {
        $userCompany = Auth::user()->company_id;
        $company = Company::find($userCompany);
        $pdf = \PDF::loadView('usuarios.general',['company' => $company]);
        // Para crear un pdf en el navegador usaremos la siguiente línea
        return $pdf->stream();
        // Para descargar un pdf en un archivo usaremos la siguiente línea
        return $pdf->download('datosCompania.pdf');
    }

    public function general2() {
        $userCompany = Auth::user()->company_id;
        $productos=array();
        $productos = Product::where('company_id','=',$userCompany)->get();
        $pdf = \PDF::loadView('usuarios.general2',['productos' => $productos]);
        // Para crear un pdf en el navegador usaremos la siguiente línea
        return $pdf->stream();
        // Para descargar un pdf en un archivo usaremos la siguiente línea
        return $pdf->download('catalogo.pdf');
    }

}
