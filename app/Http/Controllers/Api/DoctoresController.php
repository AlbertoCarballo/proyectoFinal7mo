<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class DoctoresController extends Controller
{
    public function getDoctores(){
        try {
            $doctores=Doctores::all();
            return response()->json([
                'status' => 'success',
                'data' => $doctores
            ], 200);
    
        } catch (\Exception $e) {
            Log::error('Error al obtener paciente: ' . $e->getMessage());
    
            return response()->json([
                'message' => 'Ocurrió un error en el servidor',
                'status' => 500
            ], 500);
            }
    }

    public function getSpecificDoctor($id){
        try {
        $doctor = Doctores::find($id);

        if (!$doctor) {
            $data = [
                'message' => 'Paciente no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Paciente encontrado',
            'data' => $doctor,
            'status' => 200
        ];

        return response()->json($data, 200);

    } catch (\Exception $e) {
        // Captura excepciones y muestra detalles en el log
        Log::error('Error al obtener paciente: ' . $e->getMessage());

        return response()->json([
            'message' => 'Ocurrió un error en el servidor',
            'status' => 500
        ], 500);
        }
    }

    public function postDoctor(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "nombre" => "required",
            "primer_apellido" => "required",
            "segundo_apellido",
            "correo_electronico" => "required|email",
            "contrasena" => "required",
            'id_especialidad' => 'required|exists:especialidades,id_especialidad',
            "consultorio" => "required",
            "cedula_profesional" => "required",
            "rfc" => "required",
            "alama_mater" => "required"
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
            $doctor = Doctores::create([
                "nombre" => $request->nombre,
                "primer_apellido" => $request->primer_apellido,
                "segundo_apellido" => $request->segundo_apellido,
                "correo_electronico" => $request->correo_electronico,
                "contrasena" => $request->contrasena,
                "id_especialidad" => $request->id_especialidad,
                "consultorio" => $request->consultorio,
                "cedula_profesional" => $request->cedula_profesional,
                "rfc" => $request->rfc,
                "alama_mater" => $request->alama_mater,
            ]);
    
            return response()->json([
                'message' => 'Paciente creado exitosamente',
                'data' => $doctor,
                'status' => 200
            ], 200);
    
        } catch (\Exception $e) {
            Log::error('Error al crear paciente: ' . $e->getMessage());
            return response()->json([
                'message' => $e,
                'status' => 500
            ], 500);
        }
    }

    public function updateDoctor(Request $request, $id){

        try {
            $doctor = Doctores::find($id);

        if (!$doctor) {
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
            "correo_electronico" => "required|email",
            "contrasena" => "required",
            "consultorio" => "required",
            "cedula_profesional" => "required",
            "rfc" => "required",
            "alama_mater" => "required"
        ]);

        if ($validator->fails()) {
            $data = [
                "message" => "Error de validación de datos",
                "error" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }
        $doctor->nombre = $request->nombre;
        $doctor->primer_apellido = $request->primer_apellido;
        $doctor->segundo_apellido = $request->segundo_apellido;
        $doctor->correo_electronico = $request->correo_electronico;
        $doctor->contrasena = $request->contrasena;
        $doctor->consultorio = $request->consultorio;
        $doctor->cedula_profesional = $request->cedula_profesional;
        $doctor->rfc = $request->rfc;
        $doctor->alama_mater = $request->alama_mater;
        $doctor->save();
        $data=[
            'message' => 'Paciente actualizado exitosamente',
            'data' => $doctor,
            'status' => 200
        ];
        return response()->json($data, 200);


    } catch (\Exception $e) {
        Log::error('Error al obtener paciente: ' . $e->getMessage());

        return response()->json([
            'message' => $e,
            'status' => 500
        ], 500);
        }
    }

    public function deleteDoctor($id){
        try {
            $doctor = Doctores::find($id);

            if (!$doctor) {
            $data=[
                'message' => 'Paciente no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
            }
            $doctor->delete();
            $data = [
                'message' => 'Paciente eliminado exitosamente',
                'status' => 200
            ];

            return response()->json($data, 200);


    } catch (\Exception $e) {
        Log::error('Error al obtener paciente: ' . $e->getMessage());

        return response()->json([
            'message' => $e,
            'status' => 500
        ], 500);
        }
    }

    public function getDoctorByCorreo($correo)
    {
        try {
            $doctor = Doctores::where('correo_electronico', $correo)->first();
    
            if ($doctor) {
                return response()->json($doctor);
            }
        } catch (\Exception $e) {
            \Log::error('Error al obtener paciente: ' . $e->getMessage());
            return response()->json([
                'message' => $e,
                'status' => 400
            ], 400);
            }
    }
}
