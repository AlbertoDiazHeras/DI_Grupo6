<?php

namespace almagest\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use almagest\User;
use almagest\Company;
use almagest\Product;
use almagest\Article;
use almagest\Delivery_term;
use almagest\Discount;
use almagest\Transport;
use almagest\Payment_term;
use almagest\Bank_entity;

class InformesController extends Controller
{
    public function general() {
        $userCompany = Auth::user()->company_id; 
        $usuarioContacto=User::where('company_id','=',$userCompany)
                            ->where('iscontact','=',1)
                            ->get();
        $usuarioContacto=$usuarioContacto[0]->firstname;
        //dd($usuarioContacto);
        $company = Company::find($userCompany);

        $companyId=$company->toArray();
        $companyId=$company->del_term_id;
        $plazo=Delivery_term::where('id','=',$companyId)->get();
        $plazo=$plazo[0]->description;

        $discountId=$company->toArray();
        $discountId=$company->discount_id;
        $descuento=Discount::where('id','=',$discountId)->get();
        $descuento=$descuento[0]->name;

        $portesId=$company->toArray();
        $portesId=$company->transport_id; 
        $portes=Transport::where('id','=',$portesId)->get();
        $portes=$portes[0]->price;

        $condicionId=$company->toArray();
        $condicionId=$company->payment_term_id; 
        $condicion=Payment_term::where('id','=',$condicionId)->get();
        $condicion=$condicion[0]->description;

        $bancoId=$company->toArray();
        $bancoId=$company->bank_entity_id; 
        $banco=Bank_entity::where('id','=',$bancoId)->get();
        $banco=$banco[0]->ccc;
        
        
        $pdf = \PDF::loadView('usuarios.general',['company' => $company,'usuarioContacto' => $usuarioContacto,'plazo' => $plazo,'descuento' => $descuento,'portes' => $portes,'condicion' => $condicion,'banco' => $banco]);
        // Para crear un pdf en el navegador usaremos la siguiente línea
        return $pdf->stream();
        // Para descargar un pdf en un archivo usaremos la siguiente línea
        return $pdf->download('datosCompania.pdf');
    }

    public function general2() {
        $userCompany = Auth::user()->company_id;
        $productos=array();
        $productos = Product::where('company_id','=',$userCompany)->get();
        $articulos=array();
        $articulos=Article::all();
        $company = Company::findOrFail($userCompany);
        $pdf = \PDF::loadView('usuarios.general2',['productos' => $productos,'articulos' => $articulos,'company' => $company]);
        // Para crear un pdf en el navegador usaremos la siguiente línea
        return $pdf->stream();
        // Para descargar un pdf en un archivo usaremos la siguiente línea
        return $pdf->download('catalogo.pdf');
    }

}
