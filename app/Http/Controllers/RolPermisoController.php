<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\RolPermiso;
use App\Models\Rol;
use App\Models\Permiso;
use Illuminate\Http\Request;

class RolPermisoController extends Controller
{
    public function index()
    {
        //
        $rolPermiso = RolPermiso::all()->where('delete',FALSE);
        if($rolPermiso != NULL){
            return response()->json($rolPermiso);
        }
        return response()->json([
            'message' => 'Not Found!'
        ], 404);
    }


    public function store(Request $request)
    {
        
        $validator = Validator::make(
            [

                'idPermiso' => $request->idPermiso,
                'idRol' => $request->idRol,
               
            ],
            [
                'idPermiso' => 'required',
                'idRol' => 'required',
              
            ]
        );

        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos'
            ]);
        }

        $rol = Rol::find($request->idRol);
        if($rol == NULL){
            return response()->json([
                "message" => 'Id de rol invalido'
            ]);
        }

        $permiso = Permiso::find($request->idPermiso);
        if($permiso == NULL){
            return response()->json([
                "message" => 'Id de permiso invalido'
            ]);
        }
 
        $rolPermiso = new RolPermiso();
        $rolPermiso->delete = FALSE; 
        $rolPermiso->idRol = $request->idRol;
        $rolPermiso->idPermiso = $request->idPermiso;
        $rolPermiso->save();

        if ($rolPermiso != NULL) {
            return response()->json([
                "message" => 'Se ha creado rolPermiso.'
            ],202);
        }
        return response()->json([
            "message" => 'No se ha creado rolPermiso.'
        ]);

     
    }

    public function show($id)
    {
        $rolPermiso = RolPermiso::find($id);
        if ($rolPermiso != NULL) {
            return response()->json($rolPermiso);
        }
        return response()->json([
            "message" => 'No se encontro ningun valor de id.'
        ]);
    }


    public function update(Request $request, $id)
    {

        $validator = Validator::make(
            [

                'idPermiso' => $request->idPermiso,
                'idRol' => $request->idRol,
               
            ],
            [
                'idPermiso' => 'required',
                'idRol' => 'required',
              
            ]
        );

        if ($validator->fails())
        {
            return response()->json([
                "message" => 'Los datos ingresados son invalidos'
            ]);
        }

        $rol = Rol::find($request->idRol);
        if($rol == NULL){
            return response()->json([
                "message" => 'Id de rol invalido'
            ]);
        }

        $permiso = Permiso::find($request->idPermiso);
        if($permiso == NULL){
            return response()->json([
                "message" => 'Id de permiso invalido'
            ]);
        }
        
        $rolPermiso = RolPermiso::find($id);
        if($rolPermiso == NULL){
            return response()->json([
                "message" => 'El Id es invalido'
            ]);
        }
        if ($request->idPermiso != NULL) {
            $rolPermiso->idPermiso = $request->idPermiso;
        }
        if ($request->idRol != NULL) {
            $rolPermiso->idRol = $request->idRol;
    }
        return response()->json($rolPermiso);
}

    public function destroy($id)
    {
        // Validación ID
        if(ctype_digit($id) != TRUE){
           return response()->json([
               "msg" => "El id es inválido",
           ],400);
          }
        
         $rolPermiso = RolPermiso::find($id);
          //Valida existencia de tupla
          if(($rolPermiso == NULL) || ($rolPermiso->delete==TRUE)){
           return response()->json([
               "msg" => "El rolPermiso no existe",
           ],404);
       }
   
           $rolPermiso->delete = TRUE;
           $rolPermiso->save();
           return response()->json($rolPermiso);
       }    
}
