<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoDetalle;
use Tymon\JWTAuth\Facades\JWTAuth;


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

        $payload = JWTAuth::parseToken()->getPayload();
        $userId = $payload->get('id'); 

        $request['fld_registro'] = now();
        $request['fld_UpdateFecha'] = now();
       
        $request['fld_UpdateUser'] = $userId;
        $request['fld_IDusuario'] = $userId;


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
        $payload = JWTAuth::parseToken()->getPayload();
        $userId = $payload->get('id'); 

        $request['fld_UpdateFecha'] = now();       
        $request['fld_UpdateUser'] = $userId;        

        $pedido = Pedido::find($id);
        $pedido->update($request->all());

        return response()->json($pedido);
    }


    public function destroy($id)
    {
        //

        $pedido = Pedido::find($id);

        $detalle = PedidoDetalle::where('fld_IDpedido', $id);
        if(!$detalle->exists()){
            if(empty($pedido["fld_id"])){
                return response()->json(["message" => "No se encontro registros para eliminar"]);
            }else{
                $pedido->delete();
                return response()->json(["message" => "Pedido eliminado correctamente"]);
    
            }
        }else{
                return response()->json(["message" => "El pedido cuenta con detalles, debe eliminar primero el detalle.","detalle"=>$detalle->get()]);
        }
       
    }
}
