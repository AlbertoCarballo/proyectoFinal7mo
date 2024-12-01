<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


class PacientesController extends Controller
{
    public function getPacientes(){
        $pacientes=Pacientes::all();
        return response()->json([
            'status' => 'success',
            'data' => $pacientes
        ], 200);
    }

    public function postPacientes(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "nombre" => "required",
            "primer_apellido" => "required",
            "segundo_apellido",
            "fecha_nac" => "required",
            "correo_electronico" => "required|email",
            "contrasena" => "required",
            "genero" => "required",
            "peso" => "required",
            "estatura" => "required",
            "tipo_sangre" => "required",
            "numero_telefonico" => "required",
            "numero_emergencia" => "",
            "nss" => "required",
        ]);
    
        if ($validator->fails()) {
            $data = [
                "message" => "Error de validación de datos",
                "error" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }
    
        try {
            $pacientes = Pacientes::create([
                "nombre" => $request->nombre,
                "primer_apellido" => $request->primer_apellido,
                "segundo_apellido" => $request->segundo_apellido,
                "fecha_nac" => $request->fecha_nac,
                "correo_electronico" => $request->correo_electronico,
                "contrasena" => $request->contrasena, 
                "genero" => $request->genero,
                "peso" => $request->peso,
                "estatura" => $request->estatura,
                "tipo_sangre" => $request->tipo_sangre,
                "numero_telefonico" => $request->numero_telefonico,
                "numero_emergencia" => $request->numero_emergencia,
                "nss" => $request->nss,
            ]);
    
            return response()->json([
                'message' => 'Paciente creado exitosamente',
                'data' => $pacientes,
                'status' => 200
            ], 200);
    
        } catch (\Exception $e) {
            // Capturar excepciones y mostrar detalles en el log
            \Log::error('Error al crear paciente: ' . $e->getMessage());
            return response()->json([
                'message' => $e,
                'status' => 500
            ], 500);
        }
    }
    

    
}
