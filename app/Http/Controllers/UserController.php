<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //


    public function getLogin(Request $request){
    // Obtiene los datos del JSON enviado en la solicitud
    $data = $request->json()->all();

    // Valida que se hayan proporcionado los datos requeridos
    if (!isset($data['username']) || !isset($data['password'])) {
        return response()->json(['error' => 'Usuario y contraseña requeridos'], 400);
    }

    // Crea el usuario en la base de datos utilizando los datos proporcionados
    $user = new User;
    $user->username = $data['username'];
    $user->password = bcrypt($data['password']);
    //$user->save();

    // Retorna una respuesta satisfactoria
    return response()->json(['message' => 'u'.$user->username.'p'.$user->password.''], 201);
    
    }

}
