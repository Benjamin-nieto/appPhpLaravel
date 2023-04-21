<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    //

    public function index(Request $request){

        $roles = Rol::all();
        return response()->json($roles);
    }

    public function store(Request $request){

        $data = $request;
        $data['fld_registro'] = now();
        $roles = Rol::create($data->all());
        return response()->json($roles);
    }

    public function show($id){

        $roles = Rol::find($id);
        return response()->json($roles);

    }

    public function update(Request $request, $id){

        $roles = Rol::find($id);
        $roles->update($request->all());

        return response()->json($roles);

    }


    public function destroy($id){

        $roles = Rol::find($id);

        $roles->delete();

        return response()->json(["message"=>"Rol eliminado correctamente"]);
    }

}
