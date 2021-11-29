<?php

namespace almagest\Http\Controllers;

use Request;
use almagest\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
            return view('admin.articulos',['articles'=>$articles]);
    }
    public function crear()
    {
        return view('admin.crearArticulo');
        
        
    }

    public function aniadirArticulo(){
        $respuestas=array();
        $respuesta=(Request::input('name'));
        $respuestas=(Request::all());
        $articulo=Article::create([
            'name' => $respuestas['name'],
            'description'=> $respuestas['description'],
            'price_min'=> $respuestas['number_min'],
            'price_max'=> $respuestas['number_max'],
            'color_name'=> $respuestas['color_name'],
            'weight'=> $respuestas['weight'],
            'size'=> $respuestas['size'],
            'family_id'=> $respuestas['family_id'],
            'deleted'=> 0
        ]);
        $articles = Article::all();
        return view('admin.articulos',['articles'=>$articles]);
    }

    public function borrar($id)
    {
        Article::destroy($id);
        $articles = Article::all();
        return view('admin.articulos',['articles'=>$articles]);

    }

    public function alertaBorrar($id)     
    {
        return view('admin.alertaBorrar',['id'=>$id]);

    }

    public function actualizar($id)
    {
        return view('admin.actualizar',['id'=>$id]);
    }
}
