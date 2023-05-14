<?php

namespace App\Http\Controllers;

use App\Models\Alarma;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AlarmaController extends Controller
{
    //

    
    public function index()
    {
        //
        $alarm = Alarma::all();
        return response()->json($alarm);
    }

    public function store(Request $request)
    {
        //

        $payload = JWTAuth::parseToken()->getPayload();
        $userId = $payload->get('id'); 

        $request['fld_registro'] = now();
        $request['fld_IDusuario'] = $userId;



        $alarm = Alarma::create($request->all());
        return response()->json($alarm);
    }


    public function show($id)
    {
        //
        $alarm = Alarma::find($id);
        return response()->json($alarm);
    }


    public function update(Request $request, $id)
    {
        //
        $alarm = Alarma::find($id);
        $alarm->update($request->all());

        return response()->json($alarm);
    }


    public function destroy($id)
    {
        //

        $alarm = Alarma::find($id);
        if (empty($alarm["fld_id"])) {
            return response()->json(["message" => "No se encontro registros para eliminar"]);
        } else {
            $alarm->delete();
            return response()->json(["message" => "Alarma eliminada correctamente"]);
        }
    }

  
}
