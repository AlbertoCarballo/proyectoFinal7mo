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

    public function getSpecificPacientes($id){
        try {
        $pacientes = Pacientes::find($id);

        if (!$pacientes) {
            $data = [
                'message' => 'Paciente no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Paciente encontrado',
            'data' => $pacientes,
            'status' => 200
        ];

        return response()->json($data, 200);

    } catch (\Exception $e) {
        // Captura excepciones y muestra detalles en el log
        \Log::error('Error al obtener paciente: ' . $e->getMessage());

        return response()->json([
            'message' => 'Ocurrió un error en el servidor',
            'status' => 500
        ], 500);
        }
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
                "contrasena" => $request->contrasena,  // Encriptar la contraseña
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
            \Log::error('Error al crear paciente: ' . $e->getMessage());
            return response()->json([
                'message' => $e,
                'status' => 500
            ], 500);
        }
    }

    public function updatePacientes(Request $request, $id){

        try {
            $pacientes = Pacientes::find($id);

        if (!$pacientes) {
            $data=[
                'message' => 'Paciente no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }
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
            "numero_telefonico" => "required",
            "numero_emergencia" => "",
        ]);

        if ($validator->fails()) {
            $data = [
                "message" => "Error de validación de datos",
                "error" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }
        $pacientes->nombre = $request->nombre;
        $pacientes->primer_apellido = $request->primer_apellido;
        $pacientes->segundo_apellido = $request->segundo_apellido;
        $pacientes->fecha_nac = $request->fecha_nac;
        $pacientes->correo_electronico = $request->correo_electronico;
        $pacientes->contrasena = $request->contrasena;
        $pacientes->genero = $request->genero;
        $pacientes->peso = $request->peso;
        $pacientes->estatura = $request->estatura;
        $pacientes->numero_telefonico = $request->numero_telefonico;
        $pacientes->numero_emergencia=$request->numero_emergencia;
        $pacientes->save();
        $data=[
            'message' => 'Paciente actualizado exitosamente',
            'data' => $pacientes,
            'status' => 200
        ];
        return response()->json($data, 200);


    } catch (\Exception $e) {
        // Captura excepciones y muestra detalles en el log
        \Log::error('Error al obtener paciente: ' . $e->getMessage());

        return response()->json([
            'message' => 'Ocurrió un error en el servidor',
            'status' => 500
        ], 500);
        }
    }

    public function deletePaciente($id){
        try {
            $pacientes = Pacientes::find($id);

            if (!$pacientes) {
            $data=[
                'message' => 'Paciente no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
            }
            $pacientes->delete();
            $data = [
                'message' => 'Paciente eliminado exitosamente',
                'status' => 200
            ];

            return response()->json($data, 200);


    } catch (\Exception $e) {
        // Captura excepciones y muestra detalles en el log
        \Log::error('Error al obtener paciente: ' . $e->getMessage());

        return response()->json([
            'message' => 'Ocurrió un error en el servidor',
            'status' => 500
        ], 500);
        }
    }

   

    


    
}
