<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Libros;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comentario = Comentario::all();
        if($comentario != NULL){
            return response()->json($comentario);
        }
        return response()->json([
            'message' => 'Comentario no encontrado.'
        ], 404);
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
                
                'idUsuario' => $request->idUsuario,
                'idLibro' => $request->idLibro,
                'mensaje' => $request->mensaje,
            ],
            [
                'idUsuario' => 'required',
                'idLibro' => 'required',
                'mensaje' => 'required|min:3',
                
            ]
        );
        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos.'
            ]);
        }
        $libro = Libros::find($request->idLibro);
        if($libro == NULL){
            return response()->json([
                "message" => 'Id de libro invalido.'
            ]);
        }
        $usuario = Usuario::find($request->idUsuario);
        if($usuario == NULL){
            return response()->json([
                "message" => 'Id de usuario invalido.'
            ]);
        }
        $comentario = new Comentario();
        $comentario->mensaje = $request->mensaje;
        $comentario->idLibro = $request->idLibro;
        $comentario->idUsuario = $request->idUsuario;
        $comentario->save();
        if ($comentario != NULL) {
            return response()->json([
                "message" => 'Se ha creado un comentario.'
            ],202);
        }
        return response()->json([
            "message" => 'No se ha creado un comentario.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentario = Comentario::find($id);
        if ($comentario != NULL) {
            return response()->json($comentario);
        }
        return response()->json([
            "message" => 'No se encontro ningun comentario con ese id.'
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
                'mensaje' => $request->mensaje,
                'idLibro' => $request->idLibro,
                'idUsuario' => $request->idUsuario
            ],
            [
                'mensaje' => 'required',  
                'idLibro' => 'required',
                'idUsuario' => 'required'
            ]
        );
        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos.'
            ]);
        }
        $libro = Libros::find($request->idLibro);
        if($libro == NULL){
            return response()->json([
                "message" => 'Id de libro invalido.'
            ]);
        }
        $usuario = Usuario::find($request->idUsuario);
        if($usuario == NULL){
            return response()->json([
                "message" => 'Id de usuario invalido.'
            ]);
        }
        $comentario = Comentario::find($id);
        if($comentario == NULL){
            return response()->json([
                "message" => 'El Id es invalido.'
            ]);
        }
        if ($request->mensaje!= NULL){
                $comentario->mensaje = $request->mensaje;
        }
        if ($request->idLibro != NULL) {
            $comentario->idLibro = $request->idLibro;
        }
        if ($request->idUsuario != NULL) {
            $comentario->idUsuario = $request->idUsuario;
        }
        $comentario->save();
        return response()->json($comentario);
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
