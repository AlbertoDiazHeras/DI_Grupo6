<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use almagest\User;
use Hash;

class RegistroTest extends TestCase
{
    /** @test */
    public function un_registro_puede_crearse() {
        //Número de registros en la base de datos sumando 1 que vamos a crear
        $num = User::all()->count()+1;
        
        $this->withoutExceptionHandling();

        $response = $this->post('/registrarUsuario', [
            'firstname' => 'Pepe',
            'secondname'=>'Palotes',
            'email' => 'palotes@palotes.com',
            'password' => Hash::make('12345678'),
            'company_id' => 1,
            'iscontact' => '0',
            'deleted' => '0',
            'actived' => '0',
            'email_confirmed' => '0',
            'type' => 'u'
        ]);
    
        // Primero comprobamos que todo ha ido bien
        $response->assertStatus(200);
        // Comprobamos los que hay en la base de datos sumando 1 para saber que se ha insertado)
        $this->assertCount($num, User::all());
        // Y comprobamos que sea el que acabamos de insertar
        $user = User::where('email', '=', 'palotes@palotes.com')->first();
        $this->assertEquals($user->firstname, 'Pepe');
        $this->assertEquals($user->secondname, 'Palotes');
        $this->assertEquals($user->email, 'palotes@palotes.com');
        $this->assertEquals($user->password, $user->password);
        $this->assertEquals($user->actived, '0');
        $this->assertEquals($user->email_confirmed, '0');
        $this->assertEquals($user->type, 'u');

    }

    /** @test */
    public function un_registro_no_puede_crearse() {
        //Número de registros en la base de datos sumando 1 que vamos a crear
        $num = User::all()->count()+1;
        
        $this->withoutExceptionHandling();

        $response = $this->post('/registrarUsuario', [
            'firstname' => 'Pepe',
            'secondname'=>'Palotes',
            'email' => 'palotes@palotes.com',
            //Falta password
            'company_id' => 1,
            'iscontact' => '0',
            'deleted' => '0',
            'actived' => '0',
            'email_confirmed' => '0',
            'type' => 'u'
        ]);
    
        // Primero comprobamos que todo ha ido bien
        $response->assertStatus(200);
        // Comprobamos los que hay en la base de datos sumando 1 para saber que se ha insertado)
        $this->assertCount($num, User::all());
        // Y comprobamos que sea el que acabamos de insertar
        $user = User::where('email', '=', 'palotes@palotes.com')->first();
        $this->assertEquals($user->firstname, 'Pepe');
        $this->assertEquals($user->secondname, 'Palotes');
        $this->assertEquals($user->email, 'palotes@palotes.com');
        //Falta password
        $this->assertEquals($user->actived, '0');
        $this->assertEquals($user->email_confirmed, '0');
        $this->assertEquals($user->type, 'u');

    }
}
