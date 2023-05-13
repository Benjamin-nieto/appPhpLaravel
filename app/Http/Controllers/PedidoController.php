<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;


class PedidoController extends Controller
{
    //

    
    public function index()
    {
        //
        $pedido = Pedido::all();
        return response()->json($pedido);
    }

    public function store(Request $request)
    {
        //
        $pedido = Pedido::create($request->all());
        return response()->json($pedido);
    }


    public function show($id)
    {
        //
        $pedido = Pedido::find($id);
        return response()->json($pedido);
    }


    public function update(Request $request, $id)
    {
        //
        $pedido = Pedido::find($id);
        $pedido->update($request->all());

        return response()->json($pedido);
    }


    public function destroy($id)
    {
        //

        $client = Pedido::find($id);
        if(empty($pedido["fld_id"])){
            return response()->json(["message" => "No se encontro registros para eliminar"]);
        }else{
            $client->delete();
            return response()->json(["message" => "Pedido eliminado correctamente"]);

        }
    }
}
