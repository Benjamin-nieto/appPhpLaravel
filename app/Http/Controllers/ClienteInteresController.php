<?php

namespace App\Http\Controllers;

use App\Models\ClienteInteres;
use Illuminate\Http\Request;

class ClienteInteresController extends Controller
{
    //

    public function index()
    {
        //
        $client = ClienteInteres::all();
        return response()->json($client);
    }

    public function store(Request $request)
    {
        //
        $request->merge(['fld_fecha' => now()]);
        $client = ClienteInteres::create($request->all());
        return response()->json($client);
    }


    public function show($id)
    {
        //
        $client = ClienteInteres::find($id);
        return response()->json($client);
    }


    public function update(Request $request, $id)
    {
        //
        $client = ClienteInteres::find($id);
        $client->update($request->all());

        return response()->json($client);
    }


    public function destroy($id)
    {
        //

        $client = ClienteInteres::find($id);
        if(empty($client["fld_id"])){
            return response()->json(["message" => "No se encontro registros para eliminar"]);
        }else{
            $client->delete();
            return response()->json(["message" => "Interes del cliente eliminado correctamente"]);

        }
    }
}
