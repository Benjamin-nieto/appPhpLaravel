<?php

namespace App\Http\Controllers;

use App\Models\ProductoCategoria;
use Illuminate\Http\Request;

class ProductoCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pcate = ProductoCategoria::all();
        return response()->json($pcate);
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

        $data = $request;
        $data['created_at'] = now();
        $data['updated_at'] = now();
        $pcate = ProductoCategoria::create($data->all());
        return response()->json($pcate);
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
        $pcate = ProductoCategoria::find($id);
        return response()->json($pcate);
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
        $pcate = ProductoCategoria::find($id);
        $request['updated_at'] = now();
        $pcate->update($request->all());

        return response()->json($pcate);
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
            $pcate = ProductoCategoria::find($id);
            if(empty($pcate["id"])){
                return response()->json(["message" => "No se encontro registros para eliminar"]);
            }else{
                $pcate->delete();
                return response()->json(["message" => "Producto Categoria eliminado correctamente"]);

            }
            
       
    }
}
