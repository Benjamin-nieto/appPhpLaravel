<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
           
       $valid = $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|email|max:220|unique:users',
            'password' => 'required|min:8'
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fld_IDrol' => 1,
            'fld_estado' => '1'
        ]);

        
        $token = JWTAuth::customClaims(['email' => $user->email,
        'id'=>$user->id,'status'=>$user->fld_estado,'name'=>$user->name])->fromUser($user);

        return response()->json(
            [ 'message' => 'Usuario registrado exitosamente.',
              'user' => $user,'token'=>$token
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
        $credencials = $request->only('email','password');

        $user = User::where('email', $request->email)->first();


/// JWTAuth::attempt($credencials)
//    $token = JWTAuth::customClaims(['user' => $user])->attempt(['email' => 'usuario@example.com', 'password' => 'contraseña']);

        try {
            
            if(!$token = JWTAuth::customClaims(['email' => $user->email,
            'id'=>$user->id,'status'=>$user->fld_estado,'name'=>$user->name])->attempt($credencials) ){
                return response()->json([
                    "error" => "Invalid Credenciales"
                ],400);
            }


        } catch (JWTException $th) {
            return response()->json([
                    "error" => "Not create token"
                ],500);
        }

        return response()->json(compact('token'));
    }



}