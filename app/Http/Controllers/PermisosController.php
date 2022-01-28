<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Permisos;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permiso = Permisos::all()->where('delete',FALSE);
        if($permiso != NULL){
            return response()->json($permiso);

        }
        else{
            return response()->json([
                'msg' => 'No existen permisos'
            ],404);
        }
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
                'nombre' => $request->nombre,
            
            ],

            [
                'nombre' => 'required',
            ]
            );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }


        $permiso = new Permisos();
        $permiso->nombre = $request->nombre;
        $permiso->delete = FALSE;
        $permiso->save();

        if($permiso != NULL){
            return response()->json([
                'msg' => 'se ha creado un nuevo permiso'
            ],202);

        return response()->json([
            'msg' => 'no se ha creado el permiso'
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
        $permiso = Permisos::find($id);
        if($permiso != NULL){
            return response()->json($permiso);
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
                'nombre' => $request->nombre,
            ],

            [
                'nombre' => 'required|min:3',

            ]
            );
        if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }

        $permiso = Permisos::find($id);
        if($permiso == NULL){
            return response()->json([
                "message" => 'El id es invalido'
            ]);
        }
        if ($request->nombre!= NULL) {
            $permiso->nombre = $request->nombre;
        }

        $permiso->save();
        return response()->json($permiso);
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
