<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Libros;
use App\Models\Descargas;
use Illuminate\Support\Facades\Validator;
class DescargasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descargas = Descargas::all();
        if($descargas != NULL){
            return response()->json($descargas);
        }
        return response()->json([
            'message' => 'Descargas no encontrado.'
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
                'fechaDescarga'=>$request->fechaDescarga,
                'fechaEntrega'=>$request->fechaEntrega,
            ],
            [
                'idUsuario' => 'required',
                'idLibro' => 'required',
                'fechaDescarga'=>'required',
                'fechaEntrega'=>'required',
            ]
        );

        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos'
            ]);
        }

        $libros = Libros::find($request->idLibro);
        if($libros == NULL){
            return response()->json([
                "message" => 'Id de libro invalido'
            ]);
        }

        $usuario = Usuario::find($request->idUsuario);
        if($usuario == NULL){
            return response()->json([
                "message" => 'Id del usuario es invalido'
            ]);
        }
 
        $descargas = new Descargas();
        $descargas->idUsuario = $request->idUsuario;
        $descargas->idLibro = $request->idLibro;
        $descargas->save();

        if ($descargas != NULL) {
            return response()->json([
                "message" => 'Se ha creado una Descarga.'
            ],202);
        }
        return response()->json([
            "message" => 'No se ha creado descargas.'
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
        $descargas = Descargas::find($id);
        if ($descargas != NULL) {
            return response()->json($descargas);
        }
        return response()->json([
            "message" => 'No se encontro ningun valor de id.'
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
                'idUsuario' => $request->idUsuario,
                'idLibro' => $request->idLibro,
                'fechaDescarga'=>$request->fechaDescarga,
                'fechaEntrega'=>$request->fechaEntrega,
            ],
            [
                'idUsuario' => 'required',
                'idLibro' => 'required',
                'fechaDescarga'=>'required',
                'fechaEntrega'=>'required',
            ]
        );

        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos'
            ]);
        }

        $libros = Libros::find($request->idLibro);
        if($libros == NULL){
            return response()->json([
                "message" => 'Id de libro invalido'
            ]);
        }

        $usuario = Usuario::find($request->idUsuario);
        if($usuario == NULL){
            return response()->json([
                "message" => 'Id del usuario es invalido'
            ]);
        }
        if($request-> fechaDescarga == NULL){
            return response()->json([
                "message" => 'La fecha de descarga es invalida.'
            ]);
        }
        if($request-> fechaEntrega == NULL){
            return response()->json([
                "message" => 'La fecha de entrega es invalida.'
            ]);
        }
 
        $descargas =  Descargas::find($id);

        if ($descargas != NULL) {
            return response()->json([
                "message" => 'El id es invalido.'
            ],202);
        }
        if ($request->idLibro != NULL) {
            $descargas->idLibro = $request->idLibro;
        }
        if ($request->idUsuario != NULL) {
            $descargas->idUsuario = $request->idUsuario;
        }
        if ($request->fechaDescarga != NULL) {
            $descargas->fechaDescarga = $request->fechaDescarga;
        }
        if ($request->fechaEntrega != NULL) {
            $descargas->fechaEntrega = $request->fechaEntrega;
        }

        $juego->save();
        return response()->json($juego);
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
