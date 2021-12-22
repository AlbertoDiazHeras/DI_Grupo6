<?php

namespace almagest\Http\Controllers;

use Request;
use almagest\User;
use almagest\Company;
use almagest\Delivery_term;
use almagest\Transport;
use almagest\Payment_term;
use almagest\Bank_entity;
use almagest\Discount;
use Auth;

class CompanyController extends Controller
{
    public function index()
    {   
        $persona = User::where("iscontact","=",1)->get();
        $persona = (object) $persona[0];
        $persona = ($persona->firstname." ".$persona->secondname);
        $users = User::all();
        $companies = Company::all();
        $userCompany = Auth::user()->company_id;
        $company = Company::find($userCompany);
        $entrega = Delivery_term::all();
        $prices = Transport::all();
        $condiciones = Payment_term::all();
        $entidad = Bank_entity::all();
        $descuento = Discount::all();
        return view('usuarios.empresa',['company'=>$company,'users'=>$users,'entrega'=>$entrega,'prices'=>$prices,'condicion'=>$condiciones,'entidad'=>$entidad,'descuento'=>$descuento,'persona'=>$persona]);
    }

    public function pedidos()
    {   
        return view('usuarios.pedidos');
    }

    public function inicio()
    {   
        return view('usuarios.inicio');
    }

    public function actualizar(){  
        $userCompany = Auth::user()->company_id;
        $respuestas=array();
        $respuestas=(Request::all());
        $company = Company::findOrFail($userCompany);
        $company->id = $respuestas['cod'];
        $company->name = $respuestas['name'];
        $company->address = $respuestas['direccion'];
        $company->city = $respuestas['poblacion'];
        $company->cif = $respuestas['cif'];
        $company->email = $respuestas['email'];
        $company->phone = $respuestas['tlf'];
        /*$company->del_term_id = $respuestas['plazo'];
        $company->transport_id = $respuestas['portes'];
        $company->payment_term_id = $respuestas['condiciones'];
        $company->bank_entity_id = $respuestas['entidad'];
        $company->discount_id = $respuestas['descuento'];*/
        $company->save();   
        return redirect()->route('usuarios.empresa');
    }
}