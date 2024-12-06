<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctores;
use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "correo_electronico" => "required|email",
            "contrasena" => "required"
        ]);

        if ($validator->fails()) {
            return redirect('/')->withErrors($validator)->withInput();
        }

        $doctor = Doctores::where('correo_electronico', $request->correo_electronico)->first();
        if ($doctor && $doctor->contrasena === $request->contrasena) {
            Session::put('user_id', $doctor->id_doctor);
            Session::put('tipo_usuario', 'doctor');
            return redirect('/home');
        }
        else {
            return redirect('/')->with('error', 'Credenciales incorrectas');
        }
    }

    public function loginMovil(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "correo_electronico" => "required|email",
            "contrasena" => "required"
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'datos incorrectos',
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        $paciente = Pacientes::where('correo_electronico', $request->correo_electronico)->first();
        if ($paciente && $paciente->contrasena === $request->contrasena) {
            Session::put('user_id', $paciente->id_paciente);
            Session::put('tipo_usuario', 'doctor');
            
            $data = [
                'message' => 'login exitoso',
                "id_usuario" => $paciente->id_paciente,
                'status' => 200
            ];

            return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'login fallido',
                'status' => 404
            ];

            return response()->json($data, 404);
        }
    }
    

}


