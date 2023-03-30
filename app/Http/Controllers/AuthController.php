<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;

class AuthController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:api',['except'=>['login','register','mensaje']]);
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'user'=>'required',
            'password'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->error()->toJson(), 400);            
        }
        
        
        return response()->json(
            [
                'message'=>'User successfully registered',
                'user'=>$user
            ],201
        );
                
        
    }
    
// comentario
    public function login(Request $request){
         return response()->json(
            ['message'=>'response success',
            'user'=>'si']
            ,200);
        
    }
}
