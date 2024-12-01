<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PacientesController extends Controller
{
    public function getPacientes(){
        $pacientes=Pacientes::all();
        return response()->json([
            'status' => 'success',
            'data' => $pacientes
        ], 200);
    }

    public function postPacientes(Request $request){
        $Validator=Validator::make($request->all(),[
        "nombre"=>"required",
        "primer_apellido"=>"required",
        "sefundo_apellido",
        "fecha_nac"=>"required",
        "correo_electronico"=>"required|email",
        "contrasena"=>"required",
        "genero"=>"required",
        "peso"=>"required",
        "estatura"=>"required",
        "tipo_sangre"=>"required",
        "numero_telefono"=>"required",
        "numero_emergenciaa"=>"",
        "nss"=>"required",
        ]);

        if($Validator->fails()){
            $data=[
                "message"=>"error de validacion de datos",
                "error"=>$Validator->errors(),
                "status"=>400
            ];
            return response()->json($data,400);
        };

        $pacientes=Pacientes::create([
            "nombre"=>$request->name,
            "primer_apellido"=>$request->primer_apellido,
            "sefundo_apellido"=>$request->segundo_apellido,
            "fecha_nac"=>$request->fecha_nac,
            "correo_electronico"=>$request->correo_electronico,
            "contrasena"=>$request->contrasena,
            "genero"=>$request->genero,
            "peso"=>$request->peso,
            "estatura"=>$request->estatura,
            "tipo_sangre"=>$request->tipo_sangre,
            "numero_telefono"=>$request->numero_telefono,
            "numero_emergencia"=>$request->numero_emergencia,
            "nss"=>$request->nss,
        ]);

        if(!$pacientes){
            $date=[
                "message"=>"error de creacion de paciente",
                "status"=>500
            ];
            return response()->json($data,500);
        }
        $date=[
            "data"=>$pacientes,
            "status"=>200
        ];

        return response()->json($data,200);
        
    }

    
}
