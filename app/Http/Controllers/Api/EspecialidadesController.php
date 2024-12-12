<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Especialidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class EspecialidadesController extends Controller
{
    public function getEspecialidades(){
        try {
            $especialidades=Especialidades::all();
            return response()->json([
                'status' => 'success',
                'data' => $especialidades
            ], 200);
    
        } catch (\Exception $e) {
            // Captura excepciones y muestra detalles en el log
            Log::error('Error al obtener paciente: ' . $e->getMessage());
    
            return response()->json([
                'message' => 'Ocurrió un error en el servidor',
                'status' => 500
            ], 500);
            }
    }
}
