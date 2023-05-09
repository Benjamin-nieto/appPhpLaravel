<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
           
       $valid = $this->validate($request, [
            'fld_nombre' => 'required|max:200',
            'fld_correo' => 'required|email|max:220|unique:tbl_usuarios',
            'fld_clave' => 'required|min:8',
            
        ]);


        $user = User::create([
            'fld_nombre' => $request->fld_nombre,
            'fld_correo' => $request->fld_correo,
            'fld_clave' => Hash::make($request->fld_clave),
            'fld_estado' => 1, //estado activo
            'fld_registro' => now(),
            'fld_IDrol' => 3,  //role cliente
            'fld_update' => now(),

        ]);

        
        $token = JWTAuth::fromUser($user);

        return response()->json(
            [ 'message' => 'Usuario registrado exitosamente.',
              'user' => $user->fld_nombre ,'token'=>$token
               ] , 201);

        }catch (\Exception $e) {
            return response()->json(
                [ 'message' => 'Error. '.$e->getMessage()
                   ] , 404);
        }
        
    }
    // comentario
    public function login(LoginRequest $request)
    {

        $credentials = $request->only('fld_correo', 'fld_clave');

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        return response()->json(['token' => $token]);


     /*   try {
            
            if(!$token = JWTAuth::attempt($credencials)){
                return response()->json([
                    "error" => "Invalid Credenciales"
                ],400);
            }


        } catch (JWTException $th) {
            return response()->json([
                    "error" => "Not create token"
                ],500);
        }

        return response()->json(compact('token'));*/

    }
}