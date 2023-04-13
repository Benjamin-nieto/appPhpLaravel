<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {

       $valid = $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|email|max:220|unique:users',
            'password' => 'required|min:8'
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(
            [ 'message' => 'Usuario registrado exitosamente.',
              'user' => $user,'token'=>$token
               ] , 201);
    }
    // comentario
    public function login(LoginRequest $request)
    {
        
    }
}