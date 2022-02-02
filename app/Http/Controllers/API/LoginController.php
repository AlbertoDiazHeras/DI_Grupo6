<?php

namespace almagest\Http\Controllers\API;

use Illuminate\Http\Request;
use almagest\Http\Controllers\Controller;
use almagest\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller { 
    public $successStatus = 200;

    public function login(Request $request) {
                // Si las credenciales son correctas
                if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                    $user = Auth::user();
                    // Creamos un token de acceso para ese usuario
                    $success['token'] = $user->createToken('MyApp')->accessToken;
        
                    // Y lo devolvemos en el objeto 'json'
                    return response()->json(['success' => $success], $this->successStatus);
                }
                else {
                    return response()->json(['error' => 'No estás autorizado'], 401);
                }
        

    }

}