<?php

namespace App\Http\Controllers;

use App\Models\PedidoDetalle;
use Illuminate\Http\Request;

class PedidoDetalleController extends Controller
{
    //


    public function index()
    {
        //
        $pedido = PedidoDetalle::all();
        return response()->json($pedido);
    }

    public function store(Request $request)
    {
        //
        $pedido = PedidoDetalle::create($request->all());
        return response()->json($pedido);
    }


    public function show($id)
    {
        //
        $pedido = PedidoDetalle::find($id);
        return response()->json($pedido);
    }


    public function update(Request $request, $id)
    {
        //
        $pedido = PedidoDetalle::find($id);
        $pedido->update($request->all());

        return response()->json($pedido);
    }


    public function destroy($id)
    {
        //

        $pedido = PedidoDetalle::find($id);
        if (empty($pedido["fld_id"])) {
            return response()->json(["message" => "No se encontro registros para eliminar"]);
        } else {
            $pedido->delete();
            return response()->json(["message" => "Detalle del pedido eliminado correctamente"]);
        }
    }

    // ELIMINACION DE DETALLE POR ID DE PEDIDO
    public function destroyIdPedido($id)
    {
        //
        $pedido = PedidoDetalle::where('fld_IDpedido', $id);
        if (!$pedido->exists()) {
            return response()->json(["message" => "No se encontro registros para eliminar"]);
        } else {
            $pedido->delete();
            return response()->json(["message" => "Detalles del pedido $id eliminados correctamente","OB"=>$pedido]);
        }
    }
}
