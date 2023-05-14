<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $producto = Producto::all();
        return response()->json($producto);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $payload = JWTAuth::parseToken()->getPayload();

        $request['fld_IDusuario'] = $payload->get('id');
        $request['fld_UpdateUser'] = $payload->get('id');

        $request['fld_registro'] = now();
        $request['fld_UpdateFecha'] = now();
        $producto = Producto::create($request->all());
        return response()->json($producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $producto = Producto::find($id);
        return response()->json($producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $payload = JWTAuth::parseToken()->getPayload();
        $request['fld_UpdateUser'] = $payload->get('id');

        $producto = Producto::find($id);
        $request['fld_UpdateFecha'] = now();
        $producto->update($request->all());

        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $producto = Producto::find($id);
        if(empty($producto["fld_id"])){
            return response()->json(["message" => "No se encontro registros para eliminar"]);
        }else{
            $producto->delete();
            return response()->json(["message" => "Producto eliminado correctamente"]);

        }
    }
}
