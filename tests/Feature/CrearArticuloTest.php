<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use almagest\Article;

class CrearArticuloTest extends TestCase
{

    /** @test */
    public function un_articulo_puede_crearse() {
        //Número de registros en la base de datos sumando 1 que vamos a crear
        $num = Article::all()->count()+1;
        
        $this->withoutExceptionHandling();

        $response = $this->post('/aniadirArticulo', [
            'name' => 'teclado',
            'description'=> '101 teclas',
            'price_min'=> 10,
            'price_max'=> 100,
            'color_name'=> 'blanco',
            'weight'=> 0.4,
            'size'=> '30cms',
            'family_id'=> 1,
            'deleted'=> 0
        ]);
    
        // Primero comprobamos que todo ha ido bien
        $response->assertStatus(200);
        // Comprobamos los que hay en la base de datos sumando 1 para saber que se ha insertado)
        $this->assertCount($num, Article::all());
        // Y comprobamos que sea el que acabamos de insertar
        $article = Article::where('name', '=', 'teclado')->first();
        $this->assertEquals($article->name, 'teclado');
        $this->assertEquals($article->description, '101 teclas');
        $this->assertEquals($article->price_min, 10);
        $this->assertEquals($article->price_max, 100);
        $this->assertEquals($article->color_name, 'blanco');
        $this->assertEquals($article->weight, 0.4);
        $this->assertEquals($article->size, '30cms');
        $this->assertEquals($article->family_id, 1);
        $this->assertEquals($article->deleted, '0');
    }

    /** @test */
    public function un_articulo_no_puede_crearse() {
        //Número de registros en la base de datos sumando 1 que vamos a crear
        $num = Article::all()->count()+1;
        
        $this->withoutExceptionHandling();

        $response = $this->post('/aniadirArticulo', [
            'name' => 'teclado',
            'description'=> '101 teclas',
            'price_min'=> 10,
            'price_max'=> 100,
            'color_name'=> 'blanco',
            'weight'=> 0.4,
            'size'=> '30cms',
            //quitamos el id de la familia
            'deleted'=> 0
        ]);
    
        // Primero comprobamos que todo ha ido bien
        $response->assertStatus(200);
        // Comprobamos los que hay en la base de datos sumando 1 para saber que se ha insertado)
        $this->assertCount($num, Article::all());
        // Y comprobamos que sea el que acabamos de insertar
        $article = Article::where('name', '=', 'teclado')->first();
        $this->assertEquals($article->name, 'teclado');
        $this->assertEquals($article->description, '101 teclas');
        $this->assertEquals($article->price_min, 10);
        $this->assertEquals($article->price_max, 100);
        $this->assertEquals($article->color_name, 'blanco');
        $this->assertEquals($article->weight, 0.4);
        $this->assertEquals($article->size, '30cms');
        //quitamos el id de la familia
        $this->assertEquals($article->deleted, '0');
    }


    
    
}
