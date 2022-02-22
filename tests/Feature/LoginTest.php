<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use almagest\User;

class LoginTest extends TestCase
{
    /** @test */
    public function login_con_usuario_existente()
    {
        $this->withoutExceptionHandling();

        $credentials = [
            "email" => 'alberto@alberto.com',
            "password" => '12345678'
        ];

        $response = $this->post('login', $credentials);
        $this->assertCredentials($credentials);
        $response->assertSessionMissing('errors'); 
    }

    /** @test */
    public function login_con_usuario_no_existente()
    {
        $this->withoutExceptionHandling();

        $credentials = [
            "email" => 'xxxx@xxxx.com',
            "password" => 'xxxxxx'
        ];

        $response = $this->post('login', $credentials);
        $this->assertCredentials($credentials);
        $response->assertSessionMissing('errors'); 
    }
  
}
