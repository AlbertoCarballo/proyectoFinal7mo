<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctores;
use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class authcontroller extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "correo_electronico" => "required|email",
            "contrasena" => "required"
        ]);

        if ($validator->fails()) {
            $data = [
                "message" => "Error de validación de datos",
                "error" => $validator->errors(),
                "status" => 400
            ];
            return redirect('/');
        }

        $doctor = Doctores::where('correo_electronico', $request->correo_electronico)->first();
        $paciente = Pacientes::where('correo_electronico', $request->correo_electronico)->first();

        if ($doctor && $doctor->contrasena === $request->contrasena) {
            Session::put('usuario_id', $doctor->id);
            Session::put('tipo_usuario', 'doctor');

            $data = [
                "message" => "Inicio de sesión exitoso",
                "data" => $doctor,
                "status" => 200
            ];
            return redirect('/home');
        } elseif ($paciente && $paciente->contrasena === $request->contrasena) {
            Session::put('usuario_id', $paciente->id);
            Session::put('tipo_usuario', 'paciente');

            $data = [
                "message" => "Inicio de sesión exitoso",
                "data" => $paciente,
                "status" => 200
            ];
            return redirect('/home');
        }
        else {
            $data = [
                "message" => "Credenciales incorrectas",
                "status" => 401
            ];
            return redirect('/');
        }
    }
}

