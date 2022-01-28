<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Libros;
use App\Models\Descargas;
use Illuminate\Support\Facades\Validator;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libro = Libros::all()->where('delete',FALSE);
        if($libro != NULL){
            return response()->json($libro);

        }
        else{
            return response()->json([
                'msg' => 'No existen libros'
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
                'idLibro' => $request->idLibro,
                'nombreLibro' => $request -> nombreLibro,
                'linkLibro'=> $request -> linkLibro,
                'fechaCreacion'=> $request -> fechaCreacion,
                'autor'=> $request -> autor,
                
            ],

            [
                'idLibro' => 'required|min:3',
                'nombreLibro' => 'required|min:3',
                'linkLibro'=> 'required|min:3',
                'fechaCreacion'=> 'required|min:3',
                'autor'=> 'required|min:3',

            ]
            );
            if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }
        $libro = new Libros();
        $libro->delete = FALSE; 

        $fallido = FALSE;
        $mensajeFallos = '';

        $libro->nombreLibro = $request->nombreLibro;
        //validación 'nombreLibro'
        if($request->nombreLibro == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'nombreLibro' está vacío";
        }
        else{
            $libro->nombreLibro = $request -> nombreLibro;
        }
        //validacion 'linkLibro'
        if($request->linkLibro == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'linkLibro' está vacío";
        }
        else{
            $libro->linkLibro = $request -> linkLibro;
        }
        //validación 'fechaCreacion'
        if($request->fechaCreacion == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'fechaCreacion' está vacío";
        }
        else{
            $libro->fechaCreacion = $request -> fechaCreacion;
        }
        //validacion 'autor'
        if($request->autor == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'autor' está vacío";
        }
        else{
            $libro->autor = $request -> autor;
        }

        if($fallido == FALSE){

            $libro->save();
            return response()->json($libro);
        }

        else{
            return response()->json([
                 "msg" => $mensajeFallos,
             ],400); 
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
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "msg" => "La ID ingresada no es válida",
            ],400);
        }
        $libro = Libros:: find($id);
        //Verificación de la existencia de la tupla
        //considerando la bandera 'delete' 
        if(empty($libro) || ($libro->delete == TRUE)){
            return response()->json([
                "msg" => "El libro solicitado no existe",
            ],404);
        }
        return response($libro);
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
                'idLibro' => $request->idLibro,
                'nombreLibro' => $request -> nombreLibro,
                'linkLibro'=> $request -> linkLibro,
                'fechaCreacion'=> $request -> fechaCreacion,
                'autor'=> $request -> autor,
                
            ],

            [
                'idLibro' => 'required|min:3',
                'nombreLibro' => 'required|min:3',
                'linkLibro'=> 'required|min:3',
                'fechaCreacion'=> 'required|min:3',
                'autor'=> 'required|min:3',

            ]
            );
            if($validator->fails())
        {
            return response()->json([
                'msg' => 'Datos ingresados invalidos'
            ]);
        }

        $libro = Libros::find($id);
        if(empty($libro)){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos. "El libro buscado no existe";
        }
        //validación 'nombreLibro'
        if($request->nombreLibro == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'nombreLibro' está vacío";
        }
        else{
            $libro->nombreLibro = $request -> nombreLibro;
        }
        //validacion 'linkLibro'
        if($request->linkLibro == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'linkLibro' está vacío";
        }
        else{
            $libro->linkLibro = $request -> linkLibro;
        }
        //validación 'fechaCreacion'
        if($request->fechaCreacion == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'fechaCreacion' está vacío";
        }
        else{
            $libro->fechaCreacion = $request -> fechaCreacion;
        }
        //validacion 'autor'
        if($request->autor == NULL){
            $fallido = TRUE;
            $mensajeFallos = $mensajeFallos."El campo 'autor' está vacío";
        }
        else{
            $libro->autor = $request -> autor;
        }

        if($fallido == FALSE){

            $libro->save();
            return response()->json($libro);
        }

        else{
            return response()->json([
                 "msg" => $mensajeFallos,
             ],400); 
         }
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
