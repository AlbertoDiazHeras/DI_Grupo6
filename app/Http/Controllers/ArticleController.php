<?php

namespace almagest\Http\Controllers;

use Illuminate\Http\Request;
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

    public function aniadirArticulo()
    {
        $articulo=Article::create([
            'name' => 'Raul',
            'description'=> 'Raul',
            'price_min'=> 4,
            'price_max'=> 5,
            'color_name'=> 'white',
            'weight'=> 5,
            'size'=> 5,
            'family_id'=> 1,
            'deleted'=> 0
        ]);
        $articles = Article::all();
        return view('admin.articulos',['articles'=>$articles]);
    }

    public function borrar()
    {
        
    }

    public function actualizar()
    {
    
    }
}
