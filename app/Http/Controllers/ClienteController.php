<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

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
