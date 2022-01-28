<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use Illuminate\Support\Facades\Validator;
class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = Rol::all()->where('delete',FALSE);
        if($rol != NULL){
            return response()->json($rol);

        }
        else{
            return response()->json([
                'msg' => 'No existen roles'
            ],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            [
                'nombreRol' => $request->nombreRol,
            
            ],

            [
                'nombreRol' => 'required',
            ]
            );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }


        $rol = new Rol();
        $rol->nombreRol = $request->nombreRol;
        $rol->delete = FALSE;
        $rol->save();

        if($rol != NULL){
            return response()->json([
                'msg' => 'se ha creado un nuevo rol'
            ],202);

        return response()->json([
            'msg' => 'no se ha creado el rol'
        ]);    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Rol::find($id);
        if($rol != NULL){
            return response()->json($rol);
        }
        return response()->json([
            'msg' => 'no se encontro ningun valor con la id asociada'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator = Validator::make(
            [
                'nombreRol' => $request->nombreRol,
            ],

            [
                'nombreRol' => 'required|min:3',

            ]
            );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }

        $rol = Rol::find($id);
        if($rol == NULL){
            return response()->json([
                "message" => 'El id es invalido'
            ]);
        }
        if ($request->nombreRol!= NULL) {
            $rol->nombreRol = $request->nombreRol;
        }

        $rol->save();
        return response()->json($rol);
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
    }
}
