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
use almagest\Order;
use almagest\Invoice;
use almagest\Delivery_notes;
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

    public function pedidos(){
        $pedidos = Order::select('num','issue_date','origin_company_id','target_company_id')->where('target_company_id','=', auth()->user()->company_id)->get();
        return view('usuarios.pedidos',['pedidos'=>$pedidos]);
    }
    public function albaranes(){
        $pedidos = Order::select('id')->where('target_company_id','=', auth()->user()->company_id)->get()->toarray();
        $albaranes = Delivery_notes::select('num','issue_date','order_id')->whereIn('order_id', $pedidos)->get();
        return view('usuarios.albaranes',['albaranes'=>$albaranes,'pedidos'=>$pedidos]);
    }
    public function facturas(){
        $pedidos = Order::select('id')->where('target_company_id','=', auth()->user()->company_id)->get()->toarray();
        $albaranes = Delivery_notes::select('id')->whereIn('order_id', $pedidos)->get();
        $facturas = Invoice::select('num','issue_date','delivery_note_id')->whereIn('delivery_note_id', $albaranes)->get();
        return view('usuarios.facturas',['facturas'=>$facturas]);
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