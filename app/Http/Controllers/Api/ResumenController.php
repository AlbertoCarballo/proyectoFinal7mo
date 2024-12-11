<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ResumenConsultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ResumenController extends Controller
{
    public function getResumen(){
        try {
            $resumen=ResumenConsultas::all();
            return response()->json([
                'status' => 'success',
                'data' => $resumen
            ], 200);
    
        } catch (\Exception $e) {
            Log::error('Error al obtener paciente: ' . $e->getMessage());
    
            return response()->json([
                'message' => 'Ocurrió un error en el servidor',
                'status' => 500
            ], 500);
            }
    }

    public function getSpecificResumen($id){
        try {
        $resumen = ResumenConsultas::find($id);

        if (!$resumen) {
            $data = [
                'message' => 'Paciente no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Paciente encontrado',
            'data' => $resumen,
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

    public function getMisResumen($id){
        try {
            $citas = ResumenConsultas::where('id_doctor', $id)->get();
        
            // Verificar si se encontraron citas
            if ($citas->isEmpty()) {
                $data = [
                    'message' => 'No se encontraron citas para este doctor',
                    'status' => 404
                ];
        
                return response()->json($data, 404);
            }
        
            // Si se encontraron citas
            $data = [
                'message' => 'Citas encontradas',
                'data' => $citas,
                'status' => 200
            ];
        
            return response()->json($data, 200);
        
        } catch (\Exception $e) {
            // Captura excepciones y muestra detalles en el log
            Log::error('Error al obtener las citas: ' . $e->getMessage());
        
            return response()->json([
                'message' => 'Error al procesar la solicitud',
                'status' => 500
            ], 500);
        }
        
    }

    public function postResumen(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "id_consulta_medica" => "required",
            'nombre_paciente' =>"required", 
            'id_doctor'=>"required",
            'nombre_doctor'=>"required",
            'fecha_consulta', 
            'resumen_consulta'=>"required"
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
            $resumen = ResumenConsultas::create([
                "id_consulta_medica" => $request->id_consulta_medica,
                "nombre_paciente" => $request->nombre_paciente,
                "id_doctor" => $request->id_doctor,
                "nombre_doctor" => $request->nombre_doctor,
                "fecha_consulta" => $request->fecha_consulta,
                "resumen_consulta" => $request->resumen_consulta
            ]);
    
            return response()->json([
                'message' => 'Paciente creado exitosamente',
                'data' => $resumen,
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

    public function updateResumen(Request $request, $id){

        try {
            $resumen = ResumenConsultas::find($id);

        if (!$resumen) {
            $data=[
                'message' => 'Paciente no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            "id_consulta_medica" => "required",
            'nombre_paciente' =>"required", 
            'id_doctor'=>"required",
            'nombre_doctor'=>"required",
            'fecha_consulta', 
            'resumen_consulta'=>"required"
        ]);

        if ($validator->fails()) {
            $data = [
                "message" => "Error de validación de datos",
                "error" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }
        $resumen->id_consulta_medica = $request->id_consulta_medica;
        $resumen->nombre_paciente = $request->nombre_paciente;
        $resumen->id_doctor = $request->id_doctor;
        $resumen->nombre_doctor = $request->nombre_doctor;
        $resumen->fecha_consulta = $request->fecha_consulta;
        $resumen->resumen_consulta = $request->resumen_consulta;
        $resumen->save();
        $data=[
            'message' => 'Paciente actualizado exitosamente',
            'data' => $resumen,
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

    public function deleteResumen($id){
        try {
            $resumen = ResumenConsultas::find($id);

            if (!$resumen) {
            $data=[
                'message' => 'Paciente no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
            }
            $resumen->delete();
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
}
