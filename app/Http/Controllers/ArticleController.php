<?php

namespace almagest\Http\Controllers;

use Request;
use almagest\Article;
use almagest\Family;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('deleted','===','0')->get();
            return view('admin.articulos',['articles'=>$articles]);
    }
    public function crear()
    {
        $familias=Family::all();
        return view('admin.crearArticulo',compact('familias'));
    }

    public function aniadirArticulo(){  
        
        $respuestas=array();
        $respuestas=(Request::all());
        //dd(Request::all());
      $checked = (Request::has('peso/tamanio'));
      $tama = (Request::get('name'));
      if($checked=='value1'){
          $peso=Request::get('peso');
          $size=0;
      }

      if($checked=='value2'){
        if($tama=='numero'){
            $size=Request::get('numero');
            $peso=0;
        }
        else if($tama=='valor'){
            $size=Request::get('valor');
            $peso=0;
        }
        else if($tama=='compuesto'){
            $size=Request::get('ancho').Request::get('alto');
            $peso=0;
        }
        else{
            $size=0;
            $peso=0;
        }

      }

//$checkValue = dd(Request::get('peso/tamanio'));
       //$checkValue = dd(Request::get('name'));

        $respuesta=(Request::input('name'));
        $familias=Family::all();
        $articulo=Article::create([
            'name' => $respuestas['nombre'],
            'description'=> $respuestas['description'],
            'price_min'=> $respuestas['number_min'],
            'price_max'=> $respuestas['number_max'],
            'color_name'=> $respuestas['color_name'],
            'weight'=> $peso,
            'size'=> $size,
            'family_id'=> $respuestas['family'],
            'deleted'=> 0
        ]);
        $articulo->save();
        $articles = Article::where('deleted','===','0')->get();
        return view('admin.articulos',compact('articles'));
    }

    public function borrar($id)
    {
        $articulo=Article::find($id);
        $articulo->deleted='1';
        $articulo->save();
        $articles = Article::where('deleted','===','0')->get();
        return view('admin.articulos',compact('articles'));
        

    }

    public function actualizar($id)
    {
        return view('admin.actualizar',['id'=>$id]);
    }

    public function store(Request $request)
{
        $data = request()->validate([
            'name' => '',
            'description' => '',
            'price_min'=>'',
            'price_max'=> '',
            'color_name'=> '',
            'weight'=> '',
            'size'=> '',
            'family_id'=> '',
            'deleted'=> ''
        ]);

        Article::create($data);
}

}
