<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
class ClienteController extends Controller
{
    //
    public function index()
    {
        //
        $client = Cliente::all();
        return response()->json($client);
    }

    public function store(Request $request)
    {
        //

        $payload = JWTAuth::parseToken()->getPayload();
        $userId = $payload->get('id'); 
       
        $request['fld_UpdateUser'] = $userId;
        $request['fld_registro'] = now();
        $request['fld_UpdateFecha'] = now();


        $request->merge(['fld_estado' => '1']);
        $client = Cliente::create($request->all());
        return response()->json($client);
    }


    public function show($id)
    {
        //
        $client = Cliente::find($id);
        return response()->json($client);
    }


    public function update(Request $request, $id)
    {
        //

        $payload = JWTAuth::parseToken()->getPayload();
        $userId = $payload->get('id'); 
       
        $request['fld_UpdateUser'] = $userId;
        $request['fld_UpdateFecha'] = now();


        $client = Cliente::find($id);
        $client->update($request->all());

        return response()->json($client);
    }


    public function destroy($id)
    {
        //

        $client = Cliente::find($id);
        if(empty($client["fld_id"])){
            return response()->json(["message" => "No se encontro registros para eliminar"]);
        }else{
            $client->delete();
            return response()->json(["message" => "Cliente eliminado correctamente"]);

        }
    }
}
