<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libros;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;

class BibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bibliotecas = Biblioteca::all();
       
        $libros= array();
        $libro= Libros::all()->where('delete',FALSE);
        foreach($bibliotecas as $biblioteca){
            $libro = Libros::find($biblioteca->idLibro);
            
            array_push($libros,$libro);
        }
        //return view('biblioteca',compact('libros'));
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
            ],
            [
                'idUsuario' => 'required',
                'idLibro' => 'required',
            ]
        );
        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos.'
            ]);
        }
        $libro = Libros::find($request->idLibro);
        if($juego == NULL){
            return response()->json([
                "message" => 'Id de libro invalido'
            ]);
        }
        $biblioteca = new Biblioteca();
        $biblioteca->idUsuario = $request->idUsuario;
        $biblioteca->idLibro = $request->idLibro;
        $biblioteca->save();

        if ($biblioteca != NULL) {
            return response()->json([
                "message" => 'Se ha creado una biblioteca.'
            ],202);
        }
        return response()->json([
            "message" => 'No se ha creado una biblioteca.'
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
        $biblioteca = Biblioteca::find($id);
        if ($biblioteca != NULL) {
            return response()->json($biblioteca);
        }
        return response()->json([
            "message" => 'No se encontro ninguna biblioteca con ese id.'
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
            ],
            [
                'idUsuario' => 'required',
                'idLibro' => 'required',
            ]
        );

        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos.'
            ]);
        }
        $usuario = Usuario::find($request->idUsuario);
        if($usuario == NULL){
            return response()->json([
                "message" => 'Id de usuario invalido.'
            ]);
        }

        $libro = Libros::find($request->idlibro);
        if($juego == NULL){
            return response()->json([
                "message" => 'Id de libro invalido.'
            ]);
        }
        
        $biblioteca = Biblioteca::find($id);
        if($biblioteca == NULL){
            return response()->json([
                "message" => 'El Id es invalido.'
            ]);
        }

        if ($request->idUsuario != NULL) {
            $biblioteca->idUsuario = $request->idUsuario;
        }
        if ($request->idlibro != NULL) {
            $biblioteca->idlibro = $request->idlibro;
        }
        $biblioteca->save();
        return response()->json($biblioteca);
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
