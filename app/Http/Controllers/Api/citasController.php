<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CitasMedicas;
use App\Models\ResumenConsultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class citasController extends Controller
{
    public function getCitas(){
        try {
            $citas=CitasMedicas::all();
            return response()->json([
                'status' => 'success',
                'data' => $citas
            ], 200);
    
        } catch (\Exception $e) {
            Log::error('Error al obtener paciente: ' . $e->getMessage());
    
            return response()->json([
                'message' => 'Ocurrió un error en el servidor',
                'status' => 500
            ], 500);
            }
    }

    public function getMisCitas($id){
        try {
            $citas = CitasMedicas::where('id_doctor', $id)->get();
        
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
    public function getMisCitasPaciente($id){
        try {
            $citas = CitasMedicas::where('id_paciente', $id)->get();
        
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
    public function getSpecificCita($id){
        try {
        $cita = CitasMedicas::find($id);


        if (!$cita) {
            $data = [
                'message' => 'Paciente no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $data = [
            'message' => 'citas encontradas',
            'data' => $cita,
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

    public function postCitas(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_paciente'=>"required",
            'nombre_paciente'=>"required", 
            'id_doctor'=>"required",
            "nombre_doctor"=>"required",
            'fecha_cita'=>"required", 
            'hora_consulta'=>"required", 
            'descripcion_problema'=>"required",
            'consultorio'=>"required", 
            'estado'=>"required"
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
            $citas = CitasMedicas::create([
                'id_paciente'=>$request->id_paciente,
                'nombre_paciente'=>$request->nombre_paciente, 
                'id_doctor'=>$request->id_doctor,
                "nombre_doctor"=>$request->nombre_doctor,
                'fecha_cita'=>$request->fecha_cita, 
                'hora_consulta'=>$request->hora_consulta, 
                'descripcion_problema'=>$request->descripcion_problema,
                'consultorio'=>$request->consultorio, 
                'estado'=>$request->estado
            ]);
    
            return response()->json([
                'message' => 'Paciente creado exitosamente',
                'data' => $citas,
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

    public function updateCita(Request $request, $id){
        try {
            $citas = CitasMedicas::find($id);
        
            if (!$citas) {
                $data = [
                    'message' => 'Paciente no encontrado',
                    'status' => 404
                ];
        
                return response()->json($data, 404);
            }
        
            $validator = Validator::make($request->all(), [
                'id_paciente' => "required",
                'nombre_paciente' => "required", 
                'id_doctor' => "required",
                'nombre_doctor' => "required",
                'fecha_cita' => "required", 
                'hora_consulta' => "required", 
                'descripcion_problema' => "required",
                'consultorio' => "required", 
                'estado' => "required"
            ]);
        
            if ($validator->fails()) {
                $data = [
                    "message" => "Error de validación de datos",
                    "error" => $validator->errors(),
                    "status" => 400
                ];
                return response()->json($data, 400);
            }
        
            $citas->id_paciente = $request->id_paciente;
            $citas->nombre_paciente = $request->nombre_paciente;
            $citas->id_doctor = $request->id_doctor;
            $citas->nombre_doctor = $request->nombre_doctor;
            $citas->fecha_cita = $request->fecha_cita;
            $citas->hora_consulta = $request->hora_consulta;
            $citas->descripcion_problema = $request->descripcion_problema;
            $citas->consultorio = $request->consultorio;
            $citas->estado = $request->estado;
            $citas->save();
        
            $data = [
                'message' => 'Cita actualizada exitosamente',
                'data' => $citas, 
                'status' => 200
            ];
            return response()->json($data, 200);
        
        } catch (\Exception $e) {
            Log::error('Error al obtener paciente: ' . $e->getMessage());
        
            return response()->json([
                'message' => 'Error en el servidor: ' . $e->getMessage(),
                'status' => 400
            ], 400);
        }
    }        
    public function deleteCita($id){
        try {
            $cita = CitasMedicas::find($id);

            if (!$cita) {
            $data=[
                'message' => 'Paciente no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
            }
            $cita->delete();
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
